<?php

class Validator
{
    private  $errors = [];

    public  function required($input, $inputname)
    {
        if (empty($input)) {
            $error = [$inputname => "the $inputname is required!"];
            array_push($this->errors, $error);
            return false;
        }
        return $this;
    }

    public function max($input, $inputname, $max)
    {
        if (strlen($input) > $max) {
            $error = [$inputname => "the $inputname must be less than $max"];
            array_push($this->errors, $error);
            return false;
        }
        return $this;
    }

    public function min($input, $inputname, $min)
    {
        if (strlen($input) < $min) {
            $error = [$inputname => "the $inputname must be at least $min"];
            array_push($this->errors, $error);
            return false;
        }
        return $this;
    }

    public function emailRule1($input, $inputname)
    {
        if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
            $error = [$inputname => "invalid email"];
            array_push($this->errors, $error);
            return false;
        }
        return $this;
    }

    //regex
    public function emailRule2($input, $inputname)
    {
        $regex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
        if (!preg_match($regex, $input)) {
            $error = [$inputname => "invalid email"];
            array_push($this->errors, $error);
            return false;
        }
        return $this;
    }


    public function url($input, $inputname)
    {
        if (!filter_var($input, FILTER_VALIDATE_URL)) {
            $error = [$inputname => "invalid url"];
            array_push($this->errors, $error);
            return false;
        }
        return $this;
    }

    public function matchInput($input, $inputname, $matchInput)
    {
        if ($input !== $matchInput) {
            $error = [$inputname => "the $inputname must be match"];
            array_push($this->errors, $error);
            return false;
        }
        return $this;
    }

    public function matchPattern($input, $inputname, $regex)
    {
        if (!preg_match($regex, $input)) {
            $error = [$inputname => "the $inputname must be match the pattern!"];
            array_push($this->errors, $error);
            return false;
        }
        return $this;
    }

    public function numeric($input, $inputname)
    {
        if (!is_numeric($input)) {
            $error = [$inputname => "the $inputname must be a number!"];
            array_push($this->errors, $error);
            return false;
        }
        return $this;
    }


    public function negative($input, $inputname)
    {
        if ($input < 0) {
            $error = [$inputname => "the $inputname must be positive number!"];
            array_push($this->errors, $error);
            return false;
        }
        return $this;
    }

    public function alphaNumeric($input, $inputname)
    {
        $regex = "/^[a-zA-Z0-9_]*$/";
        if (!preg_match($regex, $input)) {
            $error = [$inputname => "the $inputname must be contain numbers and chars!"];
            array_push($this->errors, $error);
            return false;
        }
        return $this;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
