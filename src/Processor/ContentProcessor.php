<?php

namespace Leoch\App\Processor;

use Leoch\App\Processor\Interpretor\Conditional;
use Leoch\App\Processor\Interpretor\Iterator;
use Leoch\App\Processor\Interpretor\Variable;

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
        $content = str_replace(array("\n","\r","\t"), array(""), $content);

        $content = Variable::process($content, $args);
        $content = Conditional::process($content);
        $content = Iterator::process($content);
        $content = str_replace(array("]"), array("): ?>"), $content);

        $this->content = $content;

        return $this;
    }
}
