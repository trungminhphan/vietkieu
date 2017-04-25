function doanhnghiep(){
	var form_doanhnghiep = $("#dialog_doanhnghiep").data("dialog");
	var link_edit; var data_edit;
	$("#add_doanhnghiep").click(function(){
		form_doanhnghiep.open();$(".select2").select2(); $("#id").val("");
	});
	$("#close_form").click(function(){ form_doanhnghiep.close(); });
	//$("#del_ngaydkkd").click(function(){ $("#ngaydkkd").val(""); });
	
	
	$("#diachi1").change(function(){
	    $.get("get.diachi.php?id_root=" + $(this).val() + "&id_parent="+$(this).val() + "&level=2", function(data){
	        $("#diachi2").html(data);$("#diachi2").select2("val", data_edit.diachi2);
	    });
	});
	$("#diachi2").change(function(){
	    $.get("get.diachi.php?id_root=" + $("#diachi1").val() + "&id_parent="+$(this).val() + "&level=3", function(data){
	        $("#diachi3").html(data); $("#diachi3").select2("val", data_edit.diachi3);
	    });
	});
	$("#diachi3").change(function(){
	    $.get("get.diachi.php?id_root=" + $("#diachi1").val() + "&id_parent="+$(this).val() + "&level=4", function(data){
	        $("#diachi4").html(data);$("#diachi4").select2("val", data_edit.diachi4);
	    });
	});
	$("#diachi4").change(function(){
	    $.get("get.diachi.php?id_root=" + $("#diachi1").val() + "&id_parent="+$(this).val() + "&level=5", function(data){
	        $("#diachi5").html(data);$("#diachi5").select2("val", data_edit.diachi5);
	    });
	});
}
function suadoanhnghiep(){
	var form_doanhnghiep = $("#dialog_doanhnghiep").data("dialog");
	var link_edit; var data_edit;
	$(".suadoanhnghiep").click(function(){
		link_edit = $(this).attr("href");
		form_doanhnghiep.open();$(".select2").select2();
		$.getJSON(link_edit, function(data){
			data_edit = data;
			$("#id").val(data.id);
			$("#tendoanhnghiep").val(data.tendoanhnghiep);
			$("#sodkkd").val(data.sodkkd);
			$("#vondkkd").val(data.vondkkd);
			$("#ngaydkkd").val(data.ngaydkkd);
			$("#hinhthucdautu").val(data.hinhthucdautu);
			$("#tinhtranghoatdong").val(data.tinhtranghoatdong);
			$("#linhvuckinhdoanh").val(data.linhvuckinhdoanh);
			$("#ghichu").val(data.ghichu);
			$("#old_logo").val(data.logo);
			if(data.logo){
				$("#show_logo").html('<img src="images/uploads/'+data.logo+'" style="height:30px;"/>');
			}
			$("#diachi1").select2("val", data.diachi1);	
		    $("#diachi6").val(data.diachi6);
		});
	});
	return false;
}