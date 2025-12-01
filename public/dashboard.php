<?php
session_start();
   
    if(!isset($_SESSION['seller_id'])){
        http_response_code(401);
        throw new Exception("Unauthorized Access");
        header('Location: ../index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | <?php require '../includes/title.php'; ?></title>
    <link rel="stylesheet" href="../dist/output.css">
</head>
<body class="bg-gradient-to-br from-purple-50 via-blue-50 to-pink-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 min-h-screen transition-colors duration-200">

    <?php require '../components/navBar.php'; ?>

    <?php require '../components/dashboardUI.php'; ?>    
    

    <!-- footer section -->
    <?php require '../components/footer.php'; ?>

</body>
</html>