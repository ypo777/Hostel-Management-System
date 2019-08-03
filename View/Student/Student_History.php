<?php
session_start();
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
$studentObj = new Student();
$studentData = $studentObj->getStudentData($id);
$page_title = $studentData['STUDENT_NAME'];
include_once 'Layout_Header.php';

list($fees,$bhistory,$attendance) = $studentObj->setupHome($id);

if (isset($_GET['table']))
{
    $_SESSION['current'] = $_GET['table'];

    $_SESSION['current'] = $_SESSION['current'] .' '.' History ';
}
else
{
    $_SESSION['current'] = 'Fees History';
}

?>
<div class="ui twelve wide column" style="min-height: 800px">
    <h1 class="ui header">
        <?php echo $studentData['STUDENT_NAME'];?> 's History
    </h1>


    <h4 class="ui header">
        <i class="table icon"></i>
        <div class="content">
            Current
            <div class="ui inline dropdown">
                <div class="text"><?php echo $_SESSION['current']; ?></div>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a href="Student_History.php?table=Fees" class="active item" data-text="Fees">Fees History</a>
                    <a href="Student_History.php?table=Bill" class="item" data-text="Bill History">Bill History</a>
                    <a href="Student_History.php?table=Attendance" class="item" data-text="Attendance History">Attendance History</a>
                </div>
            </div>
        </div>
    </h4>
    <?php
    if (isset($_GET['table']))
    {
        if ($_GET['table'] == 'Fees')
        {
            echo '<table class="ui celled sortable table">
                        <thead>
                        <tr>
                            <th>Type</th>
                            <th>ROOM ID</th>
                            <th>Amount</th>
                            <th>Due Date</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>';
            $table_header = array('Type','ROOM_ID','AMOUNT','DUE_DATE','DESCRIPTION');
            foreach ($fees as $row)
            {

                if ($row['Type'] == 'Absent') {
                    echo '<tr class="negative">';
                    for ($i = 0; $i < count($table_header); $i++) {

                        echo '<td class="">';
                        echo $row[$table_header[$i]];
                        echo '</td>';
                    }
                    echo '</tr>';
                }
                elseif ($row['Type'] == 'Late') {
                    echo '<tr class="warning">';
                    for ($i = 0; $i < count($table_header); $i++) {

                        echo '<td class="">';
                        echo $row[$table_header[$i]];
                        echo '</td>';
                    }
                    echo '</tr>';
                }
            }
        }
        elseif ($_GET['table'] == 'Bill')
        {
            echo '<table class="ui celled sortable table">
                        <thead>
                        <tr>
                            <th>Type</th>
                            <th>ROOM ID</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>';
            $table_header = array('Type','ROOM_ID','AMOUNT','DATE','DESCRIPTION');
            foreach ($bhistory as $row)
            {
                echo '<tr>';
                for ($i = 0 ; $i < count($table_header); $i ++)
                {
                    echo '<td>';
                    echo $row[$table_header[$i]];
                    echo '</td>';
                }
                echo '</tr>';
            }
        }
        elseif ($_GET['table'] == 'Attendance')
        {
            echo '<table class="ui celled sortable table">
                        <thead>
                        <tr>
                            <th>Type</th>
                            <th>ROOM ID</th>
                            <th>Date</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>';
            $table_header = array('Type','ROOM_ID','DATE','DESCRIPTION');
            foreach ($attendance as $row)
            {
                if ($row['DESCRIPTION'] == 'Absent') {
                    echo '<tr class="negative">';
                    for ($i = 0; $i < count($table_header); $i++) {

                        echo '<td class="">';
                        echo $row[$table_header[$i]];
                        echo '</td>';
                    }
                    echo '</tr>';
                }
                elseif ($row['DESCRIPTION'] == 'Late') {
                    echo '<tr class="warning">';
                    for ($i = 0; $i < count($table_header); $i++) {

                        echo '<td class="">';
                        echo $row[$table_header[$i]];
                        echo '</td>';
                    }
                    echo '</tr>';
                }
                elseif($row['DESCRIPTION']== 'Present'){
                    echo '<tr class="positive">';
                    for ($i = 0; $i < count($table_header); $i++) {

                        echo '<td class="">';
                        echo $row[$table_header[$i]];
                        echo '</td>';
                    }
                    echo '</tr>';
                }

            }
        }
    }
    else
    {
        echo '<table class="ui celled sortable table">
                        <thead>
                        <tr>
                            <th>Type</th>
                            <th>ROOM ID</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>';
        $table_header = array('Type','ROOM_ID','AMOUNT','DUE_DATE','DESCRIPTION');
        foreach ($fees as $row)
        {
            if ($row['Type'] == 'Absent') {
                echo '<tr class="negative">';
                for ($i = 0; $i < count($table_header); $i++) {

                    echo '<td class="">';
                    echo $row[$table_header[$i]];
                    echo '</td>';
                }
                echo '</tr>';
            }
            elseif ($row['Type'] == 'Late') {
                echo '<tr class="warning">';
                for ($i = 0; $i < count($table_header); $i++) {

                    echo '<td class="">';
                    echo $row[$table_header[$i]];
                    echo '</td>';
                }
                echo '</tr>';
            }
        }
    }

    ?>

    </tbody>
    </table>
</div>

<?php
include_once 'Layout_Footer.php';
?>
