<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div style="clear: both"></div>
<br>
<div style="clear: both"></div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-edit" id="color_main_icon"></i> <b> <?php echo_line($action); ?><?php echo_line('project'); ?></b>
            </div>
            <div class="panel-body">
                <?php if (isset($error_msg)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $error_msg; ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" action="<?php echo admin_ms_site('project/save'); ?>" method="post">
                            <?php if (isset($project_id)) { ?>
                                <input type="hidden" id="project_id" name="project_id" value="<?php echo (num_param_url_encode($project_id)) ?>">
                            <?php } ?>

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <tbody>

                                      <tr class="odd gradeA">
                                        <td align="center"><?php echo_line('project_name'); ?> </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกโครงการ" name="project_name" id="project_name" value="{project_name}" type="text" required="" autofocus="">
                                            </td>
                                            
                                          <td align="center"><?php echo_line('project_detail'); ?> </td>
                                        <td>
<!--                                             <input class="form-control" placeholder="กรอกรายละเอียดโครงการ " name="detail" id="detail" value="{detail}" type="text" required="" autofocus=""> -->
                                            <textarea class="form-control" rows="3" name="detail" id="detail" placeholder="กรอก<?php echo_line('project_detail'); ?>">{detail}</textarea>
                                            </td>
                                            
                                    </tr>

<!--                                     <tr class="odd gradeA"> -->
<!--                                         <td align="center"> ที่อยู่โครงการ  </td> -->
<!--                                         <td> -->
<!--                                             <input class="form-control" placeholder="กรอกที่อยู่โครงการ " name="addr_id" id="addr_id" value="{addr_id}" type="text" required="" autofocus=""></td> -->
<!--                                     </tr> -->

    						 <tr class="odd gradeA">
                                        <td align="center"> <?php echo_line('start_date'); ?> </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอก <?php echo_line('start_date'); ?> " name="start_date" id="start_date" value="{start_date}" type="date" required="" autofocus="">
                                            </td>
                                            
                                                 <td align="center">  <?php echo_line('end_date'); ?>  </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอก<?php echo_line('end_date'); ?>" name="end_date" id="end_date" value="{end_date}" type="date" required="" autofocus="">
                                            </td>
                                    </tr>
                               

                                  

                                

<!--                                     <tr class="odd gradeA"> -->
<!--                                         <td align="center"> เบอร์โทรศัพท์โครงการ   </td> -->
<!--                                         <td> -->
<!--                                             <input class="form-control" placeholder="กรอกเบอร์โทรศัพท์ " name="tel" id="tel" value="{tel}" type="text" required="" autofocus=""></td> -->
<!--                                     </tr> -->
                                    
                                         <tr class="odd gradeA">
                                        <td align="center"> <?php echo_line('subdistrict'); ?> </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอก<?php echo_line('subdistrict'); ?>" name="subdistrict" id="subdistrict" value="{subdistrict}" type="text" required="" autofocus="">
                                            </td>
                                                                   <td align="center"> <?php echo_line('district'); ?> </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอก<?php echo_line('district'); ?>" name="district" id="district" value="{district}" type="text" required="" autofocus="">
                                            </td>
                                    </tr>

                               
                             

                                    
                                          <tr class="odd gradeA">
                                     <?php if (isset($addr_id)) { ?>
                               					 <input type="hidden" id="addr_id" name="addr_id" value="<?php echo (num_param_url_encode($addr_id)) ?>">
                            		<?php } ?>
                                        <td align="center"> <?php echo_line('province_name'); ?></td>
                                        <td>
                                        		<input hidden="province_id_temp" id="province_id_temp" value="{province_id}"/>
<!--                                             <input class="form-control" placeholder="กรอกprovince_id" name="province_id" id="province_id" value="{province_id}" type="text" required="" autofocus=""> -->
                                                <select class="form-control" name="province_id" id="province_id">
                                                		
                                                		<?php  foreach ($province_list as $key => $province){ ?>
                                                		
                                                		<option value="<?= $province->province_id ?>"><?= $province->province_name ?></option>
                                                		
                                                		<?php 
																	}
                                                		?>
                                                </select>
                                            
                                            </td>
                                            
                                                <td align="center"> <?php echo_line('post_code'); ?> </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอก<?php echo_line('post_code'); ?>" name="post_code" id="post_code" value="{post_code}" type="text" required="" autofocus="">
                                            </td>
                                    </tr>
                                    
                                 

                                    <tr class="odd gradeA">
                                        <td align="center"> <?php echo_line('addr_detail'); ?> </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอก<?php echo_line('addr_detail'); ?>" name="addr_detail" id="addr_detail" value="{addr_detail}" type="text" required="" autofocus=""></td>
                                    
                                          <td align="center"> <?php echo_line('tel'); ?> </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอก<?php echo_line('tel'); ?>" name="tel" id="tel" value="{tel}" type="text" required="" autofocus="">
                                            </td>
                                    </tr>
                                    
                                

                            

                                    <tr class="odd gradeA">
                                        <td align="center"><?php echo_line('country'); ?> </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอก<?php echo_line('country'); ?>" name="country" id="country" value="{country}" type="text" required="" autofocus="">
                                            </td>
                                            <td align="center"> <?php echo_line('latitude'); ?>  </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอก<?php echo_line('latitude'); ?>" name="latitude" id="latitude" value="{latitude}" type="text" required="" autofocus="">
                                            </td>
                                    </tr>

                                   
                                    <tr class="odd gradeA">
                                        <td align="center"> <?php echo_line('logitude'); ?> </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอก<?php echo_line('logitude'); ?>" name="logitude" id="logitude" value="{logitude}" type="text" required="" autofocus="">
                                            </td>
                                    </tr>
                                    

                                    <tr class="odd gradeA">
                                        <td colspan="2" align="center">
                                            <button type="submit" class="btn btn-success">บันทึก</button>
                                            <button type="reset" class="btn btn-warning">ยกเลิก</button>
                                             <a href="<?php echo admin_ms_site('project/'); ?>">
                                                <button type="button" class="btn btn-primary"> กลับ </button>
                                            </a>
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
