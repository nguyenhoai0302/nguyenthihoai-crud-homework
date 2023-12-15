<?php require_once('partial/header.php'); ?>
<?php require_once('database/database.php'); 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $student = selectOneStudent($id);

        if ($student == false) {
            echo "<p>Student not found.</p>";
            exit();
        }
        } else {
            echo "<p>Invalid student ID.</p>";
            exit();
        }
?>

<div class="container p-4">
    <h2>Edit Student</h2>
    <form action="update_model.php" method="post">
    <input type="hidden" name="id" value="<?php echo $student['id']; ?>" >

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $student['name']; ?>">
        </div>
        <div class="form-group">
            <input type="number" class="form-control" placeholder="Age" name="age" value="<?php echo $student['age']; ?>">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $student['email']; ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Image URL" name="profile" value="<?php echo $student['profile']; ?>">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </div>
    </form>
</div>

<?php require_once('partial/footer.php'); ?>