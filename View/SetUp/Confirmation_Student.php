<?php
session_start();
require_once ("../../Controller/Student.php");
require_once ("../../Controller/Room.php");
require_once ("../../Controller/db_setup.php");
?>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Confirmation</title>
    <link rel="stylesheet" href="../../semantic/out/semantic.min.css">
    <link rel="stylesheet" href="../../node_modules/semantic-ui/dist/components/icon.min.css">
    <link rel="stylesheet" type="text/css" href="../../node_modules/semantic-ui/dist/components/reset.css">
    <link rel="stylesheet" type="text/css" href="../../node_modules/semantic-ui/dist/components/site.css">

    <link rel="stylesheet" type="text/css" href="../../node_modules/semantic-ui/dist/components/container.css">
    <link rel="stylesheet" type="text/css" href="../../node_modules/semantic-ui/dist/components/grid.css">
    <link rel="stylesheet" type="text/css" href="../../node_modules/semantic-ui/dist/components/header.css">
    <link rel="stylesheet" type="text/css" href="../../node_modules/semantic-ui/dist/components/image.css">
    <link rel="stylesheet" type="text/css" href="../../node_modules/semantic-ui/dist/components/menu.css">

    <link rel="stylesheet" type="text/css" href="../../node_modules/semantic-ui/dist/components/divider.css">
    <link rel="stylesheet" type="text/css" href="../../node_modules/semantic-ui/dist/components/segment.css">
    <link rel="stylesheet" type="text/css" href="../../node_modules/semantic-ui/dist/components/form.css">
    <link rel="stylesheet" type="text/css" href="../../node_modules/semantic-ui/dist/components/input.css">
    <link rel="stylesheet" type="text/css" href="../../node_modules/semantic-ui/dist/components/button.css">
    <link rel="stylesheet" type="text/css" href="../../node_modules/semantic-ui/dist/components/list.css">
    <link rel="stylesheet" type="text/css" href="../../node_modules/semantic-ui/dist/components/message.css">
    <link rel="stylesheet" type="text/css" href="../../node_modules/semantic-ui/dist/components/icon.css">

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="../../node_modules/semantic-ui/dist/components/form.js"></script>
    <script src="../../node_modules/semantic-ui/dist/components/transition.js"></script>

    <script src="../../semantic/out/semantic.js">
    </script>
    <script src="../../semantic/out/semantic.min.js">
    </script>
    <script src="../../semantic/out/components/dropdown.js">
    </script>

    <style type="text/css">
        body {
            background-color: white;
        }
        body > .grid {
            height: 70%;
        }
        .column {
            max-width: 700px;
        }
    </style>
    <script>
        $(document)
            .ready(function() {
                $('.ui.form')
                    .form({
                        fields: {
                            email: {
                                identifier  : 'email',
                                rules: [
                                    {
                                        type   : 'empty',
                                        prompt : 'Please enter your e-mail'
                                    },
                                    {
                                        type   : 'email',
                                        prompt : 'Please enter a valid e-mail'
                                    }
                                ]
                            },
                            password: {
                                identifier  : 'password',
                                rules: [
                                    {
                                        type   : 'empty',
                                        prompt : 'Please enter your password'
                                    },
                                    {
                                        type   : 'length[6]',
                                        prompt : 'Your password must be at least 6 characters'
                                    }
                                ]
                            },
                            repassword: {
                                identifier  : 'repassword',
                                rules: [
                                    {
                                        type    : 'empty',
                                        prompt  : 'Re-Enter Your Password '
                                    },

                                ]
                            }
                        }
                    })
                ;
            })
        ;
    </script>
</head>
<body>

<?php
$student = new Student();
$roomObj = new Room();
$dataObj = new Database();

$_SESSION['step'] = 2;
?>

