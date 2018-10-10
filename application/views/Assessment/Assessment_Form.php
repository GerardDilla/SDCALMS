    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
            </div>
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h3>Create Assessment</h3>
                        </div>
                        <div class="body">
                            <div class="card" style="width:100%">
                                <form action="<?php echo base_url(); ?>index.php/Assessment/AssessmentBuilder" method="post">
                                <div class="header">
                                    <label>Title</label>
                                    <div class="form-line">
                                        <input type="text" name="Assessment_Title" required class="form-control" placeholder="Assessment Title">
                                    </div>
                                    <br>
                                    <textarea style="width:100%; height:100px; resize: none;" required name="Assessment_Description" placeholder="Assessment Description..."></textarea>
                                    <div class="demo-masked-input">
                                        <br>
                                        <br>
                                        <b>Start Date</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="datetime-local" class="form-control date" name="StartDate" placeholder="Ex: 30/07/2016">
                                            </div>
                                        </div><br>
                                        <b>End Date</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="datetime-local" class="form-control date" name="EndDate" placeholder="Ex: 30/07/2016">
                                            </div>
                                        </div><br>
                                        <b>Time Limit (Minutes)</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">alarm_on</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="number" value="01.00" step="0.01" class="form-control date" name="Timelimit" placeholder="Ex: 60">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="body">
                                <button type="submit" class="btn btn-success">Next</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

