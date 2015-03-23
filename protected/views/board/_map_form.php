<p>Отметить на карте</p>
<div id="map_canvas">
<?php
    Yii::import('ext.EGMap.*');
    $gMap = new EGMap();
    $gMap->setWidth(600);
    $gMap->setHeight(400);
    $gMap->zoom = 5;

    $sample_address = 'Czech Republic, Prague, Olivova';

    // Создать геокодированный адрес
    $geocoded_address = new EGMapGeocodedAddress($sample_address);
    $geocoded_address->geocode($gMap->getGMapClient());

    // Центр карты на геокодированный адрес
    $gMap->setCenter($geocoded_address->getLat(), $geocoded_address->getLng());

    // Добавить маркер на геокодированный адрес
    $gMap->addMarker(
        new EGMapMarker($geocoded_address->getLat(), $geocoded_address->getLng())
    );

    $gMap->renderMap();
?>
</div>

