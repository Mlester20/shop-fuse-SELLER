<?php
session_start();

if (!isset($_SESSION['seller_id'])) {
    header("Location: ../index.php");
    exit();
}

require '../controllers/settingsController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <link rel="stylesheet" href="../dist/output.css">
</head>
<body class="bg-gray-100 min-h-screen">

<?php require '../components/navBar.php'; ?>

<div class="max-w-3xl mx-auto mt-10 space-y-6">

    <!-- ALERTS -->
    <?php if (!empty($success_message)) : ?>
        <div class="p-4 bg-green-100 text-green-700 rounded-lg shadow">
            <?= htmlspecialchars($success_message); ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($error_message)) : ?>
        <div class="p-4 bg-red-100 text-red-700 rounded-lg shadow">
            <?= htmlspecialchars($error_message); ?>
        </div>
    <?php endif; ?>

    <!-- EDIT PROFILE -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-semibold mb-4">Edit Profile</h2>

        <form method="POST">
            <input type="hidden" name="update_profile" value="1">

            <div class="mb-4">
                <label class="font-medium">Name</label>
                <input type="text" name="name"
                    class="w-full p-3 border rounded-lg"
                    value="<?= htmlspecialchars($seller['name']); ?>" required>
            </div>

            <div class="mb-4">
                <label class="font-medium">Email</label>
                <input type="email" name="email"
                    class="w-full p-3 border rounded-lg"
                    value="<?= htmlspecialchars($seller['email']); ?>" required>
            </div>

            <div class="mb-4">
                <label class="font-medium">Shop Name</label>
                <input type="text" name="shop_name"
                    class="w-full p-3 border rounded-lg"
                    value="<?= htmlspecialchars($seller['shop_name']); ?>" required>
            </div>

            <button class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                Save Changes
            </button>
        </form>
    </div>

    <!-- CHANGE PASSWORD -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-semibold mb-4">Change Password</h2>

        <form method="POST">
            <input type="hidden" name="change_password" value="1">

            <div class="mb-4">
                <label class="font-medium">Old Password</label>
                <input type="password" name="old_password"
                    class="w-full p-3 border rounded-lg" required>
            </div>

            <div class="mb-4">
                <label class="font-medium">New Password</label>
                <input type="password" name="new_password"
                    class="w-full p-3 border rounded-lg" required>
            </div>

            <div class="mb-4">
                <label class="font-medium">Confirm New Password</label>
                <input type="password" name="confirm_password"
                    class="w-full p-3 border rounded-lg" required>
            </div>

            <button class="w-full bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700">
                Update Password
            </button>
        </form>
    </div>

</div>

<script src="../js/script.js"></script>
</body>
</html>
