// A $( document ).ready() block.
$(document).ready(function () {

    $("#btn_this").click(function () {
        len = $('tbody').children('tr').length;

        let ThisAmount = 0;
        let ThisIntrest = 0;
        for (i = 0; i < len - 1; i++) {

            amount = $('tbody').children('tr').children(".amount")[i]
            amount = amount.textContent
            amount = parseFloat(amount)
            ThisAmount = ThisAmount + amount;

            intrest = $('tbody').children('tr').children(".intrest")[i]
            intrest = intrest.textContent
            intrest = parseFloat(intrest)
            ThisIntrest = ThisIntrest + intrest;

        }
        $('tbody').children('tr').children(".total_amount").html(ThisAmount)
        $('tbody').children('tr').children(".total_intrest").html(parseFloat(ThisIntrest).toFixed(2))
    });

    $("#btn_tot").click(function () {

        $('tbody').children('tr').children(".total_amount").html(TotalAmount)
        $('tbody').children('tr').children(".total_intrest").html(parseFloat(TotalIntrest).toFixed(2))
    });


    len = $('tbody').children('tr').length;

    let TotalAmount = 0;
    let TotalIntrest = 0;
    for (i = 0; i < len - 1; i++) {

        amount = $('tbody').children('tr').children(".amount" + i).html()
        // amount = amount.textContent
        amount = parseFloat(amount)
        TotalAmount = TotalAmount + amount;

        intrest = $('tbody').children('tr').children(".intrest" + i).html()
        // intrest = intrest.textContent
        intrest = parseFloat(intrest)
        TotalIntrest = TotalIntrest + intrest;

    }
    $('tbody').children('tr').children(".total_amount").html(TotalAmount)
    $('tbody').children('tr').children(".total_intrest").html(parseFloat(TotalIntrest).toFixed(2))

});

$(document).ready(function () {
    setTimeout(function () {
        var fullDate = new Date()

        var twoDigitMonth = ((fullDate.getMonth().length + 1) === 1) ? (fullDate.getMonth() + 1) : '0' + (fullDate.getMonth() + 1);
        var twoDigitDay = ((fullDate.getDate().length + 1) === 1) ? (fullDate.getDate() + 1) : '0' + (fullDate.getDate() + 1);
        var currentDate = fullDate.getFullYear() + "-" + twoDigitMonth + "-" + twoDigitDay;
        $('<div id="" style="float:right" class=""><label class=""><input type="date" min='+currentDate+' id="date_select" name="date" class="form-control" id="horizontal-email-input" value=""></label></div>').insertAfter($('#example_filter'));

        $("#date_select").blur(function () {

            len = $('tbody').children('tr').length;

            for (i = 0; i < len; i++) {
                let MIntrest = 0;
                let DIntrest = 0;
                let Intrest = 0;
                amount = $('tbody').children('tr').children(".amount" + i).html()
                amount = parseFloat(amount)
                per = $('tbody').children('tr').children(".per" + i).html()
                per = parseFloat(per)
                date = $('tbody').children('tr').children(".date" + i).html()

                var fullDate = new Date($("#date_select").val())
                var startDay = new Date(date);

                var twoDigitMonth = ((fullDate.getMonth().length + 1) === 1) ? (fullDate.getMonth() + 1) : '0' + (fullDate.getMonth() + 1);
                var currentDate = fullDate.getFullYear() + "-" + twoDigitMonth + "-" + fullDate.getDate();

                var twoDigitOldMonth = ((startDay.getMonth().length + 1) === 1) ? (startDay.getMonth() + 1) : '0' + (startDay.getMonth() + 1);
                var oldDate = startDay.getFullYear() + "-" + twoDigitOldMonth + "-" + fullDate.getDate();
                if (twoDigitMonth != twoDigitOldMonth) {

                    months = monthDiff(startDay, fullDate)

                    MIntrest = (amount * per) / 100;
                    if (fullDate.getDate() == fullDate.getDate()) {
                        MIntrest = MIntrest * (months);
                    }
                    else {
                        MIntrest = MIntrest * (months - 1);
                    }
                }
                if (startDay.getDate() > fullDate.getDate()) {
                    twoDigitMonth = twoDigitMonth - 1;
                    var oldDate = fullDate.getFullYear() + "-" + twoDigitMonth + "-" + startDay.getDate();
                }
                var oldDate = fullDate.getFullYear() + "-" + twoDigitMonth + "-" + startDay.getDate();
                diffDays = daysdifference(oldDate, currentDate);

                DIntrest = (amount * per) / 100;
                DIntrest = (DIntrest / 30) * diffDays;

                Intrest = MIntrest + DIntrest;
                $('tbody').children('tr').children(".intrest" + i).html(parseFloat(Intrest).toFixed(2))

            }
        });
    }, 10);

});
