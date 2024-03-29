<?php
if(!isset($_SESSION))
{
    session_start();
}

require_once ("db_setup.php");
include_once 'Header.php';


if (isset($_GET['register']))
{
    $value = $_GET['request'];
    date_default_timezone_set('Asia/Rangoon');
    $timeZone =	date_default_timezone_get();
    $date = date("Y-m-d",time());

    $name           = $value['firstname'].' '.$value['lastname'];
    $email          = $value['email'];
    $currentYear    = $value['year'];
    $rollNumber     = $value['rollno'];
    $major          = $value['major'];
    $address        = $value['address-1'].','.$value['address-2'].','.$value['address-3'];




    $test = new Database();

    $conn = $test->getConnection();

    try {

        $stmt = $conn->prepare("INSERT INTO Pending(name,email,year,roll,address,Major,Requested_DATE,SetUp) values (:name,:email,:year,:roll,:address,:major,:requested_date,:SetUp)");
        $stmt->bindValue(':name',$name);
        $stmt->bindValue(':email',$email);
        $stmt->bindValue(':year',$currentYear);
        $stmt->bindValue(':roll',$rollNumber);
        $stmt->bindValue(':address',$address);
        $stmt->bindValue(':major',$major);
        $stmt->bindValue(':requested_date',$date);
        $stmt->bindValue(':SetUp',0);


        $stmt->execute();
?>
        <div class="ui middle aligned center aligned gird">
            <div class="column">
                <div class="ui mini modal">
                    <div class="header">Register Success</div>
                    <div class="content">
                        <p>
                            We will connect you!
                            If you get email , go to Confirmation Page.
                            Use your email to confirm.
                        </p>
                    </div>
                    <div class="actions">
                        <a href="../View/SetUp/Confirmation_Student.php" class="ui green ok button">Confirm</a>
                        <div class="ui cancel negative button">Cancel</div>
                    </div>
                </div>
            </div>
        </div>
        <script>$('.ui.mini.modal')
                .modal('show');
        </script>
<?php
        echo "<script>window.location('../View/SetUp/Confirmation_Student.php')</script>";



    } catch (PDOException $ex) {
        echo "Data Insert Error : ". $ex->getMessage();
    }




}

class Register_Controller extends Database {

    function getData($email)
    {
        $conn = $this->getConnection();

        $sql = "SELECT STUDENT_ID,PASSWORD from STUDENT WHERE EMAIL = "."'$email'";


        try
        {
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $password = $stmt->fetch(PDO::FETCH_ASSOC);

        }
        catch (PDOException $exception)
        {
            echo 'Login Error'.$exception;
        }

        return $password;
    }
}



?>
