 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>Manage Account</h1>
            </div>

    <div class="row clearfix">
            <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                           
                            </h2>
                        </div>
                        <div class="body">
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="data" placeholder="Search..">
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-info btn-lg" name="submit" type="submit">Search</button>
                            </div>
                        </div>
                        <form action="<?php echo base_url(); ?>index.php/Admin/Create_Account_Input">    
                         <button class="btn btn-success btn-lg">Add Account</button>
                        </form>
                        <div class="body table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr class="success">
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Usertype</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <td>1</td>
                                        <td>onealvall123@gmail.com</td>
                                        <td>Oneal A. Vallecera</td>
                                        <td>onealvall123@gmail.com</td>
                                        <td>Admin</td>
                                        <td>Active</td>
                                        <td>
                                        <button class="btn inline btn-info waves-effect">Edit</button>
                                        <button class="btn inline btn-danger waves-effect">Delete</button>
                                        </td>
                                    </tr>
                                    <tr class="">
                                       <td>2</td>
                                        <td>megumi@gmail.com</td>
                                        <td>Mariana Sariana</td>
                                        <td>onealvall123@gmail.com</td>
                                        <td>Teacher</td>
                                        <td>Active</td>
                                        <td>
                                        <button class="btn inline btn-info waves-effect">Edit</button>
                                        <button class="btn inline btn-danger waves-effect">Delete</button>
                                        </td>
                                    </tr>
                                    <tr class="">
                                      <td>3</td>
                                        <td>rard@gmail.com</td>
                                        <td>Gerard P. Dilla</td>
                                        <td>onealvall123@gmail.com</td>
                                        <td>Admin</td>
                                        <td>Deactive</td>
                                        <td>
                                        <button class="btn inline btn-info waves-effect">Edit</button>
                                        <button class="btn inline btn-danger waves-effect">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                   </div>
            </div>
    </div>

          
        </div>
    </section>