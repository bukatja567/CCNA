
<?php
//Главный скрипт - вызывается при поступлении сообщения от телеги
include 'settings.php';   //Добавить файл с токеном бота
include 'manage.php';     //Главный менеджер - ищет команду в сообщении
include 'sys/system.php'; //Подготавливает ответ и раздербанивает json
include 'log.php';        //Ведение лога

wr_input_mess_to_logs ($chat_id, $username, $user_id, $message); //Писать логи входящих сообщений
$preload_text = bot_manager ($message, $chat_id, $user_id);	
//---------------------------------------------
if (strtolower($message) == '/ccna1') 
    {
    $preload_text = "\nСписок доступных команд: \n1)Начальные настройки коммутатора\n2)Начальные настройки маршрутизатора\n3)Настройка интерфейсов\n4)Удаленный доступ\n5) Добавить пользователя\nЧтобы просмотреть все доступные команды, введите: \nСписок команд";
    }

if ($message == 'Список команд') 
    {
    $preload_text = "Список команд.\nЧтобы посмотреть описание команды, введите ее.\nno ip domain-lookup\nhostname\nenable secret class\nline console 0\npassword cisco\nlogin\nbanner motd @@\nservice password-encryption\nipv6 unicast-routing\nline vty 0 15\ntransport input telnet\ntransport input ssh\ntransport input all\ninterface\ndescription\nip address\nipv6 address\nclock rate\nno shutdown\nusername";
    }

switch($message)
    {
    case 'Начальные настройки коммутатора':
            $preload_text = "no ip domain-lookup\nhostname\nenable secret class\nline console 0\npassword cisco\nlogin\nexit\nbanner motd @@\nservice password-encryption";
            break;
    case 1:
            $preload_text = "no ip domain-lookup\nhostname\nenable secret class\nline console 0\npassword cisco\nlogin\nexit\nbanner motd @@\nservice password-encryption";
            break;
    case 'Начальные настройки маршрутизатора':
            $preload_text = "no ip domain-lookup\nhostname\nenable secret class\nline console 0\npassword cisco\nlogin\nexit\nbanner motd @Unauthorized Access is Prohibited!@\nservice password-encryption\nipv6 unicast-routing";
            break;
    case 2:
             $preload_text = "no ip domain-lookup\nhostname\nenable secret class\nline console 0\npassword cisco\nlogin\nexit\nbanner motd @Unauthorized Access is Prohibited!@\nservice password-encryption\nipv6 unicast-routing";
            break;
    case 'Настройка интерфейсов':
            $preload_text = "\ninterface\ndescription\nip address\nipv6 address\nclock rate\nno shutdown";
            break;
    case 3:
            $preload_text = "\ninterface\ndescription\nip address\nipv6 address\nclock rate\nno shutdown";
            break;
    case 'Удаленный доступ':
            $preload_text = "\nline vty 0 15\ntransport input telnet/ssh/all\npassword cisco\nlogin/login local\nexit";
            break;
    case 4:
            $preload_text = "\nline vty 0 15\ntransport input telnet/ssh/all\npassword cisco\nlogin/login local\nexit";
            break;
    case 'Добавить пользователя':
            $preload_text = "username [указать имя, привилегированность, пароль]";
            break;
    case 5:
            $preload_text = "username [указать имя, привилегированность, пароль]";
            break;
    case 'username':
            $preload_text = "Создать пользователя для подключения по удаленному доступу\nПример: username admin privilege 15 password cisco";
            break;
    case 'no ip domain-lookup':
            $preload_text = "Отключить поиск DNS";
            break;
    case 'hostname':
            $preload_text = 'Задать имя устройству';
            break;
    case 'enable secret class':
            $preload_text = "Назначить привилегированному режиму пароль class. Пароль можно изменить";
            break;
    case 'line console 0':
            $preload_text = "Войти в режим консоли";
            break;
    case 'password cisco':
            $preload_text = "Задать пароль cisco для входа в консоль. Пароль можно изменить";
            break;
    case 'login':
            $preload_text = "При входе в консоль должен спрашиваться логин, если он назначен";
            break;
    case 'banner motd @@':
            $preload_text = "При начальном входе в систему появляется сообщение.\nПример: banner motd @Unauthorized Access is Prohibited!@. При входе в систему будет отображаться Unauthorized Access is Prohibited!.\n Ограничивать сообщение можно любыми символами";
            break;
    case 'service password-encryption':
            $preload_text = "Зашифровать все пароли";
            break;
    case 'ipv6 unicast-routing':
            $preload_text = "Включить ipv6-маршрутизацию";
            break;
    case 'line vty 0 15':
            $preload_text = "Войти в режим линии виртуальных терминалов";
            break;
    case 'transport input telnet':
            $preload_text = "Удаленный доступ по telnet";
            break;
    case 'transport input ssh':
            $preload_text = "Удаленный доступ по ssh";
            break;
    case 'transport input all':
            $preload_text = "Удаленный доступ по telnet и ssh";
            break;
    case 'transport input telnet/ssh/all':
            $preload_text = "Выбор удаленного доступа - по telnet или ssh";
            break;
    case 'interface':
            $preload_text = "Войти в режим интерфейса\nПример: interface f0/1";
            break;
    case 'description':
            $preload_text = "Описание интерфейса\nПример: description LINK_TO_R1";
            break;
    case 'ip address':
            $preload_text = "Задать ip адрес интерфейсу\nПример: ip address 192.168.0.120 255.255.255.0";
            break;
    case 'ipv6 address':
            $preload_text = "Задать ipv6 адрес интерфейсу\nПример: ipv6 address 2001:DB8:ACAD:2::2/64";
            break;
    case 'clock rate':
            $preload_text = "Задать скорость канала\nПример: clock rate 128000";
            break;
    case 'no shutdown':
            $preload_text = "Включение интерфейса. Для выключения интерфейса введите shutdown";
            break;
    }



//---------------------------------------------
sendMessage ($chat_id, $preload_text);
?>

