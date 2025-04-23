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
            <div class="col-md-12">
                <?php
                if (!isset($_SERVER['HTTP_REFERER'])) {
                    header('HTTP/1.0 403 Forbidden', TRUE, 403);
                    echo "<h1 style='font-weight: 500; margin-bottom:15px;'>Error 404 - Forbidden</h1>";
                    echo "<hr>";
                    echo "<h2 style='font-weight: 400; margin-top:15px;'>You don't have permission to access this server directly.</h2>";
                    exit();
                }
                include('./include/db.php');

                $sql = "SELECT * FROM contact ORDER BY id DESC"; // Adjust column name if needed
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<h3 class='mt-5'>Submitted Entries</h3>";
                    echo "<table class='table table-bordered mt-3'>
            <thead class='table-dark'>
                <tr>
                    <th> ID </th>
                    <th> Name </th>
                    <th> Email </th>
                    <th> Number </th>
                    <th> Address </th>
                    <th> Gender </th>
                    <th> Message </th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>

                    
                <td>" . htmlspecialchars($row['id']) . "</td>
                <td>" . htmlspecialchars($row['name']) . "</td>
                <td>" . htmlspecialchars($row['email']) . "</td>
                <td>" . htmlspecialchars($row['number']) . "</td>
                <td>" . htmlspecialchars($row['address']) . "</td>
                <td>" . htmlspecialchars($row['gender']) . "</td>
                <td>" . htmlspecialchars($row['message']) . "</td>


                 <td>
                <a href='edit.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning me-1'>
                    <i class='fas fa-edit'></i> Edit
                </a>
                <a href='delete.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure you want to delete this entry?\")'>
                    <i class='fas fa-trash-alt'></i> Delete
                </a>
            </td>
              </tr>";
                    }

                    echo "</tbody></table>";
                } else {
                    echo "<p class='mt-5'>No submissions yet.</p>";
                }

                $conn->close();
                ?>



            </div>



        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>

</body>

</html>