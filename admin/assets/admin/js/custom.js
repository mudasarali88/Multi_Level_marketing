$(document).ready(function (e) {

    $("#forget_form").formValidation({
        framework: 'bootstrap',
        err: {
            container: 'tooltip'
        },
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter email'
                    },
                    emailAddress: {
                        message: 'This email address is not valid Emial Address'
                    }
                }
            }
        }
    }).on('success.form.fv', function (e) {
        // Prevent form submission
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            datatype: 'json',
            data: {email: $("#email").val()},
            success: function (data) {
                $(".message").show().html(data);
                $("#forget_form").data('formValidation').resetForm();
                $("#email").val('');
            },
            error: function () {
                $(".message").show().html("<div class='alert alert-danger'>Error occurred.</div>");
                setTimeout(function () {
                    $(".message").fadeOut('200');
                }, 10000);

            }
        });
    });


    $(document).on('click', '.my-image', function () {
        var imglink = $(this).attr('src');
        $('#img01').attr('src', imglink);
        $('#myModal').css('display', 'block');
    });
    $(document).on('click', '#myModal', function () {
        $('#myModal').css('display', 'none');
    });

    var handleDataTableFixedHeader = function () {
        "use strict";
        if ($('#data-table').length !== 0) {
            $('#data-table').DataTable({
                lengthMenu: [20, 40, 60],
                fixedHeader: {
                    header: true,
                    headerOffset: $('#header').height()
                },
                responsive: true
            });
        }
    };
    handleDataTableFixedHeader();

    $('#login_form').formValidation({
        framework: 'bootstrap',
        err: {
            container: 'tooltip'
        },
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter email'
                    },
                    emailAddress: {
                        message: 'This email address is not valid Emial Address'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter email'
                    }
                }
            }
        }
    });
    $('form').formValidation({
        framework: 'bootstrap',
        err: {
            container: 'tooltip'
        },
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            email: {
                validators: {
                    emailAddress: {
                        message: 'This email address is not valid Emial Address'
                    }
                }
            }
        }
    });

});
function deleteAdmin(base_url, ID, userType)
{
    sure = confirm('Are you sure ?');
    if (sure) {
        $.blockUI();
        $.ajax({
            type: "post",
            url: base_url + "admin/deleteAdmin",
            data: {"ID": ID, "userType": userType},
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

function deleteSlider(base_url, ID)
{
    sure = confirm('Are you sure ?');
    if (sure) {
        $.blockUI();
        $.ajax({
            type: "post",
            url: base_url + "admin/deleteSlider",
            data: {"id": ID},
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

function deleteCountries(base_url, ID)
{  
    sure = confirm('Are you sure ?');
    if (sure) {
        $.blockUI();
        $.ajax({
            type: "post",
            url: base_url + "country/deleteCountries",
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


function deleteCoupen(base_url, ID)
{  
    sure = confirm('Are you sure ?');
    if (sure) {
        $.blockUI();
        $.ajax({
            type: "post",
            url: base_url + "Coupen/deleteCoupen",
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


function deleteCity(base_url, ID)
{  
 // alert('this is del city function');
    sure = confirm('Are you sure ?');
    if (sure) {
        $.blockUI();
        $.ajax({
            type: "post",
            url: base_url + "country/deleteCity",
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




function deleteCategories(base_url, ID)
{  

    sure = confirm('Are you sure ?');
    if (sure) {
        $.blockUI();
        $.ajax({
            type: "post",
            url: base_url + "categories/deleteCategories",
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






function deleteStates(base_url, ID)
{
    
    sure = confirm('Are you sure ?');
    if (sure) {
        $.blockUI();
        $.ajax({
            type: "post",
            url: base_url + "country/deleteStates",
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


function deletesubCategories(base_url, ID)
{
    sure = confirm('Are you sure ?');
    if (sure) {
        $.blockUI();
        $.ajax({
            type: "post",
            url: base_url + "categories/deletesubCategories",
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

function deleteNewsletter(base_url, ID)
{
    sure = confirm('Are you sure ?');
    if (sure) {
        $.blockUI();
        $.ajax({
            type: "post",
            url: base_url + "newsletter/deleteNewsletter",
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

function deleteproduct(base_url, ID)
{
    sure = confirm('Are you sure ?');
    if (sure) {
        $.blockUI();
        $.ajax({
            type: "post",
            url: base_url + "product/deleteProduct",
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

function deletepost(base_url, ID) {
    sure = confirm('Are you sure ?');
    if (sure) {
        $.blockUI();
        $.ajax({
            type: "post",
            url: base_url + "blog/deletePost",
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


function getCategoriesID(base_url, ID)
{
    $.blockUI();
    $.ajax({
        type: "post",
        url: base_url + "E_categories/getsubByCategoriesID",
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

//login and forgot panel
function loginForgotPanel(panel) {
    if (panel == 'login') {
        $("#pass-panel").slideUp(500);
        $("#login-panel").slideDown(1000);
    } else {
        $("#login-panel").slideUp(500);
        $("#pass-panel").slideDown(1000);
    }
}
//////////////////////////////////////////////Ads module start///////////////////////////
function appendCountryCityBox() {
    var html = '';
    html += '<div class="form-group m-b-10 append_section_remove">';
    html += '<div class=" col-md-offset-2  text-danger"></div>';
    html += ' <label class="col-md-1 control-label">Select the origin</label>';
    html += '<div class="col-md-4">';
    html += '<input type="text" class="form-control" name="country_name[]" id="country_name[]" required="required" placeholder="Enter country name">';
    html += '</div>';
    html += '<div class="col-md-4">';
    html += '<input type="text" class="form-control" name="city_name[]" id="city_name[]" required="required" placeholder="Enter city name">';
    html += '</div>';
    html += '<div class="col-md-2">';
    html += '<button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button>';
    html += '</div>';
    $(".append_section").append(html);
}

$(document).on('click', '.remove', function () {
    $(this).closest('.append_section_remove').remove();
});

function split(val) {
    return val.split(/,\s*/);
}
function extractLast(term) {
    return split(term).pop();
}
function autoSuggest(check) {
    if (check == 1) {
        var method = 'getCountries';
        var selec = 'country';
    } else if (check == 2) {
        var method = 'getStates';
        var selec = 'states';
    } else {
        var method = 'getCities';
        var selec = 'city';
    }
    $("#" + selec).bind("keydown", function (event) {
        if (event.keyCode === $.ui.keyCode.TAB &&
                $(this).autocomplete("instance").menu.active) {
            event.preventDefault();
        }
    })


            .autocomplete({
                minLength: 4,
                source: function (request, response) {
                    // delegate back to autocomplete, but extract the last term
                    $.getJSON(base_url + "Ads/" + method, {term: extractLast(request.term)}, response);
                },
                focus: function () {
                    // prevent value inserted on focus
                    return false;
                },
                select: function (event, ui) {
                    var terms = split(this.value);
                    // remove the current input
                    terms.pop();
                    // add the selected item
                    terms.push(ui.item.value);
                    // add placeholder to get the comma-and-space at the end
                    terms.push("");
                    this.value = terms.join(", ");
                    return false;
                }
            });
}
function checkImageContent(flag) {
//    if (flag == 1) {
//        img_1 = $("#image_1").val();
//        if (img_1 != '') {
//            $("#video_1").attr("disabled", "disabled");
//        } else {
//            $("#video_1").attr("disabled", false);
//        }
//    }
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
//    if (flag == 5) {
//        $("#video_5").attr("disabled", "disabled");
//    }
}
function checkLinkContent(flag) {
//    if (flag == 1) {
//        vid_1 = $("#video_1").val();
//        if (vid_1 != '') {
//            $("#image_1").attr("disabled", "disabled");
//        } else {
//            $("#image_1").attr("disabled", false);
//        }
//    }
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

$('#adsForm_submit').submit(function (event) {


    var response_2 = 0;
    var response_3 = 0;
    var response_4 = 0;
    var response_5 = 0;

    var con_2 = 1;
    var con_3 = 1;
    var con_4 = 1;
    var con_5 = 1;

//    var vid1 = $("#video_1").val();
//    if (vid1 != '') {
//        response_1 = checkYoutubeLink(vid1);
//        if (response_1 == 1)
//            con_1 = 1;
//        else {
//            alert("Please add youtube link");
//            return false;
//        }
//    }
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
function getStatesWithCountry($type) {
    $countryList = $('#country').val();
    if ($type == 1) {
        $('#states').html('');
        $('#city').html('');
    } else {
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
                var response = JSON.parse(data);
                var statesLen = response.length;
                if (statesLen > 0) {
                    if ($type == 1) {
                        $('#states').val(null).trigger('change');
                    } else {
                        $('#states').html('');
                        $("#states").append('<option value="">Select State</option>');
                    }
                    for (i = 0; i < statesLen; i++) {
                        $("#states").append('<option value="' + response[i].id + '">' + response[i].name + '</option>');
                    }
                }
            },
            error: function () {
                alert("please try again");
            }
        });
    } else {
        $("#states").append('<option value="">---Select states---</option>');
    }
}
function getCitiesWithStates($type) {
    $stateList = $('#states').val();
    if ($type == 1) {
        $('#city').html('');
    } else {
        $("#city").append('<option value="">Select City</option>');
    }

    if ($stateList != '' && $stateList != null) {
        $.ajax({
            type: "post",
            url: base_url + "ads/getCitiesWithStates",
            data: {"states": $stateList, "type": $type},
            success: function (data) {
                var response = JSON.parse(data);
                var citiesLen = response.length;
                if (citiesLen > 0) {
                    if ($type == 1) {
                        $('#city').val(null).trigger('change');
                    } else {
                        $('#city').html('');
                        $("#city").append('<option value="">Select City</option>');
                    }
                    for (i = 0; i < citiesLen; i++) {
                        $("#city").append('<option value="' + response[i].id + '">' + response[i].name + '</option>');
                    }
                }
            },
            error: function () {
                alert("please try again");
            }
        });
    }
    else {
        $("#city").append('<option value="">---Select city---</option>');

    }
}
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








