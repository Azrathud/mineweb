<?php

require_once('template.php');
require_once('sidebar.php');

$sidebar = new Sidebar($server_status = true);
$template = new Template($sidebar);

$template->content = <<<EOT
<h1>Contact</h1>
<div class="content">
<p>You can reach us with any questions, suggestions, or concerns at <a href="mailto:admin@minecraft.azrathud.com">admin@minecraft.azrathud.com<a></p>
</div>
EOT;


$template->output();
