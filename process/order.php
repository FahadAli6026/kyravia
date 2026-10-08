<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/includes/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php#order');
    exit;
}

$name = trim((string) ($_POST['name'] ?? ''));
$phone = trim((string) ($_POST['phone'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$city = trim((string) ($_POST['city'] ?? ''));
$address = trim((string) ($_POST['address'] ?? ''));
$qty = (int) ($_POST['quantity'] ?? 1);

$errors = [];

if ($name === '' || mb_strlen($name) < 2) {
    $errors[] = 'Please enter your full name.';
}
if ($phone === '' || !preg_match('/^[0-9+\-\s]{10,16}$/', $phone)) {
    $errors[] = 'Please enter a valid phone number.';
}
if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address.';
}
if ($city === '') {
    $errors[] = 'Please enter your city.';
}
if ($address === '' || mb_strlen($address) < 8) {
    $errors[] = 'Please enter a delivery address.';
}
if ($qty < 1 || $qty > 20) {
    $errors[] = 'Quantity must be between 1 and 20.';
}

if ($errors) {
    $query = http_build_query([
        'order' => 'error',
        'msg' => implode(' ', $errors),
    ]);
    header('Location: ../index.php?' . $query . '#order');
    exit;
}

$record = [
    'id' => uniqid('ord_', true),
    'type' => 'retail',
    'product' => PRODUCT_NAME,
    'unit_price' => PRODUCT_PRICE,
    'quantity' => $qty,
    'total' => PRODUCT_PRICE * $qty,
    'name' => $name,
    'phone' => $phone,
    'email' => $email,
    'city' => $city,
    'address' => $address,
    'created_at' => date('c'),
];

if (!append_json_record(ORDERS_FILE, $record)) {
    $query = http_build_query([
        'order' => 'error',
        'msg' => 'Could not save your order. Please try again.',
    ]);
    header('Location: ../index.php?' . $query . '#order');
    exit;
}

$query = http_build_query([
    'order' => 'ok',
    'msg' => 'Order received. We will confirm on WhatsApp/phone shortly.',
]);
header('Location: ../index.php?' . $query . '#order');
exit;
