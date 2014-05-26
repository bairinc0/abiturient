<?php
/**
 * Класс находит команду соответствующую адресной строке, если такой команды нет отправляет на дефолтную команду
 * Функция findCommand возвращает SimpleXml объект
 * Использование:
	$url=Router::findCommand("/siteRoot");
	if ($url){
		print_r($url);//печать всего объекта
		echo "<br> echo=".$url->command;//вывод команды
	}
	else{
		echo "error!";//ошибка
	}
 */
	class Router{		
		public static function findCommand($siteRoot){
			//Исключаем GET параметры из адреса
			$url=explode("/?",$_SERVER['REQUEST_URI']);
			$url=$url[0];
			//работа с XML
			$filename=$_SERVER['DOCUMENT_ROOT'].$siteRoot."/config/route.xml";
			if (file_exists($filename)){
				try{
					//подключаем XML-Файл
					$xml=simplexml_load_file($filename);
					//вычисляем команду
					//обрабатываем url
					if ($url==$siteRoot||$url==$siteRoot."/"){
						//переход на дефолтную страницу
						$commandUrl="default";
					}
					else{
						//переход на страницу команды
						$commandUrl=explode($siteRoot."/",$url);				
						$commandUrl=$commandUrl[1];
					}			
					
					//формирует xpath запрос к xml файлу
					$url=$xml->xpath("/routes/route[@url='".$commandUrl."']");
					$url=$url[0];	
					if (is_null($url)){//url не найде в xml файле
						$commandUrl="default";
						$url=$xml->xpath("/routes/route[@url='".$commandUrl."']");
						$url=$url[0];
					}	
				}
				catch(Exception $e){
					$url=false;
					//LogFileWrite
					//пишем в лог что выброшено исключение
				}
			}
			else{
				$url=false;
				//LogFileWrite
				//пишем в лог что не существует файла
			}					
			return $url;
		}
	}
?>