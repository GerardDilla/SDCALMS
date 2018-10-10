    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
            </div>
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h3>Add A New Course</h3>
                        </div>
                        <div class="body">
                            <div class="card" style="width:100%">
                                <form action="<?php echo base_url(); ?>index.php/Course/AddCourse_SO" method="GET">
                                <div class="header">
                                    <label>Title</label>
                                    <div class="form-line">
                                        <input type="text" name="Course_Title" class="form-control" placeholder="Post Title">
                                    </div>
                                    <br>
                                    <textarea style="width:100%; height:100px; resize: none;" name="CourseDescription" placeholder="Post Something Here..."></textarea>
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

