<?php
$company_name = "EconeemTech";
$page_title = "Meet Our Team";

$team_members = [
  [
    "name" => "Cynthia OLuchi",
    "position" => "Chief Sustainability Officer",
    "bio" => "With over 15 years of experience in green energy, Cynthia leads our sustainability initiatives and innovation strategy.",
    "image" => "./Images/icon.jpg"
  ],
  [
    "name" => "Victor Olusanmi-Sogbein",
    "position" => "Chief Technology Officer",
    "bio" => "Victor designs eco-friendly systems that balance efficiency and nature using cutting-edge technology.",
    "image" => "./Images/icon.jpg"
  ],
  [
    "name" => "Lora Annex",
    "position" => "Community Engagement Manager",
    "bio" => "Lora connects with local communities, driving participation in renewable energy and conservation programs.",
    "image" => "./Images/icon.jpg"
  ],
  [
    "name" => "Abdulrahman",
    "position" => "Project Director",
    "bio" => "Rahman oversees the implementation of green infrastructure projects with a focus on impact and scalability.",
    "image" => "./Images/icon.jpg"
  ],
  
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title><?= $page_title ?></title>
</head>
<body>

<nav class="navbar">
  <div class="nav-container">
    <div class="logo"><?= $company_name ?></div>
    <ul class="nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <!-- <li><a href="projects.php">Projects</a></li> -->
      <!-- <li><a href="services.php">Services</a></li> -->
      <li><a href="products.php">Products</a></li>
      <!-- <li><a href="team.php" class="active">Team</a></li> -->
      <li><a href="contact.php">Contact</a></li>
    </ul>
  </div>
</nav>

<section class="team-section">
  <h1>Meet Our Team</h1>
  <p class="team-intro">Dedicated professionals driving sustainability through innovation, technology, and passion.</p>

  <div class="team-grid">
    <?php foreach ($team_members as $member): ?>
      <div class="team-card">
        <img src="<?= $member['image'] ?>" alt="<?= $member['name'] ?>" />
        <h3><?= $member['name'] ?></h3>
        <p class="position"><?= $member['position'] ?></p>
        <p class="bio"><?= $member['bio'] ?></p>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<footer class="footer">
  <p>&copy; <?= date("Y") ?> <?= $company_name ?>. All rights reserved.</p>
</footer>

</body>
</html>
