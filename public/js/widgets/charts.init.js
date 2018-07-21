/*Morris Init*/
$(function() {
    "use strict";

    if ($('#days-line-chart').length) {
        var chart = new Chartist.Line('#days-line-chart', {
            labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            series: [{
                "name": "",
                "data": [20000, 18000, 35000, 18000, 25000, 26000, 22000]
            },
            {
                "name": "",
                "data": [15000, 23000, 15000, 30000, 20000, 31000, 15000]
            }
            ]
        }, {
            fullWidth: true,
            showPoint: true,
            chartPadding: {
                right: 0,
                left: 0,
                top: 0,
                bottom: 0
            },
            axisX: {
                showLabel: false,
                showGrid: false
            },
            axisX: {
                showLabel: true,
                showGrid: false
            },
            plugins: [
            Chartist.plugins.legend()
            ]
        });

        chart.on('draw', function(data) {
            if (data.type === 'line' || data.type === 'area') {
                data.element.animate({
                    d: {
                        begin: 1000 * data.index,
                        dur: 2000,
                        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                        to: data.path.clone().stringify(),
                        easing: Chartist.Svg.Easing.easeOutQuint
                    }
                });
            }
        });
    }

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $(e.currentTarget.hash).find('[class*="-chart"]').each(function(el, tab) {
          tab.__chartist__.update();
      });
    });


    if ($('#month-line-chart').length) {
        var chart = new Chartist.Line('#month-line-chart', {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', "Dec"],
            series: [{
                "name": "",
                "data": [20000, 18000, 35000, 18000, 25000, 26000, 22000, 15000, 22000, 38000, 20500, 22000]
            },
            {
                "name": "",
                "data": [15000, 23000, 15000, 30000, 20000, 31000, 15000, 35000, 30000, 32500, 30000, 12000]
            }
            ]
        }, {
            fullWidth: true,
            showPoint: true,
            chartPadding: {
                right: 0,
                left: 0,
                top: 0,
                bottom: 0
            },
            axisX: {
                showLabel: false,
                showGrid: false
            },
            axisX: {
                showLabel: true,
                showGrid: false
            },
            plugins: [
            Chartist.plugins.legend()
            ]
        });

        chart.on('draw', function(data) {
            if (data.type === 'line' || data.type === 'area') {
                data.element.animate({
                    d: {
                        begin: 1000 * data.index,
                        dur: 2000,
                        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                        to: data.path.clone().stringify(),
                        easing: Chartist.Svg.Easing.easeOutQuint
                    }
                });
            }
        });
    }

    if ($('#year-line-chart').length) {
        var chart = new Chartist.Line('#year-line-chart', {
            labels: ['2011', '2012', '2013', '2014', '2015', '2016', '2018', '2018'],
            series: [{
                "name": "",
                "data": [20000, 18000, 35000, 18000, 25000, 26000, 22000, 28000]
            },
            {
                "name": "",
                "data": [15000, 23000, 15000, 30000, 20000, 31000, 15000, 20000]
            }
            ]
        }, {
            fullWidth: true,
            showPoint: true,
            chartPadding: {
                right: 0,
                left: 0,
                top: 0,
                bottom: 0
            },
            axisX: {
                showLabel: false,
                showGrid: false
            },
            axisX: {
                showLabel: true,
                showGrid: false
            },
            plugins: [
            Chartist.plugins.legend()
            ]
        });

        chart.on('draw', function(data) {
            if (data.type === 'line' || data.type === 'area') {
                data.element.animate({
                    d: {
                        begin: 1000 * data.index,
                        dur: 2000,
                        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                        to: data.path.clone().stringify(),
                        easing: Chartist.Svg.Easing.easeOutQuint
                    }
                });
            }
        });
    }



});


