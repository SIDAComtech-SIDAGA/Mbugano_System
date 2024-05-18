<?php
// Include the database configuration file
require_once "../auth.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database configuration file
    require_once "../db_conn.php";

    // Retrieve form data
$schoolID = $_POST['school_id'];
$grade = $_POST['grade'];
$boys = isset($_POST['boys']) ? intval($_POST['boys']) : 0; // Convert to integer, default to 0 if not set
$girls = isset($_POST['girls']) ? intval($_POST['girls']) : 0; // Convert to integer, default to 0 if not set
$classTeacher = $_POST['class_teacher'];

// Calculate total students enrolled
$studentsEnrolled = $boys + $girls;


    // Insert or update the data into the SchoolGradeData table
    try {
        // Check if the data already exists for the given school and grade
        $stmt = $conn->prepare("SELECT * FROM SchoolGradeData WHERE SchoolID = :schoolID AND Grade = :grade");
        $stmt->execute(['schoolID' => $schoolID, 'grade' => $grade]);
        $rowCount = $stmt->rowCount();

        if ($rowCount > 0) {
            // Data exists, update the record
            $sql = "UPDATE SchoolGradeData SET Boys = :boys, Girls = :girls, StudentsEnrolled = :studentsEnrolled, class_teacher = :classTeacher WHERE SchoolID = :schoolID AND Grade = :grade";
        } else {
            // Data doesn't exist, insert a new record
            $sql = "INSERT INTO SchoolGradeData (SchoolID, Grade, Boys, Girls, StudentsEnrolled, class_teacher) VALUES (:schoolID, :grade, :boys, :girls, :studentsEnrolled, :classTeacher)";
        }

        // Prepare and execute the SQL statement
        $stmt = $conn->prepare($sql);
        $stmt->execute(['schoolID' => $schoolID, 'grade' => $grade, 'boys' => $boys, 'girls' => $girls, 'studentsEnrolled' => $studentsEnrolled, 'classTeacher' => $classTeacher]);

        header("Location: add-students.php?success=Data inserted successfully");
            exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
