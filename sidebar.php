<?php
class Sidebar {
    var $server_status;
    var $modules_state = array();
    function __construct($server_status=false) {
        #
        # The Sidebar is disabled until any module found enabled
        $this->sidebar_enabled = false;

        $this->server_status = $server_status;
        array_push($this->modules_state, $server_status);
        foreach($this->modules_state as $state)
        {
            if($state) {
                $this->sidebar_enabled = true;
            }
        }

    }

    function output() {
        if(! $this->sidebar_enabled) {
            return "";
        }
        $final_output = <<<EOT
<div id="sidebar" class="box">
EOT;

        if($this->server_status) {
            $final_output .= $this->get_server_status();
        }

    $final_output .= <<<EOT
</div>
EOT;
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
<div class="content"><span id="notification" style="color: $color"><b>$text</b></span> at $ip</div>
</div>
EOT;
        return $server_status;
    }
}

