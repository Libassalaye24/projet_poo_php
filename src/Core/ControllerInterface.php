<?php
namespace App\Core;
interface ControllerInterface
{
    public function render(string $file,array $data=[],array $data2=[],array $data3=[],array $data4=[],array $data5=[]):void;
    public function redirect(string $url):void;
}