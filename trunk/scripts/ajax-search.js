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
                if(dto.trim() != "")
                    $(".grid").html(dto);
                else
                    $(".grid").html('<span class="mess-no-result">* Not found result matched. Please input another keyword !</span>');
                
            }
        });
    });
});