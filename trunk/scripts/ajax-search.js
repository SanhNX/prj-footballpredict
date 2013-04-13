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
                if (dto.trim() != "")
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