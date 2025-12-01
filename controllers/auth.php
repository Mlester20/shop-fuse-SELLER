<?php
session_start();
require '../includes/config.php';

    //check server request method if POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $db = new Database();
        $con = $db->getConnection();
        $email = $con->real_escape_string(trim($_POST['email']));
        $password = $con->real_escape_string(trim(sha1($_POST['password'])));
        
        //perform query using try, catch, finally, and prepared statements
        try{
            $query = "SELECT seller_id, name, shop_name FROM sellers WHERE email = ? AND password = ? LIMIT 1";
            $stmt = $con->prepare($query);

            if($stmt){
                mysqli_stmt_bind_param($stmt, "ss", $email, $password);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if($row = mysqli_fetch_assoc($result)){
                    //set session variables
                    $_SESSION['seller_id'] = $row['seller_id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['shop_name'] = $row['shop_name'];

                    //redirect to dashboard
                    header("Location: ../public/dashboard.php");
                    exit();
                }else{
                    throw new Exception("Invalid email or password.");
                }
            }else{
                throw new Exception("Failed to prepare statement: " . $con->error);
            }

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();

        }finally{
            $db->closeConnection();
        }
        
    }

?>