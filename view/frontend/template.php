<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" />
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=8rx5j5se2v96khf9x0zh982xdtwdsp1obbeht57c6jd81ng0"></script>
        <script>
            tinymce.init({
                selector: '#mytextarea'
            });
        </script>

    </head>
        
    <body>
        <?= $content ?>
    </body>
</html>