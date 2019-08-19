
$(document).ready(function(){
	$.ajax({
		url: "http://localhost/MaghrebEco/dashboard/data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var categories = [];
			var total = [];
            window.chartColors = {
            red: 'rgb(192, 57, 43 )',
            orange: 'rgb(255, 159, 64)',
            yellow: 'rgb(255, 205, 86)',
            green: 'rgb(75, 192, 192)',
            blue: 'rgb(54, 162, 235)',
            purple: 'rgb(153, 102, 255)',
            grey: 'rgb(113, 125, 126)',
            green1:'rgb(46, 204, 113)',
            yellow1:'rgb(154, 125, 10),',
            color1:'rgb(162, 217, 206)',
            color2:'rgb(115, 198, 182)'
        };

			for(var i in data) {
				categories.push(data[i].categories);
				total.push(data[i].total);
			}

			var chartdata = {
				labels: categories,
				datasets : [
					{
						label: 'Nombre d\'articles par catégories',
						backgroundColor: [
                        window.chartColors.red,
                        window.chartColors.orange,
                        window.chartColors.yellow,
                        window.chartColors.green,
                        window.chartColors.blue,
                        window.chartColors.green1,
                        window.chartColors.yellow1,
                        window.chartColors.color1,
                        window.chartColors.color2,
                        window.chartColors.grey
                      ],
                        hoverBackgroundColor:[
                        window.chartColors.red,
                        window.chartColors.orange,
                        window.chartColors.yellow,
                        window.chartColors.green,
                        window.chartColors.blue,
                        window.chartColors.green1,
                        window.chartColors.yellow1,
                        window.chartColors.color1,
                        window.chartColors.color2,
                        window.chartColors.grey
                        ],
						data: total
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});