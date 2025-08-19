<?php
session_start();
require '../db.php';

// Проверка на сессию и админские права
if (!isset($_SESSION["user_id"]) || !isset($_SESSION["is_admin"]) || $_SESSION["is_admin"] != 1) {
    // Если пользователь не админ или не авторизован, перенаправляем на главную страницу
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/png" href="img/icon.png">
    <title>Админ-панель - Medyatina</title>
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

<main>
  <h2>Админ-панель</h2>
  <p>Добро пожаловать в админ-панель. Вы можете управлять товарами и заказами.</p>
    <div class="buttons">
    <button class='button' type='submit'><a href="manage_products.php"><p class='button__txt'>Управление товарами</p></a></button>
    <button class='button' type='submit'><a href="manage_orders.php"><p class='button__txt'>Управление заказами</p></a></button>
    </div>
</main>
</body>
</html>
