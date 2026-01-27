<?php
session_start();

// API Endpoint for Cart Operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  header('Content-Type: application/json');
  $input = json_decode(file_get_contents('php://input'), true);

  if (isset($input['action']) && $input['action'] === 'add_to_cart') {
    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = [];
    }

    $product_name = $input['product_name'] ?? 'Unknown Product';
    $product_price = $input['product_price'] ?? 0;

    // Add item to session cart
    $_SESSION['cart'][] = [
      'name' => $product_name,
      'price' => $product_price,
      'added_at' => time()
    ];

    echo json_encode([
      'success' => true,
      'cart_count' => count($_SESSION['cart']),
      'message' => 'Product added to cart'
    ]);
    exit;
  }
}

// Get current cart count for page load
$cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;

$company_name = "EcoNeemTech";
$page_title = "Home";
$nav_items = [
  'Home' => '#home',
  'About' => '#about',
  'Products' => '#products',
  'Team' => '#team',
  'Contact' => '#contact'
];

$services = [
  "Renewable Energy" => "Implementation of solar micro-grids and bio-energy systems for off-grid communities.",
  "Green Construction" => "Eco-friendly building materials and sustainable urban planning services.",
  "Water Conservation" => "Rainwater harvesting and bio-filtration systems for clean water access.",
  "Environmental Consulting" => "Expert advisory on carbon footprint reduction and ESG compliance.",
  "Community Projects" => "Grassroots initiatives for reforestation and waste management."
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Inter:wght@300;400;500;600&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- AOS CSS -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <link rel="stylesheet" href="/style.css" />
  <title><?= $company_name ?> | Sustainable Engineering Solutions</title>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar">
    <div class="nav-container">
      <div class="logo"><?= $company_name ?></div>

      <!-- Hamburger -->
      <div class="hamburger" onclick="toggleMenu()">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <!-- Navigation Links -->
      <div class="nav-links" id="navLinks">
        <ul>
          <?php foreach ($nav_items as $label => $link): ?>
            <li><a href="<?= $link ?>"><?= $label ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- Cart Icon -->
      <div class="nav-actions">
        <a href="/cart" class="cart-icon">
          <i class="fas fa-shopping-cart"></i>
          <span class="cart-count"><?= $cart_count ?></span>
        </a>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section id="home" class="hero-professional">
    <div class="hero-overlay"></div>
    <div class="hero-content-pro" data-aos="fade-up">
      <h1>Engineering a Sustainable Future</h1>
      <p>We deliver nature-based technologies and smart infrastructure solutions for resilient cities and communities.
      </p>
      <div class="hero-actions">
        <a href="#products" class="btn btn-primary">Our Solutions</a>
        <a href="#contact" class="btn btn-outline-white">Partner With Us</a>
      </div>
    </div>
  </section>


  <!-- Stats Section -->
  <section class="stats-section">
    <div class="container stats-grid">
      <div class="stat-item" data-aos="fade-up" data-aos-delay="100">
        <span class="stat-number">50+</span>
        <span class="stat-label">Projects Completed</span>
      </div>
      <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
        <span class="stat-number">10k+</span>
        <span class="stat-label">Lives Impacted</span>
      </div>
      <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
        <span class="stat-number">100%</span>
        <span class="stat-label">Sustainable</span>
      </div>
      <div class="stat-item" data-aos="fade-up" data-aos-delay="400">
        <span class="stat-number">24/7</span>
        <span class="stat-label">Support</span>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="about-split section-padding">
    <div class="container split-wrapper">
      <div class="split-content" data-aos="fade-right">
        <div class="section-label">Who We Are</div>
        <h2>Pioneering Nature-Based Innovation</h2>
        <p class="lead-text">
          EcoNeemTech is more than a startup; we are a movement towards smarter, cleaner cities.
        </p>
        <p>
          By combining indigenous knowledge with cutting-edge engineering, we solve critical air and water pollution
          challenges.
          What started as a university research project on the purifying properties of Neem trees has grown into a
          multi-national green technology firm.
        </p>
        <p>
          We integrate indigenous environmental wisdom with modern engineering to create solutions that are
          not only effective but also culturally and ecologically appropriate.
        </p>
      </div>
      <div class="split-image" data-aos="fade-left">
        <img src="./Images/about-illustration.jpg" alt="EcoNeemTech Team" />
      </div>
    </div>
  </section>

  <!-- Shop / Products Section -->
  <section id="products" class="section bg-soft section-padding">
    <div class="container">
      <div class="section-header text-center" data-aos="fade-up">
        <div class="section-label">Our Shop</div>
        <h2 class="section-title">Eco-Friendly Products</h2>
        <p class="section-subtitle">High-quality sustainable solutions for your home and community.</p>
      </div>

      <div class="technology-grid">
        <?php
        $products = [
          [
            "name" => "Solar Home Kit Pro",
            "price" => "$499.00",
            "image" => "./Images/bulb.jpg",
            "rating" => 5
          ],
          [
            "name" => "Bio-Sand Water Filter",
            "price" => "$129.50",
            "image" => "./Images/bulb.jpg",
            "rating" => 4
          ],
          [
            "name" => "Smart Irrigation Hub",
            "price" => "$249.99",
            "image" => "./Images/Green Trch.jpg",
            "rating" => 5
          ],
          [
            "name" => "Recycled Brick Pack",
            "price" => "$89.00",
            "image" => "./Images/Green Trch.jpg",
            "rating" => 4
          ]
        ];

        foreach ($products as $product): ?>
          <div class="tech-card product-card" data-aos="fade-up">
            <div class="tech-image">
              <span class="badge-sale">Best Seller</span>
              <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">

              <!-- Quick Actions Overlay -->
              <div class="product-overlay">
                <button class="btn-icon" onclick="alert('Added to Wishlist!')"><i class="far fa-heart"></i></button>
                <button class="btn-icon" onclick="alert('Quick view coming soon!')"><i class="far fa-eye"></i></button>
              </div>
            </div>

            <div class="tech-content">
              <div class="product-rating">
                <?php for ($i = 0; $i < $product['rating']; $i++)
                  echo '<i class="fas fa-star text-warning"></i>'; ?>
                <?php for ($i = $product['rating']; $i < 5; $i++)
                  echo '<i class="far fa-star text-muted"></i>'; ?>
              </div>

              <h3 class="product-title"><?= $product['name'] ?></h3>

              <div class="product-footer">
                <span class="product-price"><?= $product['price'] ?></span>
                <button class="btn-cart" data-name="<?= $product['name'] ?>" data-price="<?= $product['price'] ?>">
                  <i class="fas fa-shopping-cart"></i> Add
                </button>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="text-center mt-5" style="margin-top: 3rem;" data-aos="fade-up">
        <a href="#" class="btn btn-outline-dark">View All Products</a>
      </div>
    </div>
  </section>



  <!-- Team Section -->
  <section id="team" class="section section-padding">
    <div class="container">
      <div class="section-header text-center" data-aos="fade-up">
        <div class="section-label">Our Team</div>
        <h2 class="section-title">Meet the Visionaries</h2>
        <p class="section-subtitle">Dedicated professionals driving sustainability through innovation.</p>
      </div>

      <div class="team-grid-pro">
        <?php
        $team_members = [
          ["name" => "Cynthia OLuchi", "position" => "Chief Sustainability Officer", "image" => "./Images/icon.jpg"],
          ["name" => "Victor Olusanmi-Sogbein", "position" => "Chief Technology Officer", "image" => "./Images/icon.jpg"],
          ["name" => "Lora Annex", "position" => "Community Manager", "image" => "./Images/icon.jpg"],
          ["name" => "Abdulrahman", "position" => "Project Director", "image" => "./Images/icon.jpg"]
        ];
        foreach ($team_members as $member): ?>
          <div class="team-card-pro" data-aos="fade-up">
            <div class="member-img-wrapper">
              <img src="<?= $member['image'] ?>" alt="<?= $member['name'] ?>" class="member-img" />
            </div>
            <div class="member-info">
              <h3><?= $member['name'] ?></h3>
              <span class="role"><?= $member['position'] ?></span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="section bg-soft section-padding">
    <div class="container">
      <div class="section-header text-center" data-aos="fade-up">
        <div class="section-label">Contact Us</div>
        <h2 class="section-title">Get in Touch</h2>
      </div>

      <div class="contact-split-wrapper" data-aos="fade-up">
        <!-- Info Panel -->
        <div class="contact-info-panel">
          <h2>Contact Information</h2>
          <p style="color: rgba(255,255,255,0.7); margin-bottom: 2rem;">
            Ready to start a project? Reach out to us today.
          </p>
          <div class="info-item"><i class="fas fa-envelope"></i>
            <div>
              <h4 style="color:white;margin-bottom:0.2rem">Email</h4>
              <p>econeemt@econeemtech.com</p>
            </div>
          </div>
          <div class="info-item"><i class="fas fa-phone"></i>
            <div>
              <h4 style="color:white;margin-bottom:0.2rem">Phone</h4>
              <p>+234 703 909 5798</p>
            </div>
          </div>
          <div class="info-item"><i class="fas fa-map-marker-alt"></i>
            <div>
              <h4 style="color:white;margin-bottom:0.2rem">Location</h4>
              <p>Abuja, Nigeria</p>
            </div>
          </div>
        </div>

        <!-- Form Panel -->
        <div class="contact-form-panel">
          <form class="contact-form" method="POST" action="" style="box-shadow: none; padding: 0;">
            <input type="text" name="name" placeholder="Name" required />
            <input type="email" name="email" placeholder="Email" required />
            <textarea name="message" rows="4" placeholder="Message" required></textarea>
            <button type="submit" class="cta-button" style="width: 100%;">Send Message</button>
          </form>
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
          <li><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#products">Products</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#contact">Contact</a></li>
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

    // Cart Functionality (Backend Connected)
    const cartBtns = document.querySelectorAll('.btn-cart');
    const cartCount = document.querySelector('.cart-count');

    cartBtns.forEach(btn => {
      btn.addEventListener('click', function () {
        const productName = this.dataset.name;
        const productPrice = this.dataset.price;
        const originalText = this.innerHTML;
        const btnElement = this;

        // Visual loading state
        this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Adding...';

        // Send request to backend
        fetch('/api/index.php', { // Assuming your API endpoint is /api/index.php
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            action: 'add_to_cart',
            product_name: productName,
            product_price: productPrice
          }),
        })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              // Update cart count from server
              cartCount.innerText = data.cart_count;

              // Animation loop
              cartCount.style.transform = 'scale(1.5)';
              setTimeout(() => { cartCount.style.transform = 'scale(1)'; }, 200);

              // Success feedback
              btnElement.innerHTML = '<i class="fas fa-check"></i> Added';
              btnElement.style.background = 'var(--primary-dark)';

              setTimeout(() => {
                btnElement.innerHTML = originalText;
                btnElement.style.background = '';
              }, 1500);
            }
          })
          .catch((error) => {
            console.error('Error:', error);
            btnElement.innerHTML = 'Error';
          });
      });
    });
  </script>

</body>

</html>