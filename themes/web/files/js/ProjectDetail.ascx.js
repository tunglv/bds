var pmdc = function () {

    $this = this;

    this.infoWindow = null;
    this.map = null;
    this.marker = null;
    this.markerUtilities = new Array();
    this.circle = null;
    this.searchVar = {};
    this.dataUtilities = new Array();
    this.tooltip = null;
};

pmdc.prototype.InitMap = function (lat, lon, address) {

    if (this.map == null) {

        lat = parseFloat(lat);
        lon = parseFloat(lon);

        var mapOptions = {
            center: new google.maps.LatLng(lat, lon),
            zoom: 16,
            overviewMapControl: true,
            overviewMapControlOptions: {
                opened: false
            },
            panControl: false,
            rotateControl: false,
            scaleControl: false,
            zoomControl: true,
            streetViewControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                position: google.maps.ControlPosition.TOP_RIGHT
            }
        };

        this.map = new google.maps.Map(document.getElementById('maputility'), mapOptions);

        this.tooltip = new Tooltip({ map: this.map });

        this.marker = new google.maps.Marker({
            position: new google.maps.LatLng(lat, lon),
            map: this.map,
            icon: {
                url: "/Modules/Product/Maps/Images/marker-p.png",
                size: new google.maps.Size(24, 29)
            },
            zIndex: 10
        });

        address = '<div style="width:350px; min-height:50px;">' + address + '</div>';

        if (this.infoWindow == null) {
            this.infoWindow = new InfoBox({ map: this.map });
        }

        google.maps.event.clearListeners(this.infoWindow, 'closeclick');

        google.maps.event.addListener(this.marker, 'click', function (evt) {

            if ($this.infoWindow == null) {
                this.infoWindow = new InfoBox({ map: this.map });
            }

            $this.infoWindow.setContent(address);
            $this.infoWindow.open($this.map, $this.marker, 45);

            google.maps.event.clearListeners($this.infoWindow, 'closeclick');

        });

        $('.utilityradius > label > input[type=radio], .utilitylist > label > input[type=checkbox]').bind('change', this, function (evt) {

            evt.data.SearchAction();

        });

    }
};

pmdc.prototype.SearchAction = function () {

    this.ClearPoint();

    this.searchVar.radius = $('.utilityradius > label > input[type=radio]:checked').val();

    var types = '';
    $('.utilitylist > label > input[type=checkbox]:checked').each(function () {
        if (types.length > 0)
            types += ',';
        types += $(this).val();
    });

    if (types.length == 0)
        return;

    this.searchVar.types = types;
    this.searchVar.lat = this.marker.position.lat();
    this.searchVar.lon = this.marker.position.lng();
    this.searchVar.m = 'pjdetail';
    this.searchVar.v = new Date().getTime();
    //$('#googleMap').block({
    //    message: '<h1>Đang xử lý</h1>',
    //    css: { border: '1px solid #ccc', padding: '15px 0px' }
    //});
    $('.googleMap').block({
        message: '<img width="40" src="/Modules/Product/Maps/Images/map-loading.gif">', //'<h1>Đang xử lý</h1>',
        css: { border: '1px solid #ccc', padding: 'none', width: '40px', height: '40px' }
    });

    $.ajax({
        url: mapHostUrl + '/api/u_sync',
        data: this.searchVar, dataType: 'json', type: getAjaxMethod(),
        success: function (data, textStatus, jqXHR) {
            $('#googleMap').unblock();

            $this.ShowPoint(eval($.dde(data.data)));

        },
        error: function (jqXHR, textStatus, errorThrown) {

            $('#googleMap').unblock();

        },
        complete: function () {

        }
    });
};

pmdc.prototype.ClearPoint = function () {
    if (this.circle != null)
        this.circle.setMap(null);

    for (var i = 0; i < this.markerUtilities.length; i++) {
        this.markerUtilities[i].setMap(null);
    }

    this.markerUtilities = new Array();

    $('.utilityResultList').html('');
    $('.utilityResultHeader').html('');
};

