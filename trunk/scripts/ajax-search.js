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
            dto = dto.trim();
            if (dto == "true")
                location.reload();
            else
                $(".join-error").html('<i></i> You only allowed to join the 3 groups because this action had been interrupted !');
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
                dto = dto.trim();
                if (dto == "true")
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