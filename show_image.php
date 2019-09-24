<html>
<style>
.bottom-left {
  position: fixed;
  top: 30;
  right: 30;
}
 
.alert {
  border: 2px white;
  background: white;
  font-weight: bold;
  padding: 1em;
}
 
.myButton {
 
    padding: 30px;
    display:block;
    background-color: gray;
    color: black;
    text-align:center;
    position: absolute;
    top: 30px;
    left: 30px;
 
}
</style>
<body>
<?php
// echo $_GET['image_path'];
echo '<img src="'.$_GET['image_path'].'" height="814" width="800"/>';
?>
 
<!--
 This will create a back button
 <div class="bottom-left alert">
  <button class="myButton" onclick="history.go(-1);">Back </button>
 </div>
-->
 
</body>
</html>
