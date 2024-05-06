<label  class="form-label font-w600">Position<span class="text-danger scale5 ms-2">*</span></label>
											<select onchange="getPositionData();"  class="form-select form-control solid" name="roleId" id="position">
											  <option selected value="0">Choose...</option>
												<?php
												if($positionList)
												{
													foreach($positionList as $plkkey => $plvalue)
													{
													  	?>
													  	<option value="<?=$plvalue['roleId'];?>"><?=$plvalue['roleName'];?></option>
													  	<?php
													}
												}
												?>
											</select>

											<script type="text/javascript">
												function getPositionData()
												{
													$.ajax({
														url: "<?=base_url('positions-data');?>/",
														type: "get",
														data: {'positionId':$('#position').val()} ,
														success: function (positionsResponse) {
														console.log(positionsResponse);
														$('#positionDataResponse').html(positionsResponse.positionListData);
														

														// You will get response from your PHP page (what you echo or print)
														},
														error: function(jqXHR, textStatus, errorThrown) {
														console.log(textStatus, errorThrown);
														}
													});
												}
											</script>