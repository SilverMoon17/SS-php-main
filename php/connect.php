<?php 
    $mysql = new mysqli('ss-php-main', 'root', '', 'register-db'); 
    if (mysqli_connect_errno()) {
        printf("Не удалось подключиться к базе данных: %s\n", mysqli_connect_error());
        exit();
    }
?>