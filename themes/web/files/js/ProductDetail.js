(function ($) {

    ProductDetailGallery = function (options) {
        this.autoplayInterval = null;
        this.thumbs = $('#thumbs');
        this.iconback = $("#icon-back");
        this.iconnext = $("#icon-next");
        this.autoplay = $('#autoplay');
        this.photoactive = $('#divPhotoActive > div:eq(0)');
        $gallery = this;

        this.selectNextImage = function () {

            if (this.thumbs.children('li.current').length <= 0) {
                if (this.thumbs.children('li').length > 1) {
                    this.selectImg(this.thumbs.children('li:eq(1)'));
                }
            } else {
                var index = this.thumbs.children('li.current').index();
                if (index < this.thumbs.children('li').length - 1) {
                    this.selectImg(this.thumbs.children('li:eq(' + (index + 1) + ')'));
                } else {
                    this.selectImg(this.thumbs.children('li:eq(0)'));
                }
            }
        };

        this.selectBackImage = function () {
            var length = this.thumbs.children('li').length - 1;
            if (this.thumbs.children('li.current').length <= 0) {
                if (this.thumbs.children('li').length > 1) {
                    this.selectImg(this.thumbs.children('li:eq(1)'));
                }
            } else {
                var index = this.thumbs.children('li.current').index();
                if (index > 0) {
                    this.selectImg(this.thumbs.children('li:eq(' + (index - 1) + ')'));
                } else {
                    this.selectImg(this.thumbs.children('li:eq(' + length + ')'));
                }
            }
        };

        this.selectImg = function (sender) {

            this.thumbs.children('li').removeClass('current');
            $(sender).addClass('current');

            var img = $(sender).children('img');
            var src = $(img).attr('src');
            var reg = new RegExp('thumb[0-9]{1,3}x[0-9]{1,3}.');
            src = src.replace(reg, 'thumb745x510.');

            var reg = new RegExp('/resize/[0-9]{1,3}x[0-9]{1,3}/');
            src = src.replace(reg, '/resize/745x510/');
            
            if (this.photoactive.children('img:eq(0)').css("display") == "inline" || this.photoactive.children('img:eq(0)').css("display") == "") {
                this.photoactive.children('img:eq(1)').attr('src', src);
                this.photoactive.children('img:eq(0)').fadeOut("500", function () {
                    $gallery.photoactive.children('img:eq(1)').fadeIn("500");
                });
            }
            else {
                this.photoactive.children('img:eq(0)').attr('src', src);
                this.photoactive.children('img:eq(1)').fadeOut("500", function () {
                    $gallery.photoactive.children('img:eq(0)').fadeIn("500");
                });
            }
            window.scrollTo(0, this.photoactive.offset().top);
        };

        if (this.thumbs.children('li').length <= 1) {
            this.iconback.hide();
            this.iconnext.hide();
            this.autoplay.hide();
        }
        else {

            this.autoplay.bind('click', this, function (evt) {

                if ($(this).attr('ac') == 'auto') {
                    $(this).children('span').html('Xem tự động');
                    $(this).attr('ac', 'manual');
                    evt.data.photoactive.css('cursor', 'pointer');
                    window.clearInterval(evt.data.autoplayInterval);
                    evt.data.autoplayInterval = null;
                } else {
                    $(this).children('span').html('Tắt xem tự động');
                    $(this).attr('ac', 'auto');
                    evt.data.photoactive.css('cursor', 'default');
                    evt.data.selectNextImage();
                    evt.data.autoplayInterval = evt.data.autoplayInterval = window.setInterval(function () { evt.data.selectNextImage(); }, 3000);
                }

            });

            this.photoactive.bind('click', this, function (evt) {
                if (evt.data.autoplayInterval == null) {
                    evt.data.selectNextImage();
                }
            });

            $('#thumbs').children('li').bind('click', this, function (evt) {
                evt.data.selectImg(this);
            });

            this.iconback.bind('click', this, function (evt) {
                evt.data.selectBackImage(this);
            });

            this.iconnext.bind('click', this, function (evt) {
                evt.data.selectNextImage(this);
            });
        }
    };

    $.fn.ProductDetailGallery = ProductDetailGallery;

}(jQuery));

