 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>Curriculum List</h1>
            </div>

    <div class="row clearfix">
            <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                        <div class="back-button">
                                  <a href="<?php echo base_url(); ?>index.php/Admin/CurriculumList" class="material-icons pull-right">backspace</a>
                              </div>
                        </div>
                        <div class="body">
                       
                                           
                        <div class="body table-responsive" style="overflow-y: auto; height: 500px;">
                            <table class="table table-condensed">
                                <thead>
                                    <tr class="success">
                                     <th>#</th>
                                     <th class="text-center">Course Code</th>
                                     <th class="text-center">Course Title</th>
                                     <th class="text-center">Course Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php 
                            $count = 1;
                            foreach($this->$data['curriculum_course_list']->result_array()  as $row)  {  
                            ?>
                                 <tr>
                                   <td><?php echo $count ?></td>
                                   <td class="text-center"><?php echo $row['Course_Code'] ?></td>
                                   <td class="text-center"><?php echo $row['Course_Title'] ?></td>
                                   <td class="text-center"><?php echo $row['Curriculum_Semester'] ?></td>

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