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

  <style>
    body {
      box-shadow: inset 0 0 1.7rem rgba(136, 134, 134, 0.5);
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

    shortcut = {
        all_shortcuts: {},
        add: function(a, b, c) {
          var d = {type: "keydown",propagate: !1,disable_in_input: !1,target: document,keycode: !1};
          if (c)
            for (var e in d) "undefined" == typeof c[e] && (c[e] = d[e]);
          else c = d;
          d = c.target,
            "string" == typeof c.target && (d = document.getElementById(c.target)),
            a = a.toLowerCase(),
            e = function(d) {
              d = d || window.event;
              if (c.disable_in_input) {
                var e;
                d.target ? e = d.target : d.srcElement && (e = d.srcElement), 3 == e.nodeType && (e = e.parentNode);
                if ("INPUT" == e.tagName || "TEXTAREA" == e.tagName)
                  return
              }
              d.keyCode ? code = d.keyCode : d.which && (code = d.which), e = String.fromCharCode(code).toLowerCase(),
                188 == code && (e = ","),
                190 == code && (e = ".");
              var f = a.split("+"),
                g = 0,
                h = {"`": "~",1: "!",2: "@",3: "#",4: "$",5: "%",6: "^",7: "&",8: "*",9: "(",0: ")","-": "_","=": "+",";": ":","'": '"',",": "<",".": ">","/": "?","\\": "|"},
                i = {esc: 27,escape: 27,tab: 9,space: 32,"return": 13,enter: 13,backspace: 8,scrolllock: 145,scroll_lock: 145,scroll: 145,capslock: 20,caps_lock: 20,caps: 20,numlock: 144,num_lock: 144,num: 144,pause: 19,"break": 19,insert: 45,home: 36,"delete": 46,end: 35,pageup: 33,page_up: 33,pu: 33,pagedown: 34,page_down: 34,pd: 34,left: 37,up: 38,right: 39,down: 40,f1: 112,f2: 113,f3: 114,f4: 115,f5: 116,f6: 117,f7: 118,f8: 119,f9: 120,f10: 121,f11: 122,f12: 123
                },
                j = !1,l = !1,m = !1,n = !1,o = !1,p = !1,q = !1,r = !1;d.ctrlKey && (n = !0),d.shiftKey && (l = !0),d.altKey && (p = !0),d.metaKey && (r = !0);
              for (var s = 0; k = f[s], s < f.length; s++)
                "ctrl" == k || "control" == k ? (g++, m = !0) : "shift" == k ? (g++, j = !0) : "alt" == k ? (g++, o = !0) : "meta" == k ? (g++, q = !0) : 1 < k.length ? i[k] == code && g++ : c.keycode ? c.keycode == code && g++ : e == k ? g++ : h[e] && d.shiftKey && (e = h[e], e == k && g++);
              if (g == f.length && n == m && l == j && p == o && r == q && (b(d), !c.propagate))
                return d.cancelBubble = !0, d.returnValue = !1, d.stopPropagation && (d.stopPropagation(), d.preventDefault()), !1
            },
            this.all_shortcuts[a] = {callback: e,target: d,event: c.type
            },
            d.addEventListener ? d.addEventListener(c.type, e, !1) : d.attachEvent ? d.attachEvent("on" + c.type, e) : d["on" + c.type] = e
        },
        remove: function(a) {
          var a = a.toLowerCase(),
            b = this.all_shortcuts[a];
          delete this.all_shortcuts[a];
          if (b) {
            var a = b.event,c = b.target,b = b.callback;
            c.detachEvent ? c.detachEvent("on" + a, b) : c.removeEventListener ? c.removeEventListener(a, b, !1) : c["on" + a] = !1
          }
        }
      },
      shortcut.add("esc", function() {top.location.href = "https://geekou.io"});
      shortcut.add("Ctrl+F", function() {top.location.href = "https://geekou.io"});
      shortcut.add("Ctrl+Shift+Del", function() {top.location.href = "https://geekou.io"});
      shortcut.add("Ctrl+Shift+I", function() {top.location.href = "https://geekou.io"});
      shortcut.add("Ctrl+U", function() {top.location.href = "https://geekou.io"});
      shortcut.add("F12", function() {top.location.href = "https://geekou.io"});
      shortcut.add("Ctrl+S", function() {top.location.href = "https://geekou.io"});
    var message = "";
    function clickIE() {if (document.all) {(message);return false;}}
    function clickNS(e) {
      if (document.layers || (document.getElementById && !document.all)) {if (e.which == 2 || e.which == 3) {(message);return false;}}}
      if (document.layers) {document.captureEvents(Event.MOUSEDOWN);document.onmousedown = clickNS;
      } else {document.onmouseup = clickNS;document.oncontextmenu = clickIE;}
    document.oncontextmenu = new Function("return false")
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

</html>