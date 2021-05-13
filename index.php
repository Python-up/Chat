<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>DURKA</title>
</head>
<body>
    <div class="block_login">
    <header id="header">D U R K A </header>
    <ul id="messages">
        <p>Привет, как у тебя дела что ты делаешь?</p>
        <p>Пока</p>
    </ul>
    <form id="form" action="index.php" method="post">
        <input id="input" autocomplete="off" /><button id="button" type="submit">Send</button>
    </form>
    <script src="js/vk-bridge.js"></script>
    <script>vkBridge.send('VKWebAppInit')</script>
</body>
</html>

<?php
// подключаемся к базе данных

$connect = mysqli_connect('localhost', 'root', 'root', 'messages_chat_durka_bd');

?>