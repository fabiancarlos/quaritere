@extends('layouts.main')

@section('title', 'Quariterê')

@section('content')

<div class="head-container d-flex w-100 h-30 p-3 mx-auto flex-column">
  <header class="masthead mb-auto">
    <div class="inner">
      <a href="#" class="masthead-brand">
        <img class="mb-2" src="/img/logo.png"  width="90" height="90">
      </a>
      <nav class="nav nav-masthead p-4 justify-content-center">
        <!-- <a class="nav-link btn-navigate" href="#pre_show">Pré-mostra</a> -->
        {{-- <a class="nav-link btn-navigate" href="#show_main">Filmes Selecionados</a> --}}
        {{-- <a class="nav-link btn-navigate" href="#about">Quariterê</a> --}}
        <!-- <a class="nav-link btn-navigate" href="#previous_events">Mostras anteriores</a> -->
        {{-- <a class="nav-link btn-navigate" href="#regulation">Regulamento</a> --}}
        {{-- <a class="nav-link btn-navigate" href="#jury">Juri</a> --}}
        {{-- <a class="nav-link btn-navigate" href="#special_guest">Convidado especial</a> --}}
        <!-- <a class="nav-link btn-navigate" href="#subscription">Inscrição</a> -->
        <a class="nav-link btn-navigate" href="#afrocine">Afrocine</a>
        <?php if ($current_user): ?>
          <a class="btn btn-link custom-navigate" href="{{ route('logout') }}">{{ $current_user->name }}</a>
        <?php else: ?>
          <a class="btn btn-link custom-navigate" href="{{ route('register') }}">Participar</a>
        <?php endif ?>
      </nav>
    </div>
  </header>
</div>

<section class="main-banner-background">
  <div class="main-banner-container">
     <div class="main-banner">
      {{-- <a href="#video" class="banner-link btn-navigate">
      </a> --}}
    </div>
  </div>
</section>

{{-- <section class="show_main-container" id="show_main">
  <div class="container-lg main-show_main-info">
    <h2 class="info-title info-title-reverse">Filmes selecionados</h2>

    <div class="bar-title-container">
      <div class="bar-title bar-title-red"></div>
      <div class="bar-title bar-title-yellow"></div>
      <div class="bar-title bar-title-green"></div>
    </div>

    @forelse ($categories as $category)
      <h3 class="info-title-lead info-title-lead-reverse">{{ $category->name }}</h3>

      <div class="card-video-container">
        <div class="card-video-control card-video-control-left action-video-left">
          <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-chevron-double-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
            <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
          </svg>
        </div>
        <div class="card-videos-list">
          @forelse ($category->videos as $video)

          <a
            href="{{ $current_user ? '#' : '/register'}}"
            class="card-video-item video-image {{ $current_user && $video->is_video_available() ? 'show-video' : 'show-welcome'}}"
            data-videoid="{{ $video->video_link_id }}"
            data-youtubeurl="{{ $video->video_link }}"
            data-currentvideo="{{ $video->id }}"
          >
            <div class='card-video-image' style="background-image: url('{{ url('storage/'. $video->image) }}');"></div>
            <div class='card-video-info'>
              <h4 class="card-video-title">{{ $video->name }}</h4>
              <h5 class="card-video-subtitle">{{ $video->director }}</h5>
              <h5 class="card-video-subinfo">{{ $video->length_time_show }}</h5>
            </div>

            @if ($video->is_video_available())
              <div class='tag-available'>ASSISTA</div>
            @endif
          </a>

          @empty
            <p class="empty-results">Nenhum filme no momento</p>
          @endforelse
        </div>
        <div class="card-video-control card-video-control-right action-video-right">
          <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-chevron-double-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
            <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
          </svg>
        </div>
      </div>
      
    @empty
      <p class="empty-results">Nenhum filme no momento</p>
    @endforelse
  </div>
</section> --}}

