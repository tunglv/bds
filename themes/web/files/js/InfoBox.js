function InfoBox(opts) {

    google.maps.OverlayView.call(this);

    if (opts['latLng'] != undefined)
        this.latlng_ = opts.latlng;

    if (opts.map != undefined)
        this.map_ = opts.map;

    this.offsetVertical_ = 0;
    this.offsetHorizontal_ = 0;
    this.offsetPaddingTop = 20;

    this.content = opts.content;

    var me = this;
    this.boundsChangedListener_ =
        google.maps.event.addListener(this.map_, "bounds_changed", function () {
            return me.panMap.apply(me);
        });

    this.setMap(this.map_);
}

InfoBox.prototype = new google.maps.OverlayView();

InfoBox.prototype.remove = function () {

    if (this.div_) {
        this.div_.parentNode.removeChild(this.div_);
        this.div_ = null;
    }
};

InfoBox.prototype.onAdd = function () {
    this.createElement();
}

InfoBox.prototype.onRemove = function () {
    this.remove();
}

InfoBox.prototype.draw = function () {

    if (this.latlng_ == undefined || this.latlng_ == null || this.map_ == undefined || this.map_ == null || this.content == undefined || this.content == null) {
        return;
    }

    if (!this.div_)
        return;

    var pixPosition = this.getProjection().fromLatLngToDivPixel(this.latlng_);
    if (!pixPosition) return;

    this.div_.style.left = (pixPosition.x - ($(this.div_).width() / 2)) + "px";
    this.div_.style.top = (pixPosition.y - $(this.div_).height() - this.offsetPaddingTop) + "px";

    this.div_.style.display = 'block';

};

InfoBox.prototype.createElement = function () {

    if (this.map_ == undefined || this.map_ == null || this.latlng_ == undefined || this.latlng_ == null || this.content == undefined || this.content == null) {
        this.remove();
        return;
    }

    var panes = this.getPanes();
    var div = this.div_;
    if (!div) {

        div = this.div_ = document.createElement("div");
        div.className = "bdsInfoWindow";
        div.style.position = "absolute";
        div.style.width = "auto";
        div.style.height = "auto";

        var divhead = document.createElement("div");
        divhead.className = "bdsInfoWindow-head";

        var divbody = document.createElement("div");
        divbody.className = "bdsInfoWindow-body";

        var contentDiv = document.createElement("div");
        contentDiv.innerHTML = this.content;

        var closeImg = document.createElement("img");
        closeImg.style.cursor = "pointer";
        closeImg.style.position = "absolute";
        closeImg.style.top = '8px';
        closeImg.style.right = '5px';
        closeImg.src = "/Modules/Product/Maps/Images/close.png";

        function removeInfoBox(ib) {
            return function () {
                ib.setMap(null);
            };
        }

        google.maps.event.addDomListener(closeImg, 'click', removeInfoBox(this));

        divbody.appendChild(closeImg);
        divbody.appendChild(contentDiv);
        divhead.appendChild(divbody);
        div.appendChild(divhead);
        div.style.display = 'none';
        panes.floatPane.appendChild(div);

        this.eventListeners_ = [];

        // Cancel event propagation.
        //
        // Note: mousemove not included (to resolve Issue 152)
        var events = ["mousemove", "mousedown", "mouseover", "mouseout", "mouseup",
        "click", "dblclick", "touchstart", "touchend", "touchmove"];

        for (i = 0; i < events.length; i++) {

            this.eventListeners_.push(google.maps.event.addDomListener(this.div_, events[i], function (e) {
                e.cancelBubble = true;
                if (e.stopPropagation) {
                    e.stopPropagation();
                }
            }));
        }

        // Workaround for Google bug that causes the cursor to change to a pointer
        // when the mouse moves over a marker underneath InfoBox.
        this.eventListeners_.push(google.maps.event.addDomListener(this.div_, "mouseover", function (e) {
            this.style.cursor = "default";
        }));

        this.panMap();

    } else if (div.parentNode != null && div.parentNode != panes.floatPane) {

        div.parentNode.removeChild(div);
        div.style.display = 'none';
        panes.floatPane.appendChild(div);

    } else {

    }
}

