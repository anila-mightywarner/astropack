<?php
$files = [
    'food-inspection-system-1.php',
    'food-inspection-system.php',
    'continuous-inkjet-printer.php',
    'portable-inkjet-printer.php',
    'metal-detector-machine.php',
    'handjet-ebs-260-printer-ksa.php',
    'handjet-ebs-250-printer-ksa.php',
    'ebs-6900-printer-ksa.php'
];

foreach ($files as $file) {
    if (!file_exists($file)) continue;
    $content = file_get_contents($file);
    
    // Replace old css and scripts with deferred minified versions
    $content = preg_replace('/<link rel="stylesheet" href="\.\.\/assets\/css\/stylesheet\.css\?v=[0-9.]+">/is', 
        '<link rel="stylesheet" href="assets/css/stylesheet5.min.css?v=2.0" media="print" onload="this.media=\'all\'">', $content);
    $content = str_replace('assets/css/stylesheet.min.css?v=1.8', 'assets/css/stylesheet5.min.css?v=2.0', $content);
        
    $content = preg_replace('/<link rel="stylesheet" href="https:\/\/maxcdn\.bootstrapcdn\.com\/bootstrap\/4\.4\.1\/css\/bootstrap\.min\.css">/is', 
        '<link rel="stylesheet" href="assets/css/bootstrap.min.css" media="print" onload="this.media=\'all\'">', $content);
        
    $content = preg_replace('/<link rel="stylesheet" href="https:\/\/cdnjs\.cloudflare\.com\/ajax\/libs\/font-awesome\/4\.7\.0\/css\/font-awesome\.min\.css">/is', 
        '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="print" onload="this.media=\'all\'">', $content);

    $content = preg_replace('/<script src="https:\/\/ajax\.googleapis\.com\/ajax\/libs\/jquery\/[0-9.]+\/jquery\.min\.js"><\/script>/is', 
        '<script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>', $content);
        
    $content = preg_replace('/<script src="https:\/\/cdnjs\.cloudflare\.com\/ajax\/libs\/popper\.js\/[0-9.]+\/umd\/popper\.min\.js"><\/script>/is', 
        '<script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>', $content);
        
    $content = preg_replace('/<script src="https:\/\/maxcdn\.bootstrapcdn\.com\/bootstrap\/[0-9.]+\/js\/bootstrap\.min\.js"><\/script>/is', 
        '<script defer src="assets/js/bootstrap.min.js"></script>', $content);

    // Replace gtag
    $content = preg_replace('/<!-- Start Global site tag \(gtag\.js\) - Google Analytics -->.*?<!-- End Global site tag \(gtag\.js\) - Google Analytics -->/is',
        "<!-- Start Global site tag (gtag.js) - Google Analytics --> \n        <script>\n        window.addEventListener('load', function() {\n          var d = document, s = d.createElement('script');\n          s.src = 'https://www.googletagmanager.com/gtag/js?id=UA-138135112-1';\n          s.async = true;\n          d.head.appendChild(s);\n          window.dataLayer = window.dataLayer || [];\n          function gtag(){dataLayer.push(arguments);}\n          gtag('js', new Date());\n          gtag('config', 'UA-138135112-1');\n        });\n        </script>\n        <!-- End Global site tag (gtag.js) - Google Analytics -->", $content);

    // Replace logo
    $content = preg_replace('/<img src="\.\.\/assets\/images\/logo\.png".*?>/is', 
        '<img src="assets/images/logo.webp" alt="logo" class="img-fluid" width="182" height="79" fetchpriority="high"/>', $content);

    // Replace Tawk.to
    $content = preg_replace('/<!--Start of Tawk\.to Script-->.*?<!--End of Tawk\.to Script-->/is',
        "<!--Start of Tawk.to Script-->\n<script type=\"text/javascript\">\nwindow.addEventListener('load', function() {\n    setTimeout(function() {\n        var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();\n        var s1 = document.createElement(\"script\"), s0 = document.getElementsByTagName(\"script\")[0];\n        s1.async = true;\n        s1.src = 'https://embed.tawk.to/5caf1991d6e05b735b420ad9/default';\n        s1.charset = 'UTF-8';\n        s1.setAttribute('crossorigin', '*');\n        s0.parentNode.insertBefore(s1, s0);\n    }, 4000);\n});\n</script>\n<!--End of Tawk.to Script-->", $content);

    // Replace WhatsHelp
    $content = preg_replace('/<!-- WhatsHelp\.io widget -->.*?<!-- \/WhatsHelp\.io widget -->/is',
        "<!-- WhatsHelp.io widget -->\n<script type=\"text/javascript\">\nwindow.addEventListener('load', function() {\n    setTimeout(function() {\n        var mob = '+971 52 699 6784';\n        var options = {\n            whatsapp: mob,\n            call_to_action: \"Message us\",\n            position: \"right\",\n        };\n        var proto = document.location.protocol, host = \"whatshelp.io\", url = proto + \"//static.\" + host;\n        var s = document.createElement('script');\n        s.type = 'text/javascript';\n        s.async = true;\n        s.src = url + '/widget-send-button/js/init.js';\n        s.onload = function () {\n            WhWidgetSendButton.init(host, proto, options);\n        };\n        var x = document.getElementsByTagName('script')[0];\n        x.parentNode.insertBefore(s, x);\n    }, 4000);\n});\n</script>\n<!-- /WhatsHelp.io widget -->", $content);

    // Convert any ../uploads/*.png or .jpg to .webp and add lazy/fetchpriority
    $content = preg_replace('/<img src="\.\.\/uploads\/landing\/(.*?)\.(png|jpg|jpeg)"(.*?)>/i', 
        '<img src="uploads/landing/$1.webp" fetchpriority="high" width="1920" height="664" $3>', $content);
        
    $content = preg_replace('/<img alt="(.*?)" src="\.\.\/uploads\/products\/(.*?)\.(png|jpg|jpeg)(.*?)"(.*?)>/i', 
        '<img alt="$1" src="uploads/products/$2.webp$4" width="255" height="255" loading="lazy" decoding="async" $5>', $content);

    file_put_contents($file, $content);
    echo "Updated $file\n";
}
echo "Done\n";
?>
