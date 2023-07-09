<?php
session_start();


// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myvisitor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete record
if (isset($_GET['delete_id'])) {
    $deleteID = $_GET['delete_id'];

    // Delete record from the database
    $deleteQuery = "DELETE FROM visitors WHERE id = $deleteID";
    $conn->query($deleteQuery);
}

// Fetch records
$selectQuery = "SELECT * FROM visitors";
$result = $conn->query($selectQuery);

// Update record
if (isset($_POST['update'])) {
    $updateID = $_POST['update_id'];
    $newName = $_POST['new_name'];

    // Update record in the database
    $updateQuery = "UPDATE visitors SET name = '$newName' WHERE id = $updateID";
    $conn->query($updateQuery);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    
    <link rel="stylesheet" href="css2/styles.css">
</head>
<body class="container2">
    <!-- Logout button -->
    <div class="logout">
     <form class="logout" style="background-color:transparent; box-shadow: none; float: right;"action="logout.php" method="post">
        <input type="submit" value="Logout" class="logout-btn">
    </form>
        </div>
    <h3>Visitor Records</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Purpose</th>
            <th>Date and Time</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['purpose']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
                
                
                <td>
                    <button onclick="showEditForm(<?php echo $row['id']; ?>, '<?php echo $row['name']; ?>')" class="edit-btn">Edit</button>
                </td>
                <td>
                    <a href="?delete_id=<?php echo $row['id']; ?>" class="delete-btn">Delete</a>
                </td>

            </tr>
        <?php } ?>
    </table>
    <div id="editForm" style="display: none;">
        <h3>Edit Visitor</h3>
        <form method="POST" action="">
            <input type="hidden" id="updateID" name="update_id">
            <label for="newName">New Name:</label>
            <input type="text" id="newName" name="new_name">
            <input type="submit" name="update" value="Update">
            <button onclick="cancelEditForm()">Cancel</button>
        </form>
        
    </div>
        
    <script>
        function showEditForm(id, name) {
            document.getElementById("updateID").value = id;
            document.getElementById("newName").value = name;
            document.getElementById("editForm").style.display = "block";
        }

        function cancelEditForm() {
            document.getElementById("editForm").style.display = "none";
        }
    </script>
    

</body>

</html>
