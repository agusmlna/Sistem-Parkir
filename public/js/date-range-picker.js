$(function () {
    let start;
    let end;

    let startDate = document.getElementById("startDate");
    let endDate = document.getElementById("endDate");

    if (startDate.value == null || startDate.value == "") {
        console.log("kosong");
        start = moment().subtract(29, "days");
        end = moment();
    } else {
        start = moment.parseZone(startDate.value);
        end = moment(endDate.value);
    }

    function cb(start, end) {
        startDate.value = start;
        endDate.value = end;

        $("#reportrange span").html(
            start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY")
        );
    }

    $("#reportrange").daterangepicker(
        {
            startDate: start,
            endDate: end,
            ranges: {
                Today: [moment(), moment()],
                Yesterday: [
                    moment().subtract(1, "days"),
                    moment().subtract(1, "days"),
                ],
                "Last 7 Days": [moment().subtract(6, "days"), moment()],
                "Last 30 Days": [moment().subtract(29, "days"), moment()],
                "This Month": [
                    moment().startOf("month"),
                    moment().endOf("month"),
                ],
                "Last Month": [
                    moment().subtract(1, "month").startOf("month"),
                    moment().subtract(1, "month").endOf("month"),
                ],
            },
        },
        cb
    );

    cb(start, end);
});
