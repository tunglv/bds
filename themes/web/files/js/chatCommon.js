// Init chat icons
var emoSetting = {
    path: '/images/emoticons/',
    parent: '#pnlEmoticions',
    selIconCallback: function (chatId, iconCode) {
        var oldMsg = $('#newmessage-' + chatId).val().trim();
        if (oldMsg == '') oldMsg = iconCode;
        else oldMsg += ' ' + iconCode;
        $('#newmessage-' + chatId).val(oldMsg);
        $('#newmessage-' + chatId).focus();
    }
};

function autoResizeTextArea(txtArea) {
    var hiddenDivChat = $("#hiddenDivChat");
    var content = $(txtArea).val();
    content = content.replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/\n/g, '<br>');
    hiddenDivChat.html(content + '<br class="lbr">');

    var height = hiddenDivChat.height();
    var currentHeight = $(txtArea).height();

    var divChatMessage = $("#messages-" + $(txtArea).attr("id").replace("newmessage-", ""));
    var divCommand = $("#chatRoom-" + $(txtArea).attr("id").replace("newmessage-", "") + " .chat-command");

    var offset = (height - currentHeight);

    divChatMessage.css('height', divChatMessage.height() - offset);
     
    divCommand.css('height', divCommand.height() + offset);

    $(txtArea).css('height', height);

    if (height == parseInt($(hiddenDivChat).css('max-height').replace("px"))) {
        $(txtArea).css('overflow', "auto");
    } else {
        $(txtArea).css('overflow', "hidden");
    }
}

function chatTextEnter(txtArea, evt) {
    var keycode = (evt.which) ? evt.which : evt.keyCode;
    if (evt.ctrlKey && keycode == 13) {
        $(txtArea).val($(txtArea).val() + "\n");
        autoResizeTextArea(txtArea);
        return false;
    }
    return true;
}

if (typeof String.prototype.trim !== 'function') {
    String.prototype.trim = function () {
        return this.replace(/^\s+|\s+$/g, '');
    };
}
// Register chat event
function registerActionEvent() {
    var li = $(".chat-mgr-left-action-frm li");
    if (li.length > 0) {
        for (var i = 0; i < li.length; i++) {
            switch (i) {
                case 0:
                    $(li[i]).click(function () {
                        BDSChatInbox.enableChatSound($(this));
                    });
                    break;
                case 1:
                    $(li[i]).click(function () {
                        BDSChatInbox.deleteMessage();
                    });
                    break;
                case 2:
                    $(li[i]).click(function () {
                        BDSChatInbox.blockMessage();
                    });
                    break;
                case 3:
                    $(li[i]).click(function () {
                        //BDSChatInbox.blockMessage();
                    });
                    break;
                case 4:
                    $(li[i]).click(function () {
                        BDSChatInbox.reportSpam();
                    });
                    break;
            }
        }
    }
}

// Log info in browser
function chatBrowserLog(msg) {
    if (typeof (console) != 'undefined') {
        console.log(msg);
    } else {
        alert(msg);
    }
}

// array remove function
Array.prototype.removeItem = function () {
    var what, a = arguments, l = a.length, ax;
    while (l && this.length) {
        what = a[--l];
        if ((ax = $.inArray(what, this)) !== -1) {
            this.splice(ax, 1);
        }
        //while ((ax = $.inArray(what, this)) !== -1) {
        //    this.splice(ax, 1);
        //}
    }
    return this;
};

Array.prototype.addItem = function () {
    var what, a = arguments, l = a.length;
    while (l) {
        what = a[--l];
        if ($.inArray(what, this) == -1) {
            this.push(what);
        }
    }
    return this;
};
