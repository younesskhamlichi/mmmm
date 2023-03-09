<?php
if(isset($_POST["submit"])){
   $nom=$_POST['first_name'];
   $last_name=$_POST['last_name'];
   $address=$_POST['address'];
   $cin=$_POST['cin'];
   $la_date_de_naissence=$_POST['la_date_de_naissence'];
   $email=$_POST['email'];
   $telephone=$_POST['telephone'];
   $type=$_POST['type'];
   $password=$_POST['password'];

   $conn = mysqli_connect('localhost','root','','mediatheque');
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
   $sql ="INSERT INTO `adherent`(`id_adherent`, `nom`, `prenom`, `adresse`, `email`, `telephone`, `cin`, `date_naissance`, `type_adherent`, `surnom`, `mot_de_passe`, `date_ouverture_compte`, `penalite`) VALUES ('$nom','$last_name','$address','$email','$telephone','$cin','$la_date_de_naissence','$type','YOU','$password',NOW(),'0')";
   if(mysqli_query($conn,$sql)){
    echo "hello";
   }
    
        
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="signup.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!--<title>Responsive Regisration Form </title>--> 
</head>
<body>
    <div class="container">
        <header>Registration</header>

        <form action="" method="post">
            <div class="form first">
                <div class="details personal">
                    <div class="fields">
                        <div class="input-field">
                            <label>First Name</label>
                            <input type="text" placeholder="Enter your first name" required name="first_name"> 
                        </div>

                        <div class="input-field">
                            <label>Last Name</label>
                            <input type="text" placeholder="Enter your first name" required name="last_name"> 
                        </div>

                        <div class="input-field">
                            <label>Address</label>
                            <input type="text" placeholder="Enter you adreess" required nome="address">
                        </div>

                        <div class="input-field">
                            <label>CIN</label>
                            <input type="text" placeholder="Your CIN number" required name="cin">
                        </div>
                    </div>
                </div>

                <div class="details ID">
                    <span class="title">Identity Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Enter la date de naissence</label>
                            <input type="text" placeholder="Enter la date de naissence" required name="la_date_de_naissence">
                        </div>

                        <div class="input-field">
                            <label>Enter you email</label>
                            <input type="email" placeholder="Enter you email " required name="email">
                        </div>

                        <div class="input-field">
                            <label>Enter you telephon</label>
                            <input type="text" placeholder="Enter you telephon" required name="telephone">
                        </div>

                     
                        <select class="input-box"  name="type">
                            <option value="etudiant">Choisis une option ...</option>
                            <option value="etudiant">Etudiant</option>
                            <option value="fonctionnaire">Fonctionnaire</option>
                            <option value="employe">EmployÃ©</option>
                            <option value="femme-au-foyer">Femme au foyer</option>
                            <option value="femme-au-foyer">Autre</option>
                        </select>

                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Entrer votre password" required>
                        </div>
						

                    </div>

                    <input type="submit" name="submit" value="sign up">


                        
                </div>
            </div>

        </form>
    </div>

    <script src="signup.js"></script>

</body>
</html>

 