 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>Assessment Layout</h1>
            </div>

    <div class="row clearfix">
            <div class="col-lg-12">
                    <div class="card">
                        <?php if($this->data['AssessmentLayout']->num_rows() > 0): ?>
                        <?php foreach($this->data['AssessmentLayout']->result_array() as $row): ?>
                            <?php $title = $row['AssessmentName']; ?>
                            <?php $description = $row['Description']; ?>
                            <?php $timelimit = $row['Timelimit']; ?>
                            <?php $start = $row['StartDate']; ?>
                            <?php $end = $row['EndDate']; ?>
                            <?php
                            $sdate= date_create($start);
                            $edate= date_create($end);
                            
                            ?>
                        <?php endForeach; ?>
                        <div class="header">
                            <a href="<?php echo base_url(); ?>index.php/Assessment/AssessmentList" class="material-icons pull-right">backspace</a>
                            <!-- TITLE AND DESCRIPTION -->
                            <div class="msg" style="text-align:left"><span class="mssg"><?php echo $title; ?></span></div><hr>
                            <label>Description: </label>
                            <p><?php echo $description; ?></p>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Time Limit: <u><?php echo $timelimit; ?> Minutes</u></label>
                                    <br>
                                    <!--
                                    <label>Start Time: <u><?php echo date_format($sdate,"F d,Y g:i:A"); ?></u></label>
                                    <br>
                                    <label>End Time: <u><?php echo date_format($edate,"F d,Y g:i:A"); ?></u></label>
                                    -->
                                </div>
                            </div>
                        </div>
                        <!-- QUESTIONS -->
                        <div class="body">
                            <table class="table table-striped dashboard-task-info" >
                                <tbody>
                                <?php $count = 0; ?>
                                <?php foreach($this->data['AssessmentLayout']->result_array() as $row): ?>
                                <?php $count++; ?>
                                    <tr>
                                    <td>
                                    <h3>#<?php echo $count; ?></h3><bR>
                                    <h4>CILO: <U><?php echo $row['CILO']; ?></U></h4>
                                    </td>
                                    <td>
                                        <div class="list-group" style="color:#000">
                                            <small style="float:right"><u><?php echo $row['QuestionType']; ?></u></small><br>
                                            <label>Question: </label>
                                            <p>
                                            <?php echo $row['Question']; ?>
                                            </p>
                                            <?php if($row['QuestionTypeID'] == 1): ?>
                                                <?php 
                                                $Aclass = "";
                                                $Afont = "";
                                                $Bclass = "";
                                                $Bfont = "";
                                                $Cclass = "";
                                                $Cfont = "";
                                                $Dclass = "";
                                                $Dfont = "";
                                                if($row['Answer'] == $row['Choice_A']){
                                                    $Aclass = "list-group-item-info";
                                                    $Afont = "color:#000";
                                                }
                                                else if($row['Answer'] == $row['Choice_B']){
                                                    $Bclass = "list-group-item-info";
                                                    $Bfont = "color:#000";
                                                }
                                                else if($row['Answer'] == $row['Choice_C']){
                                                    $Cclass = "list-group-item-info";
                                                    $Cfont = "color:#000";
                                                }
                                                else if($row['Answer'] == $row['Choice_D']){
                                                    $Dclass = "list-group-item-info";
                                                    $Dfont = "color:#000";
                                                }
                                                ?>
                                                <a href="javascript:void(0);" class="list-group-item <?php echo $Aclass; ?>" style="<?php echo $Afont; ?>">
                                                    <label>A).</label> <?php echo $row['Choice_A']; ?>
                                                </a>
                                                <a href="javascript:void(0);" class="list-group-item <?php echo $Bclass; ?>" style="<?php echo $Bfont; ?>">
                                                    <label>B).</label> <?php echo $row['Choice_B']; ?>
                                                </a>
                                                <a href="javascript:void(0);" class="list-group-item <?php echo $Cclass; ?>" style="<?php echo $Cfont; ?>">
                                                    <label>C).</label> <?php echo $row['Choice_C']; ?>
                                                </a>
                                                <a href="javascript:void(0);" class="list-group-item <?php echo $Dclass; ?>" style="<?php echo $Dfont; ?>">
                                                    <label>D).</label> <?php echo $row['Choice_D']; ?>
                                                </a>
                                            <?php else: ?>
    
                                                   <br><label>Answer: <u> <?php echo $row['Answer']; ?></u></label><br>

                                            <?php endIf; ?>

                                        </div>
                                    </td>
                                    </tr>  
                                    <!--
                                    <tr>
                                    <td><h3>#2</h3></td>
                                    <td>
                                        <div class="demo-radio-button" style="color:#000">
                                            <small style="float:right"><u>True or False</u></small><br>
                                            <label>Question: </label>
                                            <p>
                                            Morbi leo risus Dapibus ac facilisis in Morbi leo risus Dapibus ac facilisis in
                                            Morbi leo risus Dapibus ac facilisis in Morbi leo risus Dapibus ac facilisis in
                                            Morbi leo risus Dapibus ac facilisis in Morbi leo risus Dapibus ac facilisis in.
                                            </p>
                                            
                                            <br>
                                            <label>Answer: <u>TRUE</u></label>
                                            <br>
                                            
                                            <input name="group5" type="radio" id="radio_35" class="with-gap radio-col-blue" disabled checked />
                                            <label for="radio_35">TRUE</label>

                                            <input name="group5" type="radio" id="radio_30" class="with-gap radio-col-red" disabled />
                                            <label for="radio_30">FALSE</label>
                                        </div>
                                    </td>
                                    </tr> 

                                    <tr>
                                    <td><h3>#3</h3></td>
                                    <td>
                                        <div class="list-group" style="color:#000">
                                            <small style="float:right"><u>Multiple Choice</u></small><br>
                                            <label>Question: </label>
                                            <p>
                                            Morbi leo risus Dapibus ac facilisis in Morbi leo risus Dapibus ac facilisis in
                                            Morbi leo risus Dapibus ac facilisis in Morbi leo risus Dapibus ac facilisis in
                                            Morbi leo risus Dapibus ac facilisis in Morbi leo risus Dapibus ac facilisis in.
                                            </p>
                                        
                                            <a href="javascript:void(0);" class="list-group-item" style="color:#000">
                                                <label>A).</label> Dapibus ac facilisis in
                                            </a>
                                            <a href="javascript:void(0);" class="list-group-item" style="color:#000">
                                                <label>B).</label> Morbi leo risus
                                            </a>
                                            <a href="javascript:void(0);" class="list-group-item" style="color:#000">
                                                <label>C).</label> Morbi leo risus
                                            </a>
                                            <a href="javascript:void(0);" class="list-group-item list-group-item-info" style="color:#000">
                                                <label>D).</label> Morbi leo risus
                                            </a>
                                        </div>
                                    </td>
                                    </tr> 

                                    <tr>
                                    <td><h3>#4</h3></td>
                                    <td>
                                        <div class="list-group" style="color:#000">
                                            <small style="float:right"><u>Identification</u></small><br>
                                            <label>Question: </label>
                                            <p>
                                            Morbi leo risus Dapibus ac facilisis in Morbi leo risus Dapibus ac facilisis in
                                            Morbi leo risus Dapibus ac facilisis in Morbi leo risus Dapibus ac facilisis in
                                            Morbi leo risus Dapibus ac facilisis in Morbi leo risus Dapibus ac facilisis in.
                                            </p>
                                            
                                            <br>
                                            <label>Answer: <u> Dapibus ac facilisis</u></label>
                                            <br>
                                        </div>
                                    </td>
                                    </tr>

                                                                        <tr>
                                    <td><h3>#5</h3></td>
                                    <td>
                                        <div class="list-group" style="color:#000">
                                            <small style="float:right"><u>Essay</u></small><br>
                                            <label>Question: </label>
                                            <p>
                                            Morbi leo risus Dapibus ac facilisis in Morbi leo risus Dapibus ac facilisis in
                                            Morbi leo risus Dapibus ac facilisis in Morbi leo risus Dapibus ac facilisis in
                                            Morbi leo risus Dapibus ac facilisis in Morbi leo risus Dapibus ac facilisis in.
                                            </p>
                                            
                                        </div>
                                    </td>
                                    </tr>
                                    -->
                                </tbody>
                                <?php endForeach; ?>
                            </table>

                        </div>
                        <!-- /QUESTIONS -->
                        <?php else: ?>
                        <h2 class="title">There are no questions</h2>
                        <?php endIf; ?>
                   </div>
            </div>
    </div>

          
        </div>
    </section>