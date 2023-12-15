<?php
/**
 * Connect to database
 */
function db() {
    $host     = 'localhost'; 
    $database = 'web_a'; 
    $user     = 'root'; 
    $password = ''; 

    try {
        $db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
        // set the PDO error mode to exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
        return $db; 
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();

    } 
}

/**
 * Create new student record
 */
function createStudent($value) {
    $db = db();

    // Extract the form data
    $name = $value['name'];
    $age = $value['age'];
    $email = $value['email'];
    $profile = $value['profile'];

    // Prepare the SQL statement
    $sql = "INSERT INTO student (name, age, email, profile) VALUES (:name, :age, :email, :profile)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':profile', $profile);

    try {
        $stmt->execute();
        echo "Student record created successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}

/**
 * Get all data from table student
 */
function selectAllStudents() {
    $db = db();
    $sql = "SELECT * FROM student";
    $stmt = $db->query($sql);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

/**
 * Get only one on record by id 
 */
function selectOnestudent($id) {
    $db = db();
    $sql = "SELECT * FROM student WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

/**
 * Delete student by id
 */
function deleteStudent($id) {
    $db = db();
    $sql = "DELETE FROM student WHERE id = :id";

    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return true; 
    } catch (PDOException $e) {
        return false;
    }
}


/**
 * Update students
 * 
 */
function updateStudent($id, $values) {
    $db = db();

    try {
        $query = $db->prepare("UPDATE student SET name = :name, age = :age, email = :email, profile = :profile WHERE id = :id");

        // Gán giá trị từ mảng mới vào các tham số của câu truy vấn
        $query->bindParam(':id', $id);
        $query->bindParam(':name', $values['name']);
        $query->bindParam(':age', $values['age']);
        $query->bindParam(':email', $values['email']);
        $query->bindParam(':profile', $values['profile']);

        // Thực hiện truy vấn
        $result = $query->execute();

        return $result;
    } catch (PDOException $e) {
        // Xử lý lỗi nếu có
        echo "Error updating student: " . $e->getMessage();
        return false;
    }
}
