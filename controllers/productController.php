<?php
require '../includes/config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new Database();
    $con = $db->getConnection();

    $seller_id = isset($_SESSION['seller_id']) ? (int) $_SESSION['seller_id'] : null;
    $product_name = isset($_POST['product_name']) ? trim($_POST['product_name']) : '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : null;
    $price = isset($_POST['price']) ? (float) $_POST['price'] : 0.00;
    $stock = isset($_POST['stock']) ? (int) $_POST['stock'] : 0;
    $category = isset($_POST['category']) ? trim($_POST['category']) : null;

    // prepare upload defaults
    $imagePath = null;
    $uploadDir = realpath(__DIR__ . '/../assets') . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
    if ($uploadDir === false) {
        $uploadDir = __DIR__ . '/../assets/uploads/';
    }

    // ensure upload directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // handle file upload if provided
    if (!empty($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
        $fileError = $_FILES['image']['error'];
        if ($fileError === UPLOAD_ERR_OK) {
            $tmpName = $_FILES['image']['tmp_name'];
            $origName = basename($_FILES['image']['name']);
            $ext = pathinfo($origName, PATHINFO_EXTENSION);
            $ext = strtolower($ext);

            // simple extension whitelist
            $allowed = ['jpg','jpeg','png','gif','webp'];
            if (!in_array($ext, $allowed, true)) {
                header('Location: ../public/products.php?status=error&msg=' . urlencode('Invalid image type'));
                exit;
            }

            // create a unique filename
            try {
                $random = bin2hex(random_bytes(6));
            } catch (Exception $e) {
                $random = uniqid();
            }
            $newFilename = time() . '_' . $random . '.' . $ext;
            $destination = $uploadDir . $newFilename;

            if (!move_uploaded_file($tmpName, $destination)) {
                header('Location: ../public/products.php?status=error&msg=' . urlencode('Failed to move uploaded file'));
                exit;
            }
            $imagePath = 'assets/uploads/' . $newFilename;
        } else {
            header('Location: ../public/products.php?status=error&msg=' . urlencode('Upload error code: ' . $fileError));
            exit;
        }
    }

    // Insert into DB using prepared statement with try/catch/finally
    $stmt = null;
    try {
        if (empty($seller_id)) {
            throw new Exception('Seller not authenticated');
        }

        $sql = "INSERT INTO products (seller_id, product_name, description, price, stock, category, image) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        if ($stmt === false) {
            throw new Exception('Prepare failed: ' . $con->error);
        }

        // bind parameters: i (int), s (string), s (string), d (double), i (int), s (string), s (string)
        $bindResult = $stmt->bind_param('issdiss', $seller_id, $product_name, $description, $price, $stock, $category, $imagePath);
        if ($bindResult === false) {
            throw new Exception('Bind param failed: ' . $stmt->error);
        }

        $exec = $stmt->execute();
        if ($exec === false) {
            throw new Exception('Execute failed: ' . $stmt->error);
        }

        echo '<!doctype html><html><head><meta charset="utf-8"><title>Product Added</title></head><body>';
        echo '<script>alert("Product added successfully."); window.location = "../public/products.php";</script>';
        echo '</body></html>';
        exit;

    } catch (Exception $e) {
        // attempt to remove uploaded file if DB insert failed
        if (!empty($imagePath)) {
            $maybe = __DIR__ . '/../' . $imagePath;
            if (file_exists($maybe)) {
                @unlink($maybe);
            }
        }

        // redirect back with error message
        $msg = 'Error saving product: ' . $e->getMessage();
        header('Location: ../public/products.php?status=error&msg=' . urlencode($msg));
        exit;
    } finally {
        if ($stmt instanceof mysqli_stmt) {
            $stmt->close();
        }
        if ($con instanceof mysqli) {
            $db->closeConnection();
        }
    }

}

// Handle fetching products for the logged-in seller
header('Content-Type: application/json');
$seller_id = $_SESSION['seller_id'];

try {
    $db = new Database();
    $con = $db->getConnection();

    $query = "SELECT 
                p.product_id,
                p.product_name,
                p.description,
                p.price,
                p.stock,
                p.category,
                p.image,
                s.name AS seller_name,
                s.shop_name,
                s.email
              FROM products p
              INNER JOIN sellers s 
                ON p.seller_id = s.seller_id
              WHERE p.seller_id = ?";

    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $seller_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $products = [];

    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    echo json_encode([
        "status" => "success",
        "data" => $products
    ]);

} catch (Exception $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}

exit;

?>