$(document).ready(function() {
    $('#btn-create-group').on('click', function(e) {
        var gName = $("#txtgroupname").val();
        var gDescription = $("#txtgroupdescription").val();
        var uploadfile = ($("#uploadfile").val() === '') ? 'images/icon/default-pool-avt-bg.png' : $("#uploadfile").val();
        var isprivate = document.getElementById("popup-input-pool-check").checked ? 1:0;
        var str_string = 'txtgroupname=' + gName + '&txtgroupdescription=' + gDescription + '&uploadfile=' + uploadfile + '&isprivate=' + isprivate;

        if (gName === "" || gName > 10) {
            $("#txtgroupname").focus();
            $(".create-group-error-mess").html('<i></i> Group name can not blank and must be less than 10 character !');
            return false;
        }
        else if (gDescription === "") {
            $("#txtgroupdescription").focus();
            $(".create-group-error-mess").html('<i></i> Description can not blank !');
            return false;
        }else {
            $(".create-group-error-mess").html('<i></i> Processes running ............');
            $(".create-loading-spin").removeClass("undisplayed");
            $.ajax({
                type: "POST",
                url: "./BLL/create-groupBll.php",
                data: str_string,
                cache: false,
                success: function(dto) {
                    setTimeout(function() {
                        if (dto === 'success') {
                            $(".create-group-error-mess").html('<i></i> CREATE SUCCESSFULL. Please wait a minutes to return page.');
                            setTimeout(function() {
                                $(".create-loading-spin").addClass("undisplayed");
                                $(".create-group-error-mess").html('');
                                closeCreGroup();
                                location.reload();
                            }, 2000);
                            return false;
                        }
                        if (dto === 'fail') {
                            $("#txtgroupname").focus();
                            $(".create-group-error-mess").html('<i></i> This action has been interrupted. Please try again !');
                            $(".create-loading-spin").addClass("undisplayed");
                            return false;
                        }
                    }, 3000);
                }
            });
        }

        return false;
    });
});
