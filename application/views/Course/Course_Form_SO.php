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
                                <form action="<?php echo base_url(); ?>index.php/Course/AddCourse_process" method="post">
                                <div class="header">
                                    <h3><?php echo $this->session->userdata('title'); ?></h3>
                                    <p><?php echo $this->session->userdata('description'); ?></p>
                                    <br>
                                    <h4>Student Outcome: </h4>

                                        <div id="SO_container">
                                        
                                        </div>

                                    <br>
                                    <br>
                                    <br>
                                    <label>Choose Student Outcome: </label>
                                    <div class="form-line">
                                        <select onchange="SO_Select(this)">
                                        <option value="0">Choose SO</option>
                                        <?php foreach($this->data['SO_List']->result_array() as $row): ?>
                                        
                                        <option id="<?php echo $row['SO']; ?>" value="<?php echo $row['SO_ID']; ?>"><?php echo $row['SO']; ?></option>

                                        <?php endForeach; ?>
                                        </select>
                                    </div>
                                    <br><br>
                                    <label>Suggested Student Outcome: </label>
                                    <div class="form-line">
                                    <?php if($this->data['SO_Suggested']->num_rows > 0): ?>
                                        <select onchange="SO_Select(this)">
                                        <option value="0">Choose SO</option>
                                        
                                        <?php foreach($this->data['SO_Suggested']->result_array() as $row): ?>
                                        
                                        <option id="<?php echo $row['SO']; ?>" value="<?php echo $row['SO_ID']; ?>"><?php echo $row['SO']; ?></option>

                                        <?php endForeach; ?>
                                        </select>
                                    <?php endIf; ?>
                                    </div>
                                    <br>

                                    
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
<script>
    function SO_Select(name){
        so = name[name.selectedIndex].id;
        so_val = name[name.selectedIndex].value;
        if(so_val != 0){
            var content = '';
            content += '<div class="btn-group" role="group" style="display:inline-block" onclick="this.remove()">';
            content += '<input type="hidden" name="SO[]" value="'+so_val+'">';
            content += '<button type="button" class="btn bg-red waves-effect"><i style="font-size:100%" class="material-icons">close</i></button>';
            content += '<button class="btn bg-default waves-effect" type="button" >'+so+'</button>';
            content += '</div>';
            $('#SO_container').append(content);
        }
        
        //alert(cilo);
    }
</script>