(function ($) {

    ProductDetailMap = function (lat, lon, address) {

        $this = this;

        this.infoWindow = null,
        this.map = null;
        this.marker = null;
        this.markerUtilities = new Array();
        this.circle = null;
        this.searchVar = {};
        this.dataUtilities = new Array();
        this.tooltip = null;

        this.InitMap = function (lat, lon, address) {

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
                        url: "/Modules/Product/Maps/Images/marker1.png",
                        size: new google.maps.Size(23, 26)
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
                    $this.infoWindow.open($this.map, $this.marker, 26);

                    google.maps.event.clearListeners($this.infoWindow, 'closeclick');

                });

                $('.utilityradius > label > input[type=radio], .utilitylist > label > input[type=checkbox]').bind('change', this, function (evt) {

                    evt.data.SearchAction();

                });

            }
        };

        this.SearchAction = function () {

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
            this.searchVar.m = 'pddetail';
            this.searchVar.v = new Date().getTime();
            //$('.MapProductDetail').block({
            //    message: '<h1>Đang xử lý</h1>',
            //    css: { border: '1px solid #ccc', padding: '15px 0px' }
            //});
            $('.MapProductDetail').block({
                message: '<img width="40" src="/Modules/Product/Maps/Images/map-loading.gif">', //'<h1>Đang xử lý</h1>',
                css: { border: '1px solid #ccc', padding: 'none', width: '40px', height: '40px' }
            });

            $.ajax({
                url: mapHostUrl + '/api/u_sync',
                data: this.searchVar, dataType: 'json', type: getAjaxMethod(),
                success: function (data, textStatus, jqXHR) {
                    $('.MapProductDetail').unblock();
                    $this.ShowPoint(eval($.dde(data.data)));
                },
                error: function (jqXHR, textStatus, errorThrown) {

                    $('.MapProductDetail').unblock();

                },
                complete: function () {

                }
            });
        };

        this.ClearPoint = function () {
            if (this.circle != null)
                this.circle.setMap(null);

            for (var i = 0; i < this.markerUtilities.length; i++) {
                this.markerUtilities[i].setMap(null);
            }

            this.markerUtilities = new Array();

            $('.utilityResultList').html('');
            $('.utilityResultHeader').html('');
        };

        this.ShowPoint = function (data) {

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
                $.each($('.utilitylist input:checked'), function () {
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
                //var obj = $('.utilitylist');
                //$("label .uti-total", $('.utilitylist')).remove();
                //for (var i = 0; i < this.dataUtilities.length; i++) {

                //    if ($(obj).find('input[type=checkbox][value=' + this.dataUtilities[i].type + ']').parent().find('.uti-total').length > 0) {
                //        $(obj).find('input[type=checkbox][value=' + this.dataUtilities[i].type + ']').parent().find('.uti-total').html('(' + this.dataUtilities[i].total + ')');
                //    } else {
                //        $(obj).find('input[type=checkbox][value=' + this.dataUtilities[i].type + ']').parent().append(' <span class="uti-total">(' + this.dataUtilities[i].total + ')</span>');
                //    }

                //    for (var j = 0; j < this.dataUtilities[i].data.length; j++) {
                //        var util = this.dataUtilities[i].data[j];
                //        var distance = parseInt(google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(util.lat, util.lon), this.marker.position));
                //        if (distance > radius)
                //            continue;

                //        var tooltip = '';
                //        tooltip += '<div class="infowindow-util-preview">';
                //        tooltip += '<b class="infowindow-util-preview-title">' + util.name + '</b>';

                //        if (util.address != null && util.address.length > 0)
                //            tooltip += '<span>' + util.address + '</span><br>';

                //        tooltip += '<b>Khoảng cách:</b> ' + distance + 'm';
                //        tooltip += '</div>';

                //        this.markerUtilities.push(new google.maps.Marker({
                //            position: new google.maps.LatLng(util.lat, util.lon),
                //            map: this.map,
                //            tooltip: tooltip,
                //            icon: {
                //                url: '/Modules/Product/Maps/Images/utility' + util.typeid + '.png',
                //                size: new google.maps.Size(32, 37)
                //            },
                //            zIndex: 7
                //        }));

                //        this.markerUtilities[this.markerUtilities.length - 1].id = this.dataUtilities[i].id;
                //        this.markerUtilities[this.markerUtilities.length - 1].addListener('click', function () {

                //            $this.ShowUtilityWindow(this.id);

                //        });

                //        this.markerUtilities[this.markerUtilities.length - 1].addListener('mouseover', function (evt) {

                //            var point = evt.latLng;
                //            if (point == null) {
                //                point = this.getPosition();
                //            }

                //            $this.tooltip.addTip(this);
                //            $this.tooltip.getPos2(point);

                //        });

                //        this.markerUtilities[this.markerUtilities.length - 1].addListener('mouseout', function (evt) {

                //            $this.tooltip.removeTip();

                //        });
                //    }
                //}
            } else {
                $('.utilityResultHeader').html('Không có tiện ích nào trong bán kính ' + radiusstring);
            }

            this.ShowListResult();
        };

        this.ShowListResult = function () {

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

                        html = '<div class="resulthead"><table><tr><th class="col40per">' + $(this).parent().text() + '</th><th  class="col40per">Địa chỉ</th><th  class="col20per">Khoảng cách</th></tr></table></div><div class="resultbody"><table>' + html + '</table></div>';

                        $('.utilityResultList').append(html);
                    }

                });

                //$('.resultbody').mCustomScrollbar({
                //    scrollInertia: 150
                //});

            }

        };

        this.ShowUtilityWindow = function (id) {

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

        // ThanhDT add for count utilities
        this.getTotalUtility = function (data, utitilityType) {
            var total = 0;
            for (var i = 0; i < data.length; i++) {
                if (data[i].typeid == utitilityType) {
                    total++;
                }
            }

            return total;
        };

        // ThanhDT add for remove distance > redius
        this.formatUtilities = function (data, curPosition, maxDistance) {
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

        this.InitMap(lat, lon, address);

        this.SearchAction();
    };

    $.fn.ProductDetailMap = ProductDetailMap;
}(jQuery));

