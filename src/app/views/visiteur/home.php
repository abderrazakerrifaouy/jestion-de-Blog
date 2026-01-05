<?php
if (count($posts) === 0) {
    echo "<p>Aucun article disponible.</p>";
} else {
foreach ($posts as $post) {
    echo "<h2>" . htmlspecialchars($post['title']) . "</h2>";
    echo "<p>" . htmlspecialchars($post['content']) . "</p>";
    echo "<hr>";
}
}