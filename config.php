<?php 
define('BASE_URL', 'http://localhost/packfora/packfora_admin/');
function shorten_text($text, $word_limit = 25) {
    $words = explode(' ', strip_tags($text));
    if (count($words) > $word_limit) {
        return implode(' ', array_slice($words, 0, $word_limit)) . '...';
    }
    return $text;
}