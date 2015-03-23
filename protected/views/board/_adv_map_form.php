<?php
/**
 * Created by JetBrains PhpStorm.
 * User: admin
 * Date: 27.02.13
 * Time: 15:06
 * To change this template use File | Settings | File Templates.
 */

echo CHtml::hiddenField('latitude','') ;
echo CHtml::hiddenField('longitude','') ;
Yii::import('ext.EGMap.*');
$gMap = new EGMap();
$gMap->setWidth(600);
$gMap->setHeight(400);
$gMap->zoom = 6;
$mapTypeControlOptions = array(
    'position' => EGMapControlPosition::RIGHT_TOP,
    'style' => EGMap::MAPTYPECONTROL_STYLE_DROPDOWN_MENU//EGMap::MAPTYPECONTROL_STYLE_HORIZONTAL_BAR
);

$gMap->mapTypeId = EGMap::TYPE_ROADMAP;
$gMap->mapTypeControlOptions = $mapTypeControlOptions;

$gMap->zoomControlOptions = array(
    'position'=>EGMapControlPosition::BOTTOM_LEFT,
    'style'=>EGMap::ZOOMCONTROL_STYLE_SMALL
);

// Подготовка InfoWindow с информацией о нашем маркере.
$info_window_a = new EGMapInfoWindow("<div class='gmaps-label' style='color: #000;'>Hi! I'm your marker!</div>");

// Настройка иконки для маркеров.
$icon = new EGMapMarkerImage("http://google-maps-icons.googlecode.com/files/car.png");

$icon->setSize(32, 37);
$icon->setAnchor(16, 16.5);
$icon->setOrigin(0, 0);

$clickevent = new EGMapEvent('click', "function (event) { $('#latitude').val(event.latLng.lat());
                                                          $('#longitude').val(event.latLng.lng());
                                                          }", false, EGMapEvent::TYPE_EVENT_DEFAULT);

$dragevent = new EGMapEvent('dragend', "function (event) {  $('#latitude').val(event.latLng.lat());
                                                            $('#longitude').val(event.latLng.lng());
                                                          }", false, EGMapEvent::TYPE_EVENT_DEFAULT);

// Сохранение координат после того, как пользователь перетащил наш маркер.
/*$dragevent = new EGMapEvent('dragend', "function (event) { $.ajax({
                                            'type':'POST',
                                            'url':'".$this->createUrl('catalog/savecoords').'/'.$items->id."',
                                            'data':({'lat': event.latLng.lat(), 'lng': event.latLng.lng()}),
                                            'cache':false,
                                        });}", false, EGMapEvent::TYPE_EVENT_DEFAULT);     */

// Если мы уже создали маркер - показать его
if ($map)
{

    $marker = new EGMapMarker($map->lat, $map->lng, array('title' => Yii::t('app','Маркер'),
        'icon'=>$icon, 'draggable'=>true), 'marker', array('dragevent'=>$dragevent));
    $marker->addHtmlInfoWindow($info_window_a);
    $gMap->addMarker($marker);
    $gMap->setCenter($map->lat, $map->lng);
    $gMap->zoom = 16;

// If we don't have marker in database - make sure user can create one
}
else
{   // Если у нас нет маркера в базе данных - убедиться, что пользователь можете создать его

    $sample_address = 'Украина, Кировоград';

    // Create geocoded address
    $geocoded_address = new EGMapGeocodedAddress($sample_address);
    $geocoded_address->geocode($gMap->getGMapClient());

    // Center the map on geocoded address
    $gMap->setCenter($geocoded_address->getLat(), $geocoded_address->getLng());

    // Setting up new event for user click on map, so marker will be created on place and respectful event added.
    /*$gMap->addEvent(new EGMapEvent('click',
        'function (event) {var marker = new google.maps.Marker({position: event.latLng, map: '.$gMap->getJsName().
            ', draggable: true, icon: '.$icon->toJs().'}); '.$gMap->getJsName().
            '.setCenter(event.latLng); var dragevent = '.$dragevent->toJs('marker').
            '; $.ajax({'.
            '"type":"POST",'.
            '"url":"'.$this->createUrl('catalog/savecoords')."/".$items->id.'",'.
            '"data":({"lat": event.latLng.lat(), "lng": event.latLng.lng()}),'.
            '"cache":false,'.
            '}); }', false, EGMapEvent::TYPE_EVENT_DEFAULT_ONCE));    */

    $gMap->addEvent(new EGMapEvent('click',
        'function (event) {var marker = new google.maps.Marker({position: event.latLng, map: '.$gMap->getJsName().
            ', draggable: true, icon: '.$icon->toJs().'}); '.$gMap->getJsName().
            '.setCenter(event.latLng); var dragevent = '.$dragevent->toJs('marker').
            ';  $("#latitude").val(event.latLng.lat());
                $("#longitude").val(event.latLng.lng());
                }', false, EGMapEvent::TYPE_EVENT_DEFAULT_ONCE));
}
$gMap->renderMap(array(), Yii::app()->language);
?>