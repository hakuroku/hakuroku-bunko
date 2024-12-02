<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

    <style>
        .comics-create_bg {
            position: relative;
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
            width: 140px;
            text-align: right
        }
        
        .series-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 100;
            width: 300px;
            text-align: left;
            margin: auto;
            background-color: goldenrod;
            padding: 8px 12px;
        }
        .display-none {
            display: none;
        }
        .batu-img {
            font-size: 20px;
        }
        .batu-icon {
            float: right;
            margin-bottom: 20px;
            border: none;
            background: none;
            display: inline-block;
        }
        :hover.batu-img {
            color: lightgray;
        }

        textarea {
            resize: none;
            border: 1px solid black;
            display: block;
            width: 100%;
            height: 120px;
            margin: auto
        }
    </style>

    <script src={{ asset('/js/comics-upload.js') }} defer></script>
    <script src={{ asset('/js/series-form.js') }} defer></script>
</head>
<body>

<div class="comics-create_bg">
    
    <form method="post" action={{Route('comics.upload')}}  enctype="multipart/form-data">
        @csrf
            <div class="comics-create_dropzone" >
            </div>
            <input type="file" name="comic_content[]" multiple class="comics-create_field">
        <br>
        <label><span>作品名：</span><input type="text" name="comic_title"></label><br>
        <label><span>シリーズ名：</span><input type="text" name="series_title"></label><br>
        {{-- <p><span>シリーズ：</span><button class="series-button">シリーズを作成</button></p> --}}
        <label><span>著者名：</span><input type="text" name="author_name" ></label><br>
        <input type="submit" value="掲載する">
    </form>

    {{-- <div class="series-form display-none">
            <button class="batu-icon series-button"><i class="fa-solid fa-xmark batu-img"></i></button>
            <form 
            method="post" action={{Route('series.create')}}
            >
                <p>シリーズ名：<br><input type="text" name="series_title"></p>
                <p>あらすじ：<br><textarea name="series_caption"></textarea><br></p>
            <div style="text-align: center">
                <input type="submit" value="作成する" >
            </div>
            </form>
        </div> --}}
</div>

</body>
</html>

