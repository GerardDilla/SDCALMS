 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>Course List</h1>
            </div>

    <div class="row clearfix">
            <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                             </div>
                        <div class="body">
                        <form action="<?php echo base_url(); ?>index.php/Admin/ReportCourse" method="post">
                        <div class="row">
                     <div class="col-md-8">
                        <label  class="text-red" for="ES">Search by Date Created:</label>
                                <label   style="padding-left: 20px;" class="text-red" for="ES">From:</label>
                                        <input  type="date" id="today" name="from">  
                                <label class="text-red" for="ES">To:</label>    
                                       <input type="date" id="today1" name="to">  
                                    <br>
                       </div>
                       <div class="col-md-4">
                       <button class="btn btn-lg btn-success" name="search_button" type="submit"><i class="material-icons">search</i> Search </button>
                        <button class="btn btn-lg btn-danger" name="print" type="submit"><i class="material-icons">print</i> Print</button>
                       </div>
                    </div>
                    
                
                        <div class="body table-responsive" style="overflow-y: auto; height: 400px;">
                            <table class="table table-condensed" style="width: 1200px;" >
                                <thead>
                                    <tr class="success">
                                    <th class="text-center">#</th>
                                    <th class="text-center">Course Name</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Person</th>
                                    <th class="text-center">Date Created</th>
                                    </tr>
                                </thead>
                                <tbody>

                                        <?php 
                            $count = 1;
                            foreach($this->$data['course_list']->result_array()  as $row)  {  
                            ?>
                                 <tr>
                                   <td class="text-center"><?php echo $count ?></td>
                                   <td class="text-center"><?php echo $row['CourseName']  ?></td>
                                   <td class="text-center" style=" overflow-x: auto; width: 500px;"><?php echo $row['Description']  ?></td>
                                   <td class="text-center"><?php echo $row['LastName'] ?>,&nbsp;<?php echo $row['FirstName'] ?>&nbsp;&nbsp;<?php echo $row['MiddleName'] ?></td> 
                                   <td class="text-center"><?php echo $row['DateCreated']  ?></td>               
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