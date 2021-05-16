<?php 
	session_start(); 

	if (isset($_SESSION['username']) && $_SESSION['accesslevel'] !='doa') {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../../index.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: ../../index.php");
	}

?>


<!DOCTYPE html>
<html>
<head>
<title>Stats</title>
<style type="text/css">



</style>
<script type="text/javascript" src="./js/jquery.min.js"></script>
<script type="text/javascript" src="./js/Chart.min.js"></script>


</head>

<body>
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>

    <script>
               $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("data2.php",
                function (data)
                {
                    console.log(data);
                     var type = [];
                    var weight = [];

                    for (var i in data) {
                        type.push(data[i].type);
                        weight.push(data[i].weight);
                    }

                    var chartdata = {
                        labels: type,
                        datasets: [
                            {
                                label: 'Types and weight',
                                backgroundColor: ['#0f9b0f', '#f7b733'],
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: weight

								
                            }
                        ]
                    };
					


                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'doughnut',
                        data: chartdata
                    });
                });
            }
        }
        </script>

</body>
</html>