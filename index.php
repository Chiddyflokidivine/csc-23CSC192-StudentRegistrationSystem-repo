<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registration</title>
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

        .container {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 6px 32px rgba(44, 62, 80, 0.10);
            width: 400px;
            padding: 40px 32px 32px 32px;
            border: 1px solid #e3e7ed;
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

        label {
            font-weight: 600;
            display: block;
            margin-top: 18px;
            color: #1a237e;
            font-size: 1.08rem;
        }

        input {
            width: 100%;
            padding: 12px 10px;
            margin-top: 7px;
            border: 1.5px solid #b3b6c2;
            border-radius: 10px;
            outline: none;
            font-size: 1.05rem;
            background: #f9fafc;
            color: #222;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input:focus {
            border-color: #fbc02d;
            box-shadow: 0 0 8px #fbc02d44;
            background: #fff;
        }

        button {
            width: 100%;
            background: linear-gradient(90deg, #1a237e 0%, #fbc02d 100%);
            color: #fff;
            border: none;
            padding: 15px;
            margin-top: 32px;
            font-size: 1.15rem;
            font-family: 'Merriweather', 'Georgia', serif;
            font-weight: 700;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 0 2px 8px #1a237e22;
            transition: background 0.2s, transform 0.2s;
        }

        button:hover {
            background: linear-gradient(90deg, #fbc02d 0%, #1a237e 100%);
            transform: scale(1.03);
        }

        .link {
            display: block;
            text-align: center;
            margin-top: 24px;
            text-decoration: none;
            background: linear-gradient(90deg, #1a237e 0%, #fbc02d 100%);
            color: #fff;
            font-weight: 600;
            font-size: 1.05rem;
            border-radius: 10px;
            padding: 10px 18px;
            box-shadow: 0 2px 8px #1a237e22;
            transition: background 0.2s, color 0.2s;
        }

        .link:hover {
            background: linear-gradient(90deg, #fbc02d 0%, #1a237e 100%);
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Student Registration</h2>
        <form action="process.php" method="POST">
            <label>Full Name:</label>
            <input type="text" name="full_name" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Department:</label>
            <input type="text" name="department" required>

            <label>Matric Number:</label>
            <input type="text" name="matric_number" required>

            <button type="submit">Register</button>
        </form>
        <a href="view.php" class="link">View Registered Students</a>
    </div>
</body>
</html>