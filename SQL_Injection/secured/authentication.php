<?php      
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
//prevent from mysqli injection  

//stripcslashes($username);This function is used to remove backslashes from the username string. Backslashes are commonly used to escape certain characters, so this function is used to undo the escaping and retrieve the original string.

//stripcslashes($password);Similar to the previous line, this function removes backslashes from the password string.

//$username = mysqli_real_escape_string($con, $username);This line utilizes the mysqli_real_escape_string() function to escape special characters in the username string. It takes two parameters: the database connection object ($con) and the string to be escaped ($username). This function ensures that any special characters are properly encoded to prevent SQL injection attacks. By escaping the characters, the resulting string can be safely used in a SQL query.

//$password = mysqli_real_escape_string($con, $password);This line is similar to the previous one, but it escapes the special characters in the password string.

        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);
      
        $sql = "select *from login where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql); 
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";  
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
?>  