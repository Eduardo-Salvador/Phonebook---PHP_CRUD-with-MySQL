<?php
session_start();
include 'mysql.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("UPDATE contacts SET name=?, email=?, phone=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $email, $phone, $id);
    if ($stmt->execute()) {
        header("Location: index.php");
        $stmt->close();
        exit;
    } else {
        echo "Error updating contact: " . $conn->error;
    }
}

if (!isset($_GET['id'])) {
    echo "No contact selected";
    exit;
}

$id = (int) $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM contacts WHERE id =?");
$stmt->bind_param("i",$id);
$stmt->execute();
$result = $stmt->get_result();

if (!$result || $result->num_rows === 0) {
    echo "Contact not found";
    exit;
}

$contact = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Contact</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<main class="container">
<section class="card form-card">
<h2>Edit Contact</h2>
<form class="contact-form" action="update.php" method="POST">
    <input type="hidden" name="id" value="<?= $contact['id'] ?>">

    <div class="form-row">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" value='<?= $contact['name'] ?>' required />
    </div>

    <div class="form-row">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" value='<?= $contact['email'] ?>' />
    </div>

    <div class="form-row">
        <label for="phone">Phone</label>
        <input id="phone" name="phone" type="tel" value='<?= $contact['phone'] ?>' required />
    </div>

    <div class="form-actions">
        <button type="submit" class="btn primary">Save Changes</button>
        <a href="index.php" class="btn">Cancel</a>
    </div>
</form>
</section>
</main>
</body>
</html>
