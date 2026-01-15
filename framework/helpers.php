<?php
function view($path, $data = [])
{
    extract($data);
    include __DIR__ . "/../app/Views/{$path}.php";
}
