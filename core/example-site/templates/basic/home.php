<?
$portfolioItems = new Portfolio;
$approvedPortfolioItems = $portfolioItems->getApproved('position DESC', 6);
?>
<?function makeLink($link ,$title,$content){
    ?>
    <a href="<?=$link?>" title="<?$title?>"><?=$content?></a>
<?}?>

<main>

    <section>
        <div class="wrapper">
            <div class="top-sheet">
                <article class="intro-article sheet-padder center-aligned">
                    <div class="intro-logo"></div>

                    <h1><?=$page_title?></h1>
                    <h2><?=$page_subtitle?></h2>
                    <?=$page_content?>
                </article>
            </div>
        </div>
    </section>

    <section>
        <? drawSlider($approvedPortfolioItems,'slider-crop-','mobile-crop-',true); ?>
    </section>
    <section class="dark-section">
        <div class="wrapper">
            <div class="sheet-padder">
                <ul class="point-bar grid-container uspbar-grid" style="">
                    <li>Laat zien wie u bent</li>
                    <li>Laat zien wat u doet</li>
                    <li>Kleed uw website aan</li>
                    <li>Bouw uw portfolio</li>
                </ul>
                <div class="quote-bar">
                    Infra Communicatie bouwt met beelden
                </div>
            </div>
        </div>
    </section>
    <section class="hoe-het-werkt">
        <div class="wrapper">
            <div class="sheet-padder">

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6">
                        <div class="hoe-het-werkt">
                            <div class="align-marger top-headings">
                                <h2><?=$how_it_works_title?></h2>
                                <h3><?=$how_it_works_subtitle?></h3>
                            </div>
                            <div>
                                <?$i = 0;
                                foreach($how_it_works as $step){ $i++?>
                                    <article class="step-card-container">
                                        <div class="step-card row no-gutters">
                                            <div class="col-2 col-sm-2 col-xl-1 col-lg-1 col-md-2">
                                                <span class="card-count"><?= $i ?></span>
                                            </div>
                                            <div class="col-10 col-sm-10 col-md-10 col-lg-11 col-xl-11">
                                                <h3><?=$step['title']?></h3>
                                                <p><?=$step['description']?></p>
                                            </div>
                                        </div>
                                    </article>
                                <?}
                                ?>


                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col col-md-6">
                        <div class="waarom-infra">
                            <article>
                                <div class="align-marger top-headings">
                                    <h2><?=$usps_title?></h2>
                                    <h3><?=$usps_subtitle?></h3>
                                </div>
                                <div class="usp-points">
                                    <ul>
                                        <?
                                        foreach ($usps as $usp){?>
                                            <li><i class="fal fa-<?=$usp['icon_code']?>"></i>  <?=$usp['usp']?></li>
                                        <?}
                                        ?>
                                    </ul>
                                </div>
                                <h2>Referenties</h2>
                                <div class="referenties-home">
                                    <div class="row no-gutters">
                                        <?foreach ($references as $reference){
                                            $referentie = '
                                                <img alt="'.$reference['title'].'" class="referentie-logo" src="'.cropOrNot($reference['image'],'small-').'">
                                            ';
                                            if($reference['button'] === 'on'){
                                                makeLink($reference['link'],$reference['title'],$referentie);
                                            }else{echo $referentie;}
                                            ?>
                                        <?}?>
                                    </div>
                                </div>
                                <div class="home-cta">
                                    <div class="divided-cta-btn">
                                        <a href="tel:<?=$cms->getSetting('contact_details')[0]['phone']?>"  class="div btn-left"><i class="fa fa-phone"></i>
                                            Direct bellen</a>
                                        <div class="btn-mid">Of</div>
                                        <a href="<?=$cms->getLink(7)?>" class="btn-right div">Contactformulier</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <!--                <div class="cleared">-->
    </section>
    <section>
        <div class="wrapper">
            <div class="sheet-padder second">
                <div class="portfolio-cards">
                    <div>
                        <div class="row no-gutters">
                            <?
                            foreach ($approvedPortfolioItems as $portfolioItem) {
//                                if(isset($_SERVER['HTTP_REFERER'])) {
//                                    echo $_SERVER['HTTP_REFERER'];
//                                }
                                ?>
                                <a class="portfolio-home-link div col-6 col-sm-6 col-md-4 col-lg col-xl" href="<?=WWW_ROOT.'portfolio/'.$portfolioItem['route']?>">
                                    <div class="portfolio-card">
                                        <div class="img-container">
                                            <div class="portfolio-img"
                                                 style="background: url(<?=cropOrNot($portfolioItem['home_img'],'small-crop-')?>)no-repeat center center /cover">
                                            </div>
                                            <div class="img-overlay"></div>
                                        </div>
                                        <div class="portfolio-btn">
                                            <?= $portfolioItem['title'] ?>
                                        </div>
                                    </div>
                                </a>
                                <?
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
