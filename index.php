<?php

use App\App;

require_once __DIR__ . '/vendor/autoload.php';

$app = new App();

// Handle form submission (basic)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'], $_POST['body'])) {
    $newTitle = trim($_POST['title']);
    $body = trim($_POST['body']);
    
    if (!empty($_POST['original_title'])) {
        if ($_POST['original_title'] === $newTitle) {
            // Update the existing article
            $app->update($newTitle, $body);
        } else {
            // Rename the existing article (if needed) and update
            if (in_array($_POST['original_title'], $app->getListOfArticles())) {
                rename("articles/" . $_POST['original_title'], "articles/" . $newTitle);
                $app->update($newTitle, $body);
            }
        }
    } elseif (!empty($newTitle) && !empty($body)) {
        // Create a new article only if it doesn't exist already
        if (!in_array($newTitle, $app->getListOfArticles())) {
            $app->save($newTitle, $body);
        }
    }
    // Reload the page to reset form fields
    header("Location: index.php");
    exit;
}

echo "<head>
<link rel='stylesheet' href='http://design.wikimedia.org/style-guide/css/build/wmui-style-guide.min.css'>
<link rel='stylesheet' href='styles.css?v=<?php echo time(); ?>'>
<script src='main.js'></script>
</head>";

$title = '';
$body = '';

if (isset($_GET['title'])) {
    $title = htmlentities($_GET['title']);
    $body = $app->fetch(['title' => $title]);
}

$wordCount = wfGetWc();

echo "<body>
<div id='header' class='header'>
<a href='/'>Article Editor</a>
<div>$wordCount</div>
</div>
<div class='page'>
<div class='main'>
<h2>Create/Edit Article</h2>
<p>Fill out the fields below to create a new article or update an existing one.</p>
<form action='index.php' method='post'>
<input name='original_title' type='hidden' value='$title'>
<input name='title' type='text' placeholder='Article title...' value='" . ($title ? $title : '') . "' required>
<br />
<textarea name='body' placeholder='Article body...' required>" . ($title ? $body : '') . "</textarea>
<br />
<button class='submit-button' type='submit'>Submit</button>
</form>
<h2>Preview</h2>
<h3>$title</h3>
<p>$body</p>
<h2>Articles</h2>
<ul>";

foreach ($app->getListOfArticles() as $article) {
    echo "<li><a href='index.php?title=" . urlencode($article) . "'>$article</a></li>";
}

echo "</ul>
</div>
</div>
</body>";

function wfGetWc() {
    $dirPath = 'articles/';
    $wc = 0;
    if (!is_dir($dirPath)) {
        return "0 words written";
    }
    foreach (scandir($dirPath) as $file) {
        if ($file !== '.' && $file !== '..') {
            $content = file_get_contents($dirPath . $file);
            $wc += str_word_count($content);
        }
    }
    return "$wc words written";
}
