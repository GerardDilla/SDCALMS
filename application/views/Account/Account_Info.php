 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>Edit Info</h1>
            </div>

    <div class="row clearfix">
            <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                            </h2>
                        </div>
                        <div class="body">
                        <?php foreach($this->data['Account_data']->result_array() as $data): ?>
                        <form action="<?php echo base_url(); ?>index.php/Account/AccountUpdate_Process" method="post">
                        <input type="hidden" name="userid"  value="<?php echo $data['Account_ID']; ?>">
                        <div class="row clearfix">
                                 <div class="col-sm-5">
                                     <h4>
                                        <span class="label label-success label-lg">First Name :    </span> 
                                        <input type="text" name="fname"  class="form-control" value="<?php echo $data['FirstName']; ?>">
                                   </h4>
                                 </div>
                                 <div class="col-sm-5">
                                     <h4>
                                        <span class="label label-success label-lg">Middle Name :    </span> 
                                        <input type="text" name="mname"  class="form-control" value="<?php echo $data['MiddleName']; ?>">
                                   </h4>
                                 </div>
                                 <div class="col-sm-5">
                                     <h4>
                                        <span class="label label-success label-lg">Last Name :    </span> 
                                        <input type="text" name="lname"  class="form-control" value="<?php echo $data['LastName']; ?>">
                                   </h4>
                                 </div>
                            </div>
                                
                                <div class="row clearfix">
                                   <div class="col-sm-5">
                                     <h4>
                                        <span class="label label-success">Username :</span> 
                                        <input type="text" name="uname"  class="form-control" value="<?php echo $data['Username']; ?>">
                                   </h4>
                                  </div>
                              
                                  <div class="col-sm-5">
                                     <h4>
                                        <span class="label label-success label-lg">Email:</span> 
                                        <input type="text" name="email"  class="form-control" value="<?php echo $data['Email']; ?>">
                                   </h4>
                                  </div>

                                </div>

                                <div class="row clearfix">

                                   <div class="demo-switch" style="display:none">
                                        <div class="switch">
                                            <label><label><input type="checkbox" checked><span class="lever switch-col-green"></span></label>Automatically generate a password.</label>
                                        </div>
                                   </div>

                                   <div class="col-sm-5">
                                     <h4>
                                        <span class="label label-success">Password :</span> 
                                        <input type="text" name="pword"  class="form-control">
                                   </h4>
                                  </div>
                                  <div class="col-sm-5">
                                     <h4>
                                        <span class="label label-success">Confirm Password :</span> 
                                        <input type="text" name="cpass"  class="form-control">
                                   </h4>
                                  </div>

                               </div>

                                <div class="row clearfix">
                                <div class="col-sm-6" style="display:none">
                                    <h4>
                                        <span class="label label-success label-lg">Active</span> 
                                    </h4>
                                    <div class="demo-switch">
                                             <div class="switch">
                                                 <label>Active<label><input type="checkbox" checked><span class="lever switch-col-green"></span></label>Deactive</label>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                                <br> <br>
                               
                                <div class="text-center">
                                 <button class="btn btn-lg btn-info" name="registerbutton">Update</button>
                                </div>
                                </form>
                                <?php endForeach; ?>
                                </div>

                    </div>    
            </div>
    </div>

          
        </div>
    </section>