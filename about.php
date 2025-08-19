<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="img/icon.png">
    <title>О компании</title>
</head>
<body>
<header><div class="about">
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
    <div class="main">
            <h1 class="main__title">Наша компания</h1>
        <p class="main__subtitle">с вами уже 10 лет</p>
    </div>

    </div>
</header>

    <section class="orange">
        <div class="main">
            <h2>Medyatina</h2>
            <p class="about-text">Компания была основана в 2015 году  с целью продвижения натуральной  медовой продукции на рынок. Начав  с небольшого семейного пасечного  хозяйства, мы постепенно  расширили производство, сохранив  традиционные методы  пчеловодства.</p>
        </div>
    </section>

    <section>
        <div class="team">
            <h2>Команда</h2>
            <img src="img/team.png" alt="наша команда">
            <p class="about-text">Мы – команда профессионалов, влюбленных в свое дело. Наши пчеловоды, технологи и специалисты по продажам ежедневно работают над тем, чтобы каждый клиент получал качественный продукт.</p>
        </div>
    </section>

    <section class="dark-orange">
        <div class="counts">
            <div class="counts__success">
                <p class="counts__number">10</p>
                <p class="about-text">лет опыта в сфере пчеловодства</p>
            </div>
            <div class="counts__success">
                <p class="counts__number">2 000</p>
                <p class="about-text">деревьев мы посадили в области нашей активности в рамках программы по защите окружающей среды</p>
            </div>
            <div class="counts__success">
                <p class="counts__number">10 000</p>
                <p class="about-text">довольных клиентов по всей России</p>
            </div>
        </div>
    </section>

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
    <script src="script.js"></script>
</body>
</html>