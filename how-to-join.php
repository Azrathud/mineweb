<?php

require_once('template.php');
require_once('sidebar.php');

$sidebar = new Sidebar($server_status = true);
$template = new Template($sidebar);

$template->content = <<<EOT
<h1>How to join</h1>
<div class="content">
<p>Simply type <tt>server.azrathud.com</tt> into your minecraft address bar. This server is public for anyone to join.</p>
</div>
EOT;


$template->output();
