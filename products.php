<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="img/icon.png">
    <title>Продукция</title>
</head>
<body>
<header><div class="products">
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

    <section>
    <div class="honey">
        <h2>Мед</h2>
        <div class="honey__cards">
            <?php
            $stmt = $pdo->prepare("SELECT * FROM products WHERE category = 'honey'");
            $stmt->execute();
            while ($product = $stmt->fetch()) {
                echo "
                <div class='honey__card'>
                    <img class='honey__img' src='{$product['image']}' alt='{$product['name']}'>
                    <div class='honey__about'>
                        <p class='honey__name'>{$product['name']}</p>
                        <div class='honey__flex'>
                            <div class='honey__info'>
                                <p class='honey__weight'>{$product['weight']}</p>
                                <p class='honey__price'>{$product['price']} р</p>
                            </div>
                        <a href='order.php?product_id={$product['id']}' class='button'><p class='button__txt'>Заказать</p></a>
                        </div>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>
</section>   

<section>
    <div class="honey">
        <h2>Продукты пчеловодства</h2>
        <div class="honey__cards">
            <?php
            $stmt = $pdo->prepare("SELECT * FROM products WHERE category = 'beekeeping'");
            $stmt->execute();
            while ($product = $stmt->fetch()) {
                echo "
                <div class='honey__card'>
                    <img class='honey__img' src='{$product['image']}' alt='{$product['name']}'>
                    <div class='honey__about'>
                        <p class='honey__name'>{$product['name']}</p>
                        <div class='honey__flex'>
                            <div class='honey__info'>
                                <p class='honey__weight'>{$product['weight']}</p>
                                <p class='honey__price'>{$product['price']} р</p>
                            </div>
                            <a href='order.php?product_id={$product['id']}' class='button'><p class='button__txt'>Заказать</p></a>
                        </div>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>
</section>

<section>
    <div class="honey">
        <h2>Подарочные наборы</h2>
        <div class="honey__cards">
            <?php
            $stmt = $pdo->prepare("SELECT * FROM products WHERE category = 'sets'");
            $stmt->execute();
            while ($product = $stmt->fetch()) {
                echo "
                <div class='honey__card'>
                    <img class='honey__img' src='{$product['image']}' alt='{$product['name']}'>
                    <p class='honey__description'>{$product['description']}</p>
                    <div class='honey__about'>
                        <p class='honey__name'>{$product['name']}</p>
                        <div class='honey__flex'>
                            <div class='honey__info'>
                                <p class='honey__weight'>{$product['weight']}</p>
                                <p class='honey__price'>{$product['price']} р</p>
                            </div>
                            <a href='order.php?product_id={$product['id']}' class='button'><p class='button__txt'>Заказать</p></a>
                        </div>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>
</section>


<section class="dark-orange">
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