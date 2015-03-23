<?php
/**
 * Описание файла
 * Служебные утилиты для приложения
 *
 * @author Moskvin Vitaliy <moskvinvitaliy@gmail.com>
 * @link http://moskvin-vitaliy.net/
 * @copyright Copyright &copy; 2013 Moskvin Vitaliy Software
 * @license GPL & MIT
 */
class Util extends CComponent
{
	/**
	 * Обреза строки на нужное количество символов
	 * Целостность слов сохраняется
	 * В конце строки добавляется троеточие
	 * HTML теги предварительно вырезаются
	 * @param string $string
	 * @param integer $limit
	 * @return string
	 */
	public static function crop($string, $limit=100)
	{		
		$string = strip_tags($string);
		
		if (strlen($string) >= $limit )
		{
			$substring_limited = substr($string,0, $limit);
			return substr($substring_limited, 0, strrpos($substring_limited, ' ' )).' ...';
		}
		else
		{
			//Если количество символов строки меньше чем задано,
			//то просто возращаем оригинал
			return $string;
		}
	}
	
	/**
	 * Фильтр. Замена запятых точками.
	 * Используется в моделях, в правилах валидации, для фильтрации float значений
	 * @param unknown $str
	 * @return mixed
	 */
	public function replaceComma($str)
	{
		return str_replace(',', '.', $str);
	}
	
	/**
	 * Фильтр. Замена протокола в url адресе/
	 * Используется в правилах валидации модели.
	 * @param unknown $str
	 * @return string
	 */
	public function replaceProtocol($str)
	{
		$tmp = str_replace('http://','',$str);
		
		return 'http://'.$tmp;
	}
	
	/**
	 * Фильтр. Сериализация массива в строку для сохранения в базу данных.
	 * @param unknown $array
	 * @return string
	 */
	public function arrayToString($array)
	{
		if(is_array($array))
		{
			return serialize($array);
		}
		else 
		{
			return $array;
		}
	}
	
	/**
	 * Фильтр. Преобразует часы в секунды.
	 * Используется в модели заданий при сохранении срока исполнения задания.
	 * @param unknown $hours
	 * @return number
	 */
	public function hoursToSecond($hours)
	{
		return $hours*60*60;
	}
	
	/**
	 * Функция преобразующая секунды в часы
	 * @param integer $sec
	 */
	public function secondToHours($sec) 
	{
		return $sec/60/60;
	}
	
	/**
	 * Возвращает разницу во времени в формате 1 час. 23 мин. 45 сек.
	 * @param int $start
	 * @param int $stop
	 */
	public function formatDiffTime($start,$stop) 
	{
		/*
		 * Разница между временными метками tmestamp
		 */
		$diff = $stop-$start;
		/*
		 * Если разница меньше часа, то в формат не включаем часы
		 */
		if($diff<3600)
		{
			$format = "i мин. s сек.";
		}
		/*
		 * Если разница больше или равна часу, то часы в формат нужно включить
		 */
		elseif ($diff>=3600)
		{
			$format = "H час. i мин. s сек.";
		}
		/*
		 * Возвращаем отформатированную дату
		 */
		return date($format, mktime(0, 0, $diff));
	}
	
	/**
	 * Переводим DATETIME в формат вида: 5 дн. назад
	 * или 1 мин. назад и тп.
	 *
	 * @param unknown_type $date_time
	 * @return unknown
	 */
	public static function getTimeAgo($date_time)
	{
		$timeAgo = time() - strtotime($date_time);
		$timePer = array(
				'week'=>array(3600 * 24 * 7, 'нед.'),
				'day' 	=> array(3600 * 24, 'дн.'),
				'hour' 	=> array(3600, ''),
				'min' 	=> array(60, 'мин.'),
				'sek' 	=> array(1, 'сек.'),
		);
		foreach ($timePer as $type =>  $tp) 
		{
			$tpn = floor($timeAgo / $tp[0]);
			if ($tpn)
			{
	
				switch ($type) 
				{
					case 'hour':
						if (in_array($tpn, array(1, 21))){
							$tp[1] = 'час';
						}elseif (in_array($tpn, array(2, 3, 4, 22, 23)) ) {
							$tp[1] = 'часa';
						}else {
							$tp[1] = 'часов';
						}
						break;
				}
				return $tpn.' '.$tp[1].' назад';
			}
		}
	}
	/**
	 * Множественное число по русски
	 * @param $n количество
	 * @param $one комментарий
	 * @param $two комментария
	 * @param $many комментариев
	 */
	public static function Plural($n,$one,$two,$many)
	{
		return $n%10==1&&$n%100!=11?$one:($n%10>=2&&$n%10<=4&&($n%100<10||$n%100>=20)?$two:$many);
	}
	
}