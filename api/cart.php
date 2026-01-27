<?php

function getCart()
{
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
function saveCart($cart)
{
    setcookie('econeem_cart', json_encode($cart), time() + (86400 * 30), "/");
}

// Handle Remove Action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'remove') {
    $cart = getCart();
    $index = $_POST['index'] ?? -1;
    if ($index >= 0 && isset($cart[$index])) {
        array_splice($cart, $index, 1);
        saveCart(array_values($cart));
    }
    header('Location: /cart');
    exit;
}

$cart = getCart();
$cart_count = count($cart);

// Calculate Total
$total = 0;
foreach ($cart as $item) {
    $price = floatval(preg_replace('/[^0-9.]/', '', $item['price']));
    $total += $price;
}
$company_name = "EcoNeemTech";
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
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/style.css" />
    <title>Your Cart |
        <?= $company_name ?>
    </title>
    <style>
        .cart-section {
            min-height: 80vh;
            background: var(--bg-body);
            padding: 4rem 1.5rem;
        }

        .page-title {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            color: var(--secondary);
            font-weight: 800;
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 1.8rem;
                /* Fit on one line on most screens */
                margin-bottom: 1.5rem;
            }
        }

        .cart-grid {
            display: grid;
            grid-template-columns: 1fr 340px;
            /* Reduced summary width to give more space to items */
            gap: 1.5rem;
            /* Reduced gap */
            align-items: start;
        }

        /* Left Column: Cart Items */
        .cart-items-card {
            background: white;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            padding: 0;
            overflow: hidden;
        }

        .cart-items-header {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #f3f4f6;
            font-weight: 700;
            color: var(--secondary);
            display: flex;
            justify-content: space-between;
        }

        .cart-item {
            display: flex;
            align-items: center;
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #f3f4f6;
            transition: 0.2s;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item:hover {
            background: #f9fafb;
        }

        .item-icon {
            width: 60px;
            height: 60px;
            background: var(--bg-soft);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--primary);
            margin-right: 1.5rem;
            flex-shrink: 0;
        }

        .item-details {
            flex: 1;
        }

        .item-name {
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 0.25rem;
            display: block;
        }

        .item-price {
            color: var(--primary-dark);
            font-weight: 700;
            font-size: 1.1rem;
        }

        /* Right Column: Summary */
        .summary-card {
            background: white;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            padding: 2rem;
            position: sticky;
            top: 100px;
            /* Stick below nav */
        }

        .summary-title {
            font-size: 1.25rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #f3f4f6;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            color: var(--text-muted);
        }

        .summary-row.total {
            color: var(--secondary);
            font-weight: 800;
            font-size: 1.5rem;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 2px dashed #e5e7eb;
            margin-bottom: 0;
        }

        .btn-checkout {
            background: var(--primary);
            color: white;
            width: 100%;
            padding: 1.2rem;
            border-radius: 8px;
            font-weight: 700;
            margin-top: 2rem;
            border: none;
            cursor: pointer;
            transition: 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-checkout:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-delete-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid #fee2e2;
            color: #ef4444;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-delete-icon:hover {
            background: #ef4444;
            color: white;
        }

        @media (max-width: 900px) {
            .cart-grid {
                grid-template-columns: 1fr;
            }

            .summary-card {
                position: static;
            }
        }

        .empty-cart-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 50vh;
            text-align: center;
            max-width: 600px;
            margin: 0 auto;
        }

        .empty-cart-icon {
            width: 120px;
            height: 120px;
            background: var(--bg-soft);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 3.5rem;
            margin-bottom: 2rem;
            animation: pulse 3s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.4);
            }

            70% {
                transform: scale(1.05);
                box-shadow: 0 0 0 20px rgba(16, 185, 129, 0);
            }

            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
            }
        }

        .btn-start-shopping {
            background: var(--gradient-primary);
            color: white;
            padding: 1rem 3rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1.1rem;
            box-shadow: var(--shadow-lg);
            border: none;
            transition: 0.3s;
        }

        .btn-start-shopping:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo"><a href="/"><?= $company_name ?></a></div>

            <div class="hamburger" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="nav-links" id="navLinks">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/#products">Products</a></li>
                    <li><a href="/#contact">Contact</a></li>
                </ul>
            </div>
            <div class="nav-actions">
                <a href="/cart" class="cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count"><?= $cart_count ?></span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Cart Section -->
    <section class="cart-section">
        <div class="container">
            <h1 class="page-title">Shopping Cart</h1>

            <?php if ($cart_count > 0): ?>
                <div class="cart-grid">
                    <!-- Cart Items Column -->
                    <div class="cart-items-container">
                        <div class="cart-items-card" data-aos="fade-up">
                            <div class="cart-items-header">
                                <span><?= $cart_count ?> Item<?= $cart_count !== 1 ? 's' : '' ?></span>
                            </div>

                            <?php foreach ($cart as $index => $item): ?>
                                <div class="cart-item">
                                    <!-- Placeholder Generic Image/Icon -->
                                    <div class="item-icon">
                                        <i class="fas fa-box-open"></i>
                                    </div>
                                    <div class="item-details">
                                        <span class="item-name"><?= htmlspecialchars($item['name']) ?></span>
                                        <span class="item-price"><?= htmlspecialchars($item['price']) ?></span>
                                    </div>
                                    <form method="POST" style="margin:0;">
                                        <input type="hidden" name="action" value="remove">
                                        <input type="hidden" name="index" value="<?= $index ?>">
                                        <button type="submit" class="btn-delete-icon" title="Remove Item">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <a href="/#products"
                            style="display:inline-block; margin-top: 1.5rem; color: var(--primary); font-weight: 600; text-decoration: none;">
                            <i class="fas fa-arrow-left"></i> Continue Shopping
                        </a>
                    </div>

                    <!-- Summary Column -->
                    <div class="summary-card" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="summary-title">Order Summary</h3>

                        <div class="summary-row">
                            <span>Subtotal</span>
                            <span>$<?= number_format($total, 2) ?></span>
                        </div>
                        <div class="summary-row">
                            <span>Shipping</span>
                            <span style="color: var(--primary);">Free</span>
                        </div>
                        <div class="summary-row">
                            <span>Tax (Estimate)</span>
                            <span>$0.00</span>
                        </div>

                        <div class="summary-row total">
                            <span>Total</span>
                            <span>$<?= number_format($total, 2) ?></span>
                        </div>

                        <button class="btn-checkout" onclick="alert('Checkout initiated!')">
                            Checkout <i class="fas fa-arrow-right"></i>
                        </button>

                        <div style="margin-top: 1.5rem; text-align: center; color: var(--text-muted); font-size: 0.85rem;">
                            <i class="fas fa-lock"></i> Secure Checkout
                        </div>
                    </div>
                </div>

            <?php else: ?>
                <div class="empty-cart-container" data-aos="fade-in">
                    <div class="empty-cart-icon">
                        <i class="fas fa-shopping-basket"></i>
                    </div>
                    <h3 style="font-size: 2rem; color: var(--secondary); margin-bottom: 1rem; font-weight:800;">Your Cart is
                        Empty</h3>
                    <p
                        style="color:var(--text-muted); margin-bottom: 2.5rem; font-size: 1.2rem; max-width: 450px; line-height: 1.6;">
                        Looks like you haven't made your choice yet. Explore our eco-friendly solutions and start your
                        journey.
                    </p>
                    <a href="/#products" class="btn-start-shopping">
                        Start Shopping
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-brand">
                <h2>EcoNeemTech</h2>
                <p>Innovating for a cleaner, greener future.</p>
            </div>
            <div class="footer-bottom" style="width:100%; grid-column: 1/-1;">
                <p>&copy;
                    <?= date("Y") ?> EcoNeemTech. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <script>
        function toggleMenu() {
            const navLinks = document.getElementById("navLinks");
            navLinks.classList.toggle("active");
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
    </script>
</body>

</html>