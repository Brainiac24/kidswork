$(document).on('click', function (e) {
    var tar = $(e.target).closest("body").find(".show-absolute");
    if (tar.length !== '' && !$(e.target).hasClass("menu-f-i")) {
        $(".show-absolute").removeClass("show-absolute");
    }

});

$(document).delegate(".c-box-bot-menu", "click", function () {

    $per = $(this).closest(".center-box-bot");

    $per.find(".c-box-bot-menu").removeClass("c-box-bot-menu-a");
    $(this).addClass("c-box-bot-menu-a");
    $(this).removeClass(".c-box-bot-menu-a");
    $per.find(".center-box-cont").hide();
    $per.find(".tab-" + $(this).data("tab-btn")).show();
});

$(document).delegate(".tab-text-edit textarea", "click", function () {
    $(this).height("34px");
    $(this).closest(".tab-text-edit").find(".tab-text-flags").show();
});


(function ($) {
    $.fn.rowCount = function () {
        return $('tr', $(this).find('tbody')).length;
    };
})(jQuery);

$(document).ready(function () {

    $('.btn-code-2.noactive').ListSelectBox({ btn_text: "Код: " });
    $('.listselectbox-2.noactive').ListSelectBox({ btn_text: "" });
    $('.listrate.noactive').ListSelectBox({ btn_text: "" });

    $('.sticky-table-headers.noactive').StickyTableHeaders();

    setTimeout(function () {
        $('.sticky-table-headers').StickyTableHeaders('refresh');
    }, 1000);

});

$(window).load(function () {


});

function table_cell_type($text, $type_string) {
    switch ($type_string) {
        case 'LONG':
            break;
        case 'LONGLONG':
            break;
        case 'VAR_STRING':
            $($text).addClass('text');
            break;
        case 'STRING':
            $($text).addClass('text');
            break;
        case 'BLOB':
            $($text).addClass('text');
            break;
        case 'SHORT':
            var $num = parseFloat($($text).text()).toFixed(3).replace('.', ',');
            if ($num === 'NaN') {
                $text.text(0);
            } else {
                $text.text($num);
            }
            break;
        case 'DOUBLE':
            var $num = parseFloat($($text).text()).toFixed(3).replace('.', ',');
            if ($num === 'NaN') {
                $text.text(0);
            } else {
                $text.text($num);
            }
            break;
        case 'DATETIME':
            /*var $date = new Date(Date.parse($($text).text())).toLocaleString().slice(0, 17).replace(',','') ;
             if ($date!=='Invalid Date') {
             $text.text($date);
             }*/
            $($text).addClass('date');
            break;
        case 'DATE':
            break;
        case 'TIMESTAMP':
            break;
        default:
            break;

    }
    return $text;
}
;

