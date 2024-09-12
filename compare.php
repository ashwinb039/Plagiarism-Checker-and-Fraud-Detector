<?php
function getFileContent($file) {
    return file_get_contents($file);
}

function compareFiles($file1Content, $file2Content) {
    $file1Tokens = array_count_values(str_word_count($file1Content, 1));
    $file2Tokens = array_count_values(str_word_count($file2Content, 1));

    $intersection = array_intersect_assoc($file1Tokens, $file2Tokens);
    $union = array_unique(array_merge(array_keys($file1Tokens), array_keys($file2Tokens)));
    
    $similarity = 0;
    foreach ($intersection as $word => $count) {
        $similarity += min($count, $file2Tokens[$word]);
    }
    return ($similarity / count($union)) * 100;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file1']) && isset($_FILES['file2'])) {
    $file1 = $_FILES['file1']['tmp_name'];
    $file2 = $_FILES['file2']['tmp_name'];

    $file1Content = getFileContent($file1);
    $file2Content = getFileContent($file2);

    $similarity = compareFiles($file1Content, $file2Content);

    echo "<h1>Comparison Result</h1>";
    echo "<p>Similarity: " . round($similarity, 2) . "%</p>";
} else {
    echo "<p>No files uploaded or invalid request.</p>";
}
?>
