<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div style="clear: both"></div>
<br>
<div style="clear: both"></div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-edit" id="color_main_icon"></i> <b> <?php echo_line($action); ?>jobtitle_form </b>
            </div>
            <div class="panel-body">
                <?php if (isset($error_msg)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $error_msg; ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="<?php echo admin_ms_site('jobtitle/save'); ?>" method="post">
                            <?php if (isset($job_title_id)) { ?>
                                <input type="hidden" id="job_title_id" name="job_title_id" value="<?php echo (num_param_url_encode($job_title_id)) ?>">
                            <?php } ?>  

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <tbody>
                                    <tr class="odd gradeA">
                                        <td align="center"> job_title_name </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกjob_title_name" name="job_title_name" id="job_title_name" value="{job_title_name}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> job_description </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกjob_description" name="job_description" id="job_description" value="{job_description}" type="text" required="" autofocus=""></td>
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

