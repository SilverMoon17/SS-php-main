<?php
    require_once 'absolute_path.php';
    session_start();
    $id = $_SESSION['user']['id'];
    require_once 'connect.php';
    $avatar = mysqli_query($mysql, "SELECT avatar FROM `users` WHERE `id` = '$id'");
    $avatar_path = mysqli_fetch_assoc($avatar)['avatar'];
    // "D:\OpenServer\domains\SS-php-main\uploads"
    unlink('D:\OpenServer\domains\SS-php-main\\' . '\\' . get_absolute_path($avatar_path));
    $path = 'uploads/' . time() . rand(1, 99) . $_FILES['avatar']['name'];
    move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path);
    $mysql -> query("UPDATE `users` SET avatar = '$path' WHERE id = '$id'");
    $result = mysqli_query($mysql, "SELECT * FROM `users` WHERE `id` = '$id'");
    $user = mysqli_fetch_assoc($result);
    $_SESSION['user'] = [
        "id" => $user['id'],
        "login" => $user['login'],
        "name" => $user['name'],
        "avatar" => $user['avatar'],
        "email" => $user['email']
    ];
    header ("Location: ../cabinet.php");
    $mysql -> close();
?>