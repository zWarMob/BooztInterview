<html>
<head>
    <title>Hello <?php echo 'World!'; ?></title>
</head>
<body>
<?php
function hello($name){
    return "Hello $name";
}
$text = hello("Petyo");

echo $text;

?>
</body>
</html>
