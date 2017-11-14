<?php

namespace Leoch\App;

include_once("../vendor/autoload.php");

use Leoch\App\Template;

$template = new Template();
$template->setSrc('example')
         ->fill([
                'somevar' => 'Some Var',
                'level' => 'basic',
                'somenumber' => 2,
                'somearray' => array('Red', 'Blue'),
                'somearray2' => array('Vermelho', 'Azul'),
            ])
         ->render();
