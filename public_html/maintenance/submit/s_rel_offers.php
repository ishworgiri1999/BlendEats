<!DOCTYPE html>
<html lang="en">

<?php 
$age_title="Submit Page";
include("../../header.php")?>
<body>

<div class="container mt-5">
    <?php
    $servername = "10.72.1.14";
    $username = "group2";
    $dbpass = "6QOIHm";
    $dbname = "group2";

      //default success if error change color
      echo'<div class="alert alert-success" id="result"role="alert">';

    $conn = new mysqli($servername, $username, $dbpass, $dbname);
    if ($conn->connect_error) {
        $success = FALSE;
        die("Connection failed: " . $conn->connect_error);
    }

    $uid_post = $_POST['chooseuser'];
    $fid_post = $_POST['choosefood']; {
        if (empty($uid_post) || empty($fid_post)) {
            $success = FALSE;
            print "No field should be empty";
        } else {

            $sql = "INSERT INTO   offers(uid,fid) VALUES ($uid_post,$fid_post) ;";
            if ($conn->query($sql) === TRUE) {
                $success = TRUE;
                echo "New record created successfully";
            } else {
                $success = FALSE;
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    echo '</div>';

    if (!$success) {
        echo'<script>
        document.getElementById("result").className = " alert alert-danger"; 
        </script>';
    } 
    $conn->close(); 
    ?>
<br>
<a class ="btn btn-primary" href = "../">Maintenance Page</a>

</div>

</body>
</html>
 