/*
$(window).keypress(function(event) {
	if (!(event.which == 115 && event.ctrlKey) && !(event.which == 19)) return true;
	$("#themdicuform input[name=submit]").click();
    event.preventDefault();
    return false;
});*/

/*$.ctrl = function(key, callback, args) {
    $(document).keydown(function(e) {
        if(!args) args=[]; // IE barks when args is null 
        if(e.keyCode == key.charCodeAt(0) && e.ctrlKey) {
            callback.apply(this, args);
            return false;
        }
    });        
};*/

function ctrl_key(formname){
   /* $(window).keypress(function(event) {
        if (!(event.which == 115 && event.ctrlKey) && !(event.which == 19)) return true;
        $("#"+formname+" input[name=submit]").click();
        event.preventDefault();
        return false;
    });*/
    $(window).bind('keydown', function(event) {
        if (event.ctrlKey || event.metaKey) {
            switch (String.fromCharCode(event.which).toLowerCase()) {
                case 's':
                    $("#submit").click();
                    event.preventDefault();
                    return false;
                    break;
                case 'n':
                    var create_new = $("#create_new").attr("href");
                    window.location.href = create_new; 
                    event.preventDefault();
                    return false;
                    break;
                case 'f':
                    var search = $("#search").attr("href");
                    window.location.href = search; 
                    event.preventDefault();
                    return false;
                    break;
                case 'm':
                    var edit = $("#edit").attr("href");
                    if(edit && edit !="#") window.location.href = edit; 
                    else alert("Chưa chọn công dân chỉnh sửa");
                    event.preventDefault();
                    return false;
                    break;
            }
        }
    });
}

function hide_alert(){
    $(".alert").fadeOut();   
}
function hide_alert_login(){
    $(".alert_login").fadeOut();   
}
//setInterval(hide_alert, 3000);