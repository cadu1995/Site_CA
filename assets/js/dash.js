/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {

    var options = {
        series: {
            lines: {
                show: true
            },
            points: {
                show: true
            }
        },
        grid: {
            hoverable: true,
            clickable: true
        },
        yaxis:{
            tickDecimals: 0
        },
        xaxis: {
            mode: "categories",
            tickLength: 0
        }
    };

    var dataurl = 'dashboard/dados';
    
    function onDataReceived(series) {
        data = [series];
        $.plot("#plot", data, options);
    }

    $.ajax({
        url: dataurl,
        type: "GET",
        dataType: "json",
        success: onDataReceived
    });

    $("<div id='tooltip'></div>").css({
        position: "absolute",
        display: "none",
        border: "1px solid #fdd",
        padding: "2px",
        "background-color": "#fee",
        opacity: 0.80
    }).appendTo("body");

    $("#plot").bind("plothover", function (event, pos, item) {

        if ($("#enablePosition:checked").length > 0) {
            var str = "(" + pos.x.toFixed(2) + ", " + pos.y.toFixed(2) + ")";
            $("#hoverdata").text(str);
        }

        if (item) {
            var x = item.datapoint[0].toFixed(2),
                    y = item.datapoint[1].toFixed(2);

            $("#tooltip").html("&nbsp;&nbsp;&nbsp;&nbsp;" + Number(y) + (Number(y) === 1 ? " acesso." : " acessos."))
                    .css({top: item.pageY + 5, left: item.pageX + 5})
                    .fadeIn(200);
        } else {
            $("#tooltip").hide();
        }
    });
});
