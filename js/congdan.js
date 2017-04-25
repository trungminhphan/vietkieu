function congdan(){
	var confirm_delete = $("#confirm_delete").data("dialog");
    var link_delete = '';  
    $("#del_congdan").click(function(event){
        confirm_delete.open();
        event.preventDefault();
        link_delete = $(this).attr("href");
    });
    $("#delete_ok").click(function(){
        $.ajax({
            type : "GET",
            url : link_delete,
            success : function(data){
                confirm_delete.close();
                window.location.href = "timcongdan.php";    
            }
        });
    });

    $("#delete_no").click(function(){
        confirm_delete.close();
    });
}
function hoctap(){
    var form_hoctap = $("#dialog_hoctap").data("dialog");
    $("#add_hoctap").click(function(){
        form_hoctap.open(); $(".select2").select2(); $("#tab_hoctap").click();
        $("#edit_hoctap").hide();$("#insert_hoctap").show();
        $("#id_hoctap").val('');
    });
    $("#cancel_hoctap").click(function(){ form_hoctap.close();});
    $("#insert_hoctap").click(function(){
        $.ajax({
            type: "POST",
            url: "post.themhoctap.php",
            data: $("#hoctapform").serialize(),
            success: function(datas) {
                if(datas=='Failed'){
                    $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể Thêm học tập"});
                } else {
                    $("#hoctap_list tbody").append(datas); xoahoctap();suahoctap();
                }
           }
        }).fail(function() {
            $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể Thêm học tập"});
        });
       form_hoctap.close();
    });
    $("#edit_hoctap").click(function(){
        var id_hoctap = $("#id_hoctap").val();
        $.ajax({
            type: "POST",
            url: "post.themhoctap.php",
            data: $("#hoctapform").serialize(),
            success: function(datas) {
                if(datas=='Failed'){
                    $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể Sửa học tập"});
                } else {
                    //$("#hoctap_list tbody").append(datas); xoahoctap();
                    $("#hoctap_list tr." + id_hoctap).replaceWith(datas);xoahoctap();suahoctap();
                }
           }
        }).fail(function() {
            $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể Sửa học tập"});
        });
       form_hoctap.close();
    });
    xoahoctap();suahoctap();
}
function suahoctap(){
    var form_hoctap = $("#dialog_hoctap").data("dialog");
    var link_edit = ''; 
    $(".suahoctap").click(function(){
        link_edit = $(this).attr("href");
        $("#insert_hoctap").hide(); $("#edit_hoctap").show();
        form_hoctap.open();$(".select2").select2();
        $.getJSON(link_edit, function(data_edit){
            $("#id_hoctap").val(data_edit.id_hoctap);
            $("#id_quocgia").select2("val", data_edit.id_quocgia);
            $("#thoigianbatdau").val(data_edit.thoigianbatdau);
            $("#thoigianketthuc").val(data_edit.thoigianketthuc);
            $("#id_nganhhoc").select2("val", data_edit.id_nganhhoc);
            $("#id_hinhthuchoctap").select2("val", data_edit.id_hinhthuchoctap);
            $("#id_trinhdo").select2("val", data_edit.id_trinhdo);
            $("#id_coquancongtac").select2("val", data_edit.id_coquancongtac);
        });
    });
}

function xoahoctap(){
	var delete_child_dialog = $("#confirm_delete_child").data("dialog");
	var link; var _this;
	$(".xoahoctap").click(function(){
		link = $(this).attr("href");
		_this = $(this);
		delete_child_dialog.open();	
	});
	$("#delete_child_ok").click(function(){
		$.ajax({
			type: "GET", url: link,
			success: function(data){
				_this.parents("tr.items").fadeOut();
				delete_child_dialog.close();
			},		
		}).fail(function() {
            $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể xoá."});
        });

	});
	$("#delete_child_no").click(function(){
		delete_child_dialog.close();
	});
}

