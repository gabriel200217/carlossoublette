<?php


		  if(empty($_SESSION)){
		  session_start();
		  }

	  	  if(isset($_SESSION['permisos'])){
			 $nivel1 = $_SESSION['permisos'];
		
		  }
		  else{
			  $nivel1 = "";
		  }
	    ?>



<!DOCTYPE html>
<html lang="es">
<head>
	<?php  require_once('comunes/header.php');?>
    <?php require_once('comunes/menu.php'); ?>
</head>

<body >
<form id="f" target="_blank" method="post" >
	<input type="text" name="accion" value="asdasd" class="ocultar">

<div class="head-title pt-3  mx-auto" style="width: 100%;  ">
				<div class="left">
					<h1>Reportes de estudiantes egresados en: <?php if(!empty($consutaa)){echo $consutaa;} ?></h1>
				</div>
			</div>
			<div class="table-title  mb-3">
					     <div class="row ">
						     <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
							    <h2 class="ml-lg-2">Registro de Materia</h2>
							 </div>
							 <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
							 <?PHP if (in_array("registrar materias", $nivel1)) {?>
							    <button href="#addEmployeeModal" class="btn btn-success" data-toggle="modal" type="submit">
									<i class="material-icons">&#xE147;</i>
									<span>Registrar</span>
							    </button>

								<?php } ?>

							 </div>
					     </div>
					   </div>

					   </form>	   
        <canvas id="myChart" width="100" height="100"></canvas>
    </body>
	<script src="assets/js/chart.min.js"></script>
    <script>
        var ctx= document.getElementById("myChart").getContext("2d");
        var myChart= new Chart(ctx,{
            type:"bar",
            data:{
                labels:['1 año','2 año ','3 año','4 año ','5 año'],
                datasets:[{
                        label:'Num datos',
                        data:['<?php if(!empty($consuta1)){echo $consuta1;}?>','<?php if(!empty($consuta2)){echo $consuta2;}?>','<?php if(!empty($consuta3)){echo $consuta3;}?>','<?php if(!empty($consuta4)){echo $consuta4;}?>','<?php if(!empty($consuta5)){echo $consuta5;}?>'],
                        backgroundColor:[
                            'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)'
                        ]
                }]
            },
            options:{
                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                    }]
                }
            }
        });



    </script>
	<?php require_once('comunes/footer.php') ?> 
    <script  src="assets/js/script.js"></script>
	
	<script src="assets/js/reporte_ingreso.js"></script>

</html>