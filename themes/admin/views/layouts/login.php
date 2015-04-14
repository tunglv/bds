<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $this->pageTitle?></title>
        <link rel="stylesheet" href="<?php echo $this->themeUrl?>/files/theme/css/style.default.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $this->themeUrl?>/files/style.css" type="text/css" />
    </head>

    <body class="loginbody">

        <div class="loginwrapper">
            <div class="loginwrap zindex100 animate2 bounceInDown">
                <?php echo $content?>
            </div>
            <div class="loginshadow animate3 fadeInUp"></div>
        </div><!--loginwrapper-->
    </body>
</html>
