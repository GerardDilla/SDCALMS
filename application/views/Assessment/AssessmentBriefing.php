<?php 
foreach($this->data['ExamBrief']->result_array() as $row){
    $title = $row['AssessmentName'];
    $desc = $row['Description'];
    $timelimit = $row['Timelimit'];
    $instructor = $row['FirstName'].' '.$row['LastName'];
    $code = $row['AssessmentCode'];
    $time = $row['Timelimit'];
} 
?>


<div style="width:100%; height:100vh; background: linear-gradient(to bottom right, #00b165 40%, #ffffff 100%); position:fixed; top:0px; left:0px"></div>

<body class="login-page" style="max-width: 1200px;">
    <div class="login-box">
        <div class="card">
            <div class="body">
                    <?php if($this->data['ExamBrief']->num_rows() > 0): ?>
                    <div class="row">
                        <div class="col-lg-9">
                            
                            <!-- TITLE AND DESCRIPTION -->
                            <div class="msg" style="text-align:left">
                            <hr>
                            <span class="mssg"><?php echo $title; ?></span></div>
                            <hr>
                            <!-- /TITLE AND DESCRIPTION -->
                            <!-- QUESTIONS -->
                            <div class="body">
                            <p><?php echo $desc; ?></p>
                            </div>
                            <br><br><br><br>
                            <form action="<?php echo base_url(); ?>index.php/Assessment/AssessmentSetup" method="post">
                                <input type="hidden" name="A_code" value="<?php echo $code; ?>">
                                <input type="hidden" name="time" value="<?php echo $time; ?>">
                                <button type="submit" name="start" class="btn btn-info btn-lg" style="width:100%" data-toggle="modal" data-target="#LoginModal">START EXAM</button>
                            </form>
                            <!-- /QUESTIONS -->

                        </div>
                        <div class="col-lg-3" >
                        <div style="width:250px">
                            <hr><?php echo 'Current PHP version: ' . PHP_VERSION; ?>
                            <h3>Timelimit: <input class="countdown" type="text" value="<?php echo $timelimit; ?>" disabled><div class=""></div></h3>
                            <h3>Questions: <input type="text" value="100" disabled></h3>
                            <hr>
                            <h5>Assigned By: <u><?php echo $instructor; ?></u></h5>
                            <h5>Total Points: <u>100</u></h5>
                        </div>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                        
                        </div>

                        <div class="col-xs-6 align-right">
     
                        </div>
                    </div>
                    <?php endIf; ?>
                
            </div>
        </div>
    </div>
</div>


