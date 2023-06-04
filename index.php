<!DOCTYPE html>
<title>Geekou</title>
<html lang="pt-BR" class="h-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Experiência de inserção de buscador no cenário web e identificação de interpéries que promovem a dificuldade de estabelecimento do projeto buscador open source.">
  <meta name="author" content="Fabio D. D. Pozzo and GitHub Helpers">
  <meta name="generator" content="Visual Studio Code">
  <title>Geekou</title>
  <link rel="icon" href="src/images/favicon.ico">
  <link rel="canonical" href="https://geekou.io">
  <link rel="stylesheet" href="src/css/jquery-ui.css">
  <link rel="stylesheet" href="src/css/bootstrap.css">

<<<<<<< HEAD
  <style>
    body {
      box-shadow: inset 0 0 1.7rem rgba(136, 134, 134, 0.5);
=======
      .magnifying-glass-solid {
          height: 50px;
          width: 55px;
        }


    
    </style>

  </head>
  <body class="d-flex h-100 text-center text-bg-white">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">



<main class="px-3">

<nav class="navbar fixed-top">
  <div class="container-fluid">
   
    <!-- Button trigger modal -->
    <button type="button" 
            title="Estatísticas" 
            alt="Estatísticas" 
            class="navbar-brand btn btn btn-link graph-up-arrow.svg" 
            data-bs-toggle="modal" 
            data-bs-target="#exampleModal">
              <img src="graph-up-arrow.svg">
    </button>


    
  </div>
</nav>



    <img src="src/images/geekou.png" class="img-fluid" alt="...">

    

    <form action="https://geekou.io/search.php" method="get">

      <div class="input-group mb-3 rounded-pill shadow-sm">

        <button class="btn btn btn btn-outline-primary rounded-pill rounded-end border border-end-0" type="button" onclick="reco.toggleStartStop()">
          <img id="status_img" src="mic-mute.svg" alt="Start">
        </button>

        <!-- <input type="text" class="form-control border border-end-0 border-start-0" placeholder="Geek + Sextou = ?" 
        action="search.php" method="GET" name="term" id="input_field" size="100" autocomplete="off"> -->
        <input type="text" class="form-control border border-end-0 border-start-0" placeholder="Pesquise.." action="search.php" method="GET" name="term" id="input_field" size="100" autocomplete="off">


        
        <button class="btn btn btn-outline-primary rounded-pill rounded-start border border-start-0" type="submit" value="Search" id="button-addon2">
          <img src="magnifying-glass-solid.svg" class="magnifying-glass-solid" alt="Pesquisar" title="Pesquisar">
        </button>

      </div>

    </form>

    <div id="status" class="fs-6 fw-light"></div>


    <!-- Button trigger modal -->
    <a class="link" href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal2">ou pergunte ao ChatGPT</a>


<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">ChatGPT</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form id="form-pergunta-chat">
          <div class="input-group mb-3">
            <textarea class="form-control" id="campo-pergunta" rows="1" cols="100" placeholder="Digite a pergunta"></textarea>
            <input type="submit" class="btn btn-primary btn-sm" id="btn-pergunta-chat" value="Enviar">
          </div>
        </form>
        <p id="pergunta"></p>
        <p id="resposta"></p>
      </div>

    </div>
  </div>
</div>

</main>

      <footer class="mt-auto">
        <p class="text-center">
          <a href="#" data-bs-toggle="modal" data-bs-target="#privacidadeModal" class="text-footer">Privacidade</a>
          -  
          <a href="#" class="text-footer">Termos e Condições</a>
        </p>
      </footer>



    


  </div>


<script src="chatgpt.js"></script>
<script src="webspeech.js"></script>

<script>
  var reco = new WebSpeechRecognition();
  reco.lang = "pt-BR";
  reco.statusText('status');
  reco.statusImage('status_img');
  reco.finalResults('input_field');

  reco.onEnd = function() {
    if (reco.final_transcript != ' ') {
      input_field.form.submit();
>>>>>>> e38f62ccc810668789692c3a80a8f76752781762
    }

    .cover-container {
      max-width: 42em;
    }

    .cover-container main {
      padding-top: 7rem;
    }

    .cover-container main form {
      padding-top: 1.5rem;
    }

    svg {
      padding: 2px 2px 2px 2px;
    }

    button {
      height: 50px;
      width: 55px;
    }

    .magnifying-glass-solid {
      height: 50px;
      width: 55px;
    }
  </style>

</head>

<body class="d-flex h-100 text-center text-bg-white">

  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

    <main class="px-3">

      <nav class="navbar fixed-top">
        <div class="container-fluid">
          <button type="button" title="Estatísticas" alt="Estatísticas" class="navbar-brand btn btn btn-link graph-up-arrow.svg" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <img src="src/images/graph-up-arrow.svg">
          </button>
        </div>
      </nav>

      <img src="src/images/geekou.png" class="img-fluid" alt="...">

      <form action="https://geekou.io/search.php" method="get">

        <div class="input-group mb-3 rounded-pill shadow-sm">

          <button class="btn btn btn btn-outline-primary rounded-pill rounded-end border border-end-0" type="button" onclick="reco.toggleStartStop()">
            <img id="status_img" src="mic-mute.svg" alt="Start">
          </button>

          <input type="text" class="form-control border border-end-0 border-start-0" placeholder="Pesquise.." action="search.php" method="GET" name="term" id="input_field" size="100" autocomplete="off">

          <button class="btn btn btn-outline-primary rounded-pill rounded-start border border-start-0" type="submit" value="Search" id="button-addon2">
            <img src="src/images/magnifying-glass-solid.svg" class="magnifying-glass-solid" alt="Pesquisar" title="Pesquisar">
          </button>

        </div>

      </form>

      <div id="status" class="fs-6 fw-light"></div>

      <a class="link" href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal2">ou pergunte ao ChatGPT</a>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">ChatGPT</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <form id="form-pergunta-chat">
                <div class="input-group mb-3">
                  <textarea class="form-control" id="campo-pergunta" rows="1" cols="100" placeholder="Digite a pergunta"></textarea>
                  <input type="submit" class="btn btn-primary btn-sm" id="btn-pergunta-chat" value="Enviar">
                </div>
              </form>
              <p id="pergunta"></p>
              <p id="resposta"></p>
            </div>

          </div>
        </div>
      </div>

    </main>

    <footer class="mt-auto">
      <p class="text-center">
        <a href="#" data-bs-toggle="modal" data-bs-target="#privacidadeModal" class="text-footer">Privacidade</a>
        -
        <a href="#" class="text-footer">Termos e Condições</a>
      </p>
    </footer>

  </div>

  <script src="src/js/chatgpt.js"></script>
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

  <script src="src/js/jquery-3.4.1.min.js"></script>
  <script src="src/js/jquery-ui.min.js"></script>
  <script src="src/js/bootstrap.bundle.min.js"></script>

  <script>

    $(function() {
      $("#monId").autocomplete({
        source: 'classes/AjaxSearch.php',
      });
    });

   
  </script>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> <img src="src/images/graph-up-arrow.svg"> Estatísticas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card text-bg-success my-3" style="max-width: 18rem;">
            <div class="card-header">Acessos <?php include "classes/counter.min.php"; ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Política de Privacidade-->

  <div class="modal fade" id="privacidadeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="privacidadeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Política de Privacidade</h1>
        </div>
        <div class="modal-body">

          <p class="mt-2 p-2 fw-light">
       
          </p>

          <p class="p-2 fw-light">
   
          </p>

          <p class="p-2">
 
          </p>

          <ul class="list-group">
            <li class="list-group-item">
      
            </li>
            <li class="list-group-item">
      </li>
            <li class="list-group-item">
    
            </li>
          </ul>

          <h5 class="mt-4">1. Dados que coletamos e motivos de coleta</h5>

          <p class="mt-2 p-2">
 
          </p>

          <ol class="list-group list-group-numbered">

            <li class="list-group-item"><strong>Dados Sensíveis</strong></li>
            <p class="mt-2 p-2">

            </p>

            <li class="list-group-item"><strong>Cookies</strong></li>
            <p class="mt-2 p-2">

            </p>
            <p class="p-2 ">

            </p>

            <ol type="a">
              <li><strong>Cookies de Terceiros</strong></li>
              <p class="mt-2">
  
              </p>
              <p>

              </p>
              <p">
             <span class="fst-italic">cookies</span>
    <span class="fst-italic">link</span>:
                <a class="btn btn-link font-monospace" href="https://developers.google.com/analytics/devguides/collection/gajs/cookie-usage" role="button">
                  Google Analytics
                </a>
                </p>
                <p>

                </p>
                <li><strong>Gestor de Cookies</strong></li>
                <p>
                   <span class="fst-italic">links</span>:
                </p>
                <div class="btn-group-vertical btn-group-sm" role="group" aria-label="Vertical button group">
                  <a class="btn btn-link btn-sm font-monospace" href="https://support.microsoft.com/pt-br/topic/excluir-cookies-no-microsoft-edge-a7d95376-f2cd-8e4a-25dc-1de753474879" role="button">
                    Microsoft Edge
                  </a>
                  <a class="btn btn-link btn-sm font-monospace" href="https://support.apple.com/pt-br/guide/safari/sfri11471/mac" role="button">
                    Safari
                  </a>
                  <a class="btn btn-link btn-sm font-monospace" href="https://support.google.com/chrome/answer/95647?hl=pt-BR&hlrm=pt" role="button">
                    Google Chrome
                  </a>
                  <a class="btn btn-link btn-sm font-monospace" href="https://support.mozilla.org/pt-BR/kb/protecao-aprimorada-contra-rastreamento-firefox-desktop?redirectslug=ative-e-desative-os-cookies-que-os-sites-usam&redirectlocale=pt-BR" role="button">
                    Mozilla Firefox
                  </a>
                  <a class="btn btn-link btn-sm font-monospace" href="https://addons.opera.com/pt-br/extensions/details/disable-cookies/" role="button">
                    Opera
                  </a>
                </div>
                <p>
              
                </p>
                <li><strong>Coleta de dados não previstos expressamente</strong></li>
                <p>
  
                </p>
                <p>
             
                </p>
            </ol>
          </ol>
          <h5 class="mt-4">2. Compartilhamento de dados pessoais com terceiros</h5>
          <p class="p-2">

          </p>
          <h5 class="mt-4">3. Por quanto tempo seus dados pessoais serão armazenados</h5>
          <p class="p-2">

          </p>
          <p class="p-2">

          </p>

          <h5 class="mt-4">4. Bases legais para o tratamnto de dados pessoais</h5>
          <p class="p-2">
 
          </p>
          <p class="p-2">

          </p>

          <ol class="list-group list-group-numbered">
            <li class="list-group-item"><strong>Como o titular pode exercer seus direitos</strong></li>
            <p class="mt-2 p-2">

            </p>
          </ol>

          <h5 class="mt-4">5. Medidas de segurana no tratamento de dados pessoais</h5>
          <p class="p-2">

          </p>
          <p class="p-2">
    
          </p>
          <p class="p-2">
 
            </br>
      
            </br>

            </br>

          </p>
          <p class="p-2">

          </p>
          <p class="p-2">

          </p>

          <h5 class="mt-4">6. Alteraço nesta política</h5>
          <p class="fp-2">

          </p>
          <p class="p-2">

          </p>
          <p class="p-2">

          </p>

          <h5 class="mt-4">7. Como entrar em contato conosco</h5>
          <p class="p-2">

          </p>

        </div>

        <div class="d-grid gap-2">
          <div class="modal-footer">
            <div class="container-fluid">
              <button type="button" class="btn btn-primary btn-sm float-start" data-bs-dismiss="modal" title="Concordo" alt="Concordo">
                <small>Aceito</small>
              </button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>

</body>

<<<<<<< HEAD
</html>
=======



  </body>
</html>
>>>>>>> e38f62ccc810668789692c3a80a8f76752781762
