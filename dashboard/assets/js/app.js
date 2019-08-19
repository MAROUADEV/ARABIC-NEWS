
$(document).ready(function(){
	$.ajax({
		url: "http://localhost/MaghrebEco/dashboard/dt.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var titre = [];
			var count = [];
            window.chtColors = {

            orange: 'rgb(255, 159, 64)',

            blue: 'rgb(54, 162, 235)',
            
        };

			for(var i in data) {
				titre.push(data[i].titre);
				count.push(data[i].count);
			}

			var chtdata = {
				labels: titre,
				datasets : [
					{
						label: 'Nombre de vues par article',
						backgroundColor: [

                        window.chartColors.blue,
                       


                      ],
                        hoverBackgroundColor:[
 

                        window.chartColors.orange,


                        ],
						data: count
					}
				]
			};


			var ctx = $("#cnv");

			var barGraph = new Chart(ctx, {
				type: 'radar',
				data: chtdata,
   
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});