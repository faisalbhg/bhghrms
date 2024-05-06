		$(document).ready(function(){
			$('#basicSalary').keyup(function()
			{
				var basicSal = $('#basicSalary').val();
				var minbasicSal = <?=$applicantDetails['basicSalaryMin'];?>;
				var maxbasicSal = <?=$applicantDetails['basicSalaryMax'];?>;

				if(basicSal>=minbasicSal && basicSal<=maxbasicSal)
				{
					return true;
				}
				else
				{
					return false;
				}
			});

			$('#calculatebalance').click(function()
			{
				calculateBalance();
			});

			$('#totalSalary').keyup(function(){
				calculateBaseSalary();
				calculateBalance();
			});
			$('#basicSalary').keyup(function(){
				calculateBalance();
			});
			$('#homeRentAllownace').keyup(function(){
				calculateBalance();
			});
			$('#transportAllownace').keyup(function(){
				calculateBalance();
			});
			$('#taskAllowance').keyup(function(){
				calculateBalance();
			});

			$('#companyTransport').click(function(){
				if($(this).prop("checked") == true){
					$('#transportAllownace').val('0');	
				}
				else
				{
					autoSubmVal('2','<?=$getSalaryBreakDown[2]['fixedAmount'];?>','transportAllownace');
				}
			});

			if($('#companyTransport').prop("checked") == true){
				$('#transportAllownace').val('0');	
			}
			else
			{
				autoSubmVal('2','<?=$getSalaryBreakDown[2]['fixedAmount'];?>','transportAllownace');
			}

			$('#companyAccomodation').click(function(){
				if($(this).prop("checked") == true){
					$('#homeRentAllownace').val('0');	
				}
				else
				{
					autoSubmVal('2','<?=$getSalaryBreakDown[1]['fixedAmount'];?>','homeRentAllownace')
				}
			});
			if($('#companyAccomodation').prop("checked") == true){
				$('#homeRentAllownace').val('0');	
			}
			else
			{
				autoSubmVal('2','<?=$getSalaryBreakDown[1]['fixedAmount'];?>','homeRentAllownace')
			}

			//FUEL
			$('#companyFuel').click(function(){
				if($(this).prop("checked") == true){
					$('#fuelAllownace').val('0');	
				}
				else
				{
					autoSubmVal('2','<?=$getSalaryBreakDown[5]['fixedAmount'];?>','fuelAllownace');
				}
			});

			if($('#companyFuel').prop("checked") == true){
				$('#fuelAllownace').val('0');	
			}
			else
			{
				autoSubmVal('2','<?=$getSalaryBreakDown[5]['fixedAmount'];?>','fuelAllownace');
			}

			//FOOD
			$('#companyFood').click(function(){
				if($(this).prop("checked") == true){
					$('#foodAllowance').val('0');	
				}
				else
				{
					autoSubmVal('2','<?=$getSalaryBreakDown[6]['fixedAmount'];?>','foodAllowance');
				}
			});

			if($('#companyFood').prop("checked") == true){
				$('#foodAllowance').val('0');	
			}
			else
			{
				autoSubmVal('2','<?=$getSalaryBreakDown[6]['fixedAmount'];?>','foodAllowance');
			}
		});

		function calculateBaseSalary()
		{
			var totalSal = $('#totalSalary').val();
			var callBasicSalPercentage = '<?=$applicantDetails['basicPerc'];?>';
			$('#basicSalary').val(percentage(totalSal, callBasicSalPercentage));
		}

		function calculateBalance()
		{
			var totalSal = $('#totalSalary').val();
			var basicSal = $('#basicSalary').val();
			var homeRentAllownace = $('#homeRentAllownace').val();
			var transportAllownace = $('#transportAllownace').val();
			var taskAllowance = $('#taskAllowance').val();
			var mobileAllowance = $('#mobileAllowance').val();
			var fuelAllowance = $('#fuelAllowance').val();
			var foodAllowance = $('#foodAllowance').val();
			$('#agreedTotal').html($('#totalSalary').val());
			var totalSalBreakCal = Number(basicSal)+Number(homeRentAllownace)+Number(transportAllownace)+Number(taskAllowance)+Number(mobileAllowance)+Number(fuelAllowance)+Number(foodAllowance);
			$('#salCalTotal').html(totalSalBreakCal);
			var totlBalnce = Number(totalSal)-Number(totalSalBreakCal);
			if(totlBalnce==0)
			{
				var valTotbal = '<span class="text-success">'+totlBalnce+'</span>';
			}
			else
			{
				var valTotbal = '<span class="text-danger">'+totlBalnce+'</span>';

			}
			$('#balCalTotal').html(valTotbal);
		}

		function calculateBalanceSubmit()
		{
			var totalSal = $('#totalSalary').val();
			var basicSal = $('#basicSalary').val();
			var homeRentAllownace = $('#homeRentAllownace').val();
			var transportAllownace = $('#transportAllownace').val();
			var taskAllowance = $('#taskAllowance').val();
			var mobileAllowance = $('#mobileAllowance').val();
			var fuelAllowance = $('#fuelAllowance').val();
			var foodAllowance = $('#foodAllowance').val();
			
			var totalSalBreakCal = Number(basicSal)+Number(homeRentAllownace)+Number(transportAllownace)+Number(taskAllowance)+Number(mobileAllowance)+Number(fuelAllowance)+Number(foodAllowance);
			
			var totlBalnce = Number(totalSal)-Number(totalSalBreakCal);
			if(totlBalnce==0)
			{
				var valTotbal = totlBalnce;
			}
			else
			{
				var valTotbal = totlBalnce;

			}
			return valTotbal;
		}

		function percentage(num, per)
		{
		  return (num/100)*per;
		}

		function imposeMinMax(el){
			if(el.value != ""){
				if(parseInt(el.value) < parseInt(el.min)){
					el.value = el.min;
				}
				if(parseInt(el.value) > parseInt(el.max)){
					el.value = el.max;
				}
			}
		}

		<?php
		if($getSalaryBreakDown[2]['perc']>0)
		{
			?>
			autoSubmVal('1','<?=$getSalaryBreakDown[2]['perc'];?>','transportAllownace');
			<?php
		}
		else if($getSalaryBreakDown[2]['fixedAmount']>0)
		{
			?>
			autoSubmVal('2','<?=$getSalaryBreakDown[2]['fixedAmount'];?>','transportAllownace');
			<?php
		}

		if($getSalaryBreakDown[3]['perc']>0)
		{
			?>
			autoSubmVal('1','<?=$getSalaryBreakDown[3]['perc'];?>','taskAllowance');
			<?php
		}
		else if($getSalaryBreakDown[3]['fixedAmount']>0)
		{
			?>
			autoSubmVal('2','<?=$getSalaryBreakDown[3]['fixedAmount'];?>','taskAllowance');
			<?php
		}

		if($getSalaryBreakDown[4]['perc']>0)
		{
			?>
			autoSubmVal('1','<?=$getSalaryBreakDown[4]['perc'];?>','mobileAllowance');
			<?php
		}
		else if($getSalaryBreakDown[4]['fixedAmount']>0)
		{
			?>
			autoSubmVal('2','<?=$getSalaryBreakDown[4]['fixedAmount'];?>','mobileAllowance');
			<?php
		}
		else if($getSalaryBreakDown[5]['fixedAmount']>0)
		{
			?>
			autoSubmVal('2','<?=$getSalaryBreakDown[5]['fixedAmount'];?>','fuelAllowance');
			<?php
		}
		else if($getSalaryBreakDown[6]['fixedAmount']>0)
		{
			?>
			autoSubmVal('2','<?=$getSalaryBreakDown[5]['fixedAmount'];?>','foodAllowance');
			<?php
		}
		?>

		function basicClick(type,val)
		{
			var totalSal = $('#totalSalary').val();
			if(totalSal=='')
			{
				$('input[name="basiccheck"]:checked').prop("checked", false)
				//$(this).prop("checked", false);
				$('#totalSalary').focus();
			}
			else
			{
				$('#basicSalary').focus();
				if(type==1)
				{
					var totalSalary = $('#totalSalary').val();
					$('#basicSalary').val(percentage(totalSalary, val));
					$('#basicSalary').focus();
				}
				else if(type==2)
				{
					$('#basicSalary').val(val);
					$('#basicSalary').focus();
				}
			}
			calculateBalance();
		}

		function callBasicSal(type,val1,id)
		{
			var basicSal = $('#totalSalary').val();
			if(type==1)
			{
				$('#basicSalary').focus();
				$('#totalSalary').focus();
				$('#basicSalary').val(percentage(basicSal, val1));
			}
			else if(type==2)
			{
				$('#basicSalary').focus();
				$('#totalSalary').focus();
				$('#basicSalary').val(val1);
			}
		}

		function hraClick(type,val)
		{
			var basicSal = $('#basicSalary').val();
			if(basicSal=='')
			{
				$('input[name="hraValOptn"]:checked').prop("checked", false)
				//$(this).prop("checked", false);
				$('#basicSalary').focus();
			}
			else
			{
				$('#homeRentAllownace').focus();
				if(type==1)
				{
					var taskAllowance = $('#taskAllowance').val();
					var basicSal = $('#basicSalary').val();
					basicSalTask = Number(basicSal)+Number(taskAllowance);
					var splitval = val.split("-");

					$('#homeRentAllownace').val(percentage(splitval[1], splitval[0]));
					$('#transportAllownace').focus();
				}
				else if(type==2)
				{
					$('#homeRentAllownace').val(val);
					$('#transportAllownace').focus();
				}
				else if(type==3)
				{
					$('#homeRentAllownace').val('0');
					$('#transportAllownace').focus();
				}
			}
			calculateBalance();
		}

		function taskAClick(type,val)
		{
			var basicSal = $('#basicSalary').val();
			if(basicSal=='')
			{
				$('input[name="hraValOptn"]:checked').prop("checked", false)
				//$(this).prop("checked", false);
				$('#basicSalary').focus();
			}
			else
			{
				$('#homeRentAllownace').focus();
				if(type==1)
				{
					var basicSal = $('#basicSalary').val();
					$('#homeRentAllownace').val(percentage(basicSal, val));
					$('#transportAllownace').focus();
				}
				else if(type==2)
				{
					$('#homeRentAllownace').val(val);
					$('#transportAllownace').focus();
				}
			}
			calculateBalance();
		}

		function traAClick(type,val)
		{
			var basicSal = $('#basicSalary').val();
			if(basicSal=='')
			{
				$('input[name="hraValOptn"]:checked').prop("checked", false)
				//$(this).prop("checked", false);
				$('#basicSalary').focus();
			}
			else
			{
				$('#homeRentAllownace').focus();
				if(type==1)
				{
					var basicSal = $('#basicSalary').val();
					$('#transportAllownace').val(percentage(basicSal, val));
					$('#transportAllownace').focus();
				}
				else if(type==2)
				{
					$('#transportAllownace').val(val);
					$('#transportAllownace').focus();
				}
				else if(type==3)
				{
					if ($("#radiocheckCompTra").is(":checked")) {
						$('#transportAllownace').val('0');
					}
					else
					{
						$('#transportAllownace').val('<?=$applicantDetails['transportAllow'];?>');	
					}
					$('#transportAllownace').focus();
				}
			}
			calculateBalance();
		}

		function maClick(type,val)
		{
			var basicSal = $('#basicSalary').val();
			if(basicSal=='')
			{
				$('input[name="hraValOptn"]:checked').prop("checked", false)
				//$(this).prop("checked", false);
				$('#basicSalary').focus();
			}
			else
			{
				$('#homeRentAllownace').focus();
				if(type==1)
				{
					var basicSal = $('#basicSalary').val();
					$('#homeRentAllownace').val(percentage(basicSal, val));
					$('#transportAllownace').focus();
				}
				else if(type==2)
				{
					$('#homeRentAllownace').val(val);
					$('#transportAllownace').focus();
				}
			}
			calculateBalance();
		}
	
		function autoSubmVal(type,val,id)
		{
			$('#'+id).focus();
			if(type==1)
			{
				var percVal = percentage(basicSal, val);
				if(percVal==0)
				{
					$('#'+id).val('0');
				}
				else
				{
					$('#'+id).val(percVal);
				}
				//$('#totalSalary').focus();
			}
			else if(type==2)
			{
				var fixVal = val;
				if(val==0)
				{
					$('#'+id).val('0');
				}
				else
				{
					$('#'+id).val(fixVal);
				}
				//$('#totalSalary').focus();
			}
		}

		jQuery(document).ready(function() {
			// click on next button
			jQuery('.form-wizard-next-btn').click(function() {
				var parentFieldset = jQuery(this).parents('.wizard-fieldset');
				var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
				var next = jQuery(this);
				var nextWizardStep = true;
				parentFieldset.find('.wizard-required').each(function(){
					var thisValue = jQuery(this).val();
					
					if( thisValue == "") {
						jQuery(this).siblings(".wizard-form-error").slideDown();
						nextWizardStep = false;
					}
					else {
						jQuery(this).siblings(".wizard-form-error").slideUp();
					}

					var minTotalSal = <?=$applicantDetails['salaryFrom'];?>;
					var maxTotalSal = <?=$applicantDetails['salaryTo'];?>;

					var minbasicSal = <?=$applicantDetails['basicSalaryMin'];?>;
					var maxbasicSal = <?=$applicantDetails['basicSalaryMax'];?>;

					/*if(jQuery('#totalSalary').val()>=minTotalSal && jQuery('#totalSalary').val()<=maxTotalSal)
					{
						jQuery('#totalSalary').siblings(".wizard-form-error").slideUp();
					}
					else
					{
						jQuery('#totalSalary').siblings(".wizard-form-error").slideDown();
						nextWizardStep = false;
					}*/
					
					/*if(jQuery('#basicSalary').val()>=minbasicSal && jQuery('#basicSalary').val()<=maxbasicSal)
					{
						jQuery('#basicSalary').siblings(".wizard-form-error").slideUp();
					}
					else
					{
						jQuery('#basicSalary').siblings(".wizard-form-error").slideDown();
						nextWizardStep = false;
					}*/

					if(calculateBalanceSubmit()!=0)
					{
						jQuery('#taskAllowance').siblings(".wizard-form-error").slideDown();
						jQuery('#taskAllowanceMessage').html('Balance '+calculateBalanceSubmit()+' is available..!');
						nextWizardStep = false;
					}

				});
				if( nextWizardStep) {
					next.parents('.wizard-fieldset').removeClass("show","400");
					currentActiveStep.removeClass('active').addClass('activated').next().addClass('active',"400");
					next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show","400");
					jQuery(document).find('.wizard-fieldset').each(function(){
						if(jQuery(this).hasClass('show')){
							var formAtrr = jQuery(this).attr('data-tab-content');
							jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
								if(jQuery(this).attr('data-attr') == formAtrr){
									jQuery(this).addClass('active');
									var innerWidth = jQuery(this).innerWidth();
									var position = jQuery(this).position();
									jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
								}else{
									jQuery(this).removeClass('active');
								}
							});
						}
					});
				}
			});
			//click on previous button
			jQuery('.form-wizard-previous-btn').click(function() {
				var counter = parseInt(jQuery(".wizard-counter").text());;
				var prev =jQuery(this);
				var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
				prev.parents('.wizard-fieldset').removeClass("show","400");
				prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show","400");
				currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active',"400");
				jQuery(document).find('.wizard-fieldset').each(function(){
					if(jQuery(this).hasClass('show')){
						var formAtrr = jQuery(this).attr('data-tab-content');
						jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
							if(jQuery(this).attr('data-attr') == formAtrr){
								jQuery(this).addClass('active');
								var innerWidth = jQuery(this).innerWidth();
								var position = jQuery(this).position();
								jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
							}else{
								jQuery(this).removeClass('active');
							}
						});
					}
				});
			});
			//click on form submit button
			jQuery(document).on("click",".form-wizard .form-wizard-submit" , function(){
				var parentFieldset = jQuery(this).parents('.wizard-fieldset');
				var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
				parentFieldset.find('.wizard-required').each(function() {
					var thisValue = jQuery(this).val();
					if( thisValue == "" ) {
						jQuery(this).siblings(".wizard-form-error").slideDown();
					}
					else {
						jQuery(this).siblings(".wizard-form-error").slideUp();
					}
				});
			});
			// focus on input field check empty or not
			jQuery(".form-control").on('focus', function(){
				var tmpThis = jQuery(this).val();
				if(tmpThis == '' ) {
					jQuery(this).parent().addClass("focus-input");
				}
				else if(tmpThis !='' ){
					jQuery(this).parent().addClass("focus-input");
				}
			}).on('blur', function(){
				var tmpThis = jQuery(this).val();
				if(tmpThis == '' ) {
					jQuery(this).parent().removeClass("focus-input");
					jQuery(this).siblings('.wizard-form-error').slideDown("3000");
				}
				else if(tmpThis !='' ){
					jQuery(this).parent().addClass("focus-input");
					jQuery(this).siblings('.wizard-form-error').slideUp("3000");
				}
			});
		});
