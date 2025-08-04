<?php
$company_name = "EcoNeemTech";
$page_title = "Contact Us";
 $nav_items = ['Home', 'About', 'Products', 'Team', 'Contact'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Products | Coming Soon - EcoNeemTech</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="emma">
  
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

  <div class="coming-soon-container">
    <h1 class="logo">EcoNeemTech 🌱</h1>
    <h2 class="coming-text">Our Eco-Friendly Products Are Coming Soon 🌍</h2>
    <p class="description">We're working hard to launch innovative, sustainable products that will change the way we live and help protect the planet.</p>

    <div class="notify-form">
      <input type="email" placeholder="Enter your email to stay updated" />
      <button>Join the waitlist</button>
    </div>

    <p class="launch-note">Launching Soon — Stay Tuned! 🚀</p>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
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
