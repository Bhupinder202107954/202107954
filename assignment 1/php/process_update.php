<?php
// Include database connection configuration
include("config.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST["id"];
    $course_name = $_POST["course_name"];
    $course_fees = $_POST["course_fees"];
    $total_years_completion = $_POST["total_years_completion"];

    // Perform validation (optional)

    // Update record in the database
    $sql = "UPDATE college_courses SET course_name='$course_name', course_fees='$course_fees', total_years_completion='$total_years_completion' WHERE course_id=$id"; // Changed table name and column names
    if ($conn->query($sql) === TRUE) {
        // Redirect to a success page or display a success message
        header("Location: index.php");
        exit();
    } else {
        // Redirect to an error page or display an error message
        header("Location: error_update.php");
        exit();
    }
} else {
    // Redirect to an error page or display an error message for invalid request
    header("Location: error_update.php");
    exit();
}
?>
