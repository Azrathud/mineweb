<?php

require_once('template.php');
require_once('sidebar.php');

$sidebar = new Sidebar($server_status = true);
$template = new Template($sidebar);

$template->content = <<<EOT
<h1>Rules</h1>
<div class="content">
    <p>Please don't grief. Killing is fine in cases of conflict but pointless repeated killing or destruction of property is considering griefing.</p>
    <p>You may only ask for a rollback in cases of bugs, server problems, or griefing.</p>
</div>
EOT;


$template->output();
