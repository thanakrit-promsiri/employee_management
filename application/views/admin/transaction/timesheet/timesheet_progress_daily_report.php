<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-edit" id="color_main_icon"></i> <b> progressdailyreport_form </b>
            </div>
            <div class="panel-body">
                <?php if (isset($error_msg)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $error_msg; ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-lg-12">
                       
                       

                               <table class="table table-striped table-bordered table-hover" id="table_timesheet">
                        <thead>
                            <tr>
                                <th>seq</th>
                                <th id="emp_code"> </th>
                                <th id="fname_th"></th>
                                <th id="lname_th"></th>
                                <th> วันเวลาที่ทำงาน </th>
                                <th> สิ้นสุดวันเวลาที่ทำงาน </th>
                                <th> รายละเอียดการทำงาน </th>
                                <th> สถานะอนุมัติงาน </th>
                               
                            </tr>
                        </thead>
                        <tbody>
                   				 <?php foreach ($timesheet_list as $key => $timesheet) { ?>
                                <tr class="odd gradeX">
                                    
                                    <td><input hidden="time_sheet_id" value="<?= $timesheet->time_sheet_id ?>"/>
                                      <?php echo ($key + 1); ?> </td>
                                    <td>
                                      <input hidden="emp_id" value="<?= $timesheet->emp_id ?>"/>
                                     <input class="form-control" placeholder="กรอกemp_id" name="emp_code" id="emp_code" value="<?= $timesheet->emp_code ?>" type="text" required="" autofocus="">  </td>
                                    <td> <input class="form-control" placeholder="กรอกemp_id" name="fname" id="fname" value="<?= $timesheet->fname_th ?>" type="text" required="" autofocus=""> </td>
                                    <td> <input class="form-control" placeholder="กรอกemp_id" name="lname" id="lname" value="<?= $timesheet->lname_th ?>" type="text" required="" autofocus=""> </td>
                                    <td> <input class="form-control" placeholder="กรอกemp_id" name="start_date" id="start_date" value="<?= $timesheet->start_date ?>" type="datetime" required="" autofocus=""> </td>
                                    <td> <input class="form-control" placeholder="กรอกemp_id" name="end_date" id="end_date" value="<?= $timesheet->end_date ?>" type="datetime" required="" autofocus=""> </td>
                                    <td>  <input class="form-control" placeholder="กรอกemp_id" name="comment" id=""comment"" value="<?php echo $timesheet->comment; ?>" type="text" required="" autofocus="">  </td>
                                    <td> 
                                    
                                    <?php 
                                    
//                                     		$timesheet->approve_status; 
                                    		if($timesheet->approve_status == 1)
                                    			echo form_checkbox('approve_status','approve',TRUE);
                                    		else
                                    			echo form_checkbox('approve_status','approve',FALSE);
                                    ?> 
                                    
                                    </td>
                                   </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                      <button class="btn btn-info" type="button" onclick="addEmployee();">เพิ่ม</button>
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
<!-- /.row -->
