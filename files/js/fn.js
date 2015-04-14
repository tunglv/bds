function number_format (number, decimals, dec_point, thousands_sep) {
    /*
    *     example 1: number_format(1234.56);
    *     returns 1: '1,235'
    *     example 2: number_format(1234.56, 2, ',', ' ');
    *     returns 2: '1 234,56'
    *     example 3: number_format(1234.5678, 2, '.', '');
    *     returns 3: '1234.57'
    *     example 4: number_format(67, 2, ',', '.');
    *     returns 4: '67,00'
    *     example 5: number_format(1000);
    *     returns 5: '1,000'
    *     example 6: number_format(67.311, 2);
    *     returns 6: '67.31'
    *     example 7: number_format(1000.55, 1);
    *     returns 7: '1,000.6'
    *     example 8: number_format(67000, 5, ',', '.');
    *     returns 8: '67.000,00000'
    *     example 9: number_format(0.9, 0);
    *     returns 9: '1'
    *    example 10: number_format('1.20', 2);
    *    returns 10: '1.20'
    *    example 11: number_format('1.20', 4);
    *    returns 11: '1.2000'
    *    example 12: number_format('1.2000', 3);
    *    returns 12: '1.200'
    *    example 13: number_format('1 000,50', 2, '.', ' ');
    *    returns 13: '100 050.00'
    */
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function (n, prec) {
        var k = Math.pow(10, prec);
        return '' + Math.round(n * k) / k;
    };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}


String.prototype.toAlias = function() {
    var str = this;

    // str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
    str = str.replace(/đ/g,"d");

    str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g,"A");
    str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g,"E");
    str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g,"I");
    str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g,"O");
    str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g,"U");
    str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g,"Y");
    str = str.replace(/Đ/g,"D");

    // remove domain extends
    str = str.replace(/\.+([\w-]{2,4})?/g,"-");
    str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.| |\:|\;|\"|\&|\#|\[|\]|~|$|_/g," ");
    /* tìm và thay thế các kí tự đặc biệt va khoang trang trong chuỗi sang kí tự khoang trang */
    str = str.replace(/-+-/g,"-"); //thay thế 2- thành 1-
    str = str.replace(/^\-+|\-+$/g,"");
    str = str.replace(/^\s+|\s+$/g,"");
    //cắt bỏ ký tự - ở đầu và cuối chuỗi
    return str;
};

// String: replace all 
String.prototype.replaceAll = function(
    strTarget, // The substring you want to replace
    strSubString // The string you want to replace in.
){
    var strText = this;
    var intIndexOfMatch = strText.indexOf( strTarget );

    // Keep looping while an instance of the target string
    // still exists in the string.
    while (intIndexOfMatch != -1){
        // Relace out the current instance.
        strText = strText.replace( strTarget, strSubString )

        // Get the index of any next matching substring.
        intIndexOfMatch = strText.indexOf( strTarget );
    }

    // Return the updated string with ALL the target strings
    // replaced out with the new substring.
    return( strText );
};

// String: highlight text
String.prototype.highlight = function(replaceText) {
    var str = this;

    //var str = text;
    var strASCII = str.toAlias().toLowerCase(); 
    var replaceASCII = replaceText.toAlias().toLowerCase().replaceAll('\\', '');
    var strStart = strASCII.indexOf(replaceASCII);

    //console.log(str);
    //console.log(replaceASCII);

    var replaceText = str.substr(strStart, replaceASCII.length);
    return str.replace(replaceText, '<u>' + replaceText + '</u>');
};


function roundNumber(rnum, rlength) {
    return Math.round(rnum*Math.pow(10,rlength))/Math.pow(10,rlength);
}


function deg2rad(deg) {
    return deg * (Math.PI/180)
}
function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
    var R = 6371; // Radius of the earth in km
    var dLat = deg2rad(lat2-lat1);  // deg2rad below
    var dLon = deg2rad(lon2-lon1); 
    var a = 
    Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
    Math.sin(dLon/2) * Math.sin(dLon/2)
    ; 
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
    var d = R * c; // Distance in km
    return d;
}