 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>Curriculum List</h1>
            </div>

    <div class="row clearfix">
            <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                        
                        </div>
                        <div class="body">
                 <form action="<?php echo base_url(); ?>index.php/Admin/CurriculumList" method="post">
                 <div class="row">
                     <div class="col-md-6">
                        <label class="text-red" for="ES">Search by Curriculum Year:</label>
                               <select   id="ES" class="danger" name="cy" required>
                                    <option disabled selected>Select Curriculum Year</option> 
                               <?php foreach($this->$data['curriculum_year']->result_array()  as $row)  {  ?>
                                    <option><?php echo $row['Curriculum_Year'] ?></option> 
                               <?php }?>    
                                </select>
                                <br>
                                <label class="text-red" for="ES" style="margin-right: 50px;">Search by Program:</label>
                               <select  id="ES" class="danger" name="pro" required>
                               <option disabled selected>Select Programs</option> 
                               <?php foreach($this->$data['program']->result_array()  as $row)  {  ?>
                                    <option value="<?php echo $row['Program_ID'] ?>"><?php echo $row['Program_Code'] ?></option> 
                               <?php }?>    
                                </select>
                       </div>
                       <div class="col-md-6">
                       <button class="btn btn-lg btn-success" name="search_button" type="submit"><i class="material-icons">search</i> Search </button>
                       
                       </div>
                    </div>
                       
                                           
                        <div class="body table-responsive" style="overflow-y: auto; height: 400px;">
                            <table class="table table-condensed">
                                <thead>
                                    <tr class="success">
                                     <th>#</th>
                                     <th class="text-center">Program</th>
                                     <th class="text-center">Curriculum Name</th>
                                     <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php 
                            $count = 1;
                            foreach($this->$data['curriculum_list']->result_array()  as $row)  {  
                            ?>
                                 <tr>
                                   <td><?php echo $count ?></td>
                                   <td class="text-center"><?php echo $row['Program_Code'] ?></td>
                                   <td class="text-center"><?php echo $row['Curriculum_Name'] ?></td>
                                   <form action="<?php echo base_url(); ?>index.php/Admin/CurriculumCourseList" method="post">
                                    <input type="hidden" id="custId" name="curtId" value="<?php echo $row['Curriculum_ID'] ?>">
                                    <td class="text-center"><button class="btn btn-success">Select</button></td>    
                                   </form>       
                                </tr>
                            <?php $count = $count + 1;  } ?>
                                
                                </tbody>
                            </table>
                        </div>
                        </div>
                </form>
                   </div>
            </div>
    </div>

          
        </div>
    </section>