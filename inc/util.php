<?php

function e($html)
{
    return htmlspecialchars($html, ENT_QUOTES, 'UTF-8', true);
}

$content = "Hallo Welt\n\n\n\nHallo Mars";

//echo nl2br(e($content));

$paragraphs = explode("\n", $content);

// echo '<p>' . implode('</p><p>', $paragraphs) . '</p>';

$filteredParagraphs = [];
foreach ($paragraphs AS $paragraph){
    if(strlen($paragraph) > 0){
        $filteredParagraphs[] = $paragraph;
    }
}

var_dump($filteredParagraphs);
?>

<?php foreach ($filteredParagraphs as $p): ?>
    <p><?php echo e($p) ?></p>
<?php endforeach;  ?>
