<br>

<header class="container-fluid">
	
	<div class="container">

		<div class="row" id="cabezote">

			<!--=====================================
			LOGOTIPO
			======================================-->
			
			<div class="col-lg-2 col-xs-12">
				
				<a href="<?php echo $url; ?>">
							
						<img src="<?php echo $servidor;?>/vistas/img/plantilla/logo.png" class="img-responsive">

					</a>
				
			</div>

			<!--=====================================
			BLOQUE CATEGORÍAS Y BUSCADOR
			======================================-->

			<div class="col-lg-10 col-sm-12 col-xs-12">
				
				<!--=====================================
				BUSCADOR
				======================================-->
				
				<div class="input-group col-xs-12" id="buscador">
					
					<input type="search" name="buscar" class="form-control" placeholder="Buscar...">	
					
					<span class="input-group-btn">
						
						<a href="<?php echo $url; ?>buscador/1/recientes">

							<button class="btn btn-default transparente colorFond" type="submit">
								
								<i class="fa fa-search"></i>

							</button>

						</a>

					</span>
					
					<button class="btn btn-default transparente colorFond" id="btnCategorias">
						
						<i class="fa fa-bars" aria-hidden="true"></i>

					</button>

				</div>
			
			</div>

		</div>

		<!--=====================================
		CATEGORÍAS
		======================================-->
		

		<div class="col-xs-12 " id="categorias">
			<div class="col-lg-10 col-md-10 col-sm-8 col-xs-6"></div>
			<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 listaCategorias">
				
			<?php

				$accesoRapido = ControladorAccesoRapido::ctrMostrarAccesoRapido();
				
				echo '<ul>';

				foreach ($accesoRapido as $key => $value) {

					echo '<li>
								<a href="'.$url.$value["ruta"].'" class="pixelCategorias colorFondPlomo" titulo="'.$value["titulo"].'">'.$value["titulo"].'</a>
						</li>';
				}

				echo '</ul>';

			?>	
			</div>
		</div>

	</div>

</header>

<br>