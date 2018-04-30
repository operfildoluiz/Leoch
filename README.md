[![Sele_o_001.png](https://s17.postimg.cc/kjbvqrcm7/Sele_o_001.png)](https://postimg.org/image/ugmwjtk7v/)

Leoch is a simple PHP server-side template rendering engine.

## Demo

See `demo/index.php` for server-side reference and `demo/templates/index.leoch.php` for Leoch syntax reference.

## Basic Syntax

Variables

    {{$var}}

Conditional Sentences

    @if[...]

    @elseif[...]

    @else

    @endif

Iterators

    @foreach($array in $var)

    I'm a $var

    @endforeach

Loops

    @while[$i < 10]

    $i++

    @endwhile

Inside code blocks, there's no need to declare the variable under brackets.

## Rendering

    use Leoch\App\Processor\TemplateProcessor;

    $template = new Template('demo');
    $template->setSrc('example')
             ->fill([
                    'somevar' => 'Some Var',
                    'level' => 'basic',
                    'somenumber' => 2,
                    'somearray' => array('Red', 'Blue'),
                    'somearray2' => array('Vermelho', 'Azul'),
                ])
             ->render();