function laodong(){
	var form_laodong = $("#dialog_laodong").data("dialog");
	$("#add_laodong").click(function(){
        $("#insert_laodong").show(); $("#edit_laodong").hide();$("#id_laodong").val('');
	   form_laodong.open(); $(".select2").select2();$("#tab_laodong").click();
	});
	//$("#xoathoigianbatdau_ld").click(function(){ $("#thoigianbatdau_ld").val(''); });
    //$("#xoathoigiankethuc_ld").click(function(){ $("#thoigianketthuc_ld").val(''); });
    $("#cancel_laodong").click(function(){ form_laodong.close();});
    $("#insert_laodong").click(function(){
        $.ajax({
            type: "POST",
            url: "post.themlaodong.php",
            data: $("#laodongform").serialize(),
            success: function(datas) {
                if(datas=='Failed'){
                    $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể Thêm lao động"});
                } else {
                    $("#laodong_list tbody").append(datas); xoalaodong();sualaodong();
                }
           }
        }).fail(function() {
            $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể Thêm Lao động"});
        });
       form_laodong.close();
    });

    $("#edit_laodong").click(function(){
        var id_laodong = $("#id_laodong").val();
        $.ajax({
            type: "POST",
            url: "post.themlaodong.php",
            data: $("#laodongform").serialize(),
            success: function(datas) {
                if(datas=='Failed'){
                    $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể Sửa Lao động"});
                } else {
                    $("#laodong_list tr." + id_laodong).replaceWith(datas);xoalaodong();sualaodong();
                }
           }
        }).fail(function() {
            $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể Sửa Lao động"});
        });
       form_laodong.close();
    });
    xoalaodong();sualaodong();
}
function sualaodong(){
    var form_laodong = $("#dialog_laodong").data("dialog");
    var link_edit = ''; 
    $(".sualaodong").click(function(){
        link_edit = $(this).attr("href");
        $("#insert_laodong").hide(); $("#edit_laodong").show();
        form_laodong.open();$(".select2").select2();
        $.getJSON(link_edit, function(data_edit){
            $("#id_laodong").val(data_edit.id_laodong);
            $("#id_quocgia_ld").select2("val", data_edit.id_quocgia);
            $("#thoigianbatdau_ld").val(data_edit.thoigianbatdau);
            $("#thoigianketthuc_ld").val(data_edit.thoigianketthuc);
            $("#id_tinhtranglaodong").select2("val",data_edit.id_tinhtranglaodong);
            $("#id_nganhnghe").select2("val",data_edit.id_nganhnghe);
            $("#coquanlaodong").val(data_edit.coquanlaodong);
            $("#diachicoquanlaodong").val(data_edit.diachicoquanlaodong);
        });
    });
}
function xoalaodong(){
    var delete_child_dialog = $("#confirm_delete_child").data("dialog");
    var link; var _this;
    $(".xoalaodong").click(function(){
        link = $(this).attr("href");
        _this = $(this);
        delete_child_dialog.open(); 
    });
    $("#delete_child_ok").click(function(){
        $.ajax({
            type: "GET", url: link,
            success: function(data){
                _this.parents("tr.items").fadeOut();
                delete_child_dialog.close();
            },      
        }).fail(function() {
            $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể xoá."});
        });

    });
    $("#delete_child_no").click(function(){
        delete_child_dialog.close();
    });
}
 function formatRepo (repo) {
    if (repo.loading) return repo.text;

    var markup = '<div class="clearfix">' +
    '<div clas="col-sm-10">' +
    '<div class="clearfix">' +
    '<div class="col-sm-6">Họ tên: <b>' + repo.hoten + '</b> ('+ repo.ngaysinh + ')</div>' +
    //'<div class="col-sm-3"><i class="fa fa-code-fork"></i> ' + repo.forks_count + '</div>' +
    //'<div class="col-sm-2"><i class="fa fa-star"></i> ' + repo.stargazers_count + '</div>' +
    '</div>';
    if (repo.code || repo.quoctich) {
          markup += '<div>Quốc tịch: ' + repo.quoctich + ' ID: <b>'+ repo.code + '</b></div>';
    }
    markup += '</div></div>';
    return markup;
  }

  function formatRepoSelection (repo) {
    return repo.text;
  }
