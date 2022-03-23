<?php
    // INCLUDE CONFIGURATION
    require_once "dbcred/config.php";
    $user_email;
    $user_pass;
    // get data here
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user_email = $_POST['email'];
        $user_pass = $_POST['pass'];

        // sql command
        $sql = "INSERT INTO user (email, pass) VALUES (?,?)";
        if($stmt = mysqli_prepare($sql_try, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $user_email,$user_pass);
            
            // // Set parameters
            // $param_name = $name;
            // $param_address = $address;
            // $param_salary = $salary;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);

?>