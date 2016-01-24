<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('design/component/common/meta'); ?>
        <title>SB Admin 2 - Bootstrap Admin Theme</title>
        <?php $this->load->view('design/component/common/import_css'); ?>

    </head>
    <body>
        <div id="wrapper">
            <?php $this->load->view('design/component/template/admin_template/header'); ?>
            <?php $this->load->view('design/component/template/admin_template/navigation'); ?>
            <div id="page-wrapper">
                <?php foreach ($page_section as $section): ?>
                    <?php $this->load->view($section); ?>
                <?php endforeach; ?>
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        <?php $this->load->view('design/component/common/import_js'); ?>

        <?php
        foreach ($javascript as $script):
            $this->load->view($script);
        endforeach;
        ?>
    </body>
</html>