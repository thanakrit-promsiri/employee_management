<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div style="clear: both"></div>
<br>
<div style="clear: both"></div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-edit" id="color_main_icon"></i> <b> <?php echo_line($action); ?>leave_form </b>
            </div>
            <div class="panel-body">
                <?php if (isset($error_msg)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $error_msg; ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="<?php echo admin_tr_site('leave/save'); ?>" method="post">
                            <?php if (isset($leve_id)) { ?>
                                <input type="hidden" id="leve_id" name="leve_id" value="<?php echo (num_param_url_encode($leve_id)) ?>">
                            <?php } ?>  

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <tbody>
                                    <tr class="odd gradeA">
                                        <td align="center"> emp_id </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกemp_id" name="emp_id" id="emp_id" value="{emp_id}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> type_leave_id </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกtype_leave_id" name="type_leave_id" id="type_leave_id" value="{type_leave_id}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> supervisor_id </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกsupervisor_id" name="supervisor_id" id="supervisor_id" value="{supervisor_id}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> begin_date </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกbegin_date" name="begin_date" id="begin_date" value="{begin_date}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> end_date </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกend_date" name="end_date" id="end_date" value="{end_date}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> begin_time </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกbegin_time" name="begin_time" id="begin_time" value="{begin_time}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> end_time </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกend_time" name="end_time" id="end_time" value="{end_time}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> description_issue </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกdescription_issue" name="description_issue" id="description_issue" value="{description_issue}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> description_approve </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกdescription_approve" name="description_approve" id="description_approve" value="{description_approve}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> approve_status </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกapprove_status" name="approve_status" id="approve_status" value="{approve_status}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> create_date </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกcreate_date" name="create_date" id="create_date" value="{create_date}" type="text" required="" autofocus=""></td>
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

