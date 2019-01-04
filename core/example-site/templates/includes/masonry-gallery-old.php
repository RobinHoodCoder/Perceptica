<?
require_once $server_root."vendor/cloudinary/cloudinary_php/autoload.php";
require_once $server_root."vendor/cloudinary/cloudinary_php/samples/PhotoAlbum/lib/rb.php";
require_once $server_root."vendor/cloudinary/cloudinary_php/samples/PhotoAlbum/settings.php";


$api = new \Cloudinary\Api();
$result = $api->resources(array("folder" => "InfraCommunicatie"));


//var_dump($result);
/*
 * Vraag ALLE tegas op. Niet 10 stuks...
 * */
$tags = $api->tags(array("max_results" => "20"));

$tagmodule = new Tags();
$all_tags = $tagmodule->getAll();

$tags_for_page = array();

if (!empty($item['tags'])) {
    foreach ($item['tags'] as $itemTag){
        $moduleMatches = $tagmodule->getMatching('id',$itemTag);
        if(empty($moduleMatches)){
            //Als er geen matches konden gevonden met de tags in de module
            //Haal dan alle tags weg uit dit portfolio item...
            $portfolioItems->update($item['id'],'tags', '[]');
        }
    }
}else{
    echo'Geen tags op dit portfolio item toegevoegd..';
}
if (!empty($moduleMatches)) {
    foreach ($moduleMatches as $tag_for_page){
        //Als er in de tag module een tag bestaat met de ID die overeenkomt met de id van de portfolio item tags,
        //maak dan een array met alle tags die matchen...
        $tags_for_page[] = $tag_for_page['title'];
    }
}


//echo "<pre>", var_dump($tags['tags']), "</pre>";

foreach ($tags['tags'] as $cloudTag){
    $modMatch = $tagmodule->getMatching('title',$cloudTag);
    //echo "<pre>", var_dump($modMatch), "</pre>";
    if(empty($modMatch)){
        //cloud tag niet gevonden... voeg deze toe aan een array met tags die nog toegevoegd moeten worden aan de db
        $missing[] = $cloudTag;

    }
}
//Als we missende items hebben in de module, voeg deze dan toe van cloudinary...
if(!empty($missing)){
    foreach ($missing as $addMissing){
        $tagmodule->add(array('title' => $addMissing));
    }
}
//Vergelijk de tags die in de module bestaan met die op de server...
//Als er in de module items staan die niet op de server staan, verwijder deze dan uit de module...
//Verwijder het item met de marchende id ook uit het huidige portfolio item...

$updatedModule = $tagmodule->getAll();

foreach ($tags['tags'] as $cloudTag){
    $allTags[] = $tagmodule->getMatching('title', $cloudTag);
}




//Tags for page is een array met strings
//echo "<pre>", var_dump($tags_for_page), "</pre>";



if ($tags) {

//    Maak een mooi lijstje van middende items!!
    $missing = array_diff($tags['tags'],$matchendeTags);
//    Voeg de missende items 1 voor 1 toe aan de module...
    foreach ($missing as $toAdd){
        $tagmodule->add(array('title' => $toAdd));
    }
}
//var_dump($matchendeTags);




$tagArray = array();
$searchAPI = new \Cloudinary\Search();
$searchAPI = new \Cloudinary\Search;

//Check of er tags bestaan voor dit item!
if (!empty($item['tags'])) {
    //Yaay, er zijn tags!
    foreach ($item['tags'] as $itemTag){
        foreach ($all_tags as $moduleTag){
            if ($itemTag == $moduleTag['id']){
                //maak een mooie array van de matchende tags!
                $tagArray[] = $moduleTag['title'];
            }
        }
    }
    //echo "<pre>", var_dump($tagArray), "</pre>";
    //Implodeer de tags zodat er foto's met de matchende tags van cloudinary kunnen worden opgehaald.
    $implodedTags = implode(" ",$tagArray);
    $files = $searchAPI->expression('resource_type:image AND tags='.$implodedTags)->max_results(500)->sort_by('created_at','desc');
}else{
    //Oeps, er zijn geen tags gevonden... Dan maar de laatste 40 foto's...
    $files = $searchAPI->expression('resource_type:image')->max_results(40)->sort_by('created_at','desc');

}

//echo "<pre>", var_dump($tagArray), "</pre>";
//$itemTags = $tagmodule->getMatching('id',$item['tags']);
$files = $files->execute();
$mainTag = strtok($implodedTags, ',');

//var_dump($files);


$stack = array();
$lastElement = end($tagArray);
foreach ($tagArray as $niceTag){
    if($niceTag  !== $lastElement){
        $niceTag = '#'.$niceTag. ', ';
        array_push($stack, $niceTag);
    }else{
        $niceTag = '#'.$niceTag;
        array_push($stack, $niceTag);
    }
}
$niceTagArray = $stack;
unset($stack);



//https://res.cloudinary.com/dkzoj8kfe/image/upload/c_scale,w_auto/c_scale,g_south_east,l_Infra_Communicatie_Logo_Sluiter_Wit01012017,o_31,w_90,x_100,y_100/c_limit,w_1000/v1543596235/Infra Communicatie/IC-2504307
//var_dump($files['resources']);
?>


<div class="wrapper">

    <div class="row masonry-grid picture">
    <?
    $itemcount = 0;
    foreach ($files['resources'] as $resource){

            //Thumbnail Pefix

            // Image Size berekenen
            $width = $resource['width'];
            $height = $resource['height'];
            //Geef een ID van de foto mee zodat de photoswipe weet welke foto aangeklikt is
            $itemcount++;

            ?>
            <div class="col-md-4 grid-item">
                <figure class="" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                    <a itemprop="contentUrl" data-size="<?=$width . 'x' . $height?>" data-tags="<?foreach ($niceTagArray as $pswpTag){echo $pswpTag;}?>" data-index="<?=$itemcount?>"
                       data-caption="<?=$mainTag?> <?=$resource['filename']?>"
                        href="<?php echo cloudinary_url($resource["public_id"],
                                    array("transformation" => array(
                                        array("gravity"=>"south_east", "overlay"=>"Infra_Communicatie_Logo_Wit01012017", "opacity"=>55, "width"=>250, "x"=>100, "y"=>100, "crop"=>"scale")
                                    )))?>">
                        <? echo cl_image_tag($resource["public_id"],
                            array("client_hints"=>true, "sizes"=>"100vw", "transformation"=>array(
                                array("width"=>"auto", "crop"=>"scale"),
                                array("gravity"=>"south_east", "overlay"=>"Infra_Communicatie_Logo_Sluiter_Wit01012017", "opacity"=>31, "width"=>90, "x"=>100, "y"=>100, "crop"=>"scale"),
                                array("width"=>1000, "crop"=>"limit")))
                        );?>
                    </a>
                </figure>
            </div>
        <?
        //var_dump($resource);
    }
    ?>
    </div>
</div>
