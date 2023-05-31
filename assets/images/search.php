<?php
include("config.php");
include("classes/AllResultsProvider.php");
include("classes/AnimeResultsProvider.php");
include("classes/AplicativosResultsProvider.php");
include("classes/ArtesResultsProvider.php");
include("classes/BibliaResultsProvider.php");
include("classes/CepsResultsProvider.php");
include("classes/CursosResultsProvider.php");
include("classes/DicionarioResultsProvider.php");
include("classes/EmpregosResultsProvider.php");
include("classes/EntretenimentoResultsProvider.php");
include("classes/FilmesResultsProvider.php");
include("classes/GamesResultsProvider.php");
include("classes/LivrosResultsProvider.php");
include("classes/MusicasResultsProvider.php");
include("classes/NegociosResultsProvider.php");
include("classes/PodcastsResultsProvider.php");
include("classes/ProfissionaisResultsProvider.php");
include("classes/ReceitasResultsProvider.php");
include("classes/ShoppingResultsProvider.php");
include("classes/SocialResultsProvider.php");
include("classes/TecnologiaResultsProvider.php");
include("classes/TutoriaisResultsProvider.php");
include("classes/VideosResultsProvider.php");
include("classes/ImageResultsProvider.php");

if(isset($_GET["term"])) {
	$term = $_GET["term"];
}
else {
	exit("You must enter a search term");
}

