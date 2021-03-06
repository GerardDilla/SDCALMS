    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
            </div>
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h3>CILO</h3>
                        </div>
                        <div class="body">

                            <div class="card" style="width:100%">
                                <div class="header">
                                   <h4><span class="label bg-green"><?php echo $this->session->flashdata('message'); ?></span></h4>
                                   <?php $this->session->set_flashdata('message',''); ?>
                                   <a href="<?php echo base_url(); ?>index.php/Education/CILOForm" target="_blank"><button class="btn btn-success">ADD CILO</button></a>
                                </div>
                                <div class="body">
                                <?php if($this->data['CILO_List']->num_rows() > 0): ?>
                                <table class="table table-hover dashboard-task-info" >
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        <?php foreach($this->data['CILO_List']->result_array() as $row): ?>
                                        <form action="<?php echo base_url(); ?>index.php/Education/CILOUpdateForm" method="post">
                                        <input type="hidden" name="cilo_id" value="<?php echo $row['CILO_ID']; ?>">
                                        <tr>
                                            <td><?php echo $row['CILO']; ?></td>

                                            <td><?php echo $row['Description']; ?></td>
                                        
                                            <td><button class="btn btn-success" >Edit</button></td>
                                        </tr>
                                        </form>
                                        <?php endForeach; ?>

                                </tbody>
                                </table>
                                <?php else: ?>

                                    <h3>No Data</h3>

                                <?php endIf; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

