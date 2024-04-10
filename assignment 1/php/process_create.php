<?php
// Include database connection configuration
include("config.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $course_name = $_POST["course_name"];
    $course_fees = $_POST["course_fees"];
    $total_years_completion = $_POST["total_years_completion"];

    // Perform validation (optional)

    // Insert record into database
    $sql = "INSERT INTO college_courses (course_name, course_fees, total_years_completion) VALUES ('$course_name', '$course_fees', '$total_years_completion')";
    if ($conn->query($sql) === TRUE) {
        // Redirect to a success page or display a success message
        header("Location: index.php");
        exit();
    } else {
        // Redirect to an error page or display an error message
        header("Location: error.php");
        exit();
    }
} else {
    // Redirect to an error page or display an error message for invalid request
    header("Location: error.php");
    exit();
}
?>