pmdc.prototype.ShowPoint = function (data) {

    this.infoWindow.close();
    this.dataUtilities = new Array();

    var radius = parseInt(this.searchVar.radius);
    var radiusstring = radius + ' m';
    if (radius > 1000)
        radiusstring = (radius / 1000) + ' km';

    if (data != undefined && data != null && data.length > 0) {

        if (radius < 1000) {
            $('.utilityResultHeader').html('Các tiện ích bản đồ trong bán kính ' + radiusstring);
        } else {
            $('.utilityResultHeader').html('Các tiện ích bản đồ trong bán kính ' + radiusstring);
        }

        if (this.circle == null)
            this.circle = new google.maps.Circle({ center: this.marker.position, radius: radius, fillOpacity: 0.4 });
        else
            this.circle.setOptions({ center: this.marker.position, radius: radius });

        this.circle.setMap(this.map);

        //this.dataUtilities = data;
        // Re format valid data
        this.dataUtilities = $this.formatUtilities(data, this.marker.position, radius);

        // Display total Utility
        $(".utilitylist label .uti-total").remove();
        $.each($('.utilitylist input:checked'), function() {
            var utitilityType = parseInt($(this).val());
            var total = $this.getTotalUtility($this.dataUtilities, utitilityType);
            if ($(this).parent().find('.uti-total').length > 0) {
                $(this).parent().find('.uti-total').html('(' + total + ')');
            } else {
                $(this).parent().append(' <span class="uti-total">(' + total + ')</span>');
            }
        });

        // Show Utility Around
        for (var i = 0; i < this.dataUtilities.length; i++) {

            var util = this.dataUtilities[i];

            var htmlTip = '';
            htmlTip += '<div class="infowindow-util-preview">';
            htmlTip += '<b class="infowindow-util-preview-title">' + util.name + '</b>';
            if (util.address != null && util.address.length > 0)
                htmlTip += '<span>' + util.address + '</span><br/>';

            htmlTip += '<b>Khoảng cách: </b>' + util.distance + 'm';

            htmlTip += '</div>';

            this.markerUtilities.push(new google.maps.Marker({
                position: new google.maps.LatLng(util.lat, util.lon),
                map: this.map,
                tooltip: htmlTip,
                icon:{
                    url: '/Modules/Product/Maps/Images/utility' + this.dataUtilities[i].typeid + '.png',
                    size: new google.maps.Size(32, 37)
                },
                zIndex: 9
            }));
            this.markerUtilities[this.markerUtilities.length - 1].id = this.dataUtilities[i].id;
            this.markerUtilities[this.markerUtilities.length - 1].addListener('click', function () {

                $this.ShowUtilityWindow(this.id);

            });

            this.markerUtilities[this.markerUtilities.length - 1].addListener('mouseover', function (evt) {

                var point = evt.latLng;
                if (point == null) {
                    point = this.getPosition();
                }

                $this.tooltip.addTip(this);
                $this.tooltip.getPos2(point);

            });

            this.markerUtilities[this.markerUtilities.length - 1].addListener('mouseout', function (evt) {

                $this.tooltip.removeTip();

            });
        }
    } else {
        $('.utilityResultHeader').html('Không có tiện ích nào trong bán kính ' + radiusstring);
    }

    this.ShowListResult();
};

// ThanhDT add for count utilities
pmdc.prototype.getTotalUtility = function(data, utitilityType) {
    var total = 0;
    for (var i = 0; i < data.length; i++) {
        if (data[i].typeid == utitilityType) {
            total++;
        }
    }

    return total;
};

// ThanhDT add for remove distance > redius
pmdc.prototype.formatUtilities = function (data, curPosition, maxDistance) {
    if (data == null || data.length == 0) return [];
    var validUtilities = [];
    for (var i = 0; i < data.length; i++) {
        var distance = parseInt(google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(data[i].lat, data[i].lon), curPosition));
        if (distance <= maxDistance) {
            data[i].distance = distance;
            validUtilities.push(data[i]);
        }
    }
    return validUtilities;
};

pmdc.prototype.ShowListResult = function () {

    if (this.dataUtilities != undefined && this.dataUtilities != null && this.dataUtilities.length > 0) {

        $('.utilitylist > label > input[type=checkbox]:checked').each(function () {

            var typeid = parseInt($(this).val());

            var html = '';

            for (var i = 0; i < $this.dataUtilities.length; i++) {
                var util = $this.dataUtilities[i];
                if (util.typeid == typeid) {
                    html += '<tr>';
                    html += '<td class="col40per">' + util.name + '</td>';
                    html += '<td class="col40per">' + util.address + '</td>';

                    var distance = parseInt(google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(util.lat, util.lon), $this.marker.position));

                    html += '<td class="col20per">' + distance + ' m</td>';
                    html += '</tr>';
                }
            }

            if (html.length > 0) {

                html = '<table><tr><th class="col40per">' + $(this).parent().text() + '</th><th  class="col40per">Địa chỉ</th><th  class="col20per">Khoảng cách</th></tr></table><div class="resultbody"><table>' + html + '</table></div>';

                $('.utilityResultList').append(html);
            }

        });

        $('.resultbody').mCustomScrollbar({
            scrollInertia: 150
        });

    }

};

