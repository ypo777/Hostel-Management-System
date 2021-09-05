<?php
if(!isset($_SESSION))
{
    session_start();
}
$page_title = 'Bill Management';

include_once 'Layout_header.php';
include_once '../../Controller/Bill_Data.php';
include_once '../../Controller/Student.php';

$billObj = new Bill_Data();

$data = $billObj->getBillInfo();

if (isset($_GET['remove']))
{
    $removeStudentID = $_GET['select'];


    $billObj->removeFees($removeStudentID);


}

?>
<div class="twelve wide column" style="margin-top: 20px">

    <form action="Bill_Management.php" method="get">
    <button type="submit" name="remove" class="ui negative button" style="margin-left: 40px">Remove</button>

<table class="ui celled definition striped table sortable" style="margin-bottom: 30px">
        <thead>
        <tr>
            <th></th>
            <th>No</th>
            <th>STUDENT ID</th>
            <th>ROOM ID</th>
            <th>Type</th>
            <th>Due Date</th>
            <th>Amount</th>
            <th>Admin ID</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach ($data as $key => $row)
            {
                echo '<tr>
                <td>
                    <div class="ui fitted checkbox" style="margin-left: 20%">
                        <input type="checkbox" name="select[]" value="'.$row['No'].'">
                        <label></label>
                    </div>
                </td>';
                foreach ($row as $value)
                {
                    echo '<td>'.$value.'</td>';
                }
                echo '</tr>';
            }
        ?>
        </tbody>
    </table>
    </form>
</div>

<?php
include_once 'Layout_Footer.php';
?>
