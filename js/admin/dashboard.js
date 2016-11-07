jQuery(function(){
	
	callAjaxJson("admin/dashboard/getProjectChart",{},generateProjectChart,ajaxError)

})

function generateProjectChart(response){

	var data = response;
	if(!data){return;}
	$("#loadingchart").fadeOut();

	var pieElem = "<div id=\"pie#elem#\" style=\"min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto;\"></div>"
	for(x in data){ 
		var curElem = pieElem.replace("#elem#",data[x].id)
		$("#piechart-wrap").append(curElem)
		buildPieChart(data[x].id,data[x])
	}
 
	$("#piechart-wrap text:contains('Highcharts.com')").text("");

} 
function buildPieChart(i, data){ 
    Highcharts.getOptions().plotOptions.pie.colors = (function () {
        var colors = [],
            base = Highcharts.getOptions().colors[0],
            i;

        for (i = 0; i < 10; i += 1) { 
            colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
        }
        return colors;
    }());

	$('#pie' + i).highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: data.name + '\'s contribution ('+ data.target +') <br/><p style="font-size:12px;">from '+ data.startdate +' to Today</p>'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    formatter: function() {
                        return Math.round(this.percentage*100)/100 + ' %';
                    },
                    distance: -30,
                    color:'white'
                }
            }
        },
        series: [{
            name: data.name,
            colorByPoint: true,
            data: [{
                name: 'Actual',
                y: parseInt(data.actual,10),
                sliced: true,
                selected: true
            }, {
                name: 'Remaining',
                y: parseInt(data.remaining,10),
               
            }]
        }]
    });

}