<?php

    $conn = mysqli_connect("localhost","u451702836_line_covid19","Su7270112720.","u451702836_line_covid19");

    $conn->set_charset("utf8");

    if(!$conn) {
        die("Failed to connec to database" . mysqli_error($conn));
    }
?>

<?php

    // $conn = mysqli_connect("localhost","root","","smilethairoof");

    // $conn->set_charset("utf8");

    // if(!$conn) {
    //     die("Failed to connec to database" . mysqli_error($conn));
    // }
?>