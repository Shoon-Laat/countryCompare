<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dhl_custom_theme
 */

get_header();
?>

<div class="custom-gradient uk-padding-small custom-top-medium uk-transform-origin-top-center banner" id="banner">
    <div class="uk-container-small uk-margin-auto uk-padding-large uk-padding-remove-top uk-padding-remove-bottom">
        <span class="uk-text-primary uk-text-normal uk-text-lead">Global Trade</span>
        <h2 class="uk-margin-remove uk-text-primary uk-text-bold uk-heading-small">Country Comparator</h2>
        <span class="uk-text-secondary uk-text-default">Select between 2 countries and the reporting period to compare
            trade ind</span>
    </div><!--Country Trade Content!-->
</div>
<div class="uk-width-1-1">
    <div class="custom-background">
        <div class="uk-margin-auto uk-container-small map-comparator" id="mapComparator">
            <div class="map-gp map-container uk-margin-auto uk-position-relative">
                <div class="uk-position-absolute custom-bottom-medium">
                    <a class="uk-transition-toggle map-content uk-position-relative uk-display-block map-1 uk-padding uk-padding-remove-top uk-padding-remove-bottom"
                        data-value="uk">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/img_uk.png" alt="United Kingdom"
                            class="uk-responsive-width map">
                        <div class="country-1 country uk-position-center uk-width-1-1">
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/img_country_uk.png"
                                alt="United Kingdom">
                        </div>
                        <span
                            class="uk-transition-slide-bottom-small uk-visible@m uk-position-bottom-left uk-background-primary uk-light uk-padding-small uk-border-rounded uk-text-meta uk-text-success">
                            United Kingdom
                        </span>
                    </a>
                </div>
                <div class="uk-position-absolute custom-left-position custom-bottom-medium">
                    <a class="uk-transition-toggle map-content uk-position-relative uk-display-block map-2 uk-padding-remove-top uk-padding-remove-bottom"
                        data-value="germany">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/img_germany.png" alt="Germany"
                            class="uk-responsive-width map">
                        <div class="country-2 country uk-position-center uk-width-1-1">
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/img_country_germany.png"
                                alt="Germany">
                        </div>
                        <span
                            class="uk-transition-slide-bottom-small uk-visible@m uk-position-bottom-left uk-background-primary uk-light uk-padding-small uk-border-rounded uk-text-meta uk-text-success">
                            Germany
                        </span>
                    </a>
                </div>
                <div class="uk-position-absolute custom-right-position custom-right-medium">
                    <a class="uk-transition-toggle map-content uk-position-relative uk-display-block map-3 uk-padding-remove-top uk-padding-remove-bottom"
                        data-value="china">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/img_china.png" alt="China"
                            class="uk-responsive-width map">
                        <div class="country-3 country uk-position-center uk-width-1-1">
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/img_country_china.png" alt="China">
                        </div>
                        <span
                            class="uk-transition-slide-bottom-small uk-visible@m uk-position-bottom-top uk-background-primary uk-light uk-padding-small uk-border-rounded uk-text-meta uk-text-success"
                            style="right: 30%;">
                            China
                        </span>
                    </a>
                </div>
                <div class="uk-position-absolute custom-bottom-position custom-left-medium">
                    <a class="uk-transition-toggle map-content uk-position-relative uk-display-block map-4"
                        data-value="us">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/img_us.png" alt="United States"
                            class="uk-responsive-width map">
                        <div class="country-4 country uk-position-center uk-width-1-1">
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/img_country_us.png"
                                alt="United States">
                        </div>
                        <span
                            class="uk-transition-slide-bottom-small uk-visible@m uk-position-bottom-left uk-background-primary uk-light uk-padding-small uk-border-rounded uk-text-meta uk-text-success">
                            United States
                        </span>
                    </a>
                </div>
                <div class="uk-position-absolute custom-center-position custom-bottom-medium">
                    <a class="uk-transition-toggle map-content uk-position-relative uk-display-inline-block map-5"
                        data-value="india">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/img_india.png" alt="India"
                            class="uk-responsive-width map">
                        <div class="country-5 country uk-position-center uk-width-1-1">
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/img_country_india.png" alt="India">
                        </div>
                        <span
                            class="uk-transition-slide-bottom-small uk-visible@m uk-position-bottom-left uk-background-primary uk-light uk-padding-small uk-border-rounded uk-text-meta uk-text-success">
                            India
                        </span>
                    </a>
                </div>
                <div class="uk-position-absolute custom-top-position custom-right-medium">
                    <a class="uk-transition-toggle map-content uk-position-relative uk-display-inline-block map-6 uk-padding-large uk-padding-remove-bottom uk-padding-remove-top"
                        data-value="korea">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/img_korea.png" alt="Korea"
                            class="uk-responsive-width map">
                        <div class="country-6 country uk-position-center uk-width-1-1">
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/img_country_korea.png" alt="Korea">
                        </div>
                        <span
                            class="uk-transition-slide-bottom-small uk-visible@m uk-position-top-left uk-background-primary uk-light uk-padding-small uk-border-rounded uk-text-meta uk-text-success">
                            South Korea
                        </span>
                    </a>
                </div>
                <div class="uk-position-absolute custom-position custom-right-medium">
                    <a class="uk-transition-toggle map-content uk-position-relative uk-display-inline-block map-7"
                        data-value="japan">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/img_jpn.webp" alt="Japan"
                            class="uk-responsive-width map">
                        <div class="country-7 country uk-position-center uk-width-1-1">
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/img_country_jpn.png" alt="Japan">
                        </div>
                        <span
                            class="uk-transition-slide-bottom-small uk-visible@m uk-position-bottom-left uk-background-primary uk-light uk-padding-small uk-border-rounded uk-text-meta uk-text-success">
                            Japan
                        </span>
                    </a>
                </div>
            </div><!--map content!-->
            <div class="uk-flex uk-margin-auto custom-bottom-medium">
                <div class="uk-background-secondary uk-flex custom-flex uk-flex-between uk-flex-middle report-container uk-margin-auto uk-padding-small">
                    <span class="uk-visible@m">Reporting Period</span>
                    <div class="uk-form-select uk-margin-left uk-margin-right custom-margin
                     uk-width-expand" data-uk-form-select>
                        <span></span>
                        <select class="uk-width-1-1 uk-padding-small" id="monthSelect">
                            <option value="Jul2018-Sep2018">Jul 2018 - Sep 2018</option>
                            <!-- <option value="Jul2019-Sep2019">Jul 2019 - Sep 2019</option>
                            <option value="Jan2019-Mar2019">Jan 2019 - March 2019</option> -->
                        </select>
                    </div>
                    <a class="uk-button uk-button-primary uk-text-capitalize uk-text-bold uk-border-rounded uk-disabled uk-width-1-4@m uk-width-1-3@s uk-width-1-1"
                        href="javascript:void(0)" id="compareData" data-uk-smooth-scroll>Compare Data</a>
                </div>
            </div><!--Compare Data Section !-->
        </div>
    </div>
    <div class="data-list-gp uk-hidden uk-margin-auto uk-container-small" id="dataContent">
        <div class="uk-visible uk-hidden@m uk-padding-large uk-padding-remove-bottom">
            <h5 id="year-month" class="uk-text-center uk-text-bold uk-text-capitalize"></h5>
            <div class="uk-flex uk-flex-middle uk-flex-between uk-padding-small">
                <div id="left-content-mobile" class="uk-width-1-3 uk-text-meta image-list uk-text-center uk-padding-small">
                </div>
                <span class="uk-text-bold">VS</span>
                <div id="right-content-mobile" class="uk-width-1-3 image-list uk-text-center uk-padding-small">
                </div>
            </div>
        </div><!--country comparator result for mobile!-->
        <div class="monthly-data uk-visible@m uk-position-relative custom-width uk-flex uk-width-1-1 uk-flex-between uk-margin-auto"
            id="monthDisplay"><!--Month List!-->
        </div>
        <div class="uk-container-small uk-flex uk-flex-center uk-margin-large-top-remove">
            <div id="left-content" class="uk-width-1-3 uk-visible@m image-list uk-text-center uk-padding">
            </div>
            <div class="uk-position-relative uk-padding uk-width-1-2@s uk-width-1-1" id="tradeDataUpdate">
                <h5 class="uk-text-center uk-text-bold uk-text-capitalize">TRADE INDEXES</h5>
                <div id="progressList">
                    <div id="country-pg-bar" class="progress-bar-container">
                        <div class="label label-left"></div>
                        <div class="progress-bar">
                            <div class="progress-fill"></div>
                            <div class="progress-fill-bg"></div>
                        </div>
                        <div class="label label-right"></div>
                    </div>
                    <div id="air-pg-bar" class="progress-bar-container">
                        <div class="label label-left"></div>
                        <div class="progress-bar">
                            <div class="progress-fill"></div>
                            <div class="progress-fill-bg"></div>
                        </div>
                        <div class="label label-right"></div>
                    </div>
                    <div id="ocean-pg-bar" class="progress-bar-container">
                        <div class="label label-left"></div>
                        <div class="progress-bar">
                            <div class="progress-fill"></div>
                            <div class="progress-fill-bg"></div>
                        </div>
                        <div class="label label-right"></div>
                    </div>
                </div>
                <h5 class="uk-text-center uk-text-bold uk-text-capitalize">SECTOR DEVELOPMENTS</h5>
                <div id="sector-developments">
                    <div id="basic-raw-materials-pg-bar" class="progress-bar-container">
                        <div class="label label-left"></div>
                        <div class="progress-bar">
                            <div class="progress-fill"></div>
                            <div class="progress-fill-bg"></div>
                        </div>
                        <div class="label label-right"></div>
                    </div>
                    <div id="capital-equip-machinery-pg-bar" class="progress-bar-container">
                        <div class="label label-left"></div>
                        <div class="progress-bar">
                            <div class="progress-fill"></div>
                            <div class="progress-fill-bg"></div>
                        </div>
                        <div class="label label-right"></div>
                    </div>
                    <div id="chemicals-products-pg-bar" class="progress-bar-container">
                        <div class="label label-left"></div>
                        <div class="progress-bar">
                            <div class="progress-fill"></div>
                            <div class="progress-fill-bg"></div>
                        </div>
                        <div class="label label-right"></div>
                    </div>
                    <div id="consumer-fashion-goods-pg-bar" class="progress-bar-container">
                        <div class="label label-left"></div>
                        <div class="progress-bar">
                            <div class="progress-fill"></div>
                            <div class="progress-fill-bg"></div>
                        </div>
                        <div class="label label-right"></div>
                    </div>
                    <div id="ht-pg-bar" class="progress-bar-container">
                        <div class="label label-left"></div>
                        <div class="progress-bar">
                            <div class="progress-fill"></div>
                            <div class="progress-fill-bg"></div>
                        </div>
                        <div class="label label-right"></div>
                    </div>
                    <div id="irw-pg-bar" class="progress-bar-container">
                        <div class="label label-left"></div>
                        <div class="progress-bar">
                            <div class="progress-fill"></div>
                            <div class="progress-fill-bg"></div>
                        </div>
                        <div class="label label-right"></div>
                    </div>
                    <div id="lvp-pg-bar" class="progress-bar-container">
                        <div class="label label-left"></div>
                        <div class="progress-bar">
                            <div class="progress-fill"></div>
                            <div class="progress-fill-bg"></div>
                        </div>
                        <div class="label label-right"></div>
                    </div>
                    <div id="mp-pg-bar" class="progress-bar-container">
                        <div class="label label-left"></div>
                        <div class="progress-bar">
                            <div class="progress-fill"></div>
                            <div class="progress-fill-bg"></div>
                        </div>
                        <div class="label label-right"></div>
                    </div>

                    <div id="phg-pg-bar" class="progress-bar-container">
                        <div class="label label-left"></div>
                        <div class="progress-bar">
                            <div class="progress-fill"></div>
                            <div class="progress-fill-bg"></div>
                        </div>
                        <div class="label label-right"></div>
                    </div>
                    <div id="tocc-pg-bar" class="progress-bar-container">
                        <div class="label label-left"></div>
                        <div class="progress-bar">
                            <div class="progress-fill"></div>
                            <div class="progress-fill-bg"></div>
                        </div>
                        <div class="label label-right"></div>
                    </div>
                </div>
            </div>
            <div id="right-content" class="uk-width-1-3 uk-visible@m image-list uk-text-center uk-padding">
            </div>
        </div><!--Trade Index Data !-->
        <div class="uk-hidden@m">
            <hr>
            <div class="uk-container-small uk-flex uk-flex-column uk-flex-middle uk-margin-auto uk-padding uk-margin">
                <a href="#" id="reportFirstBtn" class="uk-button uk-width-1-2@m uk-width-1-1 uk-text-primary uk-margin-bottom uk-padding-remove-top uk-padding-remove-bottom uk-button-secondary uk-text-bold uk-border-rounded uk-text-capitalize"></a>
                <a href="#" id="reportSecondBtn" class="uk-button uk-width-1-2@m uk-width-1-1 uk-text-primary uk-margin-bottom uk-padding-remove-top uk-padding-remove-bottom uk-button-secondary uk-text-bold uk-border-rounded uk-text-capitalize"></a>
            </div>
        </div><!--View Report Btn for Mobile!-->
    </div><!--Reporting period section!-->
