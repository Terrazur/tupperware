$('#opt1').hide();
$('#opt2').hide();
$('#opt3').hide();
$('.not').hide();

function alpha(){
    var test = document.getElementById("sell_typ").value;
    if (test == 'Kirim') {
        $('.not').slideDown();
    }
    else{
        $('.not').slideUp();
    }
}

$(document).ready(function(){
    $('#hub1').click(function(){
        $('#opt1').slideToggle(200);
        $(this).find('span').toggleClass('glyphicon-chevron-down').toggleClass('glyphicon-chevron-up');;
    })

    $('#hub2').click(function(){
        $('#opt2').slideToggle(200);
        $(this).find('span').toggleClass('glyphicon-chevron-down').toggleClass('glyphicon-chevron-up');;
    })

    $('#hub3').click(function(){
        $('#opt3').slideToggle(200);
        $(this).find('span').toggleClass('glyphicon-chevron-down').toggleClass('glyphicon-chevron-up');;
    })
});