<?php
$company_name = "EcoNeemTech";
$page_title = "Contact Us";
$nav_items = ['Home', 'About', 'Products', 'Team', 'Contact'];

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = strip_tags(trim($_POST["message"]));

    if ($name && $email && $subject && $message) {
        $to = "econeemt@econeemtech.com"; // Your email address
        $email_subject = "New Contact Form Message: $subject";
        $email_body = "You received a new message:\n\n"
            . "Name: $name\n"
            . "Email: $email\n"
            . "Subject: $subject\n"
            . "Message:\n$message";

        $headers = "From: $name <$email>";

        if (mail($to, $email_subject, $email_body, $headers)) {
            $success = "Thank you! Your message has been sent.";
        } else {
            $error = "There was an error sending your message. Please try again later.";
        }
    } else {
        $error = "Please fill in all the fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css" />
  <title><?= $page_title ?> | <?= $company_name ?></title>
</head>
<body>

<!-- Navbar (same as before) -->
<nav class="navbar">
  <div class="nav-container">
    <div class="logo"><?= $company_name ?></div>
    <div class="hamburger" onclick="toggleMenu(this)">
      <span></span><span></span><span></span>
    </div>
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
    <form class="contact-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" data-aos="fade-right" data-aos-delay="300">
      <?php if ($success): ?>
        <div class="form-success"><?= $success ?></div>
      <?php endif; ?>
      <?php if ($error): ?>
        <div class="form-error"><?= $error ?></div>
      <?php endif; ?>

      <input type="text" name="name" placeholder="Your Full Name" required />
      <input type="email" name="email" placeholder="Your Email Address" required />
      <input type="text" name="subject" placeholder="Subject" required />
      <textarea name="message" rows="5" placeholder="Your Message..." required></textarea>
      <button type="submit" class="cta-button">Send Message</button>
    </form>

    <!-- Contact Info (same as before) -->
    <div class="contact-info" data-aos="fade-left" data-aos-delay="400">
      <p><strong>EcoNeemTech</strong></p>
      <p>Email: <a href="mailto:econeemt@econeemtech.com">econeemt@econeemtech.com</a></p>
      <p>Phone: +234 703 909 5798</p>
      <div class="map-placeholder" data-aos="zoom-in-up" data-aos-delay="500">
        <p>📍 Google Map will be embedded here</p>
      </div>
    </div>
  </div>
</section>

<!-- Footer (same as before) -->
<footer class="footer">
  <div class="footer-container">
    <!-- ... same footer content ... -->
    <div class="footer-bottom">
      <p>&copy; <?= date("Y") ?> EcoNeemTech. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>AOS.init();</script>
<script>
  function toggleMenu(el) {
    el.classList.toggle("open");
    document.getElementById("navLinks").classList.toggle("active");
  }
</script>
</body>
</html>
