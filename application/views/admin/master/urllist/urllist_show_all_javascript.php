<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script>
    var id = 0;
    $(".del-data").click(function () {
        id = $(this).attr("id");
        $("#url_id").val(id);
    });

</script>
