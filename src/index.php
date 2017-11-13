<?php

namespace Leoch\App;

include_once("../vendor/autoload.php");

use Leoch\App\Processor\TemplateProcessor;

$template = new TemplateProcessor();
$template->setSrc('example');
$template->fill([
        'somevar' => 'Some Var',
        'level' => 'basic',
        'somenumber' => 10,
        'somearray' => array('Jon', 'Dany')
    ]);
echo $template->render();
