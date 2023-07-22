<?php
declare (strict_types = 1);

class Token
{

    public function __construct(
        public TokenType $type,
        public ?string $literal = null
    ) {
    }
}
