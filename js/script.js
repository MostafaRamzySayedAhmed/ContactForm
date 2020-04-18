$(document).ready(function () {
	
	'use strict';
	
	
	//For Validating The Input Field Of The Username
	
	
	$('.username').blur(function () {
		
		if ($(this).val().length < 4)
			
			{
				$(this).css('border', '1px solid #F00');
				
				$(this).parent().find('.custom-alert').fadeIn(200);
				
				$(this).parent().find('.asterisx').fadeIn(100);
			}
		
		else
			
			{
				$(this).css('border', '1px solid #0F0');
				
				$(this).parent().find('.custom-alert').fadeOut(200);
				
				$(this).parent().find('.asterisx').fadeOut(100);
			}
	});
	
	
	//For Validating The Input Field Of The Email
	
	
	$('.email').blur(function () {
		
		if ($(this).val().length === 0)
			
			{
				$(this).css('border', '1px solid #F00');
				
				$(this).parent().find('.custom-alert').fadeIn(200);
				
				$(this).parent().find('.asterisx').fadeIn(100);
			}
		
		else
			
			{
				$(this).css('border', '1px solid #0F0');
				
				$(this).parent().find('.custom-alert').fadeOut(200);
				
				$(this).parent().find('.asterisx').fadeOut(100);
			}
	});
	
	
	//For Validating The Input Field Of The Phone Number
	
	
	$('.phone_number').blur(function () {
		
		if ($(this).val().length === 11)
			
			{
				$(this).css('border', '1px solid #0F0');
				
				$(this).parent().find('.custom-alert').fadeOut(200);
				
				$(this).parent().find('.asterisx').fadeIn(100);
			}
		
		else
			
			{
				$(this).css('border', '1px solid #F00');
				
				$(this).parent().find('.custom-alert').fadeIn(200);
				
				$(this).parent().find('.asterisx').fadeOut(100);
			}
	});
	
	
	//For Validating The Input Field Of The Message
	
	
	$('.msg').blur(function () {
		
		if ($(this).val().length <= 10)
			
			{
				$(this).css('border', '1px solid #F00');
				
				$(this).parent().find('.custom-alert').fadeIn(200);
				
				$(this).parent().find('.asterisx').fadeIn(100);
			}
		
		else
			
			{
				$(this).css('border', '1px solid #0F0');
				
				$(this).parent().find('.custom-alert').fadeOut(200);
				
				$(this).parent().find('.asterisx').fadeOut(100);
			}
	});
	
	
	//For Validating The Form When Submitting
	
	
	$(".contact").submit(function (e) {
		
		e.preventDefault();
		
		$(".username, .email, .phone_number, .msg").blur();
		
	});
	
});