<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем пользователя по email
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$_POST["email"]]);
    $user = $stmt->fetch();

    if ($user) {
        // Проверяем, захеширован ли пароль
        if (password_get_info($user['password'])['algo'] !== 0) {
            // Пароль хеширован, используем password_verify
            if (password_verify($_POST["password"], $user["password"])) {
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["is_admin"] = $user["is_admin"]; // Сохраняем информацию о роли админа

                // Перенаправляем в зависимости от роли пользователя
                if ($_SESSION["is_admin"] == 1) {
                    header("Location: admin/index.php");  // Админская панель
                } else {
                    header("Location: profile.php");  // Личный кабинет
                }
                exit();
            } else {
                $error_message = "Неверный логин или пароль";
            }
        } else {
            // Если пароль не хеширован, сравниваем напрямую
            if ($_POST["password"] === $user["password"]) {
                // Захешировать пароль и обновить его в базе данных
                $newPasswordHash = password_hash($_POST["password"], PASSWORD_BCRYPT);
                $updateStmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
                $updateStmt->execute([$newPasswordHash, $user["id"]]);

                // Создаем сессию для пользователя
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["is_admin"] = $user["is_admin"]; // Сохраняем информацию о роли админа

                // Перенаправляем в зависимости от роли пользователя
                if ($_SESSION["is_admin"] == 1) {
                    header("Location: admin/index.php");  // Админская панель
                } else {
                    header("Location: profile.php");  // Личный кабинет
                }
                exit();
            } else {
                $error_message = "Неверный логин или пароль";
            }
        }
    } else {
        $error_message = "Неверный логин или пароль";
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
    <title>Вход</title>
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
  <?php if (isset($error_message)): ?>
    <div class="error-message"><?php echo $error_message; ?></div>
  <?php endif; ?>
  <form method="POST" action="login.php">
    <input name="email" type="email" placeholder="Email" required>
    <input name="password" type="password" placeholder="Пароль" required>
    <button class="button" type="submit"><p class="button__txt">Войти</p></button>
  </form>
  <p>Если у вас нет аккаунта, <a href="register.php"><span class="underline">зарегистрируйтесь</span></a></p>
</main>
</body>
</html>
