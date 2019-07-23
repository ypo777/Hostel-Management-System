<?php
require_once 'db_setup.php';
require_once 'Room.php';

class History_Data extends Database
{
    function getStudentHistory($studentID,$table)
    {
        $conn = $this->getConnection();

        $sql    =   "SELECT * FROM ".$table." WHERE STUDENT_ID = ".$studentID;

        try
        {
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $exception)
        {
            echo 'History Student : '.$exception;
        }

        return $data;
    }

    function addingAttendanceData(array $dataArray)
    {
        $dbOjb = new Database();
        $conn = $dbOjb->getConnection();
        $roomObj = new Room();

        foreach ($dataArray as $row)
        {
            $roomData = $roomObj->getRoomData($row[0]);
            $nowDate = Date('Y-m-d');

                $sql   =   "INSERT INTO Student_History(Type, STUDENT_ID, ROOM_ID, DATE, DESCRIPTION)
                             VALUES (:type,:student_id,:room_id,now(),:description)";
                try {
                    $stmt = $conn->prepare($sql);
                    $stmt->bindValue(':type', 'Attendance');
                    $stmt->bindValue(':student_id', $row[0]);
                    $stmt->bindValue(':room_id', $roomData['ROOM_ID']);
                    $stmt->bindValue(':description', $row[1] );

                    $stmt->execute();
                }
                catch (PDOException $exception)
                {
                    echo 'Attendance History : '.$exception;
                }
        }
        return 'success';
    }

    function addingFineData(array $studentData,$description,$amount)
    {
        $conn = $this->getConnection();

        $sql = "INSERT INTO Bill_History(Type, STUDENT_ID, ROOM_ID, AMOUNT, DATE, DESCRIPTION) 
                VALUES (:type,:student_id,:room_id,:amount,now(),:description)";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':type','Fine Bill');
        $stmt->bindValue(':student_id',$studentData['STUDENT_ID']);
        $stmt->bindValue(':room_id',$studentData['ROOM_ID']);
        $stmt->bindValue(':amount',$amount);
        $stmt->bindValue(':description',$description);

        $stmt->execute();


    }

}
?>