$(function(){
	var error_username = false;
	var error_fullname = false;
	var error_password = false;
	var error_repassword = false;
	var error_email = false;
	var error_phone = false;
	var username_error = $(".username");
	var fullname_error = $(".fullname");
	var password_error = $(".password");
	var repassword_error = $(".re-password");
	var email_error = $(".email");
	var phone_error = $(".phone");
	
	$("#username").focusout( function(){
	    checkUsername();
	});

	$("#fullname").focusout( function(){
		checkFullname();
	});

	$("#password").focusout( function(){
		checkPassword();
	});

	$("#re-password").focusout( function(){
		checkRpassword();
	});
	$("#email").focusout( function(){
		checkEmail();
	});
	$("#phone").focusout( function(){
		checkPhone();
	});

	function checkUsername (){
		var username = $("#username").val().length;

		if (username < 1) {
			$("#username").focus();
			
			$(username_error).addClass('has-error');
			error_username = true;
		}else{

			$(username_error).removeClass('has-error');
		}
	}

	function checkFullname (){
		var fullname = $("#fullname").val().length;
		if (fullname < 1) {
			
			$(fullname_error).addClass('has-error');
			error_fullname = true;
		}else{
	
			$(fullname_error).removeClass('has-error');
		}
	}

	function checkPassword (){
		
		var password = $("#password").val().length;
		if (password < 6) {
			// $("#password").focus();

			$(password_error).addClass('has-error');
			error_password = true;
		}else{
			$(password_error).removeClass('has-error');
		}
	}

	function checkRpassword (){
		var repassword = $("#re-password").val();

		if (repassword != $("#password").val() || repassword < 6 ) {
			// $("#re-password").focus();
			$(repassword_error).addClass('has-error');
			error_repassword = true;
		}else{
			$(repassword_error).removeClass('has-error');
		}
	}

	function checkEmail (){
		var emailReg = RegExp(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/);
		if (!emailReg.test( $("#email").val() ) ) {
			$(email_error).addClass('has-error');
			$(this).focus();
			error_email = true;
		}else{
			$(email_error).removeClass('has-error');
		}
	}

	function checkPhone (){
		var phone = $("#phone").val().length;
		if (phone < 1) {
			$(phone_error).addClass('has-error');
			error_phone = true;
		}else{
			$(phone_error).removeClass('has-error');
		}
	}
		
	$("#btnSave").click(function(e){			
		if ($("#username").val() != '' && $("#fullname").val() != '' && $("#password").val() != '' && $("#re-password").val() == $("#password").val() && $("#email").val() != '' && $("#phone").val() != '' ) {
			var Url = $(this).attr('data-url');
			$.ajax({
		        type: "POST",  
			    url: Url,
				data: {
					username: $("#username").val(),
					fullname: $("#fullname").val(),
					password: $("#password").val(),
					repassword: $("#re-password").val(),
					email: $("#email").val(),
					phone: $("#phone").val(),
					_token: $("input[name='_token']").val()
				},
				dataType: "json",
		        success: function (respon) {
		        	messages = '<div class="alert alert-warning alert-dismissible  show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>  '+respon.message+'</div>';
		         	$(".showMessage").html(messages);
		         	setTimeout( function() {
					   $(".showMessage").html('');
					}, 6000);	
					if (respon.status == 1) {  
						$("#username").val('');
						$("#fullname").val('');
						$("#password").val('');
						$("#re-password").val('');
						$("#email").val('');
						$("#phone").val('');
					}
		        },
		        error: function (respon) {
		            alert('Error');
		        }
		    });			
		}else{
			checkUsername();
			checkFullname();
			checkPassword();
			checkRpassword();
			checkEmail();
			checkPhone();
			messages = '<div class="alert alert-warning alert-dismissible  show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> Could not be save </div>';
			$(".showMessage").html(messages);
		}
		e.preventDefault();
	});

	$("#btnUpdate").click(function(e){			
		if ($("#username").val() != '' && $("#fullname").val() != '' && $("#password").val() != '' && $("#re-password").val() == $("#password").val() && $("#email").val() != '' && $("#phone").val() != '' ) {
			var Url = $(this).attr('data-url');
			$.ajax({
		       	type: "POST",  
			    url: Url,
				data: {
					username: $("#username").val(),
					fullname: $("#fullname").val(),
					password: $("#password").val(),
					repassword: $("#re-password").val(),
					email: $("#email").val(),
					phone: $("#phone").val(),
					eid: $("#eid").val(),
					_token: $("input[name='_token']").val()
				},
				dataType: "json",
		        success: function (respon) {
		        	messages = '<div class="alert alert-warning alert-dismissible  show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>'+respon.message+'</div>';
					$(".showMessage").html(messages);
					$("#current_password").val($("#password").val());
		        },
		        error: function (respon) {
		            alert('Error');
		        }
		    });			
		}else{
			checkUsername();
			checkFullname();
			checkPassword();
			checkRpassword();
			checkEmail();
			checkPhone();
			messages = '<div class="alert alert-warning alert-dismissible  show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> Could not be Update </div>';
			$(".showMessage").html(messages);
		}
		e.preventDefault();
	});

	$(".btnDelete").click(function(e){
		var Url = $(this).attr('data-url');
		var DataId = $(this).attr('data-id');
		var remove_row = $(this).closest("tr");
		if (confirm("Are you sure, you want to remove this?")) {
			$.ajax({
		        method: "GET",  
			    url: Url,	 
			    data : {dataId: DataId },
			    dataType: 'json',			
				success: function (respon) {
					remove_row.fadeOut(500, function(){
						$(remove_row).css({'background': 'red'});
						remove_row.remove();						
					});
					return false;
		        },
		        error: function (respon) {
		            alert('Error');
			    }
			});
		}else{
			return false;
		}
		e.preventDefault();
	});




	// post section 
	$(".btnDeletePost").click(function(e){
		var Url = $(this).attr('data-url');		
		var DataId = $(this).attr('data-id');
		var remove_row = $(this).closest("tr");
		if (confirm("Are you sure, you want to remove this?")) {					
			$.ajax({
		        method: "GET",  
			    url: Url,	 
			    data : { dataId: DataId },
			    dataType: 'json',			
				success: function (respon) {
					remove_row.fadeOut(500, function(){
						$(remove_row).css({'background': 'red'});
						remove_row.remove();						
					});
					return false;					
		        },
		        error: function (respon) {
		            alert('Error');
			    }
			});
		}else{
			return false;
		}
		e.preventDefault();
	});	

	$(".btnDelSd").click(function (){
		var Url = $(this).attr('data-url');		
		var DataId = $(this).attr('data-id');
		var remove_row = $(this).closest("tr");
		if (confirm("Are you sure, you want to remove this?")) {	
			$.ajax({
		        method: "GET",  
			    url: Url,	 
			    data : { dataId: DataId },
			    dataType: 'json',			
				success: function (respon) {
					remove_row.fadeOut(500, function(){
						$(remove_row).css({'background': 'red'});
						remove_row.remove();						
					});
					return false;					
		        },
		        error: function (respon) {
		            alert('Error');
			    }
			});
		}else{
			return false;
		}
		e.preventDefault();
	});


	// Delete News button list 
	$(".btnDeleteNews").click(function (){
		var Url = $(this).attr('data-url');		
		var DataId = $(this).attr('data-id');
		var remove_row = $(this).closest("tr");
		if (confirm("Are you sure, you want to remove this?")) {					
			$.ajax({
		        method: "GET",  
			    url: Url,	 
			    data : { dataId: DataId },
			    dataType: 'json',			
				success: function (respon) {
					remove_row.fadeOut(500, function(){
						$(remove_row).css({'background': 'red'});
						remove_row.remove();						
					});
					return false;				
		        },
		        error: function (respon) {
		            alert('Error');
			    }
			});
		}else{
			return false;
		}
		e.preventDefault();
	});

// btnDelCleint

	// client Section
	$(".btnDelCleint").click(function (){
		var Url = $(this).attr('data-url');		
		var DataId = $(this).attr('data-id');
		var remove_row = $(this).closest("tr");
		if (confirm("Are you sure, you want to remove this?")) {					
			$.ajax({
		        method: "GET",  
			    url: Url,	 
			    data : { dataId: DataId },
			    dataType: 'json',			
				success: function (respon) {
					remove_row.fadeOut(500, function(){
						$(remove_row).css({'background': 'red'});
						remove_row.remove();						
					});
					return false;				
		        },
		        error: function (respon) {
		            alert('Error');
			    }
			});
		}else{
			return false;
		}
		e.preventDefault();
	});

});
