<?php
declare (strict_types = 1);
require_once __DIR__ . "/../tokens/Token.php";
require_once "Expression.php";

class NumberExpression implements Expression
{
    public function __construct(
        public Token $token,
        public string $value
    ) {
    }

    public function tokenLiteral(): string
    {
        return $this->token->literal;
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }
}
