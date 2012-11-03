<?php

require_once('template.php');
require_once('sidebar.php');

$sidebar = new Sidebar($server_status = true);
$template = new Template($sidebar);

$template->content = <<<EOT
<h1>Plugins</h1>
<div class="content">
    <a href="http://dev.bukkit.org/server-mods/coreprotect/">CoreProtect</a>
    <p>block logging, rollbacks, restores. Moderators and admins use this plugin to revert destruction due to grefing and game glitches. Do not ask them to revert accidents with this plugin.</p>
    <a href="http://dev.bukkit.org/server-mods/easytitles/">EasyTitles</a>
    <p>generates titles for people. Admins and Moderators will have titles indicating their status from this plugin. Regular members can acquire titles through donating to the server.</p> 
    <a href="http://forums.bukkit.org/threads/fun-lightningcake-v1-0-lightning-spawns-cake-1-2-5-r1-0.63388/">LightningCake</a>
    <p>spawns objects where lightning strikes. A Novel plugin made by the administrator of this server.</p>
    <a href="http://forums.bukkit.org/threads/sec-lockette-v1-7-4-simple-chest-and-door-lock-no-databases-1848-2317-1-3-1-r1.4336/page-110">Lockette</a>
    <p>provides locking based ownership of chests and doors and other containers</p>
    <a href="http://dev.bukkit.org/server-mods/minebackup/">MineBackup</a>
    <p>provides hard backups of the server map over periodic intervals. This is contrasted with CoreProtect, which only records the changes. I use these backup in case something disasterous happens to the current save like corruption, etc.</p>
    <a href="http://dev.bukkit.org/server-mods/n3w_theendagain/files/11-n3w_the-end-again-v0-6/">N3W TheEndAgain</a>
    <p>provides regeneration of the Ender Dragon after a set amount of time</p>
    <a href="http://dev.bukkit.org/server-mods/nocheatplus/">NoCheatPlus</a>
    <p>identifies various forms of cheating. Note: sometimes this plugin gives false positives due to lag in-game.</p>
    <a href="http://forums.bukkit.org/threads/admn-dev-permissionsbukkit-v1-6-official-default-groups-plugin-1-2-5-r3-0.26785/">PermissionsBukkit</a>
    <p>allows modification of permissions of various game plugins and behavior</p>
    <a href="http://dev.bukkit.org/server-mods/pistonsplus/">PistonsPlus</a>
    <p>allows pistons to move once unmoveable blocks</p>
    <a href="http://dev.bukkit.org/server-mods/project-33575/">PortalStick</a>
    <p>sticks mimic Portal's portal system</p>
    <a href="http://dev.bukkit.org/server-mods/qwicktree/">QwickTree</a>
    <p>allows trees to be cut down quickly</p>
    <a href="http://dev.bukkit.org/server-mods/royalcommands/">Royal Commands</a>
    <p>adds a bunch of custom generally useful commands to the server for admins and members alike</p>
</div>
EOT;


$template->output();
