<?php
    require_once "function.php";
?>

<!doctype html>
<html lang="ru">
<head>
    <title>Задания для "Менеджер Composer"</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://api-maps.yandex.ru/2.1/?lang=tr_TR" type="text/javascript"></script>
    <script type="text/javascript">
        ymaps.ready(init);
        var myMap,
            myPlacemark;

        function init(){
            myMap = new ymaps.Map("map", {
                center: [<?php echo $lata; ?>,<?php echo $lona; ?>],
                zoom: 7
            });

            myPlacemark = new ymaps.Placemark([<?php echo $lata; ?>,<?php echo $lona; ?>], {
            });

            myMap.geoObjects.add(myPlacemark);
        }
    </script>

</head>
<body>

<form method="get">
    <input type="text" name="seach">
    <button>Найти</button>
</form>
<div id="map" style="width: 600px; height: 400px"></div>
<?php
    view($result,$lat,$lon,$seach);
?>
</body>
</html>