pmdc.prototype.ShowUtilityWindow = function (id) {

    this.infoWindow.close();

    for (var i = 0; i < this.dataUtilities.length; i++) {
        if (this.dataUtilities[i].id == id) {

            for (var j = 0; j < this.markerUtilities.length; j++) {
                if (this.markerUtilities[j].id == id) {
                    var util = this.dataUtilities[i];

                    var contentUtil = '';
                    contentUtil += '<div class="infowindow-util">';
                    contentUtil += '<b class="infowindow-util-title">' + util.name + '</b>';
                    if (util.image != null && util.image.length > 0) {
                        contentUtil += '<div class="infowindow-util-ava">';

                        contentUtil += '<a class="fancybox" rel="gallery1" href="' + util.image[0] + '"><img src="' + util.image[0] + '" alt="" /></a>';
                        for (var n = 1; n < util.image.length; n++) {
                            contentUtil += '<a class="fancybox" rel="gallery1" href="' + util.image[n] + '"></a>';
                        }

                        contentUtil += '</div>';
                    }
                    if (util.address != null && util.address.length > 0)
                        contentUtil += '<span>' + util.address + '</span><br/>';
                    if (util.website != null && util.website.length > 0)
                        contentUtil += '<span>' + util.website + '</span><br/>';
                    if (util.email != null && util.email.length > 0)
                        contentUtil += '<span>' + util.email + '</span><br/>';
                    if (util.phone != null && util.phone.length > 0)
                        contentUtil += '<span>' + util.phone + '</span><br/>';

                    contentUtil += '<b>Khoảng cách:</b> ' + parseInt(google.maps.geometry.spherical.computeDistanceBetween(this.markerUtilities[j].position, this.marker.position)) + 'm';

                    contentUtil += '</div>';

                    this.infoWindow.setContent(contentUtil);

                    this.infoWindow.open(this.map, this.markerUtilities[j], 37);
                    google.maps.event.clearListeners(this.infoWindow, 'closeclick');

                    $(".fancybox").fancybox({
                        openEffect: 'none',
                        closeEffect: 'none'
                    });

                }
            }
        }
    }

};

$(document).ready(function () {
    $(".editor:first").css("display", "");
    $("#detail .tabProject li:first").addClass("tabActiveProject");
    $(".d1").css('margin-bottom', '10px');
    var loadMap = 0;
    $('.tabProject li').click(function () {
        var projectOtherKeyId = $(this).attr("value");

        $(".tabActiveProject").removeClass("tabActiveProject");
        $(this).addClass("tabActiveProject");
        var lstEditor = $(".editor");
        for (var i = 0; i < lstEditor.length; i++) {
            var val = $(lstEditor[i]).children("input[type=hidden]").attr("value");
            if (val == projectOtherKeyId) {
                var textInfo = $.trim($(lstEditor[i]).children(".a1").html());
                if (textInfo != "<br>" && textInfo != '') {
                    $(".editor").css("display", "none");
                    $(lstEditor[i]).css("display", "");
                }
                else {
                    $(".editor").css("display", "none");
                }
            }
        }
        if (projectOtherKeyId == '10') {
            $(".editor").css("display", "none");
            $("#enterpriseInfo").css("display", "block");
        }
        if (projectOtherKeyId == '4') {
            $('#googleMap').css('display', 'block');
            var lat = $('#hdLat').val();
            var long = $('#hdLong').val();
            var address = $('#hdAddress').val();
            if (lat != '' && long != '' && loadMap == 0) {
                var pmd = new pmdc();
                pmd.InitMap(lat, long, '<div style="width:300px; height:auto;">' + address + '</div>');
                pmd.SearchAction();
                loadMap++;
            }
        } else {
            $('#googleMap').css('display', 'none');
        }
    });
});