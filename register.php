<?php
session_start();
require 'db.php';

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Проверка совпадения паролей
    if ($password !== $confirm_password) {
        $error_message = "Пароли не совпадают!";
    } else {
        // Проверка, существует ли пользователь с таким email
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $existingUser = $stmt->fetch();

        if ($existingUser) {
            $error_message = "Пользователь с таким email уже зарегистрирован.";
        } else {
            // Хеширование и регистрация
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $hashedPassword]);

            // Перенаправление на вход
            header("Location: login.php");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="icon" type="image/png" href="img/icon.png">
  <title>Регистрация</title>
</head>
<body>
<header>
<nav class="menu">
  <div class="menu__container">
    <a class="menu__logo" href="./index.php">
      <p class="menu__logo-text">Medyatina</p>
    </a>

    <div class="menu__center">
      <ul class="menu__items">
        <li class="menu__item"><a class="menu__link" href="./about.php">О компании</a></li>
        <li class="menu__item"><a class="menu__link" href="./products.php">Продукция</a></li>
        <li class="menu__item"><a class="menu__link" href="./useful.php">Полезное</a></li>
        <li class="menu__item"><a class="menu__link" href="./contact.php">Контакты</a></li>
      </ul>
    </div>
    
    <div class="menu__right">
      <?php if (isset($_SESSION['user_id'])): ?>
        <div class="menu__profile">
          <a class="menu__profile-link" href="profile.php">
            <img class="menu__profile-icon" src="img/login_black.png" alt="Профиль">
          </a>
          <form action="logout.php" method="post" class="menu__logout-form">
            <button class="menu__logout-btn" type="submit">Выйти</button>
          </form>
        </div>
      <?php else: ?>
        <a class="menu__profile-link" href="login.php">
          <img class="menu__profile-icon" src="img/login_black.png" alt="Войти">
        </a>
      <?php endif; ?>
    </div>

    <div class="menu__burger">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
</nav>
</header>

<main>
  <h2>Регистрация</h2>

  <?php if (!empty($error_message)): ?>
    <div class="error-message"><?php echo htmlspecialchars($error_message); ?></div>
  <?php endif; ?>

  <form method="POST" action="register.php">
    <input name="name" placeholder="Имя" required>
    <input name="email" type="email" placeholder="Email" required>
    <input name="password" type="password" placeholder="Пароль" required>
    <input name="confirm_password" type="password" placeholder="Повторите пароль" required>
    <button class="button" type="submit"><p class="button__txt">Зарегистрироваться</p></button>
  </form>

  <p>Если у вас уже есть аккаунт, <a href="login.php"><span class="underline">войдите</span></a></p>
</main>
</body>
</html>
