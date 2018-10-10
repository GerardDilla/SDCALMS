    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
            </div>
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h3><?php echo $this->input->post('Assessment_Title'); ?></h3>
                        </div>
                        <div class="body">
                            <!-- ADD QUESTION -->
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                <div class="row clearfix">
                                    <div class="col-sm-3">
                                        <h3>Questions: <u id="QuestionCount"></u></h3>
                                    </div>
                                    <div class="col-sm-3">
                                        <h3>Total Points: <u id="TotalPoints"></u></h3>
                                    </div>
                                </div>
                                </div>
                                </hr>
                                <div class="col-sm-12">
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <label>Add A Question</label>
                                        <select class="form-control show-tick" id="QuestionType">
                                            <option value="">-- Select Question Type --</option>
                                            <option value="1">Multiple Choice</option>
                                            <option value="2">True or False</option>
                                            <option value="3">Identification</option>
                                            <option value="4">Essay</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Question Points</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">assignment_turned_in</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="number" id="SetPoint" class="form-control" placeholder="0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <label>CILO</label>
                                        <div class="input-group">
                                            <select name="cilo" onchange="CILO_Select(this)">
                                            <option value="0" selected="selected">Choose CILO</option>
                                            <?php foreach($this->data['CILO_List']->result_array() as $row): ?>
                                            <option id="<?php echo $row['CILO']; ?>" value="<?php echo $row['CILO_ID']; ?>"><?php echo $row['CILO']; ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-2">
                                        <button class="btn btn-default btn-block btn-lg" onclick="AddQuestion()">
                                        Add Question
                                        </button>
                                    </div>
                                    <div class="col-sm-2">
                                        <button class="btn btn-success btn-block btn-lg" onclick="AssessmentSubmit()">
                                        Submit Form
                                        </button>   
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- /ADD QUESTION -->
                            
                            <form action="<?php echo base_url(); ?>index.php/Assessment/AssessmentSave" method="post" id="QuestionStructure">
                            <!-- QUESTION TABLE-->
                            <div class="container" style="overflow-x:auto; max-width:100%">
                            <table class="table table-striped dashboard-task-info" >
                                <tbody id="QuestionPanel">
                                <div class="input-group">
                                
               
                                                               
                                </div>
                                </tbody>
                            </table>
                            </div>
                            <!-- //QUESTION TABLE-->
                            </form> 



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

