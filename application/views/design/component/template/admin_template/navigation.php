<!-- begin tua-->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="<?php echo site_url(); ?>"><i class="fa fa-dashboard fa-fw"></i> <?php echo_line('menu_dashboard'); ?></a>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-cogs"></i>
                    <?php echo_line('manage_date_basic'); ?>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">

                    <li>
                        <a href="<?php echo admin_ms_site('companyholidays'); ?>"> <?php echo_line('menu_holiday'); ?> </a>
                    <li>

                    <li>
                        <a href="<?php echo admin_ms_site('company'); ?>"> <?php echo_line('menu_company'); ?> </a>
                    <li>

                    <li>
                        <a href="<?php echo admin_tr_site('department'); ?>"> <?php echo_line('menu_department'); ?> </a>
                    <li>

                    <li>
                        <a href="<?php echo admin_ms_site('position'); ?>"> <?php echo_line('menu_position'); ?> </a>
                    <li>

                    <li>
                        <a href="<?php echo admin_ms_site('province'); ?>"> <?php echo_line('menu_province'); ?> </a>
                    <li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-user fa-fw"></i>
                    <?php echo_line('manage_data_employee'); ?>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="<?php echo admin_tr_site('employee'); ?>"> <?php echo_line('menu_employee'); ?> </a>
                    <li>
                    
                    <li>
                        <a href="<?php echo admin_tr_site('employeejobtitle'); ?>"> <?php echo_line('menu_jobtitle'); ?> </a>
                    <li>

                    <li>
                        <a href="<?php echo admin_tr_site('supervisor'); ?>"> <?php echo_line('menu_supervisor'); ?> </a>
                    <li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-paper-plane"></i>
                    <?php echo_line('manage_leave'); ?>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="<?php echo admin_tr_site('leave'); ?>"> <?php echo_line('menu_request_leave'); ?> </a>
                    <li>

                    <li>
                        <a href="<?php echo admin_tr_site('emaillist'); ?>"> <?php echo_line('menu_emaillist'); ?> </a>
                    <li>

                    <li>
                        <a href="<?php echo admin_tr_site('#'); ?>"> <?php echo_line('menu_approve'); ?> </a>
                    <li>

                    <li>
                        <a href="<?php echo admin_tr_site('#'); ?>"> <?php echo_line('menu_listofleave'); ?> </a>
                    <li>

                    <li>
                        <a href="<?php echo admin_ms_site('typeleave'); ?>"> <?php echo_line('menu_typeleave'); ?> </a>
                    <li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-file-excel-o"></i>
                    <?php echo_line('manage_timesheet'); ?>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">

                    <li>
                        <a href="<?php echo admin_ms_site('teammember'); ?>"> <?php echo_line('menu_teammember'); ?> </a>
                    <li>

                    <li>
                        <a href="<?php echo admin_tr_site('timesheet'); ?>"> <?php echo_line('menu_timesheet'); ?> </a>
                    <li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-bar-chart"></i>
                    <?php echo_line('manage_dailyprogress'); ?>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="<?php echo admin_ms_site('project'); ?>"> <?php echo_line('menu_project'); ?> </a>
                    <li>

                    <li>
                        <a href="<?php echo admin_tr_site('employeeinproject'); ?>"> <?php echo_line('menu_empinproject'); ?> </a>
                    <li>

                    <li>
                        <a href="<?php echo admin_tr_site('imageprogressdailyreport'); ?>"> <?php echo_line('menu_image'); ?> </a>
                    <li>

                    <li>
                        <a href="<?php echo admin_ms_site('jobtitle'); ?>"> <?php echo_line('menu_jobtitle'); ?>ี่ </a>
                    <li>

                    <li>
                        <a href="<?php echo admin_tr_site('manpower'); ?>"> <?php echo_line('menu_manpower'); ?> </a>
                    <li>

                    <li>
                        <a href="<?php echo admin_tr_site('progressdailyreport'); ?>"> <?php echo_line('menu_inprogress'); ?> </a>
                    <li>

                    <li>
                        <a href="<?php echo admin_ms_site('weather'); ?>"> <?php echo_line('menu_weather'); ?> </a>
                    <li>
                    <li>
                        <a href="<?php echo admin_ms_site('typeprogress'); ?>"> <?php echo_line('menu_typeinprogress'); ?> </a>
                    <li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-wrench"></i>
                    <?php echo_line('manage_role'); ?>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="<?php echo admin_ms_site('role'); ?>"> <?php echo_line('menu_role'); ?> </a>
                    <li>

                    <li>
                        <a href="<?php echo admin_tr_site('roleurllist'); ?>"> <?php echo_line('menu_rolelist'); ?> </a>
                    <li>

                    <li>
                        <a href="<?php echo admin_tr_site('roleuser'); ?>"> <?php echo_line('menu_roleuser'); ?> </a>
                    <li>

                    <li>
                        <a href="<?php echo admin_ms_site('urllist'); ?>"> <?php echo_line('menu_roleurl'); ?> </a>
                    <li>

                    <li>
                        <a href="<?php echo admin_tr_site('user'); ?>"> <?php echo_line('menu_user'); ?> </a>
                    <li>

                </ul>
            </li>


            <!--            <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                     /.nav-third-level 
                                </li>
                            </ul>
                             /.nav-second-level 
                        </li>           -->

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>


<!-- end tua-->