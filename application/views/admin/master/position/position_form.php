<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div style="clear: both"></div>
<br>
<div style="clear: both"></div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-edit" id="color_main_icon"></i> <b> <?php echo_line($action); ?>position_form </b>
            </div>
            <div class="panel-body">
                <?php if (isset($error_msg)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $error_msg; ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="<?php echo admin_ms_site('position/save'); ?>" method="post">
                            <?php if (isset($position_id)) { ?>
                                <input type="hidden" id="position_id" name="position_id" value="<?php echo (num_param_url_encode($position_id)) ?>">
                            <?php } ?>  

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <tbody>
                                    <tr class="odd gradeA">
                                        <td align="center"> position_name </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกposition_name" name="position_name" id="position_name" value="{position_name}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> type </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกtype" name="type" id="type" value="{type}" type="text" required="" autofocus=""></td>
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

