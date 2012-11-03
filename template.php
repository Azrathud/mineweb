<?php
require_once('sidebar.php');
class Template {
        
    private $links;
    private $body;
    private $current_file;
    private $current_filename;
    private $root_dir;
    var $content;
    var $title;
    var $sidebar;
    var $sidebar_output;

    function __construct($sidebar){

        # Template supplied sidebar
        $this->sidebar = $sidebar;
        $this->sidebar_output = $this->sidebar->output();

        date_default_timezone_set("America/Denver");
        # Change this when migrating server

        # I need to export this as a file due to having the root variable
        #   In different environments
        $root_dir_file= fopen("root_dir.txt", 'r');
        $this->root_dir = fgets($root_dir_file);
        fclose($root_dir_file);

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
            // "Dymap" => "server.azrathud.com:8123", 
            "Forums" => "forums/", 
            // "Donate" => "donate.php"
            "Contact" => "contact.php", 
        );

        # Grab the filename this file is being run from
        $current_file= $_SERVER["PHP_SELF"];
        $parts = Explode('/', $current_file);
        $this->current_file = $parts[count($parts) -1];

        # Store for later
        $current_filename_parts= Explode('.', $this->current_file);
        $this->current_filename= $current_filename_parts[0];

        # Create links. Add current link indicator
        $this->links = "";
        $link_id = "";
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
    }

    function output() {
        $this->body = <<<EOT
<!doctype html>
<html>
    <head>
        <title>$this->title</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link rel="stylesheet" type="text/css" href="$this->current_filename.css" />
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
            $this->sidebar_output
        </div>
    </body>
</html>
EOT;
        print $this->body;
    }
}
