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
  <!-- AOS Animation Library -->
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
<!-- Contact Section -->
<section class="contact-section" data-aos="fade-up" data-aos-duration="1000">
  <h1 data-aos="zoom-in" data-aos-delay="100">Contact Us</h1>
  <p class="contact-intro" data-aos="fade-up" data-aos-delay="200">
    We'd love to hear from you! Reach out with questions, feedback, or partnership opportunities.
  </p>

  <div class="contact-container">
    <!-- Contact Form -->
    <form class="contact-form" data-aos="fade-right" data-aos-delay="300">
      <input type="text" name="name" placeholder="Your Full Name" required />
      <input type="email" name="email" placeholder="Your Email Address" required />
      <input type="text" name="subject" placeholder="Subject" required />
      <textarea name="message" rows="5" placeholder="Your Message..." required></textarea>
      <button type="submit" class="cta-button">Send Message</button>
    </form>

    <!-- Contact Info -->
    <div class="contact-info" data-aos="fade-left" data-aos-delay="400">
      <!-- <h3>Our Office</h3> -->
      <p><strong>EcoNeemTech</strong></p>
      <!-- <p>123 Eco Street, Green City, NG</p> -->
      <p>Email: <a href="mailto:econeemt@econeemtech.com">econeemt@econeemtech.com</a></p>
      <p>Phone: +234 703 909 5798</p>

      <div class="map-placeholder" data-aos="zoom-in-up" data-aos-delay="500">
        <p>📍 Google Map will be embedded here</p>
      </div>
    </div>
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

<!-- AOS Script -->
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
