<?php

namespace Leoch\App\Processor\Interpretor;

class Variable implements Interpretor {

    private static $accepted = array("{{\$","}}");
    private static $transform = array("@@","");
    #
    private static $iterative = array("\$");
    private static $transform_i = array("<?php echo \$");

    public static function process($content, $args = null) {
        $vars = str_replace(self::$accepted, self::$transform, $content);

        if ($args) {
            foreach ($args as $arg) {
                $vars = @str_replace("@@".$arg[0], $arg[1], $vars);
            }
        }
        return $vars;
    }

    public static function processIterate($content) {
        return "<?php echo " .$content . "; ?>";
    }

}
