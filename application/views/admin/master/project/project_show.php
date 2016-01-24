<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<br><br>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa  fa-search" id="color_main_icon"></i> <b><?php echo_line('project'); ?></b>
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
                                        <th><?php echo_line('project_name'); ?></th>
                                        <td>{project_name}</td>                                          
                                    </tr>
                                    
                                    <tr>
                                        <th><?php echo_line('address_project'); ?></th>
                                        <td>{subdistrict} &nbsp; {district} &nbsp; {post_code}  &nbsp; {province_name} &nbsp; {tel}</td>                                          
                                    </tr>

<!--                                            <tr> -->
<!--                                         <th>เบอร์โทรศัพท์โครงการ </th> -->
<!--                                         <td>{tel}</td>                                           -->
<!--                                     </tr> -->
                                    
                                  

                                    <tr>
                                        <th><?php echo_line('start_date'); ?></th>
                                        <td>{start_date}</td>                                          
                                    </tr>

                                    <tr>
                                        <th><?php echo_line('end_date'); ?></th>
                                        <td>{end_date}</td>                                          
                                    </tr>

                                    <tr>
                                        <th><?php echo_line('project_detail'); ?></th>
                                        <td>{detail}</td>                                          
                                    </tr>

                             
                                    
                                    <tr class="odd gradeA">
                                        <td colspan="2" align="center">   
                                            <a href="<?php echo admin_ms_site('project/'); ?>">
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

