<?php

namespace Leoch\App\Processor;

class ContentProcessor {

    private $content;

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     *
     * @return self
     */
    public function setContent($content, $args)
    {
        # Variable Treatments
        $vars = str_replace(array("{{\$","}}"), array("@@",""), $content);
        foreach ($args as $arg) {
            $vars = str_replace("@@".$arg[0], $arg[1], $vars);
        }
        $content = $vars;

        # Conditional Treatments
        $content = str_replace(array("@if[","@elseif[","]","@else","@endif"), array("<?php if (","<?php elseif (","): ?>", "<?php else: ?>", "<?php endif; ?>"), $content);
        /*$content = str_replace(array("@foreach[","]","@endforeach"), array("<?php foreach (","): ?>", "<?php endforeach; ?>"), $content);*/

        // echo '<pre>'; print_r($content); die();
        $this->content = $content;

        return $this;
    }
}
