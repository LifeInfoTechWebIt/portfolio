window.addEventListener("offline", (event) => {
    $('.internet-status').css('display', 'flex')
    $(document.body).css('overflow-y', 'hidden')
});
window.addEventListener("online", (event) => {
    $('.internet-status').css('display', 'none')
    $(document.body).css('overflow-y', 'auto')
});

if (!navigator.onLine) {
    $('.internet-status').css('display', 'flex')
    $(document.body).css('overflow-y', 'hidden')
}





// ----------------- Searchable select start----------------- 
$('.selectpicker').selectpicker();
// ----------------- Searchable select End----------------- 
// ------------------------- Mobile Number Validation Start------------------
$('.MobileNumberValid').on('keyup', function () {
    var MobileInputVal = $(this).val();
    if (MobileInputVal.length > 10) {
        $(this).val(MobileInputVal.slice(0, 10))
    }
})
// ------------------------- Mobile Number Validation End------------------


function isJsonString(str) {
    try {
        JSON.parse(str);
    } catch {
        return false;
    }
    return true;

}



// ----------------------------- Delete Function Start-----------------

function deleteSingle(variables) {

    // deleteSingle(['database_table_name', 'database_col_id', 'tr_id'])


    let removable_tr_id = variables[2]
    var c = confirm('Do You Want To Delete This Data ?');
    if (c == true) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(xmlhttp.response);
                if (isJsonString(xmlhttp.responseText)) {
                    let delete_json = JSON.parse(xmlhttp.responseText);
                    let delete_status = delete_json[0]
                    let delete_msg = delete_json[1]

                    if (delete_status == 'true') {
                        show_success_Alert(delete_msg, '#')
                        document.getElementById(removable_tr_id).remove();
                    } else {
                        show_failure_Alert(delete_msg, '#')
                    }
                } else {
                    show_failure_Alert("Failed To Delete Data", '#')
                }

            }
        };

        xmlhttp.open("POST", "Ajax.php", true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send("delete_singal" + "=1&&variables=" + variables);
    }

}


function deleteSingle_with_file(isset_var, variables, tr_id) {

    let var_data = JSON.stringify(variables);

    let removable_tr_id = tr_id;
    var c = confirm('Do You Want To Delete This Data ?');
    if (c == true) {

        $.ajax({
            url: "Ajax.php",
            type: "POST",
            data: isset_var + "=1&&variables=" + var_data,

            success: function (data) {

                if (isJsonString(data)) {
                    let delete_json = JSON.parse(data);
                    let delete_status = delete_json[0]
                    let delete_msg = delete_json[1]

                    if (delete_status == 'true') {
                        document.getElementById(removable_tr_id).remove();
                        show_success_Alert(delete_msg, '#')
                    } else {
                        show_failure_Alert(delete_msg, '#')
                    }
                } else {
                    console.log(data);
                    show_failure_Alert('Failed To Delete Data', '#')
                }

            }
        })

    }
}

function join_delete_with_file(table1, table2, onkey, where_condition, files, path, tr_id) {

    let variables = [{
        "table1": table1,
        "table2": table2,
        "onkey": onkey,
        "files": files,
        "path": path
    }]

    // let where_condition = [
    //     {
    //         "key": '1',
    //         "value": 'val'
    //     },
    //     {
    //         "key": '2',
    //         "value": 'val2'
    //     }
    // ]



    let removable_tr_id = tr_id;
    var c = confirm('Do You Want To Delete This Data ?');
    if (c == true) {

        $.ajax({
            url: "Ajax.php",
            type: "POST",
            data: ({
                join_delete_with_file: 1,
                variables: variables,
                condition: where_condition
            }),
            success: function (data) {
                let delete_json = JSON.parse(data);
                let delete_status = delete_json[0]
                let delete_msg = delete_json[1]

                if (delete_status == 'true') {
                    document.getElementById(removable_tr_id).remove();
                    show_success_Alert(delete_msg, '#')
                } else {
                    show_failure_Alert(delete_msg, '#')
                }

            }
        })

    }

}



// ----------------------------- Delete Function End-----------------



function Export($table, filename) {
    var table2excel = new Table2Excel();
    table2excel.export(document.getElementById($table), filename);
}


// ------------------------ Delete All Checkbox Start-------------------- 

