<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div style="clear: both"></div>
<br>
<div style="clear: both"></div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-edit" id="color_main_icon"></i> <b> <?php echo_line($action); ?>address_form </b>
            </div>
            <div class="panel-body">
                <?php if (isset($error_msg)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $error_msg; ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="<?php echo admin_tr_site('address/save'); ?>" method="post">
                            <?php if (isset($addr_id)) { ?>
                                <input type="hidden" id="addr_id" name="addr_id" value="<?php echo (num_param_url_encode($addr_id)) ?>">
                            <?php } ?>  

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <tbody>
                                    <tr class="odd gradeA">
                                        <td align="center"> province_id </td>
                                        <td></td>

                                        <td>
<!--                                             <input class="form-control" placeholder="กรอกprovince_id" name="province_id" id="province_id" value="{province_id}" type="text" required="" autofocus=""> -->
                                                <select class="form-control" name="province_id" id="province_id">
                                                		
                                                		<?php  foreach ($province_list as $key => $province){ ?>
                                                		
                                                		<option value="<?= $province->province_id ?>"><?= $province->province_name ?></option>
                                                		
                                                		<?php 
																	}
                                                		?>
                                                </select>                                            
                                            </td>
                                        <td></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> district </td>
                                        <td>
                                            </td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> subdistrict </td>
                                        <td>
                                            </td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> post_code </td>
                                        <td>
                                            </td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> addr_detail </td>
                                        <td>
                                            </td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> tel </td>
                                        <td>
                                            </td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> country </td>
                                        <td>
                                            </td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> latitude </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกlatitude" name="latitude" id="latitude" value="{latitude}" type="text" required="" autofocus=""></td>
                                    </tr>

                                    <tr class="odd gradeA">
                                        <td align="center"> logitude </td>
                                        <td>
                                            <input class="form-control" placeholder="กรอกlogitude" name="logitude" id="logitude" value="{logitude}" type="text" required="" autofocus=""></td>
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

