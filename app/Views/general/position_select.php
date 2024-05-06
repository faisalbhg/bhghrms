<label  class="form-label font-w600">Positions<span class="text-danger scale5 ms-2">*</span></label>
											<select  class="form-select form-control" name="positionID" id="positionID">
												<option selected value="0">Choose...</option>
												<?php
												if($positionList)
												{
													$departmentId='';
													$companyId = '';
													foreach($positionList as $pstkkey => $position)
													{
													  	?>
													  	<option value="<?=$position['roleId'];?>"><?=$position['roleName'];?></option>
													  	<?php
													  	$departmentId = $position['departmentId'];
													  	$companyId = $position['companyId'];
													}
												}
												?>
											</select>
											<input type="hidden" value="<?=$departmentId;?>" name="departmentIdHide">
											<input type="hidden" value="<?=$companyId;?>" name="companyIdHide">
											<script type="text/javascript">
												$(document).ready(function(){
												$('#positionID').change(function()
												{
													$.ajax({
														url: "<?=base_url('get-grade-position');?>",
														type: "get",
														data: {'comapnyId':$('#selectCompany').val(),'positionID':$('#positionID').val()} ,
														success: function (gradeResponse) {
															console.log(gradeResponse);
															$('#positionGradeDataResponse').html(gradeResponse.gradeSelectVal);
														//$('#salaryResponse').html(positionsResponse.salaryData);

														// You will get response from your PHP page (what you echo or print)
														},
														error: function(jqXHR, textStatus, errorThrown) {
														console.log(textStatus, errorThrown);
														}
													});
												});
												});
											</script>