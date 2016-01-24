<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div style="clear: both"></div>
<br>
<div style="clear: both"></div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-edit" id="color_main_icon"></i> <b> <?php echo_line($action); ?> <?php echo_line('title_employee'); ?>  </b>
            </div>
            <div class="panel-body">
                <?php if (isset($error_msg)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $error_msg; ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" action="<?php echo admin_tr_site('employee/save'); ?>" method="post" enctype="multipart/form-data">
                            <?php if (isset($emp_id)) { ?>
                                <input type="hidden" id="emp_id" name="emp_id" value="<?php echo (num_param_url_encode($emp_id)) ?>">
                                <input type="hidden" id="addr_id" name="addr_id" value="<?php echo (num_param_url_encode($addr_id)) ?>">
                                <input type="hidden" id="addr_id2" name="addr_id2" value="<?php echo (num_param_url_encode($addr_id2)) ?>">
                                <input type="hidden" id="emp_addr_id" name="emp_addr_id" value="<?php echo (num_param_url_encode($emp_addr_id)) ?>">
                            <?php }else{ ?>
                                <input type="hidden" id="addr_id" name="addr_id" value="">
                            <?php } ?>


                            <div class="panel-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#main" data-toggle="tab"> <?php echo_line('data_emp'); ?> </a>
                                    </li>
                                    <li>
                                        <a href="#add1" data-toggle="tab"> <?php echo_line('address'); ?> </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="main">
                                        <!-- Tab1 -->
                                        <br>
                                        <table width="100%" border="0" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <tbody>
                                                <tr class="odd gradeA">
                                                    <td>
                                                        <?php echo get_line('emp_code'); ?>
                                                        <input class="form-control numberonly" placeholder="<?php echo_line('placeholder_emp_code'); ?>" name="emp_code" id="emp_code" value="{emp_code}" type="text" required="" autofocus="" maxlength="5">
                                                    </td>

                                                    <td>
                                                        <?php echo_line('pfname'); ?>
                                                        <select class="form-control" id="pfname" name="pfname" required="" autofocus="">
                                                            <option value="นาย"> นาย </option>
                                                            <option value="นาง"> นาง </option>
                                                            <option value="นางสาว"> นางสาว </option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <?php echo_line('fname_th'); ?>
                                                        <input class="form-control" placeholder="<?php echo_line('placeholder_fname_th'); ?>" name="fname_th" id="fname_th" value="{fname_th}" type="text" required="" autofocus="" maxlength="50">
                                                    </td>
                                                    <td>
                                                        <?php echo_line('lname_th'); ?>
                                                        <input class="form-control" placeholder="<?php echo_line('placeholder_lname_th'); ?>" name="lname_th" id="lname_th" value="{lname_th}" type="text" required="" autofocus="" maxlength="50">
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeA">
                                                    <td>
                                                        <?php echo_line('fname_en'); ?>
                                                        <input class="form-control" placeholder="<?php echo_line('placeholder_fname_en'); ?>" name="fname_en" id="fname_en" value="{fname_en}" type="text" required="" autofocus="" maxlength="50">
                                                    </td>
                                                    <td>
                                                        <?php echo_line('lname_en'); ?>
                                                        <input class="form-control" placeholder="<?php echo_line('placeholder_lname_en'); ?>" name="lname_en" id="lname_en" value="{lname_en}" type="text" required="" autofocus="" maxlength="50">
                                                    </td>
                                                    <td>
                                                        <?php echo_line('nickname'); ?>
                                                        <input class="form-control" placeholder="<?php echo_line('placeholder_nickname'); ?>" name="nickname" id="nickname" value="{nickname}" type="text" required="" autofocus="" maxlength="50">
                                                    </td>
                                                    <td>
                                                        <?php echo_line('cityzen'); ?>
                                                        <input class="form-control numberonly" placeholder="" name="cityzen_id" id="cityzen_id" value="{cityzen_id}" type="text" required="" autofocus="" maxlength="13">
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeA">
                                                    <td>
                                                        <?php echo_line('gender'); ?>
                                                        <input class="radio-control" type="radio" name="gender" id="m" value="m" required="" autofocus="" checked>&nbsp; ชาย
                                                        <input class="radio-control" type="radio" name="gender" id="f" value="f" required="" autofocus="">&nbsp; หญิง</td>
                                                    <td>
                                                        <?php echo_line('birthday'); ?>
                                                        <input class="form-control"  name="birthday" id="birthday" value="{birthday}" type="date" required="" autofocus="">
                                                    </td>
                                                    <td>
                                                        <?php echo_line('blood'); ?>
                                                        <select class="form-control" id="blood" name="blood" autofocus="" required="">
                                                            <option value="" required=""> <?php echo_line('select_blood'); ?> </option>
                                                            <option value="A">A</option>
                                                            <option value="B">B</option>
                                                            <option value="O">O</option>
                                                            <option value="AB">AB</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <?php echo_line('mobile'); ?>
                                                        <input class="form-control" placeholder="<?php echo_line('placeholder_mobile'); ?>" name="mobile" id="mobile" value="{mobile}" type="text" required="" autofocus="" maxlength="60">
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeA">
                                                    <td colspan="2">
                                                        <?php echo_line('email'); ?>
                                                        <input class="form-control" placeholder="<?php echo_line('placeholder_email'); ?>" name="email" id="email" value="{email}" type="email" required="" autofocus="" maxlength="80">
                                                    </td>
                                                    <td colspan="2">
                                                        <?php echo_line('password'); ?>
                                                        <input class="form-control" placeholder="<?php echo_line('placeholder_password'); ?>" name="passwd" id="passwd" value="{passwd}" type="password" required="" autofocus="" maxlength="100">
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeA">
                                                    <td>
                                                        <?php echo_line('company'); ?>
                                                        <select class="form-control" id="company_id" name="company_id" required="" autofocus="">
                                                            <option value=""> <?php echo_line('select_company'); ?> </option>
                                                            <?php foreach($company_list as $company_key => $company_value){ ?>
                                                                <option value="<?php echo num_param_url_encode($company_value->company_id); ?>"> <?php echo $company_value->company_name; ?> </option>
                                                            <?php } ?>
                                                        </select>

                                                    </td>
                                                    <td>
                                                        <?php echo_line('department'); ?>
                                                        <select class="form-control" id="dep_id" name="dep_id" required="" autofocus="">
                                                            <option value="">  <?php echo_line('select_department'); ?> </option>
                                                            <?php foreach($department_list as $department_key => $department_value){ ?>
                                                                <option value="<?php echo num_param_url_encode($department_value->dep_id); ?>"> <?php echo $department_value->dep_name; ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                    <td colspan="2">
                                                        <?php echo_line('position'); ?>
                                                        <select class="form-control" id="position_id" name="position_id" required="" autofocus="">
                                                            <option value=""> <?php echo_line('select_position'); ?> </option>
                                                            <?php foreach($position_list as $position_key => $position_value){ ?>
                                                                <option value="<?php echo num_param_url_encode($position_value->position_id); ?>"> <?php echo $position_value->position_name; ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <?php echo_line('hiredate'); ?>
                                                        <input class="form-control" name="hire_date" id="hire_date" value="{hire_date}" type="date" required="" autofocus="">
                                                    </td>
                                                    <td colspan="2">
                                                        <?php echo_line('resigndate'); ?>
                                                        <input class="form-control" name="resign_date" id="resign_date" value="{resign_date}" type="date" autofocus="">
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeA">
                                                    <td colspan="4" align="left">
                                                        <i class="glyphicon glyphicon-plus fa-1x" id="color_icon"></i>
                                                        <span> <?php echo_line('profile_image'); ?> </span>
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100px; height: 100px; line-height: 90px;">
                                                                    <?php $path = ($image == '')?base_image().'/no_image.png' : image_url().'/'.$image; ?>
                                                                    <img src="<?php echo $path; ?>" alt="">
                                                                </div>

                                                                <div>
                                                                <span class="btn btn-default btn-file">
                                                                    <span class="fileinput-new"> <?php echo_line('select_image'); ?> </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file" name="userfile" id="userfile" size="20" required="">
                                                                    <input type="hidden" name="image_path" value="{image}">
                                                                </span>
                                                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                    <?php echo_line('limite_image'); ?>
                                                                </div>

                                                            </div>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- End Tab1--> </div>
                                    <div class="tab-pane fade" id="add1">
                                        <br>
                                        <!-- Start Tab2 -->
                                        <table width="100%" border="0" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <tbody>
                                                <tr>
                                                    <td colspan="4">
                                                        <b><?php echo_line('current_address'); ?></b>
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeA">
                                                    <td>
                                                        <?php echo_line('province'); ?>
                                                        <select class="form-control" id="province_id" name="province_id" autofocus="" required="">
                                                            <option value=""> <?php echo_line('select_province'); ?> </option>
                                                            <?php foreach($province_list as $province_kery => $province_value){ ?>
                                                                <option value="<?php echo num_param_url_encode($province_value->province_id); ?>"> <?php echo $province_value->province_name; ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <?php echo_line('district'); ?>
                                                        <input class="form-control" placeholder="<?php echo_line('placeholder_district'); ?>" name="district" id="district" value="{district}" type="text" required="" autofocus="" maxlength="50">
                                                    </td>
                                                    <td>
                                                        <?php echo_line('subdistrict'); ?>
                                                        <input class="form-control" placeholder="<?php echo_line('placeholder_subdistrict'); ?>" name="subdistrict" id="subdistrict" value="{subdistrict}" type="text" required="" autofocus="" maxlength="50">
                                                    </td>
                                                    <td>
                                                        <?php echo_line('postcode'); ?>
                                                        <input class="form-control" placeholder="<?php echo_line('placeholder_postcode'); ?>" name="post_code" id="post_code" value="{post_code}" type="text" required="" autofocus="" maxlength="5">
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeA">
                                                    <td colspan="4">
                                                        <?php echo_line('address_detail'); ?>
                                                        <input class="form-control" placeholder="<?php echo_line('placeholder_add_detail'); ?>" name="addr_detail" id="addr_detail" value="{addr_detail}" type="text" required="" autofocus="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <?php echo_line('telphone'); ?>
                                                        <input class="form-control" placeholder="<?php echo_line('placeholder_tel'); ?>" name="tel" id="tel" value="{tel}" type="text" required="" autofocus="" maxlength="10">
                                                    </td>
                                                    <td colspan="2">
                                                        <?php echo_line('country'); ?>
                                                        <input class="form-control" placeholder="<?php echo_line('placeholder_country'); ?>" name="country" id="country" value="{country}" type="text" required="" autofocus="" maxlength="45">
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeA">
                                                    <td colspan="2">
                                                        <?php echo_line('latitude'); ?>
                                                        <input class="form-control" placeholder="<?php echo_line('placeholder_latitude'); ?>" name="latitude" id="latitude" value="{latitude}" type="text" maxlength="45">
                                                    </td>
                                                    <td colspan="2">
                                                        <?php echo_line('longtitude'); ?>
                                                        <input class="form-control" placeholder="<?php echo_line('placeholder_longtitude'); ?>" name="logitude" id="logitude" value="{logitude}" type="text" maxlength="45">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table width="100%" border="0" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <tbody>
                                            <tr>
                                                <td colspan="4">
                                                    <b><?php echo_line('physical_address'); ?></b>
                                                </td>
                                            </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <input type="checkbox" name="duplicate" id="duplicate">
                                                        <font style="color:#278927;"> <?php echo_line('duplicate'); ?> </font>
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeA">
                                                    <td>
                                                        <?php echo_line('province'); ?>
                                                        <select class="form-control" id="province_id2" name="physical.province_id" autofocus="" required="">
                                                            <option value=""> <?php echo_line('select_province'); ?> </option>
                                                            <?php foreach($province_list as $province_kery => $province_value){ ?>
                                                                <option value="<?php echo num_param_url_encode($province_value->province_id); ?>"> <?php echo $province_value->province_name; ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <?php $two = ($emp_id == '')?'':'2'; ?>
                                                        <?php echo_line('district'); ?>
                                                        <input class="form-control" placeholder="<?php echo_line('placeholder_district'); ?>" name="physical.district" id="district2" value="<?php echo getFile('district',$emp_id); ?>" type="text" required="" autofocus="" maxlength="50">
                                                    </td>
                                                    <td>
                                                        <?php echo_line('subdistrict'); ?>
                                                        <input class="form-control" placeholder="<?php echo_line('placeholder_subdistrict'); ?>" name="physical.subdistrict" id="subdistrict2" value="<?php echo getFile('subdistrict',$emp_id); ?>" type="text" required="" autofocus="" maxlength="50">
                                                    </td>
                                                    <td>
                                                        <?php echo_line('postcode'); ?>
                                                        <input class="form-control" placeholder="<?php echo_line('placeholder_postcode'); ?>" name="physical.post_code" id="post_code2" value="<?php echo getFile('post_code',$emp_id); ?>" type="text" required="" autofocus="" maxlength="5">
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeA">
                                                    <td colspan="4">
                                                        <?php echo_line('address_detail'); ?>
                                                        <input class="form-control" placeholder="<?php echo_line('placeholder_add_detail'); ?>" name="physical.addr_detail" id="addr_detail2" value="<?php echo getFile('addr_detail',$emp_id); ?>" type="text" required="" autofocus="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <?php echo_line('telphone'); ?>
                                                        <input class="form-control" placeholder="<?php echo_line('placeholder_tel'); ?>" name="physical.tel" id="tel2" value="<?php echo getFile('tel',$emp_id); ?>" type="text" required="" autofocus="" maxlength="10" maxlength="10">
                                                    </td>
                                                    <td colspan="2">
                                                        <?php echo_line('country'); ?>
                                                        <input class="form-control" placeholder="<?php echo_line('placeholder_country'); ?>" name="physical.country" id="country2" value="<?php echo getFile('country',$emp_id); ?>" type="text" required="" autofocus="" maxlength="45">
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeA">
                                                    <td colspan="2">
                                                        <?php echo_line('latitude'); ?>
                                                        <input class="form-control" placeholder="<?php echo_line('placeholder_latitude'); ?>" name="physical.latitude" id="latitude2" value="<?php echo getFile('latitude',$emp_id); ?>" type="text" maxlength="45" valu="{">
                                                    </td>
                                                    <td colspan="2">
                                                        <?php echo_line('longtitude'); ?>
                                                        <input class="form-control" placeholder="<?php echo_line('placeholder_longtitude'); ?>" name="physical.logitude" id="logitude2" value="<?php echo getFile('logitude',$emp_id); ?>" type="text" maxlength="45">
                                                    </td> <?php   ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <div align="center">
                                <button type="submit" class="btn btn-success"> <?php echo_line('button_insert'); ?> </button>
                                <button type="reset" class="btn btn-warning"> <?php echo_line('button_cancel'); ?> </button>
                            </div>
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
<?php
function getFile($file,$emp_id){
    $data = ($emp_id != '')?$file.'2' : $file;
    return '{'.$data.'}';
}
?>
