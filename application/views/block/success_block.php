<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div style="clear: both"></div>
<br>
<div style="clear: both"></div>
<div class="row text-center center-block">
    <div class="col-lg-6  " style="display:inline-block;float:none;">
        <div class="panel panel-green">
            <div class="panel-heading">
                <?php echo_line("sys_success"); ?>
            </div>
            <div class="panel-body">
                <p>
                    <?php echo_line($succes_message); ?>
                </p>
            </div>
            <div class="panel-footer">
                <button type="button" class="btn btn-outline btn-success" onclick="window.location.href = '<?php echo $url_back ?>'">ตกลง</button>
            </div>
        </div>
        <!-- /.col-lg-4 -->
    </div>
</div>
<!-- /.row -->