<!-- <section class="video-container" id="video">
  <div class="container main-video-info">
    <h2 class="info-title">V Mostra de cinema negro</h2>

    <div class="bar-title-container">
      <div class="bar-title bar-title-red"></div>
      <div class="bar-title bar-title-yellow"></div>
      <div class="bar-title bar-title-green"></div>
    </div>

    <div class="video-container">
      <video
        id="my-video"
        class="video-js"
        controls
        preload="auto"
        width="800"
        height="440"
        poster="/img/post.png"
        data-setup="{}"
      >
        <source src="/video/v_mostra.mp4" type="video/mp4" />
        <source src="/video/v_mostra.webm" type="video/webm" />
        <p class="vjs-no-js">
          Para ver esse vídeo, ative o javascript do ser browser, ou considere
          atualizar seu browser para
          <a href="https://videojs.com/html5-video-support/" target="_blank"
            >suportar vídeos HTML5</a
          >
        </p>
      </video>
    </div>
    
  </div>
</section> -->

<div id="about"></div>

<section class="about-container">
  <div class="container main-about-info">
    <h2 class="info-title">Sobre o Quariterê</h2>

    <div class="bar-title-container">
      <div class="bar-title bar-title-red"></div>
      <div class="bar-title bar-title-yellow"></div>
      <div class="bar-title bar-title-green"></div>
    </div>

    <p class="info-description">
      O Coletivo de Audiovisual Negro Quariterê é formado por afrodescendentes que atuam como produtores e entusiastas do audiovisual do Estado de Mato Grosso, com o objetivo de discutir temáticas relacionadas às questões raciais e suas interseccionalidades, que agravam preconceitos de gênero, sexualidade, geracional, estratificação social e econômica. Nesse sentido, o Coletivo de Audiovisual Negro Quariterê realiza, incentiva e apoia ações voltadas para a promoção da equidade de raça e gênero no segmento audiovisual. 
    </p>
    <p class="info-description">
      O Coletivo Quariterê tem a missão de propor, debater, influenciar e monitorar políticas públicas nos âmbitos municipal e estadual que convergem em ações afirmativas para inclusão dos profissionais negros e negras em toda a cadeia produtiva do segmento audiovisual.
    </p>
    <p class="info-description">
      O Quariterê, homenageado no nome do coletivo, foi o Quilombo do Quariterê, localizado na região de Vila Bela, primeira capital do estado. A história do quilombo, é a história de Teresa de Benguela, rainha do Quariterê. Sua resistência heróica e seu espírito democrático foram inspirações para a criação desse lugar de aquilombamento para os profissionais do audiovisual mato-grossense, esse lugar onde podem chegar e se reconhecer entre pares. 
    </p>
    <p class="info-description">
      O encontro de profissionais negros da cultura e do audiovisual que daria origem ao Coletivo Quariterê aconteceu em 19 de setembro de 2017, dias após participarem da Oficina de Cinema Negro ministrada pelo Prof. Dr. Celso Prudente na Universidade Federal de Mato Grosso, entre 11 e 14 de setembro do mesmo ano.
    </p>

    <hr>
  </div>
</section>

<!-- <section class="previous-events-container" id="previous_events"></section> -->

<!--
<section class="regulation-container" id="regulation">
  <div class="container">
    <div class=" main-regulation-info">
      <h2 class="info-title">Regulamento</h2>

      <div class="bar-title-container">
        <div class="bar-title bar-title-red"></div>
        <div class="bar-title bar-title-yellow"></div>
        <div class="bar-title bar-title-green"></div>
      </div>

      <p class="info-description">
        A 5ª Mostra de Cinema Negro de MT será realizada no período de 06 a 13 de setembro de
2020 através da plataforma <a href="http://www.quaritere.com.br">www.quaritere.com.br</a>. Os filmes exibidos serão armazenados em
links não-listados no YouTube e indexados em nosso site oficial. 
      </p>

      <div class="action-contianer">
        <button class="btn-link pull-right" data-toggle="modal" data-target="#modal-regulation">
          Conferir Regulamento
        </button>
      </div>
    </div>
  </div>
</section>
-->

