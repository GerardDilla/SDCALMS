<section class="content">
        <div class="container-fluid">
            <div class="block-header">
            </div>
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h3>Add Course Intended Learning Outcome</h3>
                        </div>
                        <div class="body">
                            <div class="card" style="width:100%">
                                <form action="<?php echo base_url(); ?>index.php/Education/AddSO" method="POST">
                                <div class="header">
                                    <label>Title</label>
                                    <div class="form-line">
                                        <input type="text" name="so_title" class="form-control" placeholder="Student Outcome Title">
                                    </div>
                                    <br>
                                    <textarea style="width:100%; height:100px; resize: none;" name="sodescription" placeholder=""></textarea>
                                </div>
                                <div class="body">
                                <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>