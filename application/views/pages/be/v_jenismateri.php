<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">DAFTAR JENIS TES DAN MATERI</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  <section class="content">

  </section>
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
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <!-- Input addon -->
            <div class="card card-secondary">
              <div class="card-header">
                <div class="d-flex align-items-center">
                  <h5 class="mr-auto p-3">Jenis Tes</h5>
                  <div class="btn-group" role="group">
                  <button type="button" class="btn bg-gradient-success" data-toggle="modal" data-target="#add_jenis"> <i class="fas fa-plus"></i> Tambah Tes</button>
                  </div>
                </div>
              </div>
              <div class="card-body">
              <table id="tbl_tes" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Jenis Tes</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $str="";  
                  foreach($tes as $rtes){
                    $str .="<tr>";
                    $str .="<td>".$rtes->jenis_tes."<a href='' data-toggle='tooltip' data-placement='bottom' title='".$rtes->desc."'>
                    <i class='fa fa-question-circle'></i>
                  </a></td>";
                    $str .="<td>
                      <button type='button' class='btn bg-gradient-danger' data-toggle='modal' data-target='#edit_produk".$rtes->id_tes."'>Edit</button>
                    </td>";
                    $str .="</tr>";
                  }
                  echo $str;
                  ?>
                  </tbody>
              </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
           
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="card card-info">
              <div class="card-header">
              <div class="d-flex align-items-center">
                  <h5 class="mr-auto p-3">Materi</h5>
                  <div class="btn-group" role="group">
                  <button type="button" class="btn bg-gradient-success" data-toggle="modal" data-target="#add_materi"> <i class="fas fa-plus"></i> Tambah Materi</button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="tbl_materi" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Materi</th>
                    <th>Jenis Tes</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $str="";  
                  foreach($materi as $rmat){
                    $str .="<tr>";
                    $str .="<td>".$rmat->n_materi."<a href='' data-toggle='tooltip' data-placement='bottom' title='".$rmat->desc."'>
                    <i class='fa fa-question-circle'></i>
                  </a></td>";
                  $str.="<td>".$rmat->jenistes."</td>";
                    $str .="<td>
                      <button type='button' class='btn bg-gradient-danger' data-toggle='modal' data-target='#edit_produk".$rmat->idm."'>Edit</button>
                    </td>";
                    $str .="</tr>";
                  }
                  echo $str;
                  ?>
                  </tbody>
              </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->   
      </div>
      
    </section>

</div>


<!--------------- MODAL -----> 
<!------ ADD PRODUK MODAL ---> 
<div class="modal fade" id="add_jenis">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title">Tambah Jenis Tes</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form class="form-horizontal" enctype="multipart/form-data" id="addTes" action="<?php echo base_url('Admin/addTes') ?>" method="post" role="form">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="tes" class="col-sm-2 col-form-label">Jenis Tes</label>
                    <div class="col-sm-10">
                      <input type="text" name="jenistes" class="form-control" id="jenistes" placeholder="Jenis tes">
                    </div>
                  </div>     
                  <div class="form-group row">
                    <label for="desc" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                      <input type="text" name="desc" class="form-control" id="desc" placeholder="Deskripsi Singkat Jenis tes">
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
   foreach ($tes as $redtes){
     ?>
     

     <?php
   }
?>
<!--- END EDIT PRODUK MODAL -->


<!------ ADD MATERI ---> 
<div class="modal fade" id="add_materi">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title">Tambah Materi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form class="form-horizontal" enctype="multipart/form-data" id="addTes" action="<?php echo base_url('Admin/addMateri') ?>" method="post" role="form">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="materi" class="col-sm-2 col-form-label">Nama Materi</label>
                    <div class="col-sm-10">
                      <input type="text" name="materi" class="form-control" id="materi" placeholder="Nama Materi tes">
                    </div>
                  </div>     
                  <div class="form-group row">
                    <label for="tes" class="col-sm-2 col-form-label">Jenis Tes</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="tes">
                        <option aria-readonly >pilih jenis tes</option>
                        <?php 
                          foreach($tes as $rdtes){
                            echo "<option value=".$rdtes->id_tes.">".$rdtes->jenis_tes."</option>";
                          }
                        ?>
                      </select>
                    </div>
                  </div>    
                  <div class="form-group row">
                    <label for="desc" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                      <input type="text" name="desc" class="form-control" id="desc" placeholder="Deskripsi Singkat Materi">
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

<!--- END MATERI -->
<!------------ END OF MODAL --->