<?php
  $company_name = "EcoNeemTech";
  $page_title = "Welcome to $company_name";
  $nav_items = ['Home', 'About', 'Products', 'Team', 'Contact'];

  $mission = "At $company_name, our mission is to create a healthier planet by advancing cutting-edge green technologies. 
  We aim to reduce carbon emissions, minimize ecological footprints, and foster a culture of environmental stewardship. 
  Through collaboration, innovation, and community engagement, we strive to build a cleaner, more resilient future for all.";

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
  <link rel="stylesheet" href="style.css">
  <title><?= $page_title ?></title>
</head>
<body>

  <!-- Navigation -->

<nav class="navbar">
  <div class="nav-container">
    <div class="logo"><?= $company_name ?></div>
    <ul class="nav-links">
      <?php foreach ($nav_items as $item): ?>
        <li><a href="<?= strtolower($item) ?>.php"><?= $item ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</nav>

<section class="hero">
  <div class="hero-content">
    <h1>Eco-Friendly Technologies</h1>
    <p>
      Empowering communities and businesses with sustainable solutions that preserve the environment,
      promote green energy, and inspire the next generation of environmental innovators.
    </p>
    <p class="hero-subtext">
      Join us on the path to a greener planet — through innovation, clean energy, and community-driven transformation.
    </p>
  </div>
  <div class="hero-image">
    <img src="./Images/bulb.jpg" alt="Green Tech Illustration" />
  </div>
</section>



  <!-- Our Mission -->
<section class="mission-section">
  <div class="mission-container">
    <div class="mission-content fade-in">
      <h2>🌎 Our Mission</h2>
      <p><?= $mission ?></p>
    </div>
  </div>
</section>



  <!-- What We Do -->
<section class="section what-we-do">
  <h2 class="section-title">What We Do</h2>
  <div class="card-container">
    <?php foreach ($services as $title => $desc): ?>
      <div class="card fade-in">
        <img src="images/<?= strtolower(str_replace(' ', '-', $title)) ?>.jpg" alt="<?= $title ?>" class="card-icon"/>
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
    <p>&copy; <?= date("Y") ?> <?= $company_name ?>. All rights reserved.</p>
    <p>Powered by innovation • Inspired by nature • Focused on the future</p>
  </footer>

</body>
</html>