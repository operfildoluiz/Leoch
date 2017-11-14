[![Sele_o_001.png](https://s17.postimg.org/kjbvqrcm7/Sele_o_001.png)](https://postimg.org/image/ugmwjtk7v/)

Leoch is a simple PHP server-side template rendering engine.

## Basic Syntax

- Variable

    {{$var}}

- Conditional Sentences

    @if[...]

    @elseif[...]

    @else

    @endif

- Iterator

    @foreach($array in $var)

    I'm a $var

    @endforeach

- Loop

    @while[$i < 10]

        $i++

    @endwhile

## Rendering

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

