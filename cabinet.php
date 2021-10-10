<?php 
    session_start();
    $username = $_COOKIE['username'];
    if(mb_strlen($username) == 0) {
        unset($_SESSION['user']);
        header ("Location: /");
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <title>Личный кабинет</title>
</head>
<body>
    <?php require 'template/header.php';?>
    <main style="margin-bottom: 626px;">
        <div class="container">
           <div class="row">
                <form class="mt-5 d-flex">
                    <?php 
                    if ($_SESSION['user']['avatar'] != '') {
                        echo '<a data-fancybox="avatar" class="avatar-image-link" href="' . $_SESSION['user']['avatar'] . '"><img src="' . $_SESSION['user']['avatar'] . '" class="avatar-image-cabinet" width="250px" height="250px"></a>';
                    }
                    ?>
                    <div class="information">
                        <label class="user-label">Логин <h3 class="user-info user-login d-block"><?= $_SESSION['user']['login'] ?></h3></label>
                        <label class="user-label">Имя пользователя <h3 class="user-info user-name"><?= $_SESSION['user']['name'] ?></h3></label>
                        <label class="user-label">Электронная почта <h3 class="user-info user-mail"><?= $_SESSION['user']['email'] ?></h3></label>
                        <label class="user-label">ID <h3 class="user-info user-id"><?= $_SESSION['user']['id'] ?></h3></label>
                    </div>
                </form>
           </div> 
        </div>
        <div class="container">
            <div class="row">
                <form method="post" action="php/avatar_change.php" enctype="multipart/form-data" class="avatar-form">
                    <!-- <label class="avatar-label" for="change-avatar">Сменить аватар</label> -->
                    <?php 
                    if ($_SESSION['user']['avatar'] != '') {
                        echo '<label class="avatar-label" for="change-avatar">Сменить аватар</label>';
                    } else {    
                       echo '<label class="avatar-label" for="change-avatar" style="margin-left: 47px !important; padding: 10px 54px;">Добавить аватар</label>';
                    }
                    ?>
                    <input type="file" name="avatar" id="change-avatar" />    
                </form>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </main>
    <?php require 'template/footer.php' ?>
    <script type="text/javascript">
            //     document.getElementById("change-avatar").addEventListener('change', () => {
            //     if (this.value) {
            //         console.log("Файл выбран");
            //         console.log(this.value)
            //     }
            // })
            document.getElementById('change-avatar').addEventListener('change', function(){
                if( this.value ){
                    console.log( "Оппа, выбрали файл!" );
                    console.log( this.value );
                    document.querySelector(".avatar-form").submit();
                } else { // Если после выбранного тыкнули еще раз, но дальше cancel
                    console.log( "Файл не выбран" ); 
                }
            });
    </script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
</body>
</html>