<html class="tagcolor" style="color:mediumblue">>
<body class="tagcolor" style="color:mediumblue">>

<form class="attributecolor" style="color:red"> method="attributevaluecolor" style="color:mediumblue">="post" action="attributevaluecolor" style="color:mediumblue">="="color:black">="phptagcolor" style="color:red"><?php class="phpkeywordcolor" style="color:mediumblue">echo class="phpglobalcolor" style="color:goldenrod">$_SERVER[class="phpstringcolor" style="color:brown">'PHP_SELF'];class="phptagcolor" style="color:red">?>"="tagcolor" style="color:mediumblue">>
  Name: <input class="attributecolor" style="color:red"> type="attributevaluecolor" style="color:mediumblue">="text" name="attributevaluecolor" style="color:mediumblue">="fname"="tagcolor" style="color:mediumblue">>
  <input class="attributecolor" style="color:red"> type="attributevaluecolor" style="color:mediumblue">="submit"="tagcolor" style="color:mediumblue">>
</form class="tagcolor" style="color:mediumblue">>

<?php
class="phpkeywordcolor" style="color:mediumblue">if (class="phpglobalcolor" style="color:goldenrod">$_SERVER[class="phpstringcolor" style="color:brown">"REQUEST_METHOD"] == class="phpstringcolor" style="color:brown">"POST") {
  class="commentcolor" style="color:green">// collect value of input field
class="phpnumbercolor" style="color:red">   $name = class="phpglobalcolor" style="color:goldenrod">$_POST[class="phpstringcolor" style="color:brown">'fname'];
  class="phpkeywordcolor" style="color:mediumblue">if (class="phpkeywordcolor" style="color:mediumblue">empty($name)) {
    class="phpkeywordcolor" style="color:mediumblue">echo class="phpstringcolor" style="color:brown">"Name is empty";
  } class="phpkeywordcolor" style="color:mediumblue">else {
    class="phpkeywordcolor" style="color:mediumblue">echo $name;
class="phpnumbercolor" style="color:red">   }
}
class="phptagcolor" style="color:red">?>

</body class="tagcolor" style="color:mediumblue">>
</html class="tagcolor" style="color:mediumblue">>