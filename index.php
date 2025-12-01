<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login to access your seller dashboard">
    <title>Login or Register | <?php require 'includes/title.php'; ?></title>
    <link href="dist/output.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-purple-50 via-blue-50 to-pink-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 min-h-screen transition-colors duration-200">
    
    <!-- Header Component -->
    <?php require 'includes/header.php'; ?>

    <!-- auth component -->
    <?php require 'components/authUI.php'; ?>

    <!-- footer component -->
    <?php require 'components/footer.php'; ?>

    <!-- js scripts -->
    <script src="/js/auth.js" defer></script>
    <script src="/js/script.js"></script>
</body>
</html>