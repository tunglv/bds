
$.ui.autocomplete.prototype._renderItem = function (ul, item) {
    var term = this.term.split(' ');
    var t = item.label.split(' ');
    var label = '';

    var reg = new RegExp("(~|!|@|#|\\$|%|\\^|&|\\*|\\(|\\)|_|\\+|\\{|\\}|\\||\"|:|\\?|>|<|,|\\.|\\/|;|'|\\\|[|]|=|-)", "gi");

    for (var j = 0; j < t.length; j++) {

        if (label.length > 0)
            label += ' ';

        var word = t[j];

        for (var i = 0; i < term.length; i++) {

            if (UnicodeToKoDau(term[i].replace(reg, "")).toLowerCase() == UnicodeToKoDau(word.replace(reg, "")).toLowerCase()) {
                word = '<b>' + word + '</b>';
                break;
            }
        }

        label += word;
    }

    if (hdbCategory.GetValue() == 38) {
        return $("<li></li>").data("item.autocomplete", item).append("<a>" + label + " <font style='color:#319c00;font-size:11px;font-weight:700'>(" + item.id.ts + " tin)</font>" + "</a>").appendTo(ul);
    } else {
        return $("<li></li>").data("item.autocomplete", item).append("<a>" + label + " <font style='color:#319c00;font-size:11px;font-weight:700'>(" + item.id.tr + " tin)</font>" + "</a>").appendTo(ul);
    }

    
};

___isIE = /MSIE (\d+\.\d+);/.test(navigator.userAgent);

var cityList = [];

var hdbCategory = $('#divCategory').AdvanceHiddenDropbox({
    id: 'divCatagoryOptions',
    hddValue: 'hdCboCatagory'
});

var hdbCategoryRe = $('#divCategoryRe').AdvanceHiddenDropbox({
    id: 'divCatagoryReOptions',
    hddValue: 'hdCboCatagoryRe'
});

var hdbDistrict = $('#divDistrict').AdvanceHiddenDropbox({
    id: 'divDistrictOptions',
    hddValue: 'hdCboDistrict'
});

var hdbCity = $('#divCity').AdvanceHiddenDropbox({
    id: 'divCityOptions',
    hddValue: 'hdCboCity'
});

var hdbWard = $('#divWard').AdvanceHiddenDropbox({
    id: 'divWardOptions',
    hddValue: 'hdCboWard'
});

var hdbStreet = $('#divStreet').AdvanceHiddenDropbox({
    id: 'divStreetOptions',
    hddValue: 'hdCboStreet'
});

var hdbBedRoom = $('#divBedRoom').AdvanceHiddenDropbox({
    id: 'divBedRoomOptions',
    hddValue: 'hdCboBedRoom'
});

var hdbHomeDirection = $('#divHomeDirection').AdvanceHiddenDropbox({
    id: 'divHomeDirectionOptions',
    hddValue: 'hdCboHomeDirection'
});

var hdbProject = $('#divProject').AdvanceHiddenDropbox({
    id: 'divProjectOptions',
    hddValue: 'hdCboProject'
});

var hdbPrice = $('#divPrice').AdvanceHiddenDropbox({
    id: 'divPriceOptions',
    minValue: 'txtPriceMinValue',
    maxValue: 'txtPriceMaxValue',
    unit: 'money',
    lblMin: 'lblPriceMin',
    lblMax: 'lblPriceMax',
    hddValue: 'hdCboPrice'
});

var hdbArea = $('#divArea').AdvanceHiddenDropbox({
    id: 'divAreaOptions',
    minValue: 'txtAreaMinValue',
    maxValue: 'txtAreaMaxValue',
    unit: 'area',
    hddValue: 'hdCboArea'
});

var hdbBrokerCategory = $('#divBrokerCategory').AdvanceHiddenDropbox({
    id: 'divBrokerCategoryOptions',
    hddValue: 'hdBrokerCategory'
});

var hdbBrokerTypeBDS = $('#divBrokerTypeBDS').AdvanceHiddenDropbox({
    id: 'divBrokerTypeBDSOptions',
    hddValue: 'hdBrokerTypeBDS'
});

var hdbBrokerCity = $('#divBrokerCity').AdvanceHiddenDropbox({
    id: 'divBrokerCityOptions',
    hddValue: 'hdBrokerCity'
});

var hdbBrokerDistrict = $('#divBrokerDistrict').AdvanceHiddenDropbox({
    id: 'divBrokerDistrictOptions',
    hddValue: 'hdBrokerDistrict'
});

