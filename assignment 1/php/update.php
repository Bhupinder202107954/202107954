<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }
        form {
            width: 50%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label, input {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Update Course</h1>
    <form action="process_update.php" method="post">
        <?php 
            include("config.php");
            
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM college_courses WHERE course_id=$id"; // Changed table name
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo '<input type="hidden" name="id" value="' . $id . '">';
                    echo '<label for="course_name">Course Name:</label><br>';
                    echo '<input type="text" id="course_name" name="course_name" value="' . $row['course_name'] . '" required><br>';
                    echo '<label for="course_fees">Course Fees:</label><br>';
                    echo '<input type="number" id="course_fees" name="course_fees" value="' . $row['course_fees'] . '" step="0.01" required><br>';
                    echo '<label for="total_years_completion">Total Years of Completion:</label><br>';
                    echo '<input type="number" id="total_years_completion" name="total_years_completion" value="' . $row['total_years_completion'] . '" required><br><br>';
                    echo '<input type="submit" value="Update">';
                } else {
                    echo "Course not found";
                    exit();
                }
            } else {
                echo "Invalid request";
                exit();
            }
        ?>
    </form>
</body>

</html>
