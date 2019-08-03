<?php
session_start();

include_once '../../Controller/Bill_Data.php';
include_once '../../Controller/Student.php';


if (!isset($_SESSION['studentIDSession']))
{
    $ref = "Student_Login.php";
    echo '<script>window.location = "'.$ref.'";</script>';
    exit;
}
elseif (isset($_SESSION['studentIDSession']))
{
    $id = $_SESSION['studentIDSession'];
}

$billObj = new Bill_Data();
$studentObj = new Student();
$studentData = $studentObj->getStudentData($id);
$page_title = $studentData['STUDENT_NAME'];
include_once 'Layout_Header.php';
list($fees,$bhistory,$attendance) = $studentObj->setupHome($id);



list($absentAmount,$lateAmount,$fineAmount) = $studentObj->billTotal($fees);

$absentTotal = array_sum($absentAmount);
$lateTotal   = array_sum($lateAmount);
$fineTotal   = array_sum($fineAmount);

$attendanceCount = $studentObj->attendanceTotal($attendance);

?>

<div class="ui twelve wide column" style="min-height: 800px">
    <div class="ui raised segment one wide column" style="min-height: 300px">
        <h1 class="ui header">
            <img src="../../Custom/Images/profile.png" class="ui circular  image">
            <?php echo $studentData['STUDENT_NAME'];?> 's Info
        </h1>
                <div class="ui statistics" style="margin-top: 5%">
                    <div class="red statistic">
                        <div class="value">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                   $ <?php echo $absentTotal; ?>
                                </font>
                            </font>
                        </div>
                        <div class="label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                   Total Bill Need To Pay
                                </font></font>
                        </div>
                    </div>
                    <div class="orange statistic">
                        <div class="value">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    <?php echo $attendanceCount[1]; ?>
                                </font>
                            </font>
                        </div>
                        <div class="label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                Total Absent Time
                                </font></font>
                        </div>
                    </div>
                    <div class="orange statistic">
                        <div class="value">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                    <?php echo $attendanceCount[2]; ?>
                                </font>
                            </font>
                        </div>
                        <div class="label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    Total Late Time
                                </font></font>
                        </div>
                    </div>
                </div>
    </div>
</div>

<?php
include_once 'Layout_Footer.php';

?>