var hdbBrokerProject = $('#divBrokerProject').AdvanceHiddenDropbox({
    id: 'divBrokerProjectOptions',
    hddValue: 'hdBrokerProject'
});


function ShowTab(id) {
    //var cboCategory = document.getElementById("cboCategory");
    switch (id) {
        case 1:
            $('form').attr('action', '/HandlerWeb/redirect.ashx?IsMainSearch=true');

            $("#divOfSeach").show();
            $("#divReSaler").hide();
            $("#divTabRESale").attr("class", "divSearchAct");
            $("#divTabREBorrow").attr("class", "divSearchInAct");
            $("#divTabRESaler").attr("class", "divSearchInAct");
            $("#tab-line_1").css("display", "none");
            $("#tab-line_2").css("display", "block");
            ChangeClassName('divTabREBorrow', false);
            ChangeClassName('divTabRESale', true);
            ChangeClassName('divTabRESaler', false);
            //cboCategory.value = cboCategory.options[1].value;
            hdbCategory.SetValue(38);
            ChangeCategory(hdbCategory.GetValue());
            GetPrices(hdbCategory.GetValue());
            //                    SearchCount();
            if ($.browser.opera || ($.browser.msie && $.browser.version.substr(0, 1) <= 7)) {
            }
            else {
                //$("#cboTypeRe option[value='']").attr("value", "0");
                if (hdbCategoryRe.GetValue().length == 0)
                    hdbCategoryRe.SetValue(0);
                //$("#cboCity option[value='']").attr("value", "CN");
                if (hdbCity.GetValue().length == 0)
                    hdbCity.SetValue('CN');
                //$("#cboDistrict option[value='']").attr("value", "0");
                if (hdbDistrict.GetValue().length == 0)
                    hdbDistrict.SetValue(0);
                //$("#cboArea option[value='']").attr("value", "0");
                if (hdbArea.GetValue().length == 0)
                    hdbArea.SetValue('-1');
                //$("#cboPrice option[value='']").attr("value", "0");
                if (hdbPrice.GetValue().length == 0)
                    hdbPrice.SetValue('-1');
                //$("#cboBedRoom option[value='']").attr("value", "-1");
                if (hdbBedRoom.GetValue().length == 0)
                    hdbBedRoom.SetValue(-1);
                //$("#cboHomeDirection option[value='']").attr("value", "-1");
                if (hdbHomeDirection.GetValue().length == 0)
                    hdbHomeDirection.SetValue(-1);
                $("#cboListProj option[value='']").attr("value", "0");
                //$("#cboWard option[value='']").attr("value", "0");
                if (hdbWard.GetValue().length == 0)
                    hdbWard.SetValue(0);
                //$("#cboStreet option[value='']").attr("value", "0");
                if (hdbStreet.GetValue().length == 0)
                    hdbStreet.SetValue(0);
                //$("#cmbCategory option[value='']").attr("value", "0");
                if (hdbBrokerCategory.GetValue().length == 0)
                    hdbBrokerCategory.SetValue(0);
                //$("#cmbTypeBDS option[value='']").attr("value", "0");
                if (hdbBrokerTypeBDS.GetValue().length == 0)
                    hdbBrokerTypeBDS.SetValue(0);
                //$("#cmbCity option[value='']").attr("value", "0");
                if (hdbBrokerCity.GetValue().length == 0)
                    hdbBrokerCity.SetValue('CN');
                //$("#cmbDistrict option[value='']").attr("value", "0");
                if (hdbBrokerDistrict.GetValue().length == 0)
                    hdbBrokerDistrict.SetValue(0);
                //$("#cmbProject option[value='']").attr("value", "0");
                if (hdbBrokerProject.GetValue().length == 0)
                    hdbBrokerProject.SetValue(0);

            }
            break;
        case 2:
            $('form').attr('action', '/HandlerWeb/redirect.ashx?IsMainSearch=true');

            $("#divOfSeach").show();
            $("#divReSaler").hide();
            $("#divTabRESale").attr("class", "divSearchInAct");
            $("#divTabREBorrow").attr("class", "divSearchAct");
            $("#divTabRESaler").attr("class", "divSearchInAct");
            $("#tab-line_1").css("display", "none");
            $("#tab-line_2").css("display", "none");
            ChangeClassName('divTabREBorrow', true);
            ChangeClassName('divTabRESale', false);
            ChangeClassName('divTabRESaler', false);
            //cboCategory.value = cboCategory.options[2].value;
            hdbCategory.SetValue(49);
            //ChangeCategory(cboCategory.value);
            ChangeCategory(hdbCategory.GetValue());
            //GetPrices(cboCategory.value);
            GetPrices(hdbCategory.GetValue())
            //                    SearchCount();
            break;
        case 3:
            $('form').attr('action', '/HandlerWeb/redirect.ashx?IsMainSearch=true&IsBroker=true');

            $("#divOfSeach").hide();
            $("#divReSaler").show();
            $("#divTabRESale").attr("class", "divSearchInAct");
            $("#divTabREBorrow").attr("class", "divSearchInAct");
            $("#divTabRESaler").attr("class", "divSearchAct");
            $("#tab-line_1").css("display", "block");
            $("#tab-line_2").css("display", "none");
            ChangeClassName('divTabREBorrow', false);
            ChangeClassName('divTabRESale', false); ChangeClassName('divTabRESaler', true);
            break;
    }
}

