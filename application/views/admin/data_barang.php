<div class="container-fluid">
	<button class="btn btn-sm btn-primary mb-3 shadow" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Barang</button>

  <a class="btn btn-sm btn-danger mb-3 shadow" href="<?php echo base_url('admin/data_barang/pdf') ?>" ><i class="fas fa-file fa-sm"></i> Export to PDF</a>
      <!-- Topbar Search -->
  <div class="row">
    <div class="col-md-4">
      <form action="<?php echo base_url('admin/data_barang/search'); ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control bg-white border-0 small" placeholder="Search keyword..." name="keyword" autocomplete="off" autofocus="">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit"><i class="fas fa-search fa-sm"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>

<!--   <div class="navbar-form navbar-right">
    <?php echo form_open('admin/data_barang/search') ?>
    <input type="text" name="keyword" class="form-control col-md-4" placeholder="Search">
    <button type="submit" class="btn btn-success">Cari</button>
    <?php echo form_close() ?>
  </div> -->
	<table class="table text-center table-bordered table-striped ">
		<tr class="thead-dark">
			<th>NO</th>
			<th>NAMA BARANG</th>
			<th>KETERANGAN</th>
			<th>KATEGORI</th>
			<th>HARGA</th>
			<th>STOK</th>
			<th colspan="3">AKSI</th>
		</tr>
		
		<?php 
		
		foreach ($barang as $brg) : ?>

		<tr>
			<td><?php echo ++$start ?></td>
			<td><?php echo $brg->nama_brg ?></td>
			<td><?php echo $brg->keterangan ?></td>
			<td><?php echo $brg->kategori ?></td>
			<td>Rp. <?php echo number_format($brg->harga, 0,',','.' ) ?></td>
			<td><?php echo $brg->stok ?></td>
			<td><?php echo anchor('admin/data_barang/detail_barang/' .$brg->id_brg, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?></td>
			<td><?php echo anchor('admin/data_barang/edit/' .$brg->id_brg, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?></td>
			<td><?php echo anchor('admin/data_barang/hapus/' .$brg->id_brg, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?></td>
		</tr>
		
		<?php endforeach; ?>
	</table>
    <div class="row">
        <div class="col-md-3">
            <a href="#" class="btn btn-primary">Total Barang : <?php echo $total_brg ?></a>
    </div>
        <div class="col-md-6 text-right">
            <?php echo $pagination ?>
        </div>
    </div>
</div>

<!-- Modal Input data barang -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_barang/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">

        	<div class="form-group">
        		<label>Nama Barang</label>
        		<input type="text" name="nama_brg" class="form-control">
        	</div> 

        	<div class="form-group">
        		<label>Keterangan</label>
        		<input type="text" name="keterangan" class="form-control">
        	</div> 

        	<div class="form-group">
        		<label>Kategori</label>
        		<select class="form-control" name="kategori">
              <?php 
              foreach ($kategori as $ktg) : ?>

            <option><?php echo $ktg->nama_kategori ?></option> 

            <?php endforeach; ?>
            </select>
        	</div>

        	<div class="form-group">
        		<label>Harga</label>
        		<input type="text" name="harga" class="form-control">
        	</div> 

        	<div class="form-group">
        		<label>Stok</label>
        		<input type="text" name="stok" class="form-control">
        	</div> 

        	<div class="form-group">
        		<label>Gambar Produk</label><br>
        		<input type="file" name="gambar" class="form-control">
        	</div> 
        	
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>

      </form>
    </div>
  </div>
</div>
