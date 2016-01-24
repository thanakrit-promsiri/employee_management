<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div style="clear: both"></div>
<br>
<div style="clear: both"></div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-edit" id="color_main_icon"></i> <b> <?php echo_line($action); ?>timesheet_form </b>
            </div>
            <div class="panel-body">
                <?php if (isset($error_msg)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $error_msg; ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="<?php echo admin_tr_site('timesheet/save'); ?>" method="post">
                            <?php if (isset($time_sheet_id)) { ?>
                                <input type="hidden" id="time_sheet_id" name="time_sheet_id" value="<?php echo (num_param_url_encode($time_sheet_id)) ?>">
                            <?php } ?>  

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <tbody>
                                    <tr class="odd gradeA">
                                        <td align="center"> emp_id </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกemp_id" name="emp_id" id="emp_id" value="{emp_id}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> supervisor_approve_id </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกsupervisor_approve_id" name="supervisor_approve_id" id="supervisor_approve_id" value="{supervisor_approve_id}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> project_id </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกproject_id" name="project_id" id="project_id" value="{project_id}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> start_date </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกstart_date" name="start_date" id="start_date" value="{start_date}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> end_date </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกend_date" name="end_date" id="end_date" value="{end_date}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> work </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกwork" name="work" id="work" value="{work}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> approve_status </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกapprove_status" name="approve_status" id="approve_status" value="{approve_status}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> comment </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกcomment" name="comment" id="comment" value="{comment}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> leave_id </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกleave_id" name="leave_id" id="leave_id" value="{leave_id}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> time_stamp </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกtime_stamp" name="time_stamp" id="time_stamp" value="{time_stamp}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td colspan="2" align="center">
                                            <button type="submit" class="btn btn-success">บันทึก</button>
                                            <button type="reset" class="btn btn-warning">ยกเลิก</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
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

