
// The custom tooltip class

// Constructor function
function Tooltip(opts) {

	// Initialization
	this.setValues(opts);
	this.map_ = opts.map;
	
	var div = this.div_ = document.createElement("div");
	// Class name of div element to style it via CSS
	div.className = "tooltip";
	this.markerDragging = false;
}


Tooltip.prototype = {

	// Define draw method to keep OverlayView happy
    draw: function () { },

    padding: 20,

	visible_changed: function () {
		var vis = this.get("visible");
		this.div_.style.visibility = vis ? "visible" : "hidden";
	},

	getPos: function (e) {
		var projection = this.getProjection();
		// Position of mouse cursor
		var pixel = projection.fromLatLngToDivPixel(e.latLng);
		var div = this.div_;

		// Adjust the tooltip's position
		var posX = pixel.x;
		var posY = pixel.y;

		//console.log('ogrinal: ' + posX + ' ' + posY);

		var menuwidth = div.offsetWidth;
		var menuheight = div.offsetHeight;
		// Right boundary of the map
		var boundsNE = this.map_.getBounds().getNorthEast();
		boundsNE.pixel = projection.fromLatLngToDivPixel(boundsNE);

		//console.log('bound: ' + boundsNE.pixel.x + ' ' + boundsNE.pixel.y);

		if (menuwidth + posX > boundsNE.pixel.x) {
			posX -= menuwidth;
		}

		//begin customize position
		posX = posX - (menuwidth / 2);
		if (posY - menuheight > 0) {
		    posY = posY - this.padding - menuheight;
		}
		//end customize position

		//console.log('last: ' + posX + ' ' + posY);

		div.style.left = posX + "px";
		div.style.top = posY + "px";

		if (!this.markerDragging) {
			this.set("visible", true);
		}
	},

	getPos2: function (latLng) {	// This is added to avoid using listener (Listener is not working when Map is quickly loaded with icons)
		var projection = this.getProjection();
		// Position of mouse cursor
		var pixel = projection.fromLatLngToDivPixel(latLng);
		var div = this.div_;

		// Adjust the tooltip's position
		var posX = pixel.x;
		var posY = pixel.y;

		//console.log('ogrinal: ' + posX + ' ' + posY);

		var menuwidth = div.offsetWidth;
		var menuheight = div.offsetHeight;
		// Right boundary of the map
		var boundsNE = this.map_.getBounds().getNorthEast();
		boundsNE.pixel = projection.fromLatLngToDivPixel(boundsNE);
		var boundsSW = this.map_.getBounds().getSouthWest();
		boundsSW.pixel = projection.fromLatLngToDivPixel(boundsSW);

	    //console.log('bound: ' + boundsNE.pixel.x + ' ' + boundsNE.pixel.y);

		posX = posX - (menuwidth / 2);

		if (posX < boundsSW.pixel.x) {
		    posX = boundsSW.pixel.x;
		}else if (menuwidth + posX > boundsNE.pixel.x) {
		    posX = posX - (menuwidth + posX - boundsNE.pixel.x);
		}

		if (posY - menuheight > 0) {
		    posY = posY - this.padding - menuheight;
		}

		//console.log('last: ' + posX + ' ' + posY);

		div.style.left = posX + "px";
		div.style.top = posY + "px";

		if (!this.markerDragging) {
			this.set("visible", true);
		}
	},

	addTip: function (marker) {
	    var me = this;

	    me.marker_ = marker;

	    this.padding = marker.getIcon().size.height;

		me.bindTo("text", me.marker_, "tooltip");
		var g = google.maps.event;
		var div = me.div_;

		div.innerHTML = me.get("text").toString();

		//console.log(div.innerHTML);

		me.marker_.setTitle(null);
		// Tooltip is initially hidden
		me.set("visible", false);
		// Append the tooltip's div to the floatPane
		me.getPanes().floatPane.appendChild(this.div_);

		// In IE this listener gets randomly lost after it's been cleared once.
		// So keep it out of the listeners array.
		g.addListener(me.marker_, "dragend", function () {
			me.markerDragging = false;
		});

		// Register listeners
		me.listeners = [
	  //   g.addListener(me.marker_, "dragend", function() {
	  //    me.markerDragging = false; }),	
		 g.addListener(me.marker_, "position_changed", function () {
		 	me.markerDragging = true;
		 	me.set("visible", false);
		 }),
		 g.addListener(me.map_, "mousemove", function (e) {
		 	//me.getPos(e);
		 })
		];
	},

	removeTip: function () {
		// Clear the listeners to stop events when not needed.
		if (this.listeners) {
			for (var i = 0, listener; listener = this.listeners[i]; i++) {
				google.maps.event.removeListener(listener);
			}
			delete this.listeners;
		}
		// Remove the tooltip from the map pane.
		var parent = this.div_.parentNode;
		if (parent) parent.removeChild(this.div_);
	}
};


function inherit(addTo, getFrom) {

	var from = getFrom.prototype;  // prototype object to get methods from
	var to = addTo.prototype;      // prototype object to add methods to
	for (var prop in from) {
		if (typeof to[prop] == "undefined") to[prop] = from[prop];
	}
}

// Inherits from OverlayView from the Google Maps API
inherit(Tooltip, google.maps.OverlayView);