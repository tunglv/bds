$(function(){
// input numeric only
    $("input.numeric").numeric();
    $("input.numeric.format").bind('keypress keyup paste', function(e){
        var val = $.priceFormat2Int($(this).val());
        var valFormat = number_format(val, 0, '.', '.');
        $(this).val(valFormat);
    });

    // price format
    $.priceFormatNum = function(price){
        price = $.priceFormat2Int(price);
        return number_format(price, 0, '.', '.'); 
    }
    $.priceFormat = function(price){
        price = $.priceFormat2Int(price);
        return number_format(price, 0, '.', '.')+' đ'; 
    }

    $.priceFormat2Int = function(priceFormat){
        return parseInt((priceFormat + '').replace(/[^\d]/g, ''));    
    }
    $.fn.priceFormat = function(){  
        $(this).each(function(index) {
            $(this).text($.priceFormat($(this).text()));
        });
    }
    $('.price_format').priceFormat();
    $('input.price_format_num').each(function(index) {
        $(this).val($.priceFormatNum($(this).val()));
    });


});

function param_getChild($id, $url, $postion) {
	$.ajax({
	    type:'POST',
	    url:$url,
	    data:{
	        id : $id
	    },
	    success:function(result){
	        if(result == '') {
	        }
	        else {
	            $($postion).html(result);
	        }
	    }
	});
}