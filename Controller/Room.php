<?php
if(!isset($_SESSION))
{
    session_start();
}
require_once ("db_setup.php");
require_once ("Student.php");

class Room extends Database{

    function getRoomsData()
    {
        $conn = $this->getConnection();

        $sql = "SELECT ROOM_ID,STUDENT_ID,ROOM_STATUS FROM ROOM";

        try
        {
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $exception)
        {
            echo "Rooms data : ".$exception;
        }
        return $data;
    }


    function checkRooms(){

        $obj = new Database();
        $conn = $obj->getConnection();

        $sql = "SELECT * FROM ROOM WHERE ROOM_STATUS = 'Free'";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);


        return $data;
    }

    function assignRoom($StudentId,$RoomID)
    {

        $obj = new Student();
        $obj2 = new Database();

        $studentData = $obj->getPendingStudentData($StudentId);

        $sql = "UPDATE ROOM SET ROOM_CATEGORY= ? ,STUDENT_ID=?, ROOM_STATUS = ? WHERE ROOM_ID = ? ";

        try {
            $stmt = $obj2->getConnection()->prepare($sql);
            $stmt->execute(['Good', $studentData['id'], 'NOT FREE',$RoomID]);
        }
        catch (PDOException $exception)
        {
            echo "ERROR Assig Room : ".$exception;
        }

    }

    function getRoomData($StudentId)
    {
        $conn = $this->getConnection();

        $sql = "SELECT * FROM ROOM WHERE STUDENT_ID = ".$StudentId;

        try{
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $exception)
        {
            echo "ERROR Getting Room Data".$exception;
        }
        return $data;
    }

    function upDateRoomData($ID)
    {
        $conn = $this->getConnection();

        $sql = "UPDATE ROOM SET START_DATE = now() WHERE ROOM_ID = ? ";

        try{
            $stmt = $conn->prepare($sql);
            $stmt->execute([$ID]);
        }
        catch (PDOException $exception)
        {
            echo "ERROR Updating Date ".$exception;
        }
    }

}
