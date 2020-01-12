<?php

if (empty($_POST['selectFile'])){
    $file = 'file.txt';
}else{
$file = $_POST['selectFile']    ;
}
if (empty($_POST['edit_text'])){

}else
{
    file_put_contents($file, $_POST['edit_text']);
}

if (isset($_POST['add_text']))
{
    file_put_contents($file, $_POST['add_text'], FILE_APPEND);
}


$text = file_get_contents($file);

if (isset($_POST['something']))
{   
    if(empty($_POST['fileName'])){
        
    }else{
    $newFile = fopen ($_POST['fileName'].".txt", "a+t");

    fwrite ($newFile, $_POST['something']);

    fclose($newFile);
    }
}


?>

<div class="blockForm"> 
    <form action="" method="post">
        <div>
        <div>
            <label>Выбор файла</label></div>
            <input type="text" name="selectFile" value="<?php echo htmlspecialchars($file) ?>">
            <div><label for="edit_text">Окно для редактирования текста </label></div>
            <textarea name="edit_text"><?php echo htmlspecialchars($text) ?></textarea>
        </div>
        <div>
            <div><label>Окно для добавленя текста</label></div>
            <textarea name="add_text"></textarea>
        </div>
        <div>
            <div><label>Название для создаваемого файла</label></div>
            <input type="text" name="fileName">
            <div><label>Содержимое создаваемого файла</label></div>
            <textarea name="something"></textarea>
        </div>
        <input type="submit">
        <input type="reset">
    </form>
</div>

<h1>Страница сайта</h1>

<div class="siteContent">
    <?php echo file_get_contents($file)?>
</div>
