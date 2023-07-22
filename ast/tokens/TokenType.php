<?php

enum TokenType {
    case Eof;
    case Sof;
    case Identifier;
    case Integer;
    case Map;
    case Plus;
    case Minus;
    case Root;
    case LBrace;
    case RBrace;
    case LParen;
    case RParen;
    case Colon;
    case String;
}
