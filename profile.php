<?php
session_start();
require 'db.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$stmt = $pdo->prepare("
    SELECT o.id, p.name, p.weight, p.price, o.status 
    FROM orders o 
    JOIN products p ON o.product_id = p.id 
    WHERE o.user_id = ?
");
$stmt->execute([$_SESSION["user_id"]]);
$orders = $stmt->fetchAll();
?>
<?php session_start(); ?>
<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="img/icon.png">
    <title>Вход</title>
</head>
<body>
<header>
  <nav class="menu">
    <ul class="menu__items">
      <li class="menu__item"><a class="menu__link" href="index.php"><p class="menu__logo">Medyatina</p></a></li>
      <li class="menu__item"><a class="menu__link" href="about.php">О компании</a></li>
      <li class="menu__item"><a class="menu__link" href="products.php">Продукция</a></li>
      <li class="menu__item"><a class="menu__link" href="useful.php">Полезное</a></li>
      <li class="menu__item"><a class="menu__link" href="contact.php">Контакты</a></li>

      <?php if (isset($_SESSION['user_id'])): ?>
        <?php if ($_SESSION['is_admin'] == 0): ?> <!-- Убираем пункт для админа -->
          <li class="menu__item"><a class="menu__link" href="profile.php"><img class="menu__login" src="img/login_black.png" alt="Профиль"></a></li>
        <?php endif; ?>
        <li class="menu__item">
          <form action="logout.php" method="post">
            <button class="menu__link" style="background: none; border: none; cursor: pointer;">Выйти</button>
          </form>
        </li>
      <?php else: ?>
        <li class="menu__item"><a class="menu__link" href="login.php"><img class="menu__login" src="img/login_black.png" alt="Войти"></a></li>
      <?php endif; ?>
    </ul>
  </nav>
</header>

<main>
  <h2>Ваши заказы</h2>

  <?php if (count($orders) === 0): ?>
    <p>У вас пока нет заказов.</p>
  <?php else: ?>
    <?php foreach ($orders as $order): ?>
      <div class="order">
        <div class="order-left">
          <div><strong><?= htmlspecialchars($order["name"]) ?></strong></div>
          <div><?= htmlspecialchars($order["weight"]) ?> г — <?= htmlspecialchars($order["price"]) ?> ₽</div>
        </div>
        <div class="order-right">
          <?= htmlspecialchars($order["status"]) ?>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</main>
</body>
</html>
