<?php
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {

    require_once "../auth.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $school_id = $_POST['school_id'];
        $grade = $_POST['grade'];
        $boys = $_POST['boys'];
        $girls = $_POST['girls'];
        $class_teacher = $_POST['class_teacher'];
        $about_class = $_POST['about_class'];

        // Calculate the total students
        $students_enrolled = $boys + $girls;

        try {
            // Prepare the SQL query
            $stmt = $conn->prepare("INSERT INTO schoolgradedata (SchoolID, Grade, Boys, Girls, StudentsEnrolled, class_teacher, about_class) VALUES (:school_id, :grade, :boys, :girls, :students_enrolled, :class_teacher, :about_class)");

            // Bind the parameters
            $stmt->bindParam(':school_id', $school_id);
            $stmt->bindParam(':grade', $grade);
            $stmt->bindParam(':boys', $boys);
            $stmt->bindParam(':girls', $girls);
            $stmt->bindParam(':students_enrolled', $students_enrolled);
            $stmt->bindParam(':class_teacher', $class_teacher);
            $stmt->bindParam(':about_class', $about_class);

            // Execute the query
            $stmt->execute();

            // Redirect with a success message
            header("Location: add-students.php?success=Data has been successfully added");
            exit();

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
} else {
    echo "You must be logged in to view this page.";
}