{{-- <section class="special_guest-container" id="special_guest">
  <div class="container">
    <div class=" main-special_guest-info">

      <h2 class="info-title">Convidado Especial</h2>

      <div class="bar-title-container">
        <div class="bar-title bar-title-red"></div>
        <div class="bar-title bar-title-yellow"></div>
        <div class="bar-title bar-title-green"></div>
      </div>

      <div class="info-group">
        <div class="info-group-photo-container">
          <img class="info-group-photo" src="/img/juri/Jeferson_De.jpeg" >
        </div>
        <div class="info-group-details">
          <h2 class="info-group-title">Jeferson De</h2>
          <p class="info-group-description">
            Estudou cinema na USP, onde foi bolsista da FAPESP com a pesquisa: “Diretores Cinematográficos Negros”. Em 2000, publicou o manifesto “Dogma Feijoada”. 
          </p>
          <p class="info-group-description">
            Roteirista e diretor dos premiados curtas “DISTRAÍDA PARA A MORTE” (2001), “CAROLINA” (2003) e “NARCISO RAP” (2005).
          </p>
          <p class="info-group-description">
            Seu longa-metragem de estréia “Bróder” foi selecionado no 60º Festival de Berlim e lançado no Brasil em abril de 2011, tendo recebido o prêmio de melhor filme pela APCA (Associação Paulista de Críticos de Arte) e 11 indicações no Grande Prêmio do Cinema Brasileiro. O roteiro do filme foi selecionado no VI Laboratório de Roteiros do Instituto Sundance. Em 2013, dirigiu a série “PEDRO E BIANCA”, (TV Cultura)  ganhadora do Emmy no 2º Emmy Kids Awards e também o Prix Jeunesse Iberoamericano na categoria ficção para 12 anos. Em 2015 estreou o seu segundo longa metragem “O AMULETO” (Paris Filmes/Downtown). Em 2016, dirigiu o filme “CORRENDO ATRÁS” (Globofilmes/Elo Company), baseado no livro de  Hélio de La Peña, em fase de lançamento. Dirigiu 3 temporadas da série infanto juvenil “ESCOLA DE GÊNIOS” (Mixer/GLOOB), ganhadora do prêmio de melhor série de ficção do Grande Prêmio do Cinema Brasileiro 2019. Em 2019, dirigiu os longas metragens “M-8. Quando a morte Socorre a Vida” (Paris Filmes) ganhador do Prêmio de Melhor Filme pelo Júri Popular no Festival do Rio de 2019 e  dirigiu a novela “BOM SUCESSO” (TV Globo). Atualmente, finaliza o seu longa sobre o líder Luiz Gama e prepara seu longa infantil “Narciso Rap”.
          </p>
        </div>
      </div>
    </div>
  </div>
</section> --}}

