$(document).ready(function(e) {

    $("#login").formValidation({
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
    });


});

function getCategoriesID(base_url,ID)
{
    $.blockUI();
    $.ajax({
        type: "post",
        url: base_url+"categories/getsubByCategoriesID",
        data: {"ID":ID},
        dataType: "json",
        success: function(data) {
            $("#subcat_ID").html();
            $("#subcat_ID").html("<option value=''>Select Sub Category</option>");
            for(i=0; i<data.length;i++){
                $("#subcat_ID").append("<option value='"+data[i].ID+"'>"+data[i].subcat_title+"</option>");
            }
            $.unblockUI();
        },
        error: function() {
            $.unblockUI();
            alert("Error occurred.");

        }
    });
}
