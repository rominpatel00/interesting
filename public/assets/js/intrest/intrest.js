function cal() {

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

        var fullDate = new Date()
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
}
cal();
function daysdifference(firstDate, secondDate) {
    var startDay = new Date(firstDate);
    var endDay = new Date(secondDate);

    // Determine the time difference between two dates     
    var millisBetween = startDay.getTime() - endDay.getTime();

    // Determine the number of days between two dates  
    var days = millisBetween / (1000 * 3600 * 24);

    // Show the final number of days between dates     
    return Math.round(Math.abs(days));
}

function monthDiff(d1, d2) {
    let months;
    months = (d2.getFullYear() - d1.getFullYear()) * 12;
    months -= d1.getMonth();
    months += d2.getMonth();
    return months <= 0 ? 0 : months;
}

