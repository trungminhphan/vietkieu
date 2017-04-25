<?php
require_once('header.php');
$id = isset($_GET['id']) ? $_GET['id'] : '';
$congdan = new CongDan(); $diachi = new DiaChi();
$nganhhoc = new NganhHoc();$quocgia = new QuocGia();$trinhdo = new TrinhDo();
$coquancongtac = new CoQuanCongTac();$nganhnghe = new NganhNghe();$doanhnghiep = new DoanhNghiep();
$tinhtranglaodong = new TinhTrangLaoDong();$diendidinhcu = new DienDiDinhCu(); $hinhthuchoctap = new HinhThucHocTap();
$nganhhoc_list = $nganhhoc->get_all_list();
$quocgia_list = $quocgia->get_all_list();
$trinhdo_list = $trinhdo->get_all_list();
$coquancongtac_list = $coquancongtac->get_all_list();
$nganhnghe_list = $nganhnghe->get_all_list();
$tinhtranglaodong_list = $tinhtranglaodong->get_all_list();
$diendidinhcu_list = $diendidinhcu->get_all_list();
$hinhthuchoctap_list = $hinhthuchoctap->get_all_list();
$congdan->id = $id;
$cd = $congdan->get_one();
$arr_donvitien = array('AUD'=>'AUST.DOLLAR','CAD'=>'CANADIAN DOLLAR','CHF'=>'SWISS FRANCE','DKK'=>'DANISH KRONE','EUR'=>'EURO','GBP'=>'BRITISH POUND','HKD'=>'HONGKONG DOLLAR','INR'=>'INDIAN RUPEE','JPY'=>'JAPANESE YEN','KRW'=>'SOUTH KOREAN WON','KWD'=>'KUWAITI DINAR','MYR'=>'MALAYSIAN RINGGIT','NOK'=>'NORWEGIAN KRONER','RUB'=>'RUSSIAN RUBLE','SAR'=>'SAUDI RIAL','SEK'=>'SWEDISH KRONA','SGD'=>'SINGAPORE DOLLAR','THB'=>'THAI BAHT','USD'=>'US DOLLAR');
?>
<script type="text/javascript" src="js/congdan.js"></script>
<script type="text/javascript" src="js/jquery.inputmask.js"></script>
<script type="text/javascript" src="js/jquery.number.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#tab-control").tabControl(); 
    congdan(); hoctap(); laodong(); kethon(); dicu(); dinhcu();
    trithuc();doanhnhan();giadinh();
    $(".ngaythangnam").inputmask();
});
</script>
<div class="grid padding-bottom-10">
    <div class="row cells12">
        <div class="cell colspan8 padding0">           
            <h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Chi tiết công dân</h1>
        </div>
        <div class="cell colspan4 align-right">
            <a href="xoacongdan.php?id=<?php echo $id; ?>" class="button primary text-shadow fg-white" id="del_congdan"><span class="mif-bin"></span> Xoá</a>
            <a href="suacongdan.php?id=<?php echo $id; ?>" class="button success text-shadow fg-white"id="edit_congdan"><span class="mif-pencil"></span> Sửa</a>
            <!--<a href="#" class="button warning text-shadow fg-white" onclick="return false;" id="add_"><span class="mif-plus"></span> Kết hôn</a>
            <a href="#" class="button danger text-shadow fg-white" onclick="return false;" id="add_laodong"><span class="mif-plus"></span> Di cư</a>
            <a href="#" class="button info text-shadow fg-white" onclick="return false;" id="add_laodong"><span class="mif-plus"></span> Định cư</a>-->
        </div>
    </div>
</div>
<h2 class="fg-red" style="text-transform: uppercase;"><?php echo $cd['hoten']; ?></h2>
<table class="table bordered border striped">
<tbody>
    <tr>
        <td>ID</td>
        <td><?php echo $cd['code']; ?></td>
    </tr>
    <tr>
        <td>CMND/Passport</td>
        <td><?php echo $cd['cmnd'] . '/'. $cd['passport']; ?></td>
    </tr>
    <tr>
        <td>Ngày sinh</td>
        <td><?php echo $cd['ngaysinh'] ? date("d/m/Y",$cd['ngaysinh']->sec) : ''; ?></td>
    </tr>
    <tr>
        <td>Giới tính</td>
        <td><?php echo $cd['gioitinh']; ?></td>
    </tr>
    <tr>
        <td>Quốc tịch</td>
        <td>
        <?php 
            if(isset($cd['quoctich']) && $cd['quoctich']){
                echo $quocgia->get_quoctich($cd['quoctich']);
            } else {
                echo '';
            }
            //echo $cd['quoctich']; 
        ?>
        </td>
    </tr>
    <tr>
        <td>Nơi sinh</td>
        <td>
            <?php
                $noisinh = $diachi->tendiachi($cd['noisinh']);
                echo $noisinh;
            ?>
        </td>
    </tr>
    <tr>
        <td>Nơi đăng ký Hộ khẩu thường trú</td>
        <td>
            <?php
            if(isset($cd['hokhauthuongtru'])){
                $hokhauthuongtru = $diachi->tendiachi($cd['hokhauthuongtru']);
                echo $hokhauthuongtru;
            }
            ?>
        </td>
    </tr>
    <tr>
        <td>Nơi cư trú hiện nay</td>
        <td>
            <?php
            $noicutruhiennay = $diachi->tendiachi($cd['noicutruhiennay']);
            echo $noicutruhiennay;
            ?>
        </td>
    </tr>
    <tr>
        <td>Nghề nghiệp</td>
        <td>
            <?php
            if($cd['id_nganhnghe']){
                $nganhnghe = new NganhNghe();$nganhnghe->id = $cd['id_nganhnghe'];
                $nn = $nganhnghe->get_one();
                echo $nn['ten'] ? $nn['ten'] : '';
            }
            ?>
        </td>
    </tr>
    <tr>
        <td>Địa chỉ nơi làm việc</td>
        <td>
            <?php
            $diachilamviec = $diachi->tendiachi($cd['diachilamviec']);
            echo $diachilamviec;
            ?>
        </td>
    </tr>
    <tr>
        <td>Quá trình đào tạo</td>
        <td> <?php echo $cd['quatrinhdaotao']; ?></td>
    </tr>
    <tr>
        <td>Tôn giáo</td>
        <td>
            <?php
            if($cd['id_tongiao']){
                $tongiao = new TonGiao();$tongiao->id = $cd['id_tongiao'];
                $tg = $tongiao->get_one();
                echo $tg['ten'] ? $tg['ten'] : '';
            }
            ?>
        </td>
    </tr>
    <tr>
        <td>Trình độ học vấn</td>
        <td>
            <?php
            if($cd['id_trinhdo']){
                $trinhdo = new TrinhDo();$trinhdo->id = $cd['id_trinhdo'];
                $td = $trinhdo->get_one();
                echo $td['ten'] ? $td['ten'] : '';
            }
            ?>
        </td>
    </tr>
    <tr>
        <td>Điện thoại/Mobile/Fax</td>
        <td><?php echo $cd['dienthoaiban'] . ' - ' . $cd['didong'] . ' - ' . $cd['fax']; ?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><?php echo $cd['email']; ?></td>
    </tr>
    <tr>
        <td>Thông tin có thể liên hệ với đối tượng</td>
        <td><?php echo $cd['thongtinnguoilienhe']; ?></td>
    </tr>