function ChangeClassName(divName, isActive) {
    var o = document.getElementById(divName).getElementsByTagName("div");
    if (isActive == true) {
        for (var i = 0; i < o.length; i++) {
            if (o[i].className == "tabLeftInAct") { o[i].className = "tabLeftAct"; }
            else {
                if (o[i].className == "tabCenterInAct") { o[i].className = "tabCenterAct"; }
                else
                    if (o[i].className == "tabRightInAct") { o[i].className = "tabRightAct"; }
            }
        }
    }
    else {
        for (var i = 0; i < o.length; i++) {
            if (o[i].className == "tabLeftAct") {
                o[i].className = "tabLeftInAct";
            }
            else {
                if (o[i].className == "tabCenterAct") {
                    o[i].className = "tabCenterInAct";
                } else if (o[i].className == "tabRightAct") {
                    o[i].className = "tabRightInAct";
                }
            }
        }
    }
}

function DisplaySearchAdvanceHome() {

}

function DisplaySearchAdvance() {
    if ($("#lblSearch").text() == "Bỏ tìm kiếm nâng cao") {
        $("#lblSearch").text("Tìm kiếm nâng cao");
        $("#adv-search").css("display", "none");
        $("#adv-search select").prop('selectedIndex', 0);
    }
    else {
        $("#lblSearch").text("Bỏ tìm kiếm nâng cao");
        $("#adv-search").css("display", "block");
    }
}

function ChangeCategory(parent) {
    var data = "<li class=\"advance-options\" vl=\"0\">--Chọn loại nhà đất--</li>";;
    if (parent == 38) {
        data += "<li class=\"advance-options\" vl=\"324\">- Bán căn hộ chung cư</li>";
        data += "<li class=\"advance-options\" vl=\"362\">- Tất cả các loại nhà bán</li>";
        data += "<li class=\"advance-options\" vl=\"41\">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán nhà riêng</li>";
        data += "<li class=\"advance-options\" vl=\"325\">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán nhà biệt thự, liền kề</li>";
        data += "<li class=\"advance-options\" vl=\"163\">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán nhà mặt phố</li>";
        data += "<li class=\"advance-options\" vl=\"361\">- Tất cả các loại đất bán</li>";
        data += "<li class=\"advance-options\" vl=\"40\">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán đất nền dự án</li>";
        data += "<li class=\"advance-options\" vl=\"283\">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán đất</li>";
        data += "<li class=\"advance-options\" vl=\"44\">- Bán trang trại, khu nghỉ dưỡng</li>";
        data += "<li class=\"advance-options\" vl=\"45\">- Bán kho, nhà xưởng</li>";
        data += "<li class=\"advance-options\" vl=\"48\">- Bán loại bất động sản khác</li>";
    }
    else if (parent == 49) {
        var children = cateList[1].children;
        for (var i = 0; i < children.length; i++) {
            data += "<li class=\"advance-options\" vl=\"" + children[i].id + "\">" + children[i].name + "</li>";
        }
    }

    //$("#cboTypeRe").html(data);
    hdbCategoryRe.UpdateOptions(data);
    hdbCategoryRe.SetValue(0);
    //$("#cboTypeRe").selectedIndex = 0;
    //$("#cboTypeRe").next().children(":first").text("--Chọn loại nhà đất--");


}

