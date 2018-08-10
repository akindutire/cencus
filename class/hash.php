<?php
$link=mysqli_connect('localhost','root','','elearning');
$bn="'akindutire@u.com";
echo mysqli_real_escape_string($link,$bn);
?>