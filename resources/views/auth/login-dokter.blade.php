<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            width: 350px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #e0eaff;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            background: rgba(255, 255, 255, 0.2);
            color: #e0eaff;
            outline: none;
        }

        .login-container input::placeholder {
            color: #b0c4de;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background: #1e90ff;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .login-container button:hover {
            background: #104e8b;
        }

        .login-container a {
            color: #87ceeb;
            text-decoration: none;
            font-size: 14px;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

        .futuristic-lines {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        .futuristic-lines div {
            position: absolute;
            width: 2px;
            height: 100px;
            background: rgba(255, 255, 255, 0.3);
            animation: move 3s linear infinite;
        }

        @keyframes move {
            from {
                transform: translateY(-100px);
            }
            to {
                transform: translateY(100vh);
            }
        }
    </style>
</head>
<body>
    <div class="futuristic-lines">
        <div style="left: 10%; animation-delay: 0s;"></div>
        <div style="left: 30%; animation-delay: 0.5s;"></div>
        <div style="left: 50%; animation-delay: 1s;"></div>
        <div style="left: 70%; animation-delay: 1.5s;"></div>
        <div style="left: 90%; animation-delay: 2s;"></div>
    </div>

    <div class="login-container">
        <h2>Doctor Login</h2>
        <form action="#" method="POST">
            <input type="text" name="username" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <a href="#">Forgot Password?</a>
    </div>

    <script>
        document.querySelector("form").addEventListener("submit", function(e) {
            e.preventDefault(); // Mencegah form terkirim secara default

            const emailInput = document.querySelector('input[name="username"]').value;
            const passwordInput = document.querySelector('input[name="password"]').value;

            // Akun default
            const defaultEmail = "raihan@gmail.com";
            const defaultPassword = "12345";

            if (emailInput === defaultEmail && passwordInput === defaultPassword) {
                alert("Login Successful!");
                window.location.href = "dashboard dokter.html"; // Redirect setelah login
            } else {
                alert("Invalid email or password. Please try again.");
            }
        });
    </script>
</body>
</html>
