<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .comics-create_bg {
        margin: auto;
        width: 800px;
        text-align: center;
        }
        .comics-create_dropzone {
            border: 1px solid black;
            height: 200px;
        }
        input {
            margin-bottom: 12px;
        }
        span {
            display: inline-block;
            width: 100px;
            text-align: right
        }
    </style>

    <script src={{ asset('/js/comics-create.js') }} defer></script>
</head>
<body>

<div class="comics-create_bg">
    <form action="">
        <label>
            <div class="comics-create_dropzone">
            </div>
            <input type="file" name="comic_content" multiple="multiple" class="comics-create_field">
        </label><br>
        <label><span>作品名：</span><input type="text" name="comic_title"></label><br>
        <label><span>シリーズ名：</span><input type="text" name="series_name"></label><br>
        <label><span>著者名：</span><input type="text" name="author_name"></label><br>
        <input type="submit" value="掲載する">
    </form>
</div>

</body>
</html>

