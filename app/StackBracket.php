<?php

namespace App;

use SplStack;

class StackBracket implements Bracket
{
    protected SplStack $stack;

    public function __construct()
    {
        $this->stack = new SplStack();
    }

    public function checkBracket($expression)
    {
        $tempArr = str_split($expression, 1);
        foreach ($tempArr as $sym) {
            if ($sym === Bracket::LEFT_BRACKET) {
                $this->stack->unshift($sym);
            } elseif ($sym === Bracket::RIGHT_BRACKET) {
                $left = $this->stack->shift();
                if ($this->isEmpty()) {
                    return false;
                }
                return true;
            }
        }
    }

    public function isEmpty(): bool
    {
        return $this->stack->isEmpty();
    }

    public function checkBracketAll($data)
    {
        $len = strlen($data);
        for ($i = 0; $i < $len; $i++) {
            switch ($data[$i]) {
                case Bracket::LEFT_BRACKET:
                    $this->stack->push(0);
                    break;
                case Bracket::RIGHT_BRACKET:
                    if ($this->stack->pop() !== 0) {
                        return false;
                    }
                    break;
                case Bracket::LEFT__BRACKET:
                    $this->stack->push(1);
                    break;
                case Bracket::RIGHT__BRACKET:
                    if ($this->stack->pop() !== 1) {
                        return false;
                    }
                    break;
                case Bracket::LEFT___BRACKET:
                    $this->stack->push(2);
                    break;
                case Bracket::RIGHT___BRACKET:
                    if ($this->stack->pop() !== 2) {
                        return false;
                    }
                    break;
                default: break;
            }
        }
        return $this->isEmpty();
    }
}