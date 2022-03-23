<?php
    if(!empty($_POST['id'])){
        // configure database
        require_once "dbcred/config.php";
        // query for delete
        $sql = "DELETE FROM user WHERE id = ?";
        
        if($stmt = mysqli_prepare($sql_try, $sql)){
            
            mysqli_stmt_bind_param($stmt, "i", $_POST['id']);
            // execute sql query
            if(mysqli_stmt_execute($stmt)){
                // Records Deleted successfully. Redirect to landing page
                header("location: index.php");
                // exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close config connection
        mysqli_close($sql_try);
    }
?>