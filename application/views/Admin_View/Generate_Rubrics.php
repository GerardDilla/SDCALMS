 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>Generate Rubrics</h1>
            </div>

    <div class="row clearfix">
            <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                     
                        <?php if ($this->session->flashdata('message')  != ''): ?>
                        <div class="alert alert-success alert-dismissible" role="alert" >
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                               <?php  echo $this->session->flashdata('message'); ?>
                            </div> 
                      <?php endIf; ?>

                        <?php if (validation_errors()  != ''): ?>
                            <div class="alert alert-danger alert-dismissible" role="alert" >
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <?php echo validation_errors(); ?> 
                            </div> 
                           <?php endIf; ?>
                   
                        </div>
                        <div class="body">
                        

  <?php echo form_open('Admin/Generate_Rubrics',array('id'=>'Create_Rubrics_form','method'=>'post')); ?>   
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="rubrics_title" placeholder="Title Rubrics">
                            </div>
                            <div class="col-md-6">
                            <button type="submit" class="btn btn-lg btn-success" style="margin-top: 6px;"> Add Rubrics </button>
                            </div>
                        </div>
</form                  
                      
                        <div class="body table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr class="success">
                                        <th>#</th>
                                        <th>Rubrics title</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                   <?php 
                                    $count = 1;
                                    foreach ($this->$data['rubrics'] as $row) {
                                     ?>
                                        
                                    <tr class="">
                                        <td><?php echo $count; ?></td>
                                        <td> <?php echo $row->rubrics;?></td>



                                        <td  class="text-center" style="display: inline-block;">
                                       <div class="row">
                                           <div class="col-md-3">
                                              <form method="post" action="<?php echo site_url(); ?>/Admin/ViewRubrics">
                                                  <input type="hidden"  name="rubrics_id" value="<?php echo $row->rubrics_id;?>">
                                                  <button type="submit" data-toggle="tooltip" data-placement="top" title="View Rubrics" class="btn btn-sm btn-primary"><i class="material-icons">view_compact</i></button>
                                              </form>
                                           </div>
                                           <div class="col-md-3">
                                             <form method="post" action="<?php echo site_url(); ?>/Admin/add_criteria">
                                               <input type="hidden"  name="rubrics_id" value="<?php echo $row->rubrics_id;?>">
                                              <button type="submit" data-toggle="tooltip" data-placement="top" title="Add Criteria" class="btn btn-sm btn-success"><i class="material-icons">note_add</i></button>
                                             </form> 
                                           </div>
                                           <div class="col-md-3">
                                              <form method="post" action="<?php echo site_url(); ?>/Admin/Rubrics_Escale">
                                               <input type="hidden"  name="rubrics_id" value="<?php echo $row->rubrics_id;?>">
                                               <button type="submit" class="btn btn-sm btn-success"><i class="material-icons">edit</i></button>
                                              </form> 
                                           </div>
                                           <div class="col-md-3">
                                         <form method="post" action="<?php echo site_url(); ?>/Admin/DeleteRubrics">
                                              <input type="hidden"  name="rubrics_id" value="<?php echo $row->rubrics_id;?>">
                                              <button type="submit" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-sm btn-danger" onclick="return confirm('Do you want to Delete this Rubric?');"><i class="material-icons">delete_forever</i></button>
                                            </form>
                                           </div>
                                        </div>
                                        

                                        </td>




                                    </tr>
                                     <?php  $count = $count + 1;  } ?>
                               
                                </tbody>
                            </table>
                            </form>
                        </div>
                        </div>
                   </div>
            </div>
    </div>

          
        </div>
    </section>