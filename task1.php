<?php
function validateForm($name, $email, $phone)
{
    // Валидация имени
    if (empty($name)) {
        return "Ошибка: Имя не может быть пустым.";
    }
    if (strlen($name) < 2 || strlen($name) > 50) {
        return "Ошибка: Имя должно быть от 2 до 50 символов.";
    }

    // Валидация email
    if (empty($email)) {
        return "Ошибка: Email не может быть пустым.";
    }
    if (strlen($email) < 5 || strlen($email) > 100) {
        return "Ошибка: Email должен быть от 5 до 100 символов.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Ошибка: Неверный формат email.";
    }

    // Валидация номера телефона
    if (empty($phone)) {
        return "Ошибка: Номер телефона не может быть пустым.";
    }
    if (strlen($phone) != 10) {
        return "Ошибка: Номер телефона должен содержать 10 символов.";
    }

    return "Валидация прошла успешно!";
}

$message = "";
if (isset($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $message = validateForm($name, $email, $phone);
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Валидация формы</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>

<body>
    <h3>Форма регистрации</h3>
    <?php
    // Вывод сообщения о валидации
    if ($message) {
        echo "<p>$message</p>";
    }
    ?>
    <form method="post" action="">
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name">
        <br>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <br>
        <br>

        <label for="phone">Номер телефона:</label>
        <input type="text" id="phone" name="phone">
        <br>
        <br>

        <input type="submit" value="Отправить">
    </form>
</body>

</html>