<?

function getModules($module1,$module2){
    return array('module1' => ['joe' => $module1->getAllPositioned()], 'module2' => $module2->getAllPositioned());
};





//function getPortfolio($mainClass,$subClass,$columns = "",$subItem = false){
//    $rootItem = $mainClass->getAllPositioned($columns);
//
//    if($subItem === true){
//        foreach ($rootItem['sub_galleries'] as $subgal){
//            if($subgal === $item['id']){
//                //echo "<pre>", var_dump($rootItem), "</pre>";
//                $rootRoute = WWW_ROOT . 'landing/' .$rootItem['route'];
//                //echo "<pre>", var_dump($rootItem), "</pre>";
//            }
//        }
//    }else{
//        $rootRoute = WWW_ROOT . 'landing/' .$rootItem['route'];
//    }
//}
//$params = array('sub_galleries','title','route');
//getPortfolio(new Portfolio(), new Gallery(),$params,true);







?>
