$(function(){
    var total = 0.00;
    $('input.calculate-me').change('input',function(){
        total = 0.00;
        $("input.calculate-me").each(function(){
            total += parseFloat(this.value);
        });

        $('input#booking-total').val(total);
    });

    $('select#is_return').on('change', function() {
        if($(this).val() == '1') {
            $('#return_dateandtime_date').removeAttr('disabled');
            $('#return_dateandtime_time').removeAttr('disabled');
        }else{
            $('#return_dateandtime_date').attr('disabled','disabled');
            $('#return_dateandtime_time').attr('disabled','disabled');
        }

    });
});