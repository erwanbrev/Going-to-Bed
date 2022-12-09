<?php

class StringUtils
{

    public static function secondCase($string)
    {

        if (strlen($string) >= 2) {
            $string = strtolower($string);
            $string[1] = strtoupper($string[1]);
            return $string;
        }
    }
}

class Pajamas
{
    private $owner, $fit, $color;

    function __construct(
        $owner = "none",
        $fit = "fine",
        $color = "white"
    )
    {
        $this->owner = StringUtils::secondCase($owner);
        $this->fit = $fit;
        $this->color = $color;
    }

    public function setFit($new_fit)
    {
        $this->fit = $new_fit;
    }

    public function describe()
    {
        return "$this->owner's $this->color fit $this->fit.";
    }
}

class ButtonablePajamas extends Pajamas
{
    private $button_state = "unbuttoned";

    public function describe()
    {
        return parent::describe() . " They also have buttons which are currently $this->button_state.";
    }

    public function toggleButtons()
    {
        if ($this->button_state === "unbuttoned") {
            $this->button_state = "buttoned";
        } else {
            $this->button_state = "unbuttoned";
        }
    }
}

$chicken_PJs = new Pajamas("Chicken", "slim", "yellow");
echo $chicken_PJs->describe() . "\n";

$chicken_PJs->setFit("skinny");

echo $chicken_PJs->describe() . "\n";

$moose_PJs = new ButtonablePajamas("Moose", "fine", "green");
echo $moose_PJs->describe() . "\n";

echo $moose_PJs->toggleButtons() . "\n";

echo $moose_PJs->describe() . "\n";