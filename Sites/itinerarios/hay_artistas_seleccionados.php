<div class="container">

	<div class="card">
		<div class="card-header">
			A continuación se mostrarán todos los artistas que seleccionaste:
		</div>

		<div class="card-body">

		<table class="table">
			<thead class="thead-dark">
			<tr>
				<th scope="col">Nombre del artista</th>
			</tr>
			</thead>
			<tbody>
				<!-- <th scope="row">1</th> -->

				
				<?php
				foreach ($artistas as $key => $value) {

					echo "<tr> <td>  $value  </td> </tr>";
				}
				?>


			</tbody>
		</table>


		</div>
	</div>
</div>