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
                            <?php foreach($this->data['CILO_Info']->result_array() as $row): ?>
                            <div class="card" style="width:100%">
                                <form action="<?php echo base_url(); ?>index.php/Education/EditCILO" method="POST">
                                <input type="hidden" name="cilo_id" value="<?php echo $row['CILO_ID']; ?>">
                                <div class="header">
                                    <label>Title</label>
                                    <div class="form-line">
                                        <input type="text" name="cilo_title" class="form-control" value="<?php echo $row['CILO']; ?>">
                                    </div>
                                    <br>
                                    <textarea style="width:100%; height:100px; resize: none;" name="cilodescription"><?php echo $row['Description']; ?></textarea>
                                </div>
                                <div class="body">
                                <button type="submit" class="btn btn-success">Update</button>
                                </div>
                                </form>
                            </div>
                            <?php endForeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>