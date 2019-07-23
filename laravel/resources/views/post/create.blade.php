<?php
/**
 * Created by PhpStorm.
 * User: 12538
 * Date: 2019-7-19
 * Time: 20:47
 */
print_r($errors);
?>
<html lang="ky">
<body>
<a1>hello</a1>

<form method="post" action="/post">
    @csrf
    <input name="title" placeholder="title"/>
    <input name="body" placeholder="body">
    <button type="submit"></button>
</form>
</body>
</html>
