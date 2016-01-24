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
                <a href="<?php echo_site_example(); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>

            <li class="active">
                <a href="#">
                    <i class="fa fa-bar-chart-o fa-fw"></i> จัดการข้อมูลจังหวัด
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse in" aria-expanded="true">
                    <li>
                        <a href="<?php echo_site('province'); ?>"> ข้อมูลจังหวัด </a>
                    </li>
                    <li>
                        <a href="<?php echo_site('province/form'); ?>"> เพิ่มข้อมูลจังหวัด </a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo_site_example('flot'); ?>">Flot Charts</a>
                    </li>
                    <li>
                        <a href="<?php echo_site_example('morris'); ?>">Morris.js Charts</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="<?php echo_site_example('tables'); ?>"><i class="fa fa-table fa-fw"></i> Tables</a>
            </li>
            <li>
                <a href="<?php echo_site_example('forms'); ?>"><i class="fa fa-edit fa-fw"></i> Forms</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo_site_example('panels_wells'); ?>">Panels and Wells</a>
                    </li>
                    <li>
                        <a href="<?php echo_site_example('buttons'); ?>">Buttons</a>
                    </li>
                    <li>
                        <a href="<?php echo_site_example('notifications'); ?>">Notifications</a>
                    </li>
                    <li>
                        <a href="<?php echo_site_example('typography'); ?>">Typography</a>
                    </li>
                    <li>
                        <a href="<?php echo_site_example('icons'); ?>"> Icons</a>
                    </li>
                    <li>
                        <a href="<?php echo_site_example('grid'); ?>">Grid</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
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
                        <!-- /.nav-third-level -->
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo_site_example('blank'); ?>">Blank Page</a>
                    </li>
                    <li>
                        <a href="<?php echo_site_example('login'); ?>">Login Page</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>


<!-- end tua-->