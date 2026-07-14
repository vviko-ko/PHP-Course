<?php
// session_start(); // Removing session start in favor of Cookies for Vercel support

// Helper to get cart from cookie
function getCart() {
    if (isset($_COOKIE['econeem_cart'])) {
        $data = $_COOKIE['econeem_cart'];
        $cart = json_decode($data, true);
        if (!is_array($cart)) {
             $cart = json_decode(stripslashes($data), true);
        }
        return is_array($cart) ? $cart : [];
    }
    return [];
}

// Helper to save cart to cookie
function saveCart($cart)
{
  setcookie('econeem_cart', json_encode($cart), time() + (86400 * 30), "/"); // 30 days
}

// API Endpoint for Cart Operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  header('Content-Type: application/json');
  $input = json_decode(file_get_contents('php://input'), true);

  if (isset($input['action']) && $input['action'] === 'add_to_cart') {
    $cart = getCart();

    $product_name = $input['product_name'] ?? 'Unknown Product';
    $product_price = $input['product_price'] ?? 0;

    // Add item to cart
    $cart[] = [
      'name' => $product_name,
      'price' => $product_price,
      'added_at' => time()
    ];

    saveCart($cart);

    echo json_encode([
      'success' => true,
      'cart_count' => count($cart),
      'message' => 'Product added to cart'
    ]);
    exit;
  }
}

