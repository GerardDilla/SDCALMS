    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
            </div>
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <?php foreach($this->data['Course_Page']->result_array() as $row): ?>
                            <?php $row['CourseName']; ?>
                            <?php endForeach; ?>
                            <h3><?php echo $row['CourseName']; ?></h3>
                            <p>Created By: <?php echo $row['FirstName'].' '.$row['MiddleName'][0].' '.$row['LastName']; ?></p>
                        </div>
                        <div class="body">
                                <div class="card" style="width:100%">
                                    <form action="<?php echo base_url(); ?>index.php/Course/NewPost" method="GET">
                                    <div class="header">
                                        <label>Title</label>
                                        <div class="form-line">
                                            <input type="text" name="Post_Title" class="form-control" placeholder="Post Title">
                                        </div>
                                        <br>
                                        <textarea style="width:100%; height:100px; resize: none;" name="PostDescription" placeholder="Post Something Here..."></textarea>
                          
                                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                            <?php foreach($this->data['Attachments']->result_array() as $icon): ?>
                                            <li role="presentation" class="">
                                                <a href="#<?php echo $icon['IconCode']; ?>" data-toggle="tab"  aria-expanded="false">
                                                    <i class="material-icons"><?php echo $icon['IconCode']; ?></i>
                                                    <?php echo $icon['AttachmentType']; ?>
                                                </a>
                                            </li>
                                            <?php endForeach; ?>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active"></div>
                                            <?php foreach($this->data['Attachments']->result_array() as $cont): ?>
                                            <div role="tabpanel" class="tab-pane fade" id="<?php echo $cont['IconCode']; ?>">
                                            <?php if($cont['AttachmentView'] != NULL): ?>
                                            <?php echo $this->load->view("General/".$cont['AttachmentView']); ?>
                                            <?php endIf; ?>
                                            </div>
                                            <?php endForeach; ?>
                                        </div>
                                    </div>
                                    <div class="body">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                    </form>
                                </div>



                                
                            <?php if($this->data['Course_Page']->num_rows()): ?>
                            <?php foreach($this->data['Course_Page']->result_array() as $row): ?>
                                <div class="card" id="post_no_<?php echo $row['CoursePost_ID']; ?>" style="width:100%">
                                    <div class="header">
                                        <div class="row clearfix">
                                            <div class="col-xs-12 col-sm-1">
                                                <span class="image">
                                                    <img src="http://[::1]/sdcalms/images/user.png" width="48" height="48" alt="User">
                                                </span>
                                            </div>
                                            <div class="col-xs-12 col-sm-5">
                                                <h2><?php echo $row['Title']; ?></h2>
                                                <p>
                                                <?php echo $row['FirstName'].' '.$row['MiddleName'][0].' '.$row['LastName']; ?><br>
                                                <?php  
                                                
                                                $date = date_create($row['DateCreated']);
                                                
                                                echo date_format($date,"Y/m/d");
                                                
                                                ?>
                                                </p>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 align-right">
                                                <div class="switch panel-switch-btn">
                                                <button type="button" value="<?php echo $row['CoursePost_ID']; ?>" onclick="ViewComment(this.value)" class="btn bg-light-green waves-effect" data-toggle="modal" data-target="#CommentModal">
                                                    <i class="material-icons">chat</i>
                                                    <span>Comments</span>
                                                </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="body">
                                    <p><?php echo $row['Description']; ?></p>
                                    </div>
                                </div>
                            <?php endForeach; ?>
                            <?php endIf; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade" id="CommentModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" id="CommentRefresh" class="btn btn-default waves-effect" value=" " onclick="ViewComment(this.value);">
                    <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="timer">
                        <i class="material-icons">loop</i>
                    </a>
                    </button>
                    <br><br>
                </div>
                <div class="modal-body" id="CommentBody" style="overflow:auto; max-height:400px; background:#ccc">

                <!-- CONTENTS HERE ARE PRODUCES VIA AJAX -->

                </div>
                <div class="modal-footer">
                    <form id="CommentForm" action="<?php echo base_url(); ?>index.php/Course/NewComment" method="post">
                    <textarea style="width:100%; height:100px; resize: none;" name="CommentContent" id="CommentContent" placeholder=" Place A Comment Here..."></textarea>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#CommentModal">Close</button>
                    <button class="btn btn-success" name="CommentPostID" id="CommentPostID" type="submit">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>