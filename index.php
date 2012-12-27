<?php

require_once('template.php');
require_once('sidebar.php');

require_once('create_file.php');

$sidebar = new Sidebar($server_status=true);

$template = new Template($sidebar);

$posts="";

# Read posts
$base_dir = "/home1/onetwoko/public_html/minecraft/raw_posts/";
$dir_handle = @opendir("$base_dir") or die("Unable to open $base_dir directory");
//Loop through the files
$files = array();
while ($file = readdir($dir_handle)) {
    // Skip unnecessary files
    if($file == "." || $file == ".." || $file == "index.php" || substr($file, 0, 1) == ".")
    {
        continue;
    } else
    {
        # Sort files based on last modified
        $files[filemtime("$base_dir$file")] = $file;
    }
}
closedir($dir_handle);

# Newest files first
krsort($files);


# For generating individual post pages
$post_array = array();

# Output file name as header, last modified and then the contents
foreach($files as $file) {
    $last_modified_raw = filemtime("$base_dir$file");
    $last_modified = date("M j,'y", $last_modified_raw);
    $content = file_get_contents("$base_dir$file");
    $post_name = str_replace("-", " ", $file);

    $separate_post = "<div class=\"post\"><h2>$post_name - $last_modified </h2> $content</div>";

    $imagined_post_file =  "posts/" . $file . ".php"; # Each post should have its own link
    if(! file_exists($imagined_post_file)){
        create_file($imagined_post_file, $separate_post);
    }


    $posts .= $separate_post;
}


$template->content = <<<EOT
<h1>Updates</h1>
<div class="content">
$posts
</div>
EOT;


print $template->output();
