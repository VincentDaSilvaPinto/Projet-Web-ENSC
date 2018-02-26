<?php
/**
 * Created by PhpStorm.
 * User: pierr
 * Date: 25/02/2018
 * Time: 17:00
 */

function formProtection($text)
{
    return utf8_encode(htmlspecialchars($text));
}
?>