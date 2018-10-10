 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1></h1>
            </div>

    <div class="row clearfix">
            <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                        <div class="back-button">
                        <a href="<?php echo base_url(); ?>index.php/Admin/Generate_Rubrics" class="material-icons pull-right">backspace</a>
                        </div>
                        </div>
                        <div class="body">
                
                        <?php foreach ($this->$data['v_rubrics'] as $row) { ?>
                        <h1> <?php echo $row->rubrics; ?> </h1>
                        <?php }?>
                        <?php foreach ($this->$data['v_rubrics_description']->result_array() as $row) { ?>
                        <h4 class="justify">Description:<?php echo $row['description']; ?> </h4>
                        <?php }?>
    
                        <div class="body table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr class="success">
                                    <th class="text-center">Criteria</th>
                        <?php foreach ($this->$data['v_rubrics_escale'] as $row) {  ?>  
                                        <th class="text-center"><?php echo $row->escale; ?></th>
                       <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>


     
                 <?php $criteria = ''; ?>
                 <?php foreach($this->$data['test_output']->result_array() as $row1): ?>
                 <tr>
                 <?php if($row1['criteria_id'] != $criteria): ?>

                        <?php $criteria = $row1['criteria_id']; ?>
                    
                        <td class="bold text-center"><?php echo $row1['criteria']; ?></td>


                        <?php foreach($this->$data['test_output']->result_array() as $row2): ?>
                            <?php if($row2['criteria_id'] == $criteria): ?>
                                <td class="bold text-center"><?php echo $row2['description']; ?></td>
                            <?php endIf; ?>
                        <?php endForeach; ?>
                <?php endIf; ?>     
                </tr>
                 <?php endForeach; ?>

            

                                
                                </tbody>
                            </table>
                        </div>
                        </div>
                   </div>
            </div>
    </div>

          
        </div>
    </section>