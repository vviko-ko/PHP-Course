<?php
// session_start(); // Removing session start in favor of Cookies for Vercel support
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
        /* Inline styles for Cart specific elements if not in global css yet */
        .cart-section {
            min-height: 60vh;
            background: var(--bg-body);
            padding: 8rem 1.5rem 4rem;
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            margin-bottom: 2rem;
        }

        .cart-table th,
        .cart-table td {
            padding: 1.5rem;
            text-align: left;
            border-bottom: 1px solid #f3f4f6;
        }

        .cart-table th {
            background: var(--bg-soft);
            color: var(--secondary);
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        .cart-item-name {
            font-weight: 600;
            color: var(--text-main);
        }

        .cart-item-price {
            color: var(--text-muted);
        }

        .btn-delete {
            background: #fee2e2;
            color: #ef4444;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .btn-delete:hover {
            background: #fecaca;
            color: #b91c1c;
        }

        .cart-summary {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: var(--shadow-md);
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            max-width: 400px;
            margin-left: auto;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }

        .summary-total {
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--primary-dark);
            border-top: 2px solid #f3f4f6;
            padding-top: 1rem;
            margin-top: 0.5rem;
        }

        .btn-checkout {
            background: var(--secondary);
            color: white;
            padding: 1rem 2rem;
            border-radius: 8px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: none;
            cursor: pointer;
            transition: 0.3s;
            width: 100%;
            margin-top: 1rem;
        }

        .btn-checkout:hover {
            background: var(--primary);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .empty-cart {
            text-align: center;
            padding: 4rem;
        }

        .empty-cart i {
            font-size: 4rem;
            color: #d1d5db;
            margin-bottom: 1.5rem;
        }

        @media (max-width: 768px) {
            .cart-table {
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo"><a href="/">
                    <?= $company_name ?>
                </a></div>

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
                    <span class="cart-count">
                        <?= $cart_count ?>
                    </span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Cart Section -->
    <section class="cart-section">
        <div class="container">
            <!-- <div class="section-header text-center" data-aos="fade-up">
                <h2 class="section-title">Your Shopping Cart</h2>
            </div> -->

            <?php if ($cart_count > 0): ?>
                <div class="cart-wrapper" data-aos="fade-up">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cart as $index => $item): ?>
                                <tr>
                                    <td class="cart-item-name">
                                        <?= htmlspecialchars($item['name']) ?>
                                    </td>
                                    <td class="cart-item-price">
                                        <?= htmlspecialchars($item['price']) ?>
                                    </td>
                                    <td>
                                        <form method="POST" style="margin:0;">
                                            <input type="hidden" name="action" value="remove">
                                            <input type="hidden" name="index" value="<?= $index ?>">
                                            <button type="submit" class="btn-delete"><i class="fas fa-trash"></i>
                                                Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div class="cart-summary">
                        <div class="summary-row summary-total">
                            <span>Total</span>
                            <span>$
                                <?= number_format($total, 2) ?>
                            </span>
                        </div>
                        <button class="btn-checkout" onclick="alert('Checkout functionality coming soon!');">Proceed to
                            Checkout</button>
                        <a href="/"
                            style="display:block; text-align:center; margin-top:1rem; color:var(--text-muted); font-size:0.9rem;">Continue
                            Shopping</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="empty-cart" data-aos="fade-in">
                    <i class="fas fa-shopping-cart"></i>
                    <h3>Your cart is empty</h3>
                    <p style="color:var(--text-muted); margin-bottom: 2rem;">Looks like you haven't added any sustainable
                        solutions yet.</p>
                    <a href="/#products" class="btn btn-primary">Browse Products</a>
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

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
    </script>
</body>

</html>