{{-- <section class="jury-container" id="jury">
  <div class="container">
    <div class=" main-jury-info">

      <h2 class="info-title">Júri</h2>

      <div class="bar-title-container">
        <div class="bar-title bar-title-red"></div>
        <div class="bar-title bar-title-yellow"></div>
        <div class="bar-title bar-title-green"></div>
      </div>

      <div class="info-group">
        <div class="info-group-photo-container">
          <img class="info-group-photo" src="/img/juri/ANGELA_MARIA.jpeg" >
        </div>
        <div class="info-group-details">
          <h2 class="info-group-title">Angela Maria</h2>
          <p class="info-group-description">
            Ifádayíìsi (Angela Maria dos Santos), doutora em Educação. Professora, Pedagoga e graduanda em Sociologia. Especialista e Pesquisadora sobre Relações Raciais na Sociedade Brasileira, Educação Escolar Quilombola e Cultura Afro-brasileira. É quilombola e militante das causas da população negra. Iniciada na Ẹ̀sìn Òrìṣà ìbílẹ̀ (ReligiãoTradicional Yorùbá), sendo Yanifá (Sacerdotisa do Culto Ọ̀rúnmìlà/Ifá) e Sacerdotisa no Culto ao Ọ̀ṣun.
          </p>
        </div>
      </div>

      <div class="info-group info-group-reverse">
        <div class="info-group-photo-container">
          <img class="info-group-photo" src="/img/juri/Ana_Maria_Araujo.jpg" >
        </div>
        <div class="info-group-details">
          <h2 class="info-group-title info-group-title-reverse">Ana Maria Araújo</h2>
          <p class="info-group-description">
            Publicitária há 20 anos, Gestora de contas Públicas e Privadas,  especializada em produção de Áudio  e Vídeo na ESPM SP - Coordenação de Produção, produção de Elenco e Produção de Locação.  Atualmente Gerente Comercial da TV Pantanal Rede TV .
          </p>
        </div>
      </div>

      <div class="info-group">
        <div class="info-group-photo-container">
          <img class="info-group-photo" src="/img/juri/Ana_paula_2.jpg" >
        </div>
        <div class="info-group-details">
          <h2 class="info-group-title">Dra. Ana Paula Alves Ribeiro</h2>
          <p class="info-group-description">
            Bacharel e Mestre em Ciências Sociais (UERJ) e Doutora em Saúde Coletiva (UERJ). Professora Adjunta no Departamento de Formação de Professores e no Programa de Pós-graduação em Educação, Cultura e Comunicação em Periferias Urbanas (Faculdade de Educação da Baixada Fluminense/UERJ) e no Programa de Pós-graduação em Cultura e Territorialidades (PPCULT/UFF). Coordena o Laboratório de Experimentações Artísticas e Reflexões Criativas sobre as Cidades e integra o conselho curador e de redação do Programa Museu Afro Digital Rio de Janeiro (Decult/PR-3/UERJ), atuando desde 2019 também como coordenadora.
          </p>
        </div>
      </div>

      <div class="info-group info-group-reverse">
        <div class="info-group-photo-container">
          <img class="info-group-photo" src="/img/juri/EDILENE.jpeg" >
        </div>
        <div class="info-group-details">
          <h2 class="info-group-title info-group-title-reverse">Edilene Rodriguez</h2>
          <p class="info-group-description">
            Atriz, professora de teatro e pesquisadora das artes da cena. Coordenou o Projeto Cinema no Mato por três anos, e formou mais de 150 alunos no audiovisual com curtas-metragens sobre o meio ambiente em quatro cidades de Mato Grosso em Parceria com o Instituto Equipav de São Paulo. Integra o Grupo Teatro Faces de Primavera do Leste – MT desde 2005, mestranda em Teatro pela UDESC (Universidade do Estado de Santa Catarina), graduada em Licenciatura em Teatro pela Universidade de Brasília com intercâmbio na Universidade de Tampere – Finlândia, também graduada em Letras pela Unicesumar. Atualmente coordenadora pedagógica da Escola Municipal de Teatro – Projeto: Escola de Teatro Faces em Primavera do Leste. Integra o corpo de produtores do Festival Velha Joana que está em sua 13˚ Edição. 

          </p>
        </div>
      </div>

      <div class="info-group">
        <div class="info-group-photo-container">
          <img class="info-group-photo" src="/img/juri/luciene_carvalho_2.jpg" >
        </div>
        <div class="info-group-details">
          <h2 class="info-group-title">Luciene Carvalho</h2>
          <p class="info-group-description">
            Luciene Carvalho é escritora e poeta. Publicou "Conta Gotas: Sumo da Lascívia", "Aquerrale ou o livro da Madalena"; "Porto: "Cururu e Siriri do Rio Abaixo" (Instituto Usina); "Caderno de Caligrafia" (Cathedral); "Teia" (Teia 33); "Devaneios poéticos" (EdUFMT); "Insânia" (Entrelinhas); "Ladra de Flores" (Carlini & Caniato) e "Dona".
          </p>
          <p class="info-group-description">
            Parte importante do seu trabalho, como declamadora, se faz em shows poéticos em que une figurino, efeitos cênicos e trilhas musicais para oferecer sua poesia viva e colocá-la a serviço da emoção da plateia.
            Luciene ocupa a cadeira nº 31 da Academia Mato Grossense de Letras.
          </p>
        </div>
      </div>

      <div class="info-group info-group-reverse">
        <div class="info-group-photo-container">
          <img class="info-group-photo" src="/img/juri/MichellyThomaz.jpg" >
        </div>
        <div class="info-group-details">
          <h2 class="info-group-title info-group-title-reverse">Michelly Thomaz</h2>
          <p class="info-group-description">
            Michelly Thomaz atua como coordenadora e produtora de arte em cinema. Nasceu em Cuiabá/MT e foi radicada na cidade do Rio de Janeiro por 15 anos, hoje transita entre o eixo Rio e São Paulo. 
            Começou sua carreira como atriz e nas artes visuais e audiovisual desenvolveu seu oficio como produtora. Estudou na Escola EAV – Escola De Artes Visuais Do Parque Lage. Participou de dezenas de exposições, editoriais e campanhas publicitárias.

          </p>
        </div>
      </div>

      <div class="info-group">
        <div class="info-group-photo-container">
          <img class="info-group-photo" src="/img/juri/rafaela_gomes_Caetano.jpg" >
        </div>
        <div class="info-group-details">
          <h2 class="info-group-title">Rafaela Gomes</h2>
          <p class="info-group-description">
            Jornalista na área de Cinema, Séries de TV e cultura POP, além de ser crítica e produtora de conteúdos em vídeo. Trabalha com a cobertura de festivais de cinema internacionais e já entrevistou grandes nomes do cinema mundial, como o cineasta Jordan Peele e a atriz francesa Isabelle Huppert.
          </p>
        </div>
      </div>

      <div class="info-group info-group-reverse">
        <div class="info-group-photo-container">
          <img class="info-group-photo" src="/img/juri/sara_timotheo_0.jpeg" >
        </div>
        <div class="info-group-details">
          <h2 class="info-group-title info-group-title-reverse">Sasa Timótheo</h2>
          <p class="info-group-description">
            Sasa Thimoteo atua no cenário cinematográfico há 9 anos. Participou das oficinas Kinoforum entre 2011 e 2012, recentemente atuou como Direção de Arte no clipe  " omo oya "da Pacha Ana pelo coletivo Rio Vermelho e produção de elenco em parcerias com a produtora Rock Filmes e Agência Dom Pedro!
          </p>
        </div>
      </div>

    </div>
  </div>
</section> --}}

