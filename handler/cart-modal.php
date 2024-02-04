<?php

session_start();

if (!empty($_SESSION['cart'])): ?>
    <?php foreach ($_SESSION['cart'] as $id => $item): ?>
        <div data-id="<?php echo $id ?>" class="cartitem">
            <div class="logoitem">
                <img class="imgitem" src="../img/card/<?php echo $item['img'] ?>" alt="">
            </div>
            <div class="textitem">
                <h3><?php echo $item['title'] ?></h3>
                <div class="counter">
                    <p data-counter class="count"><?php echo $item['qty'] ?></p>
                    <a href="#" class="decrease-btn" data-id="<?php echo $id ?>">-</a>
                </div>
                <p class="price__cart"><?php echo $item['price'] ?></p>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="title__total">Итого: <?php echo $_SESSION['cart.sum'] ?>$</div>
<?php else: ?>
    <p>Корзина пуста...</p>
<?php endif; ?>
<div class="btn__buy-cart">
    <?php if (!empty($_SESSION['cart'])): ?>
        <button onclick="buyCart()">Купить</button>
    <?php endif; ?>
</div>

