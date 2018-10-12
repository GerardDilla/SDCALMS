<section class="content">
        <div class="container-fluid">
            <div class="block-header">
            </div>
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h3>Add Student Outcome</h3>
                        </div>
                        <div class="body">
                            <div class="card" style="width:100%">
                                <?php foreach($this->data['SO_Info']->result_array() as $row): ?>
                                <form action="<?php echo base_url(); ?>index.php/Education/EditSO" method="POST">
                                <input type="hidden" name="so_id" value="<?php echo $row['SO_ID']; ?>">
                                <div class="header">
                                    <label>Title</label>
                                    <div class="form-line">
                                        <input type="text" name="so_title" class="form-control" value="<?php echo $row['SO']; ?>">
                                    </div>
                                    <br>
                                    <textarea style="width:100%; height:100px; resize: none;" name="sodescription" placeholder=""><?php echo $row['Description']; ?></textarea>
                                </div>
                                <div class="body">
                                <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                                </form>
                                <?php endForeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>