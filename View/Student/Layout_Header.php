<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../../semantic/out/semantic.min.css">
    <link rel="stylesheet" href="../../node_modules/semantic-ui/dist/components/icon.min.css">
    <link rel="stylesheet" href="../../node_modules/semantic-ui/dist/components/image.min.css">
    <link rel="stylesheet" href="../../node_modules/semantic-ui/dist/components/header.min.css">
    <link rel="stylesheet" href="../../node_modules/semantic-ui/dist/components/input.min.css">

    <title><?php echo isset($page_title) ? $page_title : 'Hostel' ;?></title>
    <style>
        .ui.vertical.menu .item > i.icon.left {
            float: none;
            margin: 0em 0.35714286em 0em 0em;
        }
    </style>
</head>
<body class="pusher">
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="../../Custom/tablesort.js"></script>

<script src="../../semantic/out/semantic.js">
</script>
<script src="../../semantic/out/semantic.min.js">
</script>
<script src="../../semantic/out/components/dropdown.js">
</script>

<div class="ui container raised segment">

    <div class="ui  huge secondary menu">
        <div class="header item">
            Hostel Management
        </div>
        <div class="right menu">
            <a class="item">
                About
            </a>
            <a class="right item">

                Contact Us
            </a>
        </div>
    </div>
    <hr>
    <div class="ui grid">
        <div class="four wide column">
            <div class="ui secondary vertical menu">
                <a href="Student_Home.php" class=" item">
                    <h3 class="ui header">
                    <i class="home left icon"></i>Home
                    </h3>
                </a>
                <a href="Student_History.php" class="item">
                    <h3 class="ui header">
                    <i class="history left icon"></i>Your History
                    </h3>
                </a>
                <a class="item">
                    <h3 class="ui header">
                    <i class="paper plane left icon"></i>FeedBack
                    </h3>
                </a>
                <a href="Log_out.php" class="item" style="margin-top: 50px">
                    <i class="left sign in alternate icon"></i>Log Out
                </a>
            </div>
        </div>
