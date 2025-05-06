<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $voter_id = $_POST['voter_id'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE voter_id = ?");
    $stmt->bind_param("s", $voter_id); $stmt->execute(); $result =
    $stmt->get_result(); $user = $result->fetch_assoc(); 
    
    if ($user && $password == $user['password']) {
      $_SESSION['voter_id'] =
    $user['voter_id']; $_SESSION['has_voted'] = $user['has_voted'];
    header("Location: voting_active.html"); } else { echo "Login gagal."; } } 
?>

<!DOCTYPE html>
<html>
  <head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Hackathon 13 | Login</title>

    <!-- slider stylesheet -->
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- fonts awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- fonts style -->
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap"
      rel="stylesheet"
    />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
  </head>

  <body class="sub_page">
    <div class="hero_area">
      <!-- header section strats -->
      <header class="header_section">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <div class="custom_menu-btn">
            <button onclick="openNav()">
              <span class="s-1"> </span>
              <span class="s-2"> </span>
              <span class="s-3"> </span>
            </button>
          </div>
          <div id="myNav" class="overlay">
            <div class="menu_btn-style">
              <button onclick="closeNav()">
                <span class="s-1"> </span>
                <span class="s-2"> </span>
                <span class="s-3"> </span>
              </button>
            </div>
            <div class="overlay-content">
              <a class="" href="index.html"> Home </a>
              <a class="" href="about.html"> About </a>
              <a class="active" href="portfolio.html"> Portfolio </a>
              <a class="" href="team.html"> Team </a>
            </div>
          </div>
          <a class="navbar-brand" href="index.html">
            <span style="color: aliceblue"> Hackathon 13</span>
          </a>
          <a href="" class="call_btn"> Call Us Now </a>
        </nav>
      </header>
      <!-- end header section -->
    </div>

    <!-- portfolio section -->
    <div class="row">
      <div class="col-md-5">
        <img src="images/logginin.jpg" class="img-fluid" alt="..." />
      </div>
      <div class="col-md-7 pt-5">
        <div class="container">
          <h2 style="color: aliceblue">Login</h2>
          <form method="POST" action="login.php">
            <div class="mb-3">
              <label
                for="id_vote"
                style="color: #276fbf"
                class="form-label"
              >
                Voter ID
              </label>
              <input
                type="text"
                class="form-control"
                id="id_vote"
                name="voter_id"
              />
            </div>

            <div class="mb-3">
              <label
                for="inputPassword"
                style="color: #276fbf"
                class="form-label"
              >
                Password
              </label>
              <input
                type="password"
                class="form-control"
                id="inputPassword"
                name="password"
              />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-danger" href="index.html" role="button"
              >Go Back</a
            >
          </form>
        </div>
      </div>
    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>

