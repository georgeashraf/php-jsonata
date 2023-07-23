<?php
declare (strict_types = 1);

class Parser
{
    private string $src;
    private array $data;
    private Token $currentToken;
    private Lexer $lexer;
    public function __construct(string $src, array $data, Lexer $lexer)
    {
        $this->src = $src;
        $this->date = $date;
        $this->lexer = $lexer;
    }
    
}
