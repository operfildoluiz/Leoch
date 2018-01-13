<?php

namespace Leoch\Processor;

use Leoch\Processor\Interpretor as I;

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

        $content = I\Variable::process($content, $args);
        $content = I\Conditional::process($content);
        $content = I\Iterator::process($content);
        $content = I\Loop::process($content);
        $content = str_replace(array("]"), array("): ?>"), $content);

        $this->content = $content;

        return $this;
    }
}
