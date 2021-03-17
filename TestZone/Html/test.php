<?php

var_dump($_POST);

echo '
    <form id="modifyForm" action="test.php" method="post">
    <input type="text" name="test[id]" value="">
    <input type="text" name="test[id2]" value="">
    <input type="text" name="tronc[id]" value="">
    </form>
    <input id="modifyButton" type="submit" form="modifyForm" value="Modifier">
';