function ChangeCategoryContext(parent, selectedValue) {
    var data = "";
    if (parent == 38) {
        data = "<li class=\"advance-options\" vl=\"0\">--Chọn loại nhà đất--</li>";
        data += "<li class=\"advance-options\" vl=\"324\">- Bán căn hộ chung cư</li>";
        data += "<li class=\"advance-options\" vl=\"362\">- Tất cả các loại nhà bán</li>";
        data += "<li class=\"advance-options\" vl=\"41\">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán nhà riêng</li>";
        data += "<li class=\"advance-options\" vl=\"325\">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán nhà biệt thự, liền kề</li>";
        data += "<li class=\"advance-options\" vl=\"163\">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán nhà mặt phố</li>";
        data += "<li class=\"advance-options\" vl=\"361\">- Tất cả các loại đất bán</li>";
        data += "<li class=\"advance-options\" vl=\"40\">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán đất nền dự án</li>";
        data += "<li class=\"advance-options\" vl=\"283\">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán đất</li>";
        data += "<li class=\"advance-options\" vl=\"44\">- Bán trang trại, khu nghỉ dưỡng</li>";
        data += "<li class=\"advance-options\" vl=\"45\">- Bán kho, nhà xưởng</li>";
        data += "<li class=\"advance-options\" vl=\"48\">- Bán loại bất động sản khác</li>";
    }
    else if (parent == 49) {
        var children = cateList[1].children;
        data = "<li class=\"advance-options\" vl=\"0\">--Chọn loại nhà đất--</li>";
        for (var i = 0; i < children.length; i++) {
            data += "<li class=\"advance-options\" vl=\"" + children[i].id + "\">" + children[i].name + "</li>";
        }
    }

    //$("#cboTypeRe").html(data);
    hdbCategoryRe.UpdateOptions(data);
    hdbCategoryRe.SetValue(selectedValue);
    //$("#cboTypeRe option").each(function () {
    //    if ($(this).val() == selectedValue)
    //        $(this).attr("selected", "selected");
    //});

}

function SortByID(a, b) {
    return a.id > b.id ? 1 : -1;
};

function SortByOrder(a, b) {
    return a.order > b.order ? 1 : -1;
};

function SortByName(a, b) {
    return a.name > b.name ? 1 : -1;
};

LocationControl = function (opts) {

    if (opts.city != null) {
        this.cboCity = opts.city; // $('#' + opts.city);
        //this.cboCity.bind('change', this, this.ChangeCity);
        this.cboCity.BindChangeEvent(this, this.ChangeCity);
    } else
        this.cboCity = null;

    if (opts.distr != null) {
        this.cboDistr = opts.distr; // $('#' + opts.distr);
        //this.cboDistr.bind('change', this, this.ChangeDistrict);
        this.cboDistr.BindChangeEvent(this, this.ChangeDistrict);
        if (___isIE == false) {
            this.cboDistr.bt('Chọn Tỉnh/Thành phố để hiện ra danh sách quận/huyện', {
                trigger: 'hover',
                positions: opts.toolTipPosition,
                width: '170px',
                fill: '#ffff99',
                offsetParent: 'body',
                showTip: function (box) {
                    if (opts.city.GetValue() == 'CN') {
                        $(box).show();
                    }
                    else
                        $(box).hide();
                }
            });
        }
    }
    else
        this.cboDistr = null;

    if (opts.ward != null) {
        this.cboWard = opts.ward; // $('#' + opts.ward);
        //this.cboWard.bind('change', this, this.ChangeWard);
        this.cboWard.BindChangeEvent(this, this.ChangeWard);
        if (___isIE == false) {
            this.cboWard.bt('Chọn Quận/Huyện để hiện ra danh sách phường/xã', {
                trigger: 'hover',
                positions: opts.toolTipPosition,
                width: '170px',
                fill: '#ffff99',
                offsetParent: 'body',
                showTip: function (box) {
                    if (opts.distr.GetValue() == '0')
                        $(box).show();
                    else
                        $(box).hide();
                }
            });
        }
    }
    else
        this.cboWard = null;

    if (opts.street != null) {
        this.cboStreet = opts.street; // $('#' + opts.street);
        //this.cboStreet.bind('change', this, this.ChangeStreet);
        this.cboStreet.BindChangeEvent(this, this.ChangeStreet);
        if (___isIE == false) {
            this.cboStreet.bt('Chọn Quận/Huyện phố để hiện ra danh sách đường/phố', {
                trigger: 'hover',
                positions: opts.toolTipPosition,
                width: '170px',
                fill: '#ffff99',
                offsetParent: 'body',
                showTip: function (box) {
                    if (opts.distr.GetValue() == '0')
                        $(box).show();
                    else
                        $(box).hide();
                }
            });
        }
    }
    else
        this.cboStreet = null;

    if (opts.project != null) {
        this.cboProject = opts.project; // $('#' + opts.project);
        //this.cboProject.bind('change', this, this.ChangeProject);
        this.cboProject.BindChangeEvent(this, this.ChangeProject);
        if (___isIE == false) {
            this.cboProject.bt('Chọn Quận/Huyện để hiện ra danh sách dự án', {
                trigger: 'hover',
                positions: opts.toolTipPosition,
                width: '170px',
                fill: '#ffff99',
                offsetParent: 'body',
                showTip: function (box) {
                    if (opts.distr.GetValue() == '0')
                        $(box).show();
                    else
                        $(box).hide();
                }
            });
        }
    }
    else
        this.cboProject = null;

};

