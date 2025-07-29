<?php
$company_name = "EconeemTech";
$page_title = "Meet Our Team";
 $nav_items = ['Home', 'About', 'Products', 'Team', 'Contact'];


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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- AOS CSS -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <link rel="stylesheet" href="style.css" />
  <title><?= $page_title ?></title>
</head>
<body>

<nav class="navbar">
  <div class="nav-container">
    <div class="logo"><?= $company_name ?></div>

    <!-- Hamburger -->
    <!-- Hamburger -->
<div class="hamburger" onclick="toggleMenu(this)">
  <span></span>
  <span></span>
  <span></span>
</div>


    <!-- Navigation Links -->
    <div class="nav-links" id="navLinks">
      <ul>
        <?php foreach ($nav_items as $item): ?>
          <li><a href="<?= strtolower($item) ?>.php"><?= $item ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
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
  <div class="footer-container">
    <div class="footer-brand" data-aos="fade-up">
      <h2>EcoNeemTech </h2>
      <p>Innovating for a cleaner, greener future through sustainable technology and action.</p>
    </div>

    <div class="footer-links" data-aos="fade-up" data-aos-delay="100">
      <h4>Quick Links</h4>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="team.php">Team</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </div>

    <div class="footer-newsletter" data-aos="fade-up" data-aos-delay="200">
      <h4>Subscribe to Our Newsletter</h4>
      <form action="#" method="post" class="newsletter-form">
        <input type="email" name="email" placeholder="Enter your email" required />
        <button type="submit">Subscribe</button>
      </form>
    </div>

    <div class="footer-social" data-aos="fade-up" data-aos-delay="300">
      <h4>Follow Us</h4>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <p>&copy; <?= date("Y") ?> EcoNeemTech. All rights reserved.</p>
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
    once: true
  });
</script>
<script>
  function toggleMenu() {
    const navLinks = document.getElementById("navLinks");
    navLinks.classList.toggle("active");
  }
</script>
<script>
  function toggleMenu(el) {
    el.classList.toggle("open");
    document.getElementById("navLinks").classList.toggle("active");
  }
</script>



</body>
</html>
