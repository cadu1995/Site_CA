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


});
