<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<br>
<div class="right">
    <a href="<?php echo admin_tr_site('employeejobtitle/create_form/'); ?>">
        <button type="button" class="btn btn-success btn-lg right" > 
            <i class="fa  fa-plus" id="color_main_icon"></i> <b><?php echo_line('action_insert'); ?>employeejobtitle </b>
        </button>
    </a>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-th-list" id="color_main_icon"></i> <b>employeejobtitle </b>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>seq</th>
                                <th> emp_id </th>
                                <th> job_title_id </th>
                                <th> salaly </th>
                                <th> from_date </th>
                                <th class=""> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($employeejobtitle_list as $key => $employeejobtitle) { ?>
                                <tr class="odd gradeX">
                                    <td> <?php echo ($key + 1); ?> </td>
                                    <td> <?php echo $employeejobtitle->emp_id; ?> </td>
                                    <td> <?php echo $employeejobtitle->job_title_id; ?> </td>
                                    <td> <?php echo $employeejobtitle->salaly; ?> </td>
                                    <td> <?php echo $employeejobtitle->from_date; ?> </td>
                                    <td class="right col-lg-3">
                                        <div style="text-align: center">
                                            <a href="<?php echo admin_ms_site('employeejobtitle/retrieve/' . num_param_url_encode($employeejobtitle->emp_job_title_id)); ?>">
                                                <button type="button" class="btn btn-success"> ดูข้อมูล </button>
                                            </a>       

                                            <a href="<?php echo admin_ms_site('employeejobtitle/modify_form/' . num_param_url_encode($employeejobtitle->emp_job_title_id)); ?>">
                                                <button type="button" class="btn btn-primary"> แก้ไข </button>
                                            </a>

                                            <button id="<?php echo num_param_url_encode($employeejobtitle->emp_job_title_id) ?>" type="button" class="btn btn-danger del-data" data-toggle="modal" data-target="#myModal"> ลบ </button>                                    
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="container">
    <!-- Modal -->
    <form role="form" action="<?php echo admin_ms_site('employeejobtitle/remove'); ?>" method="post">
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">ยืนยันการลบ</h4>
                    </div>
                    <div class="modal-body">
                        <p>คุณต้องการลบข้อมูลนี้หรือไม่ ?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden"  name="emp_job_title_id" id="emp_job_title_id">
                        <button type="submit" id="confirm-delete" class="btn btn-danger "> ลบ </button>
                        <button type="button"  class="btn btn-warning" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


