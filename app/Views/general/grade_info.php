
<link rel="stylesheet" href="<?=base_url('assets/vendor/select2/css/select2.min.css');?>">

<style type="text/css">
	.select2-container--default.select2-container--focus .select2-selection--multiple{
		border: 0.0625rem solid #c8c8c8 !important;
	}
	.select2-container--default .select2-selection--multiple .select2-selection__rendered
	{
		padding: 5px;
	}
</style>
<label  class="form-label font-w600">Grade List<span class="text-danger scale5 ms-2">*</span></label>
<select class="multi-select" name="gradeId[]" multiple="multiple">
												<?php
												
													foreach($gradeList as $gdkkey => $gdvalue)
													{
													  	?>
													  	<option value="<?=$gdvalue['gradeID'];?>"><?=$gdvalue['gradeName'];?></option>
													  	<?php
													}
												
												?>
											</select>
											<script src="<?=base_url('assets/vendor/select2/js/select2.full.min.js');?>"></script>
											<script src="<?=base_url('assets/js/plugins-init/select2-init.js');?>"></script>

											