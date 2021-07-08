<?php
function create_code(){
    $first = rand(1111,9999);
    $second = substr(uniqid(),0,4);
    $third = rand(1111,9999);
    return $first.'-'.$second.'-'.$third;
}
