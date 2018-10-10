<?php 
$total_points = '';
foreach($this->data['AssessmentExam']->result_array() as $row){
    $title = $row['AssessmentName'];
    $desc = $row['Description'];
    $instructor = $row['FirstName'].' '.$row['LastName'];
    $total_points = $total_points + $row['Points'];
} 
?>


<div style="width:100%; height:100vh; background: linear-gradient(to bottom right, #00b165 40%, #ffffff 100%); position:fixed; top:0px; left:0px"></div>

<body class="login-page" style="max-width: 1200px;">
    <div class="login-box">
        <div class="card">
            <div class="body">
                    <?php if($this->data['AssessmentExam']->num_rows() > 0): ?>
                    <div class="row">

                        <form action="<?php echo base_url(); ?>index.php/Assessment/AssessmentExamSubmit" method="post">
                        <div class="col-lg-9">
                            
                            <!-- TITLE AND DESCRIPTION -->
                            <div class="msg" style="text-align:left"><span class="mssg"><?php echo $title; ?></span></div><hr>
                            <p><?php echo $desc; ?></p>
                            <hr>
                            <!-- /TITLE AND DESCRIPTION -->
                            <!-- QUESTIONS -->
                            <div class="body">
                                <table class="table table-striped dashboard-task-info" >
                                    <tbody>
                                    <?php $count = 0; ?>
                                    <?php foreach($this->data['AssessmentExam']->result_array() as $row): ?>
                                    <?php $count++; ?>
                                        <tr>
                                        <td><h3>#<?php echo $count; ?></h3></td>
                                        <td>
                                            <small><?php echo $row['QuestionType']; ?> : <?php echo $row['Points']; ?> Points</small>
                                            <div class="list-group" style="color:#000">
                                                <label>Question: </label>
                                                <p>
                                                <?php echo $row['Question']; ?>
                                                </p>   
                                                <input type="hidden" name="QuestionID[]" value="<?php echo $row['QuestionID']; ?>" >
                                                <?php if($row['QuestionTypeID']==1): ?>

                                                    <div class="input-group">
                                                        <div class="form-line">
                                                        <label>A).</label> <?php echo $row['Choice_A']; ?>
                                                        </div><span class="input-group-addon demo-radio-button"><input class="with-gap radio-col-red" id="<?php echo $count; ?>_radio1" name="<?php echo $count; ?>QuestionAnswer[]" type="radio" value="<?php echo $row['Choice_A']; ?>"> <label for="<?php echo $count; ?>_radio1"></label></span>
                                                    </div>
                                                    <div class="input-group">
                                                        <div class="form-line">
                                                        <label>B).</label> <?php echo $row['Choice_B']; ?>
                                                        </div><span class="input-group-addon demo-radio-button"><input class="with-gap radio-col-red" id="<?php echo $count; ?>_radio2" name="<?php echo $count; ?>QuestionAnswer[]" type="radio" value="<?php echo $row['Choice_B']; ?>"> <label for="<?php echo $count; ?>_radio2"></label></span>
                                                    </div>
                                                    <div class="input-group">
                                                        <div class="form-line">
                                                        <label>C).</label> <?php echo $row['Choice_C']; ?>
                                                        </div><span class="input-group-addon demo-radio-button"><input class="with-gap radio-col-red" id="<?php echo $count; ?>_radio3" name="<?php echo $count; ?>QuestionAnswer[]" type="radio" value="<?php echo $row['Choice_C']; ?>"> <label for="<?php echo $count; ?>_radio3"></label></span>
                                                    </div>
                                                    <div class="input-group">
                                                        <div class="form-line">
                                                        <label>D).</label> <?php echo $row['Choice_D']; ?>
                                                        </div><span class="input-group-addon demo-radio-button"><input class="with-gap radio-col-red" id="<?php echo $count; ?>_radio4" name="<?php echo $count; ?>QuestionAnswer[]" type="radio" value="<?php echo $row['Choice_D']; ?>"> <label for="<?php echo $count; ?>_radio4"></label></span>
                                                    </div>
                                                <?php elseif($row['QuestionTypeID']==2): ?>
                                                    <div class="input-group">
                                                        <div class="form-line">
                                                            <label>True</label>
                                                        </div><span class="input-group-addon demo-radio-button"><input class="with-gap radio-col-red" id="<?php echo $count; ?>_radio1" name="<?php echo $count; ?>QuestionAnswer[]" type="radio" value="TRUE"> <label for="<?php echo $count; ?>_radio1"></label></span>
                                                    </div>
                                                    <div class="input-group">
                                                        <div class="form-line">
                                                            <label>False</label>
                                                        </div><span class="input-group-addon demo-radio-button"><input class="with-gap radio-col-red" id="<?php echo $count; ?>_radio2" name="<?php echo $count; ?>QuestionAnswer[]" type="radio" value="FALSE"> <label for="<?php echo $count; ?>_radio2"></label></span>
                                                    </div>
                                                <?php elseif($row['QuestionTypeID']==3): ?>
                                               
                                                    <input type="text" name="<?php echo $count; ?>QuestionAnswer[]" id="email_address" class="form-control" placeholder="Place Answer Here">
                                               
                                                <?php elseif($row['QuestionTypeID']==4): ?>
                                                
                                                    <textarea rows="4" name="<?php echo $count; ?>QuestionAnswer[]" class="form-control no-resize" placeholder="Type Your Answer Here..."></textarea>
                                                
                                                <?php endIf; ?>

                                            </div>
                                        </td>
                                        </tr>  

                                    </tbody>
                                    <?php endForeach; ?>
                                </table>

                            </div>
                            <!-- /QUESTIONS -->

                        </div>
                        <div class="col-lg-3" >
                        <div style="position:fixed; width:250px">
                            <hr>
                            <h3>Time Left: <input class="countdown" type="text" value="<?php echo $this->session->userdata('timelimit'); ?>" disabled><div class=""></div></h3>
                            <h3>Questions: <input type="text" value="<?php echo $this->data['AssessmentExam']->num_rows(); ?>" disabled></h3>
                            <hr>
                            <h5>Assigned By: <u><?php echo $instructor; ?></u></h5>
                            <h5>Total Points: <u><?php echo $total_points; ?></u></h5>

                            <br><hr>
                            <button type="submit" class="btn btn-info btn-lg" style="width:100%" data-toggle="modal" data-target="#LoginModal">Submit Test</button>
                            <hr>
                        </div>
                        </div>
                        </form>

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

