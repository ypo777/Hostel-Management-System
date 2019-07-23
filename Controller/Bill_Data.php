<?php

require_once 'db_setup.php';
require_once 'Student.php';
require_once 'History_Data.php';

class Bill_Data extends Database
{
    function getBillInfo()
    {
        $conn  = $this->getConnection();

        $sql = "SELECT * FROM FEES";

        try
        {
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $resultData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $exception)
        {
            echo 'Get Bill Info Error '.$exception;
        }

        return $resultData;
    }

    function removeFees( array $ids)
    {
        $conn = $this->getConnection();

        $sql = "DELETE FROM FEES WHERE No = :no ";

        foreach ($ids as $value)
        {
            try
            {
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':no',$value);

                $stmt->execute();
            }
            catch (PDOException $exception)
            {
                echo 'Remove Fees '.$exception;
            }
        }

    }
    function attendanceData()
    {
        $conn = $this->getConnection();

        date_default_timezone_set('Asia/Rangoon');
        $timeZone =	date_default_timezone_get();
        $currentTime = date("Y-m-d",time());

        $sql  = "SELECT * FROM Student_History WHERE DATE = '".$currentTime."' AND DESCRIPTION != 'present'";

        try
        {
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $resultData = $stmt->fetchAll(PDO::FETCH_ASSOC);


        }
        catch (PDOException $exception)
        {
            echo 'Error absent data : '.$exception;
        }

        return $resultData;

    }

    function setFineBill(array $studentID,$type)
    {
        $conn = $this->getConnection();
        $studentObj = new Student();
        $historyObj = new History_Data();


        if ($type == 'Absent')
        {
            $dueDate =Date('Y-m-d', strtotime("+2 days"));
            $nowDate = Date('Y-m-d');
            $sql  = "INSERT INTO FEES(STUDENT_ID, ROOM_ID, DUE_DATE, AMOUNT,DESCRIPTION)
                 VALUES (:student_id,:room_id,:due_date,:amount,:description)";

            for ($i = 0; $i <= count($studentID)-1; $i++) {

                $studentData = $studentObj->getStudentData($studentID[$i]);

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':student_id',$studentData['STUDENT_ID']);
                $stmt->bindValue(':room_id',$studentData['ROOM_ID']);
                $stmt->bindValue(':due_date',$dueDate);
                $stmt->bindValue(":amount",1000);
                $stmt->bindValue(':description',"Fine Bill for Absenting ".$nowDate);

                $stmt->execute();

                $historyObj->addingFineData($studentData,'Fine Bill for Absenting '.$nowDate,1000);
            }
        }
        elseif($type == 'Late')
        {
            $dueDate =Date('Y-m-d', strtotime("+2 days"));
            $nowDate = Date('Y-m-d');


            $sql  = "INSERT INTO FEES(STUDENT_ID, ROOM_ID, DUE_DATE, AMOUNT,DESCRIPTION)
                 VALUES (:student_id,:room_id,:due_date,:amount,:description)";

            for ($i = 0; $i <= count($studentID)-1; $i++) {

                $studentData = $studentObj->getStudentData($studentID[$i]);

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':student_id',$studentData['STUDENT_ID']);
                $stmt->bindValue(':room_id',$studentData['ROOM_ID']);
                $stmt->bindValue(':due_date',$dueDate);
                $stmt->bindValue(":amount",1000);
                $stmt->bindValue(':description','Fine Bill for Late '.$nowDate);

                $stmt->execute();

                $historyObj->addingFineData($studentData,'Fine Bill for Absenting '.$nowDate,1000);

            }
        }

    }
}
?>