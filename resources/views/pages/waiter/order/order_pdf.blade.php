<!DOCTYPE html>
<html>
<head>
	<title>Laporan Riwayat Order</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>

    @foreach($order as $row)
        <table style="border:none;">
            <tr>
                <th>No</th>
                <td>: {{$row->id}}</td>
            </tr>
            <tr>
                <th>No Meja</th>
                <td>: {{$row->no_meja}}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>: {{$row->nama}}</td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>: {{$row->tanggal}}</td>
            </tr>
        </table>
        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Masakan</th>
                    <th>Keterangan</th>
                    <th>Qty</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
            @foreach($order_detail as $row2)
                @if($row->id == $row2->id_order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row2->masakan->nama_masakan}}</td>
                    <td>{{ $row2->keterangan}}</td>
                    <td>{{ $row2->qty}}</td>
                    <td>{{ $row2->harga}}</td>
                </tr>
                @endif
            @endforeach
                <tr>
                    <th colspan="4">Total</th>
                    <td>{{$row->harga}}</td>
                </tr>
            </tbody>
        </table>
    @endforeach

	<!-- <table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>No Meja</th>
				<th>Nama</th>
				<th>Tanggal</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			@foreach($order as $p)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{$p->no_meja}}</td>
				<td>{{$p->nama}}</td>
				<td>{{$p->tanggal}}</td>
				<td>{{$p->harga}}</td>
			</tr>
			@endforeach
		</tbody>
	</table> -->

</body>
</html>