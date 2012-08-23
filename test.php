<?php
$HEADER = <<<EOD
header
<br /> foobar
EOD;
    include 'templates/header.php';
    $HOME = getenv("HOME");
    echo $HOME;
    $page = $_SERVER['SCRIPT_NAME'];
    echo 'page:' . $page;
?>
                    &#060;dynamic-news-here&#062;
                    </div>
                </div>
                <div id="more-link">
                    <a href="news.html">More</a>
                </div>
            </section>
            <section id="sidebar">
                    <div id="status">
                        <h1>Server Status</h1>
                        <div class="content">&#060;dynamic-status-here&#062;</div>
                    </div>
                    <div id="about">
                    	<h1>About</h1>
                        <p class="content">A genuinely awesome, non-restrictive minecraft server. The only goal this server has is to create a fun, survival, semi-vanilla environment in which for people to play.</p>
                    </div>
                    <div id="starred-threads">
                    	<h1>Starred Threads</h1>
                    </div>
                    <div class="content">&#060;dynamic-content-here&#062;</div>
            </section>
        </div>
    </body>
</html>

