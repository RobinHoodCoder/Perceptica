<?
//require_once $server_root."vendor/cloudinary/cloudinary_php/autoload.php";
//require_once $server_root."vendor/cloudinary/cloudinary_php/samples/PhotoAlbum/lib/rb.php";
//require_once $server_root."vendor/cloudinary/cloudinary_php/samples/PhotoAlbum/settings.php";

$galleryPlugins = true;
$api = new \Cloudinary\Api();


//var_dump($result);
/*
 * Vraag ALLE tegas op. Niet 10 stuks...
 * */
$tags = $api->tags(array("max_results" => "20"));

//echo "<pre>", var_dump($tags['tags']), "</pre>";

$tagArray = array();
$searchAPI = new \Cloudinary\Search();
$searchAPI2 = new \Cloudinary\Search();


//echo "<pre>", var_dump($item['cloud_tags']), "</pre>";
//Check of er tags bestaan voor dit item!
//echo "<pre>", var_dump($cloud_tags), "</pre>";
//Wanneer het de pagina "Recent is", is er geen item.. Maar wel $cloud_tags
if (empty($item['cloud_tags']) && !empty($tags)) {
    $item['cloud_tags'] = $cloud_tags;
}

$max_results = 30;
if (!empty($item['cloud_tags'])) {


    //Yaay, er zijn tags!
    foreach ($item['cloud_tags'] as $itemTag){
        foreach ($tags['tags'] as $cloudTag){

            if ($itemTag == $cloudTag){
                //var_dump($itemTag);

                //maak een mooie array van de matchende tags!
                $tagArray[] = $itemTag;
            }
        }
    }
    //echo "<pre>", var_dump($tagArray), "</pre>";
    //Implodeer de tags zodat er foto's met de matchende tags van cloudinary kunnen worden opgehaald.


    if(count($tagArray) > 1){
        $implodedTags = implode(", ",$tagArray);
        $implodedTags = "".$implodedTags."";
    }else{
        $implodedTags = $tagArray[0];
        if(preg_match('/\s/',$implodedTags)){
            $implodedTags = $implodedTags;
        }

    }

    //echo "<pre>", var_dump($implodedTags), "</pre>";


    //echo "<pre>", var_dump($implodedTags), "</pre>";

    $files = $searchAPI
        ->expression(
            'resource_type:image && tags='.$implodedTags)
        ->with_field('image_metadata')
        ->max_results($max_results)
        ->sort_by('uploaded_at','desc');
    $context  = $searchAPI2
        ->expression(
            'resource_type:image && tags='.$implodedTags)
        ->with_field('context')
        ->max_results($max_results)->execute();



}else{
//    Oeps, er zijn geen tags gevonden... Dan maar de laatste 40 foto's...
    $files = $searchAPI
        //->expression('resource_type:image AND folder:"Infra Communicatie"')
        ->expression("")
        ->with_field('image_metadata')
        ->max_results($max_results)
        ->sort_by('filename','asc');
    $context  = $searchAPI2
        ->expression(
            'resource_type:image')
        ->with_field('context')
        ->max_results($max_results)->execute();
}




$files = $files->execute();



$dateCreated = $resource['image_metadata']['DigitalCreationDate'];

