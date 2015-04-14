// store list popup id
(function ($) {
	var chatPopup = function( options ) 
	{
	    var opts = $.extend( {}, $.fn.chatPopup.defaults, options );
	    var idChatPopup = "#chatPopup-" + opts.id;
	    var chatArea = $(".chat-container");
	    var chatroom = $(this);

	    var init = function () {
	        var right = opts.offset;
	        if ($.fn.chatPopupList > (opts.maxPopup - 1)) {
	            processRoom();
	        } else if ($.fn.chatPopupList == 0) {
	            // Khởi tạo collapse-chat-room
	            initCollapseRoom();
	        }

	        var divChatPopup = $("#chat-popup-template").tmpl({ id: opts.id, fullName : opts.fullName })
	            .css({
	                "width": opts.width,
	                "bottom": '0',
	                "right": right,
	                "position": "absolute"
	            })
	            .appendTo(chatArea);
	        $("#chat-popup-header-template").tmpl().appendTo(divChatPopup);
	        chatroom.appendTo(divChatPopup);
	        $(idChatPopup + " .chatPopup-header .header-title").append(opts.title);
	        $.fn.chatPopupList += 1;
	        
	        //Event
	        $(idChatPopup + " .header-icon .header-icon-close").click(function (e) {
                // Close room
	            closeChatRoom(opts.id);

	            /* Change requirement:
                 * Close room then add to collapse list
                 */
	            //var popup = $("#chatPopup-" + opts.id);
	            //popup.removeClass("show");
	            //$.fn.chatPopupShowList.remove(opts.id);
	            //var fullName = getFullName(popup);
	            //var productTitle = "";
	            //var productdiv = popup.find(".room-product-info");
	            //if (productdiv.length > 0) {
	            //    productTitle = productdiv.attr("productTitle");
	            //}

	            //addCollapseItem(opts.id, fullName, productTitle);

	            e.stopPropagation();
	            return false;
	        });

	        $(idChatPopup + " .header-icon .header-icon-minimize").click(function (e) {
	            if ($(idChatPopup).hasClass("chatPopup-header-maximinze")) {
	                maximizeOrMinimizePopup(opts.id, true);
	            } else {
	                maximizeOrMinimizePopup(opts.id, false);
	                $(idChatPopup + " .room-setting").removeClass("visible");
	            }

	            e.stopPropagation();
	            return false;
	        });

	        $(idChatPopup + " .chatPopup-header").click(function () {
	            if ($(idChatPopup).hasClass("chatPopup-header-maximinze")) {
	                maximizeOrMinimizePopup(opts.id, true);
	            } else {
	                maximizeOrMinimizePopup(opts.id, false);
	                $(idChatPopup + " .room-setting").removeClass("visible");
	            }
	        });

	        $(idChatPopup + " .header-icon .header-icon-setting").click(function(e) {
	            $(idChatPopup + " .room-setting").toggleClass("visible");
	            $(this).toggleClass("hover");
	            e.stopPropagation();
	            return false;
	        });

	        $(idChatPopup + " .room-setting .setting-colse").click(function () {
	            $(idChatPopup + " .room-setting").removeClass("visible");
	            $(idChatPopup + " .header-icon .header-icon-setting").removeClass("hover");
	        });

	        $(idChatPopup + " .room-setting").click(function(e) {
	            e.stopPropagation();
	            return false;
	        });

	        $(document).click(function () {
	            $(idChatPopup + " .room-setting").removeClass("visible");
	            $(idChatPopup + " .header-icon .header-icon-setting").removeClass("hover");
	        });

	        addRoomToCollapseRoom(opts.id);
	        showRoomById(opts.id);
	        autoPosition();

	        //if ($.fn.chatPopupShowList != null && $.fn.chatPopupShowList.length > 1) {
	        //    // Xóa room nếu chưa chat tin nhắn nào
	        //    var roomId = $.fn.chatPopupShowList[$.fn.chatPopupShowList.length - 1];
	        //    var first = $("#chatPopup-" + roomId);
	            
	        //    if (first.length > 0) {
	        //        var messages = first.find(".chatMessages .message");
	        //        var isClose = true;
	        //        if (messages.length > 0) {
	        //            for (var i = 0; i < messages.length; i++) {
	        //                if ($(messages[i]).attr("id") != "m-0") {
	        //                    isClose = false;
	        //                    break;
	        //                }
	        //            }
	        //        }
	        //        if (isClose) {
	        //            closeChatRoom(roomId);
	        //        }
	        //    }
            //}
	    };

        // process when new room created
	    var processRoom = function () {
	        if ($.fn.chatPopupShowList != null && $.fn.chatPopupShowList.length > 0)
	        {
	            var first = $("#chatPopup-" + $.fn.chatPopupShowList[0]);
                first.removeClass("show");
                var roomId = $.fn.chatPopupShowList[0];
                $.fn.chatPopupShowList.removeItem(roomId);

	            // Focus to collapse item
                var collapseItem = $("#collapse-room-item-" + roomId);
                if (collapseItem.length > 0) {
                    collapseItem.removeClass("active");
                }
            }
        }

        // show room from collapse room
        var showCollapeRoom = function (roomId) {
            processRoom();
            showRoomById(roomId);
            autoPosition();
        }

        // display room by id
	    var showRoomById = function(roomId) {
	        $("#chatPopup-" + roomId).addClass("show");
	        $.fn.chatPopupShowList.addItem(roomId.toString());

	        // Focus to collapse item
	        var collapseItem = $("#collapse-room-item-" + roomId);
	        if (collapseItem.length > 0) {
	            collapseItem.addClass("active");
	        }

	        maximizeOrMinimizePopup(roomId, true);
	    };

        // process close chat room
	    var closeChatRoom = function (roomId) {
	        $('#divChatWithBDS').show();
            $("#chatPopup-" + roomId).remove();
            $.fn.chatPopupList -= 1;
            $.fn.chatPopupShowList.removeItem(roomId.toString());
            removeCollapseItem(roomId);

            // Nếu room hiển thị nhỏ hơn maxPopup và nhỏ hơn room đang có thì load room collapse
            if ($.fn.chatPopupShowList.length < opts.maxPopup && $.fn.chatPopupList > $.fn.chatPopupShowList.length) {
                var first = $(".collapse-room-item:first");
                if (first != undefined) {
                    var colroomId = getRoomId(first);
                    //removeCollapseItem(colroomId);
                    showRoomById(colroomId);
                }
            }
            autoPosition();
            opts.close(roomId);

            // Xóa collapse-chat-room khi không còn room nào
            if ($.fn.chatPopupList == 0) {
                $(".collapse-chat-room").remove();
            }
        }

        // init collapse room
        var initCollapseRoom = function () {
            $('#chat-collapse-room-template').tmpl().appendTo($(".list-chat-room"));

	        $('.link-collapse-room').click(function () {
	            $('.collapse-chat-room-relative').toggleClass('active');
	        });

            $('.collapse-chat-room .header-icon-close').click(function(e) {
                collapseRoomCloseClick();
                e.stopPropagation();
                return false;
            });

            $('.collapse-chat-room .header-icon-minimize').click(function (e) {
                $('.collapse-chat-room').toggleClass("minimize");
                e.stopPropagation();
                return false;
            });

            $('.collapse-chat-room .collapse-chat-room-header').click(function () {
                $('.collapse-chat-room').toggleClass("minimize");
            });

            //$(document).click(function () {
            //    displayItemCollapse(false);
            //});

            //$(".collapse-chat-room").click(function (e) {
            //    e.stopPropagation(); // This is the preferred method.
            //    return false;        // This should not be used unless you do not want
            //    // any click events registering inside the div
            //});
        };

	    // Add room to collapse rooms
        var addRoomToCollapseRoom = function (roomId) {
            var first = $("#chatPopup-" + roomId);
            first.removeClass("show");
            var fullName = getFullName(first);
            var productTitle = "";
            var productdiv = first.find(".room-product-info");
            if (productdiv.length > 0) {
                productTitle = productdiv.attr("productTitle");
            }
            addCollapseItem(roomId, fullName, productTitle);
        }

        // Add collapse item
        var addCollapseItem = function (roomId, fullName, productTitle) {
            var item = $("#chat-collapse-room-item-template").tmpl({ roomId: roomId, fullName: (productTitle == '' ? fullName : fullName + " - " + productTitle)});
	        item.prependTo($('.collapse-room-list'));

            //$('.collapse-room-list').append(item);

	        //  update status 
	        updateStatus(roomId, $("#chatRoomHeader-" + roomId + " .user-status").hasClass("online-status"));

            // close room
	        //item.find(".collapse-room-item-close").click(function () {
	        //    collapseItemCloseClick(this);
	        //});

            // open room
	        item.click(function() {
	            collapseItemClick(this);
	        });
	    };

        // Auto position for all popup
	    var autoPosition = function () {
	        for (var i = 0; i < $.fn.chatPopupShowList.length; i++)
	        {
	            $("#chatPopup-" +$.fn.chatPopupShowList[i]).css("right", (opts.width + opts.offset) * i + opts.right);
	        }

	        if ($.fn.chatPopupList > 0) {
	            $(".collapse-chat-room").show();
	            $(".collapse-chat-room").css("right", (opts.width + opts.offset) * opts.maxPopup + opts.right);
	        } else {
	            $(".collapse-chat-room").hide();
	        }

            // Count collapse item
	        calCollapseCount();
	    };

	    // update collapse items number
	    var calCollapseCount = function () {
	        $(".link-collapse-room-number").text("Danh sách đã chat (" + $(".collapse-room-item").length + ")");
	    };

	    // handle event click close room from collapse item
	    var collapseItemCloseClick = function(control) {
	        var roomid = getRoomId(control);
	        removeCollapseItem(roomid);
	        closeChatRoom(roomid);
	        displayItemCollapse(false);
	    };

        // handle event click collpase item to display popup
	    var collapseItemClick = function(control) {
	        var roomId = getRoomId(control);
	        //removeCollapseItem(roomId);
	        showCollapeRoom(roomId);
	        //displayItemCollapse(false);
	    };

	    // handle event close all collapse rooom
	    var collapseRoomCloseClick = function() {
	        var collapseItem = $(".collapse-room-item");
	        if (collapseItem.length > 0) {
	            var roomId;
	            var item;
	            for (var i = 0; i < collapseItem.length ; i++) {
	                item = $(collapseItem[i]);
	                roomId = getRoomId(item);
	                //removeCollapseItem(roomId);
	                closeChatRoom(roomId);
	            }
	        }
	    };

        // delete collapse item
	    var removeCollapseItem = function (roomId) {
	        $('#collapse-room-item-' + roomId).remove();
	    };

	    // Get attribute roomId
        var getRoomId = function(control) {
            return $(control).attr("roomId");
        }

        // Get attribute fullName
        var getFullName = function(control) {
            return $(control).attr("fullName");
        }

        //Display collapse
        var displayItemCollapse = function (isDisplay) {
            if (isDisplay) {
                $('.collapse-chat-room-relative').addClass('active');
            } else {
                $('.collapse-chat-room-relative').removeClass('active');
            }
        };

        // maximum popup
        var maximizeOrMinimizePopup = function (roomId, isMaximize) {
            if (isMaximize) {
                $("#chatPopup-" + roomId).removeClass("chatPopup-header-maximinze");
                $('#messages-' + roomId).scrollTop($('#messages-' + roomId).prop('scrollHeight'));
                $('#newmessage-' + roomId).focus();
            } else {
                $("#chatPopup-" + roomId).addClass("chatPopup-header-maximinze");
            }
            updateCookie();
        }

        var updateStatus = function(roomId, isOnline) {
            if (isOnline) {

                $("#collapse-room-item-" + roomId + " a").addClass("user-online");
            } else {
                $("#collapse-room-item-" + roomId + " a").removeClass("user-online");
            }
        };

	    // update room number unread message
	    var updateRoomUnread = function() {
	        var collapseItem = $(".collapse-room .collapse-room-item");
	        var count = 0;
	        if (collapseItem.length > 0) {
	            for (var i = 0; i < collapseItem.length; i++) {
	                if ($(collapseItem[i]).find(".unread-count").text().length > 0) {
	                    count++;
	                }
	            }
	        }

	        var item = $(".collapse-chat-room .link-chat-bds-header-number");
	        if (count > 0) {
	            item.show();
                item.text(count);
            } else {
	            item.text('');
	            item.hide();
	        }
	    };

        // update cookie
	    var updateCookie = function() {
	        BDSChat.setCookie();
	    };

	    // ============  public method ===========

        // display room
        this.displayRoomExternal = function (roomId) {
            if ($.inArray(roomId.toString(), $.fn.chatPopupShowList) == -1) {
                //removeCollapseItem(roomId);
                showCollapeRoom(roomId);
            } else {
                maximizeOrMinimizePopup(roomId, true);
            }
        };

        // Maximize or minimize popup
	    this.minimizeOrMaximizeExternal = function(roomId, isMaximize) {
	        maximizeOrMinimizePopup(roomId, isMaximize);
	    };

        // Update status
	    this.updateStatusExternal = function (roomId, isOnline) {
	        updateStatus(roomId, isOnline);
	    };

	    // Update message unread
	    this.addUnreadMessageExternal = function (roomId, count) {
	        var unreadItem = $("#collapse-room-item-" + roomId + " .unread-count");
	        var unreadHeader = $("#chatRoomHeader-" + roomId + " .unread-count");
	        if (unreadItem.length > 0) {
	            if (count == 0) {
	                unreadItem.text("");
	                unreadHeader.text("");
	            } else {
	                unreadItem.text("(" + count + ")");
	                unreadHeader.text("(" + count + ")");
	            }
	        }
	        updateRoomUnread();
	    };

        // Init popup chat
	    init();

	    return this;
	};
	$.fn.chatPopup = chatPopup;
	$.fn.chatPopupShowList = new Array();
	$.fn.chatPopupList = 0;

	// Plugin defaults – added as a property on our plugin function.
    $.fn.chatPopup.defaults = {
        id: '',
        fullName: '',
        title: '',
        offset: 5,
        right: 255,
        maxPopup: 1,
        width: 245,
		close: null
    };
}(jQuery));