<!-- <section class="subscription-container" id="subscription">
  <div class="container">
    <div class="main-regulation-info">
      <h2 class="info-title">Inscrição</h2>

      <div class="bar-title-container">
        <div class="bar-title bar-title-red"></div>
        <div class="bar-title bar-title-yellow"></div>
        <div class="bar-title bar-title-green"></div>
      </div>

      <p class="info-description">
        A 5ª Mostra de Cinema Negro de MT é uma realização do Coletivo Audiovisual Negro Quariterê
      </p>

      <p class="info-description">
        O PERÍODO DE INSCRIÇÃO vai de 30 de junho até 30 de julho de 2020 
      </p>

      <div class="action-contianer">
        <button class="btn-link" data-toggle="modal" data-target="#modal-subscription">
          Fazer inscrição
        </button>
      </div>
    </div>
  </div>
</section> -->

<section class="afrocine-container" id="afrocine">
  <div class="container">
    <div class=" main-afrocine-info">
      <h2 class="info-title">Afrocine</h2>

      <div class="bar-title-container">
        <div class="bar-title bar-title-red"></div>
        <div class="bar-title bar-title-yellow"></div>
        <div class="bar-title bar-title-green"></div>
      </div>

      <p class="info-description">
        A Sessão Afrocine ocorre desde o ano de 2018. É um projeto criado em parceria com o Cineclube Coxiponés, em que os filmes selecionados em todas as edições das Mostras de Cinema Negro, bem como outros filmes convidados, são exibidos e debatidos em data mensal fixa, no auditório do Centro Cultural da UFMT, em mostras itinerantes em escola públicas, da cidade de realização da mostra e interior do estado e também em instituições quando solicitado. 
      </p>

      <p class="info-description">
        A sessão é gratuita, aberta aos alunos da universidade e à comunidade. Os curadores Anna Maria Moura e Wuldson Marcelo são responsáveis pela seleção de filmes, tanto das mostras realizadas como da Sessão Afrocine.
      </p>

      <p class="info-description">
        A sessão Afrocine tem um público reglar e é um dos motivos de orgulho do Coletivo Quariterê por extrapolar, pela primeira vez, o limite da capacidade do auditório do Centro Cultural da UFMT ao exibir, juntamente com outros curtas-metragens o lançamento do filme “Como ser racista em 10 passos”, da diretora Isabela Ferreira.
      </p>
    </div>
  </div>
</section>

<footer class="footer-container" id="footer">
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <a href="mailto:coletivoaudiovisualnegro@gmail.com" class="footer-contact">
          coletivoaudiovisualnegro@gmail.com
        </a>
      </div>
      <div class="col-sm-7">
        <p class="footer-copyright">&copy; 2020 Coletivo Negro Audiovisual Quariterê - MT &middot; Afrocine </p>
      </div>
    </div>
  </div>
</footer>

<!-- Regulation -->

