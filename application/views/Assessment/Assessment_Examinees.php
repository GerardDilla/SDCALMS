<?php 
    foreach($this->data['ExamineeList']->result_array() as $row){

    $title = $row['AssessmentName'];

    }  
?>
 <section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h1>Examinees</h1>
        </div>

    <div class="row clearfix">
        <div class="col-lg-12">
                <div class="card">
                    
                    
                    <div class="header">
                        <a href="<?php echo base_url(); ?>index.php/Assessment/AssessmentList" class="material-icons pull-right">backspace</a>
                        <!-- TITLE AND DESCRIPTION -->
                        <div class="msg" style="text-align:left"><span class="mssg"><?php echo $title; ?></span></div><hr>
                        <label>Search: </label>
                        <input type="text" name="" placeholder="Search...">
                        <p></p>
                        <hr>
                    </div>
                    <!-- QUESTIONS -->
                    <div class="body">
                        <table class="table table-striped dashboard-task-info">
                            <thead>
                                <tr>
                                    <th>#</td>
                                    <th>Name</td>
                                    <th>Email</td>
                                    <th>Performance</td>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php $count = ''; ?>
                                <?php foreach($this->data['ExamineeList']->result_array() as $row): ?>
                                <form action="<?php echo base_url(); ?>index.php/Assessment/AssessmentPerformance" method="post">
                                <?php $count++; ?>
                                <input type="hidden" name="assessmentcode" value="<?php echo $row['AssessmentCode']; ?>">
                                <input type="hidden" name="uid" value="<?php echo $row['AccountID']; ?>">
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $row['FirstName']; ?> <?php echo $row['LastName']; ?></td>
                                    <td><?php echo $row['Email']; ?></td>
                                    <td><button class="btn btn-info">View Performance</button></td>
                                </tr>
                                </form>
                                <?php endForeach; ?>
                                
                            </tbody>
                        </table>
                    </div>
                    

                </div>
        </div>
    </div>

          
        </div>
    </section>