<?php
require_once('database/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $profile = $_POST['profile'];
    
    // Call the createStudent function
    createStudent([
        'name' => $name,
        'age' => $age,
        'email' => $email,
        'profile' => $profile
    ]);
    
    header('Location: index.php');
}
?>