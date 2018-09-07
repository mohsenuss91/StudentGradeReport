<?php echo form_open('grade/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="studentname" class="col-md-4 control-label"><span class="text-danger">*</span>Studentname</label>
		<div class="col-md-8">
			<input type="text" name="studentname" value="<?php echo $this->input->post('studentname'); ?>" class="form-control" id="studentname" />
			<span class="text-danger"><?php echo form_error('studentname');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="studentpercent" class="col-md-4 control-label"><span class="text-danger">*</span>Studentpercent</label>
		<div class="col-md-8">
			<input type="text" name="studentpercent" value="<?php echo $this->input->post('studentpercent'); ?>" class="form-control" id="studentpercent" />
			<span class="text-danger"><?php echo form_error('studentpercent');?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="studentgrade" class="col-md-4 control-label"><span class="text-danger">*</span>Studentgrade</label>
		<div class="col-md-8">
			<input type="text" name="studentgrade" value="<?php echo $this->input->post('studentgrade'); ?>" class="form-control" id="studentgrade" />
			<span class="text-danger"><?php echo form_error('studentgrade');?></span>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
			
			<button action="action" onclick="window.history.go(-1); return false;" class="btn btn-warning" >Back</button>
        </div>


		
	</div>

<?php echo form_close(); ?>