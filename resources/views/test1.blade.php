{{--<head>--}}
    {{--<style>--}}
        {{--body {--}}
            {{--background: whitesmoke;--}}
            {{--font-family: "Open Sans", sans-serif;--}}
        {{--}--}}
        {{--.container {--}}
            {{--max-width: 960px;--}}
            {{--margin: 30px auto;--}}
            {{--padding: 20px;--}}
        {{--}--}}
        {{--.avatar-upload {--}}
            {{--position: relative;--}}
            {{--max-width: 205px;--}}
            {{--margin: 50px auto;--}}
        {{--}--}}
        {{--.avatar-upload .avatar-edit {--}}
            {{--position: absolute;--}}
            {{--right: 12px;--}}
            {{--z-index: 1;--}}
            {{--top: 10px;--}}
        {{--}--}}
        {{--.avatar-upload .avatar-edit input {--}}
            {{--display: none;--}}
        {{--}--}}
        {{--.avatar-upload .avatar-edit input + label {--}}
            {{--display: inline-block;--}}
            {{--width: 34px;--}}
            {{--height: 34px;--}}
            {{--margin-bottom: 0;--}}
            {{--border-radius: 100%;--}}
            {{--background: #ffffff;--}}
            {{--border: 1px solid transparent;--}}
            {{--box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);--}}
            {{--cursor: pointer;--}}
            {{--font-weight: normal;--}}
            {{--transition: all 0.2s ease-in-out;--}}
        {{--}--}}
        {{--.avatar-upload .avatar-edit input + label:hover {--}}
            {{--background: #f1f1f1;--}}
            {{--border-color: #d6d6d6;--}}
        {{--}--}}
        {{--.avatar-upload .avatar-edit input + label:after {--}}
            {{--content: "\f040";--}}
            {{--font-family: "FontAwesome";--}}
            {{--color: #757575;--}}
            {{--position: absolute;--}}
            {{--top: 10px;--}}
            {{--left: 0;--}}
            {{--right: 0;--}}
            {{--text-align: center;--}}
            {{--margin: auto;--}}
        {{--}--}}
        {{--.avatar-upload .avatar-preview {--}}
            {{--width: 192px;--}}
            {{--height: 192px;--}}
            {{--position: relative;--}}
            {{--border-radius: 100%;--}}
            {{--border: 6px solid #f8f8f8;--}}
            {{--box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);--}}
        {{--}--}}
        {{--.avatar-upload .avatar-preview > div {--}}
            {{--width: 100%;--}}
            {{--height: 100%;--}}
            {{--border-radius: 100%;--}}
            {{--background-size: cover;--}}
            {{--background-repeat: no-repeat;--}}
            {{--background-position: center;--}}
        {{--}--}}

    {{--</style>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container">--}}

    {{--<div class="avatar-upload">--}}
        {{--<div class="avatar-edit">--}}
            {{--<input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />--}}
            {{--<label for="imageUpload"></label>--}}
        {{--</div>--}}
        {{--<div class="avatar-preview">--}}
            {{--<div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--</body>--}}
{{--<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>--}}
{{--<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>--}}
{{--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>--}}
{{--<script>--}}
    {{--function readURL(input) {--}}
        {{--if (input.files && input.files[0]) {--}}
            {{--var reader = new FileReader();--}}
            {{--reader.onload = function(e) {--}}
                {{--$('#imagePreview').css('background-image', 'url('+e.target.result +')');--}}
                {{--$('#imagePreview').hide();--}}
                {{--$('#imagePreview').fadeIn(650);--}}
            {{--}--}}
            {{--reader.readAsDataURL(input.files[0]);--}}
        {{--}--}}
    {{--}--}}
    {{--$("#imageUpload").change(function() {--}}
        {{--readURL(this);--}}
    {{--});--}}
{{--</script>--}}






<head>
    <style>

        @import url(https://fonts.googleapis.com/css?family=Source+Code+Pro:400,500);
        @keyframes roll {
            0% {
                opacity: 0;
            }
            50% {
                opacity: 0;
                transform: translate(-150%, -50%) rotate(-90deg) scale(0.3);
                box-shadow: none;
            }
            100% {
                opacity: 1;
                transform: translate(-50%, -50%) rotate(0deg) scale(1);
                box-shadow: 0 3px 5px rgba(0, 0, 0, 0.3);
            }
        }
        body {
            /*background: #1abc9c;*/
        }
        * {
            box-sizing: border-box;
        }
        .wrapper {
            animation: roll 1.5s;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 25px;
            background: #16a085;
            border-radius: 50%;
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.3);
        }
        .wrapper:active #img-result {
            margin-top: 2px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        }
        .wrapper #img-result {
            cursor: pointer;
            margin: 0;
            position: relative;
            /*background: #1abc9c;*/
            background-size: cover;
            background-position: center;
            display: block;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.3);
            color: rgba(0, 0, 0, 0);
            transition: box-shadow 0.3s, margin 0.3s, background-image 1.5s;
        }
        .wrapper #img-result.no-image:before {
            font-family: 'FontAwesome';
            content: "\f030";
            position: absolute;
            left: 50%;
            top: 50%;
            color: #fff;
            font-size: 48px;
            opacity: .8;
            transform: translate(-50%, -50%);
            text-shadow: 0 0px 5px rgba(0, 0, 0, 0.4);
        }
        .wrapper button {
            margin-top: 20px;
            display: block;
            font-family: 'Open Sans Condensed', sans-serif;
            /*background: #1abc9c;*/
            width: 100%;
            border: none;
            color: #fff;
            padding: 10px;
            letter-spacing: 1.3px;
            font-size: 1.05em;
            border-radius: 5px;
            box-shadow: 0 4px 5px rgba(0, 0, 0, 0.3);
            outline: 0;
            transition: box-shadow 0.3s, margin-top 0.3s, padding 0.3s;
        }
        .wrapper button:active {
            box-shadow: none;
            margin-top: 24px;
            padding: 8px;
        }
        .show-button {
            background: #264974;
            border: none;
            color: #fff;
            padding: 10px 20px;
            float: right;
            display: none;
        }
        .upload-result {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #fff;
            overflow-y: auto;
        }
        .upload-result__content {
            word-break: break-all;
            font-family: 'Source Code Pro';
            overflow-wrap: break-word;
        }

    </style>
</head>
<div class="wrapper">
    <button class="no-image" id="img-result">Upload Image</button>
</div>
{{--<button class="show-button">Show server request</button>--}}
<div class="upload-result">
    <button class="hide-button">Close</button>
    <pre class="upload-result__content">
  </pre>
</div>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>
    (function () {
        var uploader = document.createElement('input'),
            image = document.getElementById('img-result');

        uploader.type = 'file';
        uploader.accept = 'image/*';

        image.onclick = function() {
            uploader.click();
        }

        uploader.onchange = function() {
            var reader = new FileReader();
            reader.onload = function(evt) {
                image.classList.remove('no-image');
                image.style.backgroundImage = 'url(' + evt.target.result + ')';
                var request = {
                    itemtype: 'test 1',
                    brand: 'test 2',
                    images: [{
                        data: evt.target.result
                    }]
                };

                document.querySelector('.show-button').style.display = 'block';
                document.querySelector('.upload-result__content').innerHTML = JSON.stringify(request, null, '  ');
            }
            reader.readAsDataURL(uploader.files[0]);
        }

        document.querySelector('.hide-button').onclick = function () {
            document.querySelector('.upload-result').style.display = 'none';
        };

        document.querySelector('.show-button').onclick = function () {
            document.querySelector('.upload-result').style.display = 'block';
        };
    })();
</script>



