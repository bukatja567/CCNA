<?php
//Текстовые ответы - должны будут уйти в базу данных в будущем
const TBHELP_ROOT = "Привет. Ваша роль ROOT. Вам доступны следующие команды:
/proxy - для получения прокси для телеграма 
/ping [ip] - Проверка доступности ресурса
/mask [mask/prefix] - перевод маски в префикс и обратно

/logs    - Лог входящих сообщений
";
const TBHELP = "Привет. Ваша роль STUDENT. Вам доступны следующие команды:
/mask [mask/prefix] - перевод маски в префикс и обратно
/ping [ip] - Проверка доступности ресурса

";
const TBSTART = "Привет. Я умный бот. \nО том, что я умею можно узнать по команде /help";
const TBPROXY = "Для подключения прокси кликни по ссылке:\nhttps://t.me/proxy?server=142.93.134.100&port=3434&secret=1d3a72af7b07e06c0db56fcfa4a75f5c";
const TBLOGS = "Файл логов здесь:\n142.93.134.100/telebots/KBCCNA/logs/logs\n П.с. Удобно читать в Visual Studio Code или браузере, так будут переносы строки в отличии от блокнота :)";
?>
