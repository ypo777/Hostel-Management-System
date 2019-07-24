<?php
session_start();
include_once '../../Controller/db_setup.php';

$dbObj = new Database();
?>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Student Login</title>
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
if (isset($_POST['login']))
{
    $em = $_POST['email'];
    $sql = "SELECT * FROM STUDENT WHERE EMAIL = "."'$em'";

    $conn = $dbObj->getConnection();
    $stmt  = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$data)
    {
        ?>
        <div class="ui middle aligned center aligned gird">
            <div class="column">
                <div class="ui mini modal">
                    <div class="header">CANNOT LOGIN</div>
                    <div class="content">
                        <p>
                            Wrong Email !
                            Make sure your register first
                        </p>
                    </div>
                    <div class="actions">
                        <a href="../SetUp/Register.php" class="ui green ok button">Register</a>
                        <div class="ui cancel negative button">Cancel</div>
                    </div>
                </div>
            </div>
        </div>
        <script>$('.ui.mini.modal')
                .modal('show');
        </script>
<?php
    }
    elseif (isset($data))
    {
        if ($data['PASSWORD'] == $_POST['password'])
        {
            $_SESSION['studentIDSession'] = $data['STUDENT_ID'];
            $ref = 'Student_Home.php';
            echo '<script>window.location = "'.$ref.'";</script>';
            exit;
        }
        elseif ($data['PASSWORD'] != $_POST['password'])
        {
            ?>
        <div class="ui middle aligned center aligned gird">
            <div class="column">
                <div class="ui mini modal">
                    <div class="header">CANNOT LOGIN</div>
                    <div class="content">
                        <p>
                            Wrong Password !

                        </p>
                    </div>
                    <div class="actions">
                        <a  class="ui green ok button">OK</a>
                        <div class="ui cancel negative button">Cancel</div>
                    </div>
                </div>
            </div>
        </div>
        <script>$('.ui.mini.modal')
                .modal('show');
        </script>
<?php
        }
    }

}
?>
<div class="ui middle aligned center aligned grid">
    <div class="column">
        <form class="ui large form" style="max-width: 300px; margin-left: 175px" action="Student_Login.php" method="post">
            <div class="ui stacked segment">
                <div class="ui dividing header">
                    <h1 class="ui header">Student Login</h1>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="at icon"></i>
                        <input type="text" name="email" placeholder="E-mail address">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class=" lock icon"></i>
                        <input type="password" name="password" placeholder="**********">
                    </div>
                </div>
                <button name="login" class="ui fluid large teal submit button">Login</button>
            </div>

            <div class="ui error message"></div>
        </form>
    </div>
</div>




<iframe frameborder="0" scrolling="no" style="background-color: transparent; border: 0px; display: none;"></iframe><div id="GOOGLE_INPUT_CHEXT_FLAG" input="" input_stat="{&quot;tlang&quot;:true,&quot;tsbc&quot;:true,&quot;pun&quot;:true,&quot;mk&quot;:true,&quot;ss&quot;:true}" style="display: none;">

</div>
</body>
</html>