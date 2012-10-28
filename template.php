<?php
class Template {
        
    private $links;
    private $body;
    private $current_file;
    private $root_dir;
    var $content;
    var $title;
    var $sidebar;

    function __construct(){
        # Change this when migrating server
        $this->root_dir = "/dev/mineweb/";

        $this->title="Azrathud Minecraft Server";
        $this->content="";
        $this->sidebar="";
        # Highlight active page


        # link name => href
        $links = array( 
            "Home" =>"index.php", 
            "How to Join" => "how-to-join.php", 
            "Rules" => "rules.php", 
            "Plugins" => "plugins.php", 
            "Command List" => "command-list.php", 
            "About" => "about.php", 
            "Screenshots" => "screenshots.php",
            "Dymap" => "server.azrathud.com:8123", 
            "Forums" => "forums.php", 
            "Donate" => "donate.php"
        );

        # Grab the filename this file is being run from
        $current_file= $_SERVER["PHP_SELF"];
        $parts = Explode('/', $current_file);
        $this->current_file = $parts[count($parts) -1];

        # Create links. Add current link indicator
        $this->links = "";
        $span_class = "";
        foreach($links as $key => $link) {
            if( $link == $this->current_file) {
                $link_id = "id=\"current\"";
            }
            $this->links .= "<li><a " . $link_id . " href=\"" . $this->root_dir . $link .
                "\"" . 
                "><span>" . $key . " </span></a></li>\n";

            # Reset
            $link_id = "";

        }
//         $this->links = <<<EOT
//                     <li><a href="index.php"><span>Home</span></a></li>
//                     <li><a href="how-to-join.php"><span>How to Join</span></a></li>
//                     <li><a href="rules.php"><span>Rules</span></a></li>
//                     <li><a href="plugins.php"><span>Plugins</span></a>
//                     <li><a href="command-list.php"><span>Command List</span></a></li>
//                     <li><a href="about.php"><span>About</span></a></li>
//                     <li><a href="screenshots.php"><span>Screenshots</span></a></li>
//                     <li><a href="server.azrathud.com:8123"><span>Live Map</span></a></li>
//                     <li><a href="forum.php"><span>Forum</span></a></li>
//                     <li><a href="donate.php"><span>Donate</span></a></li>
//                     <li><a href="staff.php"><span>Staff</span></a></li>
//                     <li><a href="contact.php"><span>Contact</span></a></li>
// EOT;

        // $to_replace= "/" . $this->current_file . "\"" . "/";
        // $replacement= "" . $this->current_file . "\"" . " class=\"orange\"" . "";
        // $this->links = preg_replace( $to_replace, $replacement, $this->links); 
        // $this->links = preg_replace( $to_replace, $replacement, $this->links); 
    }

    function output() {
        $this->body = <<<EOT
<!doctype html>
<html>
    <head>
        <title>$this->title</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
    </head>
    <body>
        <div id="wrapper">
            <div id="logo">
                <a href="#">
                    <span class="orange">Azrathud</span> Minecraft Server<img src="images/ocelot-egg.png"></img>
                </a>
            </div>
            <div id="left-sub-wrapper">
                <div id="nav" class="box" >
                    <ul>
$this->links
                    </ul>
                </div>
                <section id="body" class="box">
                    <div id="main-body">
$this->content
                    </div>
                </section>
            </div>
            <div id="sidebar" class="box">
$this->sidebar
        </div>
    </body>
</html>
EOT;
        print $this->body;
    }
}
