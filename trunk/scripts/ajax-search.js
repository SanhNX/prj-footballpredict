$(document).ready(function() {
    $('#txtSearch').keyup(function() {
        var keyword = $("#txtSearch").val();
        var str_string = 'keyword=' + keyword;
        $.ajax({
            type: "POST",
            url: "./BLL/search-pool.php",
            data: str_string,
            cache: false,
            success: function(dto) {

                $(".grid").html('');
                if ($.trim(dto) !== "")
                    $(".grid").html(dto);
                else
                    $(".grid").html('<span class="mess-no-result">* Not found result matched. Please input another keyword !</span>');
            }
        });
    });
});
function joingroup($clubId, $userId) {
    var str_string = 'clubId=' + $clubId + '&userId=' + $userId;
    $.ajax({
        type: "POST",
        url: "./BLL/join-groupBll.php",
        data: str_string,
        cache: false,
        success: function(dto) {
            dto = trim(dto);
            if (dto === "true"){
                $('body,html').animate({
                    scrollTop: 0
                }, 800);
                setTimeout(function(){location.reload();}, 800);
            }
            else {
                $('body,html').animate({
                    scrollTop: 250
                }, 800);
                $(".join-error").html('<i></i> You only allowed to join the 4 groups because this action had been interrupted !');
            }
        }
    });
}
function leavegroup($clubId, $userId) {
    var str_string = 'clubId=' + $clubId + '&userId=' + $userId;
    var r = confirm("Do you want to leave this group ?");
    if (r == true)
    {
        $.ajax({
            type: "POST",
            url: "./BLL/leave-groupBll.php",
            data: str_string,
            cache: false,
            success: function(dto) {
                dto = trim(dto);
                if (dto === "true")
                    redirect('pool.php');
                else
                    $(".detail-group-error").html('<i></i> This action had been interrupted !');
            }
        });
    }
    else
    {
//            alert("You pressed Cancel!")
    }

}
function LTrim(value) {
    var re = /\s*((\S+\s*)*)/;
    return value.replace(re, "$1");
}
// Hàm cắt ký tự trắng ở cuối chuỗi
function RTrim(value) {
    var re = /((\s*\S+)*)\s*/;
    return value.replace(re, "$1");
}
// Cắt các ký tự trắng ở đầu và cuối chuỗi
function trim(value) {
    return LTrim(RTrim(value));
}