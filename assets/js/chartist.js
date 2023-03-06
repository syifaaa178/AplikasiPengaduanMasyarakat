(function($) {
  //simple line
  'use strict';
  if ($('#ct-chart-line').length) {
    new Chartist.Line('#ct-chart-line', {
      labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
      series: [
        [12, 9, 7, 8, 5],
        [2, 1, 3.5, 7, 3],
        [1, 3, 4, 5, 6]
      ]
    }, {
      fullWidth: true,
      chartPadding: {
        right: 40
      }
    });
  }

  //Stacked bar Chart
  if ($('#ct-chart-stacked-bar').length) {
    new Chartist.Bar('#ct-chart-stacked-bar', {
      labels: ['Q1', 'Q2', 'Q3', 'Q4'],
      series: [
        ['800000', '1200000', '1400000', '1300000'],
        ['200000', '400000', '500000', '300000'],
        ['100000', '200000', '400000', '600000'],
        ['400000', '600000', '200000', '0000']
      ]
    }, {
      stackBars: true,
      axisY: {
        labelInterpolationFnc: function(value) {
          return (value / 1000) + 'k';
        }
      }
    }).on('draw', function(data) {
      if (data.type === 'bar') {
        data.element.attr({
          style: 'stroke-width: 30px'
        });
      }
    });
  }


})(jQuery);