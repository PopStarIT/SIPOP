<script type="text/javascript">
    function nav_button_<?php echo $function ?>() {
        var id = jQuery("#table_<?php echo $methodid ?>").jqGrid('getGridParam', 'selrow');

        if (id) {
            var row = jQuery("#table_<?php echo $methodid ?>").jqGrid('getRowData', id);
            var assets_tags_name = row.r2;

            if (!assets_tags_name || assets_tags_name.trim() === '') {
                if (typeof show_error === 'function') {
                    show_error("show", 'Error', 'Data untuk QR Code tidak ditemukan pada baris yang dipilih.');
                } else {
                    alert('Error: Data untuk QR Code tidak ditemukan pada baris yang dipilih.');
                }
                return;
            }

            try {
                // Generate QR Code
                var qr = qrcode(0, 'M');
                qr.addData(assets_tags_name);
                qr.make();
                var imageDataURL = qr.createDataURL(4, 0);

                // Ukuran fisik dalam cm
                const targetWidthCm = 2.3;
                const targetHeightCm = 1.3;

                var printContent = `
<!DOCTYPE html>
<html>
<head>
    <title>Print QR Code - ${assets_tags_name}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
            background: white;
        }

        .qrcode-container {
            width: ${targetWidthCm}cm;
            height: ${targetHeightCm}cm;
            background: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;
            overflow: hidden;
            margin: 0 auto;
        }

       .qrcode-split {
    display: flex;
    flex-direction: row;
    align-items: center;
    height: 100%;
    width: 100%;
}

.qrcode-image {
    display: flex;
    align-items: center;
    justify-content: center;
    /* Atur lebar sesuai kebutuhan, misal: */
    width: 50%;
}

.qrcode-image img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

.value-text {
    font-size: 10px;
    padding-left: 10px;
    width: 50%;
    word-break: break-word;
    text-align: left;
}

        @media print {
            body {
                margin: 0;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            
            .qrcode-container {
                width: ${targetWidthCm}cm !important;
                height: ${targetHeightCm}cm !important;
                margin: 0 !important;
                padding: 0 !important;
                page-break-inside: avoid;
                background: white !important;
               
            }
            
            .qrcode-image {
                width: 100% !important;
                height: 100% !important;
                padding: 1px !important;
                margin: 0 !important;
               
            }
            
            .qrcode-image img {
                width: 100% !important;
                height: 100% !important;
                object-fit: contain !important;
                max-width: 100% !important;
                max-height: 100% !important;
              
            }
        }
    </style>
</head>
<body>
    <div class="qrcode-container">
    <div class="qrcode-split">
        <div class="qrcode-image">
            <img src="${imageDataURL}" alt="QR Code for ${assets_tags_name}" />
        </div>
        <div class="value-text">${assets_tags_name}</div>
    </div>
</div>
</body>
</html>
`;

                var printWindow = window.open('', '_blank', 'width=600,height=400');
                if (printWindow) {
                    printWindow.document.write(printContent);
                    printWindow.document.close();
                    printWindow.onload = function() {
                        setTimeout(function() {
                            printWindow.print();
                            printWindow.close();
                        }, 500);
                    };
                } else {
                    if (typeof show_error === 'function') {
                        show_error("show", 'Error', 'Popup diblokir. Mohon izinkan popup untuk situs ini.');
                    } else {
                        alert('Error: Popup diblokir. Mohon izinkan popup untuk situs ini.');
                    }
                }

            } catch (error) {
                console.error('Error saat generate QR Code:', error);
                if (typeof show_error === 'function') {
                    show_error("show", 'Error', 'Terjadi kesalahan: ' + error.message);
                } else {
                    alert('Error: Terjadi kesalahan: ' + error.message);
                }
            }

        } else {
            if (typeof show_error === 'function') {
                show_error("show", 'Error', 'Silakan pilih baris terlebih dahulu');
            } else {
                alert('Error: Silakan pilih baris terlebih dahulu');
            }
        }
    }
</script>