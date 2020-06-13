
<div class="container-fluid">
	
	<!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a style="text-decoration:none"; class=" card border-left-primary shadow-sm h-100 py-2" href="<?php echo base_url('admin/data_barang') ?>">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Barang</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo($total_brg) ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-database fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a style="text-decoration:none"; class="card border-left-success shadow-sm h-100 py-2" href="<?php echo base_url('admin/invoice') ?>">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Invoice</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo($total_ivc) ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a style="text-decoration:none"; class="card border-left-info shadow-sm h-100 py-2" href="<?php echo base_url('admin/barang_keluar') ?>">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Barang Keluar</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo ($total_brg_keluar) ?></div>
                        </div>
                        <!-- <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div> -->
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <!-- Pending Requests Card Example -->
            <a style="text-decoration:none"; class="col-xl-3 col-md-6 mb-4" href="<?php echo base_url('admin/kategori') ?>">
              <div class="card border-left-warning shadow-sm h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Kategori</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($total_kategori) ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>

          <!-- Content Row -->
</div>
