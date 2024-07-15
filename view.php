<?php
include 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($sql);
$student = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>

<head>
    <title>View Record</title>
    <link rel="stylesheet" href="./css.css/css.css">

<body>
    <div class="contener-v">
        <h1>View Record</h1>
        <?php if ($student) : ?>
            <p>ID: <?php echo htmlspecialchars($student['id']); ?></p>
            <p>Name: <?php echo htmlspecialchars($student['Name']); ?></p>
            <p>Email: <?php echo htmlspecialchars($student['Email']); ?></p>
            <p>Gender: <?php echo htmlspecialchars($student['gender']); ?></p>
            <p>Mail Status: <?php echo htmlspecialchars($student['MAIL_Status']); ?></p>
            <a href="index.php" class="green-link">Back to Home</a>
        <?php else : ?>
            <p>Student not found.</p>
            <a href="index.php" class="green-link">Back to Home</a>
        <?php endif; ?>
    </div>
</body>

</html>
<?php
$conn->close();
?>