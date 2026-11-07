
<?php
require_once __DIR__ . '/order_functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$orderSummary = order();

setcookie(
    'lastVisit',
    date('l, F j, Y g:i a'),
    time() + 86400,
    '/'
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chez Session | Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8eddd;
            color: #3c2419;
            max-width: 680px;
            margin: 40px auto;
            padding: 20px;
        }
        main {
            background: white;
            padding: 28px;
            border-radius: 14px;
        }
        h1 { color: #823c24; }
        .receipt, .info {
            background: #fff1d6;
            padding: 18px;
            border-radius: 8px;
            margin: 18px 0;
            line-height: 1.8;
        }
        a {
            display: inline-block;
            background: #a6472a;
            color: white;
            padding: 12px 18px;
            border-radius: 7px;
            margin: 10px 8px 0 0;
            text-decoration: none;
        }
    </style>
</head>
<body>
<main>
    <h1>Thanks for your order!</h1>

    <h2>Your receipt</h2>
    <div class="receipt">
        <?= $orderSummary ?>
    </div>

    <div class="info">
        <h2>Order feedback</h2>
        <p><?= htmlspecialchars(completionMessage(), ENT_QUOTES, 'UTF-8') ?></p>
        <p><?= htmlspecialchars(pairingSuggestion(), ENT_QUOTES, 'UTF-8') ?></p>

        <h3>Estimated total</h3>
        <p><?= htmlspecialchars(formattedTotal(), ENT_QUOTES, 'UTF-8') ?></p>

        <h3>Order profile</h3>
        <p><?= htmlspecialchars(orderProfile(), ENT_QUOTES, 'UTF-8') ?></p>

        <p><?= htmlspecialchars(pricingNote(), ENT_QUOTES, 'UTF-8') ?></p>
    </div>

    <a href="index.php">Order Again!</a>
    <a href="forget_order.php">Forget Order</a>
</main>
</body>
</html>

