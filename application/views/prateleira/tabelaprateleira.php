<div class="container">
	<div class="row">
		<div class="col-1"></div>
		<div class="col-10">
			<br>
			<h3 class='text-center'>Prateleira <?=$prateleira->id;?></h3>
			<hr>
			<table class="table table-bordered">
				<div class="table-inverse">
					<?php for($i = 0; $i <= $prateleira->posicoesx; $i++){ ?>
						<tr>
							<?php for($j = 0; $j <= $prateleira->posicoesy; $j++){ ?>
								<?php if($j == 0 && $i == 0) {
										echo '<td style="max-width: 5px;"><b>Posições:</b></td>';
									} else if($j == 0 && $i != 0)
									{
										echo "<td style='max-width: 5px;'><b>$i</b></td>";
									} else if($j != 0 && $i == 0) {
										echo "<td><b>$j</b></td>";
									} else {
										echo "<td class='text-success'><b>D</b></td>";
									}
								?>
							<?php } ?>
						</tr>
					<?php } ?>
				</div>
			</table>
		</div>
		<hr>
		<div class="col-1"></div>
		<p class='text-center'><b>Legenda*:</b> <span class='text-success'><b>D</b> - Disponível</span> / <span class='text-danger'><b>O</b> - Ocupado</span></p>
	</div>
	<center><a class='btn btn-sm btn-dark' href="javascript:history.back()">Voltar</a></center>
	<br>
</div>