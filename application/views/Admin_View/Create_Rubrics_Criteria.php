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
							<a class="material-icons pull-right" href="<?php echo base_url(); ?>index.php/Admin/Generate_Rubrics">backspace</a>
						</div><?php if (validation_errors()  != ''): ?>
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true">×</span></button> <?php echo validation_errors(); ?>
						</div><?php endIf; ?>
					</div><?php echo form_open('Admin/AddUpdate',array('id'=>'Create_Rubrics_form','method'=>'post')); ?>
					<div class="body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-line">
									<?php foreach ($this->$data['v_rubrics'] as $row) { ?>
                                        <input type="hidden"  name="rubrics_id" value="<?php echo $row->rubrics_id; ?>">
                                    <label class="form-label">Title of Rubrics:</label> 
                                    <input  type="text" class="form-control" name="rubrics" placeholder="" value="<?php echo $row->rubrics; ?>"> 
                                    <?php }?>
								</div>
								<div class="form-line">
									<?php if ($this->$data['v_rubrics_description']->num_rows() == 0){ ?><label class="form-label">Description:</label> 
									<textarea cols="60" name="rubrics_description" rows="5"></textarea> <?php  }else{?> <?php foreach ($this->$data['v_rubrics_description']->result_array()  as $row) { ?> 
                                    <label class="form-label">Description:</label> 
									<textarea cols="60" name="rubrics_description" rows="5">
                                    <?php echo $row['description']; ?>
                                    </textarea> <?php }?>
                                     <?php } ?>
								</div><br>
								<div class="form-line">
									<label class="form-label">Order:</label> <select class="anyFormField" name="ru_order">
										<option value="Asc">
											Asc
										</option>
										<option selected value="Desc">
											Desc
										</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<?php if ($this->$data['v_rubrics_escale']->num_rows() == 0){ ?>
                                <label class="form-label">Tier</label> 
                                <input class="form-control" name="rubrics_escale[]" type="text" value="">
                                <label class="form-label">Tier</label> 
                                <input class="form-control" name="rubrics_escale[]" type="text" value=""> 
                                <label class="form-label">Tier</label> 
                                <input class="form-control" name="rubrics_escale[]" type="text" value=""> 
                                <label class="form-label">Tier</label> 
                                <input class="form-control" name="rubrics_escale[]" type="text" value="">
                                 <label class="form-label">Tier</label> 
                                 <input class="form-control" name="rubrics_escale[]" type="text" value=""> 
                                 <?php  }else{?> 
                                 <?php  $count = 1; foreach ($this->$data['v_rubrics_escale']->result_array() as $row) {  ?> <label class="form-label">Tier</label> 
                                 <input class="form-control" name="rubrics" type="text" value="<?php echo $row['escale']; ?> ">
                                <?php $count = $count + 1;  } ?>
                                  <?php } ?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="text-center">
									<?php if ($this->$data['v_rubrics_escale']->num_rows() == 0 && $this->$data['v_rubrics_description']->num_rows() == 0){ ?>
                                    <button class="btn btn-lg btn-success" name="add_escale" type="submit">Save Rubrics</button> 
                                    <?php  }else{?> 
                                    <button class="btn btn-lg btn-primary" name="update_escale" type="submit">Update Rubrics</button>
                                     <?php } ?>
								</div>
							</div>
                        
						</div>
					</div>
				</div>
                </form>
			</div>
		</div>
	</div>
</section>