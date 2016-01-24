<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<br><br>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa  fa-search" id="color_main_icon"></i> <b><?php echo_line('action_insert'); ?>address</b>
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
                                        <th>province_id</th>
                                        <td>{province_id}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>district</th>
                                        <td>{district}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>subdistrict</th>
                                        <td>{subdistrict}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>post_code</th>
                                        <td>{post_code}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>addr_detail</th>
                                        <td>{addr_detail}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>tel</th>
                                        <td>{tel}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>country</th>
                                        <td>{country}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>latitude</th>
                                        <td>{latitude}</td>                                          
                                    </tr>

                                    <tr>
                                        <th>logitude</th>
                                        <td>{logitude}</td>                                          
                                    </tr>

                                    
                                    <tr class="odd gradeA">
                                        <td colspan="2" align="center">   
                                            <a href="<?php echo admin_tr_site('address/'); ?>">
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

