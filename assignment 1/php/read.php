<?php
// Include database connection configuration
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .record-details {
            margin-bottom: 10px;
        }
        .record-details label {
            font-weight: bold;
        }
        .record-details span {
            color: #333;
        }
        .error-message {
            color: #ff0000;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Include database connection configuration
        include("config.php");

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM college_courses WHERE course_id=$id"; // Changed table name and column names
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>
        <div class="record-details">
            <label>Course Name:</label>
            <span><?php echo $row["course_name"]; ?></span>
        </div>
        <div class="record-details">
            <label>Course Fees:</label>
            <span><?php echo $row["course_fees"]; ?></span>
        </div>
        <div class="record-details">
            <label>Total Years of Completion:</label>
            <span><?php echo $row["total_years_completion"]; ?></span>
        </div>
        <?php
            } else {
                echo "<div class='error-message'>Course not found</div>";
            }
        } else {
            echo "<div class='error-message'>Invalid request</div>";
        }
        ?>
    </div>
</body>
</html>
