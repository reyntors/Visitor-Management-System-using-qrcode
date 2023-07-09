<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Registration</title>
    <link rel="stylesheet" href="css2/styles.css">
</head>
<body>
    <h1>Visitor Registration</h1>
    <form action="php/registration_process.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required><br>

        <label for="purpose">Purpose of Visit:</label>
        <textarea id="purpose" name="purpose" required></textarea><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>

