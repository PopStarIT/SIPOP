<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Packing List</title>
    <style>
        /* Gaya Tampilan di Layar (Screen) */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            background: white;
            max-width: 800px;
            margin: auto;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header { 
		  /* border-bottom: 2px solid #333; */
		  padding-bottom: 10px; 
		  margin-bottom: 20px; 
		  text-align: center;
		}
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f8f8f8; }
        
        .btn-area { margin-top: 20px; text-align: right; }
        .btn { padding: 10px 20px; cursor: pointer; background: #27ae60; color: white; border: none; border-radius: 5px; }

        /* Gaya Khusus Saat Dicetak (Print) */
        @media print {
            body { background: white; padding: 0; }
            .container { box-shadow: none; max-width: 100%; margin: 0; }
            .no-print { display: none; } /* Elemen ini akan hilang di kertas */
            
            @page {
                size: A4;
                margin: 2cm;
            }
        }
    </style>
</head>
<body onload="window.print();">

    <div class="container">
        <div class="header">
            <h2>DETAIL PACKING LIST</h2>
            <p>Tanggal: 15 Maret 2026</p>
        </div>

        <p><strong>Kepada:</strong> Pelanggan Setia</p>

        <table>
            <thead>
                <tr>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Layanan Pengembangan Web</td>
                    <td>1</td>
                    <td>Rp 5.000.000</td>
                </tr>
            </tbody>
        </table>

        <div class="btn-area no-print">
            <p><i>Halaman ini otomatis membuka jendela cetak. Jika tidak muncul, klik tombol di bawah:</i></p>
            <button class="btn" onclick="window.print()">Cetak Manual</button>
        </div>
    </div>

</body>
</html>