var tableToExcel = (function () {
    var uri = 'data:application/vnd.ms-excel;download="export.xls";base64,'
        , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>Экспорт</title><style>' +
            '@page {' +
            'margin:.25in .25in .25in .25in;' +
            'mso-header-margin:.15in;' +
            'mso-footer-margin:.15in;' +
            'mso-page-orientation:landscape;' +
            '}' +
            'tr { mso-height-source:auto; }' +
            'br { mso-data-placement:same-cell; }' +
            'td {' +
            'mso-style-parent:style0;' +
            'padding-top:1px;' +
            'padding-right:1px;' +
            'padding-left:1px;' +
            'mso-ignore:padding;' +
            'color:windowtext;' +
            'font-size:11.0pt;' +
            'font-style:normal;' +
            'text-decoration:none;' +
            'font-family:Calibri;' +
            'mso-generic-font-family:auto;' +
            'mso-font-charset:0;' +
            'mso-number-format:General;' +
            'text-align:center;' +
            'vertical-align:center;' +
            'border:none;' +
            'mso-background-source:auto;' +
            'mso-pattern:auto;' +
            'mso-protection:locked visible;' +
            'white-space:wrap;' +
            'mso-rotate:0;' +
            '}' +
            '.header {' +
            'mso-style-parent:style0;' +
            'font-weight:700;' +
            'background:#F2F2F2;' +
            'mso-pattern:black none;' +
            '}' +
            '.summ {' +
            'mso-style-parent:style0;' +
            'font-weight:700;' +
            '}' +
            '.text {mso-number-format:"@";}' +
            '.number {mso-number-format:"0";}' +
            '.date {mso-number-format:"General Date";}' +
            '</style><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
        , base64 = function (s) {
            return window.btoa(unescape(encodeURIComponent(s)))
        }
        , format = function (s, c) {
            return s.replace(/{(\w+)}/g, function (m, p) {
                return c[p];
            });
        };
    return function (table) {
        if (!table.nodeType)
            table = $(table);
        var name = $(table).data('table');
        var parent = table.parent().clone();
        parent = $(parent);
        if ($.trim($(".filtered-tbody", parent).html()) !== '') {
            $(".orig-tbody", parent).replaceWith('');
        }
        var foot = table.closest('.sticky-table-headers').children('.sticky-footers').children('.sticky-table');
        var new_foot = '';
        $("div", foot).each(function () {
            new_foot += '<td>' + $(this).text() + '</td>';
        });
        //alert(new_foot);
        $(".summ", parent).replaceWith('<tr class="summ">' + new_foot + '</tr>');
        var rows = parent.find("tr");
        var $arr = [];
        $("th", rows).each(function () {
            $arr[$(this).index()] = $(this).data('type');
            $(this).addClass('header');
        });

        $("td", rows).each(function () {
            table_cell_type($(this), $arr[$(this).index()]);
        });
        var ctx = { worksheet: name || 'Worksheet', table: parent.children().html() };

        if (navigator.msSaveBlob) {
            var blob = new Blob([format(template, ctx)], { type: 'application/vnd.ms-excel', endings: 'native' });
            navigator.msSaveBlob(blob, 'export.xls');
        } else {
            //alert(base64(format(template, ctx)));
            var a = document.createElement('a');
            a.href = uri + base64(format(template, ctx));
            a.download = name + ' - ' + new Date().toLocaleString().slice(0, 10) + '.xls';
            a.click();
            //window.location.href = uri + base64(format(template, ctx));
        }

    };

})();


$(document).delegate(".excel-btn", "click", function () {
    tableToExcel('table.table-1');
});


$(document).delegate(".ac-btn-ok", "click", function () {
    //alert();
    $message = $(this).closest("tr");
    $btn = $message.prev(".center-box-btn");
    $btn.show();
    $message.hide();
});

$(document).delegate('input[name="assets"]', "paste keyup", function () {
    var rate = "-";
    var value = parseFloat($(this).val());
    var hidden = $('input[name="assets_rate"]');
    if ($(this).val() == "") {
        rate = "";
    } else if (value < 3) {
        rate = "1";
    } else if (value >= 3 && value < 5) {
        rate = "2";
    } else if (value >= 5 && value < 10) {
        rate = "3";
    } else if (value >= 10 && value < 15) {
        rate = "4";
    } else if (value >= 15) {
        rate = "5";
    }
    setTimeout(function () {
        Hidden_Text(hidden, rate);
        Total_Rate();
    }, 100);

});

$(document).delegate('input[name="management_1"]', "paste keyup", function () {
    var rate = "-";
    var value = parseFloat($(this).val());
    var hidden = $('input[name="management_rate_1"]');
    if ($(this).val() == "") {
        rate = "";
    } else if (value < 0.42) {
        rate = "1";
    } else if (value >= 0.42 && value < 0.71) {
        rate = "2";
    } else if (value >= 0.71 && value < 0.91) {
        rate = "3";
    } else if (value >= 0.91 && value < 1.31) {
        rate = "4";
    } else if (value >= 1.31) {
        rate = "5";
    }
    setTimeout(function () {
        Hidden_Text(hidden, rate);
        Total_Rate();
    }, 100);
});

$(document).delegate('input[name="management_2"]', "paste keyup", function () {
    var rate = "-";
    var value = parseFloat($(this).val());
    var hidden = $('input[name="management_rate_2"]');
    if ($(this).val() == "") {
        rate = "";
    } else if (value < 1.51) {
        rate = "1";
    } else if (value >= 1.51 && value < 2.31) {
        rate = "2";
    } else if (value >= 2.31 && value < 3.21) {
        rate = "3";
    } else if (value >= 3.21 && value < 4.21) {
        rate = "4";
    } else if (value >= 4.21 && value < 6.21) {
        rate = "5";
    } else if (value >= 6.21 && value < 8.21) {
        rate = "6";
    } else if (value >= 8.21 && value < 9.21) {
        rate = "7";
    } else if (value >= 9.21 && value < 10.21) {
        rate = "8";
    } else if (value >= 10.21 && value < 11.21) {
        rate = "9";
    } else if (value >= 11.21) {
        rate = "10";
    }
    setTimeout(function () {
        Hidden_Text(hidden, rate);
        Total_Rate();
    }, 100);
});

