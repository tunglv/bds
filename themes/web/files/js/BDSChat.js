var chatServerUrl = "";
var senderId = '';
var senderName = '';
var productId = 0;
var chatPK = '';
var userChatInfo = null;
var supportUserOnline = new Array();

BDSChat = new function () {
    var chatRooms = 0;
    //var numRand = logintUserId != 0 ? logintUserId : Math.floor(Math.random() * 1000);
    //var senderId = numRand;
    //var senderName = logintUserId != 0 ? loginFullName: ('User ' + numRand);
    //var senderId = logintUserId;
    //var senderName = loginFullName;

    var rooms = [];
    var timeType =
    {
        Year: "year",
        Month: "month",
        Day: "day",
        Hour: "hour",
        Minute: "minute",
        Second: "second"
    };

    var handlerUrl = "/HandlerWeb/ChatHandler.ashx";
    var cookieRoomName = "CHAT_ROOM";
    var roomHistories = null;
    var classTimeChat = "chat-time-";
    var defaultAvatar = "/images/no-avatar.png";
    var defaultProductImage = "/themes/web/files/images/no-photo.jpg";
    var defaultSupportAvatar = "/images/support-avatar.png";
    var chatSoundUrl = "/Modules/Chats/scripts/ChatSound.mp3";
    var offsetTime = 60; // 1h * 60
    var isAdmin = false;
    var isUserMgr = false;

    this.chatServer = null;
    var emoticonOpt = {
        handle: '#etoggle',
        dir: '/images/emoticons/',
        label: 'On Emoticons',
        style: 'background: #eee',
        css: 'class2'
    };

    window.onbeforeunload = function () {
        if (chatRooms > 0) {
            //return "All chat instances will be ended!";
            // Close room before unload tab/broswer
            BDSChat.closeAllRoom();
        }
    };

    var $this = this;
    this.attachEvents = function () {
        BDSChat.addChatArea();
        //$("#userNameLabel").html(senderName);
        if ($.connection != null) {
            $.connection.hub.url = chatServerUrl + '/signalr/hubs';
            $.connection.hub.qs = "__ui=" + encodeURIComponent(senderId) + "&__un=" + encodeURIComponent(senderName) + (chatPK != null && chatPK != '' && isAdmin ? "&__pk=" + encodeURIComponent(chatPK) : '');
            $this.chatServer = $.connection.chatServer;
            $.connection.hub.start({ transport: 'auto' }, function () {
                // Empty
            }).fail(function (e) {
                chatBrowserLog("Could not connect chat hub: " + e.toString());
            }).done(function () {
                if (!isAdmin) {
                    BDSChat.loadStaff();
                    BDSChat.loadUnreadMessageForMenu();
                }
                BDSChat.loadRoomFromCookie();

                if (typeof BDSChatAdminInbox != 'undefined') {

                    BDSChatAdminInbox.requestListOnlineUsers();
                }

                // 30s check xem user có còn online ko?
                setInterval(function () { BDSChat.keepConnected(); }, 30000);
            });
        }

    };

    this.registerEvents = function () {
        if ($.connection != null) {

            $.connection.chatServer.client.initiateChatUI = function (chatRoom, isOnline, guestInfo, totalUnread) {
                //var chatRoomDiv = $('#chatRoom-' + chatRoom.chatRoomId);
                //if (($(chatRoomDiv).length > 0)) {
                if (rooms[chatRoom.chatRoomId] != undefined) {
                    if (rooms[chatRoom.chatRoomId].popup != null) {
                        rooms[chatRoom.chatRoomId].popup.displayRoomExternal(chatRoom.chatRoomId);
                    }
                }
                else {
                    var toUserId = chatRoom.toUserId != senderId ? chatRoom.toUserId : chatRoom.fromUserId;
                    rooms[chatRoom.chatRoomId] = {
                        popup: null,
                        oldTime: null,
                        lastTime: null,
                        toUserId: toUserId,
                        avatarUrl: null,
                        fileId: null,
                        highLightFunc: null,
                        productId: chatRoom.productId,
                        isLoadHistory: true,
                        totalUnread: totalUnread,
                        isChatSound: true,
                        isSendEmail: true,
                        sendEmail: userChatInfo.Email
                        //isMaximize: true,
                    };

                    $('#divChatWithBDS').hide();
                    var e = $('#new-chatroom-template').tmpl(chatRoom);
                    var c = $('#new-chat-header').tmpl(chatRoom);

                    var divChatMessage = e.find('.chatMessages');

                    // load avatar
                    // BDSChat.getAvatar(null, chatRoom, null);
                    chatRooms++;

                    if (!isAdmin) {
                        // Product details
                        if (chatRoom.productId > 0) {
                            BDSChat.loadProductDetail(divChatMessage, chatRoom, isOnline);
                            divChatMessage.css("height", 184);
                        } else {
                            if (BDSChat.loadSupportDetail(divChatMessage, chatRoom, isOnline)) {

                                // fix popup support bds
                                c.find(".user-status").css("display", "none");
                                c.find(".user-status").after($("<span />").addClass("link-chat-bds-header"));
                                c.addClass("chat-header-bds");
                                divChatMessage.css("height", 184);
                            } else {
                                divChatMessage.css("height", 280);
                            }

                        }
                    }

                    // Add online User
                    if (isOnline) {
                        c.find(".user-status").addClass("online-status");
                        c.find(".link-chat-bds-header").removeClass("offline-status");
                    } else {
                        c.find(".user-status").removeClass("online-status");
                        c.find(".link-chat-bds-header").addClass("offline-status");
                    }

                    if (!isUserMgr) {
                        rooms[chatRoom.chatRoomId].popup = e.chatPopup({
                            "id": chatRoom.chatRoomId,
                            "fullName": BDSChat.getFullName(chatRoom.chatUsers),
                            "title": c,
                            "close": function (roomId) {
                                //delete rooms[parseInt(roomId)];
                                //BDSChat.setCookie();
                                //BDSChat.endChat(roomId.toString());
                                BDSChat.closeRoom(roomId);
                            }
                        });
                    }

                    //rooms[chatRoom.chatRoomId].popup = e.chatPopup({
                    //    "id": chatRoom.chatRoomId,
                    //    "fullName": BDSChat.getFullName(chatRoom.chatUsers),
                    //    "title": c,
                    //    "close": function (roomId) {
                    //        //delete rooms[parseInt(roomId)];
                    //        //BDSChat.setCookie();
                    //        //BDSChat.endChat(roomId.toString());
                    //        BDSChat.closeRoom(roomId);
                    //    }
                    //});

                    // update popup minimize or maximize
                    BDSChat.loadMaximizeOrMinimize(chatRoom.chatRoomId, toUserId);
                    BDSChat.updateUnreadMessage();

                    // Get history
                    rooms[chatRoom.chatRoomId].isLoadHistory = false;
                    BDSChat.requestHistory(chatRoom.chatRoomId);


                    $('#newmessage-' + chatRoom.chatRoomId).focus(function () {
                        if (!$(this).hasClass("text-focus")) {
                            $(this).addClass("text-focus");
                        }

                        var roomId = parseInt($(this).attr("id").split("-")[1]);
                        if (rooms[roomId] != undefined && rooms[roomId].popup != null) {
                            rooms[roomId].popup.addUnreadMessageExternal(roomId, 0);
                        }

                        // Update read message for room by roomId and sender id 
                        if (roomHistories == null || roomHistories.length == 0) {
                            //console.log(roomId + '-------------' + roomHistories.length);
                            $this.chatServer.server.updateReadMessage(roomId);
                        }
                    });

                    $('#newmessage-' + chatRoom.chatRoomId).blur(function () {
                        if ($(this).hasClass("text-focus")) {
                            $(this).removeClass("text-focus");
                        }
                    });

                    $('#newmessage-' + chatRoom.chatRoomId).focus();

                    $("#messages-" + chatRoom.chatRoomId).scroll(function () {
                        if ($(this).scrollTop() == 0) {
                            var roomId = parseInt($(this).attr("id").split("-")[1]);
                            if (rooms[roomId].isLoadHistory) {
                                BDSChat.requestHistory(roomId);
                            }
                        }
                    });

                    $('#sendmessage-' + chatRoom.chatRoomId).keypress(function (e) {
                        if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
                            $('#chatsend-' + chatRoom.chatRoomId).click();
                            return false;
                        }
                    });
                    // Emoticons
                    $('#pnlEmoticions-' + chatRoom.chatRoomId).click(function (e) {
                        var pos = $(this).offset();
                        var width = $(this).outerWidth();
                        var height = $(this).outerHeight();
                        //var postLeft = Math.floor(($('#emoticons').outerWidth() - $(this).outerWidth()) / 2);
                        $('.emoticons').attr('rel', chatRoom.chatRoomId).css({
                            position: "absolute",
                            top: (pos.top - $('.emoticons').outerHeight()) + "px",
                            left: (pos.left - $('.emoticons').outerWidth() + width) + "px"
                        });
                        //.slideToggle(300);
                        e.stopPropagation();
                        showIconTable();
                    });

                    // event for chat setting
                    if (!isAdmin) {
                        var chatPopup = $("#chatPopup-" + chatRoom.chatRoomId);
                        if (!userChatInfo.IsGuest) {
                            chatPopup.find('.edit-user-info').hide();
                            chatPopup.find('.setting-phone').hide();
                            chatPopup.find('.setting-email').hide();
                        } else {
                            chatPopup.find('.setting-phone input').val(userChatInfo.PhoneNumber);
                            chatPopup.find('.setting-email input').val(userChatInfo.Email);
                        }


                        if (rooms[chatRoom.chatRoomId].isChatSound) {
                            chatPopup.find(".divIsRoomSound input").val("1");
                            chatPopup.find(".divIsRoomSound").css("background-image", 'url(/Modules/Chats/styles/images/chat-checked-icon.png)');
                        } else {
                            chatPopup.find(".divIsRoomSound input").val("0");
                            chatPopup.find(".divIsRoomSound").css("background-image", 'url(/Modules/Chats/styles/images/chat-unchecked-icon.png)');
                        }

                        if (rooms[chatRoom.chatRoomId].isSendEmail) {
                            chatPopup.find(".divIsSendEmail input").val("1");
                            chatPopup.find(".divIsSendEmail").css("background-image", 'url(/Modules/Chats/styles/images/chat-checked-icon.png)');
                        } else {
                            chatPopup.find(".divIsSendEmail input").val("0");
                            chatPopup.find(".divIsSendEmail").css("background-image", 'url(/Modules/Chats/styles/images/chat-unchecked-icon.png)');
                        }

                        chatPopup.find('.divTxtSendEmail input').val(rooms[chatRoom.chatRoomId].sendEmail);

                        $("#chatPopup-" + chatRoom.chatRoomId + " .divIsRoomSound").click(function () {
                            var input = $(this).find("input");
                            if (input.val() == "1") {
                                //rooms[chatRoom.chatRoomId].isChatSound = false;
                                input.val("0");
                                $(this).css("background-image", 'url(/Modules/Chats/styles/images/chat-unchecked-icon.png)');
                            } else {
                                input.val("1");
                                //rooms[chatRoom.chatRoomId].isChatSound = true;
                                $(this).css("background-image", 'url(/Modules/Chats/styles/images/chat-checked-icon.png)');
                            }
                            //BDSChat.setCookie();
                        });

                        $("#chatPopup-" + chatRoom.chatRoomId + " .divIsSendEmail").click(function () {
                            var input = $(this).find("input");
                            if (input.val() == "1") {
                                //rooms[chatRoom.chatRoomId].isSendEmail = false;
                                input.val("0");
                                $(this).css("background-image", 'url(/Modules/Chats/styles/images/chat-unchecked-icon.png)');
                            } else {
                                input.val("1");
                                //rooms[chatRoom.chatRoomId].isSendEmail = true;
                                $(this).css("background-image", 'url(/Modules/Chats/styles/images/chat-checked-icon.png)');
                            }
                            //BDSChat.setCookie();
                        });

                        $("#chatPopup-" + chatRoom.chatRoomId + " a.btnsave").click(function () {
                            var sendEmail = $("#chatPopup-" + chatRoom.chatRoomId + ' .divTxtSendEmail input').val().trim();
                            var email = $("#chatPopup-" + chatRoom.chatRoomId + ' .setting-email input').val().trim();
                            var phoneNumber = $("#chatPopup-" + chatRoom.chatRoomId + ' .setting-phone input').val().trim();
                            if (sendEmail.length <= 0 || !BDSChat.checkEmail(sendEmail)) {
                                alert("Bạn phải nhập đúng định dạng email để nhận lịch sử chat.");
                                $("#chatPopup-" + chatRoom.chatRoomId + ' .divTxtSendEmail input').focus();
                                return;
                            }

                            if (userChatInfo.IsGuest) {
                                if (email.length <= 0 || !BDSChat.checkEmail(email)) {
                                    alert("Bạn phải nhập đúng định dạng email.");
                                    $("#chatPopup-" + chatRoom.chatRoomId + ' .setting-email input').focus();
                                    return;
                                }

                                if (phoneNumber.length <= 0 || !BDSChat.checkPhoneNumber(phoneNumber)) {
                                    //alert("Bạn phải nhập số điện thoại. Số điện thoại phải là số và số ký tự lớn hơn hoặc bằng 8, nhỏ hơn hoặc bằng 12  ");
                                    alert("Số điện thoại không hợp lệ.");
                                    $("#chatPopup-" + chatRoom.chatRoomId + ' .setting-phone input').focus();
                                    return;
                                }
                            }
                            rooms[chatRoom.chatRoomId].sendEmail = sendEmail;
                            rooms[chatRoom.chatRoomId].isChatSound = $("#chatPopup-" + chatRoom.chatRoomId + ' .divIsRoomSound input').val() == '1';
                            rooms[chatRoom.chatRoomId].isSendEmail = $("#chatPopup-" + chatRoom.chatRoomId + ' .divIsSendEmail input').val() == '1';
                            BDSChat.setCookie();

                            if (userChatInfo.IsGuest) {
                                $this.chatServer.server.saveGuestInfo(senderId, email, phoneNumber);
                                $('.chatPopup .setting-phone input').val(phoneNumber);
                                $('.chatPopup .setting-email input').val(email);

                                userChatInfo.Email = email;
                                userChatInfo.PhoneNumber = phoneNumber;

                                // update cookie
                                $.ajax({
                                    url: handlerUrl + "?action=updatechatuser",
                                    data: { email: email, phone: phoneNumber },
                                    success: function (data) {
                                    }
                                });
                            }
                            alert("Lưu thông tin thành công.");
                        });

                        $("#chatPopup-" + chatRoom.chatRoomId + " .setting-spam a").click(function () {
                            $this.chatServer.server.reportSpam(chatRoom.chatRoomId);
                            alert("Phản hồi của bạn đã được gửi đến quản trị.");
                        });

                        $("#chatPopup-" + chatRoom.chatRoomId + " a.btnclear").click(function () {
                            var cPopup = $("#chatPopup-" + chatRoom.chatRoomId);

                            if (rooms[chatRoom.chatRoomId].isChatSound) {
                                cPopup.find(".divIsRoomSound input").val("1");
                                cPopup.find(".divIsRoomSound").css("background-image", 'url(/Modules/Chats/styles/images/chat-checked-icon.png)');
                            } else {
                                cPopup.find(".divIsRoomSound input").val("0");
                                cPopup.find(".divIsRoomSound").css("background-image", 'url(/Modules/Chats/styles/images/chat-unchecked-icon.png)');
                            }

                            if (rooms[chatRoom.chatRoomId].isSendEmail) {
                                cPopup.find(".divIsSendEmail input").val("1");
                                cPopup.find(".divIsSendEmail").css("background-image", 'url(/Modules/Chats/styles/images/chat-checked-icon.png)');
                            } else {
                                cPopup.find(".divIsSendEmail input").val("0");
                                cPopup.find(".divIsSendEmail").css("background-image", 'url(/Modules/Chats/styles/images/chat-unchecked-icon.png)');
                            }

                            cPopup.find('.setting-phone input').val(userChatInfo.PhoneNumber);
                            cPopup.find('.setting-email input').val(userChatInfo.Email);

                            cPopup.find('.divTxtSendEmail input').val(rooms[chatRoom.chatRoomId].sendEmail);
                        });
                    }
                    // Set cookie
                    BDSChat.setCookie();

                    // Check guest Offline
                    if (!isOnline && guestInfo != null) {
                        var newMsg = $('#newmessage-' + chatRoom.chatRoomId);
                        newMsg.val("Liên hệ với khách hàng qua SĐT: " + guestInfo.Phone + " hoặc qua email " + guestInfo.Email);
                        newMsg.prop('disabled', true);
                        newMsg.css({
                            "background-color": "#fff",
                            "font-style": "italic"
                        });
                        autoResizeTextArea(newMsg);
                    }
                }
            };

            //$.connection.chatServer.client.updateChatUI = function (chatRoom) {
            //    var chatRoomHeader = $('#chatRoomHeader-' + chatRoom.chatRoomId);
            //    var c = $('#new-chat-header').tmpl(chatRoom);
            //    chatRoomHeader.html(c);
            //};

            $.connection.chatServer.client.receiveChatMessage = function (chatMessage, chatRoom, isOnline) {

                //gắn thẻ a vào link in message chat
                var reLinkInMess = /http:\/\/.*[^\s+$]/.exec(chatMessage.messageText);
                if (reLinkInMess != null && reLinkInMess.length > 0) {
                    chatMessage.messageText = chatMessage.messageText.replace(reLinkInMess, '<a target="_blank" href="' + reLinkInMess + '">' + reLinkInMess + '</a>');
                }


                if (rooms[chatRoom.chatRoomId] == undefined) {
                    $.connection.chatServer.client.initiateChatUI(chatRoom, isOnline, null, 0);

                    // Kiểm tra nếu load history có rồi thì không hiển thị tin nhắn nữa
                    if ($("#m-" + chatMessage.chatMessageId).length > 0) {
                        return;
                    }
                }

                var chatRoomDiv = $('#chatRoom-' + chatMessage.chatRoomId);
                var chatRoomMessages = $('#messages-' + chatMessage.chatRoomId);
                BDSChat.processDatetime(chatMessage, chatRoomMessages);
                var e;
                if (senderId == chatMessage.senderId) {
                    e = $('#new-message-template-right').tmpl(chatMessage).appendTo(chatRoomMessages);
                } else {
                    e = $('#new-message-template-left').tmpl(chatMessage).appendTo(chatRoomMessages);
                    BDSChat.getAvatar(chatMessage, chatRoom, e);

                    // Mark unread message
                    var isUnread = false;
                    if (rooms[chatMessage.chatRoomId].popup != null && (!rooms[chatMessage.chatRoomId].popup.hasClass("show") || rooms[chatMessage.chatRoomId].popup.hasClass("chatPopup-header-maximinze"))) {
                        isUnread = true;
                    } else {
                        $this.chatServer.server.updateReadMessage(chatRoom.chatRoomId);

                        //if ($('#newmessage-' + chatRoom.chatRoomId).hasClass("text-focus")) {
                        //    chatServer.server.updateReadMessage(chatRoom.chatRoomId);
                        //} else {
                        //    isUnread = true;
                        //}
                    }

                    if (isUnread) {
                        // highlight popup
                        if (rooms[chatMessage.chatRoomId].highLightFunc != null) clearTimeout(rooms[chatMessage.chatRoomId].highLightFunc);
                        rooms[chatMessage.chatRoomId].highLightFunc = setTimeout('BDSChat.highlightChatRoom("' + chatMessage.chatRoomId + '");', 1000);

                        rooms[chatMessage.chatRoomId].totalUnread += 1;
                        if (rooms[chatMessage.chatRoomId] != undefined && rooms[chatMessage.chatRoomId].popup != null) {
                            rooms[chatMessage.chatRoomId].popup.addUnreadMessageExternal(chatRoom.chatRoomId, rooms[chatMessage.chatRoomId].totalUnread);
                        }

                        //if (isAdmin)
                        //{
                        //    var unreadRoom = $('#list-inbox-unread-item-' + chatRoom.chatRoomId);
                        //    if (unreadRoom.length <= 0) {
                        //        $(".list-inbox-unread-content ul").append('<li id="list-inbox-unread-item-' + chatRoom.chatRoomId + '"><a onclick="javascript:BDSChat.initiateChat(\'' + (chatMessage.senderId) + '\',\'' + chatRoom.productId + '\');" href="javascript:;">' + BDSChat.getFullName(chatRoom.chatUsers) + '</a></li>');
                        //        var unreadCount = $(".list-inbox-unread-count span");
                        //        var count = (parseInt(unreadCount.text().substring(1, unreadCount.text().length - 1)) + 1);
                        //        unreadCount.text("(" + count + ")");
                        //    }
                        //}
                        if (typeof BDSChatAdminInbox != 'undefined') {
                            if (isAdmin) {
                                BDSChat.marqeePageTitle();
                            }
                            BDSChatAdminInbox.addUnreadMessage(chatMessage, chatRoom);
                        }
                    }
                    if (rooms[chatMessage.chatRoomId].isChatSound) {
                        BDSChat.playSound();
                    }
                }
                if (typeof (e) != 'undefined') {
                    // Format Emoticons
                    e.emoticons(emoticonOpt);
                    //e[0].scrollIntoView();
                }
                //chatRoomDiv[0].scrollIntoView(); // not use scrollIntoView because this will error in chrome: scroll div -> scroll window
                chatRoomMessages.scrollTop(chatRoomMessages[0].scrollHeight);
            };

            $.connection.chatServer.client.receiveLeftChatMessage = function (chatMessage) {
                // BichTV comment
                //var chatRoom = $('#chatRoom-' + chatMessage.chatRoomId);
                //var chatRoomMessages = $('#messages-' + chatMessage.chatRoomId);
                //var e = $('#new-notify-message-template').tmpl(chatMessage).appendTo(chatRoomMessages);
                ////e[0].scrollIntoView();
                //$("#messages-" + chatRoom.chatRoomId).scrollTop($("#messages-" + chatRoom.chatRoomId)[0].scrollHeight);
            };

            $.connection.chatServer.client.receiveEndChatMessage = function (chatMessage) {
                // BichTV comment
                //var chatRoom = $('#chatRoom-' + chatMessage.chatRoomId);
                //var chatRoomMessages = $('#messages-' + chatMessage.chatRoomId);
                //var chatRoomText = $('#newmessage-' + chatMessage.chatRoomId);
                //var chatRoomSend = $('#chatsend-' + chatMessage.chatRoomId);
                //var chatRoomEndChat = $('#chatend-' + chatMessage.chatRoomId);

                //var e = $('#new-notify-message-template').tmpl(chatMessage).appendTo(chatRoomMessages);

                //chatRoomText.hide();
                //chatRoomSend.hide();
                //chatRoomEndChat.hide();

                //e[0].scrollIntoView();
                //chatRoom[0].scrollIntoView();

                chatRooms--;
            };

            $.connection.chatServer.client.updateOnlineContacts = function (user) {
                BDSChat.updateStatusUserForRoom(user, true);
                if (typeof BDSChatAdminInbox != 'undefined') {
                    BDSChatAdminInbox.updateOnlineUser(user);
                }
            };

            $.connection.chatServer.client.updateOfflineContacts = function (user) {
                BDSChat.updateStatusUserForRoom(user, false);
                if (typeof BDSChatAdminInbox != 'undefined') {
                    BDSChatAdminInbox.updateOfflineUser(user);
                }
            };

            $.connection.chatServer.client.receiveErrorMessage = function (errorMessage) {
                if (errorMessage.chatRoomId != "") {
                    var chatRoomMessages = $('#messages-' + errorMessage.chatRoomId);
                    var divError = $('#chat-message-error-template').tmpl(errorMessage);
                    chatRoomMessages.after(divError);
                    var errorHeight = divError.height() + 1;
                    chatRoomMessages.css('height', chatRoomMessages.height() - errorHeight);
                    setTimeout(function () {
                        divError.remove();
                        chatRoomMessages.css('height', chatRoomMessages.height() + errorHeight);
                    }, 3000);
                } else {
                    chatBrowserLog(errorMessage.messageText);
                }
            }

            $.connection.chatServer.client.receiveHistoryMessage = function (chatMessages, chatRoom, currentTime) {
                if (chatMessages.length > 0) {
                    for (var i = 0; i < chatMessages.length; i++) {
                        BDSChat.loadChatHistoryMessage(chatMessages[i], chatRoom, currentTime);
                    }
                    if (rooms[chatRoom.chatRoomId].isLoadHistory == false) {
                        rooms[chatRoom.chatRoomId].isLoadHistory = true;
                        if ($("#messages-" + chatRoom.chatRoomId)[0] != undefined) {
                            $("#messages-" + chatRoom.chatRoomId).scrollTop($("#messages-" + chatRoom.chatRoomId)[0].scrollHeight);
                        }
                    } else {
                        $("#messages-" + chatRoom.chatRoomId).scrollTop(50);
                    }

                } else {
                    rooms[chatRoom.chatRoomId].isLoadHistory = false;
                }
            }

            $.connection.chatServer.client.receiveSupporter = function (chatUsers) {
                var ul = $('.chat-container').find(".lst-support ul");

                //fix sắp xếp thứ tự supporter
                //var arrSupporterId = ['kZFt7Jy+9z8=', 'Rtds5O2+YXY=', 'g7lXfrP/UbE=', 'DRabv9EtRX8=', ];
                //arrSupporterId.forEach(function (uid) {
                //    var resultUser = $.grep(chatUsers, function (e, i) {
                //        return e.UserId == uid;
                //    });
                //    if (resultUser.length > 0) {
                //        chatUserChild = resultUser[0];

                //        var avatarUrl = defaultSupportAvatar;
                //        $.ajax({
                //            url: handlerUrl + '?action=getavatar&fileid=' + (chatUserChild.Avatar == null ? "" : chatUserChild.Avatar),
                //            async: false,
                //            success: function (data) {
                //                if (data.avatarUrl.length > 0) {
                //                    avatarUrl = data.avatarUrl;
                //                }
                //            }
                //        });

                //        var item = $("#chat-lst-support-template").tmpl({
                //            UserId: chatUserChild.UserId,
                //            FullName: chatUserChild.FullName,
                //            AvatarUrl: avatarUrl,
                //            IsOnline: (chatUserChild.IsOnline ? 'online' : '')
                //        });

                //        item.click(function () {
                //            $(".list-chat-room").removeClass("active");
                //        });

                //        item.find("img").error(function () {
                //            $(this).attr("src", defaultSupportAvatar);
                //        });

                //        ul.append(item);
                //    }

                //});

                for (var i = 0; i < chatUsers.length; i++) {
                    // Using ajax load avatar
                    var avatarUrl = defaultSupportAvatar;
                    $.ajax({
                        url: handlerUrl + '?action=getavatar&fileid=' + (chatUsers[i].Avatar == null ? "" : chatUsers[i].Avatar),
                        async: false,
                        success: function (data) {
                            if (data.avatarUrl.length > 0) {
                                avatarUrl = data.avatarUrl;
                            }
                        }
                    });

                    if (!chatUsers[i].IsOnline) {
                        avatarUrl = '/images/support-avatar-offline.png';
                    }
                    else {
                        supportUserOnline.push(chatUsers[i].UserId);
                    }

                    var item = $("#chat-lst-support-template").tmpl({
                        UserId: chatUsers[i].UserId,
                        FullName: chatUsers[i].FullName,
                        AvatarUrl: avatarUrl,
                        IsOnline: (chatUsers[i].IsOnline ? 'online' : '')
                    });

                    item.click(function () {
                        $(".list-chat-room").removeClass("active");
                    });

                    item.find("img").error(function () {
                        $(this).attr("src", defaultSupportAvatar);
                    });

                    ul.append(item);
                }
            };

            $.connection.chatServer.client.deleteMessage = function (roomId) {
                // Xóa tin nhắn của cửa sổ chat
                var messageTags = $("#messages-" + roomId + " .message:not(#m-0)");
                if (messageTags.length > 0) {
                    messageTags.remove();
                }

                // Xóa thời gian chat của cửa sổ chat
                var timeMessageTags = $("#messages-" + roomId + " .chat-time");
                if (timeMessageTags.length > 0) {
                    timeMessageTags.remove();
                    rooms[roomId].oldTime = null;
                    rooms[roomId].lastTime = null;
                }

                alert("Tin nhắn đã được xóa.");
            };

            $.connection.chatServer.client.updateReadMessage = function (roomId) {
                if (rooms[roomId] != undefined && rooms[roomId].popup != null) {
                    rooms[roomId].totalUnread = 0;
                    rooms[roomId].popup.addUnreadMessageExternal(roomId, 0);
                }

                if (typeof BDSChatAdminInbox != 'undefined') {
                    BDSChatAdminInbox.updateReadMessage(roomId);
                }

            };

            $.connection.chatServer.client.updateOnlineUsers = function (user) {
                if (typeof BDSChatAdminInbox != 'undefined') {
                    BDSChatAdminInbox.updateListOnlineUsers(user);
                }
            };
        }
    };

    this.sendChatMessage = function (chatRoomId) {
        var chatRoomNewMessage = $('#newmessage-' + chatRoomId);

        if (chatRoomNewMessage.val() == null || chatRoomNewMessage.val().trim() == "")
            return;

        var chatMessage = {
            //senderId: senderId,
            //senderName: senderName,
            chatRoomId: chatRoomId,
            //messageText: chatRoomNewMessage.val().replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/\n/g, '<br>')
            messageText: $('<div />').text(chatRoomNewMessage.val()).html().replace(/\n/g, '<br>')

        };

        chatRoomNewMessage.val('');
        chatRoomNewMessage.focus();

        $this.chatServer.server.sendChatMessage(chatMessage).fail(function (es) {
            chatBrowserLog("Send chat failure: " + es.toString());
        });

        return false;
    };

    this.closeRoom = function (roomId) {
        delete rooms[parseInt(roomId)];
        BDSChat.setCookie();
        BDSChat.endChat(roomId.toString());
    };

    this.endChat = function (chatRoomId) {
        var chatRoomNewMessage = $('#newmessage-' + chatRoomId);

        var chatMessage = {
            senderId: senderId,
            senderName: senderName,
            chatRoomId: chatRoomId,
            messageText: chatRoomNewMessage.val()
        };
        chatRoomNewMessage.val('');
        chatRoomNewMessage.focus();
        $this.chatServer.server.endChat(chatMessage).fail(function (ex) {
            alert("End chat failure: " + ex.toString());
        });
    };

    this.initiateChat = function (toUserId, productId) {
        if ($this.chatServer == null) {
            alert("Problem in connecting to Chat Server. Please Contact Administrator!");
            return;
        }

        $this.chatServer.server.initiateChat(productId, toUserId).fail(function (ex) {
            alert("Initiate chat failure: " + ex.toString());
        });
    };

    this.initiateChatRandom = function () {
        if (supportUserOnline.length > 0) {
            var uid = supportUserOnline[Math.floor(Math.random() * supportUserOnline.length)];
            BDSChat.initiateChat(uid, '0');
        } else {
            $(".list-chat-room").toggleClass("active");
        }
    };

    this.formatName = function (fullName, length) {
        var shortName = this.subWords(fullName, length);
        return '<span title="' + fullName + '">' + shortName + '</span>';
    };

    this.isCurrentUser = function (userId) {
        return userId == senderId;
    }

    var sepWords = [' ', '-'];

    this.subWords = function (input, length) {
        if (input.length <= length || length <= 0) return input;

        var newContent = input.substring(0, length);
        //if (sepWords.indexOf(input[length]) != -1) newContent = input.substring(0, length);
        //else {
        //    var index = length;
        //    var content = '';
        //    while (index-- >= 0) {
        //        if (sepWords.indexOf(input[index]) != -1) {
        //            break;
        //        }
        //    }
        //    if (index == 0) newContent = input.substring(0, length);
        //    else newContent = input.substring(0, index).trim();
        //}

        return newContent + '...';
    }

    this.updateStatusUserForRoom = function (user, isOnline) {
        if (rooms != undefined && rooms != null) {
            for (key in rooms) {
                if (rooms[key].toUserId != undefined) {
                    if (rooms[key].toUserId == user.UserId) {
                        var statusIcon = $("#chatRoomHeader-" + key + " .user-status");
                        var statusIconBds = $("#chatRoomHeader-" + key + " .link-chat-bds-header");
                        var supportOnlineText = $("#chatRoom-" + key + " .support-online-text");
                        if (isOnline) {
                            statusIcon.addClass("online-status");
                            statusIconBds.removeClass("offline-status");
                            if (supportOnlineText.length > 0) {
                                supportOnlineText.text("Sẵn sàng hỗ trợ");
                            }
                        } else {
                            statusIcon.removeClass("online-status");
                            statusIconBds.addClass("offline-status");
                            if (supportOnlineText.length > 0) {
                                supportOnlineText.text("Đang offline");
                            }
                        }

                        // update collapse room
                        if (rooms[key].popup != null) {
                            rooms[key].popup.updateStatusExternal(key, isOnline);
                        }

                    }
                }
            }
        }

        // Update status for list support users
        var supportItems = $(".lst-support li a");
        for (var i = 0; i < supportItems.length; i++) {
            if ($(supportItems[i]).attr("uid") == user.UserId) {
                if (isOnline) {
                    $(supportItems[i]).find(".support-item-status").addClass("online");
                } else {
                    $(supportItems[i]).find(".support-item-status").removeClass("online");
                }
                break;
            }
        }
    }

    this.getFullName = function (users) {
        for (var i = 0; i < users.length; i++) {
            if (users[i].UserId != senderId) {
                return BDSChat.subWords(users[i].FullName, 30);
            }
        }

        return '';
    }

    this.convertDatetimeToString = function (datetime, type) {
        var year = datetime.getFullYear();
        //var month = datetime.getMonth() < 10 ? ("0" + datetime.getMonth()) : datetime.getMonth();
        var month = datetime.getMonth() + 1;
        var day = datetime.getDate() < 10 ? ("0" + datetime.getDate()) : datetime.getDate();
        //var hour = datetime.getHours() < 10 ? ("0" + datetime.getHours()) : datetime.getHours();
        var hourNumber = datetime.getHours();
        var hour = hourNumber % 12 == 0 && hourNumber > 0 && hourNumber != 24 ? 12 : hourNumber % 12;
        var minute = datetime.getMinutes() < 10 ? ("0" + datetime.getMinutes()) : datetime.getMinutes();
        var second = datetime.getSeconds() < 10 ? ("0" + datetime.getSeconds()) : datetime.getSeconds();
        var amOrPm = hourNumber > 12 ? " PM" : " AM";

        if (type == timeType.Second) {
            return hour + ":" + minute + ":" + second + amOrPm;
        } else if (type == timeType.Minute) {
            return hour + ":" + minute + amOrPm;
        } else if (type == timeType.Hour) {
            return hour + ":" + minute + amOrPm;
        } else if (type == timeType.Day) {
            return hour + ":" + minute + amOrPm + " " + day + " tháng " + month;
        } else if (type == timeType.Month) {
            return hour + ":" + minute + amOrPm + " " + day + " tháng " + month;
        } else if (type == timeType.Year) {
            return hour + ":" + minute + amOrPm + " " + day + " tháng " + month + " năm " + year;
        }

        return hour + ":" + minute + " " + day + " tháng " + month;
    }

    this.processDatetime = function (chatMessage, chatRoomMessages) {
        var dateTime = new Date(chatMessage.timestamp);
        var isAddTime = false;
        var type = timeType.Hour;

        if (rooms[chatMessage.chatRoomId].lastTime == null) {
            rooms[chatMessage.chatRoomId].lastTime = dateTime;
            isAddTime = true;
        } else {
            // check add time and remove time when change time
            if (dateTime.getFullYear() > rooms[chatMessage.chatRoomId].lastTime.getFullYear()) {
                this.removeTimeMessage(timeType.Hour, chatRoomMessages);
                this.removeTimeMessage(timeType.Day, chatRoomMessages);
                this.removeTimeMessage(timeType.Month, chatRoomMessages);
                isAddTime = true;
            } else if (dateTime.getMonth() > rooms[chatMessage.chatRoomId].lastTime.getMonth()) {
                this.removeTimeMessage(timeType.Hour, chatRoomMessages);
                this.removeTimeMessage(timeType.Day, chatRoomMessages);
                isAddTime = true;
            } else if (dateTime.getDate() > rooms[chatMessage.chatRoomId].lastTime.getDate()) {
                this.removeTimeMessage(timeType.Hour, chatRoomMessages);
                isAddTime = true;
            } else if (dateTime > (new Date(rooms[chatMessage.chatRoomId].lastTime.getTime() + (offsetTime * 60 * 1000)))) {
                isAddTime = true;
            }
        }

        if (isAddTime) {
            rooms[chatMessage.chatRoomId].lastTime = dateTime;
            this.addTimeMessage(dateTime, type, chatRoomMessages, true);
        }
    }

    this.addTimeMessage = function (datetime, type, chatRoomMessages, isAppend, messageWelcome) {
        if (isAppend) {
            chatRoomMessages.append("<div class='chat-time chat-time-" + type + "' timestamp='" + datetime.getTime() + "'><div><span>" + this.convertDatetimeToString(datetime, type) + "</span></div></div>");
        } else {
            if (messageWelcome.length == 0) {
                chatRoomMessages.prepend("<div class='chat-time chat-time-" + type + "' timestamp='" + datetime.getTime() + "'><div><span>" + this.convertDatetimeToString(datetime, type) + "</span></div></div>");
            } else {
                messageWelcome.after("<div class='chat-time chat-time-" + type + "' timestamp='" + datetime.getTime() + "'><div><span>" + this.convertDatetimeToString(datetime, type) + "</span></div></div>");
            }
        }

    }

    this.removeTimeMessage = function (type, chatRoomMessages) {
        chatRoomMessages.find("." + classTimeChat + type + ":gt(0)").remove();

        var nextType = type;

        if (type == timeType.Hour) {
            nextType = timeType.Day;
        } else if (type == timeType.Day) {
            nextType = timeType.Month;
        } else if (type == timeType.Month) {
            nextType = timeType.Year;
        }

        var divTime = chatRoomMessages.find("." + classTimeChat + type);

        divTime.find("span").text(this.convertDatetimeToString(new Date(parseInt(divTime.attr('timestamp'))), nextType));
        divTime.removeClass(classTimeChat + type).addClass(classTimeChat + nextType);
    }

    this.getAvatar = function (chatMessage, chatRoom, messaege) {
        var fileId = "";
        //var user = null;
        for (var i = 0; i < chatRoom.chatUsers.length; i++) {
            if (chatRoom.chatUsers[i].UserId != senderId) {
                fileId = chatRoom.chatUsers[i].Avatar;
                //if (chatRoom.chatUsers[i].IsStaff) {
                //    user = chatRoom.chatUsers[i];
                //}
            }
        }

        //if (user != null && user.IsStaff && chatMessage != null) {
        //    rooms[chatRoom.chatRoomId].avatarUrl = "/images/support-avatar.png";
        //    BDSChat.updateAvatar("/images/support-avatar.png", chatRoom.chatRoomId, messaege);
        //    return;
        //}

        if (rooms[chatRoom.chatRoomId].avatarUrl != null && chatMessage != null) {
            this.updateAvatar(rooms[chatRoom.chatRoomId].avatarUrl, chatRoom.chatRoomId, messaege);
        } else {
            $.ajax({
                url: handlerUrl + '?action=getavatar&fileid=' + (fileId == null ? "" : fileId),
                async: false,
                success: function (data) {
                    var avatarUrl = defaultAvatar;
                    if (data.avatarUrl.length > 0) {
                        avatarUrl = data.avatarUrl;
                    }
                    rooms[chatRoom.chatRoomId].avatarUrl = avatarUrl;
                    if (chatMessage != null) {
                        BDSChat.updateAvatar(avatarUrl, chatRoom.chatRoomId, messaege);
                    }
                }
            });
        }
    }

    this.updateAvatar = function (avatarUrl, roomId, message) {
        var itemImg = message.find(".avatar img");
        var img = document.createElement("img");
        $(img).attr("src", avatarUrl);
        $(img).error(function () {
            avatarUrl = defaultAvatar;
            rooms[roomId].avatarUrl = defaultAvatar;
            message.find(".avatar img").attr("src", avatarUrl);
        });

        itemImg.attr("src", avatarUrl);
    }

    this.BDSChatMarqeeTitle = null;
    var scrl = " Bạn có tin nhắn mới - Quản lý Chat ";
    this.marqeePageTitle = function () {
        scrl = scrl.substring(1, scrl.length) + scrl.substring(0, 1);
        document.title = scrl;
        BDSChat.BDSChatMarqeeTitle = setTimeout('BDSChat.marqeePageTitle()', 300);
    }

    this.highlightChatRoom = function (roomId) {
        if (!$('#newmessage-' + roomId).hasClass("text-focus")) {
            $("#chatPopup-" + roomId + " .chatPopup-header").toggleClass("header-blink");
            if (typeof (rooms[roomId]) != 'undefined' && rooms[roomId].highLightFunc != null) clearTimeout(rooms[roomId].highLightFunc);
            if (typeof (rooms[roomId]) != 'undefined') {
                rooms[roomId].highLightFunc = setTimeout('BDSChat.highlightChatRoom("' + roomId + '");', 1000);
            }
        } else {
            if ($("#chatPopup-" + roomId + " .chatPopup-header").hasClass("header-blink")) {
                $("#chatPopup-" + roomId + " .chatPopup-header").removeClass("header-blink");
            }
            if (isAdmin) { 
                clearTimeout(BDSChat.BDSChatMarqeeTitle);
                document.title = 'Quản lý Chat';
            }
        }
    }

    this.loadProductDetail = function (divChatMessage, chatRoom, isOnline) {
        $.ajax({
            url: handlerUrl + '?action=getproduct&productId=' + chatRoom.productId,
            async: false,
            success: function (data) {
                if (data.success) {
                    var productDiv = $('#chat-product-details-template').tmpl(data.product);
                    divChatMessage.before(productDiv);
                    var itemImg = productDiv.find("img");
                    itemImg.error(function () {
                        itemImg.attr('src', defaultProductImage);
                    });
                    if (data.product.UserId != senderId) {
                        if (isOnline) {
                            BDSChat.displayWelComeMessage(divChatMessage, chatRoom, "Rất vui vì bạn đã quan tâm đến tin rao của chúng tôi. Nếu có gì cần tư vấn hoặc giải đáp thì liên hệ với tôi!");
                        } else {
                            BDSChat.displayWelComeMessage(divChatMessage, chatRoom, "Rất vui vì bạn đã quan tâm đến tin rao của chúng tôi. Hiện tôi đang không online, vui lòng để lại tin nhắn cho tôi");
                        }
                    }
                }
            }
        });
    };

    this.displayWelComeMessage = function (divChatMessage, chatRoom, message) {
        var e;
        var chatMessage = { chatMessageId: 0, messageText: message }
        e = $('#new-message-template-left').tmpl(chatMessage);

        divChatMessage.prepend(e);
        BDSChat.getAvatar(chatMessage, chatRoom, e);
        if (typeof (e) != 'undefined') {
            // Format Emoticons
            e.emoticons(emoticonOpt);
            //e[0].scrollIntoView();
        }
    };

    this.loadSupportDetail = function (divChatMessage, chatRoom, isOnline) {
        var userId = chatRoom.toUserId != senderId ? chatRoom.toUserId : chatRoom.fromUserId;
        for (var i = 0; i < chatRoom.chatUsers.length; i++) {
            if (chatRoom.chatUsers[i].UserId == userId) {
                if (chatRoom.chatUsers[i].IsStaff) {
                    var supportU = $('#chat-caller-bds-template').tmpl({ userId: userId, FullName: chatRoom.chatUsers[i].FullName, OnlineText: (isOnline ? "Sẵn sàng hỗ trợ" : "Đang offline") });
                    divChatMessage.before(supportU);
                    $.ajax({
                        url: handlerUrl + '?action=getavatar&fileid=' + (chatRoom.chatUsers[i].Avatar == null ? "" : chatRoom.chatUsers[i].Avatar),
                        async: false,
                        success: function (data) {
                            var avatarUrl = defaultSupportAvatar;
                            if (data.avatarUrl.length > 0) {
                                avatarUrl = data.avatarUrl;
                            }
                            rooms[chatRoom.chatRoomId].fileId = chatRoom.chatUsers[i].Avatar;
                            rooms[chatRoom.chatRoomId].avatarUrl = avatarUrl;
                            var supportAvatar = supportU.find(".support-avatar");
                            supportAvatar.attr("src", avatarUrl);

                            supportAvatar.error(function () {
                                rooms[chatRoom.chatRoomId].avatarUrl = defaultSupportAvatar;
                                supportAvatar.attr("src", defaultSupportAvatar);
                            });
                        }
                    });

                    if (isOnline) {
                        this.displayWelComeMessage(divChatMessage, chatRoom, "Rất vui vì đã ghé thăm Batdongsan.com.vn. Bạn có cần tư vấn hoặc giải đáp thắc mắc gì, hãy chat với chúng tôi!");
                    } else {
                        this.displayWelComeMessage(divChatMessage, chatRoom, "Rất vui vì bạn đã ghé thăm Batdongsan.com.vn. Hiện CSKH đang không online, vui lòng để lại lời nhắn cho chúng tôi!");
                    }
                    return true;
                }
            }
        }

        return false;
    };

    this.likeAndDislike = function (userId, isLike) {
        $this.chatServer.server.likeOrDislikeSupporter(userId, isLike);
    };

    this.loadRoomFromCookie = function () {
        roomHistories = this.getCookie();
        if (roomHistories.length > 0) {
            $('#divChatWithBDS').show();
            $(".chat-container").hide();
            BDSChat.initiateChat(roomHistories[0].toUserId, roomHistories[0].productId);
        } else {
            $('#divChatWithBDS').show();
        }
    };

    this.loadMaximizeOrMinimize = function (roomId, toUserId) {
        if (roomHistories != null && roomHistories.length > 0) {
            for (var i = 0; i < roomHistories.length; i++) {
                if (roomHistories[i].toUserId == toUserId) {
                    if (rooms[roomId] != undefined && rooms[roomId].popup != null) {
                        rooms[roomId].popup.minimizeOrMaximizeExternal(roomId, roomHistories[i].isMaximize);
                        rooms[roomId].isChatSound = roomHistories[i].isChatSound;
                        rooms[roomId].isSendEmail = roomHistories[i].isSendEmail;
                        rooms[roomId].sendEmail = roomHistories[i].sendEmail;
                    }

                    roomHistories.removeItem(roomHistories[i]);

                    if (roomHistories != null && roomHistories.length > 0) {
                        BDSChat.initiateChat(roomHistories[0].toUserId, roomHistories[0].productId);
                    } else {
                        $(".chat-container").show();
                    }

                    break;
                }
            }
        }
    }

    this.updateUnreadMessage = function () {
        if (rooms != undefined && rooms != null) {
            for (key in rooms) {
                if (typeof (rooms[key].toUserId) != "undefined") {
                    // update collapse room
                    if (rooms[key].popup != null && typeof (rooms[key].totalUnread) != "undefined") {
                        rooms[key].popup.addUnreadMessageExternal(key, rooms[key].totalUnread);
                    }
                }
            }
        }
    };

    this.addChatArea = function () {
        var divChatContainer = $(document.createElement('div'));
        divChatContainer.addClass('chat-container');
        $("body").append($(document.createElement('div')).addClass("emoticons"));
        divChatContainer.append($("<div style ='display:none' id='chatSound'></div>"));
        if (isAdmin) {
            $("body").append(divChatContainer);
        } else {
            $("body").append(divChatContainer);
            divChatContainer.append($("#chat-container-template").tmpl());

            $("#chat-width-bds").click(function () {
                $(".list-chat-room").toggleClass("active");
            });
        }

    }

    this.getCookie = function () {
        var roomStr = getCookieChat(cookieRoomName);
        var roomInfos = [];
        if (roomStr != undefined && roomStr.length > 0) {
            var roomArr = roomStr.split('|');
            if (roomArr.length > 1 && roomArr[0] == senderId) {
                for (var i = 1; i < roomArr.length; i++) {
                    var roomInfoArr = roomArr[i].split(',');
                    if (roomInfoArr.length > 3) {
                        try {
                            roomInfos.push({ toUserId: roomInfoArr[0], productId: roomInfoArr[1], isMaximize: roomInfoArr[2] != 'false', isChatSound: roomInfoArr[3] != 'false', isSendEmail: roomInfoArr[4] != 'false', sendEmail: roomInfoArr[5] });
                        } catch (e) {
                        }
                    }
                }
            }
        }

        return roomInfos;
    };

    this.setCookie = function () {
        var roomIds = [];
        var collpseItems = $(".collapse-room-item:not(.active)");
        if (collpseItems.length > 0) {
            for (var i = 0; i < collpseItems.length; i++) {
                roomIds.push($(collpseItems[i]).attr("roomId"));
            }
        }

        if ($.fn.chatPopupShowList != undefined && $.fn.chatPopupShowList != null && $.fn.chatPopupShowList.length > 0) {
            for (var j = 0; j < $.fn.chatPopupShowList.length; j++) {
                roomIds.push($.fn.chatPopupShowList[j]);
            }
        }

        if (roomIds.length > 0) {
            var cookieVal = senderId;
            for (var k = 0; k < roomIds.length; k++) {
                var room = rooms[parseInt(roomIds[k])];
                cookieVal += "|";
                cookieVal += room.toUserId + "," + room.productId + "," + !$("#chatPopup-" + roomIds[k]).hasClass("chatPopup-header-maximinze") + "," + room.isChatSound + "," + room.isSendEmail + "," + room.sendEmail;
            }
            setCookieChat(cookieRoomName, cookieVal);
        } else {
            setCookieChat(cookieRoomName, "", 1);
        }
    };

    // History 
    this.loadChatHistoryMessage = function (chatMessage, chatRoom, currentTime) {

        if ($("#m-" + chatMessage.chatMessageId).length > 0) {
            return;
        }


        var reLinkInMess = /http:\/\/.*[^\s+$]/.exec(chatMessage.messageText);
        if (reLinkInMess != null && reLinkInMess.length > 0) {
            chatMessage.messageText = chatMessage.messageText.replace(reLinkInMess, '<a target="_blank" href="' + reLinkInMess + '">' + reLinkInMess + '</a>');
        }

        var chatRoomDiv = $('#chatRoom-' + chatMessage.chatRoomId);
        var chatRoomMessages = $('#messages-' + chatMessage.chatRoomId);
        var messageWelcome = chatRoomMessages.find('#m-0');
        var e;
        if (senderId == chatMessage.senderId) {
            if (messageWelcome.length != 0) {
                e = $('#new-message-template-right').tmpl(chatMessage);
                messageWelcome.after(e);
            } else {
                e = $('#new-message-template-right').tmpl(chatMessage).prependTo(chatRoomMessages);
            }
        } else {
            if (messageWelcome.length != 0) {
                e = $('#new-message-template-left').tmpl(chatMessage);
                messageWelcome.after(e);
            } else {
                e = $('#new-message-template-left').tmpl(chatMessage).prependTo(chatRoomMessages);
            }

            BDSChat.getAvatar(chatMessage, chatRoom, e);
        }

        BDSChat.processDatetimeHistory(messageWelcome, chatMessage, chatRoomMessages, currentTime);
        if (typeof (e) != 'undefined') {
            // Format Emoticons
            e.emoticons(emoticonOpt);

            //e[0].scrollIntoView();
        }
        //chatRoomDiv[0].scrollIntoView();
    }

    this.requestHistory = function (roomId) {
        try {
            var lastMessage = $("#chatRoom-" + roomId + " .message");
            var lastTimeStamp = 0;
            if (lastMessage.length > 0) {
                if ($(lastMessage[0]).attr("id") != "m-0") {
                    lastTimeStamp = parseInt($(lastMessage[0]).attr("timestamp"));
                } else if (lastMessage.length > 1) {
                    lastTimeStamp = parseInt($(lastMessage[1]).attr("timestamp"));
                }
            }
            $this.chatServer.server.requestHistory(roomId, lastTimeStamp);
        } catch (e) {

        }
    }

    this.processDatetimeHistory = function (messageWelcome, chatMessage, chatRoomMessages, currentTime) {
        var dateTime = new Date(chatMessage.timestamp);
        var currentDate = new Date(currentTime);
        var type = timeType.Year;

        // Add time to dic
        if (rooms[chatMessage.chatRoomId].lastTime == null) {
            rooms[chatMessage.chatRoomId].lastTime = dateTime;
        }

        if (dateTime.getFullYear() < currentDate.getFullYear()) {
            type = timeType.Year;
        } else if (dateTime.getMonth() < currentDate.getMonth()) {
            type = timeType.Month;
        } else if (dateTime.getDate() < currentDate.getDate()) {
            type = timeType.Day;
        }
        else {
            type = timeType.Hour;
        }

        this.removeTimeMessageHistory(type, chatRoomMessages, dateTime, chatMessage.chatRoomId);
        this.addTimeMessage(dateTime, type, chatRoomMessages, false, messageWelcome);
    }

    this.removeTimeMessageHistory = function (type, chatRoomMessage, time, roomId) {
        var timeMessages = chatRoomMessage.find(".chat-time");
        if (timeMessages.length > 0) {
            var year = time.getFullYear();
            var month = time.getMonth();
            var day = time.getDate();
            var i = 0;
            var date = null;
            switch (type) {
                case timeType.Year:
                    for (i = 0; i < timeMessages.length; i++) {
                        date = new Date(new Date(parseInt($(timeMessages[i]).attr('timestamp'))));
                        if (date.getFullYear() == year) {
                            $(timeMessages[i]).remove();
                            if (date == rooms[roomId].lastTime) {
                                rooms[roomId].lastTime = time;
                            }
                        }
                    }
                    break;
                case timeType.Month:
                    for (i = 0; i < timeMessages.length; i++) {
                        date = new Date(new Date(parseInt($(timeMessages[i]).attr('timestamp'))));
                        if (date.getFullYear() == year && date.getMonth() == month) {
                            $(timeMessages[i]).remove();
                            if (date == rooms[roomId].lastTime) {
                                rooms[roomId].lastTime = time;
                            }
                        }
                    }
                    break;
                case timeType.Day:
                    for (i = 0; i < timeMessages.length; i++) {
                        date = new Date(new Date(parseInt($(timeMessages[i]).attr('timestamp'))));
                        if (date.getFullYear() == year && date.getMonth() == month && date.getDate() == day) {
                            $(timeMessages[i]).remove();
                            if (date == rooms[roomId].lastTime) {
                                rooms[roomId].lastTime = time;
                            }
                        }
                    }
                    break;
                case timeType.Hour:
                    for (i = 0; i < timeMessages.length; i++) {
                        date = new Date(new Date(parseInt($(timeMessages[i]).attr('timestamp'))));
                        if (time.getTime() - date.getTime() < offsetTime * 60 * 1000) {
                            $(timeMessages[i]).remove();
                            if (date == rooms[roomId].lastTime) {
                                rooms[roomId].lastTime = time;
                            }
                        }
                    }
                    break;
                    //case type.Minute:
                    //    break;
                    //case type.second:
                    //    break;
                default:
                    break;
            }
        }
    };

    this.setIsAdmin = function (isAdminValue) {
        isAdmin = isAdminValue;
    }

    this.setIsUserMgr = function (isUserMgrValue) {
        isUserMgr = isUserMgrValue;
    }

    this.chatWithProductOwner = function (userId, fullName, productId) {

        // Chưa đăng nhập thì load form đăng ký
        if (senderId == "") {
            setCookieChat(cookieRoomName, "", 1);
            if ($(".chat-reg").length > 0) {
                if (parseInt($("#txtChatProductId").val()) == productId) {
                    $(".chat-reg .chatRoom").show();
                    return;
                } else {
                    $(".chat-reg").remove();
                }
            }

            var bdsClass = "";
            var bdsIconClass = "";
            if (productId == 0) {
                bdsClass = "chat-header-bds";
            } else {
                bdsIconClass = "bds-icon-none";
            }
            var chatReg = $("#chat-reg-tempalte").tmpl({ userId: userId, fullName: fullName, productId: productId, bdsClass: bdsClass, bdsIconClass: bdsIconClass });
            
            if (productId > 0) {
                // load product details
                $.ajax({
                    url: handlerUrl + '?action=getproduct&productId=' + productId,
                    async: false,
                    success: function (data) {
                        if (data.success) {
                            var product = $('#chat-product-details-template').tmpl(data.product);
                            product.find("img").error(function () {
                                product.find("img").attr('src', defaultProductImage);
                            });
                            chatReg.find(".chatRoom").prepend(product);
                        }
                    }
                });
            } else {
                chatReg.find(".online-status").hide();
                chatReg.find(".chatRoom").css({
                    "padding-top": "5px"
                });
            }


            $("body").append(chatReg);
            // register event
            chatReg.find("#btnChatClear").click(function () {
                $("#txtChatPhoneNumber").val("");
                $("#txtChatEmail").val("");
                $("#txtChatName").val("");
                $("#chkChatSaveInfo").val("1");
                $('#txtChatCapchar').val("");
                $('#txtChatPhoneNumber').focus();
                chatReg.find(".chat-reg-save-info span").css("background-image", 'url(/Modules/Chats/styles/images/chat-checked-icon.png)');
            });

            chatReg.find(".header-icon-minimize").click(function (e) {
                chatReg.toggleClass("minimize");
                e.stopPropagation();
                return false;
            });

            chatReg.find(".header-icon-close").click(function (e) {
                chatReg.remove();
                e.stopPropagation();
                return false;
            });

            chatReg.find(".chatPopup-header").click(function (e) {
                chatReg.toggleClass("minimize");
            });

            var changeCaptcha = function () { $('#img_CAPTCHA_RESULT_123456').attr('src', '/CaptchaGenerator.aspx?t=' + (new Date().getTime())); };
            chatReg.find("#btnStartChat").click(function () {
                if ($('#txtChatPhoneNumber').val().trim() == '' || !BDSChat.checkPhoneNumber($('#txtChatPhoneNumber').val().trim())) {
                    $('#regMessage').html('Số điện thoại không hợp lệ.');
                    $('#txtChatPhoneNumber').focus();
                    changeCaptcha();
                    return false;
                }
                if ($('#txtChatName').val().trim() == '') {
                    $('#regMessage').html('Bạn cần nhập tên.');
                    $('#txtChatName').focus();
                    changeCaptcha();
                    return false;
                }

                if ($('#txtChatEmail').val().trim().length > 0 && !BDSChat.checkEmail($('#txtChatEmail').val().trim())) {
                    $('#regMessage').html('Bạn cần nhập đúng định dạng email.');
                    $('#txtChatEmail').focus();
                    changeCaptcha();
                    return false;
                }

                if ($('#txtChatCapchar').val().trim() == '') {
                    $('#regMessage').html('Bạn cần nhập Mã an toàn.');
                    $('#txtChatCapchar').focus();
                    changeCaptcha();
                    return false;
                }

                $.ajax({
                    url: handlerUrl + "?action=regchatuser",
                    type: 'POST',
                    data: { name: $('#txtChatName').val(), phone: $('#txtChatPhoneNumber').val(), email: $('#txtChatEmail').val(), captcha: $("#txtChatCapchar").val() },
                    dataType: 'json',
                    success: function (data) {
                        if (data.Success) {
                            senderId = data.Data.Id;
                            senderName = data.Data.Name;
                            chatReg.remove();

                            if (productId > 0) {
                                setCookieChat(cookieRoomName, senderId + "|" + userId + "," + productId + ",true,true,true," + data.Data.Email, 1);
                            }

                            //userChatInfo = {
                            //    UserId: senderId,
                            //    UserName: "",
                            //    Email: data.Data.Email,
                            //    PhoneNumber: data.Data.Phone,
                            //    IsGuest: true
                            //};
                            //BDSChat.attachEvents();
                            //$.cookie("Regischat", "1", { expires: 1 });
                            //location.reload();

                            // Bật chat luôn
                            var userInfo = {
                                UserId: senderId,
                                UserName: senderName,
                                Email: data.Data.Email,
                                PhoneNumber: data.Data.Phone,
                                IsGuest: true
                            };
                            registerChat(userInfo);
                            $('#chat-width-bds-noreg').hide();
                            $('#chat-quick-inbox-content').show();
                            // Add emoticons to chat form
                            $('.emoticons').allemoticons(emoSetting);

                            //setTimeout(function () { BDSChat.initiateChat('Ud79Wlf4Muc=', '0'); }, 1000);
                            setTimeout(function () { BDSChat.initiateChatRandom(); }, 1000);
                            
                        } else {
                            changeCaptcha();
                            alert(data.Message);
                        }
                    }
                });
            });

            chatReg.find(".chat-reg-save-info span").click(function () {
                if ($("#chkChatSaveInfo").val() == "1") {
                    $("#chkChatSaveInfo").val("0");
                    chatReg.find(".chat-reg-save-info span").css("background-image", 'url(/Modules/Chats/styles/images/chat-unchecked-icon.png)');
                } else {
                    $("#chkChatSaveInfo").val("1");
                    chatReg.find(".chat-reg-save-info span").css("background-image", 'url(/Modules/Chats/styles/images/chat-checked-icon.png)');
                }
            });
        } else { 
            BDSChat.initiateChat(userId, productId);
        }
    };

    this.loadStaff = function () {
        //$.ajax({
        //    url: handlerUrl,
        //    data: { action: "supportstaff" },
        //    success: function (data) {
        //        if (data != undefined && data.length > 0) {
        //            $('.chat-container').find(".chat-with-bds .link-chat-bds").attr("href", "javascript:BDSChat.initiateChat('" + data[0].UserId + "', '0')");
        //        }
        //    }
        //});
        $this.chatServer.server.requestSupporter().fail(function (ex) {
            chatBrowserLog("Get supporters failure: " + ex.toString());
        });
    }

    this.keepConnected = function () {
        $this.chatServer.server.keepConnected();
    }

    this.closeAllRoom = function () {
        for (key in rooms) {
            if (rooms[key].toUserId != undefined) {
                BDSChat.endChat(key);
            }
        }
    }

    
    this.playSound = function () {
        //$("#chatSound").html("<embed src='" + chatSoundUrl + "' hidden='true' autostart='true' loop='false' class='playSound'>" + "<audio autoplay='autoplay' style='display:none;' controls='controls'><source src='" + chatSoundUrl + "' /></audio>");
    };

    this.loadUnreadMessageForMenu = function () {
        $.ajax({
            url: handlerUrl + "?action=getinboxunreadroom",
            success: function (data) {
                var quickInboxUnread = $('#chat-quick-inbox-icon .mnu-chat-icon-unread');
                if (data != null && data.length > 0 && quickInboxUnread.length > 0) {
                    quickInboxUnread.text(data.length);
                    quickInboxUnread.css("display", "block");
                    var inboxContent = $(".chat-quick-inbox-content .inbox-body ul");
                    if (inboxContent.length > 0) {
                        var html = "";
                        for (var i = 0; i < data.length; i++) {
                            html += "<li id='quick-inbox-item-" + data[i].Room.RoomId + "' onclick=\"BDSChat.quickInboxItemClick('" + data[i].User.UserId + "','" + data[i].Room.ProductId + "')\">";
                            html += "<span class='quick-inbox-item-title'>" + data[i].User.FullName + "</span><br/>";
                            html += "<span class='quick-inbox-item-lastMessage'>" + BDSChat.subWords(data[i].ChatMessage.messageText, 42) + "</span><br/>";
                            html += "<span class='quick-inbox-item-time'>" + BDSChat.convertTime(data[i].ChatMessage.timestamp, (new Date()).getTime()) + "</span>";
                            html += "</li>";
                        }

                        inboxContent.html(inboxContent.html() + html);
                        inboxContent.emoticons(emoticonOpt);
                    }
                } else {
                    //if ($(".chat-quick-inbox-content").length > 0) {
                    //    $(".chat-quick-inbox-content").remove();
                    //}
                }
            }
        });
    }

    this.addUnreadMessageForMenu = function (chatMessage, chatRoom) {

    }

    this.removeUnreadMessageForMenu = function (roomId) {
        //var quickItem = $("#quick-inbox-item-" + roomId);
        //if (quickItem.length > 0) {
        //    quickItem.remove();
        //    var unread = $(".mnu-chat-icon-unread");
        //    if (unread.length > 0) {
        //        var count = parseInt(unread.text()) - 1;
        //        if (unread.text() )
        //        if (count <= 0) {
        //            unread.css("display", "none");
        //            unread.text("");
        //            $(".chat-quick-inbox-content").removeClass("active");
        //        } else {
        //            unread.text(count);
        //            unread.css("display", "block");
        //        }
        //    }
        //}
    }

    this.quickInboxItemClick = function (userId, productId) {
        BDSChat.initiateChat(userId, productId);
        $(".chat-quick-inbox-content").removeClass("active");
    }

    this.getChatServer = function () {
        return $this.chatServer;
    }

    this.checkPhoneNumber = function (strPhone) {
        strPhone = strPhone.trim();
        if (strPhone.length != 0 && strPhone.length >= 8 && strPhone.length <= 15 && /\+?[0-9]+([\.\-][0-9]{3,})*/.test(strPhone)) {
            return true;
        }

        return false;
    };

    this.checkEmail = function (strEmail) {
        var input = strEmail.trim();
        var regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}(.[a-zA-Z]{2,6}){0,1}$/;

        if (input != '') {
            if (regex.test(input)) {
                return true;
            }
        }
        return false;
    }

    this.convertTime = function (time, currentTime) {
        var datetime = new Date(time);
        var currentDatetime = new Date(currentTime);

        var year = datetime.getFullYear();
        var month = datetime.getMonth() + 1;
        var day = datetime.getDate() < 10 ? ("0" + datetime.getDate()) : datetime.getDate();
        var hourNumber = datetime.getHours();
        var hour = hourNumber % 12 == 0 && hourNumber > 0 && hourNumber != 24 ? 12 : hourNumber % 12;
        var minute = datetime.getMinutes() < 10 ? ("0" + datetime.getMinutes()) : datetime.getMinutes();
        var second = datetime.getSeconds() < 10 ? ("0" + datetime.getSeconds()) : datetime.getSeconds();
        var amOrPm = hourNumber > 12 ? " PM" : " AM";

        if (datetime.getFullYear() < currentDatetime.getFullYear()) {
            return hour + ":" + minute + amOrPm + " " + day + " tháng " + month + " năm " + year;
        } else if (datetime.getMonth() < currentDatetime.getMonth()) {
            return hour + ":" + minute + amOrPm + " " + day + " tháng " + month;
        } else if (datetime.getDate() < currentDatetime.getDate()) {
            return hour + ":" + minute + amOrPm + " " + day + " tháng " + month;
        }
        else {
            return hour + ":" + minute + amOrPm;
        }
    }
};

// Define event
BDSChat.registerEvents();