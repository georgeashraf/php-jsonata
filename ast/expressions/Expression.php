<?php
declare(strict_types = 1);


interface Expression extends Stringable
{
    public function tokenLiteral(): string;
    public function __toString(): string;
}