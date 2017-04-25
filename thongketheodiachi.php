<?php
require_once('header.php');
if(!$users->is_admin() && !$users->is_manager()){
	echo '<h2>Bạn không có quyền...! <a href="index.php">Trở về</a></h2>';
	require_once('footer.php');
	exit();
}
$diachi = new DiaChi();$congdan = new CongDan();
$quocgia_list = $diachi->get_all_list();
$id_quocgia = isset($_GET['id_quocgia']) ? $_GET['id_quocgia'] : '';
$loaithongke = isset($_GET['loaithongke']) ? $_GET['loaithongke'] : 'hokhauthuongtru';
if($id_quocgia){ $diachi->id = $id_quocgia; $dc = $diachi->get_one(); }
?>
<script type="text/javascript">
	$(document).ready(function(){
		$(".select2").select2();
		$(".link").click(function(){
			//window.location = $(this).attr("href");
			var url = $(this).attr("href");
 			window.open(url, '_blank');
		});
	});
</script>
<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Thống kê theo địa chỉ</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" id="thongkeform">
	<div class="input-control select">
		<select name="id_quocgia" id="id_quocgia" class="select2">
			<option value="">Chọn quốc gia thống kê</option>
			<?php
			if($quocgia_list){
				foreach ($quocgia_list as $qg) {
					echo '<option value="'.$qg['_id'].'"'.($qg['_id']==$id_quocgia ? ' selected' : '').'>'.$qg['tendiachi'].'</option>';
				}
			}
			?>
		</select>
	</div>
	<div class="input-control select">
		<select name="loaithongke" id="loaithongke" class="select2">
			<option value="hokhauthuongtru" <?php echo $loaithongke=='hokhauthuongtru' ? ' selected' : ''; ?>>Nơi đăng ký hộ khẩu thường trú</option>
			<option value="noicutruhiennay" <?php echo $loaithongke=='noicutruhiennay' ? ' selected' : ''; ?>>Nơi cư trú hiện nay</option>
			<option value="noisinh" <?php echo $loaithongke=='noisinh' ? ' selected' : ''; ?>>Nơi sinh</option>
		</select>
	</div>
	<button name="submit" id="submit" value="OK" class="button primary"><span class="mif-checkmark"></span> OK</button>
