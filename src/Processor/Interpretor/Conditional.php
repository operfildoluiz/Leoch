<?php

namespace Leoch\Processor\Interpretor;

class Conditional implements Interpretor {

    private static $accepted = array("@if[","@elseif[","@else","@endif");
    private static $transform = array("<?php if (","<?php elseif (", "<?php else: ?>", "<?php endif; ?>");

    public static function process($content, $args = null) {
        $stmt = str_replace(self::$accepted, self::$transform, $content);

        return $stmt;
    }

}
