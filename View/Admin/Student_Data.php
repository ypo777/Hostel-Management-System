<?php
session_start();
$page_title = 'Student Data';

include_once 'Layout_header.php';
include_once '../../Controller/Student.php';


$studentObj = new Student();
$studentData = $studentObj->getStudentsData();

if (isset($_GET['more']))
{
    $studentModal = $studentObj->getStudentData($_GET['more']);
?>
    <div class="ui modal">
        <i class="close icon"></i>
        <div class="header">
            Profile Picture
        </div>
        <div class="image content">
            <div class="ui medium image">
                <img src="../../Custom/Images/profile.png">
            </div>
            <div class="description">
                <div class="ui text field">
                    <h3 class="ui black header">STUDENT ID</h3>
                    <p  style="color:grey;"><?php echo $studentModal['STUDENT_ID']; ?></p>
                    <h3 class="ui black header">STUDENT NAME</h3>
                    <p style="color:grey;"><?php echo $studentModal['STUDENT_NAME']; ?></p>
                    <h3 class="ui black header">ROLL NO</h3>
                    <p style="color:grey;"><?php echo $studentModal['ROLL_NO']; ?></p>
                    <h3 class="ui black header">ADDRESS</h3>
                    <p style="color:grey;"><?php echo $studentModal['ADDRESS']; ?></p>
                    <h3 class="ui black header">EMAIL</h3>
                    <p style="color:grey;"><?php echo $studentModal['EMAIL']; ?></p>
                    <h3 class="ui  black header">ROOM ID</h3>
                    <p style="color:grey;"><?php echo $studentModal['ROOM_ID']; ?></p>
                    <h3 class="ui black header">MAJOR</h3>
                    <p style="color:grey;"><?php echo $studentModal['MAJOR']; ?></p>
                </div>
            </div>
        </div>
        <div class="actions">
            <div class="ui black deny button">
                Nope
            </div>
            <div class="ui primary right labeled icon button">
                <a class="ui" style="color: white;" href="Student_Profile.php?id=<?php echo $studentModal['STUDENT_ID'] ?>">Edit Profile</a>
                <i class="checkmark icon"></i>
            </div>
        </div>
    </div>
    <script>
        $('.ui.modal')
            .modal('show')
        ;
    </script>
<?php
    }

?>

<div class="twelve wide column" style="margin-top: 20px; min-height: 800px">

    <form action="Student_Data.php" method="get">
    <table class="ui celled striped  table sortable">
        <thead>
            <tr>
                <th>STUDENT ID</th>
                <th>Student Name</th>
                <th>Roll No</th>
                <th>ROOM ID</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $table_header = array("STUDENT_ID","STUDENT_NAME","ROLL_NO","ROOM_ID","EMAIL");

        for ($i = 0; $i <count($studentData); $i++)
        {
            echo "<tr>";
            for ($j = 0; $j < count($table_header); $j++)
            {
//                echo '<td><a href="Student_Profile.php?id='.$studentData[$i]['STUDENT_ID'].'">'.$studentData[$i][$table_header[$j]].'</td>';

                echo '<td><a href="Student_Data.php?more='.$studentData[$i]['STUDENT_ID'].'">'.$studentData[$i][$table_header[$j]].'</td>';


            }
            echo "</tr>";
        }
        ?>

        </tbody>
    </table>
    </form>
</div>

<?php
include_once 'Layout_Footer.php';
?>