function dynamicSort(property) {
    var sortOrder = 1;
    if (property[0] === "-") {
        sortOrder = -1;
        property = property.substr(1);
    }
    return function (a, b) {
        var result = (a[property] < b[property]) ? -1 : (a[property] > b[property]) ? 1 : 0;
        return result * sortOrder;
    }
}

LocationControl.prototype.ChangeCity = function (_sope) {

    var _this = _sope;

    if (_this.cboCity != null) {

        var city = _this.cboCity.GetValue();

        var data = "<li vl=\"0\" class=\"advance-options\">--Chọn Quận/Huyện--</li>";
        var data_project = "<li vl=\"0\" class=\"advance-options\">--Chọn dự án--</li>";
        var data_street = "<li vl=\"0\" class=\"advance-options\">--Chọn Đường/Phố--</li>";
        var district = [], project = [], street = [];
        var tempProject = [];

        for (var i = 0; i < cityList.length; i++) {
            if (cityList[i].code == city) {
                district = cityList[i].district;

                for (var u = 0; u < district.length; u++) {
                    district[u].order = district[u].id;
                    if (city == 'HN') {
                        if (district[u].id == 718)
                            district[u].order = 15;
                        else if(district[u].id > 15)
                            district[u].order = district[u].id + 1;
                    }
                }

                //console.log(district);

                district = district.sort(SortByOrder);
                break;
            }
        }
        for (var i = 0; i < district.length; i++) {
            data += "<li vl='" + district[i].id + "' class=\"advance-options\">" + district[i].name + "</li>";

            project = district[i].project;
            for (var j = 0; j < project.length; j++) {
                tempProject.push(project[j]); 
            }

            street = district[i].street;
            street = street.sort(SortByID);
            for (var j = 0; j < street.length; j++) {
                data_street += "<li vl='" + street[j].id + "' class=\"advance-options\">" + street[j].name + "</li>";
            }
        }
        //sắp xếp dự án theo alphabet
        tempProject.sort(dynamicSort("name"));

        for (var j = 0; j < tempProject.length; j++) {
            data_project += "<li vl='" + tempProject[j].id + "' class=\"advance-options\">" + tempProject[j].name + "</li>";
        }


        if (_this.cboDistr != null) {
            _this.cboDistr.UpdateOptions(data);
            _this.cboDistr.SetValue(0);
            //_this.cboDistr.html(data);
            //_this.cboDistr.next().children(":first").text("--Chọn Quận/Huyện--");
        }

        if (_this.cboProject != null) {
            //_this.cboProject.html(data_project);
            _this.cboProject.UpdateOptions(data_project);
            _this.cboProject.SetValue(0);
            //_this.cboProject.selectedIndex = 0;
            //_this.cboProject.next().children(":first").text("--Chọn dự án--");
        }

        if (_this.cboStreet != null) {
            //_this.cboStreet.html(data_street);
            _this.cboStreet.UpdateOptions(data_street);
            _this.cboStreet.SetValue(0);
            //_this.cboStreet.selectedIndex = 0;
            //_this.cboStreet.next().children(":first").text("--Chọn Đường/Phố--");
        }

        if (_this.cboWard != null) {
            var data_ward = "<li vl=\"0\" class=\"advance-options\">--Chọn Phường/Xã--</li>";
            _this.cboWard.UpdateOptions(data_ward);
            _this.cboWard.SetValue(0);
            //_this.cboWard.html(data_ward);
            //_this.cboWard.selectedIndex = 0;
            //_this.cboWard.next().children(":first").text("--Chọn Phường/Xã--");
        }
    }
}

