<?php


readonly class IntegerExpression implements Expression
{
    public function __construct(
        public Token $token,
        public int $value
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