(function ($) {
    ProductViewSimilar = function () {

        $similar = this;

        this.currentSimilarPageIndex = 0;

        $(this).bind('click', this, function (evt) {

            var context = $(this).attr('context');
            if (context.length > 0) {
                context = context.split(',');
                var prodId = parseInt(context[0]);
                var total = parseInt(context[1]);
                var pageSize = parseInt(context[2]);
                var lnkId = context[3];

                var url = '/Modules/Views/Product/SimilarProduct.aspx';

                $.get(url, { itemId: prodId, pageSize: pageSize, pageIndex: evt.data.currentSimilarPageIndex + 1 }, function (data) {

                    $similar.currentSimilarPageIndex++;

                    $('#lstProductSimilar').append(data);

                }, 'html');

                return evt.data.currentSimilarPageIndex >= 2;
            }
        });
    };

    $.fn.ProductViewSimilar = ProductViewSimilar;

}(jQuery));

$(document).ready(function () {

    $('#TopContentLeft').parent().remove();
    
    if ($('#photoSlide').length > 0) {
        $('#photoSlide').ProductDetailGallery();
    }

    //if ($('.MapProductDetail').length > 0) {
    //    $('.MapProductDetail').ProductDetailMap($('#hdLat').val(), $('#hdLong').val(), $('#hdAddress').val());
    //}

    $("a[viewmore=similar]").ProductViewSimilar();

    if ($(".openFancy").length > 0) {
        $(".openFancy").fancybox({
            'width': 575,
            'height': 'auto',
            'maxWidth': 575,
            'autoScale': false,
            'transitionIn': 'none',
            'transitionOut': 'none',
            'type': 'iframe',
            'scrolling': 'no'
        });
    }

});

// Load map dynamic
var isLoadProductMap = false;
var curTabIndex = 0;
function showPhoto(src) {
    if (curTabIndex == 0) return;
    curTabIndex = 0;
    $(".detail-more-info a.active").removeClass("active");
    $(src).addClass("active");
    $('#googleMap').hide();
    $('#photoSlide').show();
}

function showMap(src) {
    if (curTabIndex == 1) return;
    curTabIndex = 1;
    $(".detail-more-info a.active").removeClass("active");
    $(src).addClass("active");
    if (!isLoadProductMap) {
        isLoadProductMap = true;
        //function loadCallback() {
        //    $('#photoSlide').hide();
        //    $('#googleMap').show();
        //    if ($('.MapProductDetail').length > 0) {
        //        $('.MapProductDetail').ProductDetailMap($('#hdLat').val(), $('#hdLong').val(), $('#hdAddress').val());
        //    }
        //}
        //writeScript('http://maps.google.com/maps/api/js?v=3.exp&sensor=false&libraries=geometry');
        //writeScript('/Modules/Product/Maps/Scripts/jquery.tooltipmarker.js');
        //writeScript('/Modules/Product/Maps/Scripts/InfoBox.js');
        //writeScript('/Scripts/ProductDetail.js');

        $('#photoSlide').hide();
        $('#googleMap').show();
        if ($('.MapProductDetail').length > 0) {
            $('.MapProductDetail').ProductDetailMap($('#hdLat').val(), $('#hdLong').val(), $('#hdAddress').val());
        }
        return;
    }
    $('#photoSlide').hide();
    $('#googleMap').show();
}

function writeScript(scriptUrl) {
    var sc = document.createElement('script');
    sc.type = 'text/javascript';
    sc.async = true;
    sc.src = scriptUrl;
    var bsc = document.getElementsByTagName('script')[0];
    bsc.parentNode.appendChild(sc);
}

function showMapInfo(src) {
    $(src).hide();
    $('#googleMap').show();
    if ($('.MapProductDetail').length > 0) {
        $('.MapProductDetail').ProductDetailMap($('#hdLat').val(), $('#hdLong').val(), $('#hdAddress').val());
    }
}