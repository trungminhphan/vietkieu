<?php
    function __autoload($class_name) {
        require_once('cls/class.' . strtolower($class_name) . '.php');
    }
    $session = new SessionManager();
    $users = new Users();
    require_once('inc/functions.inc.php');
    require_once('inc/config.inc.php');
    if(!$users->isLoggedIn()){ transfers_to('./login.php'); }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="author" content="Trung tâm Tin học Đại học An Giang  - Phone: 0766.253.599 - Email: cict@agu.edu.vn - Website: http://cict.agu.edu.vn">
    <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
    <title>Quản lý Cơ sở dữ liệu - Sở Ngoại vụ</title>
    <link href="css/metro.css" rel="stylesheet">
    <link href="css/metro-icons.css" rel="stylesheet">  
    <link href="css/styles.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="js/metro.js"></script>
    <!--<script src="js/prettify/run_prettify.js"></script>-->
    <script src="js/docs.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/ jquery.hotkey.js"></script>
</head>
<body>
<!-- ----------------------- menu -------------------->
<div class="app-bar fixed-top" data-role="appbar">
        <a href="index.php" class="app-bar-element branding"><span class="mif-home mif-2x"></span></a>
        <ul class="app-bar-menu">
            <?php if($users->is_admin()) : ?>
            <li><a href="" class="dropdown-toggle"><span class="mif-apps mif-2x"></span>&nbsp;&nbsp;Danh mục</a>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="diachi.php"><span class="mif-earth"></span>&nbsp;&nbsp;Địa chỉ</a></li>
                    <li class="divider"></li>
                    <li><a href="hinhthuchoctap.php"><span class="mif-books"></span>&nbsp;&nbsp;Hình thức du học</a></li>
                    <li class="divider"></li>
                    <li><a href="coquancongtac.php"><span class="mif-suitcase"></span>&nbsp;&nbsp;Cơ quan công tác</a></li>
                    <li class="divider"></li>
                    <li><a href="quocgia.php"><span class="mif-user-check"></span>&nbsp;&nbsp;Quốc gia/Quốc tịch</a></li>
                    <li class="divider"></li>
                    <li><a href="tongiao.php"><span class="mif-eye"></span>&nbsp;&nbsp;Tôn giáo</a></li>
                    <li class="divider"></li>
                    <li><a href="trinhdo.php"><span class="mif-school"></span>&nbsp;&nbsp;Trình độ</a></li>
                    <li class="divider"></li>
                    <li><a href="nganhnghe.php"><span class="mif-profile"></span>&nbsp;&nbsp;Ngành nghề</a></li>
                    <li class="divider"></li>
                    <li><a href="nganhhoc.php"><span class="mif-suitcase"></span>&nbsp;&nbsp;Ngành học</a></li>
                    <li class="divider"></li>
                    <li><a href="diendidinhcu.php"><span class="mif-vpn-lock"></span>&nbsp;&nbsp;Diện di/định cư</a></li>
                    <li class="divider"></li>
                    <li><a href="tinhtranglaodong.php"><span class="mif-power"></span>&nbsp;&nbsp;Tình trạng lao động</a></li>
                    <li class="divider"></li>
                    <li><a href="doanhnghiep.php"><span class="mif-cabinet"></span>&nbsp;&nbsp;Doanh nghiệp</a></li>
                </ul>
            </li>
            <?php endif; ?>
            <li><a href="nhaplieu.php"><span class="mif-insert-template mif-2x"></span>&nbsp;&nbsp;Nhập liệu</a></li>
            <li><a href="#" class="dropdown-toggle"><span class="mif-chart-line mif-2x"></span>&nbsp;&nbsp;Thống kê - Tra cứu</a>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="timcongdan.php"><span class="mif-search"></span> Tìm công dân</a></li>
                    <li class="divider"></li>
                    <li><a href="timkiemnangcao.php"><span class="mif-zoom-in"></span> Tìm kiếm nâng cao</a></li>
                    <li class="divider"></li>
                    <?php if($users->is_admin() || $users->is_manager()): ?>
                    <li><a href="thongketheodiachi.php"><span class="mif-earth"></span> Thống kê theo Địa chỉ</a></li>
                    <li class="divider"></li>
                    <li><a href="thongkehoctap.php"><span class="mif-school"></span> Thống kê Học tập</a></li>
                    <li class="divider"></li>
                    <li><a href="thongkelaodong.php"><span class="mif-wrench"></span> Thống kê Lao động</a></li>
                    <li class="divider"></li>
                    <li><a href="thongkekethon.php"><span class="mif-users"></span> Thống kê Kết hôn</a></li>
                    <li class="divider"></li>
                    <li><a href="thongkedicu.php"><span class="mif-enlarge"></span> Thống kê Di cư</a></li>
                    <li class="divider"></li>
                    <li><a href="thongkevietkieu.php"><span class="mif-shrink"></span> Thống kê Việt kiều</a></li>
                    <li class="divider"></li>
                    <!--<li><a href="thongketrithuc.php"><span class="mif-books"></span> Thống kê Trí thức</a></li>
                    <li class="divider"></li>-->
                    <li><a href="thongkephanloai.php"><span class="mif-widgets"></span> Thống kê Phân loại</a></li>
                    <li class="divider"></li>
                    <li><a href="thongketheothongtincanhan.php"><span class="mif-user-check"></span> Thống kê Thông tin cá nhân</a></li>
                <?php endif; ?>
                </ul>
            </li>
            <li class="dropdown-toggle"><a href="#"><span class="mif-file-excel mif-2x"></span>&nbsp;&nbsp;Import/Export</a>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="import.php"><span class="mif-folder-upload"></span> Import</a></li>
                    <li class="divider"></li>
                    <li><a href="export.php"><span class="mif-folder-download"></span> Export</a></li>
                </ul>
            </li>
            <li><a href="#" class="dropdown-toggle"><span class="mif-users mif-2x"></span>&nbsp;&nbsp;Tài khoản</a>
                <ul class="d-menu" data-role="dropdown">
                    <?php if($users->is_admin()): ?>
                        <li><a href="users.php"><span class="mif-user"></span>&nbsp;&nbsp;Quản lý tài khoản</a></li>
                        <li class="divider"></li>
                        <li><a href="thongkenhaplieu.php"><span class="mif-user-check"></span>&nbsp;&nbsp;Thống kê nhập liệu</a></li>
                        <li class="divider"></li>
                    <?php endif; ?>
                    <li><a href="logout.php"><span class="mif-exit"></span>&nbsp;&nbsp;Đăng xuất</a></li>
                    <li class="divider"></li>
                </ul>
            </li>
        </ul>
        <span class="app-bar-pull"></span>
    </div>
</div>
<!-- ---------------- end menu --------------- -->
<div class="container page-content" style="margin-top: 80px;">