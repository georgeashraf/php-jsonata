<?php

enum TokenType {
    case Eof; // \0
    case Identifier;
    case Map; // .
    case Plus; // +
    case Minus; // -
    case Root; // $
    case LBracket; // [
    case RBracket; // ]
    case LBrace; // {
    case RBrace; // }
    case LParen; // (
    case RParen; // )
    case Colon; // :
    case Concat; // &
    case String; // "..."
    case Number; // 1...99
    case Assign; // :=
    case LogicalOR; // or
    case LogicalAnd; //and

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
