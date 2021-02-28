<?php
$title = 'Admin Page';
include('includes/head.html');
?>
<body>

<?php
$active3 = "active";
include('includes/navbar.php');

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connect to DB
require('/home/peanggre/connect.php');
$cnxn = connect();
?>

<!-- Container -->
<div id="adminConfirmationForm-div" class="container row mx-auto mt-5 mb-5 justify-content-center text-left">

    <h1 class="text-light">Admin Page</h1>
    <?php

    // 1. Define the base query
    $sql = "SELECT id, first, last, job_title, company, linkedin, how_did_we_meet, message, datestamp FROM guestbook";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql .= " WHERE id = '$id'";
    } else if (isset($_GET['search'])) {
        $searchTerm = $_GET['search'];
        $sql .= " WHERE name LIKE '%$searchTerm%'
                      OR category LIKE '%$searchTerm%'
                      OR city LIKE '%$searchTerm%'";
    }
    $sql .= " ORDER BY datestamp ASC";

    //2. Send the query to the db
    $result = mysqli_query($cnxn, $sql);

    foreach ($result as $row) {
        $id = $row['id'];
        $first = $row['first'];
        $last = $row['last'];
        $job_title = $row['job_title'];
        $company = $row['company'];
        $linkedin = $row['linkedin'];
        $met = $row['met'];
        $message = $row['message'];
        $datestamp = $row['datestamp'];

        echo
        "<tr> <!-- Table Row-->
        <td>$id</td>
        <td>$first</td>
        <td>$last</td>
        <td>$job_title</td>
        <td>$company</td>
        <td>$linkedin</td>
        <td>$met</td>
        <td>$message</td>
        <td>$datestamp</td>
        
    </tr>";
    }
    ?>

</div> <!-- End `adminConfirmationForm-div` -->


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
<script src="../scripts/guestbook.js"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
-->
</body>
</html>