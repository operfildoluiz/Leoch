# leoch
Leoch is a PHP server-side template rendering engine

## Basic Syntax
- Variable
{{var}}

- Conditional Sentences
@if[...]
@elseif[...]
@else
@endif

## Rendering

    namespace Leoch\App;

    use Leoch\App\Processor\TemplateProcessor;

    $template = new TemplateProcessor();
    // should be at templates/example.leoch
    $template->setSrc('example');
    $template->fill([
            'somevar' => 'Some Var',
            'level' => 'basic',
            'somenumber' => 1
        ]);
    echo $template->render();
