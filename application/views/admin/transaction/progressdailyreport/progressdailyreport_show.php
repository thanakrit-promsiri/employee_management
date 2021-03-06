<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<br><br>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa  fa-search" id="color_main_icon"></i> <b><?php echo_line('action_insert'); ?>progressdailyreport</b>
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
                                        <th>project_id</th>
                                        <td>{project_id}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>type_progress_id</th>
                                        <td>{type_progress_id}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>weather_id</th>
                                        <td>{weather_id}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>weather_time</th>
                                        <td>{weather_time}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>progress_date</th>
                                        <td>{progress_date}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>work_detail_today</th>
                                        <td>{work_detail_today}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>work_detail_tomorrow</th>
                                        <td>{work_detail_tomorrow}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>barriers</th>
                                        <td>{barriers}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>solutions</th>
                                        <td>{solutions}</td>                                          
                                    </tr>

                                    
                                    <tr class="odd gradeA">
                                        <td colspan="2" align="center">   
                                            <a href="<?php echo admin_tr_site('progressdailyreport/'); ?>">
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

