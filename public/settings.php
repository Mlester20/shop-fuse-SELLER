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
    <title>Profile Settings | <?php require '../includes/title.php'; ?> </title>
    <link rel="stylesheet" href="../dist/output.css">
</head>
<body class="bg-gradient-to-br from-purple-50 via-blue-50 to-pink-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 min-h-screen transition-colors duration-200">

    <!-- Navbar UI -->
    <?php require '../components/navBar.php'; ?>
    

    <!-- js scripts -->
    <script src="../js/auth.js" defer></script>
    <script src="../js/script.js"></script>
</body>
</html>