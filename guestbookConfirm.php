<?php
// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connect to DB
require('/home/peanggre/connect.php');
$cnxn = connect();

$active2 = "active";
include('includes/navbar.php');

$title = "Guestbook";
include ('includes/head.html');
include ('includes/functions.php');

?>

<body>

<div class="container" id="main">

    <!-- Jumbotron Header -->
    <div class="jumbotron mt-4" id="jumbo">
        <h1 class="display-4">Peter's Guestbook!</h1>
        <p class="lead">A guestbook you could sign if you want</p>
    </div>

    <?php

    $first = $_POST['fname'];
    $last = $_POST['lname'];
    $job_title = $_POST['jobtitle'];
    $company = $_POST['company'];
    $linkedin = $_POST['linkedin'];
    $met = $_POST['howwemet'];
    $message = $_POST['message'];


    $sql = "INSERT INTO guestbook (first, last, job_title, company, linkedin, met, message, datestamp) VALUES('$first', '$last', '$job_title', '$company', '$linkedin', '$met',
        '$message', NOW() )";
    echo "<p class =text-light> $sql </p>";

    $success = mysqli_query($cnxn, $sql);

    if ($success)
    {
        echo "<h4>Information Added!</h4>";
    }
    else
    {
        echo "Something went wrong";
    }

    ?>
</div>
</body>
