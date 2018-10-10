    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
            </div>
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h3>Assessments</h3>
                        </div>
                        <div class="body">
                        
                        <?php if($this->data['Assessment_List']->num_rows() != 0): ?>

                            <div class="card" style="width:100%">
                                <div class="header">
                                   <h4><span class="label bg-green"><?php echo $this->session->flashdata('message'); ?></span></h4>
                                   <?php $this->session->set_flashdata('message',''); ?>
                                </div>
                                <div class="body">
                                <table class="table table-hover dashboard-task-info" >
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Assessment Code</th>
                                        <th>Date Created</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($this->data['Assessment_List']->num_rows() != 0): ?>
                                    <?php foreach($this->data['Assessment_List']->result_array() as $row): ?>
                                    <form action="<?php echo base_url(); ?>index.php/Assessment/AssessmentDirectory" method="post">
                                    <input type="hidden" name="assessment_code" value="<?php echo $row['AssessmentCode']; ?>">
                                    <tr>
                                        <td>
                                            <?php echo $row['AssessmentName']; ?>
                                        </td>
                                        <td>
                                        <span class="label bg-green">
                                            <?php echo $row['AssessmentCode']; ?>
                                        </span>
                                        </td>
                                        <td>
                                            <?php echo $row['DateCreated']; ?>
                                        </td>
                                        <td><button class="btn btn-success" name="exam" >Take Exam</button></td>
                                        <td><button class="btn btn-default" name="result" >Results</button></td>
                                        <td><button class="btn btn-info" name="viewassessment">View Assessment</button></td>
                                    </tr>
                                    </form>
                                    <?php endForeach; ?>
                                    <?php endIf; ?>
                                    </div>
                                </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                        <h4>You have no Assessment yet.</h2>
                        <?php endIf; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

