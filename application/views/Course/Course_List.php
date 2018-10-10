    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
            <h3>COURSES</h3>
            </div>
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <!-- ////////////////ENROLL COURSE CARD///////////////////////// -->
                    <div class="card">
                        <div class="header">
                            <h3>Enroll Course</h3>
                            <form action="<?php echo base_url(); ?>index.php/Course/EnrollCourse_process" method="GET">
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="type" name="CourseCode" class="form-control" placeholder="Course Code">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">Join</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- ////////////////ENROLL COURSE CARD///////////////////////// -->
                    
                    <!-- ////////////////HANDLED COURSES CARD///////////////////////// -->
                    <?php if($this->data['Course_List']->num_rows() != 0): ?>
                    <div class="card">
                        <div class="header">
                            <h3>Handled Courses</h3>
                        </div>
                        <div class="body">
                            <div class="container" style="overflow-x:auto; max-width:100%">
                            <table class="table table-hover dashboard-task-info" >
                                <thead>
                                    <tr>
                                        <th>Course</th>
                                        <!--<th>Description</th>-->
                                        <th>Uploaded By</th>
                                        <th>Date Created</th>
                                        <th>Course Code</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($this->data['Course_List']->result_array() as $row): ?>
                                    <form action="<?php echo base_url(); ?>index.php/Course/CourseInfo" method="post">
                                    <tr>
                                    <input type="hidden" name="Post_ID" value="<?php echo $row['Course_ID']; ?>">
                                        <td><?php echo $row['CourseName']; ?></td>
                                        <!--<td><?php echo $row['Description']; ?></td>-->
                                        <td>
                                        <span class="label bg-blue">
                                            <?php echo $row['FirstName']; ?>
                                            <?php echo $row['MiddleName'][0]; ?>
                                            <?php echo $row['LastName']; ?>
                                        </span>
                                        </td>
                                        <td><?php echo $row['DateCreated']; ?></td>
                                        <td>
                                        <span class="label bg-green">
                                            <?php echo $row['CourseCode']; ?>
                                        </span>
                                        </td>
                                        <td><button class="btn btn-default" name="enrollees">Enrolled Students</button></td>
                                        <td><button class="btn btn-info" name="viewpage">View</button></td>
                                        <td>
                                            <li class="dropdown" style="list-style: none;">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a href="javascript:void(0);"><button type="button" style="width:100%" class="btn btn-default" data-toggle="modal" data-target="#EditCourseModal">Edit</button></a></li>
                                                    <li><a href="javascript:void(0);"><button style="width:100%" class="btn btn-danger" name="remove">Remove</button></a></li>
                                                </ul>
                                            </li>
                                        </td>
                                    </tr>
                                    </form>
                                <?php endForeach; ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    <?php endIf; ?>
                    <!-- ////////////////HANDLED COURSES CARD///////////////////////// -->

                    <!-- ////////////////ENROLLED COURSES CARD///////////////////////// -->
                    <?php if($this->data['Enrolled_List']->num_rows() != 0): ?>
                    <div class="card">
                        <div class="header">
                            <h3>Enrolled Courses</h3>
                        </div>
                        <div class="body">
                            <div class="container" style="overflow-x:auto; max-width:100%">
                            <table class="table table-hover dashboard-task-info" >
                                <thead>
                                    <tr>
                                        <th>Course</th>
                                        <!--<th>Description</th>-->
                                        <th>Uploaded By</th>
                                        <th>Date Enrolled</th>
                                        <th>Course Code</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($this->data['Enrolled_List']->result_array() as $row): ?>
                                    <form action="<?php echo base_url(); ?>index.php/Course/CourseInfo" method="post">
                                    <tr>
                                    <input type="hidden" name="Post_ID" value="<?php echo $row['Course_ID']; ?>">
                                        <td><?php echo $row['CourseName']; ?></td>
                                        <!--<td><?php echo $row['Description']; ?></td>-->
                                        <td>
                                        <span class="label bg-blue">
                                            <?php echo $row['FirstName']; ?>
                                            <?php echo $row['MiddleName'][0]; ?>
                                            <?php echo $row['LastName']; ?>
                                        </span>
                                        </td>
                                        <td><?php echo $row['DateJoined']; ?></td>
                                        <td>
                                        <span class="label bg-green">
                                            <?php echo $row['CourseCode']; ?>
                                        </span>
                                        </td>
                                        <td><button class="btn btn-danger" name="leavecourse" onsubmit="return confirm('Do you really want to submit the form?');">Leave Course</button></td>
                                        <td><button class="btn btn-success" name="viewpage">View</button></td>
                                    </tr>
                                    </form>
                                <?php endForeach; ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    <?php endIf; ?>
                    <!-- ////////////////ENROLLED COURSES CARD///////////////////////// -->

                </div>
            </div>
        </div>
    </section>

    <!-- ////////////////EDIT COURSE MODAL///////////////////////// -->
    <div class="modal fade" id="EditCourseModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Edit Course Info</h3>
            </div>
            <form id="CommentForm" action="<?php echo base_url(); ?>index.php/Course/NewComment" method="post">
            <div class="modal-body">
            <div class="form-line">
                <input type="text" name="Course_Title" class="form-control" placeholder="Post Title">
            </div>
            <textarea style="width:100%; height:100px; resize: none;" name="CommentContent" id="CommentContent" placeholder=""></textarea>

            </div>
            <div class="modal-footer">
                

            <button class="btn btn-danger" data-toggle="modal" data-target="#CommentModal">Close</button>
            <button class="btn btn-success" name="CommentPostID" id="CommentPostID" type="submit">Update</button>
                
                
            </div>
            </form>
        </div>
    </div>
    </div>
    <!-- ////////////////EDIT COURSE MODAL///////////////////////// -->