$(document).delegate('input[name="management_3"]', "paste keyup", function () {
    var rate = "-";
    var value = parseFloat($(this).val());
    var hidden = $('input[name="management_rate_3"]');
    if ($(this).val() == "") {
        rate = "";
    } else if (value < 8.1) {
        rate = "1";
    } else if (value >= 8.1 && value < 13.1) {
        rate = "2";
    } else if (value >= 13.1 && value < 17.1) {
        rate = "3";
    } else if (value >= 17.1 && value < 22.1) {
        rate = "4";
    } else if (value >= 22.1) {
        rate = "5";
    }
    setTimeout(function () {
        Hidden_Text(hidden, rate);
        Total_Rate();
    }, 100);
});

$(document).delegate('input[name="earnings"]', "paste keyup", function () {
    var rate = "-";
    var value = parseFloat($(this).val());
    var hidden = $('input[name="earnings_rate"]');
    if ($(this).val() == "") {
        rate = "";
    } else if (value < 0) {
        rate = "5";
    } else if (value >= 0 && value < 1) {
        rate = "4";
    } else if (value >= 1 && value < 3) {
        rate = "3";
    } else if (value >= 3 && value < 5) {
        rate = "2";
    } else if (value >= 5) {
        rate = "1";
    }
    setTimeout(function () {
        Hidden_Text(hidden, rate);
        Total_Rate();
    }, 100);
});

$(document).delegate('input[name="turnover"]', "paste keyup", function () {
    var rate = "-";
    var value = parseFloat($(this).val());
    var hidden = $('input[name="turnover_rate"]');
    if ($(this).val() == "") {
        rate = "";
    } else if (value < 10.01) {
        rate = "1";
    } else if (value >= 10.01 && value < 18.01) {
        rate = "2";
    } else if (value >= 18.01 && value < 25.01) {
        rate = "3";
    } else if (value >= 25.01 && value < 35.01) {
        rate = "4";
    } else if (value >= 35.01) {
        rate = "5";
    }
    setTimeout(function () {
        Hidden_Text(hidden, rate);
        Total_Rate();
    }, 100);
});

$(document).delegate('input[name="reglaments"]', "paste keyup", function () {
    var rate = "-";
    var value = parseFloat($(this).val());
    var hidden = $('input[name="reglaments_rate"]');
    if ($(this).val() == "") {
        rate = "";
    } else if (value < 4.1) {
        rate = "1";
    } else if (value >= 4.1 && value < 6) {
        rate = "2";
    } else if (value >= 6 && value < 7.9) {
        rate = "3";
    } else if (value >= 7.9 && value < 10) {
        rate = "4";
    } else if (value >= 10) {
        rate = "5";
    }
    setTimeout(function () {
        Hidden_Text(hidden, rate);
        Total_Rate();
    }, 100);
});

$(document).delegate('input[name="projection"]', "paste keyup", function () {
    var rate = "-";
    var value = parseFloat($(this).val());
    var hidden = $('input[name="projection_rate"]');
    if ($(this).val() == "") {
        rate = "";
    } else if (value < 70) {
        rate = "5";
    } else if (value >= 70 && value < 80) {
        rate = "4";
    } else if (value >= 80 && value < 90) {
        rate = "3";
    } else if (value >= 90 && value < 100) {
        rate = "2";
    } else if (value >= 100) {
        rate = "1";
    }
    setTimeout(function () {
        Hidden_Text(hidden, rate);
        Total_Rate();
    }, 100);
});

$(document).delegate('input[name="risk"]', "paste keyup", function () {
    var rate = "-";
    var value = parseFloat($(this).val());
    var hidden = $('input[name="risk_rate"]');
    if ($(this).val() == "") {
        rate = "";
    } else if (value < 2.01) {
        rate = "1";
    } else if (value >= 2.01 && value < 3.01) {
        rate = "2";
    } else if (value >= 3.01 && value < 4.01) {
        rate = "3";
    } else if (value >= 4.01 && value < 5.01) {
        rate = "4";
    } else if (value >= 5.01) {
        rate = "5";
    }
    setTimeout(function () {
        Hidden_Text(hidden, rate);
        Total_Rate();
    }, 100);

});

