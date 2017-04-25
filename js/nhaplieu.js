function select2_all_placeholder(){
	$("#quoctich").select2({ placeholder: "" });
	$("#nghenghiep").select2({ placeholder: "" });
	$("#tongiao").select2({ placeholder: "" });
	$("#trinhdo").select2({ placeholder: "" });
	$("#diachi").select2();
	
	$("#noisinh1").select2({ placeholder: "Quốc gia" });
	$("#noicutruhiennay1").select2({ placeholder: "Quốc gia" });
	$("#diachilamviec1").select2({ placeholder: "Quốc gia" });
	$("#hokhauthuongtru1").select2({ placeholder: "Quốc gia" });

	$("#noisinh2").select2({ placeholder: "Tỉnh, thành phố, tiểu bang, vùng" });
	$("#noicutruhiennay2").select2({ placeholder: "Tình, thành phố, tiểu bang, vùng" });
	$("#diachilamviec2").select2({ placeholder: "Tình, thành phố, tiểu bang, vùng" });
	$("#hokhauthuongtru2").select2({ placeholder: "Tình, thành phố, tiểu bang, vùng" });

	$("#noisinh3").select2({ placeholder: "Huyện, Thành phố" });
	$("#noicutruhiennay3").select2({ placeholder: "Huyện, Thành phố" });
	$("#diachilamviec3").select2({ placeholder: "Huyện, Thành phố" });
	$("#hokhauthuongtru3").select2({ placeholder: "Huyện, Thành phố" });

	$("#noisinh4").select2({ placeholder: "Thị xã, Phường, Xã" });
	$("#noicutruhiennay4").select2({ placeholder: "Thị xã, Phường, Xã" });
	$("#diachilamviec4").select2({ placeholder: "Thị xã, Phường, Xã" });
	$("#hokhauthuongtru4").select2({ placeholder: "Thị xã, Phường, Xã" });

	$("#noisinh5").select2({ placeholder: "Ấp, Khóm" });
	$("#noicutruhiennay5").select2({ placeholder: "Ấp, Khóm" });
	$("#diachilamviec5").select2({ placeholder: "Ấp, Khóm" });
	$("#hokhauthuongtru5").select2({ placeholder: "Ấp, Khóm" });
}

function hide_all(){
	$("#noisinh_tab").hide();
	$("#hokhauthuongtru_tab").hide();
	$("#noicutruhiennay_tab").hide();
	$("#diachilamviec_tab").hide();
}
function choose_diachi(){
	hide_all();
	$("#diachi").change(function(){
		hide_all();
		$("#" + $(this).val()).show();
	});
}