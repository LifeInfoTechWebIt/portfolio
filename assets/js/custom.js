
 
 
function isJsonString(str) {
    try {
        JSON.parse(str);
    } catch {
        return false;
    }
    return true;

}


  

// ----------------------------Toggle Password End---------------------

// ------------------Enabling Tooltip -------------------
$(function () {
    $('[data-toggle="tooltip"]').tooltip({
        animation: true,

    })
})

 
$('.make_capital').on('keyup', function () {
    let make_cap_input_val = $(this).val();
    $(this).val(make_cap_input_val.toUpperCase());
})

 
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


function show_portfolio(col_id){
    $('#portfolio-modal').modal('show') 
    $.ajax({
        type: "post",
        url: "ajax.php",
        data: ({
             isset_get_portfolio: '1',
             col_id : col_id
        }),
        
        success: function (response) {
             console.log(response); 
             $('#portolio-content').html(response);
        }
    });
    
}
 
 