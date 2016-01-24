<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div style="clear: both"></div>
<br>
<div style="clear: both"></div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-edit" id="color_main_icon"></i> <b> <?php echo_line($action); ?>teammember_form </b>
            </div>
            <div class="panel-body">
                <?php if (isset($error_msg)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $error_msg; ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="<?php echo admin_ms_site('teammember/save'); ?>" method="post">
                            <?php if (isset($team_member_id)) { ?>
                                <input type="hidden" id="team_member_id" name="team_member_id" value="<?php echo (num_param_url_encode($team_member_id)) ?>">
                            <?php } ?>  

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <tbody>
                                    <tr class="odd gradeA">
                                        <td align="center"> team_id </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกteam_id" name="team_id" id="team_id" value="{team_id}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> emp_id </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกemp_id" name="emp_id" id="emp_id" value="{emp_id}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> team_leader </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกteam_leader" name="team_leader" id="team_leader" value="{team_leader}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> team_approve </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกteam_approve" name="team_approve" id="team_approve" value="{team_approve}" type="text" required="" autofocus=""></td>
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

