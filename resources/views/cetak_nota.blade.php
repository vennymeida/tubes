<!DOCTYPE html>
<html>
    <head>
        <title>Nota Transaksi</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <style type="text/css">
        table tr td,
        table tr th{
            font-size: 9pt;
        }
        </style>
    </head>
    <body>
        <center>
            <h3 class="text-center mb-4">Nota Transaksi</h2>
            <h4 class="text-center mb-4">Toko Peralatan Rumah Tangga</h2>
            <h5 class="text-center mb-4">Jalan Basuki Rahmad 94, Tanjunganom, Nganjuk, Jatim</h2>
            <h2 class="text-center mb-4">______________________________________</h2>
        </center>
        <strong>No Transaksi: {{$transaksi->id }}</strong><br>
        <strong>Tanggal     : {{$transaksi->tanggal }}</strong><br>
        <strong>Total Harga : Rp {{ number_format($transaksi->total) }}</strong><br><br>
        <strong>Detail Transaksi :</strong><br><br>
        <table class="table table-bordered" style="width:95%;margin:0 auto;">
        <tr>
           
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total Belanja</th>
        </tr>
            @foreach ($detail as $tr)
                <tr>
					<td>{{ $tr ->produk->nama }}</td>&emsp
                    <td>{{ $tr ->jumlah }}</td>&emsp
                    <td>{{ number_format($tr->produk->harga) }}</td>&emsp
                    <td>{{ number_format($tr->subtotal) }}</td>&emsp
                </tr>
            @endforeach
        </table><br><br><br><br>
        <div class="pull-center mt-2">
        <!-- <strong>No Transaksi: {{$tr->transaksi->id }}</strong><br>
        <strong>Tanggal     : {{$tr->transaksi->tanggal }}</strong><br>
        <strong>Total Harga : Rp {{ number_format($tr->transaksi->total) }}</strong><br> -->
        <h6 class="text-left mb-4">Terimakasih atas transaksi yang telah diselesaikan. Selamat berbelanja kembali.</h1><br>
        <h7 class="text-left mb-4">Nb : Barang yang sudah di beli tidak dapat ditukar kembali. Kecuali ada perjanjian di awal</h1><br>
	
</body>
</html>