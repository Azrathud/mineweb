<?php

require_once('template.php');
require_once('sidebar.php');

$sidebar = new Sidebar($server_status = true);
$template = new Template($sidebar);

$template->content = <<<EOT
<h1>About</h1>
<p>A server founded by Bryce Guinta(azrathud) and friends.
EOT;


$template->output();
