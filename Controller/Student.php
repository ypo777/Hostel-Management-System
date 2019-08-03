<?php

require_once 'db_setup.php';
require_once 'Room.php';

class Student extends Database
{
    function billTotal(array $feesData)
    {
        $absentAmount = array();
        $lateAmount   = array();
        $fineAmount   = array();

        foreach ($feesData as $key => $row)
        {
            if ($row['Type'] == 'Absent')
            {
                array_push($absentAmount,$row['AMOUNT']);
            }
            elseif ($row['Type'] == 'Late')
            {
                array_push($lateAmount,$row['AMOUNT']);
            }
            elseif ($row['Type'] == 'Fine')
            {
                array_push($fineAmount,$row['AMOUNT']);
            }
        }

        return [$absentAmount,$lateAmount,$fineAmount];
    }
    function attendanceTotal(array $attendanceData)
    {
        $absentCount = 0;
        $lateCount   = 0;
        $presentCount = 0;


        foreach ($attendanceData as $row)
        {
            if ($row['Type'] == 'Attendance')
            {
                if ($row['DESCRIPTION'] == 'Present')
                {
                    $presentCount += 1;
                }
                elseif ($row['DESCRIPTION'] == 'Absent')
                {
                    $absentCount += 1;
                }
                elseif ($row['DESCRIPTION'] == 'Late')
                {
                    $lateCount += 1;
                }
            }

        }

        return [$presentCount,$absentCount,$lateCount];
    }
    function updateData(array $data)
    {
        $conn  = $this->getConnection();

        $sql = "UPDATE STUDENT SET PASSWORD=? ,STUDENT_NAME=? ,ROLL_NO=?, ADDRESS=? ,EMAIL = ? , MAJOR = ? , ROOM_ID=? WHERE STUDENT_ID = ? ";

        try
        {
            $stmt = $conn->prepare($sql);
            $stmt->execute([$data['password'],$data['studentname'],$data['rollno'],$data['address'],$data['email']
                            ,$data['major'],$data['roomID'],$data['studentID']]);
        }
        catch (PDOException $exception)
        {
            echo 'Update Data : ' .$exception;
        }

        return true;
    }


    function setupHome($ID)
    {
        $conn = $this->getConnection();

        $sql1 = "SELECT * FROM FEES WHERE STUDENT_ID = ".$ID;
        $sql2 = "SELECT * FROM Bill_History WHERE STUDENT_ID = ".$ID;
        $sql3 = "SELECT * FROM Student_History WHERE  STUDENT_ID = ".$ID;

        try
        {
            $stmt1 = $conn->prepare($sql1);
            $stmt1->execute();
            $fees = $stmt1->fetchAll(PDO::FETCH_ASSOC);

            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute();
            $bhistory = $stmt2->fetchAll(PDO::FETCH_ASSOC);

            $stmt3 = $conn->prepare($sql3);
            $stmt3->execute();
            $nhistory = $stmt3->fetchAll(PDO::FETCH_ASSOC);

        }
        catch (PDOException $exception)
        {
            echo 'Error '.$exception;
        }

        return [$fees,$bhistory,$nhistory];
    }




    function getStudentsData()
    {
        $conn = $this->getConnection();

        $sql = "SELECT STUDENT_ID,STUDENT_NAME,ROLL_NO,ADDRESS,PH_NO,EMAIL,MAJOR,ROOM_ID FROM STUDENT";


        try
        {
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        }
        catch (PDOException $exception)
        {
            echo "GetStudents Data Error : ".$exception;
        }

        return $data;
    }

    function getStudentData($id)
    {
        $obj = new Database();
        $conn = $obj->getConnection();
        $sql = "SELECT * FROM STUDENT WHERE STUDENT_ID = ".$id;

        try {
            $statement = $conn->prepare($sql);
            $statement->execute();

            $data = $statement->fetch(PDO::FETCH_ASSOC);
        }
        catch (PDOException $exception)
        {
            echo "ERROR :" . $exception;
        }


        return $data;

    }

    function getPendingStudentData($id)
    {
        $obj = new Database();
        $conn = $obj->getConnection();

        $sql = "SELECT * FROM Pending WHERE id = ".$id;

        try {
            $statement = $conn->prepare($sql);
            $statement->execute();

            $data = $statement->fetch(PDO::FETCH_ASSOC);
        }
        catch (PDOException $exception)
        {
            echo "ERROR :" . $exception;
        }


        return $data;

    }

    function sendRegisterSetupMessage($id){

        $obj = new Database();
        $roomObj  = new Room();
        $conn = $obj->getConnection();

            try {
                $sql = "UPDATE Pending SET SetUp = ? WHERE id = ?";

                $statement = $conn->prepare($sql);
                $statement->execute([1, $id]);

            }
            catch (PDOException $exception)
            {
                echo "ERROR : ". $exception;
            }



        return 'Success';

    }

    function removeFromSetup(array $id){

        $obj = new Database();
        $conn = $obj->getConnection();

        foreach ($id as $i)
        {
            try {
                $sql = "UPDATE Pending SET SetUp = ? WHERE id = ?";
                $sql2 = "UPDATE ROOM SET STUDENT_ID = ?, ROOM_STATUS = ? WHERE STUDENT_ID = ?";

                $stmt = $conn->prepare($sql2);
                $stmt->execute([NULL,'FREE',$i]);

                $statement = $conn->prepare($sql);
                $statement->execute([0, $i]);
            }
            catch (PDOException $exception)
            {
                echo "ERROR removeFromSetup: ". $exception;
            }
        }
        return 'Success';
    }

    function setUp($n)
    {

        $obj = new Database();
        $conn = $obj->getConnection();

        $sql = "SELECT * FROM Pending WHERE email = "."'$n'";

        try {
            $statement = $conn->prepare($sql);
            $statement->execute();

            $result = $statement->fetch(PDO::FETCH_ASSOC);
        }
        catch (PDOException $exception)
        {
            echo "ERROR SetUp:" . $exception;
        }
        return $result;
    }

    function registerStudent($StudentID,$RoomID,$Password)
    {
        $conn = $this->getConnection();
        $data = $this->getPendingStudentData($StudentID);

        $sql = "INSERT INTO STUDENT(PASSWORD, STUDENT_NAME, ROLL_NO, ADDRESS, EMAIL, ROOM_ID)
                VALUES (:password,:name,:roll,:address,:email,:roomID)";

        try
        {
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':password',$Password);
            $stmt->bindValue(':name',$data['name']);
            $stmt->bindValue(':roll',$data['roll']);
            $stmt->bindValue(':address',$data['address']);
            $stmt->bindValue(':email',$data['email']);
            $stmt->bindValue(':roomID',$RoomID);

            $stmt->execute();



        }catch (PDOException $exception)
        {
            echo $exception;

        }
    }

    function removePending($StudentID)
    {
        $conn = $this->getConnection();

        $sql = "DELETE FROM Pending where id= :id";

        try{
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id',$StudentID);
            $stmt->execute();
        }
        catch (PDOException $exception)
        {
            echo "DELETE ERROR : ".$exception;
        }
    }
}
