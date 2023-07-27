<?php
declare (strict_types = 1);

require_once "ast/tokens/Token.php";
require_once "ast/tokens/Lexer.php";
require_once "ast/tokens/enums.php";
require_once "ast/parser/parser.php";
require_once "utils.php";

class Pjson
{
    public array $result;
    public array $data;
    public string $expr;
    /**
     * this constructor initialize expr and
     * iniitalize empty result array
     *
     * @param $expr
     * @throws Exceptions
     */
    public function __construct($expr, $data)
    {
        if (!is_string($expr)) {
            throw new ErrorException('unknown schema format');
        }
        if (json_decode($data, true) === null) {
            throw new ErrorException('unknown data object format');
        }
        $this->data = json_decode($data, true);
        $this->expr = $expr;
        $this->result = [];
    }

    public function evaluate()
    {
        return json_encode($this->result);
    }
}
// $e = "$";
// $d = '{"key": "val"}';
// $x = new Pjson($e, $d);
$data = getDataSet('dataset1.json');
// var_dump($data);

// $resolved = resolveData($data, "FirstName");
// var_dump($resolved);

$lexer = new Lexer('10 + 2*3 ');
var_dump($lexer->getTokens());
$parser = new Parser($lexer->getTokens());
// var_dump($parser->AST);
