<?php
declare (strict_types = 1);
require_once __DIR__ . "/../expressions/NumberExpr.php";
require_once __DIR__ . "/../expressions/BinaryExpr.php";
require_once __DIR__ . "/../expressions/Expression.php";


// A recursive descent parser based on the Pratt Parsing algorithm
// https://web.archive.org/web/20151223215421/http://hall.org.ua/halls/wizzard/pdf/Vaughan.Pratt.TDOP.pdf
class Parser
{
    private array $tokens;
    private int $index;
    public Expression $AST;
    private static $NULL_DENOTATIONS = [];
    private static $LEFT_DENOTATIONS = [];
    public function __construct(array $tokens)
    {
        self::$NULL_DENOTATIONS = [ // nothing on the left
            "Identifier" => fn() => $this->parse_identifier(),
            "String" => fn() => $this->parse_string(),
            "Number" => fn() => $this->parse_number(),
        ];
        self::$LEFT_DENOTATIONS = [
            "Map" => fn($x) => $this->parse_infix($x),
            "Plus" => fn($x) => $this->parse_infix($x),
            "Multiply" => fn($x) => $this->parse_infix($x),
            "Divide" => fn($x) => $this->parse_infix($x),
        ];
        $this->tokens = $tokens;
        $this->index = 0;
        $this->AST = $this->parse_expression();

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
    private function parse_expression(int $precedence = Precedence::Lowest->value)
    {
        $token = $this->current_token();
        $left = call_user_func(self::$NULL_DENOTATIONS[$token->type->value]);
        while ($this->current_token()->type->value !== 'Eof' && $precedence < OperatorPrecedence[$this->current_token()->type->value]) {
            $left = call_user_func(self::$LEFT_DENOTATIONS[$this->current_token()->type->value], $left);
        }
        return $left;

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
        return new NumberExpression($token, $token->literal);
    }
    private function parse_infix($left)
    {
        $token = $this->current_token();
        $operator = $token->type->value;
        $this->advance_token();
        $right = $this->parse_expression(OperatorPrecedence[$operator]);
        return new BinaryExpression($token, $left, $right);
    }
}

// object(BinaryExpression)42 (3) {
//     ["token"]=>
//     object(Token)25 (2) { 
//       ["type"]=>
//       enum(TokenType::Plus)
//       ["literal"]=>        
//       string(1) "+"        
//     }
//     ["left"]=>
//     object(NumberExpression)38 (2) {
//       ["token"]=>
//       object(Token)24 (2) {
//         ["type"]=>
//         enum(TokenType::Number)
//         ["literal"]=>
//         string(3) "10 "
//       }
//       ["value"]=>
//       string(3) "10 "
//     }
//     ["right"]=>
//     object(BinaryExpression)41 (3) {
//       ["token"]=>
//       object(Token)27 (2) {
//         ["type"]=>
//         enum(TokenType::Multiply)
//         ["literal"]=>
//         string(1) "*"
//       }
//       ["left"]=>
//       object(NumberExpression)39 (2) {
//         ["token"]=>
//         object(Token)26 (2) {
//           ["type"]=>
//           enum(TokenType::Number)
//           ["literal"]=>
//           string(4) "2*3 "
//         }
//         ["value"]=>
//         string(4) "2*3 "
//       }
//       ["right"]=>
//       object(NumberExpression)40 (2) {
//         ["token"]=>
//         object(Token)28 (2) {
//           ["type"]=>
//           enum(TokenType::Number)
//           ["literal"]=>
//           string(2) "3 "
//         }
//         ["value"]=>
//         string(2) "3 "
//       }
//     }
//   }