{{-- <div class="modal fade" id="modal-regulation" tabindex="-1" role="dialog" aria-labelledby="modal-regulationLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-regulationLabel">Regulamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe id="regulation_file"title="PDF in an i-Frame" src="/files/regulamento_5_mostra_de_cinema_negro_de_mato_grosso.pdf" frameborder="1" scrolling="auto" height="400" width="100%" ></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-mute" data-dismiss="modal">Fechar</button>
        <a href="https://drive.google.com/file/d/1zccGSIj0ldr_GR-SJ0elSiZcVlhrEMeg/view" target="_BLANK" type="button" class="btn btn-link">Abrir Arquivo</a>
      </div>
    </div>
  </div>
</div> --}}

<!-- Subscription -->
{{-- <div class="modal fade" id="modal-subscription" tabindex="-1" role="dialog" aria-labelledby="modal-subscriptionLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-subscriptionLabel">Inscrição</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe id="subscription_file" title="PDF in an i-Frame" src="https://docs.google.com/forms/d/e/1FAIpQLSdA3-weNXj6ALSfOFoIbf_-48OvfBTJXgJdigGOgN6bgkrMNA/viewform" frameborder="1" scrolling="auto" height="400" width="100%" ></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-mute" data-dismiss="modal">Fechar</button>
        <a href="https://docs.google.com/forms/d/e/1FAIpQLSdA3-weNXj6ALSfOFoIbf_-48OvfBTJXgJdigGOgN6bgkrMNA/viewform" target="_BLANK" type="button" class="btn btn-link">Abrir Formulário</a>
      </div>
    </div>
  </div>
</div> --}}

<!-- Video -->
<div class="modal fade" id="modal-video" tabindex="-1" role="dialog" aria-labelledby="modal-videoLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header modal-video-header">
        <h5 class="modal-title" id="modal-videoLabel"></h5>
        <button type="button" class="close modal-video-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-video-body">
        <div id="player-video"></div>
      </div>
      <div class="modal-footer modal-video-footer">
        <div class="rating">
            <p class="rating-title">Faça uma Avaliação</p>
            <span>
              <input type="radio" name="rating" id="str5" value="5"><label for="str5">
                <svg width="0.7em" height="0.7em" viewBox="0 0 16 16" class="bi bi-star-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
              </label>
            </span>
            <span>
              <input type="radio" name="rating" id="str4" value="4"><label for="str4">
                <svg width="0.7em" height="0.7em" viewBox="0 0 16 16" class="bi bi-star-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
              </label>
            </span>
            <span>
              <input type="radio" name="rating" id="str3" value="3"><label for="str3">
                <svg width="0.7em" height="0.7em" viewBox="0 0 16 16" class="bi bi-star-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
              </label>
            </span>
            <span>
              <input type="radio" name="rating" id="str2" value="2"><label for="str2">
                <svg width="0.7em" height="0.7em" viewBox="0 0 16 16" class="bi bi-star-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
              </label>
            </span>
            <span>
              <input type="radio" name="rating" id="str1" value="1"><label for="str1">
                <svg width="0.7em" height="0.7em" viewBox="0 0 16 16" class="bi bi-star-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
              </label>
            </span>
        </div>
    
        <button type="button" class="btn btn-mute" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- Subscription -->
<div class="modal fade" id="modal-welcome" tabindex="-1" role="dialog" aria-labelledby="modal-welcomeLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-welcomeLabel">V Mostra de Cinema Negro de Mato Grosso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <video
          id="my-video"
          class="video-js"
          controls
          preload="auto"
          width="700"
          height="440"
          poster="/img/post.png"
          data-setup="{}"
        >
          <source src="/video/v_mostra.mp4" type="video/mp4" />
          <source src="/video/v_mostra.webm" type="video/webm" />
          <p class="vjs-no-js">
            Para ver esse vídeo, ative o javascript do ser browser, ou considere
            atualizar seu browser para
            <a href="https://videojs.com/html5-video-support/" target="_blank"
              >suportar vídeos HTML5</a
            >
          </p>
        </video>
      </div>
      <div class="modal-footer">
        <a class="btn btn-link" href="{{ route('register') }}">
            {{ __('Participar da mostra') }}
        </a>

        <button type="button" class="btn btn-mute" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

@endsection
