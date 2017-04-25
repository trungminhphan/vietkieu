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
<?php
if(!$users->is_admin() && !$users->is_manager()){
	echo '<h2>Bạn không có quyền...! <a href="index.php">Trở về</a></h2>';
	require_once('footer.php');
	exit();
}
$congdan = new CongDan();
$users_list = $users->get_list();
?>

<h1 class="align-center">&nbsp;Thống kê Nhập liệu</h1>
<?php if($users_list && $users_list->count() > 0) : ?>
<table class="table bodered striped">
<thead>
	<tr>
		<th>STT</th>
		<th>Username</th>
		<th>Fullname</th>
		<th>Thống kê Record nhập liệu</th>
	</tr>
</thead>
<tbody>
	<?php
	$i= 1; $total=0;
	foreach ($users_list as $u) {
		$count = $congdan->count_record_to_users($u['_id']);
		$total += $count;
		echo '<tr>';
		echo '<td>'.$i.'</td>';
		echo '<td>'.$u['username'].'</td>';
		echo '<td>'.$u['person'].'</td>';
		echo '<td class="align-right"><b>'.format_number($count).'</b></td>';
		echo '</tr>';
		$i++;
	}
	?>
<tr>
	<td colspan="3">TỔNG CỘNG</td>
	<td class="align-right"><b><?php echo format_number($total); ?></b></td>
</tr>
</tbody>
</table>
<?php endif; ?>
</body>
</html>