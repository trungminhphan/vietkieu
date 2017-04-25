<?php
function __autoload($class_name) {
   require_once('cls/class.' . strtolower($class_name) . '.php');
}
require_once('inc/functions.inc.php');
$session = new SessionManager();
$users = new Users();

if($users->isLoggedIn()){
    transfers_to('./index.php');   
} 
require('inc/config.inc.php');

if(isset($_POST['login'])){
    $username = $_POST['username'] ? $_POST['username'] : '';
    $password = $_POST['password'] ? $_POST['password'] : '';

    if ($users->authenticate($username, $password)) {
        transfers_to("./index.php");
    } else {
        $alert = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="author" content="Phan Minh Trung - Phone: 09859543437 - Email: trungminhphan@gmail.com">
    <link rel='shortcut icon' type='image/x-icon' href="favicon.ico" />
    <title>ĐĂNG NHẬP HỆ THỐNG</title>
    <link href="css/metro.css" rel="stylesheet">
    <link href="css/metro-icons.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="js/metro.js"></script>
    <script>
        $(function(){
            var form = $(".login-form");
            form.css({
                opacity: 1,
                "-webkit-transform": "scale(1)",
                "transform": "scale(1)",
                "-webkit-transition": ".5s",
                "transition": ".5s"
            });
            <?php if(isset($alert) && $alert == true) : ?>
                $.Notify({type: 'alert', caption: 'Thất bại', content: "Vui lòng điền đúng tài khoản và mật khẩu"});
            <?php endif; ?>
        });
    </script>

</head>
<body class="bg-grayLight">
<div class="container page-content" style="margin-top: 5rem; padding:3.125rem;">
    <div class="login-form">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="loginform">
            <h1 class="text-light">Đăng nhập</h1>
            <hr class="thin"/>
            <br />
            <div class="input-control text full-size" data-role="input">
                <!--<label for="user_login">Tài khoản:</label>-->
                <input type="text" name="username" id="username" required placeholder="Nhập tài khoản" />
                <button class="button helper-button clear"><span class="mif-cross"></span></button>
            </div>
            <br />
            <br />
            <div class="input-control password full-size" data-role="input">
                <!--<label for="user_password">Mật khẩu:</label>-->
                <input type="password" name="password" id="password" required placeholder="Nhập mật khẩu" />
                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
            </div>
            <br />
            <br />
            <div class="form-actions">
                <button type="submit" name="login" id="login" class="button primary"><span class="mif-checkmark"></span> Đăng nhập</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>