InfoBox.events = ['mousedown', 'mousemove', 'mouseover', 'mouseout', 'mouseup', 'mousewheel', 'DOMMouseScroll', 'touchstart', 'touchend', 'touchmove', 'dblclick', 'contextmenu', 'click'];

InfoBox.prototype.addCancelHandler_ = function (el) {

    if (el.tagName.toLowerCase() == 'img' && el.className == 'closeButton') {
        return;
    }

    var that = this;

    for (var i = 0, event; event = InfoBox.events[i]; i++) {
        this.listeners_.push(
          google.maps.event.addDomListener(el, event, function (e) {

              if (e.type == 'click') {
                  if (e.toElement && e.toElement.tagName.toLowerCase() == 'img') {
                      if (that.avatarClickCallBack_ != null) {
                          that.avatarClickCallBack_(that.avatarClickContext_);
                      }
                  }
              }

              e.cancelBubble = true;
              if (e.stopPropagation) {
                  e.stopPropagation();
              }
          })
        );
    }

    for (var i = 0; i < el.childElementCount; i++) {
        this.addCancelHandler_(el.children[i]);
    }
}

InfoBox.prototype.panMap = function () {

    var map = this.map_;
    var bounds = map.getBounds();
    if (!bounds) return;
    if (this.latlng_ == undefined) {
        return;
    }

    var position = this.latlng_;

    var iwWidth = $(this.div_).width();
    var iwHeight = $(this.div_).height();

    var iwOffsetX = (iwWidth / 2) * -1;
    var iwOffsetY = (iwHeight + this.offsetPaddingTop) * -1;

    var padX = 40;
    var padY = 40;

    var mapDiv = map.getDiv();
    var mapWidth = mapDiv.offsetWidth;
    var mapHeight = mapDiv.offsetHeight;
    var boundsSpan = bounds.toSpan();
    var longSpan = boundsSpan.lng();
    var latSpan = boundsSpan.lat();
    var degPixelX = longSpan / mapWidth;
    var degPixelY = latSpan / mapHeight;

    var mapWestLng = bounds.getSouthWest().lng();
    var mapEastLng = bounds.getNorthEast().lng();
    var mapNorthLat = bounds.getNorthEast().lat();
    var mapSouthLat = bounds.getSouthWest().lat();

    var iwWestLng = position.lng() + (iwOffsetX - padX) * degPixelX;
    var iwEastLng = position.lng() + (iwOffsetX + iwWidth + padX) * degPixelX;
    var iwNorthLat = position.lat() - (iwOffsetY - padY) * degPixelY;
    var iwSouthLat = position.lat() - (iwOffsetY + iwHeight + padY) * degPixelY;

    var shiftLng =
        (iwWestLng < mapWestLng ? mapWestLng - iwWestLng : 0) +
        (iwEastLng > mapEastLng ? mapEastLng - iwEastLng : 0);
    var shiftLat =
        (iwNorthLat > mapNorthLat ? mapNorthLat - iwNorthLat : 0) +
        (iwSouthLat < mapSouthLat ? mapSouthLat - iwSouthLat : 0);

    var center = map.getCenter();

    var centerX = center.lng() - shiftLng;
    var centerY = center.lat() - shiftLat;

    map.setCenter(new google.maps.LatLng(centerY, centerX));

    google.maps.event.removeListener(this.boundsChangedListener_);
    this.boundsChangedListener_ = null;
};

InfoBox.prototype.setContent = function (_content) {
    this.content = _content;
}

InfoBox.prototype.close = function () {
    this.setMap(null);
}

InfoBox.prototype.open = function (mp, mk, pd) {

    if (pd == undefined)
        pd = 20;

    this.offsetPaddingTop = pd + 20;

    this.map_ = mp;
    this.latlng_ = mk.position;
    this.setMap(this.map_);
}