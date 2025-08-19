<?php
session_start();
require '../db.php';

// Проверка на админские права
if (!isset($_SESSION["user_id"]) || !$_SESSION["is_admin"]) {
    header("Location: ../index.php");
    exit();
}

// Получаем заказы с почтой пользователя
$stmt = $pdo->query("SELECT o.id, u.name AS user_name, u.email, p.name AS product_name, o.status
                     FROM orders o
                     JOIN users u ON o.user_id = u.id
                     JOIN products p ON o.product_id = p.id");

$orders = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <link rel="icon" type="image/png" href="img/icon.png">
  <title>Управление заказами - Админ-панель</title>
  <style>
    .order-block {
      border-bottom: 1px solid #ccc;
      padding: 15px 0;
      margin-bottom: 15px;
    }

    .order-block p {
      margin: 0 0 10px;
    }

    .order-block select, .order-block button {
      margin-top: 5px;
    }
  </style>
</head>
<body>
<header>
<nav class="menu">
  <div class="menu__container">
    <a class="menu__logo" href="../index.php">
      <p class="menu__logo-text">Medyatina</p>
    </a>

    <div class="menu__center">
      <ul class="menu__items">
        <li class="menu__item"><a class="menu__link" href="../about.php">О компании</a></li>
        <li class="menu__item"><a class="menu__link" href="../products.php">Продукция</a></li>
        <li class="menu__item"><a class="menu__link" href="../useful.php">Полезное</a></li>
        <li class="menu__item"><a class="menu__link" href="../contact.php">Контакты</a></li>
      </ul>
    </div>
    
    <div class="menu__right">
        <div class="menu__item"><a class="menu__link" href="logoutadmin.php">Выйти</a></div>
    </div>

    <div class="menu__burger">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
</header>

<section class="window">
  <h2>Управление заказами</h2>
  <p>Вы можете обновить статус заказов, выбрав один из вариантов.</p>
  
  <?php foreach ($orders as $order): ?>
    <div class="order-block">
      <form method="POST" action="update_order.php">
        <p><strong><?= htmlspecialchars($order['user_name']) ?></strong> (<?= htmlspecialchars($order['email']) ?>) заказал <strong><?= htmlspecialchars($order['product_name']) ?></strong></p>
        <select name="status">
          <option <?= $order['status'] == 'в обработке' ? 'selected' : '' ?>>в обработке</option>
          <option <?= $order['status'] == 'отправлен' ? 'selected' : '' ?>>отправлен</option>
          <option <?= $order['status'] == 'доставлен' ? 'selected' : '' ?>>доставлен</option>
        </select>
        <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
        <button class='button center' type="submit"><p class='button__txt'>Обновить</p></button>
      </form>
    </div>
  <?php endforeach; ?>
  <button class='button' type='submit'><a href="index.php"><p class='button__txt'>Вернуться назад</p></a></button>

</section>
</body>
</html>
