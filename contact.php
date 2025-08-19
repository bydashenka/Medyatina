<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="img/icon.png">
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <title>Контакты</title>
</head>
<body>
<header>
        <div class="contact">
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

            <div class="main">
                <h1 class="main__title">Мы всегда на связи с вами</h1>
                <p class="main__subtitle">Подписывайтесь на наши социальный сети, чтобы не упускать новинки</p>
            </div>

        </div>
</header>

<section>
    <div class="contacts">
        <h2>Контакты “Medyatina”</h2>
        <div class="contacts__information">
            <div class="contacts__data">
                <p>Адрес: г. Москва, ул. Медовая, д. 10</p>
                <p>Телефон: +7 (900) 960-55-22</p>
                <p>График работы:<br>Каждый день с 8:00 до 20:00</p>
                <p>Социальные сети:</p>
                <div class="contacts__icons">
                <img class="contacts__icon" src="img/inst.png" alt="instagram">
                <img class="contacts__icon" src="img/vk.png" alt="vk">
                <img class="contacts__icon" src="img/telegram.png" alt="telegram">
            </div>
            </div>
            <div class="contacts__map" id="map"></div>
        </div>
    </div>
</section>


<section class="orange">
    <footer>
        <nav class="footmenu">
            <ul class="footmenu__items">
                <li class="footmenu__item"><a class="footmenu__link" href="about.php">О компании</a></li>
                <li class="footmenu__item"><a class="footmenu__link" href="products.php">Продукция</a></li>
            </ul>
            <ul class="footmenu__items">
                <li class="footmenu__item"><a class="footmenu__link" href="useful.php">Полезное</a></li>
                <li class="footmenu__item"><a class="footmenu__link" href="contact.php">Контакты</a></li>
            </ul>
        </nav>
        <div class="footmenu__logo">
            <li class="footmenu__item"><a class="footmenu__logolink" href="index.php">Medyatina</a></li>
        </div>
        <div class="footmenu__contact">
            <p class="footmenu__cotnact-us">Свяжитесь с нами</p>
            <div class="footmenu__icons">
                <img class="footmenu__icon" src="img/inst.png" alt="instagram">
                <img class="footmenu__icon" src="img/vk.png" alt="vk">
                <img class="footmenu__icon" src="img/telegram.png" alt="telegram">
            </div>
        </div>
    </footer>
    </section>
    <script src="script.js"></script>
</body>
</html>