<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <br>
            <a href="">Learning Management System</a>
          <br>
        </div>
        <div class="card">
            <div class="body">
                
                    <div class="msg"><span class="mssg">Create Account</span></div>
                
                    <div class="row">
                        <div class="col-lg-12">
                        <button class="btn btn-block bg-blue btn-lg waves-effect">I`m a Parents</button> 
                          <button class="btn btn-block bg-red btn-lg waves-effect">I`m a Students</button> 
                          <button class="btn btn-block bg-orange btn-lg  waves-effect">I`m a Teacher</button> 
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                          
                        </div>

                        <div class="col-xs-6 align-right">
                        <button href="#"   class="btn btn-info btn-lg" data-toggle="modal" data-target="#LoginModal">Login</button>     
                        </div>
                    </div>
                
            </div>
        </div>
    </div>

<!--- MODAL FOR STUDENT LOGIN -->
<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
            <br><br><br>
                <div class="row">
                    <div class="col-lg-6">
                        <form id="sign_in" method="POST" action="<?php echo base_url(); ?>index.php/Login">
                                <div class="text-center">
                                    <div class="msg"><span class="mssg">Log In to LMS</span></div>
                                </div>
                                <br><br>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">person</i>
                                    </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" aria-required="true">
                                </div>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">
                                            lock
                                        </i>
                                    </span>
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required="" aria-required="true">
                                    </div>
                                    <br>
                                    <h4><?php echo $this->session->flashdata('LoginMessage'); ?></h4>
                                </div>
                                <div class="row">
                                    <div class="col-xs-8 p-t-5">
                                        <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                                        <label for="rememberme">Remember Me</label>
                                    </div>
                                    <div class="col-xs-4">
                                        <button class="btn btn-block bg-cyan waves-effect" type="submit">SIGN IN</button>
                                    </div>
                                </div>
                                <div class="row m-t-15 m-b--20">
                                    
                                    <div class="col-xs-6 align-right">
                                        <a href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                </div>
                        </form>
                        
                        </div>
                    
                    <div class="col-lg-6">
                    </div>  
                </div>

            
            </div>
            <br><br><br>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>
<!-- MODAL FOR STUDENT LOGIN -->


