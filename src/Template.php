<?php

namespace Leoch;

use Leoch\Processor\ContentProcessor;

class Template {

    private $source;
    private $content;
    private $templateDirectory;
    private $args = array();

    public function __construct($src = null) {
        if ($src == null)
            $this->setTemplateDirectory('../templates');
        else
            $this->setTemplateDirectory($src);

    }

    public function setTemplateDirectory($templateDirectory) {
        $this->templateDirectory = $templateDirectory;

        return $this;
    }

    public function setSrc($src) {
        $content = file_get_contents($this->templateDirectory . '/' . $src . '.leoch.php');
        $this->content = $content;

        return $this;
    }

    public function fill($ins) {
        $vars = "";
        foreach ($ins as $origin => $result) {
            $current[0] = $origin;
            $current[1] = $result;
            $this->args[] = $current;

            if(!is_array($result)){
                $vars .= "\$$origin = \"$result\"; ";
            }
            else {
                $vars .= "\$$origin = array(";
                foreach ($result as $key => $value) {
                    $vars .= "'$key' => '$value',";
                }
                $vars .= ");";
            }

        }
        $this->content = "<?php $vars ?>\n" . $this->content;

        return $this;
    }

    public function render($preventRendering = false) {
        $processor = new ContentProcessor();
        $processor->setContent($this->content, $this->args);
        return eval('?>' . $processor->getContent() . '<?php ');
    }


}
