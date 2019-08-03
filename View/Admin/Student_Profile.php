<?php
session_start();
include_once 'Layout_header.php';
include_once '../../Controller/Student.php';

$studentObj = new Student();

if(isset($_GET['id']))
{
    $_SESSION['STUDENT_ID'] = $_GET['id'];
}
$studentData = $studentObj->getStudentData($_SESSION['STUDENT_ID']);

if (isset($_GET['Done']))
{
    $check = $studentObj->updateData($_GET['update']);

    if ($check)
    {
     ?>
                <div class="ui mini modal">
                    <div class="header">Student Data Update</div>
                    <div class="actions">
                        <div class="ui green ok button">DONE</div>
                    </div>
                </div>
        <?php
        echo '<script>$(\'.ui.mini.modal\')
                .modal(\'show\');
                </script>';

    }
}




?>

    <div class="ui twelve wide column" style="margin-top: 10px;min-height: 800px">
                <button class="primary ui button">
                    Profile
                </button>
                <div class="ui one column grid" style="margin-top: 10px">
                    <div class="column">
                        <div class="ui raised segment large">
                            <h2 class="ui header">
                                <img src="../../Custom/Images/profile.png" class="ui circular   image">
                                Student's Profile

                            </h2>
                                <form class="ui form" id="myform" action="Student_Profile.php" method="get">
                                    <h2 class="ui black header">STUDENT ID</h2>
                                    <input name="update[studentID]" style="color:grey;" type="text"  value="<?php echo $studentData['STUDENT_ID']; ?>">
                                    <h2 class="ui black header">STUDENT NAME</h2>
                                    <input name="update[studentname]" style="color:grey;" type="text"  value="<?php echo $studentData['STUDENT_NAME']; ?>">
                                    <h2 class="ui black header">PASSWORD</h2>
                                    <input name="update[password]" style="color:grey;" type="text"  value="<?php echo $studentData['PASSWORD']; ?>">
                                    <h2 class="ui black header">ROLL NO</h2>
                                    <input name="update[rollno]" type="text"  value="<?php echo $studentData['ROLL_NO']; ?>">
                                    <h2 class="ui black header">ADDRESS</h2>
                                    <input name="update[address]"  style="color:grey;" type="text"  value="<?php echo $studentData['ADDRESS']; ?>">
                                    <h2 class="ui black header">EMAIL</h2>
                                    <input name="update[email]" style="color:grey;" type="text"  value="<?php echo $studentData['EMAIL']; ?>">
                                    <h2 class="ui  black header">ROOM ID</h2>
                                    <input name="update[roomID]" style="color:grey;" type="text"  value="<?php echo $studentData['ROOM_ID']; ?>">
                                    <h2 class="ui black header">MAJOR</h2>
                                    <input name="update[major]" style="color:grey;" type="text"  value="<?php echo $studentData['MAJOR']; ?>">

                                    <button type="submit" class="ui teal button" name="Done" style="margin-top: 10px">Done</button>
                                </form>
                        </div>
                    </div>
                </div>
    </div>

<?php
include_once 'Layout_Footer.php';
?>
