<?php
require __DIR__.'/vendor/autoload.php';
error_reporting(0);


    function isGet(){
        if (!empty($_GET['seach'])){
            return true;
        }
    }

    if (isGet()) {
        $seach = $_GET['seach'];
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
        $i++;
    }

function view($result)
{
    foreach ($result as $key) {
        for ($i = 0; $i < 3; $i++) {
            echo $key[$i] . "<br/>";
        }
        echo "<br/>";
    }
}