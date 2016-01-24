<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<br>
<div class="right">
    <a href="<?php echo admin_ms_site('project/create_form/'); ?>">
        <button type="button" class="btn btn-success btn-lg right" > 
            <i class="fa  fa-plus" id="color_main_icon"></i> <b><?php echo_line('action_insert'); ?><?php echo_line('project'); ?> </b>
        </button>
    </a>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-th-list" id="color_main_icon"></i> <b>โครงการ </b>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th> <?php echo_line('project_name'); ?> </th>
                                <th> <?php echo_line('address_project'); ?></th>
<!--                                 <th> เบอร์โทรศัพท์โครงการ </th> -->
                                <th> <?php echo_line('start_date'); ?> </th>
                                <th> <?php echo_line('end_date'); ?> </th>
                                <th> <?php echo_line('project_detail'); ?></th>
                                
                                <th class=""> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($project_list as $key => $project) { ?>
                                <tr class="odd gradeX">
                                    <td> <?php echo ($key + 1); ?> </td>
                                    <td> <?php echo $project->project_name; ?> </td>
                                    <td> <?php echo $project->subdistrict. ' ' . $project->district. ' '.$project->province_name. ' ' .$project->post_code . ' <br/>' .$project->tel; ?> </td>
<!--                                     <td> -->
                                     <?php //echo $project->tel; ?> 
<!--                                      </td> -->
                                    <td> <?php echo $project->start_date; ?> </td>
                                    <td> <?php echo $project->end_date; ?> </td>
                                    <td> <?php echo $project->detail; ?> </td>
                                    
                                    <td class="right col-lg-3">
                                        <div style="text-align: center">
                                            <a href="<?php echo admin_ms_site('project/retrieve/' . num_param_url_encode($project->project_id)); ?>">
                                                <button type="button" class="btn btn-success"> ดูข้อมูล </button>
                                            </a>       

                                            <a href="<?php echo admin_ms_site('project/modify_form/' . num_param_url_encode($project->project_id)); ?>">
                                                <button type="button" class="btn btn-primary"> แก้ไข </button>
                                            </a>

                                            <button id="<?php echo num_param_url_encode($project->project_id) ?>" type="button" class="btn btn-danger del-data" data-toggle="modal" data-target="#myModal"> ลบ </button>                                    
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
    <form role="form" action="<?php echo admin_ms_site('project/remove'); ?>" method="post">
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
                        <input type="hidden"  name="project_id" id="project_id">
                        <button type="submit" id="confirm-delete" class="btn btn-danger "> ลบ </button>
                        <button type="button"  class="btn btn-warning" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


