<?php require_once('partial/header.php'); ?>
<?php require_once('database/database.php');?>

<?php db()?>
    <div class="container p-4">
        <div class="d-flex justify-content-end p-2">
            <a href="create_html.php" class="btn btn-primary">Add +</a>
        </div>
        <!-- <div class="card">
            <div class="card-body">
               <div class="d-flex">
                    <div class="card-image mr-3">
                        <img class="img-fluid" width="200" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c0/Young_girl_smiling_in_sunshine_%282%29.jpg/1200px-Young_girl_smiling_in_sunshine_%282%29.jpg" alt="">
                    </div>
                    <div class="info">
                        <h1 class="display-4">Name: Kanha </h1>
                        <strong>Age: 10</strong> 
                        <p>Email: kanha@gmail.com</p>
                    </div>
               </div>
                <div class="action d-flex justify-content-end">
                    <a href="" class="btn btn-primary btn-sm mr-2"><i class="fa fa-pencil"></i></a>
                    <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div> -->

        <?php 
        $students = selectAllStudents();

        if (!empty($students)) {
            foreach ($students as $result) {
                ?>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="card-image mr-3">
                                <img class="img-fluid" width="200" src="<?php echo $result['profile']; ?>">
                            </div>
                            <div class="info">
                                <h1 class="display-4"><?php echo "Name: ". $result['name']; ?></h1>
                                <strong><?php echo "Age: ". $result['age']; ?></strong>
                                <p><?php echo "Email: ". $result['email']; ?></p>
                            </div>
                        </div>
                        <div class="action d-flex justify-content-end">
                            <a href="update_html.php?id=<?php echo $result['id']; ?>" class="btn btn-primary btn-sm mr-2"><i class="fa fa-pencil"></i></a>
                            <a href="delete_model.php?id=<?php echo $result['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "No students found.";
        }
    ?>

    </div>
<?php require_once('partial/footer.php'); ?>