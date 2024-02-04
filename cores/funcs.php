<?php

function debug(array $data): void
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

function get_products(): array
{
    global $connect;
    $stmt = $connect->prepare("SELECT * FROM books ORDER BY rating DESC LIMIT 8");
    $stmt->execute();
    return $stmt->fetchAll();
}

function get_product(int $id): array
{
    global $connect;
    $stmt = $connect->prepare("SELECT * FROM books WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function add_to_cart($product): void
{
    if (isset($_SESSION['cart'][$product['id']])) {
        $_SESSION['cart'][$product['id']]['qty'] += 1;
    } else {
        $_SESSION['cart'][$product['id']] = [
            'title' => $product['name'],
            'price' => $product['price'],
            'qty' => 1,
            'img' => $product['img'],
        ];
    }

    $_SESSION['cart.qty'] = !empty($_SESSION['cart.qty']) ? ++$_SESSION['cart.qty'] : 1;
    $_SESSION['cart.sum'] = !empty($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $product['price'] : $product['price'];
}

?>