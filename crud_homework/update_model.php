<?php
require_once('database/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $values = [
        'name' => $_POST['name'],
        'age' => $_POST['age'],
        'email' => $_POST['email'],
        'profile' => $_POST['profile']
    ];

    $result = updateStudent($id, $values);

    if ($result) {
        echo "Student record updated successfully";
    } else {
        echo "Error updating student record";
    }

    header('Location: index.php');
}
?>