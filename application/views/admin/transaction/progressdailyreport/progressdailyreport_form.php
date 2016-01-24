<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div style="clear: both"></div>
<br>
<div style="clear: both"></div>
 <form role="form" action="<?php echo admin_tr_site('progressdailyreport/save'); ?>" method="post">

  <div class="col-lg-12">

      <ul class="nav nav-tabs">
        <li class="active"><a href="#A" data-toggle="tab"><?php echo_line('progress_tab_a'); ?></a></li>
        <li  onclick="loadEmployeeProgress()"><a href="#B" data-toggle="tab"><?php echo_line('progress_tab_b'); ?></a></li>
        <li><a href="#C" data-toggle="tab"><?php echo_line('progress_tab_c'); ?></a></li>
      </ul>
      <div class="tabbable">
        <div class="tab-content">
          <div class="tab-pane active" id="A">
            <p></p>
            <p><!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-edit" id="color_main_icon"></i> <b> <?php echo_line($action); ?><?php echo_line('progress_daily_report'); ?> </b>
            </div>
            <div class="panel-body">
                <?php if (isset($error_msg)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $error_msg; ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-lg-6">
                       
                            <?php if (isset($progress_id)) { ?>
                                <input type="hidden" id="progress_id" name="progress_id" value="<?php echo (num_param_url_encode($progress_id)) ?>">
                            <?php } ?>  

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <tbody>
                               

                                    <tr class="odd gradeA">
                                        <td align="center"> <?php echo_line('project_name'); ?> </td>
                                        <td>
<!--                                             <input class="form-control" placeholder="กรอกproject_id" name="project_id" id="project_id" value="{project_id}" type="text" required="" autofocus=""> -->
												 
												 <select name="project_id" id="project_id" class="form-control">
												 <?php 
												 
												 			foreach ($project_list as $key => $project)
												 			{
												 	
												 	
												 	?>
												 	
												 				<option value="<?= $project->project_id ?>"><?= $project->project_name ?></option>
												 	
												 	<?php 
												 			}
												 	?>
												 	</select>
										</td> 
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> <?php echo_line('type_progress_name'); ?> </td>
<!--                                         <td> -->
<!--                                             <input class="form-control" placeholder="กรอกtype_progress_id" name="type_progress_id" id="type_progress_id" value="{type_progress_id}" type="text" required="" autofocus=""></td> -->
                                        
                                        <td>
                                        		

												
												<select name="type_progress_id" id="type_progress_id" class="form-control">
												  
														<?php
														         foreach ($type_progress_list  as $key => $typeProgress){
														                
														                    
														
														?>
																<option value="<?= $typeProgress->type_progress_id ?>"><?= $typeProgress->progress_name ?></option>
														
														<?php 
														         }														
														?>
												</select>
                                        		
                                        </td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> <?php echo_line('weather_name'); ?>  </td>
                                        <td>
<!--                                             <input class="form-control" placeholder="กรอกweather_id" name="weather_id" id="weather_id" value="{weather_id}" type="text" required="" autofocus=""></td> -->
                                        
                                        <select name="weather_id" id="weather_id"  class="form-control">
                                        	<?php 
                                        		foreach ($weather_list as $key => $weather){
                                        			
                                        	?>
                                        		<option value="<?= $weather->weather_id ?>"><?= $weather->weather_name ?></option>
                                        	<?php 
                                        		}
                                        	?>
                                        </select>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> <?php echo_line('weather_time'); ?>  </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอก<?php echo_line('weather_time'); ?> " name="weather_time" id="weather_time" value="{weather_time}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> <?php echo_line('progress_date'); ?>  </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกprogress_date" name="progress_date" id="progress_date" value="{progress_date}" type="date" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> <?php echo_line('work_detail_today'); ?> </td>
                                        <td>
<!--                                             <input class="form-control" placeholder="กรอกwork_detail_today" name="work_detail_today" id="work_detail_today" value="{work_detail_today}" type="text" required="" autofocus=""> -->
                                            	<textarea class="form-control" rows="3" name="work_detail_today" id="work_detail_today" placeholder="กรอก <?php echo_line('work_detail_today'); ?>">
                                            		{work_detail_today}
                                            	</textarea>
                                            </td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> <?php echo_line('work_detail_tomorrow'); ?> </td>
                                        <td>
<!--                                             <input class="form-control" placeholder="กรอกwork_detail_tomorrow" name="work_detail_tomorrow" id="work_detail_tomorrow" value="{work_detail_tomorrow}" type="text" required="" autofocus=""></td> -->
                                    			<textarea class="form-control" rows="3" name="อกwork_detail_tomorrow" id="work_detail_tomorrow" placeholder="กรอก<?php echo_line('work_detail_tomorrow'); ?>">
                                    				{work_detail_tomorrow}
                                    			</textarea>
                                    	</td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> <?php echo_line('barriers'); ?> </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอก<?php echo_line('barriers'); ?>" name="barriers" id="barriers" value="{barriers}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> <?php echo_line('solutions'); ?>  </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอก <?php echo_line('solutions'); ?>" name="solutions" id="solutions" value="{solutions}" type="text" required="" autofocus=""></td>
                                    </tr>
                                    
                                    
                                         <tr class="odd gradeA">
                                        <td align="center"> ผู้บัจทึก </td>
                                        <td>
<!--                                             <input class="form-control" placeholder="กรอกemp_id" name="emp_id" id="emp_id" value="{emp_id}" type="text" required="" autofocus=""></td> -->
                                        {emp_id}
                                    </tr>

<!--                                     <tr class="odd gradeA"> -->
<!--                                         <td colspan="2" align="center"> -->
<!--                                             <button type="submit" class="btn btn-success">บันทึก</button> -->
<!--                                             <button type="reset" class="btn btn-warning">ยกเลิก</button> -->
<!--                                         </td> -->
<!--                                     </tr> -->
                                </tbody>
                            </table>
                          
                    </div>
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row --></p>
          </div>
          <?php    //ข้อมูลพนักงานที่ทำงาน   ?>
          <div class="tab-pane" id="B"></div>
          <div class="tab-pane" id="C">
            <p>What up girl, this is Section C.</p>
          </div>
        </div>
      </div> <!-- /tabbable -->
      <table>
        <tr class="odd gradeA">
                                        <td colspan="2" align="center">
                                            <button type="submit" class="btn btn-success">บันทึก</button>
                                            <button type="reset" class="btn btn-warning">ยกเลิก</button>
                                        </td>
                                    </tr>
      </table>
</div>
 </form>
</body>
</html>                                		

