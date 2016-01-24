<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div style="clear: both"></div>
<br>
<div style="clear: both"></div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-edit" id="color_main_icon"></i> <b> <?php echo_line($action); ?>roleurllist_form </b>
            </div>
            <div class="panel-body">
                <?php if (isset($error_msg)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $error_msg; ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="<?php echo admin_tr_site('roleurllist/save'); ?>" method="post">
                            <?php if (isset($role_url_list)) { ?>
                                <input type="hidden" id="role_url_list" name="role_url_list" value="<?php echo (num_param_url_encode($role_url_list)) ?>">
                            <?php } ?>  

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <tbody>
                                    <tr class="odd gradeA">
                                        <td align="center"> url_id </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกurl_id" name="url_id" id="url_id" value="{url_id}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> role_id </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกrole_id" name="role_id" id="role_id" value="{role_id}" type="text" required="" autofocus=""></td>
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