if (!empty($files)) {?>
    <div class="wrapper">
        <div class="row masonry-grid picture">
        <? $itemcount = 0;
            $allResources = $files['resources'];

            foreach ($allResources as $resource){

                    //Caption standaard
                    $photoCaption = $resource['image_metadata']['Description'];

                    //Vind deze ID
                    $toFind = $resource['public_id'];

                    foreach ($context['resources'] as $contextualResource){

                        if (!empty($contextualResource['context'])) {
                           if($contextualResource['public_id'] === $toFind){
                               $res['id'] = $contextualResource['public_id'];
                               $res['context'] = $contextualResource['context'];
                               $captions = $res;
                               $captionText = $captions['context']['caption'];
                           }
                        }
                    }

                if(!empty($captionText)){
                    $photoCaption = $captionText;
                }

                //Unset omdat code vet gaar is
                unset($captionText);
                //var_dump($photoCaption);




                //Thumbnail Pefix

                // Image Size berekenen
                $width = $resource['width'];
                $height = $resource['height'];
                //Geef een ID van de foto mee zodat de photoswipe weet welke foto aangeklikt is
                $itemcount++;
                $dateCreated = $resource['image_metadata']['DigitalCreationDate'];

                //die('Motherfucker');
                if(!$photoCaption){
                    $aTitle = "Klik om te bladeren op ware grootte.";
                }else{
                    $aTitle = "Klik om te bladeren op ware grootte (". $photoCaption.")";
                }
                    ?>
                <div class="col-md-4 grid-item">
                    <figure class="" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                        <a title="<?=$aTitle?>" itemprop="contentUrl" data-size="<?=$width . 'x' . $height?>" data-tags="" data-index="<?=$itemcount?>"
                           data-caption="<?=$photoCaption?> "
                            href="<?php echo cloudinary_url($resource["public_id"],
                                        array("transformation" => array(
                                            array("gravity"=>"south_east", "overlay"=>"Infra_Communicatie_Logo_Wit01012017", "opacity"=>55, "width"=>250, "x"=>100, "y"=>100, "crop"=>"scale")
                                        )))?>">

                            <?
                            if($itemcount < 4){
                                echo cl_image_tag($resource["public_id"],
                                    array("client_hints"=>true, "sizes"=>"100vw", "alt" => $photoCaption, "transformation"=>array(
                                        array("width"=>700, "fetch_format"=>"auto", "quality"=>"auto", "crop"=>"scale"),
                                        array("gravity"=>"south_east", "overlay"=>"Infra_Communicatie_Logo_Sluiter_Wit01012017", "opacity"=>31, "width"=>50, "x"=>60, "y"=>60, "crop"=>"scale")
                                        ))
                                );
                            }elseif($itemcount >= 4){?>
                                <img data-appear-top-offset="-200" alt="<?=$photoCaption?>" class="lazy" src="
                                <?
                                echo cloudinary_url($resource["public_id"],
                                    array("transformation" => array(
                                        array("client_hints"=>true, "effect"=>"blur:890", "sizes"=>"100vw", "transformation"=>array(
                                            array("width"=>100, "fetch_format"=>"auto", "quality"=>"auto", "crop"=>"scale")
                                        ))
                                    )))
                                ?>"
                                 data-src="<?
                                echo cloudinary_url($resource["public_id"],
                                    array("client_hints"=>true, "sizes"=>"100vw", "alt" => $photoCaption, "transformation"=>array(
                                        array("width"=>700, "fetch_format"=>"auto", "quality"=>"auto", "crop"=>"scale"),
                                        array("gravity"=>"south_east", "overlay"=>"Infra_Communicatie_Logo_Sluiter_Wit01012017", "opacity"=>31, "width"=>50, "x"=>60, "y"=>60, "crop"=>"scale")
                                    )))
                                ?>">
                            <?}?>

                        </a>
                    </figure>
                </div>
                <?
                //var_dump($resource);
                unset($resource);
                unset($photoCaption);
            }
        ?>
        </div>
    </div>
<?}?>
<script>
    // document.addEventListener("DOMContentLoaded", function() {
    //     var lazyloadImages = document.querySelectorAll("img.lazy");
    //     var lazyloadThrottleTimeout;
    //
    //     function lazyload () {
    //         if(lazyloadThrottleTimeout) {
    //             clearTimeout(lazyloadThrottleTimeout);
    //         }
    //
    //         lazyloadThrottleTimeout = setTimeout(function() {
    //             var scrollTop = window.pageYOffset;
    //             lazyloadImages.forEach(function(img) {
    //                 if(img.offsetTop < (window.innerHeight + scrollTop)) {
    //                     img.src = img.dataset.src;
    //                     img.classList.remove('lazy');
    //                     img.classList.add('loaded').trigger('imgLoaded');
    //
    //
    //                 }
    //             });
    //             if(lazyloadImages.length == 0) {
    //                 document.removeEventListener("scroll", lazyload);
    //                 window.removeEventListener("resize", lazyload);
    //                 window.removeEventListener("orientationChange", lazyload);
    //             }
    //         }, 40);
    //     }
    //
    //     document.addEventListener("scroll", lazyload);
    //     window.addEventListener("resize", lazyload);
    //     window.addEventListener("orientationChange", lazyload);
    // });
</script>

