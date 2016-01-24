<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script>
    var id = 0;
    $(".del-data").click(function () {
        id = $(this).attr("id");
        $("#time_sheet_id").val(id);
    });

</script>
