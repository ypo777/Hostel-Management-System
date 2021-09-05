<?php
if(!isset($_SESSION))
{
    session_start();
}
include_once 'Layout_header.php';
require_once '../../Controller/Room.php';
require_once '../../Controller/History_Data.php';
require_once '../../Controller/Bill_Data.php';

if (!isset($_SESSION['AdminID']))
{
    $ref = "Admin_Login.php";
    echo '<script>window.location = "'.$ref.'";</script>';
    exit;
}
$roomObj = new Room();
$historyObj = new History_Data();
$billObj    = new Bill_Data();
$roomData = $roomObj->getRoomsData();

$page_title = 'Attendance';
if(isset($_POST['submit']))
{
    $present  = array();
    $absent   = array();
    $late     = array();
    $attendance = array();
    $id_arr = array();

    foreach ($_POST as $key => $row)
    {
        if ($key != 'submit')
        {
            array_push($attendance,[$key,$row]);
        }
    }


    foreach ($attendance as $value)
    {
        if ($value[1] == 'Present')
        {
            array_push($present,$value[0]);
        }
        elseif($value[1] == 'Late')
        {
            array_push($late,$value[0]);
        }
        elseif($value[1] == 'Absent')
        {
            array_push($absent,$value[0]);
        }

    }

    $billObj->setFineBill($absent,'Absent');
    $billObj->setFineBill($late,'Late');
     $historyObj->addingAttendanceData($attendance);



}
?>
<div class="twelve wide column">
    <form action="Attendance.php" method="post">
    <div class="ui grid twelve wide column" style="margin-top: 10px; margin-bottom: 10px">
        <div class="ui left floated">
            <button class="ui primary button" name="submit" type="submit">Submit</button>
            <button class="ui negative button" id="reset">Deselect</button>
        </div>
    </div>
        <div class="ui internally celled grid">
            <?php
                $countRoom = 0;
                for ($rowCount = 0; $rowCount < 10; $rowCount++)
                {
                    echo '<div class="row">';
                    for ($i = 0; $i < 4; $i++)
                    {
                        if ($roomData[$countRoom]['ROOM_STATUS'] == 'Available') {
                            echo "<div class='four wide column'>";
                            echo "<div class='medium'>Room : ";
                            print_r($roomData[$countRoom]['ROOM_ID']);
                            echo "</div>";
                            echo '<div class="short">
                                Student ID : ';
                            echo $roomData[$countRoom]['STUDENT_ID'];
                            echo '</div>
                                <div class="ui form">
                                    <div class="inline fields">
                                        <div class="field">
                                            <div class="ui radio checkbox">
                                                <input value="Present" type="radio" name='.$roomData[$countRoom]['STUDENT_ID'].' checked="checked">
                                                <label>P</label>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="ui radio checkbox">
                                                <input value="Late" type="radio" name='.$roomData[$countRoom]['STUDENT_ID'].'>
                                                <label>L</label>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="ui radio checkbox">
                                                <input value="Absent" type="radio" name='.$roomData[$countRoom]['STUDENT_ID'].'>
                                                <label>A</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                            echo "</div>";
                        }
                        else
                        {
                            echo "<div class='four wide column'>";
                            echo "<div class='medium'>Room : ";
                            print_r($roomData[$countRoom]['ROOM_ID']);
                            echo "</div>";
                            echo '<div class="short">
                                    No Student
                                 </div>';

                            echo "</div>";
                        }

                        $countRoom = $countRoom+1;

                    }
                    echo '</div>';
                }


            ?>

            </div>
    <script>

            $('#reset').on('click', function() {
                $('input[type=radio]').prop('checked', function () {
                    return this.getAttribute('checked') == 'checked';
                });
            })

    </script>

<?php
include_once 'Layout_Footer.php';
?>