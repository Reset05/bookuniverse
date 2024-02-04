<?php

session_start();
include "../cores/connect.php";
include "../cores/funcs.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../img/logo/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Главная</title>
</head>
<body>
<section class="modal__signin none">

<div class="container container__signin">
    <div class="exit"><i class="fa-regular fa-circle-xmark"></i></div>
    <div class="title__signin">Вход</div>
    <form class="form__signin" method='post' action="handler/auth.php">

        <p class="text__signin">Логин</p>
        <input required class="inp__signin" type="text" name="loginAuth">

        <p class="text__signin">Пароль</p>
        <input required class="inp__signin" type="password" name="passAuth">

        <div class="btn">
            <button class="login">Войти</button>
        </div>

        <p class="text__noneacc">Если у вас нет аккаунта, можете пройти <span class="registration">регистрацию</span></p>
    </form>
</div>


</section>

<section class="modal__login none">

<div class="container container__signin">
    <div class="exit2"><i class="fa-regular fa-circle-xmark"></i></div>
    <div class="title__signin">Регистрация</div>
    <form class="form__signin" action="handler/registration.php" method="POST">

        <p class="text__signin">Логин</p>
        <input required class="inp__signin" type="text" name="loginReg" id="">

        <p class="text__signin">Пароль</p>
        <input required class="inp__signin" type="password" name="passReg" id="">

        <p class="text__signin">Почта</p>
        <input required class="inp__signin" type="email" name="mailReg" id="">

        <div class="btn">
            <button class="login">Регистрация</button>
        </div>

        <p class="text__noneacc">Если у вас есть аккаунт, можете <span class="login__inmodal">войти</span></p>
    </form>
</div>


</section>


<section class="carts none cart-modal" id="cart-modal">
<div class="container container__cart">
<div class="exit__cart"><i class="fa-regular fa-circle-xmark"></i></div>
<h3 class="title__cart">Корзина</h3>
<div class="container-cartitem">
    <div class="modal-cart-content">

    </div>
    
</div>
</section>

<header>
        <nav>
            <div class="container container__menu">
                <a href="../index.phtml"><h2 class="title__logo">Book Universe</h2></a>
                <form class="form-search" action="../handler/search.php" method="get">
                <input class="search" type="search" placeholder="Поиск" name="query" id="">
                <button class="btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <div class="links__menu">
                    <div class="genre_block">
                        <a class="genre" href="">Жанр <i class="arrow fa-solid fa-chevron-down"></i></a>
                        <section class="section__genre none">

                            <div class="container container__genre">
                                <div class="class__genre">
                                    <a class="fan__genre" href="../handler/search-link-category.php?category=1" name="category[]">Фэнтези</a>
                                </div>
                                <div class="class__genre">
                                    <a class="hor__genre" href="../handler/search-link-category.php?category=2" name="category[]">Ужасы</a>
                                </div>
                                <div class="class__genre">
                                    <a class="det__genre" href="../handler/search-link-category.php?category=3" name="category[]">Детективы</a>
                                </div>
                                <div class="class__genre">
                                    <a class="dram__genre" href="../handler/search-link-category.php?category=4" name="category[]">Драмма</a>
                                </div>
                            </div>
                        
                        </section>
                    </div>
                    <a href="#footer">Контакты</a>
                    <?php if(!empty($_SESSION['auth'])): ?>
                        <?php if(!empty($_SESSION['admin'])): ?>
                            <a href="signinadmins.phtml" style = "color: rgb(233, 3, 3);"><?php echo($_SESSION['login']); ?></a>
                            <form style="margin-left: 10px;" action="handler/exit.php" method="post">
                                <button class="exit_btn">Выход</button>
                            </form>
                        <?php else: ?>
                            <a style = "color: black;"><?php echo($_SESSION['login']); ?></a>
                            <form style="margin-left: 10px;" action="handler/exit.php" method="post">
                                <button class="exit_btn">Выход</button>
                            </form>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="link_login">
                        <a class="link__signin" href="">Вход</a>
                        </div>
                    <?php endif; ?>
                    <a class="cart" id="get-cart" href=""><i class="fa-solid fa-cart-shopping"></i></a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container container-filter_product">
            <div class="block-filter-products">
            <?php

// Получаем результаты поиска
if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $stmt = $connect->prepare("SELECT * FROM books WHERE name LIKE ?");
    $stmt->execute(["%$query%"]);
    $search_results = $stmt->fetchAll();
} else {
    $search_results = [];
}

?>
<?php foreach($search_results as $product): ?>
    <div class="cards__block">
                        <img id="card-img" src="../img/card/<?= $product['img'] ?>">
                        <h3 class="card-title"><a style="color: black;" href="../pages/product.phtml?id=<?= $product['id'] ?>"><?= $product['name'] ?></a></h3>
                        <p><i class="fa-regular fa-star"></i><?= $product['rating'] ?></p>
                        <p id="price" class="price"><?= $product['price'] ?></p>
                        
                        <a href="?cart=add&id=<?= $product['id']?>" class="btn__buy add-to-cart" data-id="<?= $product['id']?>">Купить</a>
                    </div>
<?php endforeach; ?>

            </div>            
        </div>
    </main>

    <footer id="footer">
        <div class="container container__footer">
            <a href="../index.phtml"><h2 class="title__footer">Book Universe</h2></a>
            <div class="contacts">
                <p class="text__contacts">Телефон: +0(000)000-00-00</p>
                <br><br>
                <p class="text__contacts">Почта: email@gmail.com</p>
            </div>
        </div>
    </footer>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="../js/main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/e841cfff06.js" crossorigin="anonymous"></script>
<script src="../js/genre.js"></script>
<script src="../js/signin.js"></script>
<script src="../js/bestseller.js"></script>
<script src="../js/cart.js"></script>
<script src="../js/validate.js"></script>
</body>
</html>