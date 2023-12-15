<?php
require_once('database/database.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = deleteStudent($id);

    if ($result) {
        echo "Student record deleted successfully";
    } else {
        echo "Error deleting student record";
    }

    header('Location: index.php');
}
?>