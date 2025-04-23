<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    echo "<h1 style='font-weight: 500; margin-bottom:15px;'>Error 403 - Forbidden</h1>";
    echo "<hr>";
    echo "<h2 style='font-weight: 400; margin-top:15px;'>You don't have permission to access this server directly.</h2>";
    exit();
}


include('./include/db.php');

// Get the ID from URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch existing data
    $sql = "SELECT * FROM contact WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Record not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}

// Update on form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $message = $_POST['message'];

    $updateSql = "UPDATE contact SET 
                    name = '$name', 
                    email = '$email', 
                    number = '$number', 
                    address = '$address', 
                    gender = '$gender', 
                    message = '$message' 
                  WHERE id = $id";

    if ($conn->query($updateSql) === TRUE) {
        echo "<script>alert('Record updated successfully'); window.location.href='view.php';</script>";
    } else {
        echo "<div style='color: red;'>Error updating record: " . $conn->error . "</div>";
    }
}
?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-4 text-center"> Update filed </h2>

                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control"
                            value="<?= htmlspecialchars($row['name']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control"
                            value="<?= htmlspecialchars($row['email']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" name="number" class="form-control"
                            value="<?= htmlspecialchars($row['number']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" name="address" class="form-control"
                            value="<?= htmlspecialchars($row['address']) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <select name="gender" class="form-select" required>
                            <option value="male" <?= $row['gender'] == 'male' ? 'selected' : '' ?>>Male</option>
                            <option value="female" <?= $row['gender'] == 'female' ? 'selected' : '' ?>>Female</option>
                            <option value="other" <?= $row['gender'] == 'other' ? 'selected' : '' ?>>Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea name="message" class="form-control"
                            rows="4"><?= htmlspecialchars($row['message']) ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="view.php" class="btn btn-secondary">Cancel</a>
                </form>





            </div>
        </div>
    </div>























    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>

</body>

</html>