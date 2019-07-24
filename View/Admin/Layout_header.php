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
<body >
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="../../Custom/tablesort.js"></script>
<script src="../../semantic/out/semantic.js">
</script>
<script src="../../semantic/out/semantic.min.js">
</script>
<script src="../../semantic/out/components/dropdown.js">
</script>

<div class="ui container raised segment" style="">

    <div class="ui secondary huge menu">
        <div class="header item">
            Hostel Management
        </div>
    </div>
    <hr>
    <div class="ui grid">
        <div class="four wide column">
            <div class="ui secondary vertical menu ">
                <a href="Attendance.php" class="item">
                    <h3 class="ui header"> <i class="left bed icon"></i>
                        Rooms</h3>
                </a>
                <a href="Pending.php" class="item">
                    <h3 class="ui header"><i class="left hourglass half icon"></i>
                        Request Student
                    </h3>
                </a>
                <a href="Bill_Management.php" class="item">
                    <h3 class="ui header">
                    <i class=" left dollar sign icon"></i>
                    Bill Management
                    </h3>
                </a>
                <a href="Student_Data.php" class="item">
                    <h3 class="ui header">
                    <i class=" left id badge icon"></i>
                    Student Data
                    </h3>
                </a>

                <a href="Log_out.php" class="bottom item"><i class="left sign in alternate icon"></i> Log Out</a>
            </div>
        </div>