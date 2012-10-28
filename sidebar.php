<?php
class Sidebar {
    var $server_status;
    function __construct($server_status=false) {
        $this->server_status = $server_status;
    }

    function output() {
        $final_output = "";
        if($this->server_status) {
            $final_output .= $this->get_server_status();
        }
        return $final_output;
    }

    function get_server_status() {
        $file_handle = fopen("status.txt", "r");
        $status=rtrim(fgets($file_handle), "\n");
        $ip= rtrim(fgets($file_handle), "\n");
        if ($status == "up")
        {
            $color="green";
            $text="Up";
        }
        else if ($status == "down") {
            $color="red";
            $text="Down";
        }
        else
        {
            $color="red";
            $text="Error";
        }

       

        $server_status = <<<EOT
<div id="status">
<h1>Server Status</h1>
<div class="content"><span style="color:$color"><b>$text</b> </span>at $ip</div>
</div>
EOT;
        return $server_status;
    }
}

