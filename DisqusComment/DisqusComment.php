<?php

//按disqus要求替换下面的信息
class DisqusComment {
    public function __construct() {
        // Hook into the footer to add Disqus comments script only on article-link.php
        $this->addAction('wp_footer', [$this, 'addDisqusComments']);
    }

    public function addAction($hook, $function) {
        // This method is a placeholder for actual hook registration
        // In a real CMS, you'd tie into the system's hook mechanism
        if ($hook === 'wp_footer') {
            $function();
        }
    }

    public function addDisqusComments() {
        // Only add Disqus script if we are on the article-link.php page
        if (strpos($_SERVER['PHP_SELF'], 'article-link.php') !== false) {
            echo <<<EOD
<div id="disqus_thread"></div>
<script>
var disqus_config = function () {
    this.page.url = window.location.href;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = document.location.pathname; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://w4r3s.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
EOD;
        }
    }
}

// Instantiate the plugin class to initialize it
new DisqusComment();
