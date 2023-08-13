<?php

function runtimes($minutes): string
{
    $hours = floor($minutes / 60);
    $minutes = $minutes % 60;

    return "{$hours}h {$minutes}m";
}