LocationControl.prototype.ChangeDistrict = function (_scope) {

    var _this = _scope;

    if (_this.cboCity != null && _this.cboDistr != null) {

        var city = _this.cboCity.GetValue();

        var distid = _this.cboDistr.GetValue();

        var data_ward = "<li vl=\"0\" class=\"advance-options\">--Chọn Phường/Xã--</li>";
        var data_project = "<li vl=\"0\" class=\"advance-options\">--Chọn dự án--</li>";
        var data_street = "<li vl=\"0\" class=\"advance-options\">--Chọn Đường/Phố--</li>";
        var ward = [], project = [], street = [];

        for (var i = 0; i < cityList.length; i++) {
            if (cityList[i].code == city) {
                for (var j = 0; j < cityList[i].district.length; j++) {
                    if (cityList[i].district[j].id == distid) {
                        project = cityList[i].district[j].project;
                        ward = cityList[i].district[j].ward;
                        street = cityList[i].district[j].street;
                        break;
                    }

                }
            }
        }

        street = street.sort(SortByID);
        ward = ward.sort(SortByName);

        if (_this.cboProject != null) {
            for (var j = 0; j < project.length; j++) {
                data_project += "<li vl='" + project[j].id + "' class=\"advance-options\">" + project[j].name + "</option>";
            }
            //_this.cboProject.html(data_project);
            _this.cboProject.UpdateOptions(data_project);
            _this.cboProject.SetValue(0);
            //_this.cboProject.selectedIndex = 0;
            //_this.cboProject.next().children(":first").text("--Chọn dự án--");
        }

        if (_this.cboStreet != null) {
            for (var j = 0; j < street.length; j++) {
                data_street += "<li vl='" + street[j].id + "'>" + street[j].name + "</li>";
            }
            //_this.cboStreet.html(data_street);
            _this.cboStreet.UpdateOptions(data_street);
            _this.cboStreet.SetValue(0);
            //_this.cboStreet.selectedIndex = 0;
            //_this.cboStreet.next().children(":first").text("--Chọn Đường/Phố--");
        }

        if (_this.cboWard != null) {
            for (var j = 0; j < ward.length; j++) {
                data_ward += "<li vl='" + ward[j].id + "'>" + ward[j].name + "</li>";
            }
            //_this.cboWard.html(data_ward);
            _this.cboWard.UpdateOptions(data_ward);
            _this.cboWard.SetValue(0);
            //_this.cboWard.selectedIndex = 0;
            //_this.cboWard.next().children(":first").text("--Chọn Phường/Xã--");
        }
    }
}

LocationControl.prototype.ChangeWard = function () {

}

LocationControl.prototype.ChangeStreet = function () {

}

LocationControl.prototype.ChangeProject = function () {

}

LocationControl.prototype.ChangeLocation = function (opt) {
    if (opt.city != null) {
        this.cboCity.SetValue(opt.city);
        //this.cboCity.next().children().text(this.cboCity.children(":selected").text());
        this.ChangeCity(this);
    }

    if (opt.distr != null) {
        this.cboDistr.SetValue(opt.distr);
        //this.cboDistr.next().children().text(this.cboDistr.children(":selected").text());
        this.ChangeDistrict(this);
    }

    if (opt.wardid != null) {
        this.cboWard.SetValue(opt.wardid);
        //this.cboWard.next().children().text(this.cboWard.children(":selected").text());
        this.ChangeWard(this);
    }

    if (opt.streetid != null) {
        this.cboStreet.SetValue(opt.streetid);
        //this.cboStreet.next().children().text(this.cboStreet.children(":selected").text());
        this.ChangeStreet(this);
    }

    if (opt.projid != null) {
        this.cboProject.SetValue(opt.projid);
        //this.cboProject.next().children().text(this.cboProject.children(":selected").text());
        this.ChangeProject(this);
    }
    hdbBedRoom.SetValue(-1);
    hdbHomeDirection.SetValue(-1);
    hdbPrice.SetValue(-1);
    hdbArea.SetValue(-1);
}

function GetPrices(catid) {
    var prices = [];
    if (catid == 38) {
        prices = priceLevel[0];
    }
    else if (catid == 49) {
        prices = priceLevel[1];
    }
    var data = "<li vl=\"-1\" class=\"advance-options\">--Chọn mức giá--</li>";
    for (var i = 0; i < prices.length; i++) {
        data += "<li vl=\"" + prices[i].Name + "\" class=\"advance-options\">" + prices[i].Value + "</li>";
    }
    //$("#cboPrice").html(data);
    hdbPrice.UpdateOptions(data);

}

function sortDropDownListByText(selectId) {
    var foption = $('#' + selectId + ' option:first');
    var soptions = $('#' + selectId + ' option:not(:first)').sort(function (a, b) {
        return a.text == b.text ? 0 : a.text < b.text ? -1 : 1
    });
    $('#' + selectId).html(soptions).prepend(foption);
};

