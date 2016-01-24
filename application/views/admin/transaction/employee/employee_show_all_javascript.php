<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script>
    var id = 0;
    $(".del-data").click(function () {
        id = $(this).attr("id");
        $("#emp_id").val(id);
    });

    $("#duplicate").click(function(){
        var duplicate = $('#duplicate').prop('checked');
        if(!duplicate){
            $("#province_id2").val(null);
            $("#district2").val(null);
            $("#subdistrict2").val(null);
            $("#post_code2").val(null);
            $("#addr_detail2").val(null);
            $("#tel2").val(null);
            $("#country2").val(null);
            $("#latitude2").val(null);
            $("#logitude2").val(null);
        }else{
            $("#province_id2").val( $("#province_id").val() );
            $("#district2").val( $("#district").val() );
            $("#subdistrict2").val( $("#subdistrict").val() );
            $("#post_code2").val( $("#post_code").val() );
            $("#addr_detail2").val( $("#addr_detail").val() );
            $("#tel2").val( $("#tel").val() );
            $("#country2").val( $("#country").val() );
            $("#latitude2").val( $("#latitude").val() );
            $("#logitude2").val( $("#logitude").val() );
        }
    });
    <?php if((isset($emp_id) && $emp_id  != '')){ ?>
        $("#blood").val('{blood}');
        $("#pfname").val('{pfname}');
        $("#company_id").val('<?php echo num_param_url_encode($company_id); ?>');
        $("#dep_id").val('<?php echo num_param_url_encode($dep_id); ?>');
        $("#position_id").val('<?php echo num_param_url_encode($position_id) ?>');
        $("#province_id").val('<?php echo num_param_url_encode($province_id); ?>');
        $("#province_id2").val('<?php echo num_param_url_encode($province_id2); ?>');
        if('{image}' != ''){
            $("#userfile").removeAttr('required');
        }

        if('{gender}' != 'm'){
            $("#m").removeAttr('checked');
            $("#f").attr( 'checked', true );

        }
    <?php } ?>

</script>
