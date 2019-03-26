<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function get_image_url($html)
{
     preg_match('/(?<!_)src=([\'"])?(.*?)\\1/', $html, $matches);
     if($matches && !empty($matches) && isset($matches[2]))
     {
         return $matches[2];
     }
     else
     {
         return false;
     }
     
}

function replace_image($content) 
{
    $content = preg_replace("/<img[^>]+\>/i", " ", $content); 
    echo $content;
}