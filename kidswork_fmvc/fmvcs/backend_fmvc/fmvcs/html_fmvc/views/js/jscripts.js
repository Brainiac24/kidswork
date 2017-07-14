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

    $('.btn-code-2.noactive').ListSelectBox({btn_text:"Код: "});

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
    //TableToExcel();
    //fnExcelReport();
});