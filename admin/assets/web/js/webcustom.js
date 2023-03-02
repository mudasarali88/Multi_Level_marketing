function getCategoriesID(base_url, ID)
{
    $.blockUI();
    $.ajax({
        type: "post",
        url: base_url + "categories/getsubByCategoriesID",
        data: {"ID": ID},
        dataType: "json",
        success: function (data) {
            $("#subcat_ID").html();
            $("#subcat_ID").html("<option value=''>Select Sub Category</option>");
            for (i = 0; i < data.length; i++) {
                $("#subcat_ID").append("<option value='" + data[i].ID + "'>" + data[i].subcat_title + "</option>");
            }
            $.unblockUI();
        },
        error: function () {
            $.unblockUI();
            alert("Error occurred.");

        }
    });
}
function getStatesWithCountry($type) {

    if ($type == 1) {
        $countryList = $('#country_2').val();
        $('#states_2').html('');
        $('#city_2').html('');
    } else {
        $countryList = $('#country').val();
        $("#states").append('<option value="">Select State</option>');
        $('#city').html('');
        $("#city").append('<option value="">Select City</option>');
    }

    if ($countryList != '' && $countryList != null) {
        $.ajax({
            type: "post",
            url: base_url + "ads/getStatesWithCountry",
            data: {"country": $countryList, "type": $type},
            success: function (data) {
                if (data.length > 0) {
                    var response = JSON.parse(data);
                    var statesLen = response.length;
                    if (statesLen > 0) {
                        if ($type == 1) {
                            $('#states_2').val(null).trigger('change');
                        } else {
                            $('#states').html('');
                            $("#states").append('<option value="">Select State</option>');
                        }
                        for (i = 0; i < statesLen; i++) {
                            if ($type == 1) {
                                $("#states_2").append('<option value="' + response[i].id + '">' + response[i].name + '</option>');
                            }
                            else {
                                $("#states").append('<option value="' + response[i].id + '">' + response[i].name + '</option>');
                            }
                        }
                    }
                }
            },
            error: function () {
                alert("please try again");
            }
        });
    }
}
function getCitiesWithStates($type) {

    if ($type == 1) {
        $stateList = $('#states_2').val();
        $('#city_2').html('');
    } else {
        $stateList = $('#states').val();
        $('#city').html('');
        $("#city").append('<option value="">Select City</option>');
    }

    if ($stateList != '' && $stateList != null) {
        $.ajax({
            type: "post",
            url: base_url + "ads/getCitiesWithStates",
            data: {"states": $stateList, "type": $type},
            success: function (data) {
                if (data.length > 0) {
                    var response = JSON.parse(data);
                    var citiesLen = response.length;
                    if (citiesLen > 0) {
                        if ($type == 1) {
                            $('#city_2').val(null).trigger('change');
                        } else {
                            $('#city').html('');
                            $("#city").append('<option value="">Select City</option>');
                        }
                        for (i = 0; i < citiesLen; i++) {
                            if ($type == 1) {
                                $("#city_2").append('<option value="' + response[i].id + '">' + response[i].name + '</option>');
                            } else {
                                $("#city").append('<option value="' + response[i].id + '">' + response[i].name + '</option>');
                            }
                        }
                    }
                }
                else {
                    $('#city').html('');
                    $("#city").append('<option value="">Select City</option>');
                }
            },
            error: function () {
                alert("please try again");
            }
        });
    }
}
function checkImageContent(flag) {

    if (flag == 2) {
        img_2 = $("#image_2").val();
        if (img_2 != '') {
            $("#video_2").attr("disabled", "disabled");
        } else {
            $("#video_2").attr("disabled", false);
        }
    }
    if (flag == 3) {
        img_3 = $("#image_3").val();
        if (img_3 != '') {
            $("#video_3").attr("disabled", "disabled");
        } else {
            $("#video_3").attr("disabled", false);
        }
    }
    if (flag == 4) {
        img_4 = $("#image_4").val();
        if (img_4 != '') {
            $("#video_4").attr("disabled", "disabled");
        } else {
            $("#video_4").attr("disabled", false);
        }
    }
    if (flag == 5) {
        img_5 = $("#image_5").val();
        if (img_5 != '') {
            $("#video_5").attr("disabled", "disabled");
        } else {
            $("#video_5").attr("disabled", false);
        }
    }

}
function checkLinkContent(flag) {

    if (flag == 2) {
        vid_2 = $("#video_2").val();
        if (vid_2 != '') {
            $("#image_2").attr("disabled", "disabled");
        } else {
            $("#image_2").attr("disabled", false);
        }
    }
    if (flag == 3) {
        vid_3 = $("#video_3").val();
        if (vid_3 != '') {
            $("#image_3").attr("disabled", "disabled");
        } else {
            $("#image_3").attr("disabled", false);
        }
    }
    if (flag == 4) {
        vid_4 = $("#video_4").val();
        if (vid_4 != '') {
            $("#image_4").attr("disabled", "disabled");
        } else {
            $("#image_4").attr("disabled", false);
        }
    }
    if (flag == 5) {
        vid_5 = $("#video_5").val();
        if (vid_5 != '') {
            $("#image_5").attr("disabled", "disabled");
        } else {
            $("#image_5").attr("disabled", false);
        }
    }

}
function resetForm() {
    $("#video_2").attr("disabled", false);
    $("#video_3").attr("disabled", false);
    $("#video_4").attr("disabled", false);
    $("#video_5").attr("disabled", false);

    $("#image_1").attr("disabled", false);
    $("#image_2").attr("disabled", false);
    $("#image_3").attr("disabled", false);
    $("#image_4").attr("disabled", false);
    $("#image_5").attr("disabled", false);

}
function checkYoutubeLink(string) {
    if (string.indexOf('youtube') > -1)
        return true;
    else
        return false;
}
$('#adsForm_submit_user').submit(function (event) {


    var response_2 = 0;
    var response_3 = 0;
    var response_4 = 0;
    var response_5 = 0;

    var con_2 = 1;
    var con_3 = 1;
    var con_4 = 1;
    var con_5 = 1;


    var vid2 = $("#video_2").val();
    if (vid2 != '') {
        response_2 = checkYoutubeLink(vid2);
        if (response_2 == 1)
            con_2 = 1;
        else {
            alert("Please add youtube link");
            return false;
        }
    }
    var vid3 = $("#video_3").val();
    if (vid3 != '') {
        response_3 = checkYoutubeLink(vid3);
        if (response_3 == 1)
            con_3 = 1;
        else {
            alert("Please add youtube link");
            return false;
        }
    }
    var vid4 = $("#video_4").val();
    if (vid4 != '') {
        response_4 = checkYoutubeLink(vid4);
        if (response_4 == 1)
            con_4 = 1;
        else {
            alert("Please add youtube link");
            return false;
        }
    }
    var vid5 = $("#video_5").val();
    if (vid5 != '') {
        response_5 = checkYoutubeLink(vid5);
        if (response_5 == 1)
            con_5 = 1;
        else {
            alert("Please add youtube link");
            return false;
        }
    }

});
function changesStatue(ID)
{
    sure = confirm('Are you sure ?');
    if (sure) {
        $status = $("#status" + ID).val();
        $.blockUI();
        $.ajax({
            type: "post",
            url: base_url + "ads/changesStatue",
            data: {"ID": ID, "status": $status},
            success: function (data) {
                $.unblockUI();
                location.reload();
            },
            error: function () {
                $.unblockUI();
                $('html,body').animate({scrollTop: 0}, '500');
                $(".message").show().html("<div class='alert alert-danger'>Error occurred.</div>");
                setTimeout(function () {
                    $(".message").fadeOut('200');
                }, 3000);
            }
        });
    }
}
function deleteadd(ID)
{
    sure = confirm('Are you sure ?');
    if (sure) {
        $.blockUI();
        $.ajax({
            type: "post",
            url: base_url + "ads/deleteAdd",
            data: {"ID": ID},
            success: function (data) {
                $.unblockUI();
                $("#row_" + ID).remove();
                $('html,body').animate({scrollTop: 0}, '500');
                $(".message").show().html(data);
                setTimeout(function () {
                    $(".message").fadeOut('200');
                }, 3000);
            },
            error: function () {
                $.unblockUI();
                $('html,body').animate({scrollTop: 0}, '500');
                $(".message").show().html("<div class='alert alert-danger'>Error occurred.</div>");
                setTimeout(function () {
                    $(".message").fadeOut('200');
                }, 3000);
            }
        });
    }
}

