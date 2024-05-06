<div class="col-xl-6  col-md-6 mb-4">
	<?php
	foreach($gradeList as $gradeVal)
	{
		?>
		<div class="form-check custom-checkbox mb-3">
			<input type="radio" class="form-check-input clickGrade" id="gradeVal<?=$gradeVal['gradeID'];?>" name="gradeSelect" value="<?=$gradeVal['gradeID'];?>" required="">
			<label class="form-check-label" for="customCheckBox1"><?=$gradeVal['gradeName'];?></label>
		</div>
		<?php
	}
	?>
	
</div>

<script type="text/javascript">
	$(document).ready(function(){
	$('.clickGrade').click(function()
	{
		var selectedGrade = $('input[name="gradeSelect"]:checked').val();
		//alert(selectedGrade);

		$.ajax({
			url: "<?=base_url('positions-data');?>",
			type: "get",
			data: {'gradeID':selectedGrade} ,
			success: function (budgetResponse) {
				console.log(budgetResponse);
				$('#budgetDataResponse').html(budgetResponse.BudgetDetailsData);
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