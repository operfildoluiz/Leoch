<?php

namespace Leoch\App;
include_once("../vendor/autoload.php");

// Import Leoch in your project
use Leoch\App\Template;

// Create a new template. Set in Template() the main directory to find the files
$template = new Template('templates');
// Sets which prefix the file has -> e.g: templates/index.leoch.php
$template->setSrc('index')
         // Set the variables
         ->fill([
                'name' => 'Leoch',
                'slogan' => 'Simple server-side template rendering',
                'features' => array('Variables','Conditionals','Iterators','Loops'),
                'license' => 'MIT',
                'under_development' => true
            ])
         // Render on the screen
         ->render();

