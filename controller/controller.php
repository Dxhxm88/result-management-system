<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// if(isset($_SESSION['email'])) {
//     $path = route('admin/');
//     header("Location: $path");
// }

$conn = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']);

// Check for connection errors
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

function login($data)
{
    $email = $data['email'];
    $password = $data['password'];
    $query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";

    $result = mysqlj($query);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        $name = $row['name'];
        // User exists, log in
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
        alert("Login successfully!");
        redirect(route('admin/'));
    } else {
        // User does not exist, display an error message
        alert("Invalid username or password");
    }
}

function logout()
{
    session_destroy();
    header('Location: index.php');
}

function mysqlj($query)
{
    global $conn;
    return mysqli_query($conn, $query);
}

function alert($message)
{
    echo "<script>alert('$message');</script>";
}

function redirect($path)
{
    echo "<script>setTimeout(function() {window.location.href = '$path';}, 0);</script>";
}

function getTotalSubject()
{
    $query = "SELECT * FROM subjects";
    $result = mysqlj($query);

    return $result->num_rows;
}

function getTotalClasses()
{
    $query = "SELECT * FROM classes";
    $result = mysqlj($query);

    return $result->num_rows;
}

function getTotalStudents()
{
    $query = "SELECT * FROM students";
    $result = mysqlj($query);

    return $result->num_rows;
}

function getAllStudents()
{
    $students = array();
    $query = "SELECT students.*, classes.name AS class_name, classes.year FROM students INNER JOIN classes ON students.class_id = classes.id";
    $result = mysqlj($query);

    while ($row = mysqli_fetch_assoc($result)) {
        $students[] = $row;
    }

    return $students;
}

function deleteStudent($id)
{
    $query = "DELETE FROM students WHERE id=$id";
    $result = mysqlj($query);

    // Check if the DELETE statement was successful
    if ($result) {
        alert("Student was deleted successfully.");
    } else {
        alert("Error deleting student");
    }
}

function getStudent($id)
{
    $query = "SELECT * FROM students WHERE id=$id";
    $result = mysqlj($query);

    return mysqli_fetch_assoc($result);
}

function getStudentByIc($ic)
{
    $query = "SELECT * FROM students WHERE ic=$ic";
    $result = mysqlj($query);

    if ($result) {
        return mysqli_fetch_assoc($result);
    }

    return null;
}

function updateStudent($data, $id)
{
    $name = $data['name'];
    $ic = $data['ic'];
    $gender = $data['gender'];
    $address = $data['address'];
    $phone = $data['phone'];
    $class = $data['class'];

    $query = "UPDATE students SET name='$name', ic='$ic', gender='$gender', address='$address', phone='$phone', class_id=$class WHERE id = $id";
    $result = mysqlj($query);

    // Check if the UPDATE statement was successful
    if ($result) {
        alert("Student updated successfully.");
        redirect(route('admin/student.php'));
    } else {
        alert("Error updating student");
    }
}

function storeStudent($data)
{
    $name = $data['name'];
    $ic = $data['ic'];
    $gender = $data['gender'];
    $address = $data['address'];
    $phone = $data['phone'];
    $class = $data['class'];

    $query = "INSERT INTO students (name,ic,gender,address,phone,class_id) VALUES ('$name', '$ic', '$gender', '$address', '$phone', $class)";
    $result = mysqlj($query);

    // Check if the UPDATE statement was successful
    if ($result) {
        alert("Student added successfully.");
        redirect(route('admin/student.php'));
    } else {
        alert("Error add student");
    }
}

function getAllClasses()
{
    $classes = array();
    $query = "SELECT * FROM classes";
    $result = mysqlj($query);
    while ($row = mysqli_fetch_assoc($result)) {
        $classes[] = $row;
    }

    return $classes;
}

function getClass($id)
{
    $query = "SELECT * FROM classes WHERE id=$id";
    $result = mysqlj($query);

    return mysqli_fetch_assoc($result);
}

function updateClass($data, $id)
{
    $name = $data['name'];
    $year = $data['year'];

    $query = "UPDATE classes SET name='$name', year='$year' WHERE id = $id";
    $result = mysqlj($query);

    // Check if the UPDATE statement was successful
    if ($result) {
        alert("Class updated successfully.");
        redirect(route('admin/classes.php'));
    } else {
        alert("Error updating class");
    }
}

function storeClass($data)
{
    $name = $data['name'];
    $year = $data['year'];

    $query = "INSERT INTO classes (name,year) VALUES ('$name', '$year')";
    $result = mysqlj($query);

    // Check if the UPDATE statement was successful
    if ($result) {
        alert("Class added successfully.");
        redirect(route('admin/classes.php'));
    } else {
        alert("Error add class");
    }
}

function deleteClass($id)
{
    $query = "DELETE FROM classes WHERE id=$id";
    $result = mysqlj($query);

    // Check if the DELETE statement was successful
    if ($result) {
        alert("Class was deleted successfully.");
    } else {
        alert("Error deleting class");
    }
}

