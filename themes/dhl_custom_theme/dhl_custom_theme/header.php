<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dhl_custom_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site">
    <div class="page-loader uk-position-fixed uk-width-1-1 uk-height-viewport" id="page-loader">
      <div class="loader">
      </div>
    </div><!--loading animation!-->
    <div uk-grid class="uk-grid-collapse">
      <div id="sidebar-container" class="uk-height-viewport uk-background-primary uk-visible@m">
        <div uk-sticky>
          <ul class="uk-navbar-nav uk-nav-default">
            <li>
              <a id="sidebar-toggle" href="javascript:void(0)" class="uk-navbar-toggle custom-menu" uk-icon="icon: menu">
              </a>
            </li>
          </ul>

          <div id="sidebar-slim" class="uk-card sidebar uk-padding-remove-bottom uk-padding-remove-top">
            <ul class="uk-nav uk-nav-default">
              <li><a href="#">
                  <img src="<?php bloginfo('template_url'); ?>/assets/img/ico_home.webp" alt="Home">
                </a>
              </li>
              <li><a href="#">
                  <img src="<?php bloginfo('template_url'); ?>/assets/img/ico_compare.webp" alt="Compare">
                </a>
              </li>
              <li><a href="#">
                  <img src="<?php bloginfo('template_url'); ?>/assets/img/ico_globle.webp" alt="Globle">
                </a>
              </li>
              <li><a href="#" class="uk-text-bold">CN</a></li>
              <li><a href="#" class="uk-text-bold">GE</a></li>
              <li><a href="#" class="uk-text-bold">IN</a></li>
              <li><a href="#" class="uk-text-bold">JP</a></li>
              <li><a href="#" class="uk-text-bold">KR</a></li>
              <li><a href="#" class="uk-text-bold">UK</a></li>
              <li><a href="#" class="uk-text-bold">US</a></li>
              <li><a href="#">
                  <img src="<?php bloginfo('template_url'); ?>/assets/img/ico_infromation.webp" alt="Information">
                </a>
              </li>
            </ul>
          </div>
          <div id="sidebar" class="uk-card sidebar uk-hidden uk-padding-remove-bottom uk-padding-remove-top">
            <ul class="uk-nav uk-nav-default">
              <li><a href="#">
                  <img src="<?php bloginfo('template_url'); ?>/assets/img/ico_home.webp" alt="Home">
                  <span class="uk-text-bold uk-text-small">Home</span>
                </a>
              </li>
              <li><a href="#">
                  <img src="<?php bloginfo('template_url'); ?>/assets/img/ico_compare.webp" alt="Compare">
                  <span class="uk-text-bold uk-text-small">Comparator</span>
                </a>
              </li>
              <li><a href="#">
                  <img src="<?php bloginfo('template_url'); ?>/assets/img/ico_globle.webp" alt="Globle">
                  <span class="uk-text-bold uk-text-small">Global</span>
                </a>
              </li>
              <li><a href="#">
                  <img src="<?php bloginfo('template_url'); ?>/assets/img/img_country_china.png" alt="China">
                  <span class="uk-text-bold uk-text-small">China</span>
                </a>
              </li>
              <li><a href="#">
                  <img src="<?php bloginfo('template_url'); ?>/assets/img/img_country_germany.png" alt="Germany">
                  <span class="uk-text-bold uk-text-small">Germany</span>
                </a>
              </li>
              <li><a href="#">
                  <img src="<?php bloginfo('template_url'); ?>/assets/img/img_country_india.png" alt="India">
                  <span class="uk-text-bold uk-text-small">India</span>
                </a>
              </li>
              <li><a href="#">
                  <img src="<?php bloginfo('template_url'); ?>/assets/img/img_country_jpn.png" alt="Japan">
                  <span class="uk-text-bold uk-text-small">Japan</span>
                </a>
              </li>
              <li><a href="#">
                  <img src="<?php bloginfo('template_url'); ?>/assets/img/img_country_korea.png" alt="Korea">
                  <span class="uk-text-bold uk-text-small">Korea</span>
                </a>
              </li>
              <li><a href="#">
                  <img src="<?php bloginfo('template_url'); ?>/assets/img/img_country_uk.png" alt="United Kingdom">
                  <span class="uk-text-bold uk-text-small">United Kingdom</span>
                </a>
              </li>
              <li><a href="#">
                  <img src="<?php bloginfo('template_url'); ?>/assets/img/img_country_us.png" alt="United States">
                  <span class="uk-text-bold uk-text-small">United States</span>
                </a>
              </li>
              <li><a href="#">
                  <img src="<?php bloginfo('template_url'); ?>/assets/img/ico_infromation.webp" alt="Information">
                  <span class="uk-text-bold uk-text-small">About GTB</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div><!--sidebar for pc!-->
      <div class="uk-width-expand">
        <div class="custom-gradient" uk-sticky>
          <div class="uk-flex uk-padding-small uk-flex-middle uk-flex-between@m">
            <div class="uk-hidden@m uk-position-relative uk-position-left">
              <button class="uk-button-default uk-border-rounded uk-margin-small-right" type="button" uk-toggle="target: #offcanvas-usage">
                <span uk-icon="icon: menu"></span>
              </button>

              <div id="offcanvas-usage" uk-offcanvas>
                <div class="uk-offcanvas-bar">
                  <button class="uk-offcanvas-close" type="button" uk-close></button>
                  <ul class="uk-nav uk-nav-default uk-width-1-1 uk-padding uk-padding-remove-left">
                    <li><a href="#">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/ico_home.webp" alt="Home">
                        <span class="uk-text-bold uk-text-small">Home</span>
                      </a>
                    </li>
                    <li><a href="#">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/ico_compare.webp" alt="Compare">
                        <span class="uk-text-bold uk-text-small">Comparator</span>
                      </a>
                    </li>
                    <li><a href="#">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/ico_globle.webp" alt="Globle">
                        <span class="uk-text-bold uk-text-small">Global</span>
                      </a>
                    </li>
                    <li><a href="#">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/img_country_china.png" alt="China">
                        <span class="uk-text-bold uk-text-small">China</span>
                      </a>
                    </li>
                    <li><a href="#">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/img_country_germany.png" alt="Germany">
                        <span class="uk-text-bold uk-text-small">Germany</span>
                      </a>
                    </li>
                    <li><a href="#">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/img_country_india.png" alt="India">
                        <span class="uk-text-bold uk-text-small">India</span>
                      </a>
                    </li>
                    <li><a href="#">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/img_country_jpn.png" alt="Japan">
                        <span class="uk-text-bold uk-text-small">Japan</span>
                      </a>
                    </li>
                    <li><a href="#">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/img_country_korea.png" alt="Korea">
                        <span class="uk-text-bold uk-text-small">Korea</span>
                      </a>
                    </li>
                    <li><a href="#">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/img_country_uk.png" alt="United Kingdom">
                        <span class="uk-text-bold uk-text-small">United Kingdom</span>
                      </a>
                    </li>
                    <li><a href="#">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/img_country_us.png" alt="United States">
                        <span class="uk-text-bold uk-text-small">United States</span>
                      </a>
                    </li>
                    <li><a href="#">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/ico_infromation.webp" alt="Information">
                        <span class="uk-text-bold uk-text-small">About GTB</span>
                      </a>
                    </li>
                  </ul>

                </div>
              </div>
            </div><!--sidebar for mobile!-->
            <div class="uk-child-width-1-2@m uk-child-width-1-3 uk-grid">
              <a href=""><img src="<?php bloginfo('template_url'); ?>/assets/img/img_logo.webp" alt="Logo" class="uk-responsive-width"></a>
              <div class="uk-text-primary uk-text-bold uk-width-auto"> Global Trade Barometer </div>
            </div><!--header-content!-->
            <a class="uk-icon-social uk-text-primary uk-visible@m">
              <i uk-icon="icon: social"></i>
            </a><!--social icon!-->
          </div>
        </div>