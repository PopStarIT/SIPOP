<script type="text/javascript">  
(function ($) {
    'use strict';
    $.extend($.fn.fmatter, {
        dynamicLinkAndNumeric: function (cellValue, options, rowData) {
            var op = { url: '#' }, 
                attrStr = '';
            
            // 1. Ambil formatoptions dari colModel
            if (typeof options.colModel.formatoptions !== 'undefined') {
                op = $.extend({}, op, options.colModel.formatoptions);
            }

            // 2. Jalankan fungsi URL dinamis jika ada
            if ($.isFunction(op.url)) {
                op.url = op.url.call(this, cellValue, options.rowId, rowData, options);
            }

            // 3. PROSES ANGKA (Format Numerik)
            // Kita pastikan cellValue adalah angka agar bisa diformat
            var numValue = parseFloat(cellValue) || 0;
            var formattedValue = $.fn.fmatter.util.NumberFormat(numValue, {
                decimalSeparator: ".",
                thousandsSeparator: ",",
                decimalPlaces: 0,
                defaultValue: '0'
            });

            // 4. LOGIKA WARNA & RENDER HTML
            // Cek apakah cellValue valid sebagai angka
            if (!isNaN(numValue)) {
                var colorStyle = (numValue >= 1) ? "color: Red;" : "color: green;";
                
                return '<a href="' + op.url + '" ' +
                       (op.target ? ' target=' + op.target : '') +
                       (op.onClick ? ' onclick="return $.fn.fmatter.dynamicLinkAndNumeric.onClick.call(this, arguments[0]);"' : '') +
                       ' style="' + colorStyle + ' font-weight: bold;">' +
                       formattedValue + '</a>';
            } else {
                return '&nbsp;';
            }
        }
    });

    // Handler untuk Unformat dan Click
    $.extend($.fn.fmatter.dynamicLinkAndNumeric, {
        unformat: function (cellValue, options, elem) {
            // Mengambil teks dan membuang koma agar kembali jadi angka murni
            return $(elem).text().replace(/,/g, '');
        },
        onClick: function (e) {
            var $cell = $(this).closest('td'),
                $row = $cell.closest('tr.jqgrow'),
                $grid = $row.closest('table.ui-jqgrid-btable'),
                p, iCol;
        
            if ($grid.length === 1) {
                p = $grid[0].p;
                if (p) {
                    iCol = $.jgrid.getCellIndex($cell[0]);
                    var colModel = p.colModel[iCol];
                    if (colModel.formatoptions && $.isFunction(colModel.formatoptions.onClick)) {
                        colModel.formatoptions.onClick.call($grid[0],
                            $row.attr('id'), $row[0].rowIndex, iCol, $cell.text(), e);
                    }
                }
            }
            return false;
        }
    });
}(jQuery));
			
</script>