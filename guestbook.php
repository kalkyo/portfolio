<?php
$title = 'Guestbook';
include('includes/head.html');
?>
<body>

<?php
$active2 = "active";
include('includes/navbar.php');

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);


// Connect to DB
require('/home/peanggre/connect.php');
$cnxn = connect();

?>

<div class="container" id="main">

    <!-- Jumbotron Header -->
    <div class="jumbotron mt-4" id="jumbo">
        <h1 class="display-4">Peter's Guestbook!</h1>
        <p class="lead">A guestbook you could sign</p>
    </div>

    <!-- Guestbook Form -->
    <form action="guestbookConfirm.php" method="post" id="guestbookform" class="mb-5">
        <!-- Form Info -->
        <fieldset class="form-group p-2">
            <!-- Contact Info -->
            <fieldset class="form-group border p-2">
                <legend>Contact Info</legend>
                <!-- First Name -->
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control" id="fname" placeholder="Enter first name"
                           name="fname">
                    <span class="err" id="err-fname">First name is required</span>
                </div>
                <!-- Last Name -->
                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control" id="lname" placeholder="Enter last name"
                           name="lname">
                    <span class="err" id="err-lname">Last name is required</span>
                </div>
                <!-- Job Title -->
                <div class="form-group">
                    <label for="jobtitle">Job Title</label>
                    <input type="text" class="form-control" id="jobtitle" placeholder="Enter job title"
                           name="jobtitle">
                </div>
                <!-- Company -->
                <div class="form-group">
                    <label for="company">Company</label>
                    <input type="text" class="form-control" id="company" placeholder="Enter company name"
                           name="company">
                </div>
                <!-- LinkedIn URL -->
                <div class="form-group">
                    <label for="linkedin">LinkedIn URL</label>
                    <input type="url" class="form-control" id="linkedin" placeholder="Enter LinkedIn URL"
                           name="linkedin">
                </div>

            </fieldset>
            <!-- How we met-->
            <fieldset class="form-group border p-2">
                <legend>How we met</legend>
                <!-- How did we meet? -->
                <div class="form-group">
                    <label for="howwemet">How did we meet?</label>
                    <select id="howwemet" name="howwemet">
                        <?php
                        $sql = 'SELECT * FROM met';
                        $result = mysqli_query($cnxn, $sql);
                        foreach ($result as $row) {
                            $met_id = $row['met_id'];
                            $how_we_met = $row['how_we_met'];
                            echo "<option value='$how_we_met'>$how_we_met</option>";

                        }

                        ?>
                    </select>
                </div>
                <!-- Other textbox -->
                <div class="form-group">
                    <label for="other">Other (please specify) :</label>
                    <input type="text" class="form-control" id="other" placeholder="Enter other text"
                           name="other">
                </div>
                <!-- Message textarea -->
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea class="form-control" id="message" rows="5"
                              name="message">

                    </textarea>
                </div>
            </fieldset>
            <!-- Mailing list -->
            <fieldset class="form-group border p-2">
                <legend>Mailing list</legend>
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="add">
                    <label class="form-check-label" for="add">
                        "Please add me to your mailing list"
                    </label>
                </div>
                <span class="err" id="err-method">
                    Please enter a valid email
                </span>
                <!-- Email address -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter Email address"
                           name="email">
                    <span class="err" id="err-email">Please enter a valid email</span>
                </div>
                <!-- Email format -->
                <br>
                <p>Please choose an email format:</p>
                <!-- HTML Option-->
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="htmlformat" value="" name="radio">
                    <label class="form-check-label" for="htmlformat">
                        HTML
                    </label>
                </div>
                <!-- Text -->
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="textformat" value="" name="radio">
                    <label class="form-check-label" for="textformat">
                        Text
                    </label>
                </div>
            </fieldset>
        </fieldset>
        <!-- Button -->
        <div class="text-center pb-4">
            <button type="submit" class="btn btn-warning btn-lg">Submit</button>
        </div>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
<script src="scripts/guestbook.js"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
-->
</body>
</html>
