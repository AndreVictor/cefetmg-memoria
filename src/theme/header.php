<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <?php wp_head(); ?>
    <meta charset=" <?php bloginfo( 'charset' ); ?> ">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" href=" <?php echo get_theme_file_uri('img/favicon.png') ?>" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css" rel="stylesheet">

    <title>CEFET-MG — Memória em exposição</title>
  </head>

<body <?php body_class(); ?> data-barba="wrapper">

<!--     <ul class="transition">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>

    <div class="wrapper"> -->
    <header class="header">
        <a href="<?php echo get_permalink( get_page_by_path( 'inicio' ) ) ?>" class="header__logo-box">
            <svg class="header__logo">
            <use href="<?php echo get_theme_file_uri('img/cefet-memoria-logo.svg#Camada_1') ?>">
            </svg>
        </a>
        <div class="header__menu-mobile-icon">&nbsp;</div>
        <div class="header__menu-box">
        <nav class="header__menu">
                <ul class="header__menu-list">
                    <li class="header__menu-item">
                        <a href="<?php echo get_permalink( get_page_by_path( 'sobre' ) ) ?>" class="header__menu-link">SOBRE</a>
                    </li>
                    <li class="header__menu-item">
                        <a href="<?php echo get_post_type_archive_link( 'epocas' ); ?>" class="header__menu-link">ÉPOCAS</a>
                    </li>
                    <li class="header__menu-item">
                        <a href="<?php echo get_post_type_archive_link( 'registros' ); ?>" class="header__menu-link">HISTÓRIAS</a>
                    </li>
                </ul>
            </nav>
            <form 
                  class="search__form"
                  role="search"
                  method="get"
                  id="searchform"
                  action="<?php echo home_url('/'); ?>"
            >
                <input 
                    type="text"
                    value=""
			        name="s"
			        id="s" 
                    placeholder="pesquisar" 
                    class="search__input"
                />
                <button 
                    type="submit"
                    id="searchsubmit"
                    class="search__btn" 
                >
                    <svg class="search__icon">
                        <use href="<?php echo get_theme_file_uri('img/search.svg#Capa_1') ?>">
                    </svg>
                </button>
            </form>
        </div>
    </header>