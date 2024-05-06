<label  class="form-label font-w600">User Group<span class="text-danger scale5 ms-2">*</span></label>
											<select class="form-select form-control" name="userGroupId" id="userGroupId">
												<option selected value="0">Choose...</option>
												<?php
												if($userGroups)
												{
													foreach($userGroups as $gpkkey => $userGroup)
													{
													  	?>
													  	<option value="<?=$userGroup['groupId'];?>"><?=$userGroup['groupName'];?></option>
													  	<?php
													}
												}
												?>
											</select>