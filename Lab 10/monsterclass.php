<?php
class Monster { // start the Monster class
    private $num_of_eyes; // properties
    private $colour; // Private properties can only be used by the class in which the property or method was defined
    function __construct($num, $col) { // constructor allows you to initialize an object's properties upon creation of the object. PHP will automatically call this function when you create an object from a class
        $this->num_of_eyes = $num; // initialise number of eyes - $this refers to the current object and is only available inside methods
        $this->colour = $col; // initialise colour - -> is an object operator used in object scope to access methods and properties of an object
    }
    function describe () {
        $ans = "The " . $this->colour . " monster has " . $this->num_of_eyes . " eyes."; 
        return $ans;
    }
}
?>