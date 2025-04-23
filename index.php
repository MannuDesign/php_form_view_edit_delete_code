<?php
include('./include/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact (name, email, number, address, gender, message)
            VALUES ('$name', '$email', '$number', '$address', '$gender', '$message')";

    if ($conn->query($sql) === TRUE) {
        header("Location: view.php");  // ✅ Redirect to view page
        exit(); // 🔐 Important to prevent further code execution
    } else {
        echo "<div style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }

    $conn->close();
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
                <h2 class="mb-4 text-center">Contact Form</h2>

                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" id="inputName"
                            placeholder="Enter your full name" required>
                    </div>

                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" id="inputEmail"
                            placeholder="name@example.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="inputPhone" class="form-label">Phone Number</label>
                        <input type="tel" name="number" class="form-control" id="inputPhone" placeholder="123-456-7890"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="inputAddress" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" id="inputAddress"
                            placeholder="1234 Main St">
                    </div>

                    <div class="mb-3">
                        <label for="inputGender" class="form-label">Gender</label>
                        <select class="form-select" name="gender" id="inputGender" required>
                            <option selected disabled>Select your gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="inputMessage" class="form-label">Message</label>
                        <textarea name="message" class="form-control" id="inputMessage" rows="4"
                            placeholder="Type your message here..."></textarea>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="consentCheck" required>
                        <label class="form-check-label" for="consentCheck">I agree to the terms and conditions</label>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-5">Submit</button>
                    </div>
                </form>





            </div>
        </div>
    </div>























    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>

</body>

</html>