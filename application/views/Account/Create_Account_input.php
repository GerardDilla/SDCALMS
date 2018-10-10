 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>Create Account</h1>
            </div>

    <div class="row clearfix">
            <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                            </h2>
                        </div>
                        <div class="body">
                        <form action="<?php echo base_url(); ?>index.php/Account/Registration" method="post">
                        
                        <div class="row clearfix">
                                 <div class="col-sm-5">
                                     <h4>
                                        <span class="label label-success label-lg">First Name :    </span> 
                                        <input type="text" name="fname" required  class="form-control">
                                   </h4>
                                 </div>

                                 <div class="col-sm-5">
                                     <h4>
                                        <span class="label label-success label-lg">Middle Name :    </span> 
                                        <input type="text" name="mname" required  class="form-control">
                                   </h4>
                                 </div>

                                 <div class="col-sm-5">
                                     <h4>
                                        <span class="label label-success label-lg">Last Name :    </span> 
                                        <input type="text" name="lname" required  class="form-control">
                                   </h4>
                                 </div>
                            </div>
                                
                                <div class="row clearfix">
                                   <div class="col-sm-5">
                                     <h4>
                                        <span class="label label-success">Username :</span> 
                                        <input type="text" name="uname" required  class="form-control">
                                   </h4>
                                  </div>
                              
                                  <div class="col-sm-5">
                                     <h4>
                                        <span class="label label-success label-lg">Email:</span> 
                                        <input type="text" name="email" required  class="form-control">
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
                                        <input type="password" name="pword" required  class="form-control">
                                   </h4>
                                  </div>
                                  <div class="col-sm-5">
                                     <h4>
                                        <span class="label label-success">Confirm Password :</span> 
                                        <input type="password" name="cpass" required  class="form-control">
                                   </h4>
                                  </div>
                               </div>

                                <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h4>
                                    <span class="label label-success">Usertype :</span> 
                                            <select class="form-control show-tick" name="Atype">
                                            <option value="" disabled>-- Please select --</option>
                                            <?php foreach($this->data['Account_Types']->result_array() as $row): ?>
                                                <?php if($data['AccountType_ID'] == $row['Type_ID']): ?>
                                                <option value="<?php echo $row['Type_ID']; ?>" selected="selected"><?php echo $row['Account_Type']; ?></option>
                                                <?php else: ?>
                                                <option value="<?php echo $row['Type_ID']; ?>"><?php echo $row['Account_Type']; ?></option>
                                                <?php endIf; ?>
                                            <?php endForeach; ?>
                                            </select>
                                    </h4>
                                </div>
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
                                 <button class="btn btn-lg btn-info" name="registerbutton">Register</button>
                                 <button class="btn btn-lg btn-info">Cancel</button>
                               </div>
                        </form>
                        </div>

                    </div>    
            </div>
    </div>

          
        </div>
    </section>