<?php
namespace App\Core;
interface ControllerInterface
{
    public function render(string $file,array $data=[],array $data2=[],array $data3=[]):void;
    public function redirect(string $url):void;
}