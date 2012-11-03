<?php

require_once('template.php');
require_once('sidebar.php');

$sidebar = new Sidebar($server_status = true);
$template = new Template($sidebar);

$base_dir = "plugins/";
$dir_handle = @opendir("$base_dir") or die ("Unable to open $base_dir directory");

# Sort put the contents of each file into an array
$files = array();
while ($file = readdir($dir_handle)) {
    // skip unnecessary files
    if($file == "." || $file == ".." || substr($file, 0, 1) == ".") {
        continue;
    } else
    {
        # Add files to an array based on filename
        $current_filename_parts = Explode('.', $file);
        $current_filename = $current_filename_parts[0];
        $file_object = fopen("$base_dir$file", 'r');
        $files[$current_filename][0] = fgets($file_object); // link
        $files[$current_filename][1] = fgets($file_object); // text
        fclose($file_object);
    }
}

// Alphabetic based on key which is the plugin name
ksort($files);

$plugin_content = "";


foreach($files as $filename_raw => $filecontents) {
    $filename_final = preg_replace("/_/", " ", $filename_raw);
    $plugin_content .= <<<EOT
    <a href="$filecontents[0]">$filename_final</a>
    <p>$filecontents[1]</p>
EOT;
}
$template->content = <<<EOT
<h1>Plugins</h1>
<div class="content">
$plugin_content
</div>
EOT;


$template->output();
