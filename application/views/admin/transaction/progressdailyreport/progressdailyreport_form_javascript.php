<script type="text/javascript">

<?php // header timesheet ?>
var emp_code = "<?php echo_line('emp_code'); ?>";
var fname_th = "<?php echo_line('fname_th'); ?>";
var lname_th = "<?php echo_line('lname_th'); ?>";
var counter = 0;
	
function loadEmployeeProgress(){
	if($("#B").html() == ""){
		$.post('<?php echo admin_tr_site('timesheet/find_by_progress_daily_report'); ?>'
				,{project_id:$("#project_id").val(),start_date:$("#progress_date").val()}
				,function(result)
		{
			var div = $("#B");
			div.html(result);

			
			$("#emp_code").html(emp_code);
			$("#fname_th").html(fname_th);
			$("#lname_th").html(lname_th);


	        $('#table_timesheet').DataTable({
	            responsive: true
	        });

	        counter = $('#table_timesheet').dataTable().fnGetData().length;
				
		});
	}
}


function addEmployee(){


                 	  counter++;          
			$("#table_timesheet").DataTable().row.add([
								counter + '<input hidden="emp_id" value=""/>',
								'<input class="form-control" placeholder="กรอกemp_id" name="emp_code" id="emp_code" value="" type="text" required="" autofocus="">',
								'<input class="form-control" placeholder="กรอกemp_id" name="fname" id="fname" value="" type="text" required="" autofocus="">',
								'<input class="form-control" placeholder="กรอกemp_id" name="lname" id="lname" value="" type="text" required="" autofocus="">',
								'<input class="form-control" placeholder="กรอกemp_id" name="start_date" id="start_date" value="" type="datetime" required="" autofocus="">',
								'<input class="form-control" placeholder="กรอกemp_id" name="end_date" id="end_date" value="" type="datetime" required="" autofocus="">',
								'<input class="form-control" placeholder="กรอกemp_id" name="comment" id=""comment"" value="" type="text" required="" autofocus="">',
								'<input type="checkbox" name="approve_status" id="approve_status"/> '
				                   			]).draw();
}

	
</script>