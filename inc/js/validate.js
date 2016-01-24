/**
 * Created by Prawit.S on 21/7/2558.
 */
function number(evt,txt,length,numberOnly) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if(!numberOnly){
        for (var i = 0; i < length; i++)
        {
            if (txt[i] === "."){
                if (charCode === 46) {
                    return false;}
                if ((length - (i + 1)) >= 2){
                    return false;}
            }
        }
    }
    if (charCode === 46) {
        return true;  }
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;    }
    return true;
}

//On key no integer
$(".numberonly").keypress(function(event) {
    var txt = $.trim($(this).val());
    var length = txt.length;
    if (!number(event,txt,length,true)) {
        event.preventDefault();
    }
});