function kethon(){
    var form_kethon = $("#dialog_kethon").data("dialog");
    $("#add_kethon").click(function(){
        form_kethon.open(); $("#tab_kethon").click();
        $("#insert_kethon").show();$("#edit_kethon").hide();$("#id_kethon").val('');
        $("#id_congdannuocngoai").removeAttr('disabled');
        $("#id_congdannuocngoai").select2({
            ajax: {
                url: "get.danhsachcongdannuocngoai.php",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function (markup) { return markup; },
            minimumInputLength: 1,
            templateResult: formatRepo,
            templateSelection: formatRepoSelection,
            placeholder: "Thông tin Vợ/Chồng"
        });
    });       
    $("#cancel_kethon").click(function(){ form_kethon.close();});
    $("#insert_kethon").click(function(){
        $.ajax({
            type: "POST",
            url: "post.themkethon.php",
            data: $("#kethonform").serialize(),
            success: function(datas) {
                if(datas=='Failed'){
                    $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể Thêm Kết hôn"});
                } else {
                    $("#kethon_list tbody").append(datas); xoakethon();suakethon();
                }
           }
        }).fail(function() {
            $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể Thêm Kết hôn"});
        });
       form_kethon.close();
    });
    $("#edit_kethon").click(function(){
        var id_kethon = $("#id_kethon").val();
        $.ajax({
            type: "POST",
            url: "post.themkethon.php",
            data: $("#kethonform").serialize(),
            success: function(datas) {
                if(datas=='Failed'){
                    $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể Thêm Kết hôn"});
                } else {
                    $("#kethon_list tr." + id_kethon).replaceWith(datas);xoakethon();suakethon();
                }
           }
        }).fail(function() {
            $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể Thêm Kết hôn"});
        });
       form_kethon.close();
    });
    xoakethon();suakethon();
    
}
function suakethon(){
    var form_kethon = $("#dialog_kethon").data("dialog");
    var link_edit = ''; 
    $(".suakethon").click(function(){
        link_edit = $(this).attr("href");
        $("#insert_kethon").hide(); $("#edit_kethon").show();
        form_kethon.open(); 
        //$(".select2").select2();
        $.getJSON(link_edit, function(data_edit){
            $("#id_kethon").val(data_edit.id_kethon);
            $("#id_congdannuocngoai").html('<option value="'+data_edit.id_congdannuocngoai+'" selected>'+data_edit.text+'</option>');
            /*$("#id_congdannuocngoai").select2({
                ajax: {
                    url: "get.danhsachcongdannuocngoai.php",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) { return markup; },
                minimumInputLength: 1,
                templateResult: formatRepo,
                templateSelection: formatRepoSelection,
                placeholder: "Công dân nước ngoài"
            });*/
            //$("#id_congdannuocngoai").select2("val", data_edit.id_congdannuocngoai);
            $("#ngaykethon").val(data_edit.ngaykethon);
        });
    });
}
function xoakethon(){
    var delete_child_dialog = $("#confirm_delete_child").data("dialog"); var link; var _this;
    $(".xoakethon").click(function(){
        link = $(this).attr("href");
        _this = $(this);
        delete_child_dialog.open(); 
    });
    $("#delete_child_ok").click(function(){
        $.ajax({
            type: "GET", url: link,
            success: function(data){
                _this.parents("tr.items").fadeOut();
                delete_child_dialog.close();
            },      
        }).fail(function() {
            $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể xoá."});
        });

    });
    $("#delete_child_no").click(function(){
        delete_child_dialog.close();
    });
}

function dicu(){
    var form_dicu = $("#dialog_dicu").data("dialog");
    $("#add_dicu").click(function(){
        form_dicu.open();$(".select2").select2();$("#tab_dicu").click();
        $("#insert_dicu").show(); $("#edit_dicu").hide(); $("#id_dicu").val('');
    });

    //$("#xoangaydicu").click(function(){ $("#ngaydicu").val("");  });
    $("#cancel_dicu").click(function(){ form_dicu.close(); });
    $("#insert_dicu").click(function(){
        $.ajax({
            type: "POST",
            url: "post.themdicu.php",
            data: $("#dicuform").serialize(),
            success: function(datas) {
                if(datas=='Failed'){
                    $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể Thêm Di cư"});
                } else {
                    $("#dicu_list tbody").append(datas); xoadicu();suadicu();
                }
           }
        }).fail(function() {
            $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể Thêm Di cư"});
        });
       form_dicu.close();
    });

    $("#edit_dicu").click(function(){
        var id_dicu = $("#id_dicu").val();
        $.ajax({
            type: "POST",
            url: "post.themdicu.php",
            data: $("#dicuform").serialize(),
            success: function(datas) {
                if(datas=='Failed'){
                    $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể Thêm Di cư"});
                } else {
                    //$("#dicu_list tbody").append(datas);
                    $("#dicu_list tr." + id_dicu).replaceWith(datas);xoadicu();suadicu();
                }
           }
        }).fail(function() {
            $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể Thêm Di cư"});
        });
       form_dicu.close();
    });
    xoadicu();suadicu();
}

function suadicu(){
    var form_dicu = $("#dialog_dicu").data("dialog");
    var link_edit = ''; 
    $(".suadicu").click(function(){
        link_edit = $(this).attr("href");
        $("#insert_dicu").hide(); $("#edit_dicu").show();
        form_dicu.open();$(".select2").select2();
        $.getJSON(link_edit, function(data_edit){
            $("#id_dicu").val(data_edit.id_dicu);
            $("#id_quocgia_dicu").select2("val", data_edit.id_quocgia);
            $("#ngaydicu").val(data_edit.ngaydicu);
            $("#id_diendicu").select2("val", data_edit.id_diendicu);
        });
    });
}
function xoadicu(){
    var delete_child_dialog = $("#confirm_delete_child").data("dialog"); var link; var _this;
    $(".xoadicu").click(function(){
        link = $(this).attr("href");
        _this = $(this);
        delete_child_dialog.open(); 
    });
    $("#delete_child_ok").click(function(){
        $.ajax({
            type: "GET", url: link,
            success: function(data){
                _this.parents("tr.items").fadeOut();
                delete_child_dialog.close();
            },      
        }).fail(function() {
            $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể xoá."});
        });

    });
    $("#delete_child_no").click(function(){
        delete_child_dialog.close();
    });
}

function dinhcu(){
    var form_dinhcu = $("#dialog_dinhcu").data("dialog");
    $("#add_dinhcu").click(function(){
        form_dinhcu.open();$(".select2").select2();$("#tab_dinhcu").click();
        $("#insert_dinhcu").show(); $("#edit_dinhcu").hide(); $("#id_dinhcu").val('');
    });

    //$("#xoangaynhaptich").click(function(){ $("#ngaynhaptich").val(""); });
    $("#cancel_dinhcu").click(function(){ form_dinhcu.close(); });
    $("#insert_dinhcu").click(function(){
        $.ajax({
            type: "POST",
            url: "post.themdinhcu.php",
            data: $("#dinhcuform").serialize(),
            success: function(datas) {
                if(datas=='Failed'){
                    $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể Thêm Định cư"});
                } else {
                    $("#dinhcu_list tbody").append(datas); xoadinhcu();suadinhcu();
                }
           }
        }).fail(function() {
            $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể Thêm Định cư"});
        });
       form_dinhcu.close();
    });

    $("#edit_dinhcu").click(function(){
        var id_dinhcu = $("#id_dinhcu").val();
        $.ajax({
            type: "POST",
            url: "post.themdinhcu.php",
            data: $("#dinhcuform").serialize(),
            success: function(datas) {
                if(datas=='Failed'){
                    $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể sửa Định cư"});
                } else {
                    //$("#dinhcu_list tbody").append(datas); 
                    $("#dinhcu_list tr." + id_dinhcu).replaceWith(datas);xoadinhcu();suadinhcu();
                }
           }
        }).fail(function() {
            $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể sửa Định cư"});
        });
       form_dinhcu.close();
    });
    xoadinhcu();suadinhcu();
}

function suadinhcu(){
    var form_dinhcu = $("#dialog_dinhcu").data("dialog");
    var link_edit = ''; 
    $(".suadinhcu").click(function(){
        link_edit = $(this).attr("href");
        $("#insert_dinhcu").hide(); $("#edit_dinhcu").show();
        form_dinhcu.open();$(".select2").select2();
        $.getJSON(link_edit, function(data_edit){
            $("#id_dinhcu").val(data_edit.id_dinhcu);
            $("#id_quocgia_dinhcu").select2("val", data_edit.id_quocgia);
            $("#ngaynhaptich").val(data_edit.ngaynhaptich);
        });
    });
}
function xoadinhcu(){
    var delete_child_dialog = $("#confirm_delete_child").data("dialog"); var link; var _this;
    $(".xoadinhcu").click(function(){
        link = $(this).attr("href");
        _this = $(this);
        delete_child_dialog.open(); 
    });
    $("#delete_child_ok").click(function(){
        $.ajax({
            type: "GET", url: link,
            success: function(data){
                _this.parents("tr.items").fadeOut();
                delete_child_dialog.close();
            },      
        }).fail(function() {
            $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể xoá."});
        });

    });
    $("#delete_child_no").click(function(){
        delete_child_dialog.close();
    });
}

function trithuc(){
    var form_trithuc = $("#dialog_trithuc").data("dialog");
    $("#add_trithuc").click(function(){
        form_trithuc.open();$(".select2").select2();$("#tab_trithuc").click();
        $("#edit_trithuc").hide(); $("#insert_trithuc").show();$("#id_trithuc").val('');
    }); 
    $("#cancel_trithuc").click(function(){ form_trithuc.close(); });
    $("#insert_trithuc").click(function(){
        $.ajax({
            type: "POST",
            url: "post.themtrithuc.php",
            data: $("#trithucform").serialize(),
            success: function(datas) {
                if(datas=='Failed'){
                    $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể thêm Trí thức"});
                } else {
                    $("#trithuc_list tbody").append(datas); xoatrithuc();suatrithuc();
                }
           }
        }).fail(function() {
            $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể thêm Trí thức"});
        });
        form_trithuc.close();
    });

    $("#edit_trithuc").click(function(){
        var id_trithuc = $("#id_trithuc").val();
        $.ajax({
            type: "POST",
            url: "post.themtrithuc.php",
            data: $("#trithucform").serialize(),
            success: function(datas) {
                if(datas=='Failed'){
                    $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể thêm Trí thức"});
                } else {
                    $("#trithuc_list tr." + id_trithuc).replaceWith(datas);xoatrithuc();suatrithuc();
                }
           }
        }).fail(function() {
            $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể thêm Trí thức"});
        });
        form_trithuc.close();
    });
    xoatrithuc();suatrithuc();
}

function suatrithuc(){
    var form_trithuc = $("#dialog_trithuc").data("dialog");
    var link_edit = ''; 
    $(".suatrithuc").click(function(){
        link_edit = $(this).attr("href");
        $("#insert_trithuc").hide(); $("#edit_trithuc").show();
        form_trithuc.open();$(".select2").select2();
        $.getJSON(link_edit, function(data_edit){
            $("#id_trithuc").val(data_edit.id_trithuc);
            $("#id_nganhhoc_trithuc").select2("val",data_edit.id_nganhhoc);
            $("#thoigianbatdau_trithuc").val(data_edit.thoigianbatdau);
            $("#thoigianketthuc_trithuc").val(data_edit.thoigianketthuc);
            $("#noidunglamviec").val(data_edit.noidunglamviec);
        });
    });
}

function xoatrithuc(){
    var delete_child_dialog = $("#confirm_delete_child").data("dialog"); var link; var _this;
    $(".xoatrithuc").click(function(){
        link = $(this).attr("href");
        _this = $(this);
        delete_child_dialog.open(); 
    });
    $("#delete_child_ok").click(function(){
        $.ajax({
            type: "GET", url: link,
            success: function(data){
                _this.parents("tr.items").fadeOut();
                delete_child_dialog.close();
            },      
        }).fail(function() {
            $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể xoá."});
        });

    });
    $("#delete_child_no").click(function(){
        delete_child_dialog.close();
    });
}

function doanhnhan(){
    var form_doanhnhan = $("#dialog_doanhnhan").data("dialog");
    $("#sotien").number( true, 0, ',', '.');
    $("#tygia").number( true, 2, ',', '.');
    $("#VND").number( true, 2, ',', '.');
    $("#add_doanhnhan").click(function(){
        form_doanhnhan.open();$(".select2").select2();$("#tab_doanhnhan").click();
        $("#insert_doanhnhan").show();$("#edit_doanhnhan").hide(); $("#id_doanhnhan").val('');
        $(".tinhtien").change(function(){
            var vnd = $("#sotien").val() * $("#tygia").val();
            $("#VND").val(vnd);
        });
    }); 

    $("#cancel_doanhnhan").click(function(){
        form_doanhnhan.close();
    });

    $("#insert_doanhnhan").click(function(){
        $.ajax({
            type: "POST",
            url: "post.themdoanhnhan.php",
            data: $("#doanhnhanform").serialize(),
            success: function(datas) {
                if(datas=='Failed'){
                    $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể thêm Doanh nhân"});
                } else {
                    $("#doanhnhan_list tbody").append(datas); xoadoanhnhan();suadoanhnhan();
                }
           }
        }).fail(function() {
            $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể thêm Doanh nhân"});
        });
        form_doanhnhan.close();
    });

    $("#edit_doanhnhan").click(function(){
        var id_doanhnhan = $("#id_doanhnhan").val();
        $.ajax({
            type: "POST",
            url: "post.themdoanhnhan.php",
            data: $("#doanhnhanform").serialize(),
            success: function(datas) {
                if(datas=='Failed'){
                    $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể sủa Doanh nhân"});
                } else {
                    $("#doanhnhan_list tr." + id_doanhnhan).replaceWith(datas); xoadoanhnhan();suadoanhnhan();
                }
           }
        }).fail(function() {
            $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể sửa Doanh nhân"});
        });
        form_doanhnhan.close();
    });
    xoadoanhnhan();suadoanhnhan();
}

function suadoanhnhan(){
   var form_doanhnhan = $("#dialog_doanhnhan").data("dialog");
    var link_edit = ''; 
    $(".suadoanhnhan").click(function(){
        link_edit = $(this).attr("href");
        $("#insert_doanhnhan").hide(); $("#edit_doanhnhan").show();
        form_doanhnhan.open();$(".select2").select2();
        $(".tinhtien").change(function(){
            var vnd = $("#sotien").val() * $("#tygia").val();
            $("#VND").val(vnd);
        });
        $.getJSON(link_edit, function(data_edit){
            $("#id_doanhnhan").val(data_edit.id_doanhnhan);
            $("#id_doanhnghiep").select2("val",data_edit.id_doanhnghiep);
            $("#chucvu").val(data_edit.chucvu);
            $("#donvitien").select2("val", data_edit.donvitien);
            $("#sotien").val(data_edit.sotien);
            $("#tygia").val(data_edit.tygia);
            $("#VND").val(data_edit.VND);
        });
    });
}

function xoadoanhnhan(){
    var delete_child_dialog = $("#confirm_delete_child").data("dialog"); var link; var _this;
    $(".xoadoanhnhan").click(function(){
        link = $(this).attr("href");
        _this = $(this);
        delete_child_dialog.open(); 
    });
    $("#delete_child_ok").click(function(){
        $.ajax({
            type: "GET", url: link,
            success: function(data){
                _this.parents("tr.items").fadeOut();
                delete_child_dialog.close();
            },      
        }).fail(function() {
            $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể xoá."});
        });

    });
    $("#delete_child_no").click(function(){
        delete_child_dialog.close();
    });
}

function giadinh(){
    var form_giadinh = $("#dialog_giadinh").data("dialog");
    $("#add_giadinh").click(function(){
        form_giadinh.open(); $("#tab_giadinh").click();
        $("#insert_giadinh").show();$("#edit_giadinh").hide();$("#id_giadinh").val('');
        $("#id_congdanquanhe").removeAttr('disabled');
        $("#id_congdanquanhe").select2({
            ajax: {
                url: "get.danhsachcongdannuocngoai.php",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function (markup) { return markup; },
            minimumInputLength: 1,
            templateResult: formatRepo,
            templateSelection: formatRepoSelection,
            placeholder: "Thông tin thành viên gia đình"
        });
    });       
    $("#cancel_giadinh").click(function(){ form_giadinh.close();});
    $("#insert_giadinh").click(function(){
        if($("#quanhegiadinh1").val() =='' || $("#quanhegiadinh2").val() =='' || $("#id_congdanquanhe").val() == ''){
            alert('Chọn thành viên và nhập tên quan hệ gia đình!');
            return false;
        } else {
            $.ajax({
                type: "POST",
                url: "post.themgiadinh.php",
                data: $("#giadinhform").serialize(),
                success: function(datas) {
                    if(datas=='Failed'){
                        $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể Thêm Quan hệ gia đình"});
                    } else {
                        $("#giadinh_list tbody").append(datas); xoagiadinh();suagiadinh();
                    }
               }
            }).fail(function() {
                $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể Thêm Quan hệ Gia đình"});
            });
           form_giadinh.close();
        }
    });

    $("#edit_giadinh").click(function(){
        var id_giadinh = $("#id_giadinh").val();
        $.ajax({
            type: "POST",
            url: "post.themgiadinh.php",
            data: $("#giadinhform").serialize(),
            success: function(datas) {
                if(datas=='Failed'){
                    $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể Quan hệ gia đình"});
                } else {
                    $("#giadinh_list tr." + id_giadinh).replaceWith(datas);xoagiadinh();suagiadinh();
                }
           }
        }).fail(function() {
            $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể Thêm Quan hệ gia đình"});
        });
       form_giadinh.close();
    });
    xoagiadinh();suagiadinh();
}

function suagiadinh(){
    var form_giadinh = $("#dialog_giadinh").data("dialog");
    var link_edit = ''; 
    $(".suagiadinh").click(function(){
        link_edit = $(this).attr("href");
        $("#insert_giadinh").hide(); $("#edit_giadinh").show();
        form_giadinh.open(); 
        //$(".select2").select2();
        $.getJSON(link_edit, function(data_edit){
            $("#id_giadinh").val(data_edit.id_giadinh);
            $("#id_congdanquanhe").html('<option value="'+data_edit.id_congdanquanhe+'" selected>'+data_edit.text+'</option>');
            $("#quanhegiadinh1").val(data_edit.quanhegiadinh1);
            $("#quanhegiadinh2").val(data_edit.quanhegiadinh2);
        });
    });
}
function xoagiadinh(){
    var delete_child_dialog = $("#confirm_delete_child").data("dialog"); var link; var _this;
    $(".xoagiadinh").click(function(){
        link = $(this).attr("href");
        _this = $(this);
        delete_child_dialog.open(); 
    });
    $("#delete_child_ok").click(function(){
        $.ajax({
            type: "GET", url: link,
            success: function(data){
                _this.parents("tr.items").fadeOut();
                delete_child_dialog.close();
            },      
        }).fail(function() {
            $.Notify({type: 'alert', caption: 'Thông báo', content: "Không thể xoá."});
        });

    });
    $("#delete_child_no").click(function(){
        delete_child_dialog.close();
    });
}