<?php get_header(); ?>
<main data-barba="container" data-barba-namespace="home">
    <section class="inicialPage">
        <div class="inicialPage__img-box">
            <div class="inicialPage__img" style="background-image: url(<?php echo get_theme_file_uri( 'img/pagina-inicial.jpg' );?> ">&nbsp;</div>
            <div class="inicialPage__title MuseuModerno-bold-72 text-upper">
                MEMÓRIA CEFET-MG: ESPAÇOS, TRAJETÓRIAS E PRÁTICAS
            </div>
        </div>
        <div class="inicialPage__content">
            <div class="inicialPage__legenda">
                <p class="Poppins-italic-14">
                  Comemoração de 150 anos da Tabela periódica dos elementos químicos. <br/>
                  Adesivos nas janelas no prédio de salas de aula.
                  <br/>Av. Amazonas, Campus I
                </p>
                <p class="Poppins-bold-italic-14">
                    2019
                </p>
            </div>

            <div class="Poppins-regular-16 m-b-32">
            A exposição <em>Memória CEFET-MG: espaços, trajetórias e práticas</em> é uma iniciativa do Departamento de História (DHIS) com o objetivo de divulgar documentos e imagens relacionadas à história de nossa instituição, em parceria com a Diretoria Geral (DG) e a Coordenação de Arquivo e Memória Institucional (ARQMI). 
            </div>

            <a href="<?php echo get_permalink( get_page_by_path( 'inicio' ) ) ?>" class="inicialPage__btn btn btn--azul text-upper">
              Entrar na exposição
            </a>

        </div>
    </section>
    
<?php get_footer(); ?>
