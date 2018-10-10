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
                            <form action="<?php echo base_url(); ?>index.php/Account/AccountList" method="post"> 
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="SearchAccount" placeholder="Search..">
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-info btn-lg" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                        <form action="<?php echo base_url(); ?>index.php/Account/AccountList_Directory">    
                        <button class="btn btn-success btn-lg">Add Account</button>
                        </form>
                        <div class="body table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr class="success">
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Usertype</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($this->data['Account_List']->result_array() as $row): ?>
                                <form action="<?php echo base_url(); ?>index.php/Account/AccountList_Directory" method="post">  
                                    <input type="hidden" name="UserID" value="<?php echo $row['Account_ID']; ?>">
                                    <tr class="">
                                        <td>
                                            <?php echo $row['FirstName']; ?>
                                            <?php echo $row['MiddleName'][0]; ?>
                                            <?php echo $row['LastName']; ?>
                                        </td>
                                        <td><?php echo $row['Email']; ?></td>
                                        <td><?php echo $row['Account_Type']; ?></td>
                                        <td>
                                            <?php if($row['Active'] == 1): ?>
                                                <span class="label bg-blue">Active</span>
                                            <?php else: ?>
                                                <span class="label bg-red">Inactive</span>
                                            <?php endIf; ?>
                                        </td>
                                        <td>
                                        <button class="btn inline btn-info waves-effect" type="submit" name="Edit" >Edit</button>
                                        <?php if($row['Active'] == 1): ?>
                                            <button class="btn inline btn-danger waves-effect" type="submit" name="Activate" >Deactivate</button>
                                        <?php else: ?>
                                            <button class="btn inline btn-success waves-effect" type="submit" name="Deactivate" >Activate</button>
                                        <?php endIf; ?>
                                        </td>
                                    </tr>
                                </form>
                                <?php Endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>