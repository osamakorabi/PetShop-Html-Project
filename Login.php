<!DOCTYPE html>
<html>

<head>
    
      <title>Login</title>
    <style>
body {
    margin-left: 50px;
    margin-top: 50px;
    display: flex;
    font-family: sans-serif;
    line-height: 1.5;
    min-height: 100vh;
    background-image: url("Images/Login-Signup/Login-Signup-pic.jpeg");
    background-size: cover;
    background-position: center;
    flex-direction: column;
}

.main {
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    padding: 10px 20px;
    transition: transform 0.2s;
    width: 500px;
    text-align: center;
}

h1 {
    color: #4CAF50;
}

label {
    display: block;
    width: 100%;
    margin-top: 10px;
    margin-bottom: 5px;
    text-align: left;
    color: #555;
    font-weight: bold;
}


input {
    display: block;
    width: 100%;
    margin-bottom: 15px;
    padding: 10px;
    box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 5px;
}

button {
    padding: 15px;
    border-radius: 10px;
    margin-top: 15px;
    margin-bottom: 15px;
    border: none;
    color: white;
    cursor: pointer;
    background-color: #4CAF50;
    width: 100%;
    font-size: 16px;
}

.wrap {
    display: flex;
    justify-content: center;
    align-items: center;
}

    </style>
</head>

<body>
      <div class="main">
            <h1>Login</h1>
            <h3>Enter your login credentials</h3>
            <form action="Login.php" method="GET">
                  <label for="first">
                        Email:
                  </label>
                  <input type="email" 
                         id="first" 
                         name="email" 
                         placeholder="Enter your Email" required>

                  <label for="password">
                        Password:
                  </label>
                  <input type="password"
                         id="password" 
                         name="password"
                         placeholder="Enter your Password">

                  <div class="wrap">
                        <button type="submit"
                                onclick="solve()">
                              Login
                        </button>
                  </div>
            </form>
            <p>You don't have an account?
                  <a href="Signup.php"
                     style="text-decoration: none;">
                        Signup
                  </a>
            </p>
      </div>


<?php
include 'db_connection.php';

if (isset($_GET["email"]) && isset($_GET["password"])) {
    if (empty($_GET["email"]) || empty($_GET["password"])) {
        echo "Email/Password is empty";
    } else {
        // Check if email and password are in database
        $stmt = mysqli_prepare($conn, "SELECT * FROM `test` WHERE `Email` = ? AND `Password` = ?");
        mysqli_stmt_bind_param($stmt, "ss", $_GET["email"], $_GET["password"]);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 1) {
            header("Location: home.html");
        } else {
            echo "Incorrect email or password.";
        }

        mysqli_stmt_close($stmt);
    }
}

mysqli_close($conn);

?>


</body>
</html>