</tbody>
</table>
<!--
<div class="grid padding-bottom-10">
    <div class="row cells12">
        <div class="cell colspan12 align-right">
            <<a href="#" class="button primary text-shadow fg-white" onclick="return false;" id="add_hoctap"><span class="mif-plus"></span> Học tập</a>
            <a href="#" class="button success text-shadow fg-white" onclick="return false;" id="add_laodong"><span class="mif-plus"></span> Lao động</a>
            <a href="#" class="button warning text-shadow fg-white" onclick="return false;" id="add_kethon"><span class="mif-plus"></span> Kết hôn</a>
            <a href="#" class="button danger text-shadow fg-white" onclick="return false;" id="add_dicu"><span class="mif-plus"></span> Di cư</a>
            <a href="#" class="button info text-shadow fg-white" onclick="return false;" id="add_dinhcu"><span class="mif-plus"></span> Định cư</a>
            <a href="#" class="button primary text-shadow fg-white" onclick="return false;" id="add_trithuc"><span class="mif-plus"></span> Trí thức</a>
            <a href="#" class="button success text-shadow fg-white" onclick="return false;" id="add_doanhnhan"><span class="mif-plus"></span> Doanh nghiệp</a>
            <a href="#" class="button warning text-shadow fg-white" onclick="return false;" id="add_giadinh"><span class="mif-plus"></span> Gia đình</a>
        </div>
    </div>
