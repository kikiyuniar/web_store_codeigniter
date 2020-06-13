<!DOCTYPE html>
<html><head>
	<title></title>
</head><body>
	<h2 style="text-align: center;"><strong>Data Barang</strong></h2><br><br>
	<table border="1">
		<tr>
			<th>NO</th>
			<th>NAMA BARANG</th>
			<th>KETERANGAN</th>
			<th>KATEGORI</th>
			<th>HARGA</th>
			<th>STOK</th>
		</tr>
		
		<?php 
		$no=1;
		foreach ($barang as $brg) : ?>

		<tr>
			<td style="text-align: center;"><?php echo $no++ ?></td>
			<td><?php echo $brg->nama_brg ?></td>
			<td><?php echo $brg->keterangan ?></td>
			<td><?php echo $brg->kategori ?></td>
			<td>Rp. <?php echo number_format($brg->harga, 0,',','.' ) ?></td>
			<td style="text-align: center;"><?php echo $brg->stok ?></td>
		</tr>
		
		<?php endforeach; ?>
	</table>

</body></html>
