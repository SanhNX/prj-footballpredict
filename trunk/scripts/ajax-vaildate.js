//$("#submit").live('click', function()
//{
//    var name = $("#name").val();
//    var url = $("#url").val();
//    var str_string = 'name=' + name + '&url=' + url;
//    $.ajax({
//        type: "POST",
//        url: "excute.php",
//        data: str_string,
//        cache: false,
//        success: function(html) {
//            //    alert('Truyền dữ liệu thành công!');
//            $("#html").html(html);
//        }
//    });
//    //    alert('Submit clicked! '+name);    
//
//    return false;
//});

$(document).ready(function() {
    $('#btn-register').on('click', function(e) {
        var email = $("#email").val();
        var cemail = $("#cemail").val();
        var pass = $("#pass").val();
        var cpass = $("#cpass").val();
        var name = $("#name").val();
        var email_regex = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;

        if (name === "") {
//        $("#name").slideToggle('slow');
            $("#name").focus();
            $(".popup-error-mess").html('<i></i> FullName can not blank !');
            return false;
        }
        else if (!email_regex.test(email) || email === "") {
            $("#email").focus();
            $(".popup-error-mess").html('<i></i> Email can not blank and must be valid');
            return false;
        }
        else if (email_regex.test(email)) {
            var str_string_email = 'email=' + email;
            $.ajax({
                type: "POST",
                url: "./BLL/checkemailexistBll.php",
                data: str_string_email,
                async: false,
                cache: false,
                success: function(dto) {
                    if (dto === 'exist') {
                        $("#email").focus();
                        $(".popup-error-mess").html('<i></i> Email is existing. Please choose another email !');
                        return false;
                    }
                    else {
                        if (email !== cemail) {
                            $("#cemail").focus();
                            $(".popup-error-mess").html('<i></i> Confirm Email must be similar with Email');
                            return false;
                        }
                        else if (pass === "" || pass < 8) {
                            $("#pass").focus();
                            $(".popup-error-mess").html('<i></i> Password can not blank and larger than 8 character');
                            return false;
                        }
                        else if (cpass === "" || pass !== cpass) {
                            $("#cpass").focus();
                            $(".popup-error-mess").html('<i></i> Confirn Password can not blank and similar with Password');
                            return false;
                        }
                        else {
                            $(".popup-error-mess").html('');
                            $(".loading-spin").removeClass("undisplayed");
                        }
                    }
                }
            });
        }
        var str_string = 'email=' + email + '&cemail=' + cemail + '&cpass=' + cpass + '&pass=' + pass + '&name=' + name;
        $.ajax({
            type: "POST",
            url: "./BLL/registerBll.php",
            data: str_string,
            cache: false,
            success: function(dto_res) {
                setTimeout(function() {
                    $(".loading-spin").addClass("undisplayed");
                    if (dto_res === 'true')
                        alert('Register success !');
                    if (dto_res === 'fail')
                        alert('Register Fail !');
                }, 5000);
            }
        });
        return false;
    });
});