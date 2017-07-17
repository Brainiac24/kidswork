

(function ($) { 
    $.fn.ListSelectBox = function (options) {

        var settings = $.extend({
            btn_text: '',
            width: "100%"
        }, options);

        jQuery.expr[':'].contains = function (a, i, m) {
            return jQuery(a).text().toLowerCase().indexOf(m[3].toLowerCase()) >= 0;
        };
        function FindWord(textbox, $this) {
            var newlist = '';
            if (textbox.val() !== '') {
                $('.orig-list li:contains("' + textbox.val() + '")', $this).each(function () {
                    newlist += $(this)[0].outerHTML;
                });
            }
            return newlist;
        }
        ;

        function Listselectbox($this) {
            var object = $($this);
            //alert(object[0].outerHTML);
            var dropdownlist = object.children('.dropdownlist');
            var textbox = dropdownlist.children('.textbox');
            var hiddenbox = dropdownlist.children('.hiddenbox');
            var listbox = dropdownlist.children('.orig-list');
            var listboxfiltered = dropdownlist.children('.filtered-list');
            var btn = object.children('.btn-select');
            var selected = "";
            var activelist = ".orig-list ";

            $(object).delegate($this, 'focusin', function (e) {
                var tar = $(e.target).closest(".listselectbox");
                if (tar.length !== '') {
                    $(".listselectbox").each(function () {
                        if (!$(this).closest(".listselectbox").is(tar)) {
                            $(this).closest(".listselectbox").css("z-index","0");
                            $(this).children('.dropdownlist').hide();
                        } else {
                            tar.show();
                        }
                    });
                }
            });
            $('.orig-list', object).on('click', 'li', function () {
                btn.text(settings.btn_text + $(this).text());
                hiddenbox.val($(this).data('v')).trigger('change');
                $('li', object).removeClass('selected');
                $(this).addClass('selected');
                selected = $(this).index();
                $(this).closest(".listselectbox").css("z-index","0");
                dropdownlist.hide();
            });
            $('.filtered-list', object).on('click', 'li', function () {
                btn.text(settings.btn_text + $(this).text());
                hiddenbox.val($(this).data('v')).trigger('change');
                $('li', object).removeClass('selected');
                $(this).addClass('selected');
                selected = $(this).index();
                $(dropdownlist).closest(".listselectbox").css("z-index","0");
                dropdownlist.hide();
            });

            $(document).on('click', function (e) {
                var tar = $(e.target).closest(".listselectbox");
                if (tar.length !== '') {
                    object.each(function () {
                        if (!$(this).closest(".listselectbox").is(tar)) {
                            $(this).closest(".listselectbox").css("z-index","0");
                            $(this).children('.dropdownlist').hide();
                        }
                    });
                }
            });

            $(object).on('mousedown', '.btn-select', function () {
                $(dropdownlist).closest(".listselectbox").css("z-index","99");
                dropdownlist.toggle();
            });

            $(object).on('keyup', function (e) { // 38-up, 40-down
                if (e.keyCode === 13) {
                    var sel = $(activelist + 'li:eq(' + selected + ')', object);
                    btn.text(settings.btn_text + sel.text());
                    hiddenbox.val(sel.data('v')).trigger('change');
                    dropdownlist.toggle();
                } else if (e.keyCode === 27) {
                    $(dropdownlist).closest(".listselectbox").css("z-index","0");
                    dropdownlist.hide();
                } else if (e.keyCode === 40) {
                } else if (e.keyCode === 38) {
                }
                else
                {
                    dropdownlist.show();
                    if (textbox.val() !== '') {
                        activelist = '.filtered-list ';
                        listbox.removeClass('activelist');
                        listboxfiltered.addClass('activelist');
                        listboxfiltered.show();
                        listboxfiltered.html(FindWord(textbox, $this));
                        listbox.hide();
                    } else {
                        activelist = '.orig-list ';
                        listbox.addClass('activelist');
                        listboxfiltered.removeClass('activelist');
                        listboxfiltered.hide();
                        listbox.show();
                    }
                }
            });
            $(object).on('keydown', function (e) {
                if (e.keyCode === 40) {
                    e.preventDefault();
                    if (selected === "") {
                        selected = 0;
                    } else if ((selected + 1) < $(activelist + 'li', object).length) {
                        selected++;
                    }
                    $(activelist + 'li', object).removeClass('selected');
                    $(activelist + 'li:eq(' + selected + ')', object).addClass('selected');
                } else if (e.keyCode === 38) {
                    e.preventDefault();
                    if (selected === "") {
                        selected = 0;
                    } else if (selected > 0) {
                        selected--;
                    }
                    $(activelist + 'li', object).removeClass('selected');
                    $(activelist + 'li:eq(' + selected + ')', object).addClass('selected');
                } else if (e.keyCode === 13) {
                } else if (e.keyCode === 27) {
                } else {
                    textbox.focus();
                    $(activelist + 'li', object).removeClass('selected');
                    selected = '';
                }
                var newpos = $(activelist + 'li:eq(' + [selected] + ')', object).offset().top - $(activelist + 'li:eq(0)', object).offset().top;
                dropdownlist.children(activelist).scrollTop(newpos);
            });

            var sel = $(activelist, object).children('li[class="selected"]');
            
            if (typeof (sel.html()) !== 'undefined') {
                hiddenbox.val(sel.data('v'));
                btn.text(settings.btn_text + sel.text());
            }
            ;
        }

        return this.each(function () {
            $(this).removeClass('noactive');
            new Listselectbox(this);
        });

    };
})(jQuery);

