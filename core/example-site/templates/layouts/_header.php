<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <?
    //echo "<pre>", var_dump($bc), "</pre>";
//    echo "<pre>", var_dump(), "</pre>";

    if(!$page_image){
        $page_image = $header_image;
    }
    if($slider_images){
        $page_image = $slider_images[0]['image'];
    }


    if(isset($item)){

        if($item['titel']){
            $bigtree['page']['title'] = $item['titel'];
            $item['title'] = $item['titel'];
        }
        if($item['title']){
            $bigtree['page']['title'] = $item['title'];
        }
        if (count($bigtree["commands"]) == 2) {
            $cms->setHeadContext($route, $item['id'],$item['title'],$item['subtitle'],cropOrNot($item['header_img'],'header-crop-'));
        }
        else if(count($bigtree["commands"]) == 1){
            $cms->setHeadContext($route, $item['id'],$item['title'],$item['subtitle'],cropOrNot($item['header_image'],'header-crop-'));
        }
    }
    else{
        $cms->setHeadContext('bigtree_pages', $page['id'],'',strip_tags($page_content),cropOrNot($page_image,'header-crop-'));
    }




    $cms->drawHeadTags($site_title = "Infra Communicatie", $divider = "|");

    ?>

    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Accept-CH" content="DPR, Width">
    <meta name="theme-color" content="#272727" />
    <meta name="keywords" content="<?=$bigtree["page"]["meta_keywords"]?>" />
    <meta name="description" content="<?=$bigtree["page"]["meta_description"]?>" />

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#444444">
    <meta name="msapplication-TileColor" content="#252525">
    <meta name="theme-color" content="#ffffff">





    <!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->

    <link rel="stylesheet" type="text/css" href="<?=STATIC_ROOT?>css/site.css">
    <link rel="stylesheet" type="text/css" href="<?=STATIC_ROOT?>css/bootstrap.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-9ralMzdK1QYsk4yBY680hmsb4/hJ98xK3w0TIaJ3ll4POWpWUYaA2bRjGGujGT8w" crossorigin="anonymous">

    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-124278540-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-124278540-1');
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <?
    if($galleryPlugins === true){?>
        <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <?}
    ?>
<!--    <script src="--><?//=WWW_ROOT?><!--js/plugins/bricksjs/bundle.js"></script>-->

<!--    <script type="text/javascript" src="--><?//=STATIC_ROOT?><!--js/plugins/swiper/swiper.min.js"></script>-->
    <script type="text/javascript" src="<?=STATIC_ROOT?>js/site.js"></script>
<!--    <script type="text/javascript" src="--><?//=STATIC_ROOT?><!--js/javascript-dist.js"></script>-->
<!--    <script type="text/javascript" src="--><?//=STATIC_ROOT?><!--js/javascript.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Barlow Condensed', 'Roboto']
            }
        });
    </script>
</head>
<body>
<div class="device mobile desktop desktop-large"></div>
<div class="menuOverlay"></div>
<a class="phone-cta mobile" href="tel:<?=$cms->getSetting('contact_details')[0]['phone']?>">
    <div class="dark-bar">
        <i class="fal fa-mobile"></i>
        <p>Bellen?</p>
    </div>
</a>

    <div class="welcome" style="display: none;">
        <i class="fal fa-times-circle" id="hidelink"></i>
        <span class="h1">Gelukkig nieuwjaar!</span>
        <p>
            Sinds 2019 heb ik een nieuwe website!<br>
            Het webadres is nu veranderd van infrafotografie.nl naar infracommunicatie.nl<br>
            De  beste wensen en tot snel!<br>
            Groeten, Marcel
        </p>
    </div>