</div>
-->
<div class="tabcontrol" data-role="tabControl" id="tab-control" data-save-state="true">
    <ul class="tabs">
        <li>
            <a href="#hoctap" id="tab_hoctap" onclick="return false;">Học tập <span class="mif-plus" id="add_hoctap"></span></a>
        </li>
        <li><a href="#laodong" id="tab_laodong" onclick="return false;">Lao động <span class="mif-plus" id="add_laodong"></span></a></li>
        <li><a href="#kethon" id="tab_kethon" onclick="return false;">Kết hôn <span class="mif-plus" id="add_kethon"></span></a></li>
        <li><a href="#dicu" id="tab_dicu" onclick="return false;">Di cư <span class="mif-plus" id="add_dicu"></span></a></li>
        <li><a href="#dinhcu" id="tab_dinhcu" onclick="return false;">Định cư <span class="mif-plus" id="add_dinhcu"></span></a></li>
        <li><a href="#trithuc" id="tab_trithuc" onclick="return false;">Trí thức <span class="mif-plus" id="add_trithuc"></span></a></li>
        <li><a href="#doanhnhan" id="tab_doanhnhan" onclick="return false;">Doanh nghiệp <span class="mif-plus" id="add_doanhnhan"></span></a></li>
        <li><a href="#giadinh" id="tab_giadinh" onclick="return false;">Quan hệ gia đình <span class="mif-plus" style="padding-bottom:2px;padding-left:5px;" id="add_giadinh"></span></a></li>
    </ul>
    <div class="frames">
        <div class="frame bg-grayLighter" id="hoctap">
            <table class="table bordered border striped" id="hoctap_list">
                <thead>
                    <tr>
                        <th>Quốc gia du học</th>
                        <th>Thời gian bắt đầu</th>
                        <th>Thời gian kết thúc</th>
                        <th>Chuyên ngành</th>
                        <th>Hình thức học tập</th>
                        <th>Bằng cấp khi tốt nghiệp</th>
                        <th>Đơn vị công tác</th>
                        <th><span class="mif-bin"></span></th>
                        <th><span class="mif-pencil"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($cd['hoctap']) && $cd['hoctap']){
                        foreach ($cd['hoctap'] as $ht) {
                            if($ht['id_quocgia']) { $quocgia->id = $ht['id_quocgia'];$qg=$quocgia->get_one(); }
                            if($ht['id_nganhhoc']) { $nganhhoc->id = $ht['id_nganhhoc']; $nh = $nganhhoc->get_one(); }
                            if(isset($ht['id_hinhthuchoctap']) && $ht['id_hinhthuchoctap'])  { $hinhthuchoctap->id = $ht['id_hinhthuchoctap']; $htht = $hinhthuchoctap->get_one(); }
                            if(isset($ht['id_trinhdo']) && $ht['id_trinhdo']) { $trinhdo->id = $ht['id_trinhdo']; $td = $trinhdo->get_one(); }
                            if(isset($ht['id_coquancongtac']) && $ht['id_coquancongtac']) { $coquancongtac->id = $ht['id_coquancongtac']; $cq = $coquancongtac->get_one(); }
                            if(isset($ht['id_hoctap']) && $ht['id_hoctap']) $id_hoctap = $ht['id_hoctap']; else $id_hoctap = '';
                            echo '<tr class="items '.(isset($ht['id_hoctap']) ? $ht['id_hoctap'] : '').'">';
                            echo '<td>'. (isset($qg['ten']) ? $qg['ten']: '').'</td>';
                            echo '<td>'. ((isset($ht['thoigianbatdau']) && $ht['thoigianbatdau']) ? date("d/m/Y",$ht['thoigianbatdau']->sec) : '') .'</td>';
                            echo '<td>'. ((isset($ht['thoigianketthuc']) && $ht['thoigianketthuc']) ? date("d/m/Y",$ht['thoigianketthuc']->sec) : '').'</td>';
                            echo '<td>'. (isset($nh['ten']) ? $nh['ten']: '').'</td>';
                            echo '<td>'. (isset($htht['ten']) ? $htht['ten']: '').'</td>';
                            echo '<td>'. (isset($td['ten']) ? $td['ten']: '').'</td>';
                            echo '<td>'. (isset($cq['ten']) ? $cq['ten']: '').'</td>';
                            echo '<td><a href="get.xoahoctap.php?id_congdan='.$cd['_id'] .'&id_hoctap='.$id_hoctap.'" class="xoahoctap" onclick="return false;"><span class="mif-bin"></span></a></td>';
                            echo '<td><a href="get.suahoctap.php?id_congdan='.$cd['_id'] .'&id_hoctap='.$id_hoctap.'" class="suahoctap" onclick="return false;"><span class="mif-pencil"></span></a></td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="frame bg-grayLighter" id="laodong">
            <table class="table bordered border striped" id="laodong_list">
                <thead>
                    <tr>
                        <th>Quốc gia</th>
                        <th>Thời gian bắt đầu</th>
                        <th>Thời gian kết thúc</th>
                        <th>Nghề nghiệp</th>
                        <th>Tình trạng lao động hiện nay</th>
                        <th>Cơ quan lao động</th>
                        <th>Địa chỉ</th>
                        <th><span class="mif-bin"></span></th>
                        <th><span class="mif-pencil"></span></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    if(isset($cd['laodong']) && $cd['laodong']){
                        foreach ($cd['laodong'] as $ld) {
                            if($ld['id_quocgia']) { $quocgia->id = $ld['id_quocgia'];$qg=$quocgia->get_one(); }
                            if($ld['id_nganhnghe']) {$nganhnghe->id = $ld['id_nganhnghe']; $nn = $nganhnghe->get_one(); }
                            if($ld['id_tinhtranglaodong']) { $tinhtranglaodong->id = $ld['id_tinhtranglaodong']; $ttld = $tinhtranglaodong->get_one(); }
                            echo '<tr class="items '.$ld['id_laodong'].'">';
                                echo '<td>'. (isset($qg['ten']) ? $qg['ten']: '').'</td>';
                                echo '<td>'. ($ld['thoigianbatdau'] ? date("d/m/Y",$ld['thoigianbatdau']->sec) : '') .'</td>';
                                echo '<td>'. ($ld['thoigianketthuc'] ? date("d/m/Y",$ld['thoigianketthuc']->sec) : '').'</td>';
                                echo '<td>'.(isset($nn['ten']) ? $nn['ten'] : '').'</td>';
                                echo '<td>'.(isset($ttld['ten']) ? $ttld['ten'] : '').'</td>';
                                echo '<td>'.$ld['coquanlaodong'].'</td>';
                                echo '<td>'.$ld['diachicoquanlaodong'].'</td>';
                                echo '<td><a href="get.xoalaodong.php?id_congdan='.$cd['_id'] .'&id_laodong='.$ld['id_laodong'].'" class="xoalaodong" onclick="return false;"><span class="mif-bin"></span></a></td>';
                                echo '<td><a href="get.sualaodong.php?id_congdan='.$cd['_id'] .'&id_laodong='.$ld['id_laodong'].'" class="sualaodong" onclick="return false;"><span class="mif-pencil"></span></a></td>';
                            echo '</tr>';
                        }
                    } 
                ?>
                </tbody>
            </table>
        </div>
        <div class="frame bg-grayLighter" id="kethon">
            <table class="table bordered border striped" id="kethon_list">
                <thead>
                <tr>
                    <th width="200">Họ tên Vợ/Chồng</th>
                    <th>Giới tính</th>
                    <th>Ngày sinh</th>
                    <th>Quốc tịch</th>
                    <th>Nơi cư trú hiện nay</th>
                    <th>Ngày kết hôn</th>
                    <th><span class="mif-bin"></span></th>
                    <th><span class="mif-pencil"></span></th>
                </tr>
                </thead>
                <tbody>
                <?php
                if(isset($cd['kethon']) && $cd['kethon']){
                    foreach ($cd['kethon'] as $key => $kh) {
                        if($kh['id_congdannuocngoai']) { $congdan->id = $kh['id_congdannuocngoai']; $cdnn = $congdan->get_one(); }
                        if($cdnn['noicutruhiennay']) { $noicutruhiennay = $diachi->tendiachi($cdnn['noicutruhiennay']); }
                        echo '<tr class="items '.$kh['id_kethon'].'">';
                        echo '<td><a href="congdan.php?id='.$cdnn['_id'].'">'.$cdnn['hoten'].'</a></td>';
                        echo '<td>'.$cdnn['gioitinh'].'</td>';
                        echo '<td>'.($cdnn['ngaysinh'] ? date("d/m/Y",$cdnn['ngaysinh']->sec) : '').'</td>';
                        echo '<td>'.($cdnn['quoctich'] ? $quocgia->get_quoctich($cdnn['quoctich']) :'').'</td>';
                        echo '<td>'.$noicutruhiennay.'</td>';
                        echo '<td>'.($kh['ngaykethon'] ? date("d/m/Y", $kh['ngaykethon']->sec) : '').'</td>';
                        echo '<td><a href="get.xoakethon.php?id_congdan='.$cd['_id'] .'&id_kethon='.$kh['id_kethon'].'&id_congdannuocngoai='.$cdnn['_id'].'" class="xoakethon" onclick="return false;"><span class="mif-bin"></span></a></td>';
                        echo '<td><a href="get.suakethon.php?id_congdan='.$cd['_id'] .'&id_kethon='.$kh['id_kethon'].'" class="suakethon" onclick="return false;"><span class="mif-pencil"></span></a></td>';
                        echo '</tr>';
                    }
                }                
                ?>
                </tbody>
            </table>
        </div>
        <div class="frame bg-grayLighter" id="dicu">
            <table class="table bordered border striped" id="dicu_list">
                <thead>
                <tr>
                    <th>Quốc gia</th>
                    <th>Ngày di cư</th>
                    <th>Diện di cư</th>
                    <th><span class="mif-bin"></span></th>
                    <th><span class="mif-pencil"></span></th>
                </tr>
                </thead>
                <tbody>
                <?php 
                if(isset($cd['dicu']) && $cd['dicu']){
                    foreach ($cd['dicu'] as $dc) {
                        if($dc['id_quocgia']) { $quocgia->id=$dc['id_quocgia']; $qg = $quocgia->get_one(); }
                        if($dc['id_diendicu']) { $diendidinhcu->id = $dc['id_diendicu']; $ddc = $diendidinhcu->get_one(); }
                        echo '<tr class="items '.$dc['id_dicu'].'">';
                        echo '<td>'.(isset($qg['ten']) ? $qg['ten'] : '').'</td>';
                        echo '<td>'.($dc['ngaydicu'] ? date("d/m/Y",$dc['ngaydicu']->sec) : '').'</td>';
                        echo '<td>'.(isset($ddc['ten']) ? $ddc['ten'] : '').'</td>';
                        echo '<td><a href="get.xoadicu.php?id_congdan='.$cd['_id'] .'&id_dicu='.$dc['id_dicu'].'" class="xoadicu" onclick="return false;"><span class="mif-bin"></span></a></td>';
                        echo '<td><a href="get.suadicu.php?id_congdan='.$cd['_id'] .'&id_dicu='.$dc['id_dicu'].'" class="suadicu" onclick="return false;"><span class="mif-pencil"></span></a></td>';
                        echo '</tr>';
                    }
                } 
                ?>
                </tbody>
            </table>
        </div>
        <div class="frame bg-grayLighter" id="dinhcu">
            <table class="table bordered border striped" id="dinhcu_list">
            <thead>
            <tr>
                <th>Quốc gia</th>
                <th>Ngày nhập tịch</th>
                <th><span class="mif-bin"></span></th>
                <th><span class="mif-pencil"></span></th>
            </tr>
            </thead>
            <tbody>
                <?php 
                    if(isset($cd['dinhcu']) && $cd['dinhcu']){
                        foreach ($cd['dinhcu'] as $dc) {
                            if($dc['id_quocgia']) { $quocgia->id=$dc['id_quocgia']; $qg = $quocgia->get_one(); }
                            if(isset($dc['ngaynhaptich']) && $dc['ngaynhaptich']){
                            	$ngaynhaptich =  date("d/m/Y",$dc['ngaynhaptich']->sec);
                            } else { $ngaynhaptich = '';}
                            echo '<tr class="items '.$dc['id_dinhcu'].'">';
                            echo '<td>'.($qg['ten'] ? $qg['ten'] : '').'</td>';
                            echo '<td>'.$ngaynhaptich.'</td>';
                            echo '<td><a href="get.xoadinhcu.php?id_congdan='.$cd['_id'] .'&id_dinhcu='.$dc['id_dinhcu'].'" class="xoadinhcu" onclick="return false;"><span class="mif-bin"></span></a></td>';
                            echo '<td><a href="get.suadinhcu.php?id_congdan='.$cd['_id'] .'&id_dinhcu='.$dc['id_dinhcu'].'" class="suadinhcu" onclick="return false;"><span class="mif-pencil"></span></a></td>';
                            echo '</tr>';
                        }
                    }
                ?>                
            </tbody>
            </table>
        </div>
        <div class="frame bg-grayLighter" id="trithuc">
            <table class="table bordered border striped" id="trithuc_list">
            <thead>
            <tr>
                <th>Lĩnh vực</th>
                <th>Từ ngày</th>
                <th>Đến ngày</th>
                <th>Nội dung làm việc</th>
                <th><span class="mif-bin"></span></th>
                <th><span class="mif-pencil"></span></th>
            </tr>
            </thead>
            <tbody>
                <?php
                if(isset($cd['trithuc']) && $cd['trithuc']){
                    foreach ($cd['trithuc'] as $th) {
                        if($th['id_nganhhoc']) { $nganhhoc->id = $th['id_nganhhoc']; $lv = $nganhhoc->get_one(); }
                        echo '<tr class="items '.$th['id_trithuc'].'">';
                        echo '<td>'.$lv['ten'].'</td>';
                        echo '<td>'.($th['thoigianbatdau'] ? date("d/m/Y", $th['thoigianbatdau']->sec) : '').'</td>';
                        echo '<td>'.($th['thoigianketthuc'] ? date("d/m/Y", $th['thoigianketthuc']->sec) : '').'</td>';
                        echo '<td>'.$th['noidunglamviec'].'</td>';
                        echo '<td><a href="get.xoatrithuc.php?id_congdan='.$cd['_id'] .'&id_trithuc='.$th['id_trithuc'].'" class="xoatrithuc" onclick="return false;"><span class="mif-bin"></span></a></td>';
                        echo '<td><a href="get.suatrithuc.php?id_congdan='.$cd['_id'] .'&id_trithuc='.$th['id_trithuc'].'" class="suatrithuc" onclick="return false;"><span class="mif-pencil"></span></a></td>';
                        echo '</tr>';
                    }
                }
                ?>
            </tbody>
            </table>    
        </div>
        <div class="frame bg-grayLighter" id="doanhnhan">
            <table class="table bordered border striped" id="doanhnhan_list">
                <thead>
                <tr>
                    <th>Doanh nghiệp</th>
                    <th>Chức vụ</th>
                    <th>Vốn góp (VNĐ)</th>
                    <th><span class="mif-bin"></span></th>
                    <th><span class="mif-pencil"></span></th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($cd['doanhnhan']) && $cd['doanhnhan']){
                        foreach ($cd['doanhnhan'] as $dn) {
                            if($dn['id_doanhnghiep']) { $doanhnghiep->id = $dn['id_doanhnghiep']; $dnn = $doanhnghiep->get_one(); }
                            else $dnn = '';
                            echo '<tr class="items '.$dn['id_doanhnhan'].'">';
                            echo '<td>'.(isset($dnn['ten']) ? $dnn['ten'] : '') .'</td>';
                            echo '<td>'.$dn['chucvu'].'</td>';
                            echo '<td>'.($dn['VND'] ? format_number($dn['VND']) : '').'</td>';
                            echo '<td><a href="get.xoadoanhnhan.php?id_congdan='.$cd['_id'] .'&id_doanhnhan='.$dn['id_doanhnhan'].'" class="xoadoanhnhan" onclick="return false;"><span class="mif-bin"></span></a></td>';
                            echo '<td><a href="get.suadoanhnhan.php?id_congdan='.$cd['_id'] .'&id_doanhnhan='.$dn['id_doanhnhan'].'" class="suadoanhnhan" onclick="return false;"><span class="mif-pencil"></span></a></td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="frame bg-grayLighter" id="giadinh">
            <table class="table bordered border striped" id="giadinh_list">
                <thead>
                <tr>
                    <th>Họ tên</th>
                    <th>Giới tính</th>
                    <th>Ngày sinh</th>
                    <th>Quốc tịch</th>
                    <th>Nơi cư trú hiện nay</th>
                    <th>Quan hệ</th>
                    <th><span class="mif-bin"></span></th>
                    <th><span class="mif-pencil"></span></th>
                </tr>
                </thead>
                <tbody>
                <?php
                if(isset($cd['giadinh']) && $cd['giadinh']){
                    foreach ($cd['giadinh'] as $key => $qhgd) {
                        if($qhgd['id_congdanquanhe']) { $congdan->id = $qhgd['id_congdanquanhe']; $cdqh = $congdan->get_one(); }
                        if($cdqh['noicutruhiennay']) { $noicutruhiennay = $diachi->tendiachi($cdqh['noicutruhiennay']); }
                        echo '<tr class="items '.$qhgd['id_giadinh'].'">';
                        echo '<td><a href="congdan.php?id='.$cdqh['_id'].'">'.$cdqh['hoten'].'</a></td>';
                        echo '<td>'.$cdqh['gioitinh'].'</td>';
                        echo '<td>'.($cdqh['ngaysinh'] ? date("d/m/Y",$cdqh['ngaysinh']->sec) : '').'</td>';
                        echo '<td>'.($cdqh['quoctich'] ? $quocgia->get_quoctich($cdqh['quoctich']) :'').'</td>';
                        echo '<td>'.$noicutruhiennay.'</td>';
                        echo '<td>'.(isset($qhgd['quanhegiadinh1']) ? $qhgd['quanhegiadinh1'] : '').'</td>';
                        echo '<td><a href="get.xoagiadinh.php?id_congdan='.$cd['_id'] .'&id_giadinh='.$qhgd['id_giadinh'].'&id_congdanquanhe='.$cdqh['_id'].'" class="xoagiadinh" onclick="return false;"><span class="mif-bin"></span></a></td>';
                        echo '<td><a href="get.suagiadinh.php?id_congdan='.$cd['_id'] .'&id_giadinh='.$qhgd['id_giadinh'].'" class="suagiadinh" onclick="return false;"><span class="mif-pencil"></span></a></td>';
                        echo '</tr>';
                    }
                }                
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!----------------------------- Dialog hoc tap -------------------------------- -->
<div data-role="dialog" id="dialog_hoctap" class="padding20 block-shadow-danger" data-close-button="true" data-overlay="true" data-width="800">
<form action="#" id="hoctapform" method="POST">
    <input type="hidden" name="id_congdan" value="<?php echo $id; ?>" />
    <input type="hidden" name="id_hoctap" id="id_hoctap" value="" />
    <h2><span class="mif-school"></span> Thông tin Học tập?</h2>
    <div class="grid">
        <div class="row cells12">
            <div class="cell colspan4 input-control select">
                <select name="id_quocgia" id="id_quocgia" class="select2">
                    <option value="">Quốc gia du học</option>
                    <?php
                    if($quocgia_list){
                        foreach ($quocgia_list as $qg) {
                            echo '<option value="'.$qg['_id'].'">'.$qg['ten'].'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="cell colspan4 input-control text" data-role="datepicker" data-format="dd/mm/yyyy">
                <input type="text" name="thoigianbatdau" id="thoigianbatdau" placeholder="Thời gian bắt đầu" value="" data-inputmask="'alias': 'date'" class="ngaythangnam"/>
                <button class="button" id="xoathoigianbatdau"><span class="mif-calendar"></span></button>        
            </div>
            <div class="cell colspan4 input-control text" data-role="datepicker" data-format="dd/mm/yyyy">
                <input type="text" name="thoigianketthuc" id="thoigianketthuc" placeholder="Thời gian kết thúc" data-inputmask="'alias': 'date'" value="" class="ngaythangnam" />
                <button class="button" id="xoathoigiankethuc"><span class="mif-calendar"></span></button>
            </div>
        </div>
        <div class="row cells12">
            <div class="cell colspan4 input-control select">
                <select name="id_nganhhoc" id="id_nganhhoc" class="select2">
                    <option value="">Ngành học</option>
                    <?php
                        if($nganhhoc_list){
                            foreach ($nganhhoc_list as $nh) {
                                echo '<option value="'.$nh['_id'].'">'.$nh['ten'].'</option>';
                            }
                        }

                    ?>
                </select>
            </div>
            <div class="cell colspan4 input-control select">
                <select name="id_hinhthuchoctap" id="id_hinhthuchoctap" class="select2">
                    <option value="">Hình thức học tập</option>
                    <?php
                        if($hinhthuchoctap_list){
                            foreach ($hinhthuchoctap_list as $ht) {
                                echo '<option value="'.$ht['_id'].'">'.$ht['ten'].'</option>';
                            }
                        }

                    ?>
                </select>
            </div>
            <div class="cell colspan4 input-control select">
                <select name="id_trinhdo" id="id_trinhdo" class="select2">
                    <option value="">Trình độ khi tốt nghiệp</option>
                    <?php
                    if($trinhdo_list){
                        foreach ($trinhdo_list as $td) {
                            echo '<option value="'.$td['_id'].'">'.$td['ten'].'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row cells12">
            <div class="cell colspan12 input-control select">
                <select name="id_coquancongtac" id="id_coquancongtac" class="select2">
                    <option value="">Cơ quan công tác</option>
                    <?php
                    if($coquancongtac_list){
                        foreach ($coquancongtac_list as $cq) {
                            echo '<option value="'.$cq['_id'].'">'.$cq['ten'].'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row cells12">
            <div class="cell colspan12 align-center padding10">
                <a href="#" onclick="return false;" class="button primary fg-white" id="insert_hoctap"><span class="mif-checkmark"></span> Cập nhật</a>
                <a href="#" onclick="return false;" class="button primary fg-white" id="edit_hoctap"><span class="mif-checkmark"></span> Cập nhật</a>
                <a href="#" onclick="return false;" class="button" id="cancel_hoctap"><span class="mif-not"></span> Huỷ</a>
            </div>
        </div>
    </div>  
</form>
</div>

<!----------------------------- Dialog form laodong -------------------------------- -->
<div data-role="dialog" id="dialog_laodong" class="padding20 block-shadow-danger" data-close-button="true" data-overlay="true" data-width="900">
<form action="#" id="laodongform" method="POST">
<input type="hidden" name="id_congdan" value="<?php echo $id; ?>" />
<input type="hidden" name="id_laodong" id="id_laodong" value="" />
<h2><span class="mif-wrench"></span> Thông tin Lao động?</h2>
<div class="grid">
    <div class="row cells12">
        <div class="cell colspan3">
            <div class="input-control select"> 
                <select name="id_quocgia" id="id_quocgia_ld" class="select2">
                    <option value="">Quốc gia Lao động</option>
                    <?php
                    if($quocgia_list){
                        foreach ($quocgia_list as $qg) {
                            echo '<option value="'.$qg['_id'].'">'.$qg['ten'].'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="cell colspan3">
             <div class="input-control text" data-role="datepicker" data-format="dd/mm/yyyy">
                <input type="text" name="thoigianbatdau" id="thoigianbatdau_ld" placeholder="Thời gian bắt đầu" value="" data-inputmask="'alias': 'date'" class="ngaythangnam" />
                <button class="button" id="xoathoigianbatdau_ld"><span class="mif-calendar"></span></button>
            </div>
        </div>
        <div class="cell colspan3">
            <div class="input-control text" data-role="datepicker" data-format="dd/mm/yyyy">
                <input type="text" name="thoigianketthuc" id="thoigianketthuc_ld" placeholder="Thời gian kết thúc" value="" data-inputmask="'alias': 'date'" class="ngaythangnam" />
                <button class="button" id="xoathoigiankethuc_ld"><span class="mif-calendar"></span></button>
            </div>
        </div>
        <div class="cell colspan3">
            <div class="input-control select">
                <select name="id_tinhtranglaodong" id="id_tinhtranglaodong" class="select2">
                    <option value="">Tình trạng lao động </option>
                    <?php
                        if($tinhtranglaodong_list){
                            foreach ($tinhtranglaodong_list as $ttld) {
                                echo '<option value="'.$ttld['_id'].'">'.$ttld['ten'].'</option>';
                            }
                        }

                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row cells12">
        <div class="cell colspan3">
            <div class="input-control select">
                <select name="id_nganhnghe" id="id_nganhnghe" class="select2">
                    <option value="">Ngành nghề </option>
                    <?php
                        if($nganhnghe_list){
                            foreach ($nganhnghe_list as $nn) {
                                echo '<option value="'.$nn['_id'].'">'.$nn['ten'].'</option>';
                            }
                        }

                    ?>
                </select>
            </div>
        </div>
        <div class="cell colspan3">
            <div class="input-control text">
                <input type="text" name="coquanlaodong" id="coquanlaodong" placeholder="Tên cơ quan lao động" />
            </div>
        </div>
        <div class="cell colspan6">
            <div class="input-control text">
                <input type="text" name="diachicoquanlaodong" id="diachicoquanlaodong" placeholder="Địa chỉ cơ quan lao động" />
            </div>
        </div>
    </div>
    <div class="row cells12">
        <div class="cell colspan12">
            <div class="align-center padding10">
                <a href="#" onclick="return false;" class="button primary fg-white" id="insert_laodong"><span class="mif-checkmark"></span> Cập nhật</a>
                <a href="#" onclick="return false;" class="button primary fg-white" id="edit_laodong"><span class="mif-checkmark"></span> Cập nhật</a>
                <a href="#" onclick="return false;" class="button" id="cancel_laodong"><span class="mif-not"></span> Huỷ</a>
            </div>
        </div>
    </div>
</div>
</form>
</div>
<!-------------------------- Dialog Ket hon ------------------------------- -->
<div data-role="dialog" id="dialog_kethon" class="padding20 block-shadow-danger" data-close-button="true" data-overlay="true" data-width="800">
    <form action="#" id="kethonform" method="POST">
        <input type="hidden" name="id_congdan" id="id_congdan" value="<?php echo $id; ?>" />
        <input type="hidden" name="id_kethon" id="id_kethon" value="" />
        <h2><span class="mif-users"></span> Thông tin Kết hôn?</h2>
        <div class="input-control select">
            <select name="id_congdannuocngoai" id="id_congdannuocngoai" class="select2" style="width:500px;">
                <option value="">Thông tin Vợ/Chồng</option>
            </select>
        </div>
        <div class="input-control text" data-role="datepicker" data-format="dd/mm/yyyy">
            <input type="text" name="ngaykethon" id="ngaykethon" placeholder="Ngày kết hôn" value="" data-inputmask="'alias': 'date'" class="ngaythangnam" />
            <button class="button" id="xoangaykethon"><span class="mif-calendar"></span></button>
        </div>
        <div class="align-center padding10">
            <a href="#" onclick="return false;" class="button primary fg-white" id="insert_kethon"><span class="mif-checkmark"></span> Cập nhật</a>
            <a href="#" onclick="return false;" class="button primary fg-white" id="edit_kethon"><span class="mif-checkmark"></span> Cập nhật</a>
            <a href="#" onclick="return false;" class="button" id="cancel_kethon"><span class="mif-not"></span> Huỷ</a>
        </div>
    </form>
</div>
<!---------------------------------- //end dialog Ket hon ----------------------- -->
<!---------------------- Dialog dicu -------------------------------->
<div data-role="dialog" id="dialog_dicu" class="padding20 block-shadow-danger" data-close-button="true" data-overlay="true" data-width="800">
<h2><span class="mif-earth"></span> Thông tin Di cư?</h2>
<form action="#" id="dicuform" method="POST">
<input type="hidden" name="id_congdan" value="<?php echo $id; ?>" />
<input type="hidden" name="id_dicu" id="id_dicu" value="" />
<div class="grid">
    <div class="row cells12">
        <div class="cell colspan4 input-control select">
            <select name="id_quocgia" id="id_quocgia_dicu" class="select2">
                <option value="">Quốc gia Di cư</option>
                <?php
                if($quocgia_list){
                    foreach ($quocgia_list as $qg) {
                        echo '<option value="'.$qg['_id'].'">'.$qg['ten'].'</option>';
                    }
                }
                ?>
            </select>
        </div>

        <div class=" cell colspan4 input-control text" data-role="datepicker" data-format="dd/mm/yyyy">
            <input type="text" name="ngaydicu" id="ngaydicu" placeholder="Ngày di cư" value="" data-inputmask="'alias': 'date'" class="ngaythangnam" />
            <button class="button" id="xoangaydicu"><span class="mif-calendar"></span></button>
        </div>
        <div class="cell colspan4 input-control select">
            <select name="id_diendicu" id="id_diendicu" class="select2">
                <option value="">Diện di cư</option>
                <?php
                if($diendidinhcu_list){
                    foreach ($diendidinhcu_list as $ddc) {
                        echo '<option value="'.$ddc['_id'].'">'.$ddc['ten'].'</option>';
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <div class="row cells12">
        <div class="cell colspan12 align-center">
            <a href="#" onclick="return false;" class="button primary fg-white" id="insert_dicu"><span class="mif-checkmark"></span> Cập nhật</a>
            <a href="#" onclick="return false;" class="button primary fg-white" id="edit_dicu"><span class="mif-checkmark"></span> Cập nhật</a>
            <a href="#" onclick="return false;" class="button" id="cancel_dicu"><span class="mif-not"></span> Huỷ</a>
        </div>
    </div>
</div>
</form>
</div>
<!------- --------------------------------------------------------------- ------------ -->
<!-------------------------Dinh cu Dialog------------------------------------------  -->
<div data-role="dialog" id="dialog_dinhcu" class="padding20 block-shadow-danger" data-close-button="true" data-overlay="true" data-width="800">
<h2><span class="mif-map2"></span> Thông tin Định cư?</h2>
<form action="#" id="dinhcuform" method="POST">
    <input type="hidden" name="id_congdan" value="<?php echo $id; ?>" />
    <input type="hidden" name="id_dinhcu" id="id_dinhcu" />
<div class="grid">
    <div class="row cells12">
        <div class="cell colspan6 input-control select">
            <select name="id_quocgia" id="id_quocgia_dinhcu" class="select2">
                <option value="">Quốc gia Định cư</option>
                <?php
                if($quocgia_list){
                    foreach ($quocgia_list as $qg) {
                        echo '<option value="'.$qg['_id'].'">'.$qg['ten'].'</option>';
                    }
                }
                ?>
            </select>
        </div>
        <div class="cell colspan6 input-control text" data-role="datepicker" data-format="dd/mm/yyyy">
            <input type="text" name="ngaynhaptich" id="ngaynhaptich" placeholder="Ngày nhập tịch" value="" data-inputmask="'alias': 'date'" class="ngaythangnam" />
            <button class="button" id="xoangaynhaptich"><span class="mif-calendar"></span></button>
        </div>
    </div>
    <div class="row cells12">
        <div class="cell colspan12 align-center padding10">
            <a href="#" onclick="return false;" class="button primary fg-white" id="insert_dinhcu"><span class="mif-checkmark"></span> Cập nhật</a>
            <a href="#" onclick="return false;" class="button primary fg-white" id="edit_dinhcu"><span class="mif-checkmark"></span> Cập nhật</a>
            <a href="#" onclick="return false;" class="button" id="cancel_dinhcu"><span class="mif-not"></span> Huỷ</a>
        </div>
    </div>
</div>
</form>
</div>

<!-------------------------Trí thức Dialog------------------------------------------  -->
<div data-role="dialog" id="dialog_trithuc" class="padding20 block-shadow-danger" data-close-button="true" data-overlay="true" data-width="800">
<form action="#" id="trithucform" method="POST">
    <input type="hidden" name="id_congdan" value="<?php echo $id; ?>" />
    <input type="hidden" name="id_trithuc" id="id_trithuc" value="" />
    <h2><span class="mif-user-check"></span> Thông tin Trí thức?</h2>
    <div class="grid">
        <div class="row cells12">
            <div class="cell colspan4 input-control select">
                <select name="id_nganhhoc" id="id_nganhhoc_trithuc" class="select2">
                    <option value="">Lĩnh vực</option>
                    <?php
                        if($nganhhoc_list){
                            foreach ($nganhhoc_list as $nh) {
                                echo '<option value="'.$nh['_id'].'">'.$nh['ten'].'</option>';
                            }
                        }

                    ?>
                </select>
            </div>
            <div class="cell colspan4 input-control text" data-role="datepicker" data-format="dd/mm/yyyy">
                <input type="text" name="thoigianbatdau" id="thoigianbatdau_trithuc" placeholder="Thời gian bắt đầu" value="" data-inputmask="'alias': 'date'" class="ngaythangnam" />
                <button class="button" id="xoathoigianbatdau"><span class="mif-calendar"></span></button>
            </div>
            <div class="cell colspan4 input-control text" data-role="datepicker" data-format="dd/mm/yyyy">
                <input type="text" name="thoigianketthuc" id="thoigianketthuc_trithuc" placeholder="Thời gian Kết thúc" value="" data-inputmask="'alias': 'date'" class="ngaythangnam" />
                <button class="button" id="xoathoigianketthuc"><span class="mif-calendar"></span></button>
            </div>
        </div>
        <div class="row cells12">
            <div class="cell colspan12 align-center input-control textarea">
                <textarea name="noidunglamviec" id="noidunglamviec" placeholder="Nội dung làm việc"></textarea>
            </div>
        </div>
        <div class="row cells12">
            <div class="cell colspan12 align-center">
                <a href="#" onclick="return false;" class="button primary fg-white" id="edit_trithuc"><span class="mif-checkmark"></span> Cập nhật</a>
                <a href="#" onclick="return false;" class="button primary fg-white" id="insert_trithuc"><span class="mif-checkmark"></span> Cập nhật</a>
                <a href="#" onclick="return false;" class="button" id="cancel_trithuc"><span class="mif-not"></span> Huỷ</a>
            </div>
        </div>
    </div>
</form>
</div>
<!-------------------------Doanh nhân Dialog------------------------------------------  -->
<div data-role="dialog" id="dialog_doanhnhan" class="padding20 block-shadow-danger" data-close-button="true" data-overlay="true" data-width="800">
<form action="#" id="doanhnhanform" method="POST">
    <input type="hidden" name="id_congdan" value="<?php echo $id; ?>" />
    <input type="hidden" name="id_doanhnhan" id="id_doanhnhan" value="" />
    <h2><span class="mif-money"></span> Thông tin Doanh nghiệp?</h2>
    <div class="grid">
        <div class="row cells12">
            <div class="cell colspan7 input-control select">
                <select name="id_doanhnghiep" id="id_doanhnghiep" class="select2">
                    <option value="">Doanh nghiệp</option>
                    <?php
                        $doanhnghiep_list = $doanhnghiep->get_all_list();
                        if($doanhnghiep_list){
                            foreach ($doanhnghiep_list as $dn) {
                                echo '<option value="'.$dn['_id'].'">'.$dn['ten'].'</option>';
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="cell colspan5 input-control text">
                <input name="chucvu" id="chucvu" placeholder="Chức vụ" />
            </div>
        </div>
        <div class="row cells12">
            <div class="cell colspan4 input-control select">
                <select name="donvitien" id="donvitien" class="select2">
                    <option value="">Đơn vị tiền tệ</option>
                    <?php
                    foreach ($arr_donvitien as $key => $value) {
                        echo '<option value="'.$key.'">'.$value.'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="cell colspan4 input-control text">
                <input type="text" name="sotien" id="sotien" placeholder="Đơn vị ngoại tệ" class="tinhtien">
            </div>
            <div class="cell colspan4 input-control text">
                <input type="text" name="tygia" id="tygia" placeholder="Tỷ giá" class="tinhtien">
            </div>
        </div>
        <div class="row cells12">
            <div class="cell colspan3 padding-top-10"><b>Vốn đóng góp</b></div>
            <div class="cell colspan9 input-control text">
                <input type="text" name="VND" id="VND" placeholder="VNĐ">
            </div>
        </div>
        <div class="row cells12">
            <div class="cell colspan12 align-center">
                <a href="#" onclick="return false;" class="button primary fg-white" id="edit_doanhnhan"><span class="mif-checkmark"></span> Cập nhật</a>
                <a href="#" onclick="return false;" class="button primary fg-white" id="insert_doanhnhan"><span class="mif-checkmark"></span> Cập nhật</a>
                <a href="#" onclick="return false;" class="button" id="cancel_doanhnhan"><span class="mif-not"></span> Huỷ</a>
            </div>
        </div>
    </div>
</form>
</div>
<!-------------------------- Dialog quan he gia dinh ------------------------------- -->
<div data-role="dialog" id="dialog_giadinh" class="padding20 block-shadow-danger" data-close-button="true" data-overlay="true" data-width="800">
    <form action="#" id="giadinhform" method="POST" data-role="validator" data-show-required-state="false">
        <input type="hidden" name="id_congdan" id="id_congdan" value="<?php echo $id; ?>" />
        <input type="hidden" name="id_giadinh" id="id_giadinh" value="" />
        <h2><span class="mif-user-plus"></span> Thông tin Quan hệ Gia đình?</h2>
        <div class="grid">
            <div class="row cells12">
                <div class="cell colspan12 input-control select">
                    <select name="id_congdanquanhe" id="id_congdanquanhe" class="select2">
                        <option value="">Thông tin thành viên gia đình</option>
                    </select>
                </div>
            </div>
            <div class="row cells12">
                <div class="cell colspan6 input-control text">
                    <input type="text" name="quanhegiadinh1" value="" id="quanhegiadinh1" placeholder="Quan hệ với công dân trên" data-validate-func="required" />
                    <span class="input-state-error mif-warning"></span><span class="input-state-success mif-checkmark"></span>
                </div>
                <div class="cell colspan6 input-control text">
                    <input type="text" name="quanhegiadinh2" value="" id="quanhegiadinh2" placeholder="Quan hệ công dân này" data-validate-func="required" />
                    <span class="input-state-error mif-warning"></span><span class="input-state-success mif-checkmark"></span>
                </div>
            </div>
            <div class="row cells12">
                <div class="cell colspan12 align-center">
                    <div class="align-center padding10">
                        <a href="#" onclick="return false;" class="button primary fg-white" id="insert_giadinh"><span class="mif-checkmark"></span> Cập nhật</a>
                        <a href="#" onclick="return false;" class="button primary fg-white" id="edit_giadinh"><span class="mif-checkmark"></span> Cập nhật</a>
                        <a href="#" onclick="return false;" class="button" id="cancel_giadinh"><span class="mif-not"></span> Huỷ</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!---------------------------------- //end dialog Quan he gia dinh ----------------------- -->
<!------------------------------ dialog confirm delete ----------------------- -->
<div data-role="dialog" id="confirm_delete" class="padding20 block-shadow-danger" data-close-button="true" data-overlay="true">
    <h2><span class="mif-bin fg-black"></span> Chắc chắn xoá?</h2>
    <p>Nếu chắc xoá sẽ mất các dữ liệu liên quan đến công dân này.</p>
    <div class="align-center">
        <a href="#" onclick="return false;" class="button primary fg-white" id="delete_ok"><span class="mif-bin"></span> Đồng ý</a>
        <a href="#" onclick="return false;" class="button" id="delete_no"><span class="mif-not"></span> Huỷ không xoá</a>
    </div>
</div>

<div data-role="dialog" id="confirm_delete_child" class="padding20 block-shadow-danger" data-close-button="true" data-overlay="true">
    <h2><span class="mif-bin fg-black"></span> Chắc chắn xoá?</h2>
    <p>Bạn có chắn chắn xoá thông tin của công dân này.</p>
    <a href="#" onclick="return false;" class="button primary fg-white" id="delete_child_ok"><span class="mif-bin"></span> Đồng ý</a>
    <a href="#" onclick="return false;" class="button" id="delete_child_no"><span class="mif-not"></span> Huỷ không xoá</a>
</div>
<?php require_once('footer.php'); ?>