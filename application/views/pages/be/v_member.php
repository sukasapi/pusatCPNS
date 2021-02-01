<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Member</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    

    <section class="content">
        <div class="container-fluid">
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
            
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                    <div class="card-header">
                    <div class="float-right">
                    <!--<button type="button" class="btn bg-gradient-success" data-toggle="modal" data-target="#add_modal"> <i class="fas fa-plus"></i> Tambah User</button></div> -->
                    </div>
                        <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  
                  <tr>
                    <th>No.</th>
                    <th>Nama lengkap</th>
                    <th>ID</th>
                    <th>TTL</th>
                    <th>Alamat</th>
                    <th>Nomor Telpon</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Registrasi</th>
                    <th>Status</th>
                    <th>Tools</th>
                  </tr>
                
                  </thead>
                  <tbody>
                  <?php 
                  $str="";
                  $counter=1;
                  if(count((Array)$member) > 0){
                        foreach ($member as $row){
                            $str.="<tr>";
                            $str.="<td>".$counter."</td>";
                            $str.="<td>".$row->nama_lengkap."</td>";
                            $str.="<td>".$row->jenis_identitas."/".$row->no_identitas."</td>";
                            $str.="<td>".$row->tp_lahir."/".$row->tg_lahir."</td>";
                            $str.="<td>".$row->alamat."</td>";
                            $str.="<td>".$row->no_telp."</td>";
                            $str.="<td>".$row->email."</td>";
                            $str.="<td>".$row->gender."</td>";
                            $str.="<td>".$row->status_user."</td>";
                            $str.="<td>".date('d-m-Y',strtotime($row->createdDtm))."</td>";
                            $str.="<td>
                            <a href='".base_url('Admin/resetpassword/').$row->id_user."' class='btn btn-sm btn-danger'>Reset</a>
                            <button type='button' data-toggle='modal' data-target='#edit_modal".$row->id_user."' class='btn btn-sm btn-warning'>Edit</button>
                            </td>";
                            $str.="</tr>";
                            $counter++;
                        }
                        echo $str;
                    }
                      ?>
                  
                  </tfoot>
                </table>
                        </div>     
                    </div>
                </div>
              
            </div>
        </div>
    </section>


   