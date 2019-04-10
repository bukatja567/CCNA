<?php
include 'Auth_ID.php';

function Auth($user_id)
    {
    foreach (ROOT as $i) //ROOT - группа пользователей, прописывается в Auth_ID.php
        if ($user_id == $i) return "root";
    return "student";
    }
?>