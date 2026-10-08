<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/includes/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php#wholesale');
    exit;
}

global $WHOLESALE_CITIES;

$name = trim((string) ($_POST['name'] ?? ''));
$business = trim((string) ($_POST['business'] ?? ''));
$phone = trim((string) ($_POST['phone'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$hub = trim((string) ($_POST['hub'] ?? ''));
$message = trim((string) ($_POST['message'] ?? ''));

$errors = [];

if ($name === '' || mb_strlen($name) < 2) {
    $errors[] = 'Please enter your name.';
}
if ($business === '') {
    $errors[] = 'Please enter your business or shop name.';
}
if ($phone === '' || !preg_match('/^[0-9+\-\s]{10,16}$/', $phone)) {
    $errors[] = 'Please enter a valid phone number.';
}
if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address.';
}
if (!array_key_exists($hub, $WHOLESALE_CITIES)) {
    $errors[] = 'Please select a wholesale hub.';
}
if ($message === '' || mb_strlen($message) < 10) {
    $errors[] = 'Please tell us a bit about your wholesale needs.';
}

if ($errors) {
    $query = http_build_query([
        'wholesale' => 'error',
        'msg' => implode(' ', $errors),
    ]);
    header('Location: ../index.php?' . $query . '#wholesale');
    exit;
}

$record = [
    'id' => uniqid('wh_', true),
    'type' => 'wholesale',
    'name' => $name,
    'business' => $business,
    'phone' => $phone,
    'email' => $email,
    'hub' => $hub,
    'message' => $message,
    'created_at' => date('c'),
];

if (!append_json_record(INQUIRIES_FILE, $record)) {
    $query = http_build_query([
        'wholesale' => 'error',
        'msg' => 'Could not save your inquiry. Please try again.',
    ]);
    header('Location: ../index.php?' . $query . '#wholesale');
    exit;
}

$query = http_build_query([
    'wholesale' => 'ok',
    'msg' => 'Wholesale inquiry sent. Our ' . $hub . ' team will contact you.',
]);
header('Location: ../index.php?' . $query . '#wholesale');
exit;
