<?php
require_once('header.php');
$quocgia = new QuocGia(); $tongiao = new TonGiao();
$nganhnghe = new NganhNghe(); $congdan = new CongDan();
$diachi = new DiaChi(); $trinhdo = new TrinhDo();
$diachi_list = $diachi->get_all_list();
$update = isset($_GET['update']) ? $_GET['update'] :'';
if($update=='ok'){ $msg = 'Cập nhật thành công.'; }
$maxCode = $congdan->get_maxCode();
if(isset($_POST['submit'])){
    $arr_quoctich = array();
    $id = isset($_POST['id']) ? $_POST['id'] : new MongoId();
    $code = $maxCode; //isset($_POST['code']) ? $_POST['code'] : '';
    $cmnd = isset($_POST['cmnd']) ? $_POST['cmnd'] : '';
    $passport = isset($_POST['passport']) ? $_POST['passport'] : '';
    $ngaysinh = $_POST['ngaysinh'] ? convert_date_dd_mm_yyyy($_POST['ngaysinh']) : '';
    $hoten = isset($_POST['hoten']) ? $_POST['hoten'] : '';
    $gioitinh = isset($_POST['gioitinh']) ? $_POST['gioitinh'] : '';
    $quoctich = isset($_POST['quoctich']) ? $_POST['quoctich'] : '';
    if($quoctich){
        foreach ($quoctich as $k=>$v) {
            array_push($arr_quoctich, new MongoId($v));
        }
    }
    $noisinh1 = isset($_POST['noisinh1']) ? $_POST['noisinh1'] : '';
    $noisinh2 = isset($_POST['noisinh2']) ? $_POST['noisinh2'] : '';
    $noisinh3 = isset($_POST['noisinh3']) ? $_POST['noisinh3'] : '';
    $noisinh4 = isset($_POST['noisinh4']) ? $_POST['noisinh4'] : '';
    $noisinh5 = isset($_POST['noisinh5']) ? $_POST['noisinh5'] : '';
    $noisinh6 = isset($_POST['noisinh6']) ? $_POST['noisinh6'] : '';
    $hokhauthuongtru1 = isset($_POST['hokhauthuongtru1']) ? $_POST['hokhauthuongtru1'] : '';
    $hokhauthuongtru2 = isset($_POST['hokhauthuongtru2']) ? $_POST['hokhauthuongtru2'] : '';
    $hokhauthuongtru3 = isset($_POST['hokhauthuongtru3']) ? $_POST['hokhauthuongtru3'] : '';
    $hokhauthuongtru4 = isset($_POST['hokhauthuongtru4']) ? $_POST['hokhauthuongtru4'] : '';
    $hokhauthuongtru5 = isset($_POST['hokhauthuongtru5']) ? $_POST['hokhauthuongtru5'] : '';
    $hokhauthuongtru6 = isset($_POST['hokhauthuongtru6']) ? $_POST['hokhauthuongtru6'] : '';
    $noicutruhiennay1 = isset($_POST['noicutruhiennay1']) ? $_POST['noicutruhiennay1'] : '';
    $noicutruhiennay2 = isset($_POST['noicutruhiennay2']) ? $_POST['noicutruhiennay2'] : '';
    $noicutruhiennay3 = isset($_POST['noicutruhiennay3']) ? $_POST['noicutruhiennay3'] : '';
    $noicutruhiennay4 = isset($_POST['noicutruhiennay4']) ? $_POST['noicutruhiennay4'] : '';
    $noicutruhiennay5 = isset($_POST['noicutruhiennay5']) ? $_POST['noicutruhiennay5'] : '';
    $noicutruhiennay6 = isset($_POST['noicutruhiennay6']) ? $_POST['noicutruhiennay6'] : '';

    $noisinh = array(
                    $noisinh1? new MongoId($noisinh1) : '',
                    $noisinh2 ? new MongoId($noisinh2) : '',
                    $noisinh3 ? new MongoId($noisinh3) : '',
                    $noisinh4 ? new MongoId($noisinh4) : '',
                    $noisinh5 ? new MongoId($noisinh5) : '',
                    $noisinh6);
    $hokhauthuongtru = array(
                    $hokhauthuongtru1? new MongoId($hokhauthuongtru1) : '',
                    $hokhauthuongtru2 ? new MongoId($hokhauthuongtru2) : '',
                    $hokhauthuongtru3 ? new MongoId($hokhauthuongtru3) : '',
                    $hokhauthuongtru4 ? new MongoId($hokhauthuongtru4) : '',
                    $hokhauthuongtru5 ? new MongoId($hokhauthuongtru5) : '',
                    $hokhauthuongtru6);
    $noicutruhiennay = array(
                            $noicutruhiennay1 ? new MongoId($noicutruhiennay1) : '',
                            $noicutruhiennay2 ? new MongoId($noicutruhiennay2) : '',
                            $noicutruhiennay3 ? new MongoId($noicutruhiennay3) : '',
                            $noicutruhiennay4 ? new MongoId($noicutruhiennay4) : '',
                            $noicutruhiennay5 ? new MongoId($noicutruhiennay5) : '',
                            $noicutruhiennay6);

    $nghenghiep = isset($_POST['nghenghiep']) ? $_POST['nghenghiep'] : '';
    $diachilamviec1 = isset($_POST['diachilamviec1']) ? $_POST['diachilamviec1'] : '';
    $diachilamviec2 = isset($_POST['diachilamviec2']) ? $_POST['diachilamviec2'] : '';
    $diachilamviec3 = isset($_POST['diachilamviec3']) ? $_POST['diachilamviec3'] : '';
    $diachilamviec4 = isset($_POST['diachilamviec4']) ? $_POST['diachilamviec4'] : '';
    $diachilamviec5 = isset($_POST['diachilamviec5']) ? $_POST['diachilamviec5'] : '';
    $diachilamviec6 = isset($_POST['diachilamviec6']) ? $_POST['diachilamviec6'] : '';
    $diachilamviec = array(
                    $diachilamviec1 ? new MongoId($diachilamviec1) : '',
                    $diachilamviec2 ? new MongoId($diachilamviec2) : '',
                    $diachilamviec3 ? new MongoId($diachilamviec3) : '',
                    $diachilamviec4 ? new MongoId($diachilamviec4) : '',
                    $diachilamviec5 ? new MongoId($diachilamviec5) : '',
                    $diachilamviec6);
    $quatrinhdaotao = isset($_POST['quatrinhdaotao']) ? $_POST['quatrinhdaotao'] : '';    
    $tongiao = isset($_POST['tongiao']) ? $_POST['tongiao'] : '';
    $trinhdo = isset($_POST['trinhdo']) ? $_POST['trinhdo'] : '';
    $dienthoaiban = isset($_POST['dienthoaiban']) ? $_POST['dienthoaiban'] : '';
    $didong = isset($_POST['didong']) ? $_POST['didong'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $fax = isset($_POST['fax']) ? $_POST['fax'] : '';
    $thongtinnguoilienhe = isset($_POST['thongtinnguoilienhe']) ? $_POST['thongtinnguoilienhe'] : '';

    $congdan->id = $id ? new MongoId($id) : new MongoId();
    $congdan->code = intval($code);
    $congdan->cmnd = $cmnd;
    $congdan->passport = $passport;
    $congdan->hoten = $hoten;
    $congdan->ngaysinh = $ngaysinh!='' ? new MongoDate($ngaysinh) : '';
    $congdan->gioitinh = $gioitinh;
    $congdan->quoctich = $arr_quoctich;
    $congdan->noisinh = $noisinh;
    $congdan->hokhauthuongtru = $hokhauthuongtru;
    $congdan->noicutruhiennay = $noicutruhiennay;
    $congdan->id_nganhnghe = $nghenghiep;
    $congdan->diachilamviec = $diachilamviec;
    $congdan->quatrinhdaotao = $quatrinhdaotao;
    $congdan->id_tongiao = $tongiao;
    $congdan->id_trinhdo = $trinhdo;
    $congdan->dienthoaiban = $dienthoaiban;
    $congdan->didong = $didong;
    $congdan->email = $email;
    $congdan->fax = $fax;
    $congdan->thongtinnguoilienhe = $thongtinnguoilienhe;
    $congdan->id_user = $users->get_userid();

    if($congdan->insert()){
        transfers_to('congdan.php?id='.$id);
    } else {
        $msg = 'Không thể thêm';
    }
}
?>
<script type="text/javascript" src="js/html5.messages.js"></script>
<script type="text/javascript" src="js/jquery.setcase.js"></script>
<script type="text/javascript" src="js/nhaplieu.js"></script>
<script type="text/javascript" src="js/jquery.inputmask.js"></script>
<script type="text/javascript" src="editor/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        select2_all_placeholder();choose_diachi();
        $("#noisinh1").change(function(){
            $.get("get.diachi.php?id_root=" + $(this).val() + "&id_parent="+$(this).val() + "&level=2", function(data){
                $("#noisinh2").html(data);//$("#noisinh2").select2({ placeholder: "Tỉnh, thành phố, tiểu bang, vùng" });
            });
        });
        $("#noisinh2").change(function(){
            $.get("get.diachi.php?id_root=" + $("#noisinh1").val() + "&id_parent="+$(this).val() + "&level=3", function(data){
                $("#noisinh3").html(data);//$("#noisinh3").select2({ placeholder: "Huyện, Thành phố" });
            });
        });
        $("#noisinh3").change(function(){
            $.get("get.diachi.php?id_root=" + $("#noisinh1").val() + "&id_parent="+$(this).val() + "&level=4", function(data){
                $("#noisinh4").html(data);//$("#noisinh4").select2({ placeholder: "Thị xã, Phường, Xã" });
            });
        });
        $("#noisinh4").change(function(){
            $.get("get.diachi.php?id_root=" + $("#noisinh1").val() + "&id_parent="+$(this).val() + "&level=5", function(data){
                $("#noisinh5").html(data);//$("#noisinh5").select2({ placeholder: "Ấp, Khóm" });
            });
        });

        $(".copy").hover(function(){
        	$(this).popover('show');
        });

        $("#copy_1").click(function(){
            $("#noicutruhiennay1").select2("val", $("#noisinh1").val());
            $("#noicutruhiennay2").html($("#noisinh2").html());
            $("#noicutruhiennay2").select2("val", $("#noisinh2").val());
            $("#noicutruhiennay3").html($("#noisinh3").html());
            $("#noicutruhiennay3").select2("val", $("#noisinh3").val());
            $("#noicutruhiennay4").html($("#noisinh4").html());
            $("#noicutruhiennay4").select2("val", $("#noisinh4").val());
            $("#noicutruhiennay5").html($("#noisinh5").html());
            $("#noicutruhiennay5").select2("val", $("#noisinh5").val());
            $("#noicutruhiennay6").val($("#noisinh6").val());
        });
        $("#copy_2").click(function(){
            $("#diachilamviec1").select2("val", $("#noisinh1").val());
            $("#diachilamviec2").html($("#noisinh2").html());
            $("#diachilamviec2").select2("val", $("#noisinh2").val());
            $("#diachilamviec3").html($("#noisinh3").html());
            $("#diachilamviec3").select2("val", $("#noisinh3").val());
            $("#diachilamviec4").html($("#noisinh4").html());
            $("#diachilamviec4").select2("val", $("#noisinh4").val());
            $("#diachilamviec5").html($("#noisinh5").html());
            $("#diachilamviec5").select2("val", $("#noisinh5").val());
            $("#diachilamviec6").val($("#noisinh6").val());
        });
        $("#copy_3").click(function(){
            $("#hokhauthuongtru1").select2("val", $("#noisinh1").val());
            $("#hokhauthuongtru2").html($("#noisinh2").html());
            $("#hokhauthuongtru2").select2("val", $("#noisinh2").val());
            $("#hokhauthuongtru3").html($("#noisinh3").html());
            $("#hokhauthuongtru3").select2("val", $("#noisinh3").val());
            $("#hokhauthuongtru4").html($("#noisinh4").html());
            $("#hokhauthuongtru4").select2("val", $("#noisinh4").val());
            $("#hokhauthuongtru5").html($("#noisinh5").html());
            $("#hokhauthuongtru5").select2("val", $("#noisinh5").val());
            $("#hokhauthuongtru6").val($("#noisinh6").val());
        });
        $("#hokhauthuongtru1").change(function(){
            $.get("get.diachi.php?id_root=" + $(this).val() + "&id_parent="+$(this).val() + "&level=2", function(data){
                $("#hokhauthuongtru2").html(data);$("#hokhauthuongtru2").select2("val", $("#noisinh2").val());
            });
        });
        $("#hokhauthuongtru2").change(function(){
            $.get("get.diachi.php?id_root=" + $("#hokhauthuongtru1").val() + "&id_parent="+$(this).val() + "&level=3", function(data){
                $("#hokhauthuongtru3").html(data);$("#hokhauthuongtru3").select2("val", $("#noisinh3").val());
            });
        });
        $("#hokhauthuongtru3").change(function(){
            $.get("get.diachi.php?id_root=" + $("#hokhauthuongtru1").val() + "&id_parent="+$(this).val() + "&level=4", function(data){
                $("#hokhauthuongtru4").html(data);$("#hokhauthuongtru4").select2("val", $("#noisinh4").val());
            });
        });
        $("#hokhauthuongtru4").change(function(){
            $.get("get.diachi.php?id_root=" + $("#hokhauthuongtru1").val() + "&id_parent="+$(this).val() + "&level=5", function(data){
                $("#hokhauthuongtru5").html(data);$("#hokhauthuongtru5").select2("val", $("#noisinh5").val());
            });
        });

        $("#noicutruhiennay1").change(function(){
            $.get("get.diachi.php?id_root=" + $(this).val() + "&id_parent="+$(this).val() + "&level=2", function(data){
                $("#noicutruhiennay2").html(data);$("#noicutruhiennay2").select2("val", $("#noisinh2").val());
            });
        });
        $("#noicutruhiennay2").change(function(){
            $.get("get.diachi.php?id_root=" + $("#noicutruhiennay1").val() + "&id_parent="+$(this).val() + "&level=3", function(data){
                $("#noicutruhiennay3").html(data);$("#noicutruhiennay3").select2("val", $("#noisinh3").val());
            });
        });
        $("#noicutruhiennay3").change(function(){
            $.get("get.diachi.php?id_root=" + $("#noicutruhiennay1").val() + "&id_parent="+$(this).val() + "&level=4", function(data){
                $("#noicutruhiennay4").html(data);$("#noicutruhiennay4").select2("val", $("#noisinh4").val());
            });
        });
        $("#noicutruhiennay4").change(function(){
            $.get("get.diachi.php?id_root=" + $("#noicutruhiennay1").val() + "&id_parent="+$(this).val() + "&level=5", function(data){
                $("#noicutruhiennay5").html(data);$("#noicutruhiennay5").select2("val", $("#noisinh5").val());
            });
        });

        $("#diachilamviec1").change(function(){
            $.get("get.diachi.php?id_root=" + $(this).val() + "&id_parent="+$(this).val() + "&level=2", function(data){
                $("#diachilamviec2").html(data);$("#diachilamviec2").select2("val", $("#noisinh2").val());
            });
        });
        $("#diachilamviec2").change(function(){
            $.get("get.diachi.php?id_root=" + $("#diachilamviec1").val() + "&id_parent="+$(this).val() + "&level=3", function(data){
                $("#diachilamviec3").html(data);$("#diachilamviec3").select2("val", $("#noisinh3").val());
            });
        });
        $("#diachilamviec3").change(function(){
            $.get("get.diachi.php?id_root=" + $("#diachilamviec1").val() + "&id_parent="+$(this).val() + "&level=4", function(data){
                $("#diachilamviec4").html(data);$("#diachilamviec4").select2("val", $("#noisinh4").val());
            });
        });
        $("#diachilamviec4").change(function(){
            $.get("get.diachi.php?id_root=" + $("#diachilamviec1").val() + "&id_parent="+$(this).val() + "&level=5", function(data){
                $("#diachilamviec5").html(data);$("#diachilamviec5").select2("val", $("#noisinh5").val());
            });
        });

        <?php if(isset($msg) && $msg): ?>
            $.Notify({type: 'alert', caption: 'Thông báo', content: <?php echo "'".$msg."'"; ?>});
        <?php endif; ?>
        $("#ngaysinh").inputmask();
        $("#hoten").toCapitalize().focus();
        tinymce.init({
            selector: "textarea",
            theme: "modern",
            plugins: [
                "autolink link image lists hr anchor",
                "wordcount code ",
                "paste textcolor"
           ],
           toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor"
        }); 
    });
    
