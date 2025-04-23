<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    echo "<h1 style='font-weight: 500; margin-bottom:15px;'>Error 403 - Forbidden</h1>";
    echo "<hr>";
    echo "<h2 style='font-weight: 400; margin-top:15px;'>You don't have permission to access this server directly.</h2>";
    exit();
}

include('./include/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare delete query
    $sql = "DELETE FROM contact WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record deleted successfully'); window.location.href='view.php';</script>";
    } else {
        echo "<div style='color: red;'>Error deleting record: " . $conn->error . "</div>";
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>