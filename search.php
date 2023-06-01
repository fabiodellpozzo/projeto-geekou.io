<?php
	include("data/config.phpconfig.php");
	include("classes/AllResultsProvider.php");
	include("classes/DicionarioResultsProvider.php");
	if(isset($_GET["term"])) {$term = $_GET["term"];}
	else {exit("Você deve inserir um termo de pesquisa.");}
	$type = isset($_GET["type"]) ? $_GET["type"] : "links";
	$page = isset($_GET["page"]) ? $_GET["page"] : 1;

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Geekou</title>
    <link rel="stylesheet" href="src/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/css/style.css" >
    <link rel="stylesheet" href="assets/fontawesome-free-5.15.4-web/css/all.css" />
    <link rel="stylesheet" href="assets/jquery-ui.css">
    <link rel="stylesheet" href="assets/jquery.fancybox.min.css" />
    <script src="src/js/jquery-3.3.4.min.js"></script>

	<style>

        .btn-chevron-up{
			font-size: 2em; 
			color: #3300cc;
			border: 0px;
			padding: 1px;
			align-items: center;
		}

		.btn-chevron-up2{
			font-size: 2em; 
			color: #6495ED;
			border: 0px;
			padding: 1px;
			align-items: center;
		}

		.btn-search{
			font-size: 1.5em; 
			color: #3300cc;
			border: 0px;
		}

		.btn-microphone{
			font-size: 1.5em; 
			color: #3300cc;
			border: 0px;}

		.pageButtons {display: flex;}

		.pageNumberContainer img { 
			height: 12px;
			padding-left: 0.7em;
		}
		.pageNumberContainer,
		.pageNumberContainer a { 
			display: flex; 
			flex-direction: column; 
			align-items: center;
			text-decoration: none;
		}
		.pageNumber {
			color: #A9A9A9;
			font-size: 13px;
			padding-top: 0em;
			padding-left: 0.5em;
			align-items: center;
		}
		a .pageNumber {color: #3300cc;}
		.mainResultsSection .imageResults {margin: 20px;}
		.gridItem {position: relative;}
		.gridItem img {max-width: 200px;min-width: 50px;visibility: hidden;}
		.gridItem .details {visibility: hidden;position: absolute;bottom: 0px;left: 0px;width: 100%;overflow: hidden;background-color: rgba(0,0,0,0.8);color: #fff;font-size: 11px;padding: 3px;box-sizing: border-box;white-space: nowrap;}
		.gridItem:hover .details {visibility: visible;}
		i{padding-right: 7px;}
	</style>
</head>
<body>

    <form role="search" action="search.php" method="GET">
		<header class="navbar bg-white fixed-top flex-md-nowrap p-0 shadow mb-4">
			<div class="input-group input-group-sm m-1">
				<a class="navbar-brand" href="https://geekou.io"><img src="geekouLogo.png" class="img-fluid" alt="..."></a>
				<input type="hidden" name="type" value="<?php echo $type; ?>">
				<button 
				          type="button" 
				          class="btn btn-outline-primary border border-end-0 rounded-pill rounded-end" 
				          id='start' 
				          value='Start' 
				          onclick="reco.toggleStartStop()" 
				          title="Inserir Texto com Voz">
				    
				    <img id="status_img" src="mic-mute.svg" alt="Start">
				    
				    </button>
				<input type="text" class="form-control form-control-sm border border-start-0 border-end-0 border-top border-bottom" name="term" value="<?php echo $term; ?>" autocomplete="off">
				<button type="submit" class="btn btn-outline-primary border border-start-0 border-top border-bottom rounded-pill rounded-start"><img src="src/images/magnifying-glass-solid-2.svg" class="magnifying-glass-solid" alt="Pesquisar" title="Pesquisar"></button>
			</div>
		</header>
    </form>

    <div class="pn-ProductNav_Wrapper">
        <nav id="pnProductNav" class="pn-ProductNav">
			<div id="pnProductNavContents" class="pn-ProductNav_Contents">
				<a class="pn-ProductNav_Link" href="<?php echo "search.php?term=$term&type=links"; ?>" aria-selected="true"> <p class='btn-chevron-up'>&#366;</p></a></li>
				<span id="pnIndicator" class="pn-ProductNav_Indicator"></span>
			</div>
        </nav>
		<button id="pnAdvancerLeft" class="pn-Advancer pn-Advancer_Left" type="button"><svg class="pn-Advancer_Icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551 1024"><path d="M445.44 38.183L-2.53 512l447.97 473.817 85.857-81.173-409.6-433.23v81.172l409.6-433.23L445.44 38.18z"/></svg></button>
		<button id="pnAdvancerRight" class="pn-Advancer pn-Advancer_Right" type="button"><svg class="pn-Advancer_Icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 551 1024"><path d="M105.56 985.817L553.53 512 105.56 38.183l-85.857 81.173 409.6 433.23v-81.172l-409.6 433.23 85.856 81.174z"/></svg></button>
    </div>

    <?php

		if($type == "links"){$resultsProvider = new AllResultsProvider($con);$pageSize = 20;}
		else {$resultsProvider = new AllResultsProvider($con);$pageSize = 30;}
		$numResults = $resultsProvider->getNumResults($term);
		echo "

			<div class='row'>
				<div class='col-12'>
					<div class='float-start p-1'>
					<p class='text-start fs-6'>Encontrado $numResults </p>
				</div>
			</div>

		";

		echo "
			<div class='col-sm-8 mb-5'>
				<div class='card mb-5 border-0'>
					<div class='card-body'>";
					echo $resultsProvider->getResultsHtml($page, $pageSize, $term);
		echo "
					</div>
				</div>
			</div>
		";
	?>

	<nav class="navbar fixed-bottom">

		<div class="container-fluid justify-content-center">

			<div class="paginationContainer">

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

							echo"   <div class='pageNumberContainer'>
							            <p class='btn-chevron-up'>&#366;</p>
										<span class='pageNumber'>$currentPage</span>
									</div>";

							}

						else {

							echo"   <div class='pageNumberContainer'>
										<a href='search.php?term=$term&type=$type&page=$currentPage'>
									    <p class='btn-chevron-up2'>&#362;</p>
											<span class='pageNumber'>$currentPage</span>
										</a>
									</div>";
								}
						$currentPage++;
						$pagesLeft--;
						}
					?>	
				</div>
			</div>
		</div>
	</nav>
    <script src="src/js/jquery-3.4.1.min.js"></script>
    <script src="src/js/jquery-ui.min.js"></script>
    <script src="src/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
	<script type="text/javascript" src="src/js/script.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script  src="src/js/script.js"></script>
    <script src="src/js/bootstrap.bundle.min.js"></script>
    <script src="src/js/feather.min.js"></script>
    <script src="src/js/Chart.min.js"></script>
    <script src="src/js/dashboard.js"></script>
	<script src="src/js/webspeech.js"></script>

	<script>
	var reco = new WebSpeechRecognition();
	reco.lang = "pt-BR";
	reco.statusText('status');
	reco.statusImage('status_img');
	reco.finalResults('input_field');

	reco.onEnd = function() {
		if (reco.final_transcript != ' ') {
		input_field.form.submit();
		}
	};
	</script>

	<script>
      $(function() {
        $( "#monId" ).autocomplete({
          source: 'classes/AjaxSearch.php',
        });

      });

      shortcut={all_shortcuts:{},

      add:function(a,b,c){

        var d={

                type:"keydown",

                propagate:!1,

                disable_in_input:!1,

                target:document,keycode:!1

              };

          if(c)

          for(var e in d)"undefined"==typeof c[e]&&(c[e]=d[e]);

          else c=d;d=c.target,

            "string"==typeof c.target&&(d=document.getElementById(c.target)),

              a=a.toLowerCase(),

              e=function(d){d=d||window.event;

          if(c.disable_in_input){

        var e;d.target?e=d.target:d.srcElement&&(e=d.srcElement),3==e.nodeType&&(e=e.parentNode);

          if("INPUT"==e.tagName||"TEXTAREA"==e.tagName)

          return}

          d.keyCode?code=d.keyCode:d.which&&(code=d.which),e=String.fromCharCode(code).toLowerCase(),

            188==code&&(e=","),

            190==code&&(e=".");

        var f=a.split("+"),

          g=0,h={

                  "`":"~",1:"!",2:"@",3:"#",4:"$",5:"%",6:"^",7:"&",8:"*",9:"(",0:")",

                  "-":"_","=":"+",";":":","'":'"',",":"<",".":">","/":"?","\\":"|"

                },

          i={

              esc:27,escape:27,tab:9,space:32,

              "return":13,enter:13, backspace:8, scrolllock:145, scroll_lock:145, scroll:145, capslock:20, 

              caps_lock:20, caps:20,numlock:144,num_lock:144,num:144,pause:19,

              "break":19,insert:45,home:36,

              "delete":46, end:35,pageup:33,page_up:33,pu:33,pagedown:34,page_down:34,pd:34,left:37,

              up:38,right:39,down:40,f1:112,f2:113,f3:114,f4:115,f5:116,f6:117,f7:118,f8:119,f9:120,f10:121,

              f11:122,f12:123

            },

              j=!1,l=!1,m=!1,n=!1,o=!1,p=!1,q=!1,r=!1;

              d.ctrlKey&&(n=!0),

              d.shiftKey&&(l=!0),

              d.altKey&&(p=!0),

              d.metaKey&&(r=!0);

          for(var s=0;k=f[s],s<f.length;s++)

            "ctrl"==k||"control"==k?(g++,m=!0):"shift"==k?(g++,j=!0):"alt"==k?(g++,o=!0):"meta"==k?(g++,q=!0):1<k.length?i[k]==code&&g++:c.keycode?c.keycode==code&&g++:e==k?g++:h[e]&&d.shiftKey&&(e=h[e],e==k&&g++);

          if(g==f.length&&n==m&&l==j&&p==o&&r==q&&(b(d),!c.propagate))

          return  d.cancelBubble=!0,d.returnValue=!1,d.stopPropagation&&(d.stopPropagation(),d.preventDefault()),!1},

            this.all_shortcuts[a]={callback:e,target:d,event:c.type},

              d.addEventListener?d.addEventListener(c.type,e,!1):d.attachEvent?d.attachEvent("on"+c.type,e):d["on"+c.type]=e},

                  remove:function(a){var a=a.toLowerCase(),

                    b=this.all_shortcuts[a];

                    delete this.all_shortcuts[a];

          if(b){

        var a=b.event,c=b.target,b=b.callback;

          c.detachEvent?c.detachEvent("on"+a,b):c.removeEventListener?c.removeEventListener(a,b,!1):c["on"+a]=!1}}},

              shortcut.add("esc",function(){top.location.href="https://geekou.io"});

              shortcut.add("Ctrl+F",function(){top.location.href="https://geekou.io"});

              shortcut.add("Ctrl+Shift+Del",function(){top.location.href="https://geekou.io"});

              shortcut.add("Ctrl+Shift+I",function(){top.location.href="https://geekou.io"});

              shortcut.add("Ctrl+U",function(){top.location.href="https://geekou.io"});

              shortcut.add("F12",function(){top.location.href="https://geekou.io"});

              shortcut.add("Ctrl+S",function(){top.location.href="https://geekou.io"});

        var message="";function clickIE() {

          if (document.all) {(message);

            return false;}}function clickNS(e) {

          if(document.layers||(document.getElementById&&!document.all)) {

          if (e.which==2||e.which==3) {(message);

            return false;}}}

          if (document.layers){document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}

            else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}document.oncontextmenu=new Function("return false")

    </script>

    </body>

</html>