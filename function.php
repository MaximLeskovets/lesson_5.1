<?php
require __DIR__.'/vendor/autoload.php';
error_reporting(0);


    function isGet(){
        if (!empty($_GET)){
            return true;
        }
    }

    if (isGet()) {
        $seach =    $_GET['seach'];
        $lata =     $_GET['lat'];
        $lona =     $_GET['lon'];
    }

    $api = new \Yandex\Geo\Api();

    $api
        ->setQuery("$seach")
        ->setLimit($foundCount)
        ->setLang(\Yandex\Geo\Api::LANG_RU)
        ->load();

    $response = $api->getResponse();
    $foundCount = $response->getFoundCount();
    $collection = $response->getList();
    $i=0;


    foreach ($collection as $item) {
        $result[$i]=array(
            $item->getAddress(),
            $item->getLatitude(),
            $item->getLongitude());
            $lon[$i] = $item->getLongitude();
            $lat[$i] = $item->getLatitude();
        $i++;
    }

    function view($result,$lat,$lon,$seach)
    {
        $j=0;
        foreach ($result as $key) {
            for ($i = 0; $i < 1; $i++) {
                echo "<a href=?seach=$seach&lat=$lat[$j]&lon=$lon[$j]>".$key[$i] ."<br/></a>";
                $j++;
            }
            echo "<br/>";
        }
    }