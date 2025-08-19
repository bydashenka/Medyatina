<?php
require '../db.php';
session_start();

// Проверка на администраторские права
if (!isset($_SESSION["is_admin"]) || !$_SESSION["is_admin"]) {
    header("Location: ../index.php");
    exit("Access denied");  // Также можно перенаправить, например, на страницу с ошибкой доступа.
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Подготовка и выполнение запроса
    $stmt = $pdo->prepare("UPDATE orders SET status = ? WHERE id = ?");
    $stmt->execute([$_POST["status"], $_POST["order_id"]]);
    header("Location: manage_orders.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="img/icon.png">
    <title>Обновление заказа - Админ-панель</title>
</head>
<body>
<header>
  <nav class="menu">
    <ul class="menu__items">
      <li class="menu__item"><a class="menu__link" href="./index.php"><p class="menu__logo">Medyatina</p></a></li>
      <li class="menu__item"><a class="menu__link" href="./about.php">О компании</a></li>
      <li class="menu__item"><a class="menu__link" href="./products.php">Продукция</a></li>
      <li class="menu__item"><a class="menu__link" href="./useful.php">Полезное</a></li>
      <li class="menu__item"><a class="menu__link" href="./contact.php">Контакты</a></li>
      
      <?php if (isset($_SESSION['user_id'])): ?>
        <li class="menu__item"><a class="menu__link" href="profile.php"><img class="menu__login" src="img/login_black.png" alt="Профиль"></a></li>
        <li class="menu__item">
          <form action="logout.php" method="post">
            <button class="menu__link" style="background: none; border: none; cursor: pointer;">Выйти</button>
          </form>
        </li>
      <?php else: ?>
        <li class="menu__item"><a class="menu__link" href="login.php"><img class="menu__login" src="img/login_white.png" alt="Войти"></a></li>
      <?php endif; ?>
    </ul>
  </nav>
</header>

<main>
  <h2>Обновить статус заказа</h2>
  <form method="POST" action="">
    <label for="order_id">ID заказа:</label>
    <input type="text" name="order_id" id="order_id" required>

    <label for="status">Статус заказа:</label>
    <select name="status" id="status" required>
      <option value="в обработке">в обработке</option>
      <option value="отправлен">отправлен</option>
      <option value="доставлен">доставлен</option>
    </select>

    <button type="submit">Обновить</button>
  </form>
</main>
</body>
</html>
