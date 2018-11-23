$(document).ready(function () {
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    $('#nueva_pwd').click(function () {
        var pwd = $("input[name=pwd]").val();

        $.ajax({
            type: 'post',
            url: '/admin/checkpwd',
            data: {
                pwd: pwd
            },
            success: function (data) {
                // alert(data);
                if (data == 'false') {
                    $('#checkpass').html("<font color='red'>Password incorrecta</font>");
                } else if (data == 'true') {
                    $('#checkpass').html("<font color='green'>Password correcta</font>");
                }
            },
            error: function () {
                alert('error');
            }
        })
    });



    $('input[type=checkbox],input[type=radio],input[type=file]').uniform();

    $('select').select2();

    // Form Validation
    $("#basic_validate").validate({
        rules: {
            required: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            date: {
                required: true,
                date: true
            },
            url: {
                required: true,
                url: true
            }
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight: function (element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
        }
    });

    $("#number_validate").validate({
        rules: {
            min: {
                required: true,
                min: 10
            },
            max: {
                required: true,
                max: 24
            },
            number: {
                required: true,
                number: true
            }
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight: function (element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
        }
    });

    $("#password_validate").validate({
        rules: {
            pwd: {
                required: true,
                minlength: 6,
                maxlength: 20
            },
            nueva_pwd: {
                required: true,
                minlength: 6,
                maxlength: 20,
            },
            confirmar_pwd: {
                required: true,
                minlength: 6,
                maxlength: 20,
                equalTo: "#nueva_pwd"
            }
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight: function (element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
        }
    });
});
