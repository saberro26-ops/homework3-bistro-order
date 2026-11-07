
<?php
require_once __DIR__ . '/order_functions.php';

$lastVisit = $_COOKIE['lastVisit'] ?? null;
$welcome = is_string($lastVisit)
    ? 'Welcome back! Your last visit was ' . $lastVisit . '.'
    : 'First time at Chez Session? Welcome in!';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chez Session | Order Form</title>
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
        label { display: block; margin: 18px 0 7px; }
        select { width: 100%; padding: 10px; }
        fieldset { margin-top: 20px; }
        button, .button {
            display: inline-block;
            background: #a6472a;
            color: white;
            padding: 12px 18px;
            border: 0;
            border-radius: 7px;
            margin-top: 20px;
            text-decoration: none;
            cursor: pointer;
        }
        .info {
            background: #fff1d6;
            padding: 15px;
            margin-top: 20px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
<main>
    <h1>Chez Session</h1>
    <p>Build your dessert and drink order.</p>
    <p><?= htmlspecialchars($welcome, ENT_QUOTES, 'UTF-8') ?></p>

    <form action="process_order.php" method="post">
        <label for="dessert">Choose a dessert</label>
        <select id="dessert" name="dessert">
            <option value="none">Select a dessert</option>
            <option value="Cheesecake" <?= dessertSelected('Cheesecake') ?>>Cheesecake</option>
            <option value="Chocolate Cake" <?= dessertSelected('Chocolate Cake') ?>>Chocolate Cake</option>
            <option value="Carrot Cake" <?= dessertSelected('Carrot Cake') ?>>Carrot Cake</option>
            <option value="Tiramisu" <?= dessertSelected('Tiramisu') ?>>Tiramisu</option>
        </select>

        <label for="drink">Choose a drink</label>
        <select id="drink" name="drink">
            <option value="none">Select a drink</option>
            <option value="Coffee" <?= drinkSelected('Coffee') ?>>Coffee</option>
            <option value="Hot Chocolate" <?= drinkSelected('Hot Chocolate') ?>>Hot Chocolate</option>
            <option value="Root Beer" <?= drinkSelected('Root Beer') ?>>Root Beer</option>
            <option value="Tea" <?= drinkSelected('Tea') ?>>Tea</option>
            <option value="Milk" <?= drinkSelected('Milk') ?>>Milk</option>
        </select>

        <fieldset>
            <legend>Drink size</legend>
            <label><input type="radio" name="drinkSize" value="Small" <?= drinkSizeSelected('Small') ?>> Small</label>
            <label><input type="radio" name="drinkSize" value="Medium" <?= drinkSizeSelected('Medium') ?>> Medium</label>
            <label><input type="radio" name="drinkSize" value="Large" <?= drinkSizeSelected('Large') ?>> Large</label>
        </fieldset>

        <button type="submit">Send to Kitchen</button>
        <a class="button" href="forget_order.php">Forget Order</a>
    </form>

    <div class="info">
        <h2>Order guidance</h2>
        <p><?= htmlspecialchars(completionMessage(), ENT_QUOTES, 'UTF-8') ?></p>
        <p><?= htmlspecialchars(pairingSuggestion(), ENT_QUOTES, 'UTF-8') ?></p>
        <p><strong>Estimated total:</strong>
            <?= htmlspecialchars(formattedTotal(), ENT_QUOTES, 'UTF-8') ?>
        </p>
        <p><strong>Order profile:</strong>
            <?= htmlspecialchars(orderProfile(), ENT_QUOTES, 'UTF-8') ?>
        </p>
    </div>
</main>
</body>
</html>

