<?php
declare(strict_types = 1);


class BinaryExpression implements Expression
{

    public function __construct(
        public Token $token,
        public Expression $left,
        public Expression $right
    ) {
    }

    public function tokenLiteral(): string
    {
        return $this->token->literal;
    }

    public function __toString(): string
    {
        $operator = match ($this->token->type) {
            TokenType::Map => ".",
            TokenType::Plus => "+",
            TokenType::Minus => "-",
            default => "<unknown>",
        };

        return "(" . $this->left . " " . $operator . " " . $this->right . ")";
    }
}