$('.checkbox-class').click(function () {
    let checkbox_N = 0;
    var Checkboxs = $('.checkbox-class');
    for (var i = 0; i < Checkboxs.length; i++) {
        if (Checkboxs[i].checked == true) {
            checkbox_N++;
        }
    }
    if (checkbox_N != 0) {
        $('.DeleteAllBtn').removeAttr('disabled')
    } else {
        $('.DeleteAllBtn').attr('disabled', 'true')
    }

})

// ------------------------ Delete All Checkbox End-------------------- 


function ConfirmPassword(Pass, Cpass, Sub_Btn) {
    var Pass = document.getElementById(Pass);
    var Cpass = document.getElementById(Cpass);
    var Sub_Btn = document.getElementById(Sub_Btn);

    if (Cpass.value != Pass.value) {
        Cpass.style.border = '2px solid red'
        Sub_Btn.setAttribute('disabled', 'true')
    } else {
        Cpass.style.border = '2px solid green'
        Sub_Btn.removeAttribute('disabled')
    }
}



// ----------------------------Toggle Password End---------------------

// ------------------Enabling Tooltip -------------------
$(function () {
    $('[data-toggle="tooltip"]').tooltip({
        animation: true,

    })
})

//  -------------------------------- File Upload Progress Bar------------------------- 

// --------------------------- Make Capital start-----------------


$('.make_capital').on('keyup', function () {
    let make_cap_input_val = $(this).val();
    $(this).val(make_cap_input_val.toUpperCase());
})




// --------------------------- Make Capital end-----------------


// -------------------------------------Alert Dialoag Start-------------------------
$('#alert-ok').click(function () {
    $('#alert-modal').modal('hide')
})
$('#alert-fail_ok').click(function () {
    $('#alert-fail_modal').modal('hide')
})

function show_success_Alert(msg, loc) {
    $('#alert-modal').modal('show')
    $('#alert-modal-body').html(msg);
    $('#alert-ok').attr('href', loc);
}

function show_failure_Alert(msg, loc) {
    $('#alert-fail_modal').modal('show')
    $('#alert-fail_modal-body').html(msg);
    $('#alert-fail_ok').attr('href', loc);
}

// -------------------------------------Alert Dialoag End-------------------------

// ------------------------------------ Add Admission Page start ---------------------- 



function uploadData(formid, isset_var, event) {

    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    event.preventDefault()

    var form = document.getElementById(formid);
    var form_data = new FormData(form)
    form_data.append(isset_var, '1');



    $.ajax({
        url: 'Ajax.php',
        type: 'POST',
        data: form_data,
        contentType: false,
        processData: false,
        success: function (data) {

            if (isJsonString(data)) {
                let add_response = JSON.parse(data);
                let add_status = add_response[0];
                let add_msg = add_response[1];
                let add_location = add_response[2];

                if (add_status == 'false') {
                    show_failure_Alert(add_msg, add_location)
                } else {
                    show_success_Alert(add_msg, add_location)
                }
            } else {
                console.log(data);
                show_failure_Alert('Failed To Upload Data', '#')
            }


        }
    })
}



function updateData(formid, isset_var, event) {

    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }


    event.preventDefault()

    var form = document.getElementById(formid);
    var form_data = new FormData(form)
    form_data.append(isset_var, '1');


    $.ajax({
        url: 'Ajax.php',
        type: 'POST',
        data: form_data,
        contentType: false,
        processData: false,
        success: function (data) {

            if (isJsonString(data)) {
                let add_response = JSON.parse(data);
                let add_status = add_response[0];
                let add_msg = add_response[1];
                let add_location = add_response[2];

                if (add_status == 'false') {
                    show_failure_Alert(add_msg, add_location)
                } else {
                    show_success_Alert(add_msg, add_location)
                }

            } else {
                console.log(data);
                show_failure_Alert('Failed To Update Data', '#')
            }
        }
    })
}

// ------------------------------------ Add Admission Page end ---------------------- 


// ------------------------------- Number Formater start----------------

function format_num(number) {
    let format_number = parseFloat(number).toLocaleString('en-IN', {
        maximumFractionDigits: 2,
    });
    return format_number;
}

function indian_currency(number) {

    let indian_currency = parseFloat(number).toLocaleString('en-IN', {
        maximumFractionDigits: 2,
        style: 'currency',
        currency: 'INR'

    });
    return indian_currency;
}



// ------------------------------- Number Formater end----------------



