<?php

class HelloWorld {

    public function __construct() {
        echo "<!-- HelloWorld Plugin Loaded -->"; // 调试输出
        if ($this->isAdminPage()) {
            $this->printHelloWorldMessage();
        }
    }

    private function isAdminPage() {
        $currentUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        return strpos($currentUrl, '/admin/plugins.php') !== false;
    }

    public function printHelloWorldMessage() {
        echo '<div style="background-color: #f0f0f0; border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; text-align: center;">HelloWorld</div>';
    }
}

new HelloWorld();
