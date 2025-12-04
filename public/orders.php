<?php 
session_start();

if (!isset($_SESSION['seller_id'])) {
    header("Location: ../index.php");
    exit();
}

require '../controllers/ordersController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php require '../includes/title.php'; ?></title>
    <link rel="stylesheet" href="../dist/output.css">
</head>

<body class="bg-gray-100">

<?php require '../components/navBar.php'; ?>

<div class="max-w-6xl mx-auto mt-10 p-6 rounded-xl shadow">

    <h1 class="text-2xl font-bold mb-6 text-center text-white">Orders</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full border">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 border">Order ID</th>
                    <th class="p-3 border">Buyer</th>
                    <th class="p-3 border">Product</th>
                    <th class="p-3 border">Qty</th>
                    <th class="p-3 border">Price</th>
                    <th class="p-3 border">Status</th>
                    <th class="p-3 border">Date</th>
                </tr>
            </thead>

            <tbody class="text-white hover:text-black">
                <?php if (!empty($orders)): ?>
                    <?php foreach ($orders as $o): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 border"><?= $o['order_id']; ?></td>
                            <td class="p-3 border">
                                <div><?= htmlspecialchars($o['buyer_name']); ?></div>
                                <div class="text-xs text-gray-500"><?= htmlspecialchars($o['buyer_email']); ?></div>
                            </td>
                            <td class="p-3 border"><?= htmlspecialchars($o['product_name']); ?></td>
                            <td class="p-3 border"><?= $o['quantity']; ?></td>
                            <td class="p-3 border">₱<?= number_format($o['price'], 2); ?></td>
                            <td class="p-3 border">
                                <span class="px-3 py-1 rounded text-white
                                    <?php
                                        switch ($o['status']) {
                                            case 'pending': echo 'bg-yellow-500'; break;
                                            case 'paid': echo 'bg-indigo-500'; break;
                                            case 'processing': echo 'bg-blue-500'; break;
                                            case 'shipped': echo 'bg-purple-500'; break;
                                            case 'completed': echo 'bg-green-600'; break;
                                            case 'cancelled': echo 'bg-red-600'; break;
                                        }
                                    ?>">
                                    <?= ucfirst($o['status']); ?>
                                </span>
                            </td>
                            <td class="p-3 border"><?= date("M d, Y", strtotime($o['created_at'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center p-4 text-gray-500">
                            No orders yet.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>

        </table>
    </div>

</div>

</body>
</html>
