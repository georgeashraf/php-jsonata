<?php

enum TokenType: string {
    case Eof = 'Eof'; // \0
    case Identifier = 'Identifier';
    case Map = 'Map'; // .
    case Plus = 'Plus'; // +
    case Minus = 'Minus'; // -
    case Multiply = 'Multiply'; // *
    case Divide = 'Divide'; // /
    case Root = 'Root'; // $
    case LBracket = 'LBracket'; // [
    case RBracket = 'RBracket'; // ]
    case LBrace = 'LBrace'; // {
    case RBrace = 'RBrace'; // }
    case LParen = 'LParen'; // (
    case RParen = 'RParen'; // )
    case Colon = 'Colon'; // :
    case Concat = 'Concat'; // &
    case String = 'String'; // "..."
    case Number = 'Number'; // 1...99
    case Assign = 'Assign'; // :=
    case LogicalOR = 'LogicalOR'; // or
    case LogicalAnd = 'LogicalAnd'; //and

}

enum Precedence: int {
    case Lowest = 1;
    case Assignment = 10;
    case Condition = 20;
    case LogicalOR = 30;
    case LogicalAnd = 40;
    case LessGreater = 50;
    case MinusSumConcat = 60;
    case ProductDivisionMod = 70;
    case OpenBrace = 80;
    case Map = 90;
    case OpenBracketParen = 100;
}

const OperatorPrecedence = [
    "RBracket" => 1,
    "RBrace" => 1,
    "RParen" => 1,
    "LogicalOR" => 30,
    "LogicalAnd" => 40,
    "Plus" => 60,
    "Minus" => 60,
    "Multiply" => 70,
    "Divide" => 70,
    "LBrace" => 80,
    "Map" => 90,
    "LBracket" => 100,
    "LParen" => 100,
];
// enum OperatorPrecedence: int {
//     case RBracket = 1;
//     case RBrace = 1;
//     case RParen = 1;
// // ',': 0,
// // '!': 0,   // not an operator, but needed as a stop character for name tokens
// // '~': 0   // not an operator, but needed as a stop character for name tokens
//     case Assign = 10;
// // '?': 20,
// // '|': 20,
// // '..': 20,
//     case LogicalOR = 30;
//     case LogicalAnd = 40;

// // '=': 40,
// // '<': 40,
// // '>': 40,
// // '^': 40,
// // '!=': 40,
// // '<=': 40,
// // '>=': 40,
// // '~>': 40,
// // 'in': 40,

// // '+': 50,
// // '-': 50,
// // '&': 50,

// // '*': 60,
// // '/': 60,
// // '%': 60,
// // '**': 60,

//     case LBrace = 80;
//     case Map = 90;
//     case LBracket = 100;
//     case LParen = 100;
//     // '@': 80,
//     // '#': 80,
//     // ';': 80,
//     // ':': 80,
// }
