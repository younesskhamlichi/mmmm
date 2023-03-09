

<?php
session_start();
include('includes/.');

?>


<nav class="navbar navbar-expand-md navbar-light bg-white sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="assets/logo1.png" style="width: 225px; height: 66px;" alt="Fresh Pages" >
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
         <a class="nav-link" >About Us</a>
        </li>
        <li class="nav-item">
      <div class="btn-group">
      <a class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user"></i></a>
    <ul class="dropdown-menu">
      <li>
      <a class="dropdown-item" href="logout.php"><i style="font-size: 17px;"
    class="fa-solid fa-right-from-bracket"></i> Log Out</a>
      </li>
    <li><a class="dropdown-item" href="profile.php">See Profile</a></li>
    </ul>
    </div>

        </li>
      </ul>
    </div>
  </div>
</nav>



<style>
    .container {
      text-align: center;
    }
    .middle_links a {
      font-family: 'Playfair Display', serif;
font-weight: bold;
  color: black;
  font-size: 19px;
    }
    .middle_links a:hover {
  font-size: 20px;
transition: 300ms;
      color: #028517;
      border-bottom: 2px solid green; 
    }

    .home_links  {
margin-top: 5%;
margin-bottom: 6%;

 }

 .middle_link.active {
  border-bottom: 2px solid #028517;
  color: #028517;
}
</style>

<div class="jumbotron jumbotron-fluid" style="background-image: url('assets/assets.png');">
  <div class="container">
    <h1 class="display-4">Welcome to My Website</h1>
    <p class="lead">Lorem ipsum dolor sit amet, sdcdcdscdsc consectetur adipiscing elit.</p>
    <form class="formdd-inline">
      <div class="input-group">
        <input type="text" class="formdd-control" placeholder="Search...">
        <div class="input-group-append">
          <button class="btn btn-success" type="button" style="padding: 10px;">Search</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="home_links container">
  <h3 style="font-size: 1.75rem;
  color: #028517; font-weight: bold; font-family: 'Raleway', sans-serif;">My Links</h3>
  <div class="middle_links row mt-5 mb-5">
    <div class="col-md-2 col-md-offset-2">
      <a href="homePage.php?category=Livres" class="nav-link middle_link" id="livres-link">Livres</a>
    </div>
    <div class="col-md-2">
      <a href="homePage.php?category=des revues" class="nav-link middle_link" id="revues-link">revues</a>
    </div>
    <div class="col-md-2">
      <a href="homePage.php?category=des romans" class="nav-link middle_link" id="romans-link">Romans</a>
    </div>
    <div class="col-md-2">
      <a href="homePage.php?category=CDs" class="nav-link middle_link" id="cds-link">CDs</a>
    </div>
    <div class="col-md-2 ">
      <a href="homePage.php?category=des cassettes" class="nav-link middle_link" id="cassettes-video-link">Cassettes vidéo</a>
    </div>
    <div class="col-md-2">
      <a href="homePage.php?category=DVDs" class="nav-link middle_link" id="dvds-link">DVDs</a>
    </div>
  </div>
</div>

<?php
require_once 'oopConnection.php';

$db = new Database("localhost", "root", "", "medaiatheque");
$conn = $db->getConnection();
if (isset($_GET['category'])) {
  

  $sql = "SELECT * FROM ouvrage WHERE type=:category";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':category', $_GET['category']);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


} else {
  $sql = "SELECT * FROM ouvrage";
$stmt = $conn->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<div class="container d-flex flex-wrap wrap gap-5 mt-5">
  <?php foreach ($rows as $row) { ?>

<div class="card" style="width: 18rem;">
  <img class="card-img-top"  src="uploads/<?php echo $row['image']; ?>" alt="Card image cap">
  <div class="card-body">
    <h4 style="color: #D32F26" class="card-title"><?php echo $row['titre']; ?></h4>
    <h5 class="card-title"><strong>Type :</strong> <?php echo $row['type']; ?></h5>
    <h5 class="card-title"><strong>l'état </strong> <?php echo $row['status']; ?></h5>

    <p class="card-text"><strong>Auteur nom </strong> <?php echo $row['nom_lauteur']; ?></p>
    <div >
      <span><strong>La date d'edition : </strong><?php echo $row['date_edition']; ?></span><br>
      <span><strong>La date d'achat : </strong><?php echo $row['date_purchase']; ?></span>
    </div>
    
    <span class="mb-4"><strong>Le nombre des pages</strong> <?php echo $row['num_pages']; ?> P</span><br>

    <div class="d-flex">
          <a href="" class="btn btn-info mr-3 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</a>    
    </div>
</div>
</div>


  }

  </div>











   

  



























