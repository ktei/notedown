<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>{if isset($title)}{$title}{/if}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="/static/css/normalize.css" type="text/css">
        <link rel="stylesheet" href="/static/css/app.css" type="text/css">
        <link rel="stylesheet" href="/static/css/font-awesome.css" type="text/css">
    </head>

    <body>

        {include file="layouts/header_public.tpl"}
        {include file="pages/$page.tpl"}

        <hr>
        <footer>
            <div class="row">
                <div class="large-12 columns">


                </div>
            </div>
        </footer>

        <script src="/static/js/vendor/jquery-2.0.2.min.js"></script>
        <script src="/static/js/vendor/foundation.min.js"></script>
        <script>
            $(document).foundation();
        </script>

    </body>
</html>
