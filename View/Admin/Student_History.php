<?php

include_once 'Layout_header.php';
?>

<div class="twelve wide column" style="margin-top: 20px; min-height: 800px">

    <button class="ui button">
        Profile
    </button>

    <button class="ui primary button">History</button>

    <hr>
    <h1 class="ui header">
        Mg Mg 's History
    </h1>

    <div class="ui floating labeled icon dropdown button">
        <i class="table icon"></i>
        <span class="text">Choose Table</span>
        <div class="menu">
            <div class="item">
                Fees
            </div>
            <div class="item">
                Bill History
            </div>
            <div class="item">
                Attendance History
            </div>
        </div>
    </div>

    <table class="ui celled table">
        <thead>
            <tr>
                <th>Type</th>
                <th>Student ID</th>
                <th>ROOM ID</th>
                <th>Date</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-label="Type">James</td>
                <td data-label="Student ID">24</td>
                <td data-label="Room ID">Engineer</td>
                <td data-label="Date">CS</td>
                <td data-label="Description">1</td>
            </tr>
        </tbody>
    </table>
</div>






<?php
include_once 'Layout_Footer.php';
?>