$type = isset($_GET["type"]) ? $_GET["type"] : "links";
$page = isset($_GET["page"]) ? $_GET["page"] : 1;


	
?>
<!DOCTYPE html>
<html>
<head>

	<title>Geekou</title>


	<link href="assets/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />

	

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

	<style>
		div::-webkit-scrollbar {
			width: 5px;
			height: 12px;
		}
		div::-webkit-scrollbar-button {

			display: none;
			visibility: hidden;
		}
		div::-webkit-scrollbar-track {
			background: #333333;
		}
		div::-webkit-scrollbar-track-piece {
			background: #fff;
		}
		div::-webkit-scrollbar-thumb {
			background: #CFCFCF;
			border-radius: 10px;
		}
		div::-webkit-scrollbar-corner {
			background: #FF0000;
			border-radius: 0px;
		}
		.tabsContainer { 
			padding-top: 4.5em;
			padding-bottom: 0.5em;
			padding-left: 1em;
		}
		.tabsContainer .tabList { padding: 0; margin: 0; }

		.tabsContainer .tabList li { display: inline-block; padding: 0 1px 1px 1px; color: #777; font-size: 16px; }

		.tabsContainer .tabList li a { text-decoration: none; color: #9C9C9C; }
		.tabsContainer .tabList li.active { border-bottom: 0px solid #9C9C9C; font-size: 16px; }
		.tabsContainer .tabList li.active a { font-weight: normal ;color: #1A73E8; }

        div.scrollmenu { 
			overflow: auto; 
			white-space: nowrap;
	
		}

	    div.scrollmenu a { display: inline-block; text-align: center; padding: 12px; text-decoration: none; }
		
		.resultContainer { 
			display: flex;
			flex-direction: column;
			margin-bottom: 10px;
		
		}

		.resultContainer .title { margin: 0; padding: 0; }
		.resultContainer .title a { color: #1a0dab;text-decoration: none;font-weight: normal;font-size: 20px; }
		.resultContainer .title a:hover { text-decoration: underline; }

		.resultContainer .url { color: #006621;font-size: 15px; }
		.resultContainer .description { font-size: 16px; }

		.pageButtons {display: flex;}
		.pageNumberContainer img {height: 37px;}
		.pageNumberContainer,.pageNumberContainer a {display: flex;flex-direction: column;align-items: center;text-decoration: none;}
		.pageNumber {color: #000;font-size: 12px;}
		a .pageNumber {color: #4285f4;}

		/**  images*/
		.mainResultsSection .imageResults {margin: 20px;}
		.gridItem {position: relative;}
		.gridItem img {max-width: 200px;min-width: 50px;visibility: hidden;}
		.gridItem .details {visibility: hidden;position: absolute;bottom: 0px;left: 0px;width: 100%;overflow: hidden;
							background-color: rgba(0,0,0,0.8);color: #fff;font-size: 11px;padding: 3px;box-sizing: border-box;white-space: nowrap;}
		.gridItem:hover .details {visibility: visible;}

	</style>

</head>
<body>

<nav class="navbar bg-white fixed-top shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand"><img class="img-fluid ms-2" src="assets/images/geekouLogo.png"></a>
    <form class="d-flex" role="search" action="search.php" method="GET">

		<div class="input-group input-group-sm mt-1 me-2">
		    <input type="hidden" name="type" value="<?php echo $type; ?>">
			<button class="btn btn-outline-primary border border-end-0 rounded-pill rounded-end" type="button"><i class="fas fa-search"></i></button>
			<input type="text" class="form-control border border-start-0 border-end-0 border-top border-bottom" name="term" value="<?php echo $term; ?>" autocomplete="off">
			<button class="btn btn-outline-primary border border-start-0 border-top border-bottom rounded-pill rounded-start" type="submit"><i class="fas fa-search"></i></button>
		</div>


    </form>
  </div>
</nav>




<div class="container-fluid">


    


	<div class="tabsContainer">
		<div class="scrollmenu tabList">

			<li class="<?php echo $type == 'links' ? 'active' : '' ?>">
			    <a href="<?php echo "search.php?term=$term&type=links"; ?>">Tudo</a>
	        </li>

			<li class="<?php echo $type == 'anime' ? 'active' : '' ?>">
			    <a href="<?php echo "search.php?term=$term&type=anime"; ?>">Anime</a>
	        </li>

			<li class="<?php echo $type == 'aplicativos' ? 'active' : '' ?>">
			    <a href="<?php echo "search.php?term=$term&type=aplicativos"; ?>">Aplicativos</a>
	        </li>

			<li class="<?php echo $type == 'artes' ? 'active' : '' ?>">
			    <a href="<?php echo "search.php?term=$term&type=artes"; ?>">Artes</a>
	        </li>

			<li class="<?php echo $type == 'biblia' ? 'active' : '' ?>">
			    <a href="<?php echo "search.php?term=$term&type=biblia"; ?>">Bíblia</a>
	        </li>

			<li class="<?php echo $type == 'ceps' ? 'active' : '' ?>">
			    <a href="<?php echo "search.php?term=$term&type=ceps"; ?>">Ceps</a>
	        </li>

			<li class="<?php echo $type == 'cursos' ? 'active' : '' ?>">
			    <a href="<?php echo "search.php?term=$term&type=cursos"; ?>">Cursos</a>
	        </li>

			<li class="<?php echo $type == 'dicionario' ? 'active' : '' ?>">
			    <a href="<?php echo "search.php?term=$term&type=dicionario"; ?>">Dicionário</a>
	        </li>

			<li class="<?php echo $type == 'empregos' ? 'active' : '' ?>">
			    <a href="<?php echo "search.php?term=$term&type=empregos"; ?>">Empregos</a>
	        </li>

			<li class="<?php echo $type == 'entretenimento' ? 'active' : '' ?>">
			    <a href="<?php echo "search.php?term=$term&type=entretenimento"; ?>">Entretenimento</a>
	        </li>

			<li class="<?php echo $type == 'filmes' ? 'active' : '' ?>">
			    <a href="<?php echo "search.php?term=$term&type=filmes"; ?>">Filmes</a>
	        </li>

			<li class="<?php echo $type == 'financas' ? 'active' : '' ?>">
			    <a href="<?php echo "search.php?term=$term&type=financas"; ?>">Finanças</a>
	        </li>

			<li class="<?php echo $type == 'games' ? 'active' : '' ?>">
			    <a href="<?php echo "search.php?term=$term&type=games"; ?>">Games</a>
	        </li>

			<li class="<?php echo $type == 'images' ? 'active' : '' ?>">
			    <a class="<?php echo $type == 'images' ? 'active' : '' ?>" href="<?php echo "search.php?term=$term&type=images"; ?>">Imagens</a>
			</li>



			<li class="<?php echo $type == 'livros' ? 'active' : '' ?>">
			    <a href="<?php echo "search.php?term=$term&type=livros"; ?>">Livros</a>
	        </li>

			<li class="<?php echo $type == 'musicas' ? 'active' : '' ?>">
			    <a href="<?php echo "search.php?term=$term&type=musicas"; ?>">Músicas</a>
	        </li>


			<li class="<?php echo $type == 'negocios' ? 'active' : '' ?>">
			    <a href="<?php echo "search.php?term=$term&type=negocios"; ?>">Negócios</a>
	        </li>

			<li class="<?php echo $type == 'noticias' ? 'active' : '' ?>">
			    <a href="<?php echo "search.php?term=$term&type=noticias"; ?>">Notícias</a>
	        </li>

			<li class="<?php echo $type == 'podcasts' ? 'active' : '' ?>">
			    <a href="<?php echo "search.php?term=$term&type=podcasts"; ?>">Podcasts</a>
	        </li>

			<li class="<?php echo $type == 'profissionais' ? 'active' : '' ?>">
			    <a href="<?php echo "search.php?term=$term&type=profissionais"; ?>">Profissionais</a>
	        </li>

	

			<li class="<?php echo $type == 'receitas' ? 'active' : '' ?>">
			    <a href="<?php echo "search.php?term=$term&type=receitas"; ?>">Receitas</a>
	        </li>

			<li class="<?php echo $type == 'social' ? 'active' : '' ?>">
			    <a href="<?php echo "search.php?term=$term&type=social"; ?>">Social</a>
	        </li>

			<li class="<?php echo $type == 'shopping' ? 'active' : '' ?>">
			    <a href="<?php echo "search.php?term=$term&type=shopping"; ?>">Shopping</a>
	        </li>

			<li class="<?php echo $type == 'tecnologia' ? 'active' : '' ?>">
			    <a href="<?php echo "search.php?term=$term&type=tecnologia"; ?>">Tecnologia</a>
	        </li>

			<li class="<?php echo $type == 'tutoriais' ? 'active' : '' ?>">
			    <a href="<?php echo "search.php?term=$term&type=tutoriais"; ?>">Tutoriais</a>
	        </li>

			<li class="<?php echo $type == 'videos' ? 'active' : '' ?>">
			    <a href="<?php echo "search.php?term=$term&type=videos"; ?>">Vídeos</a>
	        </li>

		</div>
	</div>
	



	<?php
		if($type == "links") {
				$resultsProvider = new AllResultsProvider($con);
				$pageSize = 20;
			}
			elseif($type == "anime") {
				$resultsProvider = new AnimeResultsProvider($con);
				$pageSize = 20;
			}
			elseif($type == "aplicativos") {
				$resultsProvider = new AplicativosResultsProvider($con);
				$pageSize = 20;
			}
			elseif($type == "artes") {
				$resultsProvider = new ArtesResultsProvider($con);
				$pageSize = 20;
			}
			elseif($type == "biblia") {
				$resultsProvider = new BibliaResultsProvider($con);
				$pageSize = 20;
			}
			elseif($type == "ceps") {
				$resultsProvider = new CepsResultsProvider($con);
				$pageSize = 20;
			}
			elseif($type == "cursos") {
				$resultsProvider = new CursosResultsProvider($con);
				$pageSize = 20;
			}
			elseif($type == "dicionario") {
				$resultsProvider = new DicionarioResultsProvider($con);
				$pageSize = 20;
			}
			elseif($type == "empregos") {
				$resultsProvider = new EmpregosResultsProvider($con);
				$pageSize = 20;
			}
			elseif($type == "entretenimento") {
				$resultsProvider = new EntretenimentoResultsProvider($con);
				$pageSize = 20;
			}
			elseif($type == "filmes") {
				$resultsProvider = new FilmesResultsProvider($con);
				$pageSize = 20;
			}
			elseif($type == "games") {
				$resultsProvider = new GamesResultsProvider($con);
				$pageSize = 20;
			}
			elseif($type == "livros") {
				$resultsProvider = new GamesResultsProvider($con);
				$pageSize = 20;
			}
			elseif($type == "musicas") {
				$resultsProvider = new MusicasResultsProvider($con);
				$pageSize = 20;
			}
			elseif($type == "negocios") {
				$resultsProvider = new NegociosResultsProvider($con);
				$pageSize = 20;
			}
			elseif($type == "podcasts") {
				$resultsProvider = new PodcastsResultsProvider($con);
				$pageSize = 20;
			}
			elseif($type == "profissionais") {
				$resultsProvider = new ProfissionaisResultsProvider($con);
				$pageSize = 20;
			}
			elseif($type == "receitas") {
				$resultsProvider = new ReceitasResultsProvider($con);
				$pageSize = 20;
			}
			elseif($type == "shopping") {
				$resultsProvider = new ShoppingResultsProvider($con);
				$pageSize = 20;
			}
			elseif($type == "social") {
				$resultsProvider = new SocialResultsProvider($con);
				$pageSize = 20;
			}
			elseif($type == "tecnologia") {
				$resultsProvider = new TecnologiaResultsProvider($con);
				$pageSize = 20;
			}
			
			elseif($type == "tutoriais") {
				$resultsProvider = new TutoriaisResultsProvider($con);
				$pageSize = 20;
			}
			elseif($type == "videos") {
				$resultsProvider = new VideosResultsProvider($con);
				$pageSize = 20;
			}
			else {
				$resultsProvider = new ImageResultsProvider($con);
				$pageSize = 30;
			}

		$numResults = $resultsProvider->getNumResults($term);

		echo "
			<div class='row'>
				<div class='col-12'>
					<div class='float-end'>
						<span class='badge rounded-pill text-bg-secondary me-4'>Resultado Encontrado $numResults</span>
					</div>
				</div>
		";echo "
				<div class='col-sm-8 mb-5'>
					<div class='card mb-5 border-0'>
						<div class='card-body'>";
							echo $resultsProvider->getResultsHtml($page, $pageSize, $term);
					echo "
						</div>
					</div>
				</div>
			</div>
		";
	?>

	<nav class="navbar bg-white fixed-bottom justify-content-center">

				<div class="pageButtons">
					
					<?php
						$pagesToShow = 7;
						$numPages = ceil($numResults / $pageSize);
						$pagesLeft = min($pagesToShow, $numPages);
						$currentPage = $page - floor($pagesToShow / 2);
						if($currentPage < 1) {
							$currentPage = 1;
						}
						if($currentPage + $pagesLeft > $numPages + 1) {
							$currentPage = $numPages + 1 - $pagesLeft;
						}
						while($pagesLeft != 0 && $currentPage <= $numPages) {
							if($currentPage == $page) {
								echo "<div class='pageNumberContainer'>
										<img src='assets/images/pageSelected.png'>
										<span class='pageNumber'>$currentPage</span>
									</div>";
							}
							else {
								echo "<div class='pageNumberContainer'>
										<a href='search.php?term=$term&type=$type&page=$currentPage'>
											<img src='assets/images/page.png'>
											<span class='pageNumber'>$currentPage</span>
										</a>
								</div>";
							}
							$currentPage++;
							$pagesLeft--;
						}
					?>
		
				</div>
		
	</nav>


	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
	<script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>