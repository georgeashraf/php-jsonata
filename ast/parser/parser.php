<?php
declare (strict_types = 1);

// A recursive descent parser based on the Pratt Parsing algorithm
// https://web.archive.org/web/20151223215421/http://hall.org.ua/halls/wizzard/pdf/Vaughan.Pratt.TDOP.pdf
class Parser
{
    private array $tokens;
    private int $index;
    private static $NULL_DENOTATIONS = [];
    private static $LEFT_DENOTATIONS = [];
    public function __construct(array $tokens)
    {
        echo"-----------";
        var_dump(Precedence::Lowest->value) ;
        self::$NULL_DENOTATIONS = [
            "Identifier" => fn() => $this->parse_identifier(),
            "String" => fn() => $this->parse_string(),
            "Number" => fn() => $this->parse_number(),
        ];
        self::$LEFT_DENOTATIONS = [
            "Map" => fn() => $this->parse_infix(),
        ];
        $this->tokens = $tokens;
        $this->index = 0;
        $this->parse_expression();
       
    }
    private function current_token()
    {
        return $this->tokens[$this->index];
    }
    private function peek_next_token()
    {
        return $this->tokens[$this->index + 1];
    }
    private function advance_token()
    {
        $this->index += 1;
    }
    // TODO: implement parsing scheme
    private function parse_expression(int $precedence = Precedence::Lowest->value)
    {
        $token = $this->current_token();

    }
    private function parse_identifier()
    {

    }
    private function parse_string()
    {

    }
    private function parse_number()
    {
        $token = $this->current_token();
        $this->advance_token();
        return new IntegerExpression($token, $token->literal);
    }
    private function parse_infix($left)
    {
        $token = $this->current_token();
        $operator = $token->type;
        $this->advance_token();
        $right = $this->parse_expression(OperatorPrecedence[$operator]);
        return new BinaryExpression($token, $left, $right);
    }
}
