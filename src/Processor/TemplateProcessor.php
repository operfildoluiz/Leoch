<?php

namespace Leoch\App\Processor;

class TemplateProcessor {

    private $source;
    private $content;
    private $args = array();

    public function setSrc($src) {
        $content = file_get_contents('../templates/' . $src . '.leoch');
        $this->content = $content;
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
    }

    public function render() {
        $processor = new ContentProcessor();
        $processor->setContent($this->content, $this->args);
        return eval('?>' . $processor->getContent() . '<?php ');
    }


}