function getAllSubjects()
{
    $data = array();
    $query = "SELECT * FROM subjects";
    $result = mysqlj($query);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

function getSubject($id)
{
    $query = "SELECT * FROM subjects WHERE id=$id";
    $result = mysqlj($query);

    return mysqli_fetch_assoc($result);
}

function updateSubject($data, $id)
{
    $name = $data['name'];
    $code = $data['code'];
    $description = $data['description'];

    $query = "UPDATE subjects SET name='$name', code='$code', description='$description' WHERE id = $id";
    $result = mysqlj($query);

    // Check if the UPDATE statement was successful
    if ($result) {
        alert("Subject updated successfully.");
        redirect(route('admin/subject.php'));
    } else {
        alert("Error updating subject");
    }
}

function storeSubject($data)
{
    $name = $data['name'];
    $code = $data['code'];
    $description = $data['description'];

    $query = "INSERT INTO subjects (name,code, description) VALUES ('$name', '$code', '$description')";
    $result = mysqlj($query);

    // Check if the UPDATE statement was successful
    if ($result) {
        alert("Subject added successfully.");
        redirect(route('admin/subject.php'));
    } else {
        alert("Error add subject");
    }
}

function deleteSubject($id)
{
    global $conn;
    $query = "DELETE FROM subjects WHERE id=$id";
    $result = mysqlj($query);

    // Check if the DELETE statement was successful
    if ($result) {
        alert("Subject was deleted successfully.");
    } else {
        $ms = "Error deleting subject: " . mysqli_error($conn);
        alert($ms);
    }
}

function getResult($ic)
{
    $student = getStudentByIc($ic);

    if ($student) {
        $results = array();
        $results['student'] = $student;

        $class = getClass($student['class_id']);
        $results['class'] = $class;

        $student_id = $student['id'];

        $query = "SELECT *, r.id as result_id, CASE
        WHEN r.percentage >= 90 THEN 'A+'
        WHEN r.percentage >= 80 THEN 'A'
        WHEN r.percentage >= 70 THEN 'B'
        WHEN r.percentage >= 60 THEN 'C'
        ELSE 'D' END AS grade FROM results r JOIN subjects s ON r.subject_id=s.id  WHERE r.student_id='$student_id'";
        $result = mysqlj($query);

        while ($row = mysqli_fetch_assoc($result)) {
            $results['results'][] = $row;
        }

        return $results;
    } else {
        alert("Student not exists!");
    }
}

function getAllStudentByClass($id)
{
    $students = array();
    $query = "SELECT * FROM students WHERE class_id=$id";
    $result = mysqlj($query);

    while ($row = mysqli_fetch_assoc($result)) {
        $row['total_subject'] = getTotalStudentSubject($row['id']);
        $students[] = $row;
    }

    return $students;
}

function getTotalStudentSubject($id)
{
    $query = "SELECT * FROM results WHERE student_id=$id";
    $result = mysqlj($query);

    return $result->num_rows;
}

function storeResult($data, $ic, $class_id)
{
    $grade = $data['grade'];
    $subject = $data['subject'];
    $student = getStudentByIc($ic);
    $id = $student['id'];

    $query = "INSERT INTO results (subject_id,percentage, student_id) VALUES ('$subject', '$grade', '$id')";
    $result = mysqlj($query);

    // Check if the UPDATE statement was successful
    if ($result) {
        alert("Result added successfully.");
        redirect(route('admin/result.php?class_id=' . $class_id . "&student_id=" . $ic));
    } else {
        alert("Error add result");
    }
}

function getResultById($id)
{
    $query = "SELECT * FROM results WHERE id=$id";
    $result = mysqlj($query);

    return mysqli_fetch_assoc($result);
}

function updateResult($data, $id, $ic, $class_id)
{
    $subject = $data['subject'];
    $grade = $data['grade'];

    $query = "UPDATE results SET subject_id='$subject', percentage='$grade' WHERE id=$id";
    $result = mysqlj($query);

    // Check if the UPDATE statement was successful
    if ($result) {
        alert("Result updated successfully.");
        redirect(route('admin/result.php?class_id=' . $class_id . "&student_id=" . $ic));
    } else {
        alert("Error update result");
    }
}

function deleteResult($id, $class_id, $ic)
{
    $query = "DELETE FROM results WHERE id=$id";
    $result = mysqlj($query);

    // Check if the DELETE statement was successful
    if ($result) {
        alert("Result was deleted successfully.");

        redirect(route('admin/result.php?class_id=' . $class_id . "&student_id=" . $ic));
    } else {
        alert("Error deleting result");
    }
}

function getTotalClassStudent($class_id)
{
    $query = "SELECT * FROM students WHERE class_id=$class_id";
    $result = mysqlj($query);

    return $result->num_rows;
}

function getMessages()
{
    $data = array();
    $query = "SELECT * FROM message";
    $result = mysqlj($query);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

function storeMessage($data)
{
    $name = $data['name'];
    $email = $data['email'];
    $phone = $data['phone'];
    $message = $data['message'];

    $query = "INSERT INTO message (name,email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
    $result = mysqlj($query);

    // Check if the UPDATE statement was successful
    if ($result) {
        alert("Message sent!");
    } else {
        alert("Error sending message");
    }

}
