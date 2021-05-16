$(document).ready(function(){
	
	
            $("#btn").click(function(){
				
				
            $("#div1").load("table.php"); //this goes to #div1 div
			//alert('Data Retreived');
			return false;
            });
			
			$("#btn2").click(function(){
				
				
            $("#div1").load("table2.php"); //this goes to #div1 div
			//alert('Filtering Fruits');
			return false;
            });
			
			$("#btn3").click(function(){
				
				
            $("#div1").load("table3.php"); //this goes to #div1 div
			//alert('Filtering Vegetables');
			return false;
            });
			
			event.preventDefault();
          });
