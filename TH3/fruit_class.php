<!DOCTYPE HTML>  
<html>

<body>  

<?php
class Fruit {
  public $name;
  public $color;


  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
function __construct($name) {
	$this->name = $name;
  }

function __destruct() {
    echo "The fruit is {$this->name}.";
  }
}

$apple = new Fruit(name: "Apple");
$banana = new Fruit(name: "Banana");



echo $apple->get_name();
echo "<br>";
echo $banana->get_name();
?>


</body>
</html>

