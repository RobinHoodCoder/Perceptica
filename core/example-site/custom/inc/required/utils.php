<?
//BigTreeAdmin::clearCache();

function cropOrNot($imglink, $cropname){

    $result = false;

    $placeholderImg =  STATIC_ROOT.'images/header-img-aviodrome.jpg';
    $uncropped = $imglink;
    $croppedLink = BigTree::prefixFile($imglink,$cropname);

    if ($imglink == '') {
        $result = $placeholderImg;
//        return $result;
    }
    if (!empty($imglink)) {
//      Check of er een gecropped bestand bestaat..
        if(BigTree::urlExists($croppedLink)){
            $result = $croppedLink;
//            return $result;
        }else{
            //Als er geen crop bestaat, laat dan de gewone afbeelding zien...
            $result = $uncropped;
//            return $result;
        }
    }
    return $result;
}
if (isset($_SESSION['bigtree_admin']['email'])){
    $loggedIn = true;
}
function drawPortfolioHeaderold($image,$crop,$header1,$header2 = '',$content){?>
    <section class="portfolio-header retina"
             style="background-image: url('<?=cropOrNot($image,$crop)?>')">
        <div class="header-text center-aligned">
            <div class="wrapper">
                <div class="sheet-padder">
                    <h1><?=$header1?></h1>
                    <h2><?=$header2?></h2>
                    <?=$content?>
                </div>
            </div>
        </div>
    </section>
<?}
function drawPortfolioHeader($image,$crop,$header1,$header2 = '',$content, $mobileCrop = '',$next = '',$prev = '',$overviewpage ='', $retinaCrop = ""){


    if(!$mobileCrop){
        $mobileCrop = 'mobile-crop-portfolio-';
    }
    ?>
    <section class="portfolio-header retina" data-crop="<?=$crop?>" data-mobile-crop="<?=$mobileCrop?>" data-retina-crop="<?=$retinaCrop?>" data-background="<?=cropOrNot($image,$crop)?>">
        <div class="header-text center-aligned">
            <div class="wrapper">
                <div class="sheet-padder">
                    <h1><?=$header1?></h1>
                    <h2><?=$header2?></h2>
                    <?=$content?>

                </div>
                <?if(!empty($prev) || !empty($next)){
                    if (empty($prev)){$pdisabled = 'disabled';}
                    if (empty($next)){$ndisabled = 'disabled';}
                    ?>
                    <div class="portfolio-navigation">
                        <a href="<?=$prev?>" class="<?=$pdisabled?> portfolio-previous" title="Vorige categorie"><i class="fas fa-caret-left"></i></a>
                        <a href="<?=$overviewpage?>" title="Terug naar bovenliggende categorieën"><i class="fal fa-sitemap"></i></a>
                        <a href="<?=$next?>" class="<?=$ndisabled?> portfolio-next" title="Volgende categorie"><i class="fas fa-caret-right"></i> </a>
                    </div>
                <?}?>
            </div>
        </div>
    </section>
<?}
function drawSlider($images,$crop,$mobileCrop,$descriptive){

    ?>
    <div class="swiper-container home-slider lazy">
        <div class="swiper-wrapper relative">

            <? foreach ($images as $photoSlide) {
                //crop($photoSlide['image'], 0, 0, 1920, 800, 0, 0, false, false);

                if($descriptive === true){
                    $photoSlide['image'] = $photoSlide['main_image'];
                }
                ?>
                <div class="swiper-slide">

<!--                    <div class="hover-to-slide left"></div>-->
<!--                    <div class="hover-to-slide right"></div>-->
                    <div class="swiper-img swiper-lazy" data-crop="<?=$crop?>" data-mobile-crop="<?=$mobileCrop?>" data-background="<?=cropOrNot($photoSlide['image'],$crop)?>">
                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                        <div class="swipe-this">
                            <i class="fal fa-hand-point-up"></i>
                        </div>
                        <div class="swipe-overlay"></div>
                    </div>
                    <?
                    if($descriptive === true){?>
                        <div class="wrapper">
                            <div class="swiper-sheet sheet-padder">
                                <div class="row no-gutters">
                                    <div class="col-sm-7">
                                        <h2><?=$photoSlide['title']?></h2>
                                        <h3><?=$photoSlide['subtitle']?></h3>
                                    </div>
                                    <div class="col-sm-5">
                                        <a class="round-outline btn right-floated" href="<?=WWW_ROOT.'portfolio/'.$photoSlide['route']?>">Portfolio bekijken</a>
                                    </div>
                                </div>
                                <div class="cleared"></div>
                            </div>
                        </div>
                    <?}
                    ?>
                </div>
            <? } ?>
        </div>
<!--        <span class="swiper-button-next swiper-button-black"></span>-->
<!--        <span class="swiper-button-prev swiper-button-black"></span>-->
    </div>
<?}

?>