// Get current cart count for page load
$cart = getCart();
$cart_count = count($cart);

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
  "Personal Care" => "Naturally derived formulations like Neem soap and oral care for safe, chemical-free hygiene.",
  "Home Care" => "Surface cleaners and disinfectants engineered for modern, sustainable living.",
  "Agriculture" => "Bio-pesticides and organic soil conditioners supporting sustainable farming.",
  "Pet Care" => "Neem-based pet care solutions that protect and nourish naturally."
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
  <title><?= $company_name ?> | Nature's Wisdom. Engineered for Modern Living.</title>
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
      <h1>Nature's Wisdom.<br>Engineered for Modern Living.</h1>
      <p>We provide sustainable, Neem-based natural products for personal, home, and environmental care.
      </p>
      <div class="hero-actions">
        <a href="#products" class="btn btn-primary">Our Products</a>
        <a href="#contact" class="btn btn-outline-white">Partner With Us</a>
      </div>
    </div>
  </section>


  <!-- Stats Section -->
  <section class="stats-section">
    <div class="container stats-grid">
      <div class="stat-item" data-aos="fade-up" data-aos-delay="100">
        <span class="stat-number">100%</span>
        <span class="stat-label">Naturally Derived</span>
      </div>
      <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
        <span class="stat-number">8</span>
        <span class="stat-label">Founding Partners</span>
      </div>
      <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
        <span class="stat-number">4</span>
        <span class="stat-label">Product Lines</span>
      </div>
      <div class="stat-item" data-aos="fade-up" data-aos-delay="400">
        <span class="stat-number">CAMA</span>
        <span class="stat-label">2020 Compliant</span>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="about-split section-padding">
    <div class="container split-wrapper">
      <div class="split-content" data-aos="fade-right">
        <div class="section-label">Who We Are</div>
        <h2>From Leaf to Lab to Life</h2>
        <p class="lead-text">
          EcoNeemTech focuses on sustainable, Neem-based natural products.
        </p>
        <p>
          By combining indigenous botanical knowledge with modern laboratory precision, we develop chemical-free solutions for personal care, home care, and the environment.
          Every formulation is lab-tested for stability, safety, and efficacy to substantiate product performance.
        </p>
        <p>
          We integrate indigenous environmental wisdom with modern science to create solutions that reduce our chemical footprint and support climate-positive sourcing.
        </p>
      </div>
      <div class="split-image" data-aos="fade-left">
        <img src="./Images/about-illustration.jpg" alt="EcoNeemTech Team" />
      </div>
    </div>
  </section>

  <!-- Target Market Section -->
  <section id="target-market" class="section section-padding">
    <div class="container">
      <div class="section-header text-center" data-aos="fade-up">
        <div class="section-label">Target Market</div>
        <h2 class="section-title">Who We Serve</h2>
      </div>
      <div class="stats-grid" style="grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));">
        <div class="stat-item" data-aos="fade-up" data-aos-delay="100" style="padding: 2rem;">
          <h4 style="color:var(--primary-dark); margin-bottom: 1rem;">Households</h4>
          <p style="font-size: 0.9rem;">Families seeking safe, natural, chemical-free personal and home care.</p>
        </div>
        <div class="stat-item" data-aos="fade-up" data-aos-delay="200" style="padding: 2rem;">
          <h4 style="color:var(--primary-dark); margin-bottom: 1rem;">Institutions</h4>
          <p style="font-size: 0.9rem;">Schools, clinics, hotels & offices seeking sustainable hygiene supplies.</p>
        </div>
        <div class="stat-item" data-aos="fade-up" data-aos-delay="300" style="padding: 2rem;">
          <h4 style="color:var(--primary-dark); margin-bottom: 1rem;">Government & NGOs</h4>
          <p style="font-size: 0.9rem;">Public health and environmental programmes across Nigeria.</p>
        </div>
        <div class="stat-item" data-aos="fade-up" data-aos-delay="400" style="padding: 2rem;">
          <h4 style="color:var(--primary-dark); margin-bottom: 1rem;">Retail & Distribution</h4>
          <p style="font-size: 0.9rem;">Pharmacies, supermarkets, and FMCG distributors nationwide.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Strategic Goals Section -->
  <section id="goals" class="section bg-soft section-padding">
    <div class="container">
      <div class="section-header text-center" data-aos="fade-up">
        <div class="section-label">Strategic Goals</div>
        <h2 class="section-title">Where We're Focused Right Now</h2>
      </div>
      <div class="technology-grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
        <div class="tech-card" style="padding: 2rem;" data-aos="fade-up">
          <h3 style="color:var(--secondary); margin-bottom: 1rem;">Goal 01: Market Entry</h3>
          <p>Achieve consistent retail presence across Abuja & the FCT within the first 12 months of operation.</p>
        </div>
        <div class="tech-card" style="padding: 2rem;" data-aos="fade-up" data-aos-delay="100">
          <h3 style="color:var(--secondary); margin-bottom: 1rem;">Goal 02: Product Validation</h3>
          <p>Complete formulation testing and quality benchmarking across the full Neem-based product line.</p>
        </div>
        <div class="tech-card" style="padding: 2rem;" data-aos="fade-up" data-aos-delay="200">
          <h3 style="color:var(--secondary); margin-bottom: 1rem;">Goal 03: Strategic Partnerships</h3>
          <p>Secure distribution, institutional, and supply-chain partnerships to support sustainable scale-up.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Quality Assurance Section -->
  <section id="quality" class="section section-padding">
    <div class="container">
      <div class="section-header text-center" data-aos="fade-up">
        <div class="section-label">Quality Assurance Process</div>
        <h2 class="section-title">Quality, Verified at Every Stage</h2>
      </div>
      <div class="stats-grid" style="grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));">
        <div class="stat-item" data-aos="fade-up" style="padding: 1.5rem;">
          <h3 style="color:var(--primary); font-size: 2.5rem;">01</h3>
          <h4 style="margin: 0.5rem 0;">Raw Material Screening</h4>
          <p style="font-size: 0.9rem;">Neem inputs are inspected for purity, potency, and consistency before use.</p>
        </div>
        <div class="stat-item" data-aos="fade-up" data-aos-delay="100" style="padding: 1.5rem;">
          <h3 style="color:var(--primary); font-size: 2.5rem;">02</h3>
          <h4 style="margin: 0.5rem 0;">Formulation Testing</h4>
          <p style="font-size: 0.9rem;">Each formulation is lab-tested for stability, safety, and efficacy.</p>
        </div>
        <div class="stat-item" data-aos="fade-up" data-aos-delay="200" style="padding: 1.5rem;">
          <h3 style="color:var(--primary); font-size: 2.5rem;">03</h3>
          <h4 style="margin: 0.5rem 0;">Production Controls</h4>
          <p style="font-size: 0.9rem;">Standardised manufacturing procedures ensure batch-to-batch consistency.</p>
        </div>
        <div class="stat-item" data-aos="fade-up" data-aos-delay="300" style="padding: 1.5rem;">
          <h3 style="color:var(--primary); font-size: 2.5rem;">04</h3>
          <h4 style="margin: 0.5rem 0;">Finished Product QC</h4>
          <p style="font-size: 0.9rem;">Final products undergo quality checks before release to market.</p>
        </div>
        <div class="stat-item" data-aos="fade-up" data-aos-delay="400" style="padding: 1.5rem;">
          <h3 style="color:var(--primary); font-size: 2.5rem;">05</h3>
          <h4 style="margin: 0.5rem 0;">Continuous Monitoring</h4>
          <p style="font-size: 0.9rem;">Ongoing feedback and quality review drive continuous improvement.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Sustainability Commitment Section -->
  <section id="sustainability" class="section bg-soft section-padding">
    <div class="container">
      <div class="section-header text-center" data-aos="fade-up">
        <div class="section-label">Sustainability Commitment</div>
        <h2 class="section-title">Built for the Planet, Not Just the Market</h2>
      </div>
      <div class="technology-grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
        <div class="tech-card" style="padding: 1.5rem;" data-aos="fade-up">
          <h4 style="color:var(--secondary);">Responsible Sourcing</h4>
          <p style="font-size: 0.9rem;">Neem inputs sourced sustainably, supporting local growers and ecosystems.</p>
        </div>
        <div class="tech-card" style="padding: 1.5rem;" data-aos="fade-up">
          <h4 style="color:var(--secondary);">Reduced Chemical Footprint</h4>
          <p style="font-size: 0.9rem;">Natural alternatives reduce reliance on synthetic, polluting chemicals.</p>
        </div>
        <div class="tech-card" style="padding: 1.5rem;" data-aos="fade-up">
          <h4 style="color:var(--secondary);">Water-Conscious Production</h4>
          <p style="font-size: 0.9rem;">Manufacturing processes designed to minimise water use and waste.</p>
        </div>
        <div class="tech-card" style="padding: 1.5rem;" data-aos="fade-up">
          <h4 style="color:var(--secondary);">Eco-Conscious Packaging</h4>
          <p style="font-size: 0.9rem;">Ongoing work toward recyclable and biodegradable packaging solutions.</p>
        </div>
        <div class="tech-card" style="padding: 1.5rem;" data-aos="fade-up">
          <h4 style="color:var(--secondary);">Climate-Positive Sourcing</h4>
          <p style="font-size: 0.9rem;">Neem cultivation supports soil health and requires minimal irrigation.</p>
        </div>
        <div class="tech-card" style="padding: 1.5rem;" data-aos="fade-up">
          <h4 style="color:var(--secondary);">Community Impact</h4>
          <p style="font-size: 0.9rem;">Engagement with local farming communities to build sustainable supply chains.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Why Choose Us Section -->
  <section id="why-us" class="section section-padding">
    <div class="container">
      <div class="section-header text-center" data-aos="fade-up">
        <div class="section-label">Why Choose Us</div>
        <h2 class="section-title">Six Reasons to Partner With EcoNeemTech</h2>
      </div>
      <div class="contact-split-wrapper" style="display:block;">
        <ul style="list-style:none; padding:0; display:grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
          <li data-aos="fade-up" style="background:var(--bg-white); padding: 1.5rem; border-radius: var(--radius); box-shadow: var(--shadow-sm);">
            <strong>1.</strong> Naturally derived formulations backed by traditional knowledge and modern science
          </li>
          <li data-aos="fade-up" data-aos-delay="100" style="background:var(--bg-white); padding: 1.5rem; border-radius: var(--radius); box-shadow: var(--shadow-sm);">
            <strong>2.</strong> Legally registered Nigerian entity, fully compliant with CAMA 2020
          </li>
          <li data-aos="fade-up" data-aos-delay="200" style="background:var(--bg-white); padding: 1.5rem; border-radius: var(--radius); box-shadow: var(--shadow-sm);">
            <strong>3.</strong> A broad, complementary product range across personal, home & environmental care
          </li>
          <li data-aos="fade-up" data-aos-delay="300" style="background:var(--bg-white); padding: 1.5rem; border-radius: var(--radius); box-shadow: var(--shadow-sm);">
            <strong>4.</strong> A founding team of eight committed shareholders with shared long-term vision
          </li>
          <li data-aos="fade-up" data-aos-delay="400" style="background:var(--bg-white); padding: 1.5rem; border-radius: var(--radius); box-shadow: var(--shadow-sm);">
            <strong>5.</strong> Genuine, embedded sustainability – not a marketing afterthought
          </li>
          <li data-aos="fade-up" data-aos-delay="500" style="background:var(--bg-white); padding: 1.5rem; border-radius: var(--radius); box-shadow: var(--shadow-sm);">
            <strong>6.</strong> Positioned at the intersection of health, environment, and accessible innovation
          </li>
        </ul>
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
            "name" => "Neem Natural Soap",
            "price" => "$8.50",
            "image" => "./Images/bulb.jpg",
            "rating" => 5
          ],
          [
            "name" => "EcoNeem Surface Cleaner",
            "price" => "$12.00",
            "image" => "./Images/bulb.jpg",
            "rating" => 5
          ],
          [
            "name" => "Organic Bio-Pesticide",
            "price" => "$24.99",
            "image" => "./Images/Green Trch.jpg",
            "rating" => 4
          ],
          [
            "name" => "Neem Pet Shampoo",
            "price" => "$15.00",
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
          ["name" => "Sarah Mwuese Benjamin", "position" => "Director", "image" => "./Images/icon.jpg"],
          ["name" => "Zulfikar Aliyu Adamu", "position" => "Director", "image" => "./Images/icon.jpg"]
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
              <p>econeemtech@gmail.com</p>
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
              <p>Plot 805, Paul Unongo Street, Jabi, Abuja, FCT, Nigeria</p>
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