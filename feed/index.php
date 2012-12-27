<?php
header("Content-Type: application/rss+xml; charset=utf-8");

$rssfeed.= '<?xml version="1.0" encoding="utf-8"?>';
$rssfeed.= '<rss version="2.0">';
$rssfeed.= '<channel>';
$rssfeed.= '<title>Azrathud RSS feed</title>';
$rssfeed.= '<link>http://minecraft.azrathud.com/</link>';
$rssfeed.= '<description>Updates for the Azrathud minecraft server</description>';
$rssfeed.= '<language>en-us</language>';
#
# Read posts
$base_dir = "/home1/onetwoko/public_html/minecraft/posts/";
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


# Output file name as header, last modified and then the contents
foreach($files as $file) {
    $last_modified_raw = filemtime("$base_dir$file");
    $last_modified = date("D, d M Y H:i:s O", $last_modified_raw);
    $content = file_get_contents("$base_dir$file");
    $post_name = str_replace("-", " ", $file);
    $posts.="<div class=\"post\"><h2>$post_name - $last_modified </h2> $content</div>";

    $rssfeed .= '<item>';
    $rssfeed .= '<title>' . $post_name . '</title>';
    $rssfeed .= '<description>' . $content . '</description>';
    $rssfeed .= '<link>http://minecraft.azrathud.com/' . $file . '.php</link>';
    $rssfeed .= '<pubDate>' . $last_modified . '</pubDate>';
    $rssfeed .= '</item>';
}

$rssfeed .= '</channel>';
$rssfeed .= '</rss>';

echo $rssfeed;

    
?>
