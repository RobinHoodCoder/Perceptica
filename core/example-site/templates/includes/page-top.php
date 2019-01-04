<!--<h1>--><? //=$page_header?><!--</h1>-->

<?
function hcropOrNot($imglink, $cropname){
    $placeholderImg =  STATIC_ROOT.'images/header-img-aviodrome.jpg';
    $uncropped = $imglink;
    $croppedLink = BigTree::prefixFile($imglink,$cropname);

    if ($imglink == '') {
        $result = $placeholderImg;
        return $result;
    }else{
//      Check of er een gecropped bestand bestaat..
        if(BigTree::urlExists($croppedLink)){
            $result = $croppedLink;
            return $result;
        }else{
          //Als er geen crop bestaat, laat dan de gewone afbeelding zien...
            $result = $uncropped;
            return $result;
        }
    }
}
function drawHeaderImg($image,$crop,$mobileCrop){?>
    <div class="content-header retina" data-crop="<?=$crop?>" data-mobile-crop="<?=$mobileCrop?>" data-background="<?=cropOrNot($image,$crop)?>"></div>
<?}
if ($page['template'] === 'home') { ?>
    <? drawSlider($slider_images,'slide-full-','slide-mobile-',false);?>
<? }
elseif($page['template'] === 'content') {
    drawHeaderImg($page_image,'header-crop-','mobile-crop-portfolio-');
}elseif($page['template'] === 'contact') {
    drawHeaderImg($page_image,'header-crop-','mobile-crop-portfolio-');
}?>





