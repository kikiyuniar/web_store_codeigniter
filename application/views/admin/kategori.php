<div class="container-fluid">
	<button class="btn btn-sm btn-primary mb-3 shadow" data-toggle="modal" data-target="#tambah_kategori"><i class="fas fa-plus fa-sm"></i> Tambah Kategori</button>
  <div class="container center  ">
	<table class="col-md-12 table table-bordered table-hover shadow table-striped  ">
		<tr style="text-align: center; " class="thead-dark">
			<th>NO</th>
			<th>NAMA KATEGORI</th>
			<th>ID KATEGORI</th>
			<th>AKSI</th>
		</tr>
		
		<?php 
		$no=1;
		foreach ($kategori as $ktg) : ?>

		<tr style="text-align: center;">
			<td><?php echo $no++ ?></td>
			<td><?php echo $ktg->nama_kategori ?></td>
			<td><?php echo $ktg->id_kategori ?></td>
			<td><?php echo anchor('admin/kategori/hapus/' .$ktg->id, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?></td>
		</tr>
		
  <?php endforeach; ?>
	</table>
</div>

<!--     <div class="row">
      <div class="col-md-6 text-right">
          <?php echo $pagination ?>
      </div>
    </div> -->

</div>

<!-- Modal Input data kategori -->
<div class="modal fade" id="tambah_kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/kategori/tambah_kategori'; ?>" method="post" enctype="multipart/form-data">

        	<div class="form-group">
        		<label>Id Kategori</label>
        		<input type="text" name="id_kategori" class="form-control" readonly="readonly" value="KTG-<?=date('YmHs');?> <?php random_string('numeric',4);?>">
        	</div> 

        	<div class="form-group">
        		<label>Nama Kategori</label>
        		<input type="text" name="nama_kategori" class="form-control">
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