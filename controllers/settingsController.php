<?php
require '../includes/config.php';

$db = new Database();
$con = $db->getConnection();

$seller_id = $_SESSION['seller_id'];
$success_message = "";
$error_message = "";

// FETCH SELLER DATA
try {
    $query = "SELECT seller_id, name, email, shop_name, password FROM sellers WHERE seller_id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $seller_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $seller = $result->fetch_assoc();
    } else {
        $error_message = "Seller not found.";
    }
} catch(Exception $e) {
    $error_message = $e->getMessage();
}


// UPDATE PROFILE
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update_profile'])) {

    $new_name = $_POST['name'];
    $new_email = $_POST['email'];
    $new_shop_name = $_POST['shop_name'];

    try {
        $query = "UPDATE sellers SET name = ?, email = ?, shop_name = ? WHERE seller_id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("sssi", $new_name, $new_email, $new_shop_name, $seller_id);

        if ($stmt->execute()) {
            $success_message = "Profile updated successfully.";
        } else {
            $error_message = "Something went wrong updating your profile.";
        }
    } catch(Exception $e) {
        $error_message = $e->getMessage();
    }
}


// CHANGE PASSWORD
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change_password'])) {

    $old_pass = sha1($_POST['old_password']);
    $new_pass = $_POST['new_password'];
    $confirm_pass = $_POST['confirm_password'];

    // Validate old password
    if ($old_pass !== $seller['password']) {
        $error_message = "Old password is incorrect.";
    }
    // Validate match
    else if ($new_pass !== $confirm_pass) {
        $error_message = "New passwords do not match.";
    }
    else {
        $new_pass_hashed = sha1($new_pass);

        try {
            $query = "UPDATE sellers SET password = ? WHERE seller_id = ?";
            $stmt = $con->prepare($query);
            $stmt->bind_param("si", $new_pass_hashed, $seller_id);

            if ($stmt->execute()) {
                $success_message = "Password changed successfully.";
            } else {
                $error_message = "Failed to update password.";
            }
        } catch(Exception $e) {
            $error_message = $e->getMessage();
        }finally{
            $db->closeConnection();
        }
    }
}
?>