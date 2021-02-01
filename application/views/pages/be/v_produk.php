<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">DAFTAR PRODUK</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  
    <section class="content">
      <div class="container-fluid">
      
        <!---- ALERT BOX -->
        <div class="row">
                    <div class="col-md-12">
                        <?php
                            $this->load->helper('form');
                            $error = $this->session->flashdata('error');
                            if($error)
                            {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->flashdata('error'); ?>                    
                        </div>
                        <?php } ?>
                        <?php  
                            $success = $this->session->flashdata('success');
                            if($success)
                            {
                        ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                        <?php } ?>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
        <!---- END ALERT BOX -->

        <!---- INFO BOX --> 
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Produk Aktif</span>
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Kursus Berjalan</span>
                <span class="info-box-number">4</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Kursus Gratis</span>
                <span class="info-box-number">1</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pendaftar</span>
                <span class="info-box-number">100</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.END INFO BOX -->
        

        <!-------- PRODUK LIST ---> 
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Daftar Produk</h3>
                <div class="float-right">
                    <button type="button" class="btn bg-gradient-success" data-toggle="modal" data-target="#add_produk"> <i class="fas fa-plus"></i> Tambah Produk</button>
                </div>
                  
                </div>
                <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nama Produk</th>
                    <th>Harga Produk</th>
                    <th>Aktif</th>
                    <th>Diikuti Oleh</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $str="";  
                  foreach($produk as $row){
                      if($row->visibility > 0){
                          $aktif ="aktif";
                      }else{
                          $aktif="tidak aktif";
                      }
                    $str .="<tr>";
                    $str .="<td>".$row->nama_produk."</td>";
                    $str .="<td>".$row->price."</td>";
                    $str .="<td>".$aktif."</td>";
                    $str .="<td>15</td>";
                    $str .="<td>
                      <button type='button' class='btn bg-gradient-danger' data-toggle='modal' data-target='#edit_produk".$row->id."'>Edit</button>
                    </td>";
                    $str .="</tr>";
                  }
                  echo $str;
                  ?>
                  </tbody>
                </div>
            </div>
          </div>
        </div>


        <!-------- END PRODUK LIST -->



      </div>
    </section>

</div>


<!--------------- MODAL -----> 
<!------ ADD PRODUK MODAL ---> 
<div class="modal fade" id="add_produk">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title">Tambah Produk</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form class="form-horizontal" enctype="multipart/form-data" id="addProduk" action="<?php echo base_url('Admin/addProduk') ?>" method="post" role="form">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="Judul" class="col-sm-2 col-form-label">Nama Produk</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control" id="judul" placeholder="Nama Produk">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Singkat</label>
                    <div class="col-sm-10">
                    <input type="text" name="short_desc" class="form-control" id="short_desc" placeholder="deskripsi singkat">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                    <textarea name="deskripsi" class="textarea" placeholder="Place some text here"
                          style="width: 80%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    </textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                      <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga Produk">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="aktivasi" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="image">
                        <label class="custom-file-label" for="exampleInputFile">Pilih File</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                    </div>
                  </div>
                
                  <div class="form-group row">
                    <label for="aktivasi" class="col-sm-2 col-form-label">Aktifkan</label>
                    <div class="col-sm-10">
                    <input type="checkbox" name="aktif" data-bootstrap-switch>
                    </div>
                  </div>
                  
                </div>
            </div>
            <div class="modal-footer justify-content-between">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" value="simpan" class="btn btn-primary">
               </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<!--- END ADD PRODUK MODAL -->

<!--- EDIT PRODUK MODAL -->
<?php 
   foreach ($produk as $rpro){
     ?>
     <div class="modal fade" id="edit_produk<?php echo $rpro->id; ?>">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title">Edit Produk <?php echo $rpro->nama_produk; ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form class="form-horizontal" enctype="multipart/form-data" id='editProduk<?php echo $rpro->id; ?>' action="<?php echo base_url('Admin/editProduk/').$rpro->id ?>" method="post" role="form">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="Judul" class="col-sm-2 col-form-label">Nama Produk</label>
                    <div class="col-sm-10">
                      <input type="text" value='<?php echo $rpro->nama_produk; ?>' name="name" class="form-control" id="judul" placeholder="Nama Produk">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Singkat</label>
                    <div class="col-sm-10">
                    <input type="text" name="short_desc" class="form-control" id="short_desc" value="<?php echo $rpro->short_desc; ?>" placeholder="deskripsi singkat">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                    <textarea name="deskripsi" class="textarea" placeholder="" 
                          style="width: 80%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                          <?php echo $rpro->desc; ?>
                    </textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo $rpro->price; ?>" name="harga" class="form-control" id="harga" placeholder="Harga Produk">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="aktivasi" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="image">
                        <label class="custom-file-label" for="exampleInputFile">Pilih File</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                    </div>
                  </div>
                
                  <div class="form-group row">
                    <label for="aktivasi" class="col-sm-2 col-form-label">Aktifkan</label>
                    <div class="col-sm-10">
                    <input type="checkbox" name="aktif">
                    </div>
                  </div>
                  
                </div>
            </div>
            <div class="modal-footer justify-content-between">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" value="simpan" class="btn btn-primary">
               </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

     <?php
   }
?>
   

<!--- END EDIT PRODUK MODAL -->


<!------------ END OF MODAL --->