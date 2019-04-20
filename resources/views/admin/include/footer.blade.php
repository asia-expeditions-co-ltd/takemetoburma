<footer class="main-footer">
	<div class="pull-right hidden-xs">
	</div>
	<strong>Copyright © 2017  <a href="#"></a>.</strong> 
</footer>
<script type="text/javascript">
	$(document).ready(function() {
	    $('#example').DataTable();
	    $("#check_all").click(function () {
	        if($("#check_all").is(':checked')){
	            if ($('#example tbody tr:visible')) {
	                $('#example tbody tr:visible td .checkall').prop('checked', true);
	            }else{
	                $('#example tbody tr:visible td .checkall').prop('checked', false);
	            }
	            $(".btnStatus").removeAttr('disabled');
	        } else {
	        	$(".btnStatus").attr('disabled', 'disabled');
	            $(".checkall").prop('checked', false);
	        }
	    });
	    $(".checkall").on('change', function(){
	    	$.each($(this), function(i, index){
	    		if($(index).is(':checked')){
	    			$(".btnStatus").removeAttr('disabled');
	    		}
	    	});
	    	var countcheck = $('[name="checkall[]"]:checked').length;
	    	var allbox = $('[name="checkall[]"]').length;
	    	if (countcheck == allbox) {
	    		$("#check_all").prop('checked', true);
	    	}else{
				$("#check_all").prop('checked', false);
	    	}
			if(countcheck <= 0){
				$(".btnStatus").attr('disabled', 'disabled');
			}
	    }); 
	    $(".btnStatus").attr('disabled', 'disabled');
	} );
</script>