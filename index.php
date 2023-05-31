<!DOCTYPE html>
<title>Geekou</title>
<html lang="pt-BR" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Experiência de inserção de buscador no cenário web e identificação de interpéries que promovem a dificuldade de estabelecimento do projeto.">
    <meta name="author" content="Fabio D. D. Pozzo">
    <meta name="generator" content="Visual Studio Code">
<!-- 
    <link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
-->
    <link rel="icon" href="favicon.ico">
    <title>Geekou</title>
    <link rel="canonical" href="https://geekou.io">
	  <link rel="stylesheet" href="jquery-ui.css">
    <link href="bootstrap.css" rel="stylesheet">
	
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



    <img src="geekou.png" class="img-fluid" alt="...">

    

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
    }
  };
</script>



<script src="assets/jquery-3.4.1.min.js"></script>
    <script src="assets/jquery-ui.min.js"></script>
	<script>
      $(function() {
        $( "#monId" ).autocomplete({
          source: 'AjaxSearch.php',
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        
        <h5 class="modal-title" id="exampleModalLabel"> <img src="graph-up-arrow.svg"> Estatísticas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          
          

        <div class="card text-bg-success my-3" style="max-width: 18rem;">
          <div class="card-header">Acessos <?php include "counter.min.php"; ?></div>
     
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
          Este site é mantido por geekou.io - sistema de busca nacional brasileiro em desenvolvimento e testes.
        </p>

        <p class="p-2 fw-light">
          Até o momento não coletamos e utilizamos dados pessoais próprios e sensíveis. De acordo com a atualizaço do projeto e recursos extras
          adicionados ser apresentado nesta política as implementaões e requisitos de uso.
        </p>

        <p class="p-2">
          Nós cuidamos da proteço destes dados e, por isso, disponibilizamos esta poltica de privacidade, que contm informaçes importantes sobre:
        </p>

          <ul class="list-group">
            <li class="list-group-item">
              No restringimos o uso de pesquisa a este site.
            </li>
            <li class="list-group-item">
              So armazenados apenas informaçes onde efetuando uma pesquisa,como por exemplo a palavra-chave no qual digitou e o resultado 
              desta pesquisa e o link no qual clicou sem identificaço pessoal.</li>
            <li class="list-group-item">
              Até o momento é exibido em nossa pesquisa informaões de insero prpria do buscador Geekou.
            </li>
          </ul>

          <h5 class="mt-4">1. Dados que coletamos e motivos de coleta</h5>

            <p class="mt-2 p-2">
              Nosso site coleta e utiliza alguns dados pessoais de nosso usurios através de cookies de terceiros, de acordo com o disposto nesta seção.
            </p>

            <ol class="list-group list-group-numbered">

              <li class="list-group-item"><strong>Dados Sensíveis</strong></li>
              <p class="mt-2 p-2">
                No serão coletados dados sensíveis de nosso usuários, assim entendidos aqueles definidos nos arts. 11 e seguintes da Lei de 
                Proteo de Dados Pessoais. Assim, não haver coleta de dados sobre origem racial ou tnica, convicço religiosa, opinio pública, 
                filiaço a sindicato ou a organização de crcter religioso, dado referente à sade ou a vida sexual, dado genético ou biomtrico,
                quando vinculado a uma pessoa natural.
              </p>

              <li class="list-group-item"><strong>Cookies</strong></li>
              <p class="mt-2 p-2">
                Cookies so pequenos arquivos de texto baixados automaticamente em seu dispositivo quando acessa e navega por um site. Eles servem, 
                basicamente, para que seja possvel identificar dispositivos, atividades e preferências de usuários.
              </p>
              <p class="p-2 ">
                Os cookies no permitem que qualquer arquivo ou informaço seja extraído do disco rgido do uauário, no sendo possível, ainda que, 
                por meio deles se tenha acesso a informações pessoais que não tenham partido do usurio ou da forma como utiliza os recursos do site.
              </p>

                <ol type="a">
                  <li ><strong>Cookies de Terceiros</strong></li>
                    <p class="mt-2">
                      Alguns de nossos parceiros podem configurar cookies nos dispositivos dos usuários que acessam nosso site.
                    </p>
                    <p>
                      Estes cookies, em geral, visam possibilitar que nossos parceiros possam oferecer seu conteúdo e seus servios
                      ao usurio que acessa nosso site de forma personalizada, por meio da obtenão de dados de navegação extrados a partir 
                      de sua interação com o site.
                    </p>
                    <p">
                      O usuário poder obter mais informaões sobre <span class="fst-italic">cookie de terceiro</span> e sobre a forma como
                      os dados obtidos a partir dele so tratados, alm de ter acesso  descriço dos <span class="fst-italic">cookies</span>
                      utilizados e de suas caractersticas, acessando o seguinte <span class="fst-italic">link</span>:
                      <a class="btn btn-link font-monospace" href="https://developers.google.com/analytics/devguides/collection/gajs/cookie-usage" role="button">
                        Google Analytics
                      </a>
                    </p>
                    <p >
                      As entidades encarregadas da coleta dos cookies poderão ceder as informaçes obtidas a terceiros.
                    </p>
                  <li><strong>Gesto de Cookies</strong></li>
                    <p>
                      O usurios poderá se opor ao registro de cookies pelo site, bastando que desative esta opo no seu próprio navegado. Mais
                      informaões sobre como fazer isso em alguns dos principais navegadores utilizados hoje podem ser acessadas a partir dos 
                      seguintes <span class="fst-italic">links</span>:
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
                      A desativaço dos cookies, no entanto, pode afetar a disponibilidade de algumas ferramentas e funcionalidades do site,
                      comprometendo seu correto e esperado funcionamento. Outra consequncia possvel é a remoço de preferências do usurio 
                      que eventualmente tiverem sido salvas, prejudicando sua experiência.
                    </p>
                  <li><strong>Coleta de dados não previstos expressamente</strong></li>
                    <p>
                      Eventualmente, outros tipos de dados não previstos expressamente nesta Poltica de Privacidade poderão ser coletados, 
                      desde que sejam fornecidos com o consentimento do uaurio, ou, ainda, que a coleta seja permitida com fundameno em outra base 
                      legal prevista em lei.
                    </p>
                    <p >
                      Em qualquer caso, a coleta de dados e as atividades de tratamento dela decorrentes serão informadas aos usuários do site.
                    </p>
                </ol>
            </ol>
            <h5 class="mt-4">2. Compartilhamento de dados pessoais com terceiros</h5>
            <p class="p-2">
              Ns não compatilhamos seus dados pessoais com terceiros, Apesar disso,  possvel que o faamos para cumprir alguma determinao
              legal ou regulatória, ou, ainda, para cumprir alguma ordem expedida por autoridade pública.
            </p>
            <h5 class="mt-4">3. Por quanto tempo seus dados pessoais serão armazenados</h5>
            <p class="p-2">
              Os dados pessoais coletados pelo site são armazenados e utilizados por período de tempo que corresponda ao necessário para as
              finalidades elencadas neste dcoumento e que considere os direito de seus titulares, os direitos do controlador do site e as 
              disposições legais ou regulatrias aplicveis.
            </p>
            <p class="p-2">
              Uma vez expirados os períodos de armazenamento dos dados pesoais, eles são removidos de nossas bases de dados ou anonimizados, salvo
              nos casos em que houver a possibilidade ou a necessidade de armazenamento em virtude de disposião legal ou regulatória.
            </p>

            <h5 class="mt-4">4. Bases legais para o tratamnto de dados pessoais</h5>
            <p class="p-2">
              Cada operação de tratamento de dados pessoais precisa ter um fundamento jurídico, ou seja, uma base legal, que nada mais é que uma 
              justificativa que a autorize, prevista na Lei Geral de Proteão de Dados Pessoais.
            </p>
            <p class="p-2">
              Todas as Nossas atividades de tratamento de dados pessoais possuem uma base legal que as fundamnta, dentre as permitida pela legislação. Mais
              informaões sobre a bases legais que utilizamos para operaçes de tratamento de dados pessoais especificas podem ser obtidas a partir de 
              nossos canais de contato, informados ao final desta Política.
            </p>

            <ol class="list-group list-group-numbered">
              <li class="list-group-item"><strong>Como o titular pode exercer seus direitos</strong></li>
                <p class="mt-2 p-2">
                  Para garantir que o usuário que pretende exercer seus direitos é, de fato, o titular dos dados pessoais objeto da requisião,
                  poderemos solicitar documentos ou outras informações que possam auxiliar em sua correta identificaão, a fim de resguardar nossos 
                  direitos e os direitos de terceiros. Isto somente ser feito, porm, se for absolutamente necessrio, e o requerente receberá 
                  todas as informaes relacionadas.
                </p>
            </ol>
            
            <h5 class="mt-4">5. Medidas de segurana no tratamento de dados pessoais</h5>
            <p class="p-2">
              Empregamos medidas técnicas e organizativas aptas a proteger os dados pessoais de acessos no autorizdos e de situaões de destruio, 
              perda, extravio ou alterao desses dados.
            </p>
            <p class="p-2">
              As medidas que utilizamos levam em considerao a natureza dos dados, o contexto e a finalidade do tratamento, os riscos que uma
              eventual violaão geraria para os direitos e liberdades do usuário, e os padrões atualmente empregados no mercado por negcios
              semelhantes ao nosso.
            </p>
            <p class="p-2">
              Entre as medidas de segurança adotadas por ns, destacamos as seguintes:
              </br>
              - armazenamento de senhas utilizando hashs criptogrficos;
              </br>
              - restrições de acessos a bancos de dados;
              </br>
              - monitoramento de acesso físico a servidores; 
            </p>
            <p class="p-2">
              Ainda que adote tuo o que está ao seu alcance para evitar incidentes de segurança,  possível que ocorra algum problema motivado
              exclusivamente por um terceiro - como em caso de ataques de crackers ou, ainda, em caso de culpa exclusiva do usuário, que ocorre,
              por exemplo, quando ele mesmo transfere seus dados a terceiro. Assim, embora sejamos, em geral, responsveis pelos dados pessoais
              que tratamos, nos eximimos de responsabilidade caso ocorra uma situaão excepcional como essas, sobre as quais não temos tipo de
              controle. 
            </p>
            <p class="p-2">
              De qualquer forma, caso ocorra qualquer tipo de incidente de segurança que possa gerar risco ou dano relevante para qualquer de nossos
              usurios, comunicaremos os afetados e a Autoridade Nacional de Proteão de Dados acerca do ocorrido, em conformidade com o disposto
              na Lei Geral de Proteção de Dados.
            </p>

            <h5 class="mt-4">6. Alteraço nesta política</h5>
            <p class="fp-2">
              A presente verso desta Poltica de Privacidade foi atualizada pela última vez em: 15/01/2023.
            </p>
            <p class="p-2">
              Reservamos-nos o direito de modificar, a qualquer momento, as presentes normas, especialmente para adaptá-las às eventuais alteraes
              feitas em nosso site, seja pela disponibilizaão de novas funcionalidades, seja pela supressão ou modificao dquelas já existentes.
            </p>
            <p class="p-2">
              Sempre que houver uma modificaço, nossos úsurios registrados serão notificados acerca da mudana.
            </p>

            <h5 class="mt-4">7. Como entrar em contato conosco</h5>
            <p class="p-2">
              Para esclarecer quaisquer dvidas sobre esta Política de Privacidade ou sobre os dados pessoais que tratamos, entre em contato com nosso
              Encarregado de Proteão de Dados Pessoais, pelo canal mencionado: officer-dpo@geekou.io
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
      <!-- Content here -->
</div>
    </div>
  </div>
  </div>
  </div>





  </body>
</html>