</form>
<?php if(isset($dc) && isset($dc['level2'])) : ?>
<div class="listview-outlook" data-role="listview">
	<div class="list-group">
        <span class="list-group-toggle bg-black fg-white">Địa chỉ
        	<!--<span class="place-right width-100 align-center">Định cư</a></span>-->
        	<span class="place-right width-100 align-center">Việt kiều</a></span>
        	<span class="place-right width-100 align-center">Tổng cộng</a></span>
        	<span class="place-right width-100 align-center">Diện khác</a></span>
        	<span class="place-right width-100 align-center">Kết hôn</a></span>
        	<span class="place-right width-100 align-center">Lao động</span>
        	<span class="place-right width-100 align-center">Học tập</a></span>
        </span>
    </div>
    <?php
    if(isset($dc['level2']) && $dc['level2']){
    	foreach ($dc['level2'] as $a2) {
    		$count_ht_2 = 0;$count_ld_2=0;$count_kh_2=0;$count_dc_2=0;$count_dic_2=0;$count_vk_2=0;
    		echo '<div class="list-group collapsed">';
    		echo '<span class="list-group-toggle">' . $a2['tendiachi'];
    			$arr_2 = array($id_quocgia, $a2['_id']);
    			$count_ht_2 = $congdan->count_to_diachi($arr_2, 'hoctap', $loaithongke);
    			$count_ld_2 = $congdan->count_to_diachi($arr_2, 'laodong', $loaithongke);
    			$count_kh_2 = $congdan->count_to_diachi($arr_2, 'kethon', $loaithongke);
    			$count_dc_2 = $congdan->count_to_diachi($arr_2, 'dicu', $loaithongke);
    			$count_vk_2 = $congdan->count_to_diachi_vietkieu($arr_2, $loaithongke);
    			$count_real_2 = $congdan->count_to_diachi_real($arr_2, $loaithongke);
	        	echo '<span class="place-right width-100 align-center"><a href="chitietthongketheodiachi.php?id1='.$id_quocgia.'&id2='.$a2['_id'].'&act=vietkieu&level=2&loaithongke='.$loaithongke.'" class="link">'.format_number($count_vk_2).'</a></span>';
	        	echo '<span class="place-right width-100 align-center"><a href="chitietthongketheodiachi.php?id1='.$id_quocgia.'&id2='.$a2['_id'].'&act=real&level=2&loaithongke='.$loaithongke.'" class="link">'.format_number($count_real_2).'</a></span>';
	        	echo '<span class="place-right width-100 align-center"><a href="chitietthongketheodiachi.php?id1='.$id_quocgia.'&id2='.$a2['_id'].'&act=dicu&level=2&loaithongke='.$loaithongke.'" class="link">'.format_number($count_dc_2).'</a></span>';
	        	echo '<span class="place-right width-100 align-center"><a href="chitietthongketheodiachi.php?id1='.$id_quocgia.'&id2='.$a2['_id'].'&act=kethon&level=2&loaithongke='.$loaithongke.'" class="link">'.format_number($count_kh_2).'</a></span>';
	        	echo '<span class="place-right width-100 align-center"><a href="chitietthongketheodiachi.php?id1='.$id_quocgia.'&id2='.$a2['_id'].'&act=laodong&level=2&loaithongke='.$loaithongke.'" class="link">'.format_number($count_ld_2).'</a></span>';
	        	echo '<span class="place-right width-100 align-center"><a href="chitietthongketheodiachi.php?id1='.$id_quocgia.'&id2='.$a2['_id'].'&act=hoctap&level=2&loaithongke='.$loaithongke.'" class="link">'.format_number($count_ht_2).'</a></span>';
	        echo '</span>';
	        if(isset($a2['level3']) && $a2['level3'] && ($count_ht_2>0 || $count_ld_2>0 || $count_kh_2>0 || $count_dc_2>0 || $count_vk_2 >0)){
	        	foreach ($a2['level3'] as $a3) {
	        		$count_ht_3 = 0;$count_ld_3=0;$count_kh_3=0;$count_dc_3=0;$count_dic_3=0;$count_real_3=0;
	        		$arr_3 = array($id_quocgia, $a2['_id'],$a3['_id']);
	    			if($count_ht_2 > 0) $count_ht_3 = $congdan->count_to_diachi($arr_3, 'hoctap', $loaithongke);
	    			if($count_ld_2 > 0) $count_ld_3 = $congdan->count_to_diachi($arr_3, 'laodong', $loaithongke);
	    			if($count_kh_2 > 0) $count_kh_3 = $congdan->count_to_diachi($arr_3, 'kethon', $loaithongke);
	    			if($count_dc_2 > 0) $count_dc_3 = $congdan->count_to_diachi($arr_3, 'dicu', $loaithongke);
	    			//if($count_dic_2 >0) $count_dic_3 = $congdan->count_to_diachi($arr_3, 'dinhcu', $loaithongke);
	    			if($count_vk_2>0) $count_vk_3 = $congdan->count_to_diachi_vietkieu($arr_3, $loaithongke);
	    			if($count_real_2 >0) $count_real_3 = $congdan->count_to_diachi_real($arr_3, $loaithongke);
	        		echo '<div class="list-group-content padding-left-15">';
	        		echo '<div class="list-content">';
	        		echo '<span class="list-group-toggle">' . $a3['tendiachi'];
			        	echo '<span class="place-right width-100 align-center"><a href="chitietthongketheodiachi.php?id1='.$id_quocgia.'&id2='.$a2['_id'].'&id3='.$a3['_id'].'&act=vietkieu&level=3&loaithongke='.$loaithongke.'" class="link">'.format_number($count_vk_3).'</a></span>';
			        	echo '<span class="place-right width-100 align-center"><a href="chitietthongketheodiachi.php?id1='.$id_quocgia.'&id2='.$a2['_id'].'&id3='.$a3['_id'].'&act=real&level=3&loaithongke='.$loaithongke.'" class="link">'.format_number($count_real_3).'</a></span>';
			        	echo '<span class="place-right width-100 align-center"><a href="chitietthongketheodiachi.php?id1='.$id_quocgia.'&id2='.$a2['_id'].'&id3='.$a3['_id'].'&act=dicu&level=3&loaithongke='.$loaithongke.'" class="link">'.format_number($count_dc_3).'</a></span>';
			        	echo '<span class="place-right width-100 align-center"><a href="chitietthongketheodiachi.php?id1='.$id_quocgia.'&id2='.$a2['_id'].'&id3='.$a3['_id'].'&act=kethon&level=3&loaithongke='.$loaithongke.'" class="link">'.format_number($count_kh_3).'</a></span>';
			        	echo '<span class="place-right width-100 align-center"><a href="chitietthongketheodiachi.php?id1='.$id_quocgia.'&id2='.$a2['_id'].'&id3='.$a3['_id'].'&act=laodong&level=3&loaithongke='.$loaithongke.'" class="link">'.format_number($count_ld_3).'</a></span>';
			        	echo '<span class="place-right width-100 align-center"><a href="chitietthongketheodiachi.php?id1='.$id_quocgia.'&id2='.$a2['_id'].'&id3='.$a3['_id'].'&act=hoctap&level=3&loaithongke='.$loaithongke.'" class="link">'.format_number($count_ht_3).'</a></span>';
			        echo '</span>';
			        if(isset($a3['level4']) && $a3['level4'] && ($count_ht_3>0||$count_ld_3>0||$count_kh_3>0||$count_dc_3>0||$count_vk_3>0)){
			        	foreach ($a3['level4'] as $a4) {
			        		$count_ht_4 = 0;$count_ld_4=0;$count_kh_4=0;$count_dc_4=0;$count_dic_4=0;$count_vk_4=0;
			        		$arr_4 = array($id_quocgia, $a2['_id'],$a3['_id'],$a4['_id']);
			    			if($count_ht_3 > 0) $count_ht_4 = $congdan->count_to_diachi($arr_4, 'hoctap', $loaithongke);
			    			if($count_ld_3 > 0) $count_ld_4 = $congdan->count_to_diachi($arr_4, 'laodong', $loaithongke);
			    			if($count_kh_3 > 0) $count_kh_4 = $congdan->count_to_diachi($arr_4, 'kethon', $loaithongke);
			    			if($count_dc_3 > 0) $count_dc_4 = $congdan->count_to_diachi($arr_4, 'dicu', $loaithongke);
			    			//if($count_dic_3 > 0) $count_dic_4 = $congdan->count_to_diachi($arr_4, 'dinhcu', $loaithongke);
			    			if($count_vk_3 > 0) $count_vk_4 = $congdan->count_to_diachi_vietkieu($arr_4, $loaithongke);
			    			if($count_real_3 > 0) $count_real_4 = $congdan->count_to_diachi_real($arr_4, $loaithongke);
			        		echo '<div class="list-group-content padding-left-15">';
			        		echo '<div class="list-content">';
			        		echo '<span class="list-group-toggle">' . $a4['tendiachi'];
					        	echo '<span class="place-right width-100 align-center"><a href="chitietthongketheodiachi.php?id1='.$id_quocgia.'&id2='.$a2['_id'].'&id3='.$a3['_id'].'&id4='.$a4['_id'].'&act=vietkieu&level=4&loaithongke='.$loaithongke.'" class="link">'.format_number($count_vk_4).'</a></span>';
					        	echo '<span class="place-right width-100 align-center"><a href="chitietthongketheodiachi.php?id1='.$id_quocgia.'&id2='.$a2['_id'].'&id3='.$a3['_id'].'&id4='.$a4['_id'].'&act=real&level=4&loaithongke='.$loaithongke.'" class="link">'.format_number($count_real_4).'</a></span>';
					        	echo '<span class="place-right width-100 align-center"><a href="chitietthongketheodiachi.php?id1='.$id_quocgia.'&id2='.$a2['_id'].'&id3='.$a3['_id'].'&id4='.$a4['_id'].'&act=dicu&level=4&loaithongke='.$loaithongke.'" class="link">'.format_number($count_dc_4).'</a></span>';
					        	echo '<span class="place-right width-100 align-center"><a href="chitietthongketheodiachi.php?id1='.$id_quocgia.'&id2='.$a2['_id'].'&id3='.$a3['_id'].'&id4='.$a4['_id'].'&act=kethon&level=4&loaithongke='.$loaithongke.'" class="link">'.format_number($count_kh_4).'</a></span>';
					        	echo '<span class="place-right width-100 align-center"><a href="chitietthongketheodiachi.php?id1='.$id_quocgia.'&id2='.$a2['_id'].'&id3='.$a3['_id'].'&id4='.$a4['_id'].'&act=laodong&level=4&loaithongke='.$loaithongke.'" class="link">'.format_number($count_ld_4).'</a></span>';
					        	echo '<span class="place-right width-100 align-center"><a href="chitietthongketheodiachi.php?id1='.$id_quocgia.'&id2='.$a2['_id'].'&id3='.$a3['_id'].'&id4='.$a4['_id'].'&act=hoctap&level=4&loaithongke='.$loaithongke.'" class="link">'.format_number($count_ht_4).'</a></span>';
					        echo '</span>';
					        if(isset($a4['level5']) && $a4['level5'] && ($count_ht_4>0||$count_ld_4>0||$count_kh_4>0||$count_dc_4>0||$count_vk_4>0)){
					        	foreach ($a4['level5'] as $a5) {
					        		$count_ht_5 = 0;$count_ld_5=0;$count_kh_5=0;$count_dc_5=0;$count_dic_5=0;$count_vk_5=0;
					        		$arr_5 = array($id_quocgia, $a2['_id'],$a3['_id'],$a4['_id'],$a5['_id']);
					    			if($count_ht_4 > 0) $count_ht_5 = $congdan->count_to_diachi($arr_5, 'hoctap', $loaithongke);
					    			if($count_ld_4 > 0) $count_ld_5 = $congdan->count_to_diachi($arr_5, 'laodong', $loaithongke);
					    			if($count_kh_4 > 0) $count_kh_5 = $congdan->count_to_diachi($arr_5, 'kethon', $loaithongke);
					    			if($count_dc_4 > 0) $count_dc_5 = $congdan->count_to_diachi($arr_5, 'dicu', $loaithongke);
					    			//if($count_dic_4 > 0) $count_dic_5 = $congdan->count_to_diachi($arr_5, 'dinhcu', $loaithongke);
					    			if($count_vk_4 > 0) $count_vk_5 = $congdan->count_to_diachi_vietkieu($arr_5, $loaithongke);
					    			if($count_real_4 > 0) $count_real_5 = $congdan->count_to_diachi_real($arr_5, $loaithongke);

					        		echo '<div class="list-group-content padding-left-15">';
					        		echo '<div class="list-content">';
					        		echo '<span class="list-group-toggle">' . $a5['tendiachi'];
							        	echo '<span class="place-right width-100 align-center"><a href="chitietthongketheodiachi.php?id1='.$id_quocgia.'&id2='.$a2['_id'].'&id3='.$a3['_id'].'&id4='.$a4['_id'].'&id5='.$a5['_id'].'&act=vietkieu&level=5&loaithongke='.$loaithongke.'" class="link">'.format_number($count_vk_5).'</a></span>';
							        	echo '<span class="place-right width-100 align-center"><a href="chitietthongketheodiachi.php?id1='.$id_quocgia.'&id2='.$a2['_id'].'&id3='.$a3['_id'].'&id4='.$a4['_id'].'&id5='.$a5['_id'].'&act=real&level=5&loaithongke='.$loaithongke.'" class="link">'.format_number($count_real_5).'</a></span>';
							        	echo '<span class="place-right width-100 align-center"><a href="chitietthongketheodiachi.php?id1='.$id_quocgia.'&id2='.$a2['_id'].'&id3='.$a3['_id'].'&id4='.$a4['_id'].'&id5='.$a5['_id'].'&act=dicu&level=5&loaithongke='.$loaithongke.'" class="link">'.format_number($count_dc_5).'</a></span>';
							        	echo '<span class="place-right width-100 align-center"><a href="chitietthongketheodiachi.php?id1='.$id_quocgia.'&id2='.$a2['_id'].'&id3='.$a3['_id'].'&id4='.$a4['_id'].'&id5='.$a5['_id'].'&act=kethon&level=5&loaithongke='.$loaithongke.'" class="link">'.format_number($count_kh_5).'</a></span>';
							        	echo '<span class="place-right width-100 align-center"><a href="chitietthongketheodiachi.php?id1='.$id_quocgia.'&id2='.$a2['_id'].'&id3='.$a3['_id'].'&id4='.$a4['_id'].'&id5='.$a5['_id'].'&act=laodong&level=5&loaithongke='.$loaithongke.'" class="link">'.format_number($count_ld_5).'</a></span>';
							        	echo '<span class="place-right width-100 align-center"><a href="chitietthongketheodiachi.php?id1='.$id_quocgia.'&id2='.$a2['_id'].'&id3='.$a3['_id'].'&id4='.$a4['_id'].'&id5='.$a5['_id'].'&act=hoctap&level=5&loaithongke='.$loaithongke.'" class="link">'.format_number($count_ht_5).'</a></span>';
							        echo '</span>';
							        echo '</div>';
			        				echo '</div>';
			        			}
					        }
					        echo '</div>';
			        		echo '</div>';
			        	}
			        }
			        echo '</div>';
			        echo '</div>';
	        	}
	        }
    		echo '</div>';
    	}
    }
    ?>
</div>
<?php endif; ?>

<?php require_once('footer.php'); ?>