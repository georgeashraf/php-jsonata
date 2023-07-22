<?php
declare (strict_types = 1);
require_once "Token.php";
require_once "TokenType.php";

class Lexer
{
    public int $cursorPosition; // cursor always points to next character
    public ?string $curChar;

    public function __construct(
        public string $src,
    ) {
        $this->cursorPosition = 0;
        $this->readChar();
    }
    public function createToken(TokenType $type, string $literal): Token
    {
        return new Token($type, $literal);
    }

    private function isLetter(string $ch): bool
    {
        return $ch >= "a" && $ch <= "z" || $ch >= "A" && $ch <= "Z" || $ch === "_";
    }

    private function skipWhitespace(): void
    {
        while ($this->curChar === ' ' || $this->curChar === '\t' || $this->curChar === '\n' || $this->curChar === '\r') {
            $this->readChar();
        }
    }

    private function readIdentifier(): string
    {
        $position = $this->cursorPosition - 1;

        while ($this->isLetter($this->curChar)) {
            $this->readChar();
        }

        return substr($this->src, $position, $this->cursorPosition);
    }

    private function readChar(): void
    {

        if ($this->cursorPosition >= strlen($this->src)) {
            $this->curChar = '\0';
        } else {
            $this->curChar = $this->src[$this->cursorPosition];
        }
        $this->cursorPosition += 1;
    }
    public function getNextToken(): Token
    {
        $this->skipWhitespace();
        $token;
        switch ($this->curChar) {
            case '$':
                $token = $this->createToken(TokenType::Root, $this->curChar);
                break;
            case '.':
                $token = $this->createToken(TokenType::Map, $this->curChar);
                break;
            case '\0':
                $token = $this->createToken(TokenType::Eof, 'eof');
                break;
        }
        // TODO: maybe use match
        if ($this->isLetter($this->curChar)) {
            $identifier = $this->readIdentifier();
            return $this->createToken(TokenType::Identifier, $identifier);
        }

        $this->readChar();
        return $token;
    }

}
