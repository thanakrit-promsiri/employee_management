<!-- Bootstrap Core CSS -->
<link href="<?php echo base_css('bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
<!-- MetisMenu CSS -->
<link href="<?php echo base_css('metisMenu.min.css') ?>" rel="stylesheet" type="text/css">
<!-- Social Buttons CSS -->
<link href="<?php echo base_css('bootstrap-social.css') ?>" rel="stylesheet" type="text/css">
<!-- Timeline CSS -->
<link href="<?php echo base_css('timeline.css') ?>" rel="stylesheet" type="text/css">
<!-- DataTables CSS -->
<link href="<?php echo base_css('dataTables.bootstrap.css') ?>" rel="stylesheet" type="text/css">
<!-- DataTables Responsive CSS -->
<link href="<?php echo base_css('dataTables.responsive.css') ?>" rel="stylesheet" type="text/css">
<!-- Custom CSS -->
<link href="<?php echo base_css('sb-admin-2.css') ?>" rel="stylesheet" type="text/css">
<!-- Morris Charts CSS -->
<link href="<?php echo base_css('morris.css') ?>" rel="stylesheet" type="text/css">
<!-- Custom Fonts -->
<link href="<?php echo base_css('font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
<!--<link href="<?php echo base_css('poonnut-style.css') ?>" rel="stylesheet" type="text/css">-->

<?php foreach ($css_file as $value) { ?>
    <link href="<?php echo base_css($value); ?>" rel="stylesheet" type="text/css">
    <?php
}
?>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->