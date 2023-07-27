<?php
declare (strict_types = 1);
require_once "enums.php";

class Token
{

    public function __construct(
        public TokenType $type,
        public ?string $literal = null
    ) {
    }
}
