<?php      
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  

    // Trim whitespace from username and password
    $username = trim($username);
    $password = trim($password);
    
    // Check if username or password is empty
    if (empty($username) || empty($password)) {
        echo "<script>alert('Username and Password fields cannot be empty'); window.location.href = 'login.php';</script>";
        exit();
    }
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from administrators where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if ($count == 1) {
            echo "Login successfully!";
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<script>alert('Incorrect Username or Password'); window.location.href = 'login.php';</script>";
            exit();
        }
        
         
?>  