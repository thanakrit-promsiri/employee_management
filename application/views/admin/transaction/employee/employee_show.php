<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<br><br>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa  fa-search" id="color_main_icon"></i> <b><?php echo_line('action_insert'); ?>employee</b>
            </div>
            <div class="panel-body">
                <?php if ($save_success == 'success') { ?>
                    <div class="alert alert-success  col-lg-6">
                        การบันทึกข้อมูลสำเร็จแล้ว
                    </div>
                    <div style="clear: both"></div>
                <?php } ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="dataTables-example" class="table table-striped table-bordered table-hover">
                                <tbody>
                                    <tr class="odd gradeA">
                                        <th align=""> <?php echo get_line('emp_code'); ?> </th>
                                        <td>
                                            <span id="emp_id"> {emp_code} </span>
                                        </td>
                                        <td rowspan="10" align="center">
                                            <img src="<?php echo image_url(); ?>{image}" width="150">
                                        </td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <th> <?php echo get_line('fname_en'); ?> </th>
                                        <td>
                                            {fname_en}  {lname_en}
                                        </td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <th> <?php echo get_line('position'); ?> </th>
                                        <td>
                                            {position_name}
                                        </td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <th> <?php echo_line('department'); ?> </th>
                                        <td>
                                            <span id="nickname"> {dep_name} </span>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <th> <?php echo_line('company'); ?></th>
                                        <td>
                                            <span id="nickname"> {company_name} </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="tab-content">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#home" data-toggle="tab"> <?php echo_line('about'); ?> </a>
                                    </li>
                                    <li class="">
                                        <a href="#address" data-toggle="tab"> <?php echo_line('address'); ?></a>
                                    </li>
                                </ul>
                                <div class="tab-pane fade active in" id="home">
                                    <table width="100%" border="0" class="table table-striped table-bordered table-hover">
                                        <tbody>
                                            <tr class="odd gradeA">
                                                <th>
                                                    <?php echo_line('fname_th'); ?>
                                                </th>
                                                <td>
                                                    {fname_th}  {lname_th}
                                                </td>
                                                <th>
                                                    <?php echo_line('fname_en'); ?>
                                                </th>
                                                <td>
                                                    {fname_en}  {lname_en}
                                                </td>
                                            </tr>
                                            <tr class="odd gradeA">
                                                <th>
                                                    <?php echo_line('nickname'); ?>
                                                </th>
                                                <td>
                                                    {nickname}
                                                </td>
                                                <th>
                                                    <?php echo_line('birthday'); ?>
                                                </th>
                                                <td>
                                                    {birthday}
                                                </td>
                                            </tr>
                                            <tr class="odd gradeA">
                                                <th align="">
                                                    <?php echo_line('gender'); ?>
                                                </th>
                                                <td>
                                                    <?php echo ($gender =='m')?'ชาย':'หญิง'; ?>
                                                </td>
                                                <th align="">
                                                    <?php echo_line('blood'); ?>
                                                </th>
                                                <td>
                                                    {blood}
                                                </td>
                                            </tr>
                                            <tr class="odd gradeA">
                                                <th>
                                                    <?php echo_line('mobile'); ?>
                                                </th>
                                                <td>
                                                    {mobile}
                                                </td>
                                                <th>
                                                    <?php echo_line('email'); ?>
                                                </th>
                                                <td>
                                                    {email}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="address">
                                    <div id="address_div">
                                        <table id="dataTables-example" class="table table-striped table-bordered table-hover">
                                            <tbody>
                                                <tr class="odd gradeA">
                                                    <th colspan="6">
                                                        <?php echo_line('current_address'); ?>
                                                    </th>
                                                </tr>
                                                <tr class="odd gradeA">
                                                    <th>
                                                        <?php echo_line('province'); ?>
                                                    </th>
                                                    <td>
                                                        {province_name}
                                                    </td>
                                                    <th>
                                                        <?php echo_line('district'); ?>
                                                    </th>
                                                    <td>
                                                        {district}
                                                    </td>
                                                    <th>
                                                        <?php echo_line('subdistrict'); ?>
                                                    </th>
                                                    <td>
                                                        {subdistrict}
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeA">
                                                    <th align="">ที่อยู่</th>
                                                    <td colspan="3">
                                                        <span id="home_no"> {addr_detail} </span>
                                                    </td>
                                                    <td>
                                                        <?php echo_line('mobile'); ?>
                                                    </td>
                                                    <td>
                                                        {tel}
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeA">
                                                    <th>
                                                        <?php echo_line('country'); ?>
                                                    </th>
                                                    <td>
                                                        {country}
                                                    </td>
                                                    <th>
                                                        <?php echo_line('latitude'); ?>
                                                    </th>
                                                    <td>
                                                        {latitude}
                                                    </td>
                                                    <th>
                                                        <?php echo_line('longtitude'); ?>
                                                    </th>
                                                    <td>
                                                        {logitude}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table id="dataTables-example" class="table table-striped table-bordered table-hover">
                                            <tbody>
                                            <tr class="odd gradeA">
                                                <th colspan="6">
                                                    <?php echo_line('current_address'); ?>
                                                </th>
                                            </tr>
                                            <tr class="odd gradeA">
                                                <th>
                                                    <?php echo_line('province'); ?>
                                                </th>
                                                <td>
                                                    {province_name2}
                                                </td>
                                                <th>
                                                    <?php echo_line('district'); ?>
                                                </th>
                                                <td>
                                                    {district2}
                                                </td>
                                                <th>
                                                    <?php echo_line('subdistrict'); ?>
                                                </th>
                                                <td>
                                                    {subdistrict2}
                                                </td>
                                            </tr>
                                            <tr class="odd gradeA">
                                                <th align="">ที่อยู่</th>
                                                <td colspan="3">
                                                    <span id="home_no"> {addr_detail2} </span>
                                                </td>
                                                <td>
                                                    <?php echo_line('mobile'); ?>
                                                </td>
                                                <td>
                                                    {tel2}
                                                </td>
                                            </tr>
                                            <tr class="odd gradeA">
                                                <th>
                                                    <?php echo_line('country'); ?>
                                                </th>
                                                <td>
                                                    {country2}
                                                </td>
                                                <th>
                                                    <?php echo_line('latitude'); ?>
                                                </th>
                                                <td>
                                                    {latitude2}
                                                </td>
                                                <th>
                                                    <?php echo_line('longtitude'); ?>
                                                </th>
                                                <td>
                                                    {logitude2}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>

                                    <div align="center" id="smile" style="display: none;"> <br><br><i class="fa fa-smile-o fa-5x"></i> <br><br><b>ไม่มีข้อมูลอยู่ในระบบ</b></div><br><br>
                                </div>
                            </div>
                            <a href="<?php echo admin_tr_site('employee/'); ?>">
                                <button type="button" class="btn btn-primary"> กลับ </button>
                            </a>

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

