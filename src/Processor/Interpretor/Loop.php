<?php

namespace Leoch\Processor\Interpretor;

class Loop implements Interpretor {

    private static $accepted = array("@while[","@endwhile");
    private static $transform = array("<?php while (", "<?php endwhile; ?>");
    private static $vars = array();

    public static function process($content, $args = null) {
        preg_match_all('/(\@while\[(.*?)])(.*?)(?=\@endwhile)/i', $content, $matches);
        foreach ($matches[3] as $match) {
            preg_match_all('/\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff\+\-]*)/i', $match, $item);
            $block = Variable::processIterate($item[0][0]);
            $new_match = str_replace($item[0][0], $block, $match);
            $content = str_replace($match, $new_match, $content);
        }

        $stmt = str_replace(self::$accepted, self::$transform, $content);

        return $stmt;
    }

}
