<?php
/**
 * ����� ������� ������� ��������������� �������� ������, ���� ����� ������� ��� ���������� �� ��������� �������
 * ������� findCommand ���������� SimpleXml ������
 * �������������:
	$url=Router::findCommand("/siteRoot");
	if ($url){
		print_r($url);//������ ����� �������
		echo "<br> echo=".$url->command;//����� �������
	}
	else{
		echo "error!";//������
	}
 */
	class Router{		
		public static function findCommand($siteRoot){
			//��������� GET ��������� �� ������
			$url=explode("/?",$_SERVER['REQUEST_URI']);
			$url=$url[0];
			//������ � XML
			$filename=$_SERVER['DOCUMENT_ROOT'].$siteRoot."/config/route.xml";
			if (file_exists($filename)){
				try{
					//���������� XML-����
					$xml=simplexml_load_file($filename);
					//��������� �������
					//������������ url
					if ($url==$siteRoot||$url==$siteRoot."/"){
						//������� �� ��������� ��������
						$commandUrl="default";
					}
					else{
						//������� �� �������� �������
						$commandUrl=explode($siteRoot."/",$url);				
						$commandUrl=$commandUrl[1];
					}			
					
					//��������� xpath ������ � xml �����
					$url=$xml->xpath("/routes/route[@url='".$commandUrl."']");
					$url=$url[0];	
					if (is_null($url)){//url �� ����� � xml �����
						$commandUrl="default";
						$url=$xml->xpath("/routes/route[@url='".$commandUrl."']");
						$url=$url[0];
					}	
				}
				catch(Exception $e){
					$url=false;
					//LogFileWrite
					//����� � ��� ��� ��������� ����������
				}
			}
			else{
				$url=false;
				//LogFileWrite
				//����� � ��� ��� �� ���������� �����
			}					
			return $url;
		}
	}
?>