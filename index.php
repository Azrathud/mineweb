<?php

require_once('template.php');

$template = new Template();

$posts="";

# Read posts
$base_dir = "posts/";
$dir_handle = @opendir("$base_dir") or die("Unable to open current directory");
//Loop through the files
$files = array();
while ($file = readdir($dir_handle))
{
    // Skip unnecessary files
    if($file == "." || $file == ".." || $file == "index.php" || substr($file, 0, 1) == ".")
    {
        continue;
    } else
    {
        $files[filemtime("$base_dir$file")] = $file;
    }
}
closedir($dir_handle);

rsort($files);

foreach($files as $file) {
    $last_modified_raw = filemtime("$base_dir$file");
    $last_modified = date("M j, y", $last_modified_raw);
    $content = file_get_contents("$base_dir$file");
    $posts.="<h2>$file - $last_modified </h2> $content";
}

$template->content = <<<EOT
<h1>Updates</h1>
<div class="content">
$posts
</div>
EOT;


$template->output();
