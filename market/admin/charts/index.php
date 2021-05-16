<?php 
	session_start(); 

	if (isset($_SESSION['username']) && $_SESSION['accesslevel'] !='doa') {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../index.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: ../index.php");
	}

?>


<!DOCTYPE html>
<html>
<head>
<title>Stats</title>
<style type="text/css">



</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>


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
                $.post("data.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var ppk = [];

                    for (var i in data) {
                        name.push(data[i].name);
                        ppk.push(data[i].ppk);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Vegetable Prices',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: ppk
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
        </script>

</body>
</html>