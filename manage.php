<?php
//Файл менеджер - распознает команды и запускает сооветсвующие скрипты
include 'Auth/Auth.php';	   //Файл авторизации
include 'tfcommands/text.php'; //Файл с текстами команд
include 'CCNA/ping.php';
include 'CCNA/math.php';	   
//include 'CCNA/ip.php';

function bot_manager($message, $chat_id, $user_id)
    {
	//Понижение регистра
	$mess = strtolower($message);
	
	switch (Auth($user_id))
		{
		case 'root': //Команды группы пользователей Рут
			if ($mess[0] == "/")
				{
				//----- Обязательные команды -- help и start
   	 	        if (substr($mess,1,4) == "help") return TBHELP_ROOT;
 		        if (substr($mess,1,5) == "start") return TBSTART;
			    //----- CCNA_BOT ----
			    if (substr($mess,1,5) == "proxy") return TBPROXY;
				if (substr($mess,1,3) == "ip") return TBIPI;
				if (substr($mess,1,4) == "ping") return ping($mess);
				if (substr($mess,1,4) == "mask") return mask($mess);
			    //----- Команды помошники -----
				if (substr($mess,1,4) == "logs") return TBLOGS;
				break;
			    }
		case 'student': //Команды группы пользователей Студент
			if ($mess[0] == "/")
				{
				//----- Обязательные команды -- help и start
   	     	    if (substr($mess,1,4) == "help") return TBHELP;
 	    	    if (substr($mess,1,5) == "start") return TBSTART;
			    //----- CCNA_BOT ----
			    if (substr($mess,1,5) == "proxy") return TBPROXY;
				if (substr($mess,1,3) == "ip") return TBIPI;
				if (substr($mess,1,4) == "mask") return mask($mess);
		  		//----- Команды помошники -----
		  	    if (substr($mess,1,9) == "headgroup") sendMessage($id_chat, $chat_id);
				break;
				}
		default: break;
		}
	}
?>



















