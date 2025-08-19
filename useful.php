<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="img/icon.png">
    <title>Полезное</title>
</head>
<body>
<header><div class="useful">
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
        <h1 class="main__title">Блог</h1>
        <p class="main__subtitle">Мы обновляем наши статьи каждый месяц! Следите, чтобы не упустить возможность узнать что-то новое</p>
    </div>

    </div>
</header>

    <section class="orange">
        <div class="choice">
            <h2>Как выбрать качественный мед?</h2>
            <p class="about-text">Узнайте, как отличить натуральный мед от подделки</p>
            <p class="choice__caption">При выборе качественного меда обратите внимание на следующие аспекты:</p>
            <div class="choice__aspects">
                <div class="choice__aspect">
                    <img class="choice__img" src="img/licence.png" alt="Сертификаты">
                    <p class="choice__caption">Сертификаты</p>
                    <p class="choice__description">Обратите внимание на наличие сертификатов качества и анализов, подтверждающих натуральность продукта.</p>
                </div>
                <div class="choice__aspect">
                    <img class="choice__img" src="img/origin.png" alt="Происхождение">
                    <p class="choice__caption">Происхождение</p>
                    <p class="choice__description">Ищите информацию о том, откуда поступает мед. Предпочтите местных производителей и сертифицированные продукты.</p>
                </div>
                <div class="choice__aspect">
                    <img class="choice__img" src="img/jar.png" alt="Упаковка">
                    <p class="choice__caption">Упаковка</p>
                    <p class="choice__description">Выбирайте мед, упакованный в стеклянные банки; пластиковая упаковка может негативно сказываться на его качестве.</p>
                </div>
            </div>
            <div class="choice__aspects">
                <div class="choice__aspect">
                    <img class="choice__img" src="img/jars.png" alt="Цвет и консистенция">
                    <p class="choice__caption">Цвет и консистенция</p>
                    <p class="choice__description">Натуральный мед может варьироваться от светлого до темного, в зависимости от сорта. Он должен быть густым и вязким, без осадка и пены.</p>
                </div>
                <div class="choice__aspect">
                    <img class="choice__img" src="img/smell_taste.png" alt="Запах и вкус">
                    <p class="choice__caption">Запах и вкус</p>
                    <p class="choice__description">Качественный мед обладает насыщенным, природным ароматом и приятным сладковатым вкусом, без резких химических ноток.</p>
                </div>
            </div>
        </div>

    </section>
        <div class="recipe">
            <h2>Рецепт месяца</h2>
            <p class="recipe__fatlabel">Медовое печенье</p>
            <div class="recipe__components">
                <div class="recipe__ingredients">
                    <p class="recipe__fatlabel">Ингредиенты</p>
                    <p class="recipe__label">Мука - 225 г</p>
                    <p class="recipe__label">Масло сливочное - 100 г</p>
                    <p class="recipe__label">Сахар - 100 г</p>
                    <p class="recipe__label">Соль - 1 щепотка</p>
                    <p class="recipe__label">Сода - 0.5 ч.л.</p>
                    <p class="recipe__label">Разрыхлитель - 2 ч.л.</p>
                    <p class="recipe__label">Мед - 100 г</p>
                    <p class="recipe__label">Имбирь молотый - 1 ч.л.</p>
                    <p class="recipe__label">Специи для пряников - по желанию</p>
                    <p class="recipe__label">Сахар - для обсыпки</p>
                </div>
                <img class="recipe__cookies" src="img/cookies.png" alt="Печеньки">
            </div>
            <div class="recipe__steps">
                <div class="recipe__step">
                    <img class="recipe__stepimg" src="img/1.png" alt="Этап">
                    <p class="recipe__action">В удобной емкости смешать муку, соль, разрыхлитель, соду, сахар и специи. </br>Перемешать.</p>
                </div>
                <div class="recipe__step">
                    <img class="recipe__stepimg" src="img/2.png" alt="Этап">
                    <p class="recipe__action">Твердое масло порубить, а затем перетереть в мелкую крошку.</p>
                </div>
                <div class="recipe__step">
                    <img class="recipe__stepimg" src="img/3.png" alt="Этап">
                    <p class="recipe__action">Затем добавить мед.</p>
                </div>
                <div class="recipe__step">
                    <img class="recipe__stepimg" src="img/4.png" alt="Этап">
                    <p class="recipe__action">Смешать мед с мукой. </br>Сначала все рассыпается, затем тесто становится более послушным.</p>
                </div>
                <div class="recipe__step">
                    <img class="recipe__stepimg" src="img/5.png" alt="Этап">
                    <p class="recipe__action">Долго месить тесто не следует, чтобы не затянуть его. </br>Оставить тесто для созревания на 15 минут.</p>
                </div>
                <div class="recipe__step">
                    <img class="recipe__stepimg" src="img/6.png" alt="Этап">
                    <p class="recipe__action">Затем разделить его на одинаковые шарики не больше грецкого ореха. </br>Каждый шарик обвалять в сахаре со всех сторон.</p>
                </div>
                <div class="recipe__step">
                    <img class="recipe__stepimg" src="img/7.png" alt="Этап">
                    <p class="recipe__action">Выложить на противень с пергаментом. Выпекать при 180 градусах примерно 10-15 минут. Время зависит от способностей вашей духовки. Печенье должно хорошо зарумяниться. Следите, чтобы низ не подгорел, что может произойти очень быстро, так как сахар хорошо поджаривается снизу.</p>
                </div>
            </div>
        </div>

    <section class="dark-orange">
        <div class="usage">
            <h2>Применение меда</h2>
            <p class="usage__fat usage__indent">Мёд: увлажнение + отшелушивание</p>
            <p class="usage__reg usage__indent">Мёд богат минералами, аминокислотами и биоактивными веществами, которые быстро смягчают кожу, устраняют ее сухость, повышают тонус и упругость, устраняют воспаления, замедляют процессы старения. Также в нём есть все витамины группы В, а еще витамины К, Е, С и провитамин А. Домашние маски с мёдом — отличное экспресс средство для восстановления и питания сухой кожи. А за счет того, что мёд также содержит небольшое количество фруктовых кислот (яблочную, молочную, щавелевую, лимонную, глюконовую и другие), он также деликатно отшелушивает старые клетки кожи, выравнивая ее тон и улучшая цвет лица.</p>
            <p class="usage__fat">Рецепт маски</p>
            <p class="usage__reg">Смешайте 2 столовые ложки жидкого <b>мёда</b> и 2 столовые ложки <b>сметаны.</b></p>
            <p class="usage__reg">Нанесите получившуюся смесь на очищенную кожу лица, шеи и декольте. </p>
            <p class="usage__reg usage__indent">Через 20 минут смойте тёплой водой.</p>
            <p class="usage__fat">Рекомендации</p>
            <p class="usage__reg">Перед использованием маски проверьте на аллергическую реакцию, нанеся небольшое количество смеси на запястье.</p>
            <p class="usage__reg">Используйте медовые маски 1-2 раза в неделю для достижения лучших результатов.</p>
            <p class="usage__reg">Не забывайте о важности очистки кожи перед нанесением маски.</p>
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