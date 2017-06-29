

(function ($) {

    jQuery.expr[':'].contains = function (a, i, m) {
        return jQuery(a).text().toLowerCase().indexOf(m[3].toLowerCase()) >= 0;
    };
    jQuery.expr[':']['startswith'] = function (node, index, props) {
        return jQuery(node).text().toLowerCase().match("^" + props[3].toLowerCase());
    };
    jQuery.expr[':']['endswith'] = function (node, index, props) {
        return jQuery(node).text().toLowerCase().match(props[3].toLowerCase() + "$");
    };
    jQuery.expr[':']['equal'] = function (node, index, props) {
        return jQuery(node).text().toLowerCase().trim().match("^" + props[3].trim().toLowerCase() + "$");
    };
    jQuery.expr[':']['equaldate'] = function (node, index, props) {
        console.log(new Date(jQuery(node).text()).getTime() === new Date(props[3]).getTime());
        return new Date(jQuery(node).text()).getTime() === new Date(props[3]).getTime();
    };
    jQuery.expr[':']['greaterthan'] = function (node, index, props) {
        return parseFloat(jQuery(node).text()) >= parseFloat(props[3]);
    };
    jQuery.expr[':']['lessthan'] = function (node, index, props) {
        return parseFloat(jQuery(node).text()) <= parseFloat(props[3]);
    };
    jQuery.expr[':']['greaterdate'] = function (node, index, props) {
        return new Date(jQuery(node).text()).getTime() >= new Date(props[3]).getTime();
    };
    jQuery.expr[':']['lessdate'] = function (node, index, props) {
        return new Date(jQuery(node).text()).getTime() <= new Date(props[3]).getTime();
    };
    function Refresh($this) {
        var object = $($this);
        var count = 0;
        var orig_headers = object.children('.sticky-cont').children('.base-table').find('th');
        var headers = object.children('.sticky-headers').children('.sticky-table ').find('div');
        var headers_filters = object.children('.sticky-headers').children('.sticky-filters').find('div');
        var headers_footers = object.children('.sticky-footers').children('.sticky-table').find('div');
        var headers_f_cont = object.children('.sticky-filters-list').children('.sticky-table').find('.f-cont');
        orig_headers.each(function () {
            headers.eq(count).width($(this).outerWidth() - 5);
            headers_filters.eq(count).width($(this).outerWidth() - 1);
            headers_footers.eq(count).width($(this).outerWidth() - 5);
            //alert(headers_filters.eq(count).offset().left);
            headers_f_cont.eq(count).css('left', (headers.eq(count).position().left) + 'px');
            count++;
        });

        if (object.outerWidth<$(object).closest(".datatable").outerWidth) {
            //object.children('.sticky-footers').width($(object).closest(".datatable").outerWidth);
        } else {

        }

    }

    function FindRow($this, $isdate) {
        var parent = $this.closest('.sticky-table-headers');
        var filtered_tbody = parent.find('.filtered-tbody');
        var orig_tbody = parent.find('.orig-tbody');
        var header = parent.find('thead');
        var footer = parent.find('.sticky-footers');
        var header_arr = [];
        var summary = [];
        var summary_sum = [];
        var newlist = '';
        var filter_count = 0;
        var filter_text = '';
        var filter_and_or = ' ';
        var filter_tbody = orig_tbody;
        $('.s-text').each(function () {
            if ($(this).val().length > 0) {
                filter_count++;
                var $id = $(this).closest('.f-cont').data('id');
                var select_filter_parent = $(this).parent('li').prev();
                var select_and_parent = select_filter_parent.prev();
                var select_filter = select_filter_parent.children('select').val();
                var select_and = select_and_parent.children('select').val();
                if ($(this).data('type') === 'date') {
                    $isdate = true;
                }
                switch (select_filter) {
                    case '0':
                        filter_text = 'td:eq(' + $id + '):contains("' + $(this).val() + '")';
                        break;
                    case '1':
                        filter_text = 'td:eq(' + $id + '):not(:contains("' + $(this).val() + '"))';
                        break;
                    case '2':
                        filter_text = 'td:eq(' + $id + '):startswith("' + $(this).val() + '")';
                        break;
                    case '3':
                        filter_text = 'td:eq(' + $id + '):endswith("' + $(this).val() + '")';
                        break;
                    case '4':
                        if ($isdate === true) {
                            filter_text = 'td:eq(' + $id + '):equaldate("' + $(this).val() + '")';
                        } else {
                            filter_text = 'td:eq(' + $id + '):equal("' + $(this).val() + '")';
                        }
                        break;
                    case '5':
                        if ($isdate === true) {
                            filter_text = 'td:eq(' + $id + '):not(:equaldate("' + $(this).val() + '"))';
                        } else {
                            filter_text = 'td:eq(' + $id + '):not(:equal("' + $(this).val() + '"))';
                        }

                        break;
                    case '6':
                        if ($isdate === true) {
                            filter_text = 'td:eq(' + $id + '):greaterdate("' + $(this).val() + '")';
                        } else {
                            filter_text = 'td:eq(' + $id + '):greaterthan("' + $(this).val() + '")';
                        }
                        break;
                    case '7':
                        if ($isdate === true) {
                            filter_text = 'td:eq(' + $id + '):lessdate("' + $(this).val() + '")';
                        } else {
                            filter_text = 'td:eq(' + $id + '):lessthan("' + $(this).val() + '")';
                        }
                        break;
                    case '8':
                        break;
                    case '9':
                        break;
                    default:
                }
                newlist = '';
                //                    if (($(this).data('type') === 'DOUBLE') && ($(this).text() !== null)) {

                $('tr', header).find('th').each(function () {
                    header_arr.push($(this).data('type'));
                    //alert($(this).text().match('^Сумма'));
                    if (($(this).data('type') === 'DOUBLE') && ($(this).text() !== null)) {
                        summary[$(this).index()] = 0;
                        summary_sum[$(this).index()] = true;
                    } else if ($(this).data('type') === 'LONG') {
                        summary[$(this).index()] = 0;
                    } else {
                        summary[$(this).index()] = '';
                        summary_sum[$(this).index()] = false;
                    }


                });
                $('tr', filter_tbody).find(filter_text).each(function () {
                    //console.log(filter_text);
                    var this2 = $(this)
                    $.each(header_arr, function (key, value) {
                        //alert(key);
                        if (value === 'LONG') {
                            summary[key] = summary[key] + 1;
                            //alert(summary[this2.index()]);    
                        } else if (value === 'DOUBLE' && summary_sum[key]) {
                            summary[key] = summary[key] + parseFloat(this2.parent('tr').find('td').eq(key).text());
                        }
                    });
                    newlist += $(this).parent('tr')[0].outerHTML;
                });
                filtered_tbody.html(newlist);
                filter_tbody = filtered_tbody;
                $isdate = false;
            }
        });
        var sum_count = 0;
        if (newlist === '') {
            $('td', parent.find('tfoot').children('tr')).each(function () {
                summary[sum_count] = $(this).text();
                sum_count++;
            });
        }
        sum_count = 0;
        $.each(summary, function (key, value) {
            footer.children('div').children('div').eq(sum_count).text(value);
            sum_count++;
        });
        if (filter_count > 0) {
            orig_tbody.hide();
            filtered_tbody.show();
        } else {
            orig_tbody.show();
            filtered_tbody.hide();
            $('.sticky-table-headers').css('min-height', '');
        }

        Resize_Table($('.sticky-cont'), $('.sticky-headers'), $('.sticky-footers'), $('.sticky-filters-list'), $('.sticky-cont .base-table'));
        return;
    }
    ;
    function Stickytableheaders($this) {
        var object = $($this);
        var sticky_headers = object.children('.sticky-headers');
        var sticky_filters_list_headers = object.children('.sticky-filters-list');
        var sticky_footers = object.children('.sticky-footers');
        var sticky_table_headers = sticky_headers.children('.sticky-table');
        var sticky_filters_list = sticky_filters_list_headers.children('.sticky-table');
        var sticky_filters = sticky_headers.children('.sticky-filters');
        var sticky_table_footers = sticky_footers.children('.sticky-table');
        var base_cont = object.children('.sticky-cont');
        var base_table = base_cont.children('.base-table');
        var base_thead = base_table.children('thead');
        var base_tfoot = base_table.children('tfoot');
        var new_headers = '';
        var new_filters = '';
        var new_filters_cont = '';
        var new_footers = '';
        var input_filters = '';
        var input_filter = '';
        var id = 0;
        $('th', base_thead.children('tr')).each(function () {
            if ($(this).data('type') === 'DATETIME' || $(this).data('type') === 'DATE') {
                input_filters = '</select></li>' +
                    '<li > <input class="search-date s-text" type="date" data-type="date"  /></li>';
                input_filter = '<input type="date" data-type="date"  />';
            } else {
                input_filters = '</select></li>' +
                    '<li > <input class="search-text s-text" type="text" data-type="text" placeholder="..." /></li>';
                input_filter = '<input type="text" placeholder="" />'
            }

            new_headers += '<div style="display: inline-block; width:' + $(this).outerWidth() + 'px">' + $(this).text() + '</div>';
            new_filters += '<div class="f-menu" style="width:' + $(this).outerWidth() + 'px"> ' +
                '<i data-id="' + id + '" class="mdi mdi-filter-outline f-ico" ></i>' + input_filter +
                '</div>';
            new_filters_cont += '<div id="f-m-' + id + '" data-id="' + id + '" class="f-cont" style="left:' + $(this).position().left + 'px">' +
                '<ul class="f-m-cont">' +
                '<li><select class="filter-menu-list">' +
                '<option value="0">Содержит:</option>' +
                '<option value="1">Не содержит:</option>' +
                '<option value="2">Начинается с:</option>' +
                '<option value="3">Заканчивается с:</option>' +
                '<option value="4">Равно:</option>' +
                '<option value="5">Не равно:</option>' +
                '<option value="6">Больше чем:</option>' +
                '<option value="7">Меньше чем:</option>' +
                input_filters +
                '<li><select class="filter-menu-list">' +
                '<option value="0">Содержит:</option>' +
                '<option value="1">Не содержит:</option>' +
                '<option value="2">Начинается с:</option>' +
                '<option value="3">Заканчивается с:</option>' +
                '<option value="4">Равно:</option>' +
                '<option value="5">Не равно:</option>' +
                '<option value="6">Больше чем:</option>' +
                '<option value="7">Меньше чем:</option>' +
                input_filters +
                '</ul>' +
                '</div>';
            id++;
        });
        $('td', base_tfoot.children('tr')).each(function () {
            new_footers += '<div style="display: inline-block; width:' + $(this).outerWidth() + 'px">' + $(this).text() + '</div>';
        });
        sticky_table_headers.html(new_headers);
        sticky_filters_list.html(new_filters_cont);
        sticky_filters.html(new_filters);
        sticky_table_footers.html(new_footers);
        sticky_table_headers.width(base_table.outerWidth() + 50);
        sticky_filters_list.width(base_table.outerWidth() + 50);
        sticky_filters.width(base_table.outerWidth() + 50);
        sticky_table_footers.width(base_table.outerWidth() + 50);
        

        Resize_Table(base_cont, sticky_headers, sticky_footers, sticky_filters_list_headers, base_table);
        base_table.css('margin-top', '29px');
        base_tfoot.hide();
        base_table.css('margin-bottom', '23px');
        base_cont.on('scroll', function () {
            sticky_table_headers.css({
                left: -$(this).scrollLeft()
            });
            sticky_filters.css({
                left: -$(this).scrollLeft()
            });
            sticky_filters_list.css({
                left: -$(this).scrollLeft()
            });
            sticky_table_footers.css({
                left: -$(this).scrollLeft()
            });
        });

        $(window).on('resize', $('.sticky-cont'), Resize_Table($('.sticky-cont'), $('.sticky-headers'), $('.sticky-footers'), $('.sticky-filters-list'), $('.sticky-cont .base-table')));

    }
    ;

    function Resize_Table(base_cont, sticky_headers, sticky_footers, sticky_filters_list_headers, base_table) {
        var num = 17;
        var num2= "16px";
        if (base_table.outerHeight() <= base_cont.outerHeight()) {
            num = 0;
            num2 = "0";
            //alert(base_table.outerHeight());
        }

        sticky_headers.width(base_cont.outerWidth() - num);
        sticky_filters_list_headers.width(base_cont.outerWidth() - num);
        sticky_footers.width(base_cont.outerWidth() - num);
        sticky_footers.css("bottom",num2);
    }



    $(document).on('click', '.f-ico', function () {
        var id = $(this).data('id');
        $('.f-cont:not([id="f-m-' + id + '"])').hide();
        $('#f-m-' + id).toggle();
    });
    $(document).on('click', '.table-1 td', function () {
        $('.f-cont').hide();
    });
    var timer = 0;
    $(document).on('propertychange change keyup paste input', '.search-text', function () {
        var $this = $(this);
        if (timer) {
            clearTimeout(timer);
        }
        timer = setTimeout(function () {

            FindRow($this, false);
            Refresh($('.sticky-table-headers'));

        }, 400);
    });
    $(document).on('change', '.search-date', function () {
        var $this = $(this);
        if (timer) {
            clearTimeout(timer);
        }
        timer = setTimeout(function () {
            FindRow($this, true);
            Refresh($('.sticky-table-headers'));
        }, 400);
    });
    $(document).on('propertychange change keyup paste input', '.f-menu input', function () {
        //alert($(this).closest('.sticky-table-headers').find('#f-m-' + $(this).closest('.f-menu').index()));
        $(this).closest('.sticky-table-headers').find('#f-m-' + $(this).closest('.f-menu').index()).find('input').eq(0).val($(this).val()).trigger('change');
    });
    var methods = {
        init: function () {
            return this.each(function () {
                $(this).removeClass('noactive').removeClass('pure-g');
                new Stickytableheaders(this);
            }
            );
        },
        refresh: function () {
            return this.each(function () {
                Refresh(this);
            });
        }
    };
    $.fn.StickyTableHeaders = function (method) {

        if (methods[method]) {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error('Метод с именем ' + method + ' не существует для jQuery.stickytableheaders');
        }

    };
})(jQuery);

