$(document).ready(function(){
	
	
            $("#btn").click(function(){
				
				
            $("#div1").load("./index.php"); //this goes to #div1 div
			//alert('Data Retreived');
			return false;
            });
			
			$("#btn2").click(function(){
				
				
            $("#div1").load("./index2.php"); //this goes to #div1 div
			//alert('Filtering Fruits');
			return false;
            });
			
			
			event.preventDefault();
          });
