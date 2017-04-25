<?php
require_once('header.php'); 
$arr_query = array('_id', 'code', 'cmnd', 'passport', 'hoten', 'ngaysinh');
$arr_export = array(
	'quoctich' => 'Quốc tịch', 'noisinh' => 'Nơi sinh',
	'hokhauthuongtru' => 'Hộ khẩu thường trú', 'noicutruhiennay' => 'Nơi cư trú hiện nay',
	'id_nganhnghe' => 'Ngành nghề', 'diachilamviec' => 'Địa chỉ làm việc',
	'quatrinhdaotao' => 'Quá trình đào tạo', 'id_tongiao'=> 'Tôn giáo',
	'id_trinhdo' => 'Trình độ', 'dienthoaiban' => 'Điện thoại bàn','didong' => 'Di động',
	'email' => 'Email',	'fax' => 'Fax',	'thongtinnguoilienhe' => 'Thông tin liên hệ'
);
?>
<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Xuất dữ liệu ra Excel</h1>
<h3 style="text-align:center;">Chọn cột dữ liệu xuất ra Excel</h3>
<form action="export_congdan.php" method="POST" id="export">
<div class="grid">
			<?php
			$i = 0;
			echo '<div class="row cells12">';
			foreach ($arr_export as $key => $value) {
				if($i%12==0){
					echo '</div>';
					echo '<div class="row cells12">';
					$i=0;
				}
				echo '<div class="cell colspan3 input-control checkbox">';
				echo '<label class="input-control checkbox">
					    <input type="checkbox" name="'.$key.'" value="1" '.((isset($$key) && $$key) ? ' checked' : '').'>
					    <span class="check"></span>
					    <span class="caption">'.$value.'&nbsp;&nbsp;&nbsp;</span>
					</label>';
				echo '</div>';
				$i += 3;
			}
			echo '</div>'
			?>
	<div class="row cells12">
		<div class="cell colspan12 align-right">
			<button name="submit" id="submit" value="Ok" class="button primary"><span class="mif-checkmark"></span> Export</button>
		</div>
	</div>
</div>
</form>
<hr />
<?php require_once('footer.php'); ?>