<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_db";

$conn = new mysqli($servername, $username, $password, $dbname);


if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM student_records WHERE id=$id");
    // Renumber IDs to be sequential from 1 to n
    $conn->query("SET @num := 0");
    $conn->query("UPDATE student_records SET id = @num := @num + 1");
    $conn->query("ALTER TABLE student_records AUTO_INCREMENT = 1");
    header("Location: view.php");
    exit;
}


$result = $conn->query("SELECT * FROM student_records");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registered Students</title>
    <style>
        body {
            font-family: 'Merriweather', 'Georgia', serif;
            background: #f4f6fb;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        .container {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 6px 32px rgba(44, 62, 80, 0.10);
            padding: 40px 32px 32px 32px;
            border: 1px solid #e3e7ed;
            max-width: 900px;
            margin: 40px auto;
            animation: fadeIn 0.7s cubic-bezier(.68,-0.55,.27,1.55);
        }

        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        h2 {
            text-align: center;
            color: #1a237e;
            margin-bottom: 30px;
            font-size: 2.2rem;
            font-family: 'Merriweather', 'Georgia', serif;
            font-weight: 700;
            letter-spacing: 1px;
            border-bottom: 2px solid #fbc02d;
            padding-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background: #f9fafc;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px #1a237e22;
        }

        table th, table td {
            padding: 13px 16px;
            border: 1px solid #e3e7ed;
            text-align: center;
            font-size: 1.05rem;
        }

        table th {
            background: linear-gradient(90deg, #1a237e 0%, #fbc02d 100%);
            color: #fff;
            text-transform: uppercase;
            font-family: 'Merriweather', 'Georgia', serif;
            font-weight: 700;
            letter-spacing: 1px;
        }

        table tr:nth-child(even) {
            background-color: #fff;
        }

        table tr:nth-child(odd) {
            background-color: #f9fafc;
        }

        table tr:hover {
            background-color: #fffde7;
        }

        a.delete-btn {
            color: #fff;
            background: linear-gradient(90deg, #d32f2f 0%, #fbc02d 100%);
            padding: 9px 16px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            box-shadow: 0 2px 8px #d32f2f22;
            transition: background 0.2s, transform 0.2s;
            display: inline-block;
        }

        a.delete-btn:hover {
            background: linear-gradient(90deg, #fbc02d 0%, #d32f2f 100%);
            transform: scale(1.03);
        }

        a.back-link {
            display: inline-block;
            margin-top: 24px;
            text-decoration: none;
            background: linear-gradient(90deg, #1a237e 0%, #fbc02d 100%);
            color: #fff;
            padding: 10px 18px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1.05rem;
            box-shadow: 0 2px 8px #1a237e22;
            transition: background 0.2s, transform 0.2s;
        }

        a.back-link:hover {
            background: linear-gradient(90deg, #fbc02d 0%, #1a237e 100%);
            transform: scale(1.03);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registered Students</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Matric Number</th>
                <th>Action</th>
            </tr>
            <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['full_name']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['department']; ?></td>
                <td><?= $row['matric_number']; ?></td>
                <td><a href="view.php?delete=<?= $row['id']; ?>" class="delete-btn" onclick="return confirm('Delete this student?')">Delete</a></td>
            </tr>
            <?php } ?>
        </table>
        <a href="index.php" class="back-link">Register Another Student</a>
    </div>
</body>
</html>
