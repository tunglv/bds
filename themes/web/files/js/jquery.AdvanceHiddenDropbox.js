/// <reference path="/Scripts/jquery-1.7.2.min.js" />

(function ($) {

    AdvanceHiddenDropbox = function (_options) {

        var $this = $(this);

        if ($this.length == 0)
            return null;

        this.Value = $('#' + _options.hddValue);

        this.divOptions = $('#' + _options.id);

        this.divOptions.children('ul').css('min-width', $this.width() + 'px');
        this.divOptions.children('ul').children('li').css('min-width', ($this.width() - 32) + 'px');
        if (this.divOptions.children('ul').height() > 300)
            this.divOptions.css('width', ($this.width() + 22) + 'px');

        if (this.divOptions.width() < $this.width())
            this.divOptions.css('width', $this.width() + 'px');

        if (_options.minValue != undefined)
            this.txtMinValue = $('#' + _options.minValue);
        else
            this.txtMinValue = null;
        if (_options.maxValue != undefined)
            this.txtMaxValue = $('#' + _options.maxValue);
        else
            this.txtMaxValue = null;

        this.lstValue = this.divOptions.children('ul').children();
        this.selectText = $this.children(".select-text");
        this.selectText.children().css('width', (this.selectText.width() - 25) + 'px');

        if (_options.unit != undefined)
            this.unitPrice = _options.unit;
        else
            this.unitPrice = null;

        this.minValue = 0;
        this.maxValue = 0;

        function EventKeyDownHandler(el, event) {
            var code = event.keyCode ? event.keyCode : event.which;
            if (code == 13) {
                event.data.CheckToClose();
                event.preventDefault();
            }
            else {
                var decimal = $(el).attr('decimal') == 'true';
                var retval = numbersonly(el, event, decimal);
                if (retval == false) {
                    event.preventDefault();
                }
            }
        }

        function EventKeyUpHandler(el, event) {
            event.data.UpdateTextValue();

            var val = $(el).val();
            if ($(el).attr('id') == _options.minValue) {
                event.data.minValue = parseFloat(val);
            } else {
                event.data.maxValue = parseFloat(val);
            }
            event.data.Value.val('');
        }

        if (this.txtMinValue != null) {
            this.txtMinValue.bind('keydown', this, function (event) {
                EventKeyDownHandler(this, event);
            });
            this.txtMinValue.bind('keyup', this, function (event) {
                EventKeyUpHandler(this, event);
            });
        }
        if (this.txtMaxValue != null) {
            this.txtMaxValue.bind('keydown', this, function (event) {
                EventKeyDownHandler(this, event);
            });
            this.txtMaxValue.bind('keyup', this, function (event) {
                EventKeyUpHandler(this, event);
            });
        }

        this.selectText.bind('click', this, function (evt) {

            evt.preventDefault();
            evt.stopPropagation();

            if (evt.data.divOptions.parent().prop("tagName") != 'form') {
                evt.data.divOptions.appendTo('form');
            }

            if (evt.data.divOptions.css('display') == 'none') {

                $('.advance-select-options').css('display', 'none');

                var offset = $(evt.data).offset();

                evt.data.divOptions.css('top', (offset.top + $this.height()) + 'px');
                evt.data.divOptions.css('left', offset.left + 'px');

                evt.data.divOptions.css('display', 'block');

                evt.data.lstValue.removeClass('current');

                if (evt.data.Value.val().length > 0 && (evt.data.txtMaxValue == null || evt.data.txtMaxValue.val().length == 0) && (evt.data.txtMinValue == null || evt.data.txtMinValue.val().length == 0)) {
                    evt.data.divOptions.children('ul').children('[vl=' + evt.data.Value.val() + ']').addClass('current');
                }

                if (evt.data.txtMinValue != null) {
                    evt.data.txtMinValue.focus();
                }

                $('body').bind('click', evt.data, function (_evt) {

                    if ($(_evt.target).hasClass('advance-options')) {
                        _evt.preventDefault();
                        _evt.stopPropagation();
                    }
                    else {
                        _evt.data.CheckToClose();
                    }
                });
            } else {
                evt.data.divOptions.css('display', 'none');
            }

        });

        this.CheckToClose = function () {
            if (this.txtMaxValue != null && this.txtMinValue != null && this.txtMaxValue.val().length > 0 && this.txtMinValue.val().length > 0 && this.minValue >= this.maxValue) {
                var min = parseFloat(this.txtMinValue.val());
                var max = parseFloat(this.txtMaxValue.val());
                if (max < min) {
                    var tempValue = this.txtMaxValue.val();
                    this.txtMaxValue.val(this.txtMinValue.val());
                    this.txtMinValue.val(tempValue);

                    this.UpdateTextValue();
                }
            }

            this.divOptions.css('display', 'none');
            $('body').unbind('click');
            return true;

        }

        this.UpdateTextValue = function () {
            if (this.txtMaxValue != null && this.txtMinValue != null) {
                if (this.txtMinValue.val().length == 0 && this.txtMaxValue.val().length == 0) {
                    this.SetValue();
                }
                else {
                    var _text = '';

                    if (this.unitPrice == 'money') {

                        if (this.txtMinValue.val().length > 0) {
                            var txt = GetMoneyText2(parseFloat(this.txtMinValue.val()) * 1000000);
                            if (this.txtMaxValue.val().length > 0)
                                _text += txt;
                            else
                                _text += '>= ' + txt;

                            $('#' + _options.lblMin).text(txt);
                        }
                        else {
                            $('#' + _options.lblMin).text('');
                        }
                        if (this.txtMaxValue.val().length > 0) {
                            
                            var txt = GetMoneyText2(parseFloat(this.txtMaxValue.val()) * 1000000);
                            if (this.txtMinValue.val().length > 0)
                                _text += ' - ' + txt;
                            else
                                _text += '< ' + txt;

                            $('#' + _options.lblMax).text(txt);
                        } else {
                            $('#' + _options.lblMax).text('');
                        }
                    }
                    else if (this.unitPrice == 'area') {
                        if (this.txtMinValue.val().length > 0) {
                            if (this.txtMaxValue.val().length > 0)
                                _text += this.txtMinValue.val();
                            else
                                _text += '>= ' + this.txtMinValue.val();
                        }
                        if (this.txtMaxValue.val().length > 0) {

                            if (this.txtMinValue.val().length > 0)
                                _text += ' - ' + this.txtMaxValue.val();
                            else
                                _text += '< ' + this.txtMaxValue.val();
                        }

                        _text += ' m2';
                    }

                    this.selectText.children().text(_text);
                }
            }
        }

        this.UpdateOptions = function (_html) {

            this.divOptions.children('ul').html(_html);
            this.lstValue = this.divOptions.children('ul').children();
            this.BindOptionEvent();

        }

        this.SetValue = function (val) {

            var text = '';
            
            if (val != undefined && this.divOptions.children('ul').children('[vl=' + val + ']').length > 0) {
                text = this.divOptions.children('ul').children('[vl=' + val + ']').text();
            } else {
                text = this.divOptions.children('ul').children(':nth-child(1)').text();
                val = this.divOptions.children('ul').children(':nth-child(1)').attr('vl');
            }

            //console.log(_options.id + ' ' + val + ' ' + text);

            this.selectText.children().text(text);
            this.Value.val(val);

            if (this.txtMaxValue != null)
                this.txtMaxValue.val('');

            if (this.txtMinValue != null)
                this.txtMinValue.val('');
        }

        this.GetValue = function () {
            return this.Value.val();
        }

        this.BindOptionEvent = function () {
            this.lstValue.bind('click', this, function (evt) {

                evt.data.Value.val($(this).attr('vl'));
                if (evt.data.txtMinValue != null && evt.data.txtMaxValue != null) {
                    evt.data.txtMinValue.val('');
                    evt.data.txtMaxValue.val('');
                }
                evt.data.selectText.children().text($(this).text());

                evt.data.divOptions.css('display', 'none');

                if (evt.data._ChangeFunc != null) {
                    evt.data._ChangeFunc(evt.data._ChangeFuncScope);
                }

            });
        }

        this._ChangeFunc = null;
        this._ChangeFuncScope = null;
        this.BindChangeEvent = function (_scope, func) {
            this._ChangeFunc = func;
            this._ChangeFuncScope = _scope;
        }

        this.BindOptionEvent();

        if (this.txtMaxValue != null && this.txtMinValue != null && (this.txtMaxValue.val().length > 0 || this.txtMinValue.val().length > 0)) {
            this.UpdateTextValue();
        }
        else {
            if (this.divOptions.children('ul').children('.current').length > 0) {
                var _val = this.divOptions.children('ul').children('.current').attr('vl');
                this.SetValue(_val);
            } else {
                var _val = this.divOptions.children('ul').children(':first').attr('vl');
                this.SetValue(_val);
            }
        }

        return this;

    }

    AdvanceHiddenDropbox.getValueById = function () {

    }

    $.fn.AdvanceHiddenDropbox = AdvanceHiddenDropbox;
    $.fn.AdvanceHiddenDropbox.getValueById = AdvanceHiddenDropbox.getValueById;

}(jQuery));