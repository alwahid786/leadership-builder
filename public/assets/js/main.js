$(document).ready(function(){
    $('.nav-item').mouseover(function(){
        if($(this).hasClass('plans')){
            $(this).find('img').attr('src', "public/assets/images/plans-blue.png");
        } else if ($(this).hasClass('invoices')){
            $(this).find('img').attr('src', "public/assets/images/invoice-blue.png");
        }else{
            $(this).find('img').attr('src', "public/assets/images/setting-blue.png");
        }
    });
    $('.nav-item').mouseleave(function(){
        if($(this).hasClass('plans')){
            $(this).find('img').attr('src', "public/assets/images/plans-white.png");
        } else if ($(this).hasClass('invoices')){
            $(this).find('img').attr('src', "public/assets/images/invoice-white.png");
        }else{
            $(this).find('img').attr('src', "public/assets/images/setting-white.png");
        }
    });
})
