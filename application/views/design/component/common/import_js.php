
<!-- jQuery -->
<script src="<?php echo base_js('jquery.min.js') ?>"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_js('bootstrap.min.js') ?>"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_js('metisMenu.min.js') ?>"></script>
<!-- Morris Charts JavaScript -->
<script src="<?php echo base_js('raphael-min.js') ?>"></script>
<!--<script src="<?php echo base_js('morris.min.js') ?>"></script>-->
<!--<script src="<?php echo base_js('morris-data.js') ?>"></script>-->
<!-- DataTables JavaScript -->
<script src="<?php echo base_js('jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_js('dataTables.bootstrap.min.js') ?>"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_js('sb-admin-2.js') ?>"></script>	
<!--<script src="<?php echo base_js('jquery.mobile-1.4.5.min.js') ?>"></script>-->

<?php foreach ($js_file as $value) { ?>
<script src="<?php echo base_js($value); ?>"></script>
<?php } ?>

<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>