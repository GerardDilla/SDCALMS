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
                                  <?php if (validation_errors()  != ''): ?>
                               <div class="alert alert-danger alert-dismissible" role="alert" >
                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                   <?php echo validation_errors(); ?> 
                               </div> 
                                  <?php endIf; ?>
                           </div>

                              <div class="body">
                                  <?php foreach ($this->$data['v_rubrics'] as $row) { ?>
                                    <h1> <?php echo $row->rubrics; ?> </h1>
                                  <?php }?>
                                <div class="body table-responsive">
                                   <table class="table table-condensed">
                                      <thead>
                                        <tr class="success">
                                          <th class="text-center">Criteria</th>
                                             <?php foreach ($this->$data['v_rubrics_escale'] as $row) { ?>
                                          <th class="text-center"><?php echo $row->escale; ?></th>
                                              <?php }?>      
                                         </tr> 
                                      </thead>
                                 <tbody id="criterion1">
                         <?php echo form_open('Admin/DeleteCriteria',array('id'=>'Create_Rubrics_form','method'=>'post')); ?>  
                                  <?php $criteria = ''; ?>
                                  <?php foreach($this->$data['test_output']->result_array() as $row1): ?>
                                       <tr>     
                                  <?php if($row1['criteria_id'] != $criteria): ?>
                                  <?php $criteria = $row1['criteria_id']; ?>
                                       <td class="bold text-center">
                                       <input type="hidden"  name="criteria_id" value="<?php echo $row1['criteria_id']; ?>">  
                                          <textarea type="text" rows="5" name="criterias[]" placeholder=""><?php echo $row1['criteria']; ?></textarea>
                                          <br><button type="submit" class="btn btn-primary" onclick="return confirm('Do you want to Delete this Rubrics Criteria?');" >Remove Criterion</button>
                                       </td> 
                                   <?php foreach($this->$data['test_output']->result_array() as $row2): ?>
                                  <?php if($row2['criteria_id'] == $criteria): ?>
                                          <td class="justify"><textarea rows="10" name="crit_Des[]" cols="14" placeholder=""><?php echo $row2['description']; ?></textarea></td>
                                   <?php endIf; ?>
                                  <?php endForeach; ?>
                               <?php endIf; ?>     
                                      </tr>
                               <?php endForeach; ?>
                        </form>   

  <?php echo form_open('Admin/insert_criteria',array('id'=>'Create_Rubrics_form','method'=>'post')); ?> 

    <?php foreach ($this->$data['v_rubrics'] as $row) { ?>
        <input type="hidden"  name="rubrics_id" value="<?php echo $row->rubrics_id;?>">                          
     <?php }?> 
    
                   <tr>
                       <td class="bold text-center">
                          <textarea type="text" rows="5" name="criterias[]" placeholder=""></textarea>
                     </td>   
                           
                         <td class="justify"><textarea rows="10" name="crit_Des[]" cols="14" placeholder=""></textarea></td>
                         <td class="justify"><textarea rows="10" name="crit_Des[]" cols="14" placeholder=""></textarea></td>  
                         <td class="justify"><textarea rows="10" name="crit_Des[]" cols="14" placeholder=""></textarea></td>
                         <td class="justify"><textarea rows="10" name="crit_Des[]" cols="14" placeholder=""></textarea></td>         
                         <td class="justify"><textarea rows="10" name="crit_Des[]" cols="14" placeholder=""></textarea></td>  
                    </tr>

                 
                                </tbody>
                            </table>
                         
                        </div>

                            <div class="text-center">
                                  <button  type="submit"class="btn btn-lg btn-success">Add Row</button>
                            </div>
                        </div>
     </form>
                   </div>
            </div>
    </div>

          
        </div>
    </section>