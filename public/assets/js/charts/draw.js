function draw(data){
    // debugger
    $("#container").html("");
// create a line chart
 var chart = anychart.line();
 // create a data set on our data
 
 var dataSet = anychart.data.set(data);

 // map data for the first series,
 // take x from the zero column and value from the first column
 var firstSeriesData = dataSet.mapAs({
     x: 0,
     value: 1
 });

 // map data for the second series,
 // take x from the zero column and value from the second column
 var secondSeriesData = dataSet.mapAs({
     x: 0,
     value: 2
 });

 // map data for the third series,
 // take x from the zero column and value from the third column
 var thirdSeriesData = dataSet.mapAs({
     x: 0,
     value: 3
 });

 // map data for the fourth series,
 // take x from the zero column and value from the fourth column
 var fourthSeriesData = dataSet.mapAs({
     x: 0,
     value: 4
 });

 // configure the chart title text settings
 chart.title('Blue line shows Principal and Orange line shows the Intrest');

 // set the y axis title
 chart.yAxis().title('% of people who accept same-sex relationships');

 // create the first series with the mapped data
 var firstSeries = chart.line(firstSeriesData);
 firstSeries.name('Principal');

 // create the second series with the mapped data
 var secondSeries = chart.line(secondSeriesData);
 secondSeries.name('Interest');

 // create the third series with the mapped data
 var thirdSeries = chart.line(thirdSeriesData);
 thirdSeries.name('');

 // create the fourth series with the mapped data
 var fourthSeries = chart.line(fourthSeriesData);
 fourthSeries.name('');

 // turn the legend on
 chart.legend().enabled(true);

 // create a line series with the mapped data
 var lineChart = chart.line(firstSeries);
 var lineChart = chart.line(secondSeries);
 var lineChart = chart.line(thirdSeries);
 var lineChart = chart.line(fourthSeries);

 // set the container id for the line chart
 chart.container('container');

 // draw the line chart
 chart.draw();
}