# Leoch

Leoch is a simple PHP server-side template rendering engine

## Basic Syntax
- Variable

{{var}}

- Conditional Sentences

@if[...]

@elseif[...]

@else

@endif

- Loop

@foreach($array in $var)

I'm a $var

@endforeach

## Rendering

    namespace Leoch\App;

    use Leoch\App\Processor\TemplateProcessor;

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