function show_modal(modal_id) {
    $(modal_id).modal('show');
}


// ------------------------------------- Add Single Students start----------------------


function send_isset_and_variable(isset, col_id) {
    $.ajax({
        url: "Ajax.php",
        type: "POST",
        data: isset + "=1&&col_id=" + col_id,
        success: function (data) {
            let add_response = JSON.parse(data);
            let add_status = add_response[0];
            let add_msg = add_response[1];
            let add_location = add_response[2];

            if (add_status == 'false') {
                show_failure_Alert(add_msg, add_location)
            } else {
                show_success_Alert(add_msg, add_location)
            }

        }
    })
}



// ------------------------------------- Add Single Students end----------------------





// -------------------------- Profile Modal start---------------

$(".table-pro-pic").click(function () {
    $("#full-image").attr("src", $(this).attr("src"));
    $('#profile-image-viewer').show();
});

$("#profile-image-viewer .profile-close").click(function () {
    $('#profile-image-viewer').hide();
});


$(".image-click").click(function () {
    $("#modal-image").attr("src", $(this).attr("src"));
    $('#image-modal').show();
});

$("#image-modal .image-close").click(function () {
    $('#image-modal').hide();
});

// -------------------------- Profile Modal end---------------


// ------------------------------ Number Addition Start --------------

function add_number(classes, set_val) {

    let add_number_val = 0,
        add_num_temp = 0;

    for (var i = 0; i < classes.length; i++) {
        let add_num_classe = parseFloat($(classes[i]).val());
        add_number_val = add_num_classe + add_num_temp;
        add_num_temp = add_number_val;
    }

    $(set_val).val(add_number_val);
}


// ------------------------------ Number Addition end --------------

function image_preview(img_input, imgpreview, n) {

    $(imgpreview).html('')

    let file_data = $(img_input)[0].files;
    let files_lenght = $(img_input)[0].files.length;
    if (files_lenght > n) {
        $(img_input).val('')
        show_failure_Alert(`You can choose only ${n} images`, '#')

    } else {
        for (var i = 0; i < files_lenght; i++) {
            let img_src = URL.createObjectURL(file_data[i])
            $(imgpreview).append(`<img src='${img_src}' width='150' height='150'>`)
        }
    }

}



function navigation_select(nav) {

    $('.category_select').html("<option value = ''>---</option>")

    if (nav != '') {

        $.ajax({
            url: 'Ajax.php',
            type: 'POST',
            data: ({
                selected_nav: nav
            }),
            success: function (data) {
                let nav = JSON.parse(data);
                if (nav['status'] != 'false') {
                    for (var i = 0; i < nav['data'].length; i++) {
                        $('.category_select').append(`<option value = '${nav['data'][i][1]}'>${nav['data'][i][0]}</option>`)
                    }
                } else {
                    $('.category_select').html("<option value = ''>---</option>")
                }
                   console.log(data);

            }
        })
    } else {
        $('.category_select').html("<option value = ''>---</option>")
    }
}



function category_select(category, nav) {
    let selected_nav_val = document.getElementById(nav).value;
    $('.sub_category_select').html("<option value = ''>---</option>")

    if (category != '') {

        $.ajax({
            url: 'Ajax.php',
            type: 'POST',
            data: ({
                selected_category_FSC: category,
                selected_nav_FSC: selected_nav_val
            }),
            success: function (data) {
                let sub_category = JSON.parse(data);
                if (sub_category['status'] != 'false') {
                    for (var i = 0; i < sub_category['data'].length; i++) {
                        $('.sub_category_select').append(`<option value = '${sub_category['data'][i][1]}'>${sub_category['data'][i][0]}</option>`)
                    }
                } else {
                    $('.sub_category_select').html("<option value = ''>---</option>")
                }

                // console.log(data);
            }
        })
    } else {
        $('.sub_category_select').html("<option value = ''>---</option>")
    }
}


