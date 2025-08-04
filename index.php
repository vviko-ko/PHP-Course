<?php
  $company_name = "EcoNeemTech";
  $page_title = "Welcome to $company_name";
  $nav_items = [ 'About', 'Products', 'Team', 'Contact'];

  $mission = "At $company_name,our mission is to create accessible, sustainable, and nature-inspired technologies that reduce environmental pollution and improve public health in underserved communities.”*
 <br/>
Our Vision:
 A future where every community enjoys clean air and water as part of resilient, smart, and sustainable cities.";

 $who_we_are = "Eco Neem Tech is a sustainability-focused startup pioneering nature-based, low-cost technologies to tackle air and water pollution in underserved communities. We are a multidisciplinary team of passionate STEM innovators using science, indigenous knowledge, and smart design to build solutions that advance resilient, smart, and sustainable cities and communities in Nigeria and beyond.";
  
 $services = [
    "Renewable Energy" => "Design and installation of solar panels, wind turbines, and hybrid systems.",
    "Green Construction" => "Sustainable architecture, eco-friendly materials, and smart energy systems.",
    "Water Conservation" => "Rainwater harvesting, efficient irrigation, and water recycling systems.",
    "Environmental Consulting" => "Audits, compliance, and strategy development for sustainability goals.",
    "Community Projects" => "Environmental education, youth empowerment, and green jobs training."
  ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- AOS CSS -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <link rel="stylesheet" href="style.css">
  <title><?= $page_title ?></title>
</head>
<body>

  <!-- Navigation -->

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


<section class="hero">
  <div class="hero-content" data-aos="fade-right" data-aos-duration="1200">
    <h2>
      Nature-based Solutions for Cleaner Air & Water in Smart, Resilient and Sustainable Cities and Communities
    </h2>
    <p>
      We are developing low-cost, nature-based air and water purification technologies to tackle pollution in underserved communities, fostering healthier, smarter, and sustainable cities
    </p>
  </div>
  <div class="hero-image" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="300">
    <img src="./Images/bulb.jpg" alt="Green Tech Illustration" />
  </div>
</section>


  <!-- Our Mission -->
<section class="mission-section">
  <div class="mission-container" data-aos="fade-up">
    <div class="mission-content">
      <h2>🌎 Our Mission</h2>
      <p><?= $mission ?></p>
    </div>
  </div>
</section>

<!-- who we are  -->
<section class="mission-section">
  <div class="who-container" data-aos="fade-up" data-aos-delay="100">
    <div class="mission-content">
      <h2>Who We Are</h2>
      <p><?= $who_we_are ?></p>
    </div>
  </div>
</section>

  <!-- What We Do -->
<section class="section what-we-do">
  <h2 class="section-title">What we do</h2>
  <div class="card-container">
    <?php foreach ($services as $title => $desc): ?>
      <div class="card fade-in">
        <span class="emoji"><?= match($title) {
          "Renewable Energy" => "🔋",
          "Green Construction" => "🏗️",
          "Water Conservation" => "💧",
          "Environmental Consulting" => "🌿",
          "Community Projects" => "🤝",
          default => "🌎"
        } ?></span>
        <h3><?= $title ?></h3>
        <p><?= $desc ?></p>
      </div>
    <?php endforeach; ?>
  </div>
</section>

  <!-- Call to Action -->
  <!-- Join the Movement -->
<!-- Join the Movement -->
<!-- Join the Movement -->
<section class="cta-section no-card">
  <h2 class="fade-in">🌿 Join the Movement 🌍</h2>
  <p class="fade-in delay-1">
    Be a part of the green revolution! Whether you're a homeowner, entrepreneur, NGO, or government agency, 
    <strong><?= $company_name ?></strong> is here to help you make a real impact on the environment.
  </p>
  <p class="fade-in delay-2">
    Let’s collaborate to build smarter, cleaner, and more sustainable communities — one project at a time.
  </p>

  <!-- BUTTON UNDERNEATH -->
  <div class="fade-in delay-3">
    <a href="contact.php" class="cta-button">📬 Contact Us Today</a>
  </div>
</section>


  <!-- Footer -->
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

<!-- AOS JS -->
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