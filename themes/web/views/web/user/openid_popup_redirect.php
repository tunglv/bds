<!DOCTYPE html>
<html>
    <head>
        <title>Openid Redirect</title>

        <script type="text/javascript">
            if (window.opener) {
                window.close();
                window.opener.location = '<?php echo $url?>'
            }
            else {
                window.location = '<?php echo $url?>';
            }
        </script>
    </head>
    <body>
        <h2>Quay trở lại website ...</h2>
        <h3>
            <a href="<?php echo $url; ?>">Click vào đây để quay trở lại website</a>
        </h3>
    </body>
</html>
