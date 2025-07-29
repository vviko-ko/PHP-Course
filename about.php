<?php
$company_name = "EcoNeemTech";
$page_title = "About Us";
 $nav_items = ['Home', 'About', 'Products', 'Team', 'Contact'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- AOS CSS -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <link rel="stylesheet" href="style.css" />
  <title><?= $page_title ?> | <?= $company_name ?></title>
</head>
<body>

<!-- Navbar -->
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
<!-- About Section -->
<section class="about-section">
  <div class="about-container">
    <div class="about-text" data-aos="fade-right">
      <h1>Who We Are</h1>
      <p>
        <strong>EcoNeemTech</strong> is a purpose-driven company committed to advancing green technology, environmental sustainability, and community impact. 
        Our mission is to bridge innovation with nature, providing clean, smart, and scalable eco-solutions to address pressing climate challenges.
      </p>

      <p>
        Founded by a team of forward-thinking environmentalists and engineers, we work across industries to design clean energy products, build sustainable infrastructure, and educate the next generation of climate leaders.
      </p>

      <a href="team.php" class="cta-button">Meet Our Team</a>
    </div>
    <div class="about-image" data-aos="fade-left">
      <img src="./Images/about-illustration.jpg" alt="EcoNeemTech Team" />
    </div>
  </div>
</section>

<!-- Mission and Values -->
<!-- Our Mission and Values Section -->
<section class="mission-values-section">
  <div class="mission-values-container">
    <!-- Our Mission -->
    <div class="mission-block" data-aos="fade-right">
      <h2>Our Mission</h2>
      <p>At EcoNeemTech, our mission is to pioneer sustainable innovations that preserve nature, empower communities, and create a greener future through technology and awareness.</p>
    </div>

    <!-- Our Values -->
    <div class="mission-block" data-aos="fade-left">
      <h2>Our Values</h2>
      <ul>
        <li>🌱 Sustainability First</li>
        <li>💡 Innovation with Purpose</li>
        <li>👥 Community Empowerment</li>
        <li>🌍 Global Responsibility</li>
        <li>📈 Continuous Improvement</li>
      </ul>
    </div>
  </div>
</section>


<!-- Call to Action -->
<section class="cta-banner">
  <h2 data-aos="zoom-in">Join us in building a greener tomorrow 🌍</h2>
  <a href="contact.php" class="cta-button">Get In Touch</a>
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
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000, // animation duration in ms
    once: true      // animation occurs only once
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