function select_sub_category(sub_category, category, nav) {
    let selected_nav_val = document.getElementById(nav).value;
    let selected_categotry = document.getElementById(category).value;
    $('.product_name').html("<option value = ''>---</option>")

    if (category != '') {

        $.ajax({
            url: 'Ajax.php',
            type: 'POST',
            data: ({
                selected_pro_nav: selected_nav_val,
                selected_pro_category: selected_categotry,
                selected_sub_category: sub_category
            }),
            success: function (data) {
                let pro_category = JSON.parse(data);
                if (pro_category['status'] != 'false') {
                    for (var i = 0; i < pro_category['data'].length; i++) {
                        $('.product_name').append(`<option value = '${pro_category['data'][i][1]}'>${pro_category['data'][i][0]}</option>`)
                    }
                } else {
                    $('.product_name').html("<option value = ''>---</option>")
                }

                console.log(data);
            }
        })
    } else {
        $('.product_name').html("<option value = ''>---</option>")
    }
}


function show_multi_select(multi_select) {
    let multi_select_box = $(multi_select);

    if (multi_select_box.hasClass('d-none')) {
        multi_select_box.removeClass('d-none')
        multi_select_box.addClass('d-block')
    } else {
        multi_select_box.removeClass('d-block')
        multi_select_box.addClass('d-none')
    }
}

function select_all(s_all) {
    let select_all = $(s_all);
    let multi_sele_input = $('.mul-check');

    if (select_all.prop('checked')) {
        multi_sele_input.prop('checked', true)
    } else {
        multi_sele_input.prop('checked', false)
    }
}

let mul_check = document.getElementsByClassName('mul-check');
for (var i = 0; i < mul_check.length; i++) {
    mul_check[i].addEventListener('click', function () {
        for (var j = 0; j < mul_check.length; j++) {
            if (mul_check[j].checked == false) {
                $('#s-all').prop('checked', false)
                break;
            }
        }
    })
}



function set_top(isset_var, variables, tr_td) {

    let var_data = JSON.stringify(variables);

    $.ajax({
        url: "Ajax.php",
        type: "POST",
        data: isset_var + "=1&&variables=" + var_data,

        success: function (data) {

            if (isJsonString(data)) {
                let json_data = JSON.parse(data);
                let status = json_data[0]
                let msg = json_data[1]
                let location = json_data[2]

                if (status == 'true') {
                    show_success_Alert(msg, location)

                } else {
                    show_failure_Alert(msg, location)
                }
            } else {
                console.log(data);
                show_failure_Alert("Can'nt perform task", '#')
            }

        }
    })

}



function delete_sub_category(isset, pro_id, sub_id, card, event) {
    event.preventDefault();

    $.ajax({
        type: "post",
        url: "Ajax.php",
        data: ({
            isset_delete_sub_category_from_define_sub_cat: isset,
            pro_id: pro_id,
            sub_id: sub_id
        }),
        success: function (response) {
            $('.' + card).load(location.href + ' .' + card);
        }
    });
}



function check_pro_id(pro_id, table, msg) {

    $.ajax({
        type: "POST",
        url: "Ajax.php",
        data: ({
            isset_check_product_id: pro_id,
            table: table,
            pro_id: pro_id
        }),
        success: function (response) {
            if (isJsonString(response)) {
                let json_response = JSON.parse(response);
                if (json_response[0] == 'true') {
                    $('#' + msg).html(json_response[1])
                    $('#' + msg).removeClass('text-danger').addClass('text-success')
                } else {
                    $('#' + msg).html(json_response[1])
                    $('#' + msg).removeClass('text-success').addClass('text-danger')
                }
            } else {
                $('#' + msg).html(response)
                $('#' + msg).removeClass('text-success').addClass('text-danger')
            }
        }
    });

}

function toast(msg) {
    // Get the snackbar DIV
    var x = document.getElementById("snackbar");

    // Add the "show" class to DIV
    x.className = "show";
    x.innerHTML = msg;
    // After 3 seconds, remove the show class from DIV
    setTimeout(function () {
        x.className = x.className.replace("show", "");
    }, 3000);
}


function copy_link(link) {
    navigator.clipboard.writeText(link)
    toast('Link Copied');
}

// ---------------------------------- Simple Light box gallery initializing start---------------
// var Gallery = document.querySelectorAll('.gallery a')
// new SimpleLightbox(Gallery, {
//     overlay: true,
//     spinner: true,
//     nav: true,
//     preloading: true,
//     enableKeyboard: true,
//     showCounter: true,
//     animationSlide: true,
//     animationSpeed: 150,
//     docClose: false,
//     disableRightClick: true,
//     alertError: true,
//     throttleInterval: 0,
//     loop: false,
// });
// ---------------------------------- Simple Light box gallery initializing end---------------