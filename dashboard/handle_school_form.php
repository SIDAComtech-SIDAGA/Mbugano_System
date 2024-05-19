<?php
// Include the database configuration file
require_once "../db_conn.php";

// require_once "../auth.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    
    $schoolName = $_POST['school_name'];
    $schoolAddress = $_POST['school_address'];
    $headMaster = $_POST['head_master'];
    $headMasterPhone = $_POST['head_master_phone'];
    $aboutSchool = isset($_POST['about_school']) ? $_POST['about_school'] : '';

    // Validate and sanitize the data (you may add more validation)
    // For simplicity, let's assume all fields are required except About School

    // Example of validation (you may extend it as per your requirements)
    $errors = [];
    if (empty($schoolName)) {
        $errors[] = "School Name is required";
    }
    if (empty($schoolAddress)) {
        $errors[] = "School Address is required";
    }
    if (empty($headMaster)) {
        $errors[] = "Head Master Name is required";
    }
    if (empty($headMasterPhone)) {
        $errors[] = "Head Master Phone is required";
    }

    if (empty($errors)) {
        try {
            // Prepare SQL statement
            $sql = "INSERT INTO School_Info (School_Name, School_Address, Head_Master, Head_Master_Phone, About_School)
                    VALUES (:schoolName, :schoolAddress, :headMaster, :headMasterPhone, :aboutSchool)";
            $stmt = $conn->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':schoolName', $schoolName);
            $stmt->bindParam(':schoolAddress', $schoolAddress);
            $stmt->bindParam(':headMaster', $headMaster);
            $stmt->bindParam(':headMasterPhone', $headMasterPhone);
            $stmt->bindParam(':aboutSchool', $aboutSchool);

            // Execute the statement
            $stmt->execute();

            header("Location: add-school.php?success=Data inserted successfully");
            exit;

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        // If there are errors, display them
        foreach ($errors as $error) {
            echo "<p>Error: $error</p>";
        }
    }
}
