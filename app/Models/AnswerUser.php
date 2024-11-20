<?php

namespace App\Models;

class AnswerUser
{
    private $num;
    private $answer;

    // Getter và Setter cho thuộc tính num
    public function getNum()
    {
        return $this->num;
    }

    public function setNum($num)
    {
        $this->num = $num;
    }

    // Getter và Setter cho thuộc tính answer
    public function getAnswer()
    {
        return $this->answer;
    }

    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }
}
