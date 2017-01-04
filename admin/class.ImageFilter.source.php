<html>
    <head>
        <title>PHP Highlighter</title>
        <style type="text/css" media="screen">
            .num { color: grey; border-right: 1px solid grey; padding-right: 4px; text-align: right;}
            .phpline { padding-left: 7px; }
            .php_code_link { color: red;}
            .php_background{ background-color: #E2EDFD; }
            .php_comment { color: #FF8000; }
            .php_default { color: #0000BB; }
            .php_html { color: black; }
            .php_keyword { color:     #007700; }
            .php_string { color: #DD0000; }
            code {font-size: 1.1em;  white-space: nowrap;  line-height: normal;}
        </style>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    </head>
    <body>
        <?php
        include('class.highlighter.php');
        $HL = new highlighter();
        $HL->set_code(file_get_contents('class.ImageFilter.php'));
        print $HL->process();
        ?>
    </body>
</html>