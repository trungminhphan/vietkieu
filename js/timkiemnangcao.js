function select2_all_placeholder(){
	$("#diachi").select2();
	$("#id_quocgia").select2({ placeholder: "Quốc gia du học" });
	$("#noisinh1").select2({ placeholder: "Quốc gia" });
	$("#noisinh2").select2({ placeholder: "Tỉnh, thành phố, tiểu bang, vùng" });
	$("#noisinh3").select2({ placeholder: "Huyện, Thành phố" });
	$("#noisinh4").select2({ placeholder: "Thị xã, Phường, Xã" });
	$("#noisinh5").select2({ placeholder: "Ấp, Khóm" });
	$("#id_trinhdo").select2({ placeholder: "Trình độ học vấn" });
	$("#id_trinhdos").select2({ placeholder: "Bằng cấp sau khi học" });
	$("#id_nganhhoc").select2({ placeholder: "Ngành học" });
	$("#id_coquancongtac").select2({ placeholder: "Cơ quan công tác" });
    $("#id_hinhthuchoctap").select2({ placeholder: "Hình thức học tập" });

    $("#id_trinhdo_ld").select2({ placeholder: "Trình độ học vấn" });
    $("#id_quocgia_ld").select2({ placeholder: "Quốc gia Lao động" });
    $("#id_nganhnghe").select2({ placeholder: "Ngành nghề" });
    $("#id_tinhtranglaodong").select2({ placeholder: "Tình trạng lao động" });

    $("#id_nghenghiep_kh").select2({ placeholder: "Nghề nghiệp" });
    
    $("#id_quoctich_dc").select2({ placeholder: "Quốc tịch" });    
    $("#id_tongiao_dc").select2({ placeholder: "Tôn giáo" });    
    $("#id_quocgia_dc").select2({ placeholder: "Quốc gia" });
    $("#id_quocgia_dic").select2({ placeholder: "Quốc gia" });
    $("#id_diendicu").select2({ placeholder: "Diện di cư" });
    

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
}

function hide_all(){
    $("#hoctap").hide();$("#laodong").hide();$("#kethon").hide();$("#dicu").hide();$("#dinhcu").hide();
}