<script>
    var timer2 = "<?php echo $this->session->userdata('timelimit_m'); ?>:<?php echo $this->session->userdata('timelimit_s'); ?>";
    var interval = setInterval(function() {
    console.log(timer2); 

    var timer = timer2.split(':');
    //by parsing integer, I avoid all extra string processing
    var minutes = parseInt(timer[0], 10);
    var seconds = parseInt(timer[1], 10);
    seconds = seconds + 0.00;
    --seconds;
    minutes = (seconds < 0) ? --minutes : minutes;
    if (minutes < 0) clearInterval(interval);
    seconds = (seconds < 0) ? 59 : seconds;
    seconds = (seconds < 10) ? '0' + seconds : seconds;
    minutes = (minutes < 10) ?  minutes : minutes;
    if(minutes <= 0 && seconds <= 0 ){
        $('.countdown').val('Times Up!');
        return;
    }else{
        $('.countdown').val(minutes + ':' + seconds);
    }
    
    timer2 = minutes + ':' + seconds;
    /*
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url(); ?>index.php/Assessment/AssessmentTimer',
            async: false,
            data: {'time':timer2},
            success: function(data){
                //console.log(data);
                //console.log(data);  
                if(window.console )
                {    
                    //console.clear();  
                }
            },
            error: function (data) {
                console.log('An error occurred.');
                //console.log(data);
                //$("#feedback_msg").html(data);
            },
        });
    */
    }, 1000);
    
</script>

