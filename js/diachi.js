function suadiachi(){
	$(".suadiachi").click(function(){
		var dialog = $("#dialog_suadiachi").data('dialog');
		dialog.open();
		$.get($(this).attr("href"), function(data){
			$("#content_dialog").html(data); $(".diachi").select2();$("input[type='text']").toCapitalize(); 
			$("#update_diachi").click(function(){
				$.ajax({
		        	type: "POST",
		           	url: "post.suadiachi.php",
		           	data: $("#suadiachiform").serialize(),
		           	success: function(data) {
		           		var d = $.parseJSON(data);
		           		//$.Notify({type: 'alert', caption: 'Thông báo', content: d.text });
		           		window.location = "?id_root=" + d.id_root + "&update=" + d.update + "&id2=" + d.id2 + "&id3="+d.id3+"&id4="+d.id4;
		           	}
		        }).fail(function() {
					$.Notify({type: 'alert', caption: 'Thông báo', content: "Cập nhật thất bại"});
			    });
				dialog.close();
				return false;
			});
			$("#delete_diachi").click(function(){
				var delete_dialog = $("#dialog_delete").data('dialog');
				delete_dialog.open();
				$("#delete_no").click(function(){
					delete_dialog.close();
				});
				$("#delete_ok").click(function(){
					delete_dialog.close(); dialog.close();
					$.ajax({
						type: "POST",
						url: "post.suadiachi.php",
						data: $("#xoadiachiform").serialize(),
						success: function(data){
							var d = $.parseJSON(data);
							if(d.update == 'no'){
								$.Notify({type: 'alert', caption: 'Thông báo', content: 'Không thể xoá.' });
							} else {
								window.location = "?id_root=" + d.id_root + "&update=" + d.update + "&id2=" + d.id2 + "&id3="+d.id3+"&id4="+d.id4;	
							}
							//$.Notify({type: 'alert', caption: 'Thông báo', content: data });
							//window.location.href += "?mypara";
		           			//location.reload();
						}
					}).fail(function(){
						$.Notify({type: 'alert', caption: 'Thông báo', content: "Xoá thất bại"});
					});
				});
			});
		});
	});
}

function themdiachi(){
	$(".themdiachi").click(function(){
		var dialog = $("#dialog_themdiachi").data('dialog');
		dialog.open();
		$.get($(this).attr("href"), function(data){
			$("#content_dialog_themdiachi").html(data);
			$("#update_themdiachi").click(function(){
				if($("#tendiachithem").val()==''){
					alert('Hãy nhập tên địa chỉ');
				} else {
					$.ajax({
			        	type: "POST",
			           	url: "post.suadiachi.php",
			           	data: $("#themdiachiform").serialize(),
			           	success: function(data) {
			           		var d = $.parseJSON(data);
			           		window.location = "?id_root=" + d.id_root + "&update=" + d.update + "&id2=" + d.id2 + "&id3="+d.id3+"&id4="+d.id4;
			           	}
			        }).fail(function() {
						$.Notify({type: 'alert', caption: 'Thông báo', content: "Cập nhật thất bại"});
				    });
					dialog.close(); return false;
				}
			});
		});
	});
}