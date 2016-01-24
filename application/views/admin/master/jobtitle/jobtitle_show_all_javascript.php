<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script>
    var id = 0;
    $(".del-data").click(function () {
        id = $(this).attr("id");
        $("#job_title_id").val(id);
    });

</script>
