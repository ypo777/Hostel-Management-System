<?php
if(!isset($_SESSION))
{
    session_start();
}
include_once 'Layout_header.php';
require_once '../../Controller/Student.php';
require_once "../../Controller/Room.php";


$id = isset($_GET['id'] ) ? $_GET['id'] : die('Error Missing ID ');
$obj = new Student();
$roomObj = new Room();

$studentData = $obj->getPendingStudentData($id);
$freeRoomsList = $roomObj->checkRooms();



if ($_POST['confirm']) {

    $id = $studentData['id'];
    $roomSelect = $_POST['room'];

    $data = $obj->sendRegisterSetupMessage($studentData['id']);
    $roomObj->assignRoom($studentData['id'],$roomSelect);
$ref="Pending.php";
echo '<script>window.location = "'.$ref.'";</script>';
exit;
//    echo "<script>window.location('Pending.php');</script>";
}

?>
<div class="twelve wide column" style="margin-top: 20px;min-height: 800px;">
    <div class="ui segment" >
        <h1 class="ui header">
            <img src="../../Custom/Images/profile.png" class="ui circular  image">
            <?php echo $studentData['name'];?> 's Profile
        </h1>

        <div class="description">
            <div class="ui text field">
                <h3 class="ui black header">STUDENT ID</h3>
                <p  style="color:grey;"><?php echo $studentData['name']; ?></p>
                <h3 class="ui black header">STUDENT NAME</h3>
                <p style="color:grey;"><?php echo $studentData['year']; ?></p>
                <h3 class="ui black header">ROLL NO</h3>
                <p style="color:grey;"><?php echo $studentData['roll']; ?></p>
                <h3 class="ui black header">ADDRESS</h3>
                <p style="color:grey;"><?php echo $studentData['address']; ?></p>
                <h3 class="ui black header">EMAIL</h3>
                <p style="color:grey;"><?php echo $studentData['email']; ?></p>
                <h3 class="ui black header">Requested Date</h3>
                <p style="color:grey;"><?php echo $studentData['Requested_DATE']; ?></p>
            </div>
        </div>
        <hr>
        <form action="Room_Select.php?id=<?php echo $studentData['id'];?>" class="ui" method="post">
            <h2 class="ui header">
                Select Room
            </h2>
            <select name="room" id="assign" class="ui search dropdown">
                <optgroup label="Room">
                    <?php
                    foreach ($freeRoomsList as  $item) {

                        echo "<option value='".$item['ROOM_ID']."'>".$item['ROOM_ID']."</option>";
                    }
                    ?>
                </optgroup>
            </select>
            <input type="submit" name = "confirm" value="Confirm" class="ui green button">
        </form>
    </div>

</div>




<?php
include_once 'Layout_Footer.php';
?>