<?php
include 'config.php';

$id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $mail_status = $_POST['mail_status'];
    
    $sql = "UPDATE users SET name='$name', email='$email', gender='$gender', mail_status='$mail_status' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($sql);
$student = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="./css.css/css.css">
    
</head>
<body>
    <div class="contener">
    <h1>Edit Student</h1>
    <?php if ($student): ?>
        <form class="form-group" method="post" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($student['Name']); ?>" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($student['Email']); ?>" required><br>
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="M" <?php if ($student['gender'] == 'M') echo 'selected'; ?>>Male</option>
                <option value="F" <?php if ($student['gender'] == 'F') echo 'selected'; ?>>Female</option>
            </select><br>
            <label for="mail_status">Mail Status:</label>
            <select id="mail_status" name="mail_status" required>
                <option value="yes" <?php if ($student['MAIL_Status'] == 'yes') echo 'selected'; ?>>Yes</option>
                <option value="no" <?php if ($student['MAIL_Status'] == 'no') echo 'selected'; ?>>No</option>
            </select><br>
            <div class="button-container">
                <input type="submit" value="Update Student" class="green-button">
                <a href="index.php" class="green-button">Back to Home</a>
            </div>
        </form>
    <?php else: ?>
        <p>Student not found.</p>
        <a href="index.php" class="green-button">Back to Home</a>
    <?php endif; ?>
    </div>
</body>
</html>
<?php
$conn->close();
?>
