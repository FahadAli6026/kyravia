<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/includes/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_to('shop');
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
    redirect_to('shop', [
        'order' => 'error',
        'msg' => implode(' ', $errors),
    ]);
}

$total = PRODUCT_PRICE * $qty;

$record = [
    'id' => uniqid('ord_', true),
    'type' => 'retail',
    'product' => PRODUCT_NAME,
    'unit_price' => PRODUCT_PRICE,
    'quantity' => $qty,
    'total' => $total,
    'name' => $name,
    'phone' => $phone,
    'email' => $email,
    'city' => $city,
    'address' => $address,
    'created_at' => date('c'),
];

append_json_record(ORDERS_FILE, $record);

$mailBody = implode("\n", [
    'New Kyravia online order',
    '------------------------',
    'Order ID: ' . $record['id'],
    'Product: ' . PRODUCT_NAME,
    'Quantity: ' . $qty,
    'Unit price: ' . format_price(PRODUCT_PRICE),
    'Total: ' . format_price($total),
    '',
    'Customer name: ' . $name,
    'Phone: ' . $phone,
    'Email: ' . ($email !== '' ? $email : '—'),
    'City: ' . $city,
    'Address: ' . $address,
    '',
    'Submitted at: ' . date('Y-m-d H:i:s'),
]);

$mailed = send_site_email(
    'New Kyravia order — ' . $name,
    $mailBody,
    $email !== '' ? $email : null
);

redirect_to('shop', [
    'order' => 'ok',
    'msg' => $mailed
        ? 'Order received. Confirmation email sent — we will contact you shortly.'
        : 'Order received. We will confirm on WhatsApp/phone shortly.',
]);
