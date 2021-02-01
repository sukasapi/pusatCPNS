<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Administrator User</h1>
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
                    <div class="card card-dark">
                    <div class="card-header">
                    <div class="float-right">
                    <button type="button" class="btn bg-gradient-success" data-toggle="modal" data-target="#add_modal"> <i class="fas fa-plus"></i> Tambah User</button></div>
                    </div>
                        <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  
                  <tr>
                    <th>No.</th>
                    <th>Nama User</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Nomor Telpon</th>
                    <th>Otoritas</th>
                    <th>Status</th>
                    <th>Tools</th>
                  </tr>
                
                  </thead>
                  <tbody>
                  <?php 
                  $str="";
                  $counter=1;
                  if(count((Array)$users) > 0){
                        foreach ($users as $row){
                            if($row->status == '1'){
                                $status = 'hapus';
                            }else{
                                $status = 'aktif';
                            }
                            $str.="<tr>";
                            $str.="<td>".$counter."</td>";
                            $str.="<td>".$row->nama."</td>";
                            $str.="<td>".$row->uname."</td>";
                            $str.="<td>".$row->email."</td>";
                            $str.="<td>".$row->hp."</td>";
                            $str.="<td>".$row->roleName."</td>";
                            $str.="<td>".$status."</td>";
                            $str.="<td>
                            <a href='".base_url('Admin/resetpassword/').$row->idus."' class='btn btn-sm btn-info'>Reset</a>
                            <a href='".base_url('Admin/delUser/').$row->idus."' class='btn btn-sm btn-danger'> Hapus</a>
                            <button type='button' data-toggle='modal' data-target='#edit_modal".$row->idus."' class='btn btn-sm btn-warning'>Edit</button>
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


    <!---- MODAL HERE -->

    <!--- MODAL ADD USER -->
    <div class="modal fade" id="add_modal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> Tambah User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
            <form role="form" id="addUser" action="<?php echo base_url('Admin/addUser') ?>" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                            <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Full Name</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('fname'); ?>" id="fname" name="fname" maxlength="128">
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="uname">User Name</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('uname'); ?>" id="uname" name="uname" maxlength="128">
                                    </div>
                                    
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control required" id="password" name="password" maxlength="20">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Confirm Password</label>
                                        <input type="password" class="form-control required equalTo" id="cpassword" name="cpassword" maxlength="20">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="text" class="form-control required email" id="email" value="<?php echo set_value('email'); ?>" name="email" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Mobile Number</label>
                                        <input type="text" class="form-control required digits" id="mobile" value="<?php echo set_value('mobile'); ?>" name="mobile" maxlength="10">
                                    </div>
                                </div>
                                    
                            </div>
                            <div class="row">
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select class="form-control required" id="role" name="role">
                                            <option value="0">Select Role</option>
                                            <?php
                                            if(!empty($role))
                                            {
                                                foreach ($role as $rl)
                                                {
                                                    ?>
                                                    <option value="<?php echo $rl->roleId ?>" <?php if($rl->roleId == set_value('role')) {echo "selected=selected";} ?>><?php echo $rl->role ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                     
                         
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary" value="tambah">
            </div>    
      </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </div>


    <!--- END ADD USER -->
   

    <!---- MODAL EDIT USER -->

    <?php foreach ($users as $rm){
        ?>
             <div class="modal fade" id="edit_modal<?php echo $rm->idus; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> Edit User <?php echo  $rm->nama; ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
            <form role="form" id="editUser" action="<?php echo base_url('Admin/editUser/'). $rm->idus;?>" method="post" role="form">
                        <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Full Name</label>
                                        <input type="text" class="form-control required" value="<?php echo $rm->nama; ?>" id="fname" name="fname" maxlength="128">
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="uname">User Name</label>
                                        <input type="text" readonly class="form-control required" value="<?php echo $rm->uname; ?>" id="uname" name="uname" maxlength="128">
                                    </div>
                                    
                                </div>
                               
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="text" class="form-control required email" id="email" value="<?php echo $rm->email; ?>" name="email" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Mobile Number</label>
                                        <input type="text" class="form-control required digits" id="mobile" value="<?php echo $rm->hp;?>" name="mobile" maxlength="10">
                                    </div>
                                </div>
                                    
                            </div>
                            <div class="row">
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select class="form-control required" id="role" name="role">
                                            <option disabled value="0">Select Role</option>
                                            <?php
                                          
                                            if(!empty($role))
                                            {
                                                foreach ($role as $re)
                                                {
                                                   if($re->roleId == $rm->role){
                                                       echo "<option value='".$re->roleId."' selected>".$re->role."</option>";
                                                   }else{
                                                    echo "<option value='".$re->roleId."'>".$re->role."</option>";
                                                   }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                     
                         
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary" value="update">
            </div>    
      </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </div>
        <?php
    } 
    ?>
    <!--- END EDIT USER -->
   