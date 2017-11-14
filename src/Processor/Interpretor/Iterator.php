<?php

namespace Leoch\App\Processor\Interpretor;

class Iterator implements Interpretor {

    private static $accepted = array("@foreach[","@endforeach");
    private static $transform = array("<?php foreach (", "<?php endforeach; ?>");
    private static $vars = array();

    public static function process($content, $args = null) {
        preg_match_all('/(\@foreach\[\$\w+ as \$\w+\])(.*?)(?=\@endforeach)/i', $content, $matches);
        foreach ($matches[2] as $match) {
            preg_match_all('/\$\w+/i', $match, $item);
            $block = Variable::processIterate($item[0][0]);
            $new_match = str_replace($item[0][0], $block, $match);
            $content = str_replace($match, $new_match, $content);
        }

        $stmt = str_replace(self::$accepted, self::$transform, $content);

        return $stmt;
    }

    public static function appendVar($var) {
        self::$vars[] = $var;
    }

}