function Hidden_Text(hidden, rate) {
    hidden.val(rate);
    if (rate == "") {
        hidden.next(".h-text").text("-")
    } else {
        hidden.next(".h-text").text(rate)
    }
}

function Total_Rate() {
    var rate = 0;
    var r1 = $('input[name="assets_rate"]');
    var r2 = $('input[name="management_rate_1"]');
    var r3 = $('input[name="management_rate_2"]');
    var r4 = $('input[name="management_rate_3"]');
    var r5 = $('input[name="earnings_rate"]');
    var r6 = $('input[name="turnover_rate"]');
    var r7 = $('input[name="reglaments_rate"]');
    var r8 = $('input[name="projection_rate"]');
    var r9 = $('input[name="risk_rate"]');
    //alert(r9.val())
    if (r1.val() !== "" &&
        r2.val() !== "" &&
        r3.val() !== "" &&
        r4.val() !== "" &&
        r5.val() !== "" &&
        r6.val() !== "" &&
        r7.val() !== "" &&
        r8.val() !== "" &&
        r9.val() !== "") {

        rate = (parseFloat(r1.val()) +
            ((parseFloat(r2.val()) +
                parseFloat(r3.val()) +
                parseFloat(r4.val())) / 3) +
            parseFloat(r5.val()) +
            parseFloat(r6.val()) +
            parseFloat(r7.val()) +
            parseFloat(r8.val()) +
            parseFloat(r9.val())) / 7;
        rate += 0.01;
        //alert(rate);
        $('input[name="total_rate"]').val(rate.toFixed(2)).next(".h-text").text(rate.toFixed(2));

    } else {
        $('input[name="total_rate"]').val("").next(".h-text").text("-");
    }
}

$(document).delegate('.id_module_code', "change", function () {
    $data = $(this).closest(".center-box").find('input').serialize();
    //alert($data);
    SendAjax("?ajax=1", $data, $(this).closest(".center-box").find(".center-box-cont"));
});

$(document).delegate('.b-item', "click", function () {
    $(this).closest(".dropdown").children('.b-item').removeClass("item-sel-a").removeClass("item-add-a").removeClass("item-upd-a").removeClass("item-del-a");
    var value = $(this).data("val");
    if (value == "1") {
        $(this).addClass("item-sel-a");
        //$(this).closest(".dropdown").focusout();
    } else if (value == "2") {
        $(this).addClass("item-add-a");
    } else if (value == "3") {
        $(this).addClass("item-upd-a");
    } else if (value == "4") {
        $(this).addClass("item-del-a");
    } else if (value == "0") {
        $(this).closest(".center-box").html("");
        return;
    }
    //alert($(this).closest(".box-menu").html());
    $(this).closest(".box-menu").find('input[name="data_mode"]').val(value).trigger("change");
    //alert($(this).closest(".center-box-cap").html());
    $(this).closest(".center-box-cap").trigger("hover");

});

function Refresh_Listbox(this2) {
    $(this2).next('.orig-list').find('li[data-v="'+this2.val()+'"]').click();
}

$(document).delegate('input[name="data_mode"]', "change", function () {
    //alert(123);
    $data = $(this).closest(".center-box").find('input').serialize();

    //alert(location.href + "&ajax=1");
    if ($(this).val() == "1") {
        $data = $(this).closest(".center-box").find('input').serialize();
        $(this).closest(".center-box").find('.center-box-cap').eq(0).attr("class", "center-box-cap").addClass("cap-sel");
    } else if ($(this).val() == "2") {
        $data = $(this).closest(".center-box").find('input').serialize();
        $(this).closest(".center-box").find('.center-box-cap').eq(0).attr("class", "center-box-cap").addClass("cap-add");
    } else if ($(this).val() == "3") {
        $data = $(this).closest(".center-box").find('input').serialize();
        $(this).closest(".center-box").find('.center-box-cap').eq(0).attr("class", "center-box-cap").addClass("cap-upd");
    } else if ($(this).val() == "4") {
        $data = $(this).closest(".center-box").find('input').serialize();
        $(this).closest(".center-box").find('.center-box-cap').eq(0).attr("class", "center-box-cap").addClass("cap-del");
    }

    SendAjax("?ajax=1", $data, $(this).closest(".center-box").find(".center-box-cont"));
});

$(document).delegate(".ac-btn-add", "click", function () {
    $data = $(this).closest(".center-box").find('input[name],select[name],textarea[name]').serialize();
    $ajax_this = $(this);
    SendAjax("?ajax=1&act=2", $data, '', Box_Msg);
});

