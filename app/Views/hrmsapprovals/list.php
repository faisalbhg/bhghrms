    <div class="row">
        <div class="col-xl-6">
        	<?= form_open('update-approvals',array("autocomplete"=>"off","id"=>"updateAproval")); ?>
                <?= csrf_field() ?>
                <input type="hidden" name="companyid" id="companyid" />
                <input type="hidden" name="gradeid" id="gradeid" />
                <input type="hidden" name="stageid" id="stageid" />
		        <div class="card">
		            <div class="card-header">
		                <h4 class="card-title">Custom content</h4>
		            </div>
		            <div class="card-body">
		                <div class="basic-list-group">
		                	<?php foreach($getApprovalMatrixList as $key => $getApprovalMatrixVal)
	                    	{
	                    		//echo '<pre>'; print_r($getApprovalMatrixVal); echo '</pre>';
	                    		?>
	                    		<input type="hidden" value="<?=$getApprovalMatrixVal->LevelId;?>" name="levelId[]">
	                    		<input type="hidden" value="<?=$getApprovalMatrixVal->LevelTitle;?>" name="levelTitle[]">
	                    		<input type="hidden" value="<?=$getApprovalMatrixVal->ActionId;?>" name="actionId[]">
	                    		<input type="hidden" value="<?=$getApprovalMatrixVal->FullName;?>" name="fullName[]">
	                    		<input type="hidden" value="<?=$getApprovalMatrixVal->UserId;?>" name="userIdPost[]">
	                    		<div class="list-group">
	                    			<div class="list-group-item list-group-item-action flex-column align-items-start active mb-2">
	                    				<div class="d-flex w-100 justify-content-between">
	                    					<h3 class="mb-3 text-white"><?=$getApprovalMatrixVal->LevelTitle;?></h3>
	                    					<a style="cursor:pointer; color: #FFF;" class="clcikEdit" data-id="<?=$key+1;?>">
	                    						<small>Edit <i class="fa fa-edit"></i></small>
	                    					</a>
	                    				</div>
	                    				<p class="mb-1">
	                    					<strong>User: </strong>
	                    					<span id="editUser<?=$key+1;?>"><?=$getApprovalMatrixVal->FullName;?></span>
	                    				</p>

	                    			</div>
	                    			
	                    		</div>
	                    		<?php
	                    	}
	                    	?>
		                </div>
		            </div>
		            <div class="card-footer" id="updateButton" style="display:none;">
						<div>
							<button type="submit" id="clickUpdate" class="btn btn-primary" name="forApproval" value="0">Update</button>
						</div>
					</div>
		        </div>
		    <?=form_close();?>
	    </div>

        
    </div>
    
<script type="text/javascript">
	$(document).ready(function(){
		$('.clcikEdit').click(function(){
			var editId = $(this).attr('data-id');
			$('#companyid').val($('#selectCompany').val());
			$('#stageid').val($('#StageId').val());
			$('#gradeid').val($("input[name='gradeSelect']:checked").val());
			$.ajax({
				url: "<?=base_url('get-users-list');?>",
				type: "get",
				data: {'companyId':$('#selectCompany').val(),'StageId':$('#StageId').val(),'gradeid':$("input[name='gradeSelect']:checked").val(),'editId':editId} ,
				success: function (userListResponse) {
				console.log(userListResponse);
				$('#editUser'+editId).html(userListResponse.userslist);
				$('#updateButton').show();


				// You will get response from your PHP page (what you echo or print)
				},
				error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
				}
			});
			
		});

		$('#clickUpdate').click(function(){
		
		});
	});
</script>

