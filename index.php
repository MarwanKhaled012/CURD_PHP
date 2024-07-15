<?php
include 'config.php';

// Fetch students data
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Management</title>
    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="./css.css/css.css" >
</head>
<body>
   <div class="contener">
   <h1>Users Details</h1>
    <div class="button-container">
        <a href="add.php" class="green-button">Add New User</a>
    </div>
    <hr>

    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Mail Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['Name']); ?></td>
                        <td><?php echo htmlspecialchars($row['Email']); ?></td>
                        <td><?php echo htmlspecialchars($row['gender']); ?></td>
                        <td><?php echo htmlspecialchars($row['MAIL_Status']); ?></td>
                        <td class="action-icons">
                            <a href="view.php?id=<?php echo $row['id']; ?>"><i class="fas fa-eye"></i></a>
                            <a href="edit.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No records found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
   </div>
</body>
</html>
<?php
$conn->close();
?>
