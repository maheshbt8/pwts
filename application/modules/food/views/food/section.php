<?php
$this->load->view('food_scripts');
$cat_id=$this->vendor_list_model->where('vendor_user_id', $this->ion_auth->get_user_id())->get();
$vendor_category_id=$cat_id['category_id'];
$required=$section_field='';
if(!$this->ion_auth->is_admin()){
$section_field=$this->category_model->get_cat_desc_account_name($vendor_category_id,'sec_field','field_status');
$required=$this->category_model->get_cat_desc_account_name($vendor_category_id,'sec_required','field_status');
}
?>
<!--Add Category And its list-->
<div class="row">
	<div class="col-12">
		<h4 class="ven"><?=(($this->ion_auth->is_admin())? 'Add Section' : $this->category_model->get_cat_desc_account_name($vendor_category_id,'sec_label'));?></h4>
		<form class="needs-validation" novalidate="" action="<?php echo base_url('food_section/c');?>" method="post" enctype="multipart/form-data">
			<div class="card-header">
				<div class="form-row">
					<div class="form-group col-md-3">
						<label><?=(($this->ion_auth->is_admin())? 'Menu' : $this->category_model->get_cat_desc_account_name($vendor_category_id,'sec_menu'));?></label>
						<select class="form-control" name="menu_id" required="" onchange="get_sub_item(this.value)">
							<option value="" selected disabled>--select--</option>
    							<?php foreach ($food_items as $item):?>
    								<option value="<?php echo $item['id'];?>"><?php echo $item['name']?></option>
    							<?php endforeach;?>
						</select>
						<div class="invalid-feedback"><?=(($this->ion_auth->is_admin())? 'New Menu Name' : $this->category_model->get_cat_desc_account_name($vendor_category_id,'sec_menu'));?>?</div>
						<?php echo form_error('menu_id','<div style="color:red>"','</div>');?>
					</div>
					<div class="form-group col-md-3">
						<label><?=(($this->ion_auth->is_admin())? 'Item' : $this->category_model->get_cat_desc_account_name($vendor_category_id,'sec_item'));?></label>
						<select class="form-control" name="item_id" required="" id="sub_items">
							<option value="" selected disabled>--select--</option>
						</select>
						<div class="invalid-feedback"><?=(($this->ion_auth->is_admin())? 'New Item Name' : $this->category_model->get_cat_desc_account_name($vendor_category_id,'sec_item'));?>?</div>
						<?php echo form_error('item_id','<div style="color:red>"','</div>');?>
					</div>
					<div class="form-group col-md-3">
						<label><?=(($this->ion_auth->is_admin())? 'Section Name' : $this->category_model->get_cat_desc_account_name($vendor_category_id,'sec_name'));?></label> <input type="text" name="name"
							required="" value="<?php echo set_value('name')?>"
							class="form-control">
						<div class="invalid-feedback"><?=(($this->ion_auth->is_admin())? 'New Section Name' : $this->category_model->get_cat_desc_account_name($vendor_category_id,'sec_name'));?>?</div>
						<?php echo form_error('name', '<div style="color:red">', '</div>');?>
					</div>
					<?php
                    if($this->ion_auth->is_admin() || $section_field == 3){
                    ?>
					<div class="form-group mb-0 col-md-3">
						<label><?=(($this->ion_auth->is_admin())? 'Item Field' : $this->category_model->get_cat_desc_account_name($vendor_category_id,'sec_field'));?></label> 
						<div  class="form-control"> 
						<label><input type="radio" name="item_field" required="" value="1" checked="" onclick="ch_sec_price('radio');"> Radio </label>&nbsp;&nbsp;&nbsp;<label><input type="radio" name="item_field" required="" value="2"  onclick="ch_sec_price('check');"> Check Box</label>
						</div>
						<div class="invalid-feedback"><?=(($this->ion_auth->is_admin())? 'Select any one' : $this->category_model->get_cat_desc_account_name($vendor_category_id,'sec_field'));?>?</div>
						<?php echo form_error('item_field', '<div style="color:red">', '</div>');?>
					</div>
				<?php }else{?>
						<input type="hidden" name="item_field" required="" value="<?=$section_field;?>">
				<?php }?>
				<div class="form-group mb-0 col-md-3" id="all_sec_price">
						<label><?=(($this->ion_auth->is_admin())? 'Section Price' : $this->category_model->get_cat_desc_account_name($vendor_category_id,'sec_price'));?></label> 
						<div  class="form-control"> 
						<label><input type="radio" name="sec_price" value="1"> Add </label>&nbsp;&nbsp;&nbsp;
						<label><input type="radio" name="sec_price" value="2"> Replace </label>&nbsp;&nbsp;&nbsp;
						<label><input type="radio" name="sec_price" value="3" checked=""> No Price</label>
						</div>
						<div class="invalid-feedback"><?=(($this->ion_auth->is_admin())? 'Select any one' : $this->category_model->get_cat_desc_account_name($vendor_category_id,'sec_field'));?>?</div>
						<?php echo form_error('item_field', '<div style="color:red">', '</div>');?>
					</div>
					<!-- <div id="check_sec_price" style="display:none;">
						<input type="hidden" name="sec_price" value="1">
					</div> -->
				<?php
                    if($this->ion_auth->is_admin() || $required == 2  || $required == 0){
                    ?>
					<div class="form-group col-md-12">
						<label><input type="checkbox" name="require_items" value="1"> <?=(($this->ion_auth->is_admin())? 'Required' : $this->category_model->get_cat_desc_account_name($vendor_category_id,'sec_required'));?> ? </label>
						<div class="invalid-feedback">Check Box?</div>
						
						<b>If checked, this section will require to fill.</b>
					</div>
					<?php }else{?>
						<input type="hidden" name="require_items" required="" value="<?=$required;?>">
				<?php }?>
					<div class="form-group col-md-12">
						<button type="submit" name="upload" id="upload" value="Apply"
							class="btn btn-primary mt-27 ">Submit</button>
					</div>
				</div>
			</div>
		</form>

		<div class="card-body">
			<div class="card">
				<div class="card-header">
					<h4 class="ven">List of <?=(($this->ion_auth->is_admin())? 'Sections' : $this->category_model->get_cat_desc_account_name($vendor_category_id,'sec_label'));?></h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped table-hover" id="tableExport"
							style="width: 100%;">
							<thead>
								<tr>
									<th>Sno</th>
									<th><?=(($this->ion_auth->is_admin())? 'Section Name' : $this->category_model->get_cat_desc_account_name($vendor_category_id,'sec_name'));?></th>
									<th><?=(($this->ion_auth->is_admin())? 'Item' : $this->category_model->get_cat_desc_account_name($vendor_category_id,'sec_item'));?></th>
									<th><?=(($this->ion_auth->is_admin())? 'Menu' : $this->category_model->get_cat_desc_account_name($vendor_category_id,'sec_menu'));?></th>
									<?php
                    if($this->ion_auth->is_admin() || $required == 2  || $required == 0){
                    ?>
									<th>Required (Yes/No)</th>
								<?php }?>
									<?php
                    if($this->ion_auth->is_admin() || $section_field == 3){
                    ?>
									<th><?=(($this->ion_auth->is_admin())? 'Item Field' : $this->category_model->get_cat_desc_account_name($vendor_category_id,'sec_field'));?></th>
								<?php }?>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
							<?php if(!empty($food_section)):?>
    							<?php  $sno = 1; foreach ($food_section as $section): 
    							?>
    								<tr>
									<td><?php echo $sno++;?></td>
									<td><?php echo $section['name'];?></td>
									<td><?php echo $section['item']['name'];?></td>
									<td><?php echo $section['menu']['name'];?></td>
											<?php
                    if($this->ion_auth->is_admin() || $required == 2  || $required == 0){
                    ?>
									<td><?=($section['required']==1)? 'Yes' : 'No';?></td>
								<?php }?>
										<?php
                    if($this->ion_auth->is_admin() || $section_field == 3){
                    ?>
									<td><?=($section['item_field']==1)? 'Radio' : 'Checkbox';?></td>
								<?php }?>
									<td><a
										href="<?php echo base_url()?>food_section/edit?id=<?php echo base64_encode(base64_encode($section['id'])); ?>"
										class=" mr-2  " type="ecom_brands"> <i class="fas fa-pencil-alt"></i>
									</a> <a href="#" class="mr-2  text-danger "
										onClick="delete_record(<?php echo $section['id'] ?>, 'food_section')">
											<i class="far fa-trash-alt"></i>
									</a></td>

								</tr>
    							<?php endforeach;?>
							<?php else :?>
							<tr>
									<th colspan='5'><h3>
											<center>No Data Found</center>
										</h3></th>
								</tr>
							<?php endif;?>
							</tbody>
						</table>
					</div>
				</div>
			</div>


		</div>

	</div>
</div>

<script type="text/javascript">
    function ch_sec_price(promo_type) {
        if(promo_type == 'radio'){
        	$('#all_sec_price').show();
        	//$('#check_sec_price').hide();
        }else if(promo_type == 'check'){
        	$('#all_sec_price').hide();
        	//$('#check_sec_price').show();
        }
    }
</script>