</script>
<h1><a href="index.php" class="nav-button transform"><span></span></a>&nbsp;Thêm Công dân</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="nhaplieuform">
    <div class="grid">
        <div class="row cells12">
            <div class="cell colspan12 align-right">
                <button class="button primary" name="submit" value="OK" id="submit"><span class="mif-checkmark"></span> Lưu</button>
                <button type="reset" value="Reset" class="button"><span class="mif-bin"> Huỷ</button>
            </div>
        </div>
        <div class="row cells12">
            <div class="cell colspan3 align-left">
                <div class="place-left padding-top-15">Họ tên: </div>
                <div class="input-control text" style="width:50%;">
                    <input type="text" name="hoten" id="hoten" required />
                </div>
            </div>
            <div class="cell colspan3 align-left">
                <div class="place-left padding-top-15">ID: </div>
                <div class=" input-control text" style="width:50%;">
                    <input type="text" name="code" id="code" value="<?php echo $maxCode; ?>" readonly  />
                </div>
            </div>
            <div class="cell colspan3 align-left">
                <div class="place-left padding-top-15">CMND: </div>
                <div class="input-control text" style="width:50%;">
                    <input type="text" name="cmnd" id="cmnd" />
                </div>
            </div>
            <div class="cell colspan3 align-left">
                <div class="place-left padding-top-15">Passport: </div>
                <div class="place-right input-control text" style="width:40%;">
                    <input type="text" name="passport" id="passport" />
                </div>
            </div>
        </div>        
       <div class="row cells12">
            <div class="cell colspan5 align-left">
                <div class="place-left padding-top-15">Quốc tịch: </div>
                <div class="input-control select place-right" style="width:80%;">
                    <select name="quoctich[]" id="quoctich" multiple="multiple" class="diachi">
                        <option value="">Chọn Quốc tịch</option>
                        <?php
                            $quocgia_list = $quocgia->get_all_list();
                            if($quocgia_list){
                                foreach ($quocgia_list as $qg) {
                                    echo '<option value="'.$qg['_id'].'">'.$qg['ten'].'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="cell colspan4 align-left">
                <div class="place-left padding-top-15">Ngày sinh: </div>
                <div class="input-control text" data-role="datepicker" data-format="dd/mm/yyyy">
                    <input type="text" name="ngaysinh" id="ngaysinh" value="" data-inputmask="'alias': 'date'" />
                    <button class="button"><span class="mif-calendar"></span></button>
                </div>
            </div>
            <div class="cell colspan3 align-left">
                <div class="place-left padding-top-15">Giới tính: </div>
                <div class="input-control select">
                    <select name="gioitinh" id="gioitinh">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>
            </div>
            
        </div>
        <div class="row cells12">
            <div class="cell colspan3 align-left">
                <div class="place-left padding-top-15">Tôn giáo: </div>
                <div class="input-control text" style="width:50%;">
                    <?php
                    $tongiao = new TonGiao();
                        $tongiao_list = $tongiao->get_all_list();
                    ?>
                    <select name="tongiao" id="tongiao" class="diachi" data-allow-clear="true">
                        <option value="">Tôn giáo</option>
                        <?php
                        if($tongiao_list){
                            foreach ($tongiao_list as $tg) {
                                echo '<option value="'.$tg['_id'].'">'.$tg['ten'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="cell colspan3 align-left">
                <div class="place-left padding-top-15">Trình độ: </div>
                <div class="input-control text" style="width:50%;">
                    <select name="trinhdo" id="trinhdo" class="diachi" data-allow-clear="true">
                        <option value="">Trình độ học vấn</option>
                        <?php
                        $trinhdo_list = $trinhdo->get_all_list();
                        if($trinhdo_list){
                            foreach ($trinhdo_list as $td) {
                                echo '<option value="'.$td['_id'].'">'.$td['ten'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="cell colspan5 align-left">
                <div class="place-left padding-top-15">Nghề nghiệp: </div>
                <div class="input-control select">
                    <select name="nghenghiep" id="nghenghiep" class="diachi" data-allow-clear="true">
                        <option value="">Nghề nghiệp hiện nay</option>
                        <?php
                            $nganhnghe_list = $nganhnghe->get_all_list();
                            if($nganhnghe_list){
                                foreach ($nganhnghe_list as $nn) {
                                    echo '<option value="'.$nn['_id'].'">'.$nn['ten'].'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row cells12">
            <div class="cell colspan3 align-left">
                <div class="place-left padding-top-15">Phone: </div>
                <div class="input-control text">
                    <input type="text" name="dienthoaiban" id="dienthoaiban"  />
                </div>
            </div>
            <div class="cell colspan3 align-left">
                <div class="place-left padding-top-15">Mobile: </div>
                <div class="input-control text">
                    <input type="text" name="didong" id="didong" />
                </div>
            </div>
            <div class="cell colspan3 align-left">
                <div class="place-left padding-top-15">Email: </div>
                <div class="input-control text">
                    <input type="email" name="email" name="email" id="email" />
                </div>
            </div>
            <div class="cell colspan3 align-left">
                <div class="place-left padding-top-15">Fax: </div>
                <div class="input-control text">
                    <input type="text" name="fax" id="fax"  />                    
                </div>
            </div>
        </div>
        <div class="row cells12">
            <div class="cell colspan2 padding-top-10">Địa chỉ</div>
            <div class="cell colspan4 input-control select">
                <select name="dichia" id="diachi" class="diachi">
                    <option value="">Không có thông tin</option>
                    <option value="noisinh_tab">Nơi sinh</option>
                    <option value="hokhauthuongtru_tab">Hộ khẩu thường trú</option>
                    <option value="noicutruhiennay_tab">Nơi cư trú hiện nay</option>
                    <option value="diachilamviec_tab">Nơi làm việc</option>
                </select>
            </div>
        </div>
        <div id="noisinh_tab">
            <div class="row cells12">
                <div class="cell colspan2 padding-top-10">Nơi sinh</div>
                <div class="cell colspan2 align-left input-control select">
                    <select name="noisinh1" id="noisinh1" class="diachi"  data-allow-clear="true">
                        <option value="">Quốc gia</option>
                        <?php
                        if($diachi_list){
                            foreach ($diachi_list as $a1) {
                                echo '<option value="'.$a1['_id'].'">'.$a1['tendiachi'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="cell colspan2 align-left input-control select">
                    <select name="noisinh2" id="noisinh2" class="diachi" data-allow-clear="true">
                        <option value="">Tỉnh, Thành phố, Tiểu bang, vùng</option>
                    </select>
                </div>
                <div class="cell colspan2 align-left input-control select">
                    <select name="noisinh3" id="noisinh3" class="diachi" data-allow-clear="true">
                        <option value="">Huyện/TP</option>
                    </select>
                </div>
                <div class="cell colspan2 align-left input-control select">
                    <select name="noisinh4" id="noisinh4" class="diachi" data-allow-clear="true">
                        <option value="">Thị xã, phường, xã</option>
                    </select>
                </div>
            </div>
            <div class="row cells12">
                <div class="cell colspan2 padding-top-10"></div>
                <div class="cell colspan2 align-left input-control select">
                    <select name="noisinh5" id="noisinh5" class="diachi" data-allow-clear="true">
                        <option value="">Ấp, khóm</option>
                    </select>
                </div>
                <div class="cell colspan6 align-left input-control text">
                    <input type="text" name="noisinh6" id="noisinh6" />
                </div>
            </div>
        </div>
        <!--- Ho khau thuong tru ---------->
        <div id="hokhauthuongtru_tab">
            <div class="row cells12">
                <div class="cell colspan2 padding-top-10">Nơi đăng ký hộ khẩu thường trú</div>
                <div class="cell colspan2 align-left input-control select">
                    <select name="hokhauthuongtru1" id="hokhauthuongtru1" class="diachi" data-allow-clear="true">
                        <option value="">Quốc gia</option>
                        <?php
                        if($diachi_list){
                            foreach ($diachi_list as $a1) {
                                echo '<option value="'.$a1['_id'].'">'.$a1['tendiachi'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="cell colspan2 align-left input-control select" >
                    <select name="hokhauthuongtru2" id="hokhauthuongtru2" class="diachi" data-allow-clear="true">
                        <option value="">Tỉnh, Thành phố, Tiểu bang, vùng</option>
                    </select>
                </div>
                <div class="cell colspan2 align-left input-control select">
                    <select name="hokhauthuongtru3" id="hokhauthuongtru3" class="diachi" data-allow-clear="true">
                        <option value="">Huyện/TP</option>
                    </select>
                </div>
                <div class="cell colspan2 align-left input-control select">
                    <select name="hokhauthuongtru4" id="hokhauthuongtru4" class="diachi" data-allow-clear="true">
                        <option value="">Thị xã, phường, xã</option>
                    </select>
                </div>
            </div>
            <div class="row cells12">
                <div class="cell colspan2 padding-top-10"></div>
                <div class="cell colspan2 align-left input-control select">
                    <select name="hokhauthuongtru5" id="hokhauthuongtru5" class="diachi" data-allow-clear="true">
                        <option value="">Ấp, khóm</option>
                    </select>
                </div>
                <div class="cell colspan6 align-left input-control text">
                    <input type="text" name="hokhauthuongtru6" id="hokhauthuongtru6" />
                </div>
                <div class="cell"><a href="#" onclick="return false;" id="copy_3" class="copy" data-role="popover" data-popover-position="right" data-popover-text="Sao chép địa chỉ Nơi sinh." data-popover-background="bg-red" data-popover-color="fg-white"><span class="mif-layers mif-2x"></span></a></div>
                <div class="cell"></div>
            </div>
        </div>
        <!-- Noi cu tru hien nay ----- -->
        <div id="noicutruhiennay_tab">
            <div class="row cells12">
                <div class="cell colspan2 padding-top-10">Nơi cư trú hiện nay</div>
                <div class="cell colspan2 align-left input-control select">
                    <select name="noicutruhiennay1" id="noicutruhiennay1" class="diachi" data-allow-clear="true">
                        <option value="">Quốc gia</option>
                        <?php
                        if($diachi_list){
                            foreach ($diachi_list as $a1) {
                                echo '<option value="'.$a1['_id'].'">'.$a1['tendiachi'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="cell colspan2 align-left input-control select">
                    <select name="noicutruhiennay2" id="noicutruhiennay2" class="diachi" data-allow-clear="true">
                        <option value="">Tỉnh, Thành phố, Tiểu bang, vùng</option>
                    </select>
                </div>
                <div class="cell colspan2 align-left input-control select">
                    <select name="noicutruhiennay3" id="noicutruhiennay3" class="diachi" data-allow-clear="true">
                        <option value="">Huyện/TP</option>
                    </select>
                </div>
                <div class="cell colspan2 align-left input-control select">
                    <select name="noicutruhiennay4" id="noicutruhiennay4" class="diachi" data-allow-clear="true">
                        <option value="">Thị xã, phường, xã</option>
                    </select>
                </div>
            </div>
            <div class="row cells12">
                <div class="cell colspan2"></div>
                <div class="cell colspan2 align-left input-control select" class="diachi">
                    <select name="noicutruhiennay5" id="noicutruhiennay5" class="diachi" data-allow-clear="true">
                        <option value="">Ấp, khóm</option>
                    </select>
                </div>
                <div class="cell colspan6 align-left input-control text">
                    <input type="text" name="noicutruhiennay6" id="noicutruhiennay6" />
                </div>
                <div class="cell"><a href="#" onclick="return false;" id="copy_1" class="copy" data-role="popover" data-popover-position="right" data-popover-text="Sao chép địa chỉ Nơi sinh." data-popover-background="bg-red" data-popover-color="fg-white"><span class="mif-layers mif-2x"></span></a></div>
                <div class="cell"></div>
            </div>
        </div>
        <div id="diachilamviec_tab">
            <div class="row cells12">
                <div class="cell colspan2 padding-top-10">Địa chỉ nơi làm việc</div>
                <div class="cell colspan2 align-left input-control select">
                    <select name="diachilamviec1" id="diachilamviec1" class="diachi" data-allow-clear="true">
                        <option value="">Quốc gia</option>
                        <?php
                        if($diachi_list){
                            foreach ($diachi_list as $a1) {
                                echo '<option value="'.$a1['_id'].'">'.$a1['tendiachi'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="cell colspan2 align-left input-control select">
                    <select name="diachilamviec2" id="diachilamviec2" class="diachi" data-allow-clear="true">
                        <option value="">Tỉnh, Thành phố, Tiểu bang, vùng</option>
                    </select>
                </div>
                <div class="cell colspan2 align-left input-control select">
                    <select name="diachilamviec3" id="diachilamviec3" class="diachi" data-allow-clear="true">
                        <option value="">Huyện/TP</option>
                    </select>
                </div>
                <div class="cell colspan2 align-left input-control select">
                    <select name="diachilamviec4" id="diachilamviec4" class="diachi" data-allow-clear="true">
                        <option value="">Thị xã, phường, xã</option>
                    </select>
                </div>
            </div>
            <div class="row cells12">
                <div class="cell colspan2"></div>
                <div class="cell colspan2 align-left input-control select">
                    <select name="diachilamviec5" id="diachilamviec5" class="diachi" data-allow-clear="true">
                        <option value="">Ấp, khóm</option>
                    </select>
                </div>
                <div class="cell colspan6 align-left input-control text">
                    <input type="text" name="diachilamviec6" id="diachilamviec6" />
                </div>
                <div class="cell"><a href="#" onclick="return false;" id="copy_2" class="copy" data-role="popover" data-popover-position="right" data-popover-text="Sao chép địa chỉ Nơi sinh." data-popover-background="bg-red" data-popover-color="fg-white"><span class="mif-layers mif-2x"></span></a></div>
                <div class="cell"></div>
            </div>
        </div>
        <!--
        <div class="row cells12">
            <div class="cell colspan2 padding-top-10">Quá trình đào tạo</div>
            <div class="cell colspan10 input-control textarea">
                <textarea name="quatrinhdaotao" id="quatrinhdaotao" placeholder="Quá trình đào tạo"></textarea>
            </div>
        </div>
        -->
        <div class="row cells12">
            <div class="cell colspan12">
                <div class="place-left padding-top-15">Ghi chú: </div>
                <div class="input-control text" style="width:70%;">
                    <input type="text" name="thongtinnguoilienhe" id="thongtinnguoilienhe" />
                </div>
            </div>
        </div>
    </div>
</form>
<?php require_once('footer.php'); ?>