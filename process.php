<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_db";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("<div class='error'>❌ Database Connection Failed: " . $conn->connect_error . "</div>");
}


$full_name = trim($_POST['full_name']);
$email = trim($_POST['email']);
$department = trim($_POST['department']);
$matric_number = trim($_POST['matric_number']);


if (empty($full_name) || empty($email) || empty($department) || empty($matric_number)) {
    die("<div class='error'>⚠️ All fields are required!</div>");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("<div class='error'>⚠️ Invalid email format!</div>");
}
$sql = "INSERT INTO student_records (full_name, email, department, matric_number)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $full_name, $email, $department, $matric_number);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Result</title>
    <style>
        body {
            font-family: 'Merriweather', 'Georgia', serif;
            background: #f4f6fb;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .message-box {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 6px 32px rgba(44, 62, 80, 0.10);
            width: 400px;
            padding: 40px 32px 32px 32px;
            border: 1px solid #e3e7ed;
            text-align: center;
            animation: fadeIn 0.7s cubic-bezier(.68,-0.55,.27,1.55);
        }

        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .success {
            color: #1a237e;
            background-color: #e3f2fd;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 1.08rem;
            font-family: 'Merriweather', 'Georgia', serif;
            font-weight: 700;
            box-shadow: 0 2px 8px #1a237e22;
        }
        .error {
            color: #d32f2f;
            background-color: #fffde7;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 1.08rem;
            font-family: 'Merriweather', 'Georgia', serif;
            font-weight: 700;
            box-shadow: 0 2px 8px #d32f2f22;
        }
        a {
            text-decoration: none;
            background: linear-gradient(90deg, #1a237e 0%, #fbc02d 100%);
            color: #fff;
            padding: 10px 18px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1.05rem;
            margin: 0 6px;
            box-shadow: 0 2px 8px #1a237e22;
            transition: background 0.2s, transform 0.2s;
            display: inline-block;
        }
        a:hover {
            background: linear-gradient(90deg, #fbc02d 0%, #1a237e 100%);
            transform: scale(1.03);
        }
    </style>
</head>
<body>
    <div class="message-box">
        <?php
        if ($stmt->execute()) {
            echo "<div class='success'>✅ Student registered successfully!</div>";
            echo "<a href='view.php'>View Students</a> | <a href='index.php'>Register Another</a>";
        } else {
            echo "<div class='error'>❌ Error: " . $stmt->error . "</div>";
            echo "<a href='index.php'>Go Back</a>";
        }

        $stmt->close();
        $conn->close();
        ?>
    </div>
</body>
</html>