</div>

<div class="uk-position-fixed uk-background-default uk-box-shadow-medium uk-width-1-1 uk-hidden uk-position-top custom-top-medium" id="countryComparator">
    <div class="uk-container-small uk-padding-small uk-margin-auto uk-visible@m">
        <div class="uk-flex uk-flex-middle uk-flex-between uk-grid-small">
            <div class="uk-width-auto">
                <h5 class="uk-text-bold uk-margin-remove-bottom">Country Comparator</h5>
            </div>
            <div class="uk-width-expand">
                <div class="uk-flex uk-flex-middle uk-flex-between">
                    <select class="uk-padding-small uk-width-1-2 uk-margin-right" id="firstCountrySelect" data-uk-form-select>
                        <option value="uk">United Kingdom</option>
                        <option value="germany">Germany</option>
                        <option value="china">China</option>
                        <option value="us">United State</option>
                        <option value="korea">South Korea</option>
                        <option value="japan">Japan</option>
                        <option value="india">India</option>
                    </select>
                    <p class="uk-margin-right">VS</p>
                    <select class="uk-padding-small uk-width-1-2 uk-margin-right" id="secondCountrySelect" data-uk-form-select>
                        <option value="uk">United Kingdom</option>
                        <option value="germany">Germany</option>
                        <option value="china">China</option>
                        <option value="us">United State</option>
                        <option value="korea">South Korea</option>
                        <option value="japan">Japan</option>
                        <option value="india">India</option>
                    </select>
                    <select class="uk-padding-small uk-width-1-2" id="compareMonth">
                    </select>
                </div>
            </div>
        </div>
    </div><!--country compartor fade in for navbar!-->
    <div class="uk-padding-small uk-background-muted uk-flex uk-flex-middle uk-flex-between uk-hidden@m">
        <div>
            <span id="firstCountryMb" class="uk-text-bold uk-text-small"></span>
            <span class="uk-text-small">VS</span>
            <span id="secondCountryMb" class="uk-text-bold uk-text-small"></span>
        </div>
        <div id="changeMap">
            <img class="uk-responsive-width change-ico" src="<?php bloginfo('template_url'); ?>/assets/img/ico_change.png" alt="change icon"></img>
            <span class="uk-text-bold uk-text-small uk-text-primary"> Change </span>
        </div>
    </div><!--Month select section!-->
    <div id="month-compare-mb" class="uk-flex uk-flex-middle uk-hidden@m uk-box-shadow-large month-compare">
    </div><!--Compare Data for Mobile!-->
</div><!--Fade in appear from top!-->



<?php
get_footer();
