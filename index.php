<?php

function addDelimiters(&$in) {
    $in = '/' . trim($in) . '/';
}

if (isset($_POST['find'], $_POST['replace'], $_POST['text']) === true) {
    if (empty($_POST['find']) == false) {
        $find = explode(',', $_POST['find']);
        array_walk($find, 'addDelimiters');
    }
    $replace = empty($_POST['replace']) === false ? preg_split('/,\s+/', $_POST['replace']) : '';

    $text = (empty($find) === false && empty($replace) === false) ? preg_replace($find, $replace, $_POST['text']) : $_POST['text'];
}
?>

<form method="POST" action="">
    <input type="text" name="find" placeholder="Words to find">
    <input type="text" name="replace" placeholder="Replacement text here">
    <p><textarea name="text" rows="8" cols="40"><?php echo (empty($text) === false) ? $text : ''; ?></textarea></p>
    <input type="submit">
</form>