<label  class="form-label font-w600">Department<span class="text-danger scale5 ms-2">*</span></label>
											<select onchange="getGradeList();"  class="form-select form-control" name="departmentID" id="department">
												<option selected value="0">Choose...</option>
												<?php
												if($departmentList)
												{
													foreach($departmentList as $dlkkey => $dlvalue)
													{
													  	?>
													  	<option value="<?=$dlvalue['departmentId'];?>"><?=$dlvalue['departmentName'];?></option>
													  	<?php
													}
												}
												?>
											</select>
											<script type="text/javascript">
												function getGradeList()
												{
													$.ajax({
														url: "<?=base_url('ptsn-get-position-grade');?>",
														type: "get",
														data: {'comapnyId':$('#selectCompany').val(),'deptId':$('#department').val(),'page':'job'} ,
														success: function (gradeResponse) {
														console.log(gradeResponse);
														$('#positionResponse').html(gradeResponse.gradeSelectVal);
														//$('#salaryResponse').html(positionsResponse.salaryData);

														// You will get response from your PHP page (what you echo or print)
														},
														error: function(jqXHR, textStatus, errorThrown) {
														console.log(textStatus, errorThrown);
														}
													});
												}
											</script>