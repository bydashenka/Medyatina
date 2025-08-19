<?php
session_start();
require '../db.php';

if (!isset($_SESSION["user_id"]) || !$_SESSION["is_admin"]) {
    header("Location: ../index.php");
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM products");
$stmt->execute();
$products = $stmt->fetchAll();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit_product'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $weight = $_POST['weight'];
        $price = $_POST['price'];
        $category = $_POST['category'];

        if ($_FILES['image']['error'] == 0) {
            $image = 'uploads/' . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], '../' . $image);
        } else {
            $stmt = $pdo->prepare("SELECT image FROM products WHERE id = ?");
            $stmt->execute([$id]);
            $oldImage = $stmt->fetchColumn();
            $image = $oldImage;
        }

        $updateStmt = $pdo->prepare("UPDATE products SET name = ?, description = ?, weight = ?, price = ?, category = ?, image = ? WHERE id = ?");
        $updateStmt->execute([$name, $description, $weight, $price, $category, $image, $id]);

        header("Location: manage_products.php");
        exit();
    }

    if (isset($_POST['add_product'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $weight = $_POST['weight'];
        $price = $_POST['price'];
        $category = $_POST['category'];

        if ($_FILES['image']['error'] == 0) {
            $image = 'uploads/' . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], '../' . $image);
        }

        $insertStmt = $pdo->prepare("INSERT INTO products (name, description, weight, price, category, image) VALUES (?, ?, ?, ?, ?, ?)");
        $insertStmt->execute([$name, $description, $weight, $price, $category, $image]);

        header("Location: manage_products.php");
        exit();
    }
}

if (isset($_GET['delete_product'])) {
    $id = $_GET['delete_product'];
    $stmt = $pdo->prepare("SELECT image FROM products WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch();
    if ($product && file_exists('../' . $product['image'])) {
        unlink('../' . $product['image']);
    }

    $deleteStmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    $deleteStmt->execute([$id]);

    header("Location: manage_products.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Управление товарами</title>
    <style>
        .modal {
            position: fixed;
            z-index: 10;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
        }
        .modal-content {
            background-color: #fff8ed;
            margin: 10% auto;
            padding: 20px;
            border-radius: 20px;
            width: 90%;
            max-width: 500px;
            position: relative;
        }
        .close {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 28px;
            font-weight: bold;
            color: #a57c48;
            cursor: pointer;
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
  <h2>Управление товарами</h2>
  <table>
    <thead>
      <tr>
        <th>Название</th>
        <th>Описание</th>
        <th>Вес</th>
        <th>Цена</th>
        <th>Категория</th>
        <th>Изображение</th>
        <th>Действия</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($products as $product): ?>
        <tr>
          <td><?php echo htmlspecialchars($product['name']); ?></td>
          <td><?php echo htmlspecialchars($product['description']); ?></td>
          <td><?php echo htmlspecialchars($product['weight']); ?></td>
          <td><?php echo htmlspecialchars($product['price']); ?> руб.</td>
          <td><?php echo htmlspecialchars($product['category']); ?></td>
          <td><img src="../<?php echo htmlspecialchars($product['image']); ?>" alt="Изображение товара" width="100"></td>
          <td>
            <a href="#" class="edit-btn"
               data-id="<?php echo $product['id']; ?>"
               data-name="<?php echo htmlspecialchars($product['name']); ?>"
               data-description="<?php echo htmlspecialchars($product['description']); ?>"
               data-weight="<?php echo htmlspecialchars($product['weight']); ?>"
               data-price="<?php echo htmlspecialchars($product['price']); ?>"
               data-category="<?php echo htmlspecialchars($product['category']); ?>"
               data-image="../<?php echo htmlspecialchars($product['image']); ?>">
               Редактировать
            </a>
            <a href="manage_products.php?delete_product=<?php echo $product['id']; ?>" onclick="return confirm('Вы уверены?')">Удалить</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <h3>Добавить новый товар</h3>
  <form method="POST" enctype="multipart/form-data" class="minwindow">
    <label for="name">Название:</label>
    <input type="text" name="name" required>
    <label for="description">Описание:</label>
    <textarea name="description" required></textarea>
    <label for="weight">Вес:</label>
    <input type="number" name="weight" required>
    <label for="price">Цена:</label>
    <input type="number" name="price" required>
    <label for="category">Категория:</label>
    <input type="text" name="category" required>
    <label for="image">Изображение:</label>
    <input type="file" name="image" required>
    <button type="submit" name="add_product">Добавить товар</button>
  </form>

  <div id="editModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h3>Редактировать товар</h3>
      <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" id="edit-id">
        <label for="name">Название:</label>
        <input type="text" name="name" id="edit-name" required>
        <label for="description">Описание:</label>
        <textarea name="description" id="edit-description" required></textarea>
        <label for="weight">Вес:</label>
        <input type="number" name="weight" id="edit-weight" required>
        <label for="price">Цена:</label>
        <input type="number" name="price" id="edit-price" required>
        <label for="category">Категория:</label>
        <input type="text" name="category" id="edit-category" required>
        <label for="image">Новое изображение:</label>
        <input type="file" name="image">
        <img id="edit-preview" src="" alt="Изображение товара" width="100">
        <button type="submit" name="edit_product">Обновить товар</button>
      </form>
    </div>
  </div>
  <button class='button' type='submit'><a href="index.php"><p class='button__txt'>Вернуться назад</p></a></button>

</section>
<script>
  const modal = document.getElementById("editModal");
  const closeBtn = modal.querySelector(".close");
  const idField = document.getElementById("edit-id");
  const nameField = document.getElementById("edit-name");
  const descField = document.getElementById("edit-description");
  const weightField = document.getElementById("edit-weight");
  const priceField = document.getElementById("edit-price");
  const categoryField = document.getElementById("edit-category");
  const imgPreview = document.getElementById("edit-preview");

  document.querySelectorAll(".edit-btn").forEach(button => {
    button.addEventListener("click", function (e) {
      e.preventDefault();
      idField.value = this.dataset.id;
      nameField.value = this.dataset.name;
      descField.value = this.dataset.description;
      weightField.value = this.dataset.weight;
      priceField.value = this.dataset.price;
      categoryField.value = this.dataset.category;
      imgPreview.src = this.dataset.image;
      modal.style.display = "block";
    });
  });

  closeBtn.onclick = function () {
    modal.style.display = "none";
  }

  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>
</body>
</html>