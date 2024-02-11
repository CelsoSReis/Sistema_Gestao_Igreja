<?php 
require_once("../conexao.php");
$membrosSede = 0;
$membrosCadastrados = 0;
$pastoresCadastrados = 0;
$igrejasCadastradas = 0;

$query = $pdo->query("SELECT * FROM igrejas");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$igrejasCadastradas = @count($res);

$query = $pdo->query("SELECT * FROM pastores");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$pastoresCadastrados = @count($res);

$query_m = $pdo->query("SELECT * FROM membros where igreja = 1 and ativo = 'Sim'");
$res_m = $query_m->fetchAll(PDO::FETCH_ASSOC);
$membrosSede = @count($res_m);

$query_m = $pdo->query("SELECT * FROM membros where ativo = 'Sim'");
$res_m = $query_m->fetchAll(PDO::FETCH_ASSOC);
$membrosCadastrados = @count($res_m);

?>

<div class="container-fluid " >
	<section id="minimal-statistics" style="margin-right:20px">
		<div class="row mb-2">
			<div class="col-12 mt-3 mb-1">
				<h4 class="text-uppercase text-white">Dashboard</h4>

			</div>
		</div>

		<div class="row">
		    
			<div class="col-sm-3 mb-3">
				<a href="index.php?pag=igrejas" class="link-cards">
					<div class="card bg-card-body">
						<div class="card-body link-cards">
							<i class="bi bi-house-door-fill fs-1 float-center"></i>
							<h2><?php echo @$igrejasCadastradas?></h2>
							<h4>Igrejas</h4>
							<p class="card-text texto-pequeno-card">Igrejas e Congregações Cadastradas</p>
						</div>
					</div>
	      		</a>
      		</div>

			  <div class="col-sm-3 mb-3">
				<a href="index.php?pag=pastores" class="link-cards">
					<div class="card bg-card-body">
						<div class="card-body link-cards">
							<i class="bi bi-people fs-1 float-center"></i>
							<h2><?php echo @$pastoresCadastrados ?></h2>
							<h4>Pastores</h4>
							<p class="card-text texto-pequeno-card">Pastores Cadastrados</p>
						</div>
					</div>
	      		</a>
      		</div>
  
			  <div class="col-sm-3 mb-3">
				<a href="index.php?pag=membros" class="link-cards">
					<div class="card bg-card-body">
						<div class="card-body link-cards">
							<i class="bi bi-person-fill fs-1 float-center"></i>
							<h2><?php echo @$membrosSede ?></h2>
							<h4>Membros da Sede</h4>
							<p class="card-text texto-pequeno-card">Membros Cadastrados na igreja sede</p>
						</div>
					</div>
	      		</a>
      		</div>

			  <div class="col-sm-3 mb-3">
				<a href="index.php?pag=membros" class="link-cards">
					<div class="card bg-card-body">
						<div class="card-body link-cards">
							<i class="bi bi-people-fill fs-1 float-center"></i>
							<h2><?php echo @$membrosCadastrados ?></h2>
							<h4>Membros da Sede</h4>
							<p class="card-text texto-pequeno-card">Total de Membros Cadastrados</p>
						</div>
					</div>
	      		</a>
      		</div>
		</div>

	</section>

	<div class="text-xs font-weight-bold text-white text-uppercase mt-4 link-cards"><small>IGREJAS - SEDE E CONGREGAÇÕES</small></div>
	<hr class="text-white"> 

	<div class="row" style="margin-right:10px">

		<?php 

		$query = $pdo->query("SELECT * FROM igrejas order by matriz desc, nome asc");
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_reg = count($res);

		for($i=0; $i < $total_reg; $i++){
			foreach ($res[$i] as $key => $value){} 

				$nome = $res[$i]['nome'];
					//$pastor = $res[$i]['pastor'];
			$imagem = $res[$i]['imagem'];
			$matriz = $res[$i]['matriz'];
			$pastor = $res[$i]['pastor'];
			$id_ig = $res[$i]['id'];

			if($matriz == 'Sim'){
				$bordacard = 'bordacardsede';
				$classe = 'text-danger';
			}else{
				$bordacard = 'bordacard';
				$classe = 'text-primary';
			}

			$query_m = $pdo->query("SELECT * FROM membros where igreja = '$id_ig' and ativo = 'Sim'");
			$res_m = $query_m->fetchAll(PDO::FETCH_ASSOC);
			$membrosCad = @count($res_m);

			$query_con = $pdo->query("SELECT * FROM pastores where id = '$pastor'");
			$res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);
			if(count($res_con) > 0){
				$nome_p = $res_con[0]['nome'];
			}else{
				$nome_p = 'Não Definido';
			}

			?>
			<div class="col-xl-2 col-md-6 col-12 mb-4 linkcard">
				<a href="../painel-igreja/index.php?igreja=<?php echo $id_ig ?>">
				<div class="card text-white mb-3 bg-card-body" style="max-width: 18rem;">
				  <div class="card-header bg-card-header"><?php echo $nome ?></div>
				  <div class="card-body bg-card-body">
				    <h6 class="card-title">Pr(a) <?php echo mb_strtoupper($nome_p) ?></h6>
				    <p class="card-text"><?php echo @$membrosCad ?> MEMBROS</p>
				  </div>
				</div>
			</a>
	      	</div>
      		
<!--
			<div class="col-xl-3 col-md-6 col-12 mb-4 linkcard">
				<a href="../painel-igreja/index.php?igreja=<?php echo $id_ig ?>">
					<div class="card <?php echo $classe ?> shadow h-100 py-2 <?php echo $bordacard ?>">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold <?php echo $classe ?> text-uppercase titulocard"><?php echo $nome ?></div>
									<div class="text-xs text-secondary subtitulocard"><?php echo mb_strtoupper($nome_p) ?> </div>
								</div>
								<div class="col-auto" align="center">
									<img src="../img/igrejas/<?php echo $imagem ?>" width="50px" height="50px"><br>
									<span class="text-xs totaiscard <?php echo $classe ?>"><?php echo @$membrosCad ?> MEMBROS</span>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
-->

		<?php } ?>

	</div>
</div>