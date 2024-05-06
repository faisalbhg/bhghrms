<?php
if($positionData)
{
	?>
	<label  class="form-label font-w600">Job Position Details</label>
	<div class="col-sm-12 " style="background:#f8f8f8; border: 0.0625rem solid #dededf;padding: 0.3125rem 1.25rem;color: #6e6e6e;border-radius: 1rem;">
		
		<p><label class="form-label font-w600">Company: </label> <?=$positionData['companyName'];?></p>
		<!-- <p><label class="form-label font-w600">Position: </label> <?=$positionData['roleName'];?></p> -->
		<p><label class="form-label font-w600">Grade: </label> <?=$positionData['gradeName'];?></p>
		<p><label class="form-label font-w600">Salary: </label> <?=$positionData['salaryFrom'];?>-<?=$positionData['salaryTo'];?></p>
	</div>
	<?php
}
?>