SearchModeControl = new function () {
    this.isAdvance = false;

    this.ChangeMode = function (_isAd) {

        if (_isAd != undefined)
            this.isAdvance = _isAd;

        if (this.isAdvance == false) {
            $("#lblSearch").removeClass('advance');
            $("#lblSearch").text("Tìm nâng cao");
            $("#searchArea").css("overflow", "hidden");
            $('.adv-search').css('display', 'none');
            $("#home-advsearch select").prop('selectedIndex', 0);
            this.isAdvance = true;
        } else {
            $("#lblSearch").addClass('advance');
            $("#lblSearch").text("Bỏ tìm nâng cao");
            $("#searchArea").css("overflow", "auto");
            $('.adv-search').css('display', 'block');
            this.isAdvance = false;
        }
    }
}

$(function () {

    $(".adv-search select").each(function () {
        if (SearchModeControl.isAdvance == false) {
            var val = $(this).val();
            if (val != '0' && val != '-1') {
                SearchModeControl.ChangeMode();
            }
        }
    });

    $('#lblSearch').click(function () {
        SearchModeControl.ChangeMode();
    });

    if (cityList.length == 0) {
        if (typeof cityListOTher1 != 'undefined')
            cityList = $.merge(cityList, cityListOTher1);
        if (typeof cityListOTher2 != 'undefined')
            cityList = $.merge(cityList, cityListOTher2);
        if (typeof cityListOTher3 != 'undefined')
            cityList = $.merge(cityList, cityListOTher3);
        if (typeof cityListOTher4 != 'undefined')
            cityList = $.merge(cityList, cityListOTher4);
    }

    if (hdbCategory != null)
        hdbCategory.BindChangeEvent(hdbCategory, function (_scope) {
            ChangeCategory(_scope.GetValue());
            GetPrices(_scope.GetValue());
        });

    var toolTipPosition = window.location.pathname == '/' ? 'right' : 'left';

    if (hdbBrokerTypeBDS != null && ___isIE == false) {
        hdbBrokerTypeBDS.bt('Chọn loại giao dịch để hiện ra danh sách loại nhà đất', {
            trigger: 'hover',
            positions: toolTipPosition,
            width: '170px',
            fill: '#ffff99',
            offsetParent: 'body',
            showTip: function (box) {
                if (hdbBrokerCategory.GetValue() == '0')
                    $(box).show();
                else
                    $(box).hide();
            }
        });
    }

    _locationProduct = new LocationControl({
        city: hdbCity,
        distr: hdbDistrict,
        project: hdbProject,
        ward: hdbWard,
        street: hdbStreet,
        toolTipPosition: toolTipPosition
    });

    _locationBroker = new LocationControl({
        city: hdbBrokerCity,
        distr: hdbBrokerDistrict,
        project: hdbBrokerProject,
        ward: null,
        street: null,
        toolTipPosition: toolTipPosition
    });

    if (hdbBrokerCategory != null)
        hdbBrokerCategory.BindChangeEvent(hdbBrokerTypeBDS, function (_scope) {
            var data = "<li class=\"advance-options\" vl=\"0\">--Chọn loại giao dịch--</li>";
            var children = [];
            if (hdbBrokerCategory.GetValue() == '38') {
                data += "<li class=\"advance-options\" vl=\"1\">Bán đất nền dự án</li>";
                data += "<li class=\"advance-options\" vl=\"2\">Bán nhà riêng</li>";
                data += "<li class=\"advance-options\" vl=\"3\">Bán trang trại, khu nghỉ dưỡng</li>";
                data += "<li class=\"advance-options\" vl=\"4\">Bán kho, nhà xưởng</li>";
                data += "<li class=\"advance-options\" vl=\"5\">Bán loại bất động sản khác</li>";
                data += "<li class=\"advance-options\" vl=\"6\">Bán nhà mặt phố</li>";
                data += "<li class=\"advance-options\" vl=\"7\">Bán đất</li>";
                data += "<li class=\"advance-options\" vl=\"8\">Bán căn hộ chung cư</li>";
                data += "<li class=\"advance-options\" vl=\"9\">Bán nhà biệt thự, liền kề</li>";
            }
            else if (hdbBrokerCategory.GetValue() == 49) {
                data += "<li class=\"advance-options\" vl=\"10\">Cho thuê căn hộ chung cư</li>";
                data += "<li class=\"advance-options\" vl=\"11\">Cho thuê văn phòng</li>";
                data += "<li class=\"advance-options\" vl=\"12\">Cho thuê nhà mặt phố</li>";
                data += "<li class=\"advance-options\" vl=\"13\">Cho thuê nhà riêng</li>";
                data += "<li class=\"advance-options\" vl=\"14\">Cho thuê kho, nhà xưởng, đất</li>";
                data += "<li class=\"advance-options\" vl=\"15\">Cho thuê cửa hàng, ki ốt</li>";
                data += "<li class=\"advance-options\" vl=\"16\">Cho thuê loại bất động sản khác</li>";
                data += "<li class=\"advance-options\" vl=\"17\">Cho thuê nhà trọ, phòng trọ</li>";
            }

            //$("#cmbTypeBDS").html(data);
            hdbBrokerTypeBDS.UpdateOptions(data);
            hdbBrokerTypeBDS.SetValue(0);

        });


    if ((hdbHomeDirection != null && hdbBedRoom != null && hdbWard != null && hdbStreet != null && hdbProject != null) && (hdbHomeDirection.GetValue() != '-1' || hdbBedRoom.GetValue() != '-1' || hdbWard.GetValue() != '0' || hdbStreet.GetValue() != '0' || hdbProject.GetValue() != '0')) {
        SearchModeControl.ChangeMode(true);
    } else {
        SearchModeControl.ChangeMode(false);
    }

    if (___isIE) {

        var defaultText = $('#txtAutoComplete').attr('placeholder');
        $('#txtAutoComplete').css('color', '#777');
        $('#txtAutoComplete').css('height', '19px');
        $('#txtAutoComplete').css('padding-top', '2px');
        $('#txtAutoComplete').css('padding-bottom', '2px');
        $('#txtAutoComplete').css('line-height', '18px');

        if ($('#txtAutoComplete').val().length == 0)
            $('#txtAutoComplete').val(defaultText);

        $('#txtAutoComplete').blur(function () {
            if ($('#txtAutoComplete').val().length == 0)
                $('#txtAutoComplete').val(defaultText);
        });

        $('#txtAutoComplete').focus(function () {

            if ($('#txtAutoComplete').val() == defaultText)
                $('#txtAutoComplete').val('');
        });

        //$('#txtAutoComplete').parent().hide();
        //$('#divWard').removeClass('adv-search');
        //$('#divWard').removeClass('adv-search').show();

    }
    $('#txtAutoComplete').click(function () {
        if ($(this).val().length == 0) {
            $(".suggestTT").show();
        }
    });
    $('#txtAutoComplete').blur(function () {
            $(".suggestTT").hide();
    });
    $('#txtAutoComplete').mouseout(function () {
        $(".suggestTT").hide();
    });
    $('.suggestTT').mouseover(function () {
        $(".suggestTT").show();
    });
    $('.suggestTT').mouseout(function () {
        $(".suggestTT").hide();
    });

    $('#searchArea').scroll(function() {
        $(".suggestTT").hide();
    });

    $('#txtAutoComplete').keydown(function (evt) {
        $(".suggestTT").hide();
        return evt.keyCode != 13;
    });

    $('#txtAutoComplete').autocomplete({
        source: function (request, response) {
            var term = UnicodeToKoDau(request.term);

            var cache = null;
            if (JSON != undefined && localStorage != undefined) {
                cache = JSON.parse(localStorage.getItem('suggestion-cache'));
            }

            if (cache == null) {
                cache = [{}];
            }

            var data = cache[term];

            if (data != null) {
                response(data);
                return;
            } else {
                var urlRequest = ''; 
                if (hdbCategory.GetValue() == 38) {
                    urlRequest = 'http://suggestion1.batdongsan.com.vn/';
                } else {
                    urlRequest = 'http://suggestion2.batdongsan.com.vn/';
                }

                cnt = 0;
                $.ajax({
                    url: urlRequest + term,
                    success: function (data) {
                        cache[term] = data;

                        if (localStorage != undefined) {
                            localStorage.setItem('suggestion-cache', JSON.stringify(cache));
                        }

                        response(data);
                    }
                });
            }

        },
        minLength: 2,
        select: function (event, ui) {
            var result = ui.item.id;
            var urlRequest = '';
            if (hdbCategory.GetValue() == 38) {
                urlRequest = 'http://suggestion1.batdongsan.com.vn/';
            } else {
                urlRequest = 'http://suggestion2.batdongsan.com.vn/';
            }
            _locationProduct.ChangeLocation(result);

            $.post(urlRequest + result.id);
        }
    }).on('click', function () {
        if (document.hasFocus()) {
            $('ul.ui-autocomplete').hide();
        }
    }); 
});


var cnt = 0;
$(".home-product-search").keyup(function (event) {
    if (event.keyCode == 13 && cnt > 0) {
        cnt = 0;
        $(".timkiems").find("#btnSearch").click();
    }
    else if (event.keyCode == 13) {
        cnt++;
    }
});

$("#product_search").keyup(function (event) {
    if (event.keyCode == 13 && cnt > 0) {
        cnt = 0;
        $("#btnSearchContext").click();
    }
    else if (event.keyCode == 13) {
        cnt++;
    }
});


