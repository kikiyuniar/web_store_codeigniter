<div class="container-fluid">
  <h4>Barang Keluar</h4>
  <table class="table table-bordered table-hover table-striped">
    <tr align="center">

      <th>ID Invoice</th>
      <th>ID Barang</th>
      <th>Nama Barang</th>
      <th>Jumlah</th>
      <th>Tanggal Keluar</th>
    </tr>

    <?php 
    
    foreach ($pesanan as $psn):
     ?>
     <tr>

      <td align="center"><?php echo $psn->id_invoice ?></td>
      <td align="center"><?php echo $psn->id_brg ?></td>
      <td><?php echo $psn->nama_brg ?></td>
      <td align="center"><?php echo $psn->jumlah ?></td>
      <td align="center"><?php echo $psn->tgl_pesan ?></td>
     </tr>
    <?php endforeach; ?>
  </table>
      <div class="row">
        <div class="col-md-12 text-right">
            <?php echo $pagination ?>
        </div>
    </div>
</div>