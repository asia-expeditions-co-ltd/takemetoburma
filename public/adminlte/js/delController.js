
$(function(){
	var baseUrl = location.protocol +'//'+location.host;
	// option event click on button delete by id ----------------------------------------------
	$(".btnDelete").click( function(e) {
		var DataId = $(this).attr('data-id');
		var Action = $(this).attr('data-action');
		var remove_row = $(this).closest("tr");
		if (confirm("Are you sure, you want to remove this?")) {
			$.ajax({
		        method: "GET",  
			    url: baseUrl+'/admin/delete',
			    data : { 'dataId': DataId, 'action': Action },
			    dataType: 'json',			
				success: function (respon) {
					remove_row.fadeOut(500, function(){
						$(this).closest("tr").css({'background-color':'red'});
						if (respon.status == 'yes') {
							$("#message").text(respon.message);
							$("#alertMessage").addClass('show');
							setTimeout(
								function() {
									$("#alertMessage").removeClass('show');
								}, 2600);
						}
						remove_row.remove();
					});					
		        },
		        error: function (respon) {
		            alert('Error');
			    }
			});
			return false;
		}else{
			return false;
		}
		e.preventDefault();
	});
	// Ending section delete-----------------------------------------------------------------------


	$(".btnSearch").on('change', function(){
		var Action = $(this).attr('action-to');
		var DataId = $(this).val();
		$.ajax({
	        method: "GET",  
		    url: baseUrl+'/admin/searchData',
		    data : { 'dataId': DataId, 'action': Action },
		    dataType: 'json',			
			success: function (respon) {
				var data = '';
				$.each(respon.data, function(i, index){
					data +="<option value="+index.id+">"+index.title+"</optoin>";
				});
				$("#province").html(data);
	        },
	        error: function (respon) {
	            alert('Error');
		    }		
		});
	});

});