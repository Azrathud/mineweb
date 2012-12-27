<?php

require_once('template.php');
require_once('sidebar.php');

function create_file($filename, $contents) {
    $sidebar = new Sidebar();
    $template = new Template($sidebar);

    $file_handle = fopen($filename, 'w');
    $template->content = <<<EOT
$contents
EOT;

    $file_write_contents = $template->output();
    fwrite($file_handle, $file_write_contents);

    fclose($file_handle);
}
?>
