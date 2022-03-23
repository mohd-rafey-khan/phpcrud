<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>
<body>
    
    <div style="margin-top:10px;" class="container">
        <form action="create.php" method="post">
            <label for="">Email</label>
            <input type="email" name="email">
            <label for="">Password</label>
            <input type="password" name="pass">
            <input type="submit">
        </form>

        <table style="margin-top:50px;" class="table table-striped">
            <thead>
                <tr>
                    <td> <b>Email</b></td>
                    <td>  <b> Password</b> </td>
                </tr>
            </thead>
            <tbody>
                <!-- php code to fetch database -->
                <?php
                    // include file config
                    require_once "dbcred/config.php";
                    $sql = "SELECT * FROM user";
                    if($result = mysqli_query($sql_try, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                        echo  "<td>" . $row['email'] . "</td>";
                                        echo  "<td>" . $row['pass'] . "</td>";
                                        echo  "<td>  <form action='delete.php'  method='post'>  <input style='display:none;' name='id' value=".$row['id']."> <button type='submit'>Delete</button>  </form>  </td>"; 
                                echo "</tr>";
                            }
                            mysqli_free_result($result);
                        }else{
                            echo "There is no data is present";
                        }
                    }
                    mysqli_close($sql_try);
                ?>
            </tbody>
        </table>

    </div>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>