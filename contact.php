<?php
$company_name = "EcoNeemTech";
$page_title = "Contact Us";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="style.css" />
  <title><?= $page_title ?> | <?= $company_name ?></title>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
  <div class="nav-container">
    <div class="logo"><?= $company_name ?></div>
    <ul class="nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="products.php">Products</a></li>
      <li><a href="team.php">Team</a></li>
      <!-- <li><a href="contact.php" class="active">Contact</a></li> -->
    </ul>
  </div>
</nav>

<!-- Contact Section -->
<section class="contact-section">
  <h1>Contact Us</h1>
  <p class="contact-intro">
    We'd love to hear from you! Reach out with questions, feedback, or partnership opportunities.
  </p>

  <div class="contact-container">
    <!-- Contact Form -->
    <form class="contact-form" action="mailto:youremail@example.com" method="POST" enctype="text/plain">
      <input type="text" name="name" placeholder="Your Full Name" required />
      <input type="email" name="email" placeholder="Your Email Address" required />
      <input type="text" name="subject" placeholder="Subject" required />
      <textarea name="message" rows="5" placeholder="Your Message..." required></textarea>
      <button type="submit" class="cta-button">Send Message</button>
    </form>

    <!-- Contact Info -->
    <div class="contact-info">
      <h3>Our Office</h3>
      <p><strong>EcoNeemTech</strong></p>
      <p>123 Eco Street, Green City, NG</p>
      <p>Email: <a href="mailto:econeemtech@gmail.com">info@greentech.com</a></p>
      <p>Phone: +234 800 123 4567</p>

      <div class="map-placeholder">
        <p>📍 Google Map will be embedded here</p>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="footer">
  <p>&copy; <?= date("Y") ?> <?= $company_name ?>. All rights reserved.</p>
</footer>

</body>
</html>
