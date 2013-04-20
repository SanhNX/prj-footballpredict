/**
 * Created with IntelliJ IDEA.
 * User: hl
 * Date: 4/4/13
 * Time: 10:55 PM
 * To change this template use File | Settings | File Templates.
 */


$(function() {

    $('#expand-login-btn').click(function() {
        openLogin();
    });

    $('#popup-btn-login-close').click(function() {
        closeLogin(null);
    });
    $('#popup-btn-register-close').click(function() {
        closeRegis(null);
    });

    $('#btn-expand-register').click(function() {
        closeLogin(function() {
            openRegis();
        });
    });

    $('#create-group-btn').click(function() {
        openCreGroup();
    });

    $('#popup-btn-create-group-close').click(function() {
        closeCreGroup(null);
    });

    $(".removeimg").click(function() {
        $("#thumbimage").attr('src', 'images/icon/default-pool-avt-bg.png');
        $(".file").val('');
        $(".removeimg").hide();
    });

    $('#profile-label').click(function() {
        var r = confirm("Are you sure logout?");
        if (r == true)
        {
            $.post("logout.php", function(data) {
                alert("Logout Success !");
                window.location = data;
                location.reload();
            });
        }
        else
        {
//            alert("You pressed Cancel!")
        }
    });

});
function openLogin() {
    $('#login-popup').removeClass('undisplayed');
    $('#login-popup').css({opacity: 0}).animate({opacity: 1}, 500);
    $('#login-popup').children('.popup-container').css({marginTop: -100, opacity: 0.5}).animate({marginTop: 100, opacity: 1}, 500);
}
function closeLogin(callback) {
    $('#login-popup').children('.popup-container').animate({marginTop: -100, opacity: 0}, 250);
    $('#login-popup').animate({opacity: 1}, 250, function() {
        $('#login-popup').addClass('undisplayed');
        if (callback)
            callback();
    });
}
function openRegis() {
    $('#register-popup').removeClass('undisplayed');
    $('#register-popup').css({opacity: 0}).animate({opacity: 1}, 500);
    $('#register-popup').children('.popup-container').css({marginTop: -100, opacity: 0.5}).animate({marginTop: 100, opacity: 1}, 500);
}
function closeRegis(callback) {
    $('#register-popup').children('.popup-container').animate({marginTop: -100, opacity: 0}, 250);
    $('#register-popup').animate({opacity: 1}, 250, function() {
        $('#register-popup').addClass('undisplayed');
        if (callback)
            callback();
    });
}
function openCreGroup() {
    $('#create-group-popup').removeClass('undisplayed');
    $('#create-group-popup').css({opacity: 0}).animate({opacity: 1}, 500);
    $('#create-group-popup').children('.popup-container').css({marginTop: -100, opacity: 0.5}).animate({marginTop: 100, opacity: 1}, 500);
}
function closeCreGroup(callback) {
    $('#create-group-popup').children('.popup-container').animate({marginTop: -100, opacity: 0}, 250);
    $('#create-group-popup').animate({opacity: 1}, 250, function() {
        $('#create-group-popup').addClass('undisplayed');
        if (callback)
            callback();
    });
}
function readURL(input, thumbimage) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $("#thumbimage").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        $("#thumbimage").show();
    }
    else {
        $("#thumbimage").attr('src', input.value);
        $("#thumbimage").show();
    }
    $(".removeimg").show();
}
function redirect($url) {
    window.location = $url;
}

