<?php echo base_url().'uploads' ?>
 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1></h1>
            </div>

    <div class="row clearfix">
            <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                        <?php echo $error; ?> 
                        </div>
                        <div class="body">
                 <form action="<?php echo base_url(); ?>index.php/Admin/do_upload" method="post" enctype="multipart/form-data">
                 <div class="row">
                     <div class="col-md-3">
                        <input   type="file" name="userFile"/>
                     </div>
                    <div class="col-md-9">
                       <input class="btn btn-success" type="submit"/>
                       </div>
                    </div>
                    </form>    
                                           
                        <div class="body table-responsive" style="overflow-y: auto; height: 400px;">
                            <table class="table table-condensed">
                                <thead>
                                    <tr class="success">
                                     <th class="text-center">#</th>
                                     <th class="text-center">File Name</th>
                                     <th class="text-center">Date Upload</th>
                                     <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                         <?php 
                            $count = 1;
                            foreach($this->$data['file_upload']->result_array()  as $row)  {  
                         ?>
                                 <tr>
                                 <td><?php echo $count ?></td>
                                 <td class="text-center"><?php echo $row['file_name'] ?></td>
                                 <td class="text-center"><?php echo $row['Date_upload'] ?></td>
                                 <td class="text-center">
                          <form action="<?php echo base_url(); ?>uploads/<?php echo $row['file_name'] ?>" method="post">
                                 <button class="btn btn-primary">View</button>
                          </form>
                         <form action="<?php echo base_url(); ?>index.php/Admin/DeleteUploadFile" method="post">
                             <input type="hidden" name="Upload_id" value="<?php echo $row['id'] ?>">
                                 <button class="btn btn-danger">Remove</button>
                         </form>

                                 </td>


                                 </tr>
                          <?php $count = $count + 1;  } ?>
                                               
                                </tbody>
                            </table>
                        </div>
                        </div>
        
                   </div>
            </div>
    </div>

          
        </div>
    </section>