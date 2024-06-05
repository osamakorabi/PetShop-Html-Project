<!DOCTYPE html>
<html>

<head>
    
      <title>Signup</title>
    <style>
body {
    margin-left: 50px;
    margin-top: 50px;
    display: flex;
    font-family: sans-serif;
    line-height: 1.5;
    min-height: 100vh;
    background-image: url("Images/Login-Signup-pic.jpeg");
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
            <h1>Signup</h1>
            <form action="Signup.php" method="GET">
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
                              Signup
                        </button>
                  </div>
            </form>            
            <p>Go back to 
                  <a href="Login.php"
                     style="text-decoration: none;">
                        Login
                  </a>
            </p>
      </div>


<?php
include 'db_connection.php';

if(empty($_GET["email"]) || empty($_GET["password"])){
  echo "Please enter the email and the password.";

} else if(isset($_GET["email"]) AND isset($_GET["password"])){
	// Check for Email duplication
	$sql = "SELECT *  FROM `test` WHERE `Email` LIKE '".$_GET["email"]."';";
	$result = mysqli_query($conn,$sql);

	if (mysqli_num_rows($result) == 0){
		$sql = "INSERT INTO `test` (`Email`, `Password`) VALUES ('".$_GET["email"]."', '".$_GET["password"]."');";
		mysqli_query($conn,$sql);
		echo "You have Signedup.";
	}else {echo "This email already exists.";}
}

mysqli_close($conn);
?>



</body>
</html>