$(document).delegate(".ac-btn-edit", "click", function () {
    $data = $(this).closest(".center-box").find('input[name],select[name],textarea[name]').serialize();
    $ajax_this = $(this);
    SendAjax("?ajax=1&act=3", $data, '', Box_Msg);
});

$(document).delegate(".ac-btn-del", "click", function () {
    $data = $(this).closest(".center-box").find('input[name],select[name],textarea[name]').serialize();
    $ajax_this = $(this);
    SendAjax("?ajax=1&act=4", $data, '', Box_Msg);
});



$(document).delegate(".dialog-box", "keyup", function (e) {
    //alert(e.keyCode );
    if (e.keyCode === 27) {
        $(this).children('.center-d-box').html("");
        $('.tab-text').removeClass('active-table-id');
        $(this).hide();
    }
});

$(document).delegate(".fade-box", "click", function () {
    $(this).next('.center-d-box').html("");
    $('.tab-text').removeClass('active-table-id');
    $(this).parent(".dialog-box").hide();
});

$(document).delegate(".dialog-box td", "click", function () {
    var hidden = $('.active-table-id').find('input[name^="id_"]');
    hidden.val($(this).parent('tr').children('td').eq(0).text());
    $(this).closest('.center-d-box').html("").closest(".dialog-box").hide();
    Refresh_Listbox(hidden);
    //$('.tab-text').removeClass('active-table-id');
});


$(document).delegate(".ac-btn-default", "click", function () {
    var is_child = parseInt($(this).closest('.center-box').find('input[name="ischild"]').val());

    if (is_child > 0) {
        $(this).closest('.center-child-box').hide()
        $(this).closest('.center-child-box').closest('.center-box').find(".table-box").show();
        $(this).closest('.center-child-box').html("");
    }

});

$(document).delegate(".box-child-btn", "click", function () {
    var childnum = parseInt(($(this).closest(".center-box").find('input[name="ischild"]').val())) + 1;
    $link = $(this).data("child-module") + "&submenu=2&ajax=2&ischild=" + childnum;
    //var pathArray = location.href.split( '/' );
    //$host =  pathArray[0] + '//' + pathArray[2] + "/" +  pathArray[3] + "/";
    //$data = $host + $link;
    //alert(location.href + $link);
    $(this).closest('.center-box-cont').find('.box-child-btn').removeClass('active-child');
    $(this).addClass("active-child");
    SendAjax($link, "", $(this).closest(".center-box").find(".center-child-box")), Box_Hide($(this));
    $(this).closest(".center-box").find(".center-child-box").show();

});

$(document).delegate(".btn-grid", "click", function () {
    var parent = $(this).closest('tr');
    $link = parent.children('.box-child-btn').data('child-module') + "&submenu=3&ajax=3";
    $(this).closest('.center-box-cont').find('.tab-text').removeClass('active-table-id');
    parent.children('.tab-text').addClass("active-table-id");
    SendAjax($link, "", $(".dialog-box").children(".center-d-box"));
    $(".dialog-box").show().focus();
});


function Box_Hide($this1) {
    $this1.closest(".table-box").hide();
}

function Box_Msg($this1) {
    $btn = $($this1).closest("tr");
    $message = $btn.next(".center-box-msg");
    try {
        $resp = jQuery.parseJSON(JSON.stringify($ajax_msg));
        alert($ajax_msg);
        $this1.closest('.center-child-box').closest('.center-box').find('.box-child-btn.active-child').next('td').html($resp.cmb);
        $message.html($resp.msg);
    } catch (error) {
        //alert(error);
    }
    $btn.hide();
    $message.show();
}

$ajax_this = null;
$ajax_msg = null;

function SendAjax($url_mode, $data_serialize, $print_container, $callback) {
    $options = {
        type: "POST",
        url: $url_mode,
        data: $data_serialize,
        success: function (msg) {
            $ajax_msg = msg;
            //alert(msg);
            if ($print_container !== '') {
                $print_container.html(msg);
            }
            if (typeof $callback !== "undefined") {
                $callback($ajax_this);
            }
            $('.listselectbox-2.noactive').ListSelectBox({ btn_text: "" });
        },
        error: function (xhr, str) {
            alert('Возникла ошибка: ' + xhr.responseCode);
        }
    };
    $.ajax($options);
}