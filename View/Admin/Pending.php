<?php
session_start();
$page_title = 'Requested Student List';
include_once 'Layout_header.php';
require_once "../../Controller/Student.php";
require_once "../../Controller/Room.php";

$dbObj = new Database();
$conn = $dbObj->getConnection();
$studentObj = new Student();
$roomObj = new Room();

$sql = "SELECT * FROM Pending";

$result = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);


if(!$result)
{
    $_SESSION['pending'] = 0;
}
else{
    $_SESSION['pending'] = 1;
}

if (isset($_GET['remove']))
{
    $data = $_GET['select'];

    if ($data != null)
    {
        $set = $studentObj->removeFromSetup($data);
        $data = null;
        $ref="Pending.php";
        echo '<script>window.location = "'.$ref.'";</script>';
        exit;
    }
    else
    {
        echo '<script>alert("NO Selected")</script>';
    }
}



?>
<div class="twelve wide column" style="min-height: 800px">

    <form action="Pending.php" method="get" style="margin-top: 20px">

    <button class="ui negative button" style="margin-left: 40px" name="remove" type="submit">Remove</button>

<?php
    if ($_SESSION['pending'] == 0)
    {
?>
        <div class="ui segment">
            <h1 class="ui header negative">
                No request students
            </h1>
        </div>
<?php
    }
    elseif ($_SESSION['pending'] == 1)
        {
            ?>
    <table class="ui celled definition table sortable">
        <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Roll</th>
            <th>Home Address</th>
            <th>Requested Date</th>
        </tr>
        </thead>
            <tbody>
        <?php
                $table_header = array("name","roll","address","Requested_DATE","SetUp");

                for ($i = 0; $i <count($result); $i++)
                {
                    echo '<tr>';
                    echo '<td>
                                <div class="ui fitted checkbox" style="margin-left: 20%">';
                    echo "<input type='checkbox' name='select[]' id='data' value='{$result[$i]['id']}'>";
                    echo '<label></label>
                                </div>
                            </td>';
                    for ($j = 0; $j <count($table_header)-1; $j++)
                    {
                        if ($result[$i]['SetUp'] == 1)
                        {
                            echo "<td class='positive'>";
                            echo  $result[$i][$table_header[$j]];
                            echo "</td>";
                        }
                        else
                        {
                            echo "<td>";
                            echo "<a href='Room_Select.php?id={$result[$i]['id']}'>". $result[$i][$table_header[$j]].'</a>';
                            echo "</td>";
                        }
                    }
                    echo '</tr>';
                }
            ?>

            </tbody>
    </table>
    </form>

</div>

        <?php
    }
include_once 'Layout_Footer.php';
?>
