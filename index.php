<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <header>Registration</header>

        <form action="#" method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Entrer ici votre informations</span>

                    <!-- <div class="fields"> -->

                    <div class="input-field">
                            <label>Username</label>
                            <input type="text" name="username" placeholder="Entrer votre username" required>
                        </div>
                    
                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Entrer votre password" required>
                        </div>
						
                    
                    <!-- </div> -->
                    <button type="submit" name="submit" class="nextBtn">
                        <span class="btnText">Submit</span>
                        <i class="uil uil-navigator"></i>
                    </button>


                        
                    
                </div>
            </div>

        </form>
    </div>
    <?php
     //   verify sign in using email

session_start(); // start session

if (isset($_POST['submit'])) {
$username = $_POST['username'];
$password = $_POST['password'];

$conn = mysqli_connect('localhost', 'root', '', 'medaitheque');
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$username = mysqli_real_escape_string($conn, $username); 

$sql = "SELECT * FROM adherent WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
	echo $row['password'];
	if ($password == $row['password']) {
        // successful sign-in
        $_SESSION['id_adherent'] = $row['id_adherent'];

        header('Location: index.php');
        exit;
        } else {
        // password doesn't match
        $error = "Invalid password.";
        echo  $error;
    }
} else {
	// no row returned
	$error = "Invalid email.";
	echo  $error;



$conn->close();
} 
?>
</body>
</html>