<?php
if (isset($_GET['check']))
{
    $confirm    =   $student->setUp($_GET['email']);
    if (!$confirm)
    {
?>
        <div class="ui middle aligned center aligned gird">
            <div class="column">
                <div class="ui mini modal">
                    <div class="header">Cannot Find Your Email</div>
                    <div class="content">
                        <p>
                            Please Register First
                        </p>
                    </div>
                    <div class="actions">
                        <a href="Register.php" class="ui green ok button">Register</a>
                        <div class="ui cancel negative button">Cancel</div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        echo '<script>$(\'.ui.mini.modal\')
                .modal(\'show\');
                </script>';
    }
    elseif($confirm['SetUp'] == 0)
    {
?>
        <div class="ui middle aligned center aligned gird">
            <div class="column">
                <div class="ui mini modal">
                    <div class="header">Sorry Your still on waiting list</div>
                    <div class="content">
                        <p>
                            We will connect you.
                        </p>
                    </div>
                    <div class="actions">
                        <div href="Register.php" class="ui green ok button">Okay</div>
                        <div class="ui cancel negative button">Cancel</div>
                    </div>
                </div>
            </div>
        </div>
<?php
        echo '<script>$(\'.ui.mini.modal\')
                .modal(\'show\');
                </script>';
    }
    else
    {
        $_SESSION['step'] = 1;
        $_SESSION['ID'] = $confirm['id'];
    }
}
if (isset($_GET['finish']))
{
    $roomData = $roomObj->getRoomData($_SESSION['ID']);
    $roomObj->upDateRoomData($roomData['ROOM_ID']);
    $result = $student->registerStudent($_SESSION['ID'],$roomData['ROOM_ID'],$_GET['password']);

    function newStudentID($roomID)
    {
        $dataBaseObj = new Database();
        $conn = $dataBaseObj->getConnection();

        $sql = "SELECT STUDENT_ID FROM STUDENT WHERE ROOM_ID = ".$roomID;

        try{
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch (PDOException $exception)
        {
            echo 'ID Update : '.$exception;
        }
        return $data;
    }
    $newID = newStudentID($roomData['ROOM_ID']);

    $history = "INSERT INTO Student_History(Type, STUDENT_ID, ROOM_ID, DATE, DESCRIPTION)
                    VALUES (:type,:student_id,:room_id,now(),:description)";
    $t = $dataObj->getConnection();
    $stmt2 = $t->prepare($history);
    $stmt2->bindValue(':type',"Started Date");
    $stmt2->bindValue(':student_id',$newID['STUDENT_ID']);
    $stmt2->bindValue(':room_id',$roomData['ROOM_ID']);
    $stmt2->bindValue(':description',"NOTHING");

    $stmt2->execute();
    $stmt2 = null;

    $studentRoom = "UPDATE ROOM SET STUDENT_ID = ? ,ROOM_STATUS = ? WHERE ROOM_ID = ?";
    $stmt2  =   $t->prepare($studentRoom);
    $stmt2->execute([$newID['STUDENT_ID'],'Available',$roomData['ROOM_ID']]);

    $student->removePending($_SESSION['ID']);

    $_SESSION['step'] = 2;
}

?>

<div class="ui middle aligned center aligned grid">
    <div class="column">
        <?php
            if ($_SESSION['step'] == 0)
            {
                ?>
                <div class="ui ordered steps">
                    <div class="step">
                        <div class="active content">
                            <div class="title">Confirm Email</div>
                            <div class="description">Enter Your Email</div>
                        </div>
                    </div>
                    <div class="disabled  step">
                        <div class="content">
                            <div class="title">Setup Password</div>
                            <div class="description">Enter Your Password</div>
                        </div>
                    </div>
                    <div class="disabled step">
                        <div class="content">
                            <div class="title">Get Room</div>
                            <div class="description">Login To Home Page</div>
                        </div>
                    </div>
                </div>
                <form class="ui large form" style="max-width: 300px; margin-left: 175px" method="get" action="Confirmation_Student.php">
                    <div class="ui stacked segment">
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="at icon"></i>
                                <input type="text" name="email" placeholder="E-mail address">
                            </div>
                        </div>
                        <input class="ui fluid large teal submit button" type="submit" name="check" value="Next Step">
                    </div>

                    <div class="ui error message"></div>
                </form>
        <?php
            }
            elseif ($_SESSION['step'] == 1)
            {
                ?>
                <div class="ui ordered steps">
                    <div class="completed step">
                        <div class="content">
                            <div class="title">Confirm Email</div>
                            <div class="description">Enter Your Email</div>
                        </div>
                    </div>
                    <div class="active step">
                        <div class="content">
                            <div class="title">Setup Password</div>
                            <div class="description">Enter Your Password</div>
                        </div>
                    </div>
                    <div class="disabled step">
                        <div class="content">
                            <div class="title">Get Room</div>
                            <div class="description">Login To Home Page</div>
                        </div>
                    </div>
                </div>
                <form class="ui large form" style="max-width: 300px; margin-left: 175px" method="get" action="Confirmation_Student.php">
                    <div class="ui stacked segment">
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="text" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="password" name="repassword" placeholder="Re-Enter Password">
                            </div>
                        </div>
                        <input class="ui fluid large teal submit button" type="submit" name="finish" value="Next Step">
                    </div>

                    <div class="ui error message"></div>
                </form>
        <?php
        }
            elseif($_SESSION['step'] == 2)
            {
                ?>
                <div class="ui ordered steps">
                    <div class="completed step">
                        <div class="content">
                            <div class="title">Confirm Email</div>
                            <div class="description">Enter Your Email</div>
                        </div>
                    </div>
                    <div class="completed step">
                        <div class="content">
                            <div class="title">Setup Password</div>
                            <div class="description">Enter Your Password</div>
                        </div>
                    </div>
                    <div class="active step">
                        <div class="content">
                            <div class="title">Get Room</div>
                            <div class="description">Login To Home Page</div>
                        </div>
                    </div>
                </div>
                <form class="ui large form" style="max-width: 300px; margin-left: 175px" method="get" action="Confirmation_Student.php">
                    <div class="ui stacked segment">
                        <div class="ui text">
                            <h3 class="ui header">
                                Your Room is <?php echo $roomData['ROOM_ID']; ?>
                            </h3>
                            <h4 class="ui header">
                                Login to Student Page Using your email and password.
                            </h4>
                        </div>
                        <a class="ui fluid large teal submit button" href="../Student/Student_Login.php">Login </a>
                    </div>

                    <div class="ui error message"></div>
                </form>
        <?php
            }
        ?>

    </div>
</div>




<iframe frameborder="0" scrolling="no" style="background-color: transparent; border: 0px; display: none;"></iframe><div id="GOOGLE_INPUT_CHEXT_FLAG" input="" input_stat="{&quot;tlang&quot;:true,&quot;tsbc&quot;:true,&quot;pun&quot;:true,&quot;mk&quot;:true,&quot;ss&quot;:true}" style="display: none;">

</div>


</body>
</html>