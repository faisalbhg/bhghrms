<label  class="form-label font-w600">Divisions<span class="text-danger scale5 ms-2">*</span></label>
											<select  class="form-select form-control" name="divisionID" id="divisionID">
												<option selected value="0">Choose...</option>
												<?php
												if($divisions)
												{
													foreach($divisions as $dvkkey => $division)
													{
													  	?>
													  	<option value="<?=$division['divisionId'];?>"><?=$division['divisionName'];?></option>
													  	<?php
													}
												}
												?>
											</select>
											<script type="text/javascript">
												$(document).ready(function(){
												$('#divisionID').change(function()
												{
													$.ajax({
														url: "<?=base_url('ptsn-get-department');?>",
														type: "get",
														data: {'comapnyId':$('#selectCompany').val(),'divisionId':$('#divisionID').val()} ,
														success: function (departmentResponse) {
															console.log(departmentResponse);
															$('#departmentDataResponse').html(departmentResponse.departmentListData);
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