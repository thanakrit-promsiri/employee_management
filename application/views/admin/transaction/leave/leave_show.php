<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<br><br>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa  fa-search" id="color_main_icon"></i> <b><?php echo_line('action_insert'); ?>leave</b>
            </div>
            <div class="panel-body">
                <?php if ($save_success == 'success') { ?>
                    <div class="alert alert-success  col-lg-6">
                        การบันทึกข้อมูลสำเร็จแล้ว
                    </div>
                    <div style="clear: both"></div>
                <?php } ?>
                <div class="row">
                    <div class="col-lg-6">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">                               
                                <tbody>
                                    <tr>
                                        <th>emp_id</th>
                                        <td>{emp_id}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>type_leave_id</th>
                                        <td>{type_leave_id}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>supervisor_id</th>
                                        <td>{supervisor_id}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>begin_date</th>
                                        <td>{begin_date}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>end_date</th>
                                        <td>{end_date}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>begin_time</th>
                                        <td>{begin_time}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>end_time</th>
                                        <td>{end_time}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>description_issue</th>
                                        <td>{description_issue}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>description_approve</th>
                                        <td>{description_approve}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>approve_status</th>
                                        <td>{approve_status}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>create_date</th>
                                        <td>{create_date}</td>                                          
                                    </tr>

                                    
                                    <tr class="odd gradeA">
                                        <td colspan="2" align="center">   
                                            <a href="<?php echo admin_tr_site('leave/'); ?>">
                                                <button type="button" class="btn btn-primary"> กลับ </button>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->

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

