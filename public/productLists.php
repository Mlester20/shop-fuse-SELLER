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
    <title>Product Lists | <?php require '../includes/title.php'; ?></title>
    <link rel="stylesheet" href="../dist/output.css">
</head>
<body class="bg-gradient-to-br from-purple-50 via-blue-50 to-pink-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 min-h-screen transition-colors duration-200">
    

    <?php require '../components/navBar.php'; ?>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
        <h1 class="text-3xl font-bold text-center mb-8 text-gray-900 dark:text-white">Product Lists Page</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200 dark:bg-gray-700">
                    <tr>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-700 dark:text-gray-300 uppercase">Product Name</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-700 dark:text-gray-300 uppercase">Description</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-700 dark:text-gray-300 uppercase">Price</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-700 dark:text-gray-300 uppercase">Stock</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-700 dark:text-gray-300 uppercase">Category</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700" id="productTableBody">
                    <tr>
                        <td colspan="5" class="py-4 text-center text-gray-500 dark:text-gray-400">
                            Loading products...
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>


    <!-- scripts -->
    <script src="../js/product.js"></script>
</body>
</html>