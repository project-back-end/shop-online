<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('dist/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/feedback.css')}}">
    <link rel="stylesheet" href="{{asset('dist/js/bootstrap.js')}}">
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script rel="stylesheet" href="{{ asset('js/jquery-3.3.1.js') }}"></script>
    <script rel="stylesheet" href="{{ asset('js/jquery.min.js') }}"></script>
    <script rel="stylesheet" href="{{ asset('js/jquery.easing.min.js') }}"></script>
    @include('views.admin.partials.head')
</head>
<body class="si-body si-body-feedback">
<div class="container">
    <div id="form" class="col-md-6 col-md-offset-3 feedback">
        <div id="feedbackform">
            <div class="socialintents-rows">
                <div class="col-md-11"><h4 class="feedbackLine1">Hello! We'd love to hear your thoughts about our
                        website</h4></div>
                <div onclick="hide()" class="col-md-1"><p style="color: red" class="fa fa-times"></p><br></div>
            </div>
            <br>
            <form action="/feedback" method="post">
                {{csrf_field()}}
                <div class="col-md-12 form-inline socialintents-rows">
                    <p class="si-smalltext feedbackRatings">1. How likely would you be to recommend us to your
                        friends?</p>
                    <div onclick="changeActiveNum()" id="list" class=" col-md-12 btn-group" data-toggle="buttons">
                        <label class="btn btn-default btn-feedback">
                            <input type="radio" name="rating" id="rate1" value="1">
                            1 </label>
                        <label class="btn btn-default btn-feedback">
                            <input type="radio" name="rating" id="rate2" value="2">
                            2 </label>
                        <label class="btn btn-default btn-feedback">
                            <input type="radio" name="rating" id="rate3" value="3">
                            3 </label>
                        <label class="btn btn-default btn-feedback">
                            <input type="radio" name="rating" id="rate4" value="4">
                            4 </label>
                        <label class="btn btn-default btn-feedback">
                            <input type="radio" name="rating" id="rate5" value="5">
                            5 </label>
                        <label class="btn btn-default btn-feedback">
                            <input type="radio" name="rating" id="rate6" value="6">
                            6 </label>
                        <label class="btn btn-default btn-feedback">
                            <input type="radio" name="rating" id="rate7" value="7">
                            7 </label>
                        <label class="btn btn-default btn-feedback active">
                            <input type="radio" name="rating" id="rate8" value="8">
                            8 </label>
                        <label class="btn btn-default btn-feedback">
                            <input type="radio" name="rating" id="rate9" value="9">
                            9 </label>
                        <label class="btn btn-default btn-feedback">
                            <input type="radio" name="rating" id="rate10" value="10">
                            10 </label>
                    </div>
                    <div style="padding-top:10px;">
                        <p class="si-smalltext feedbackLine2">2. How can we improve our website? Do you have ideas,
                            questions,
                            or need help? Let us know.</p>
                    </div>
                    <div class="form-group">
                        <strong>Store Detials</strong>
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="locat" onclick="getMyID(this.id)">Location</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="addition" onclick="getMyID(this.id)">Additional Information</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div id="location">
                                    <strong>Street:</strong>
                                    <input type="text" name="street" class="form-control" placeholder="">
                                    <strong>Village:</strong>
                                    <input type="text" name="village" class="form-control" placeholder="">
                                    <strong>Sangkat:</strong>
                                    <input type="text" name="sangkat" class="form-control" placeholder="">
                                    <strong>City:</strong>
                                    <input type="text" name="city" class="form-control" placeholder="">
                                    <strong>Capital/Province:</strong>
                                    <input type="text" name="capital" class="form-control" placeholder="">
                                    <strong>Country:</strong>
                                    <input type="text" name="country" class="form-control" placeholder="" value="Cambodia">
                                    <strong>Latitude:</strong>
                                    <input type="text" name="latitud" class="form-control" placeholder="">
                                    <strong>Longitude:</strong>
                                    <input type="text" name="longitude" class="form-control" placeholder="">
                                </div>
                                <div id="add_infor" style="display: none;">
                                    <strong>Tel:</strong>
                                    <input type="text" name="telephone" class="form-control" placeholder="">
                                    <strong>Email:</strong>
                                    <input type="text" name="email" class="form-control" placeholder="">
                                    <strong>Facebook URL:</strong>
                                    <input type="text" name="url_face" class="form-control" placeholder="">
                                    <strong>Instagram URL:</strong>
                                    <input type="text" name="url_insta" class="form-control" placeholder="">
                                    <strong>Linkedin URL:</strong>
                                    <input type="text" name="url_linked" class="form-control" placeholder="">
                                    <strong>Website:</strong>
                                    <input type="text" name="website" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--<div class="card">--}}
                        {{--<div class="card-header">--}}
                            {{--<ul class="nav nav-tabs card-header-tabs">--}}
                                {{--<li class="nav-item">--}}
                                    {{--<a class="nav-link active" id="question" onclick="getMyID(this.id)">question</a>--}}
                                {{--</li>--}}
                                {{--<li class="nav-item">--}}
                                    {{--<a class="nav-link" id="idea" onclick="getMyID(this.id)">Idea</a>--}}
                                {{--</li>--}}
                                {{--<li class="nav-item">--}}
                                    {{--<a class="nav-link" id="problem" onclick="getMyID(this.id)">problem</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}

                        {{--<div class="card-body textarea_feedback">--}}
                            {{--<div id="question-text">--}}
                                {{--<textarea name="" id="" cols="60" rows="10" placeholder="input question">--}}
                                    {{--asd--}}
                                {{--</textarea>--}}
                            {{--</div>--}}
                            {{--<div id="idea-text" style="display: none">--}}
                                {{--<textarea name="" id="" cols="60" rows="10">--}}
                                        {{--dg--}}
                                {{--</textarea>--}}
                            {{--</div>--}}
                            {{--<div id="problem-text" style="display: none">--}}

                                {{--<textarea name="" id="" cols="60" rows="10">--}}
                                      {{--jh--}}
                                {{--</textarea>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div id="feedbackType" class="tab-content">--}}
                        {{--<div id="tab1" class="feedback-tabs tab-pane active" style="padding:10px 0px 10px 0px;>--}}
                    {{--<input type=" id="cat1">--}}
                    {{--<textarea style="width:100%" class="form-control" name="user_question" id="feedback1" rows="3"--}}
                              {{--placeholder="Please Enter your Question" maxlength="200" required="required">Please enter your Question!--}}
                    {{--</textarea>--}}
                        {{--</div>--}}

                    {{--</div>--}}

                    {{--Send Feedback--}}

                    {{--<div class="" style="padding-top:5px;padding-bottom:5px;">--}}
                        {{--<button id="feedbackBtn" type="submit" class="btn btn-primary pull-right">Send Feedback</button>--}}
                        {{--<input type="checkbox" id="myCheck" onclick="replyBack()">Want us reply back?</input>--}}
                        {{--<div id="text" style="display:none">--}}
                            {{--<p>Please Kindly give me your email</p>--}}
                            {{--<input style="outline: none; width: 100%;" name="userEmail" type="text"--}}
                                   {{--placeholder="your email">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function getMyID(id) {
        console.log(id)
        if (id === 'question') {
            $("#question-text").show();
            $("#idea-text").hide();
            $("#problem-text").hide();
        } else if (id === 'idea') {
            $("#question-text").hide();
            $("#idea-text").show();
            $("#problem-text").hide();
        }
        else {
            $("#question-text").hide();
            $("#idea-text").hide();
            $("#problem-text").show();
        }
    }
</script>
<script>
    $(document).ready(function () {
        $('ul li a').click(function () {
            $('li a').removeClass("active");
            $(this).addClass("active");
        });
    });
</script>
{{--<script>--}}
    {{--//    function feedback1() {--}}
    {{--//        document.getElementById("feedbackType").innerHTML = "<div id=\"tab1\" class=\"feedback-tabs tab-pane active\" style=\"padding:10px 0px 10px 0px;>\n" +--}}
    {{--//            "                           <input type=\" hidden\" id=\"cat1\" value=\"Question\">\n" +--}}
    {{--//            "                        <textarea style=\"width:100%\"\n" +--}}
    {{--//            "                                  class=\"form-control\" name=\"user_question\" id=\"feedback1\" rows=\"3\" placeholder=\"Please Enter your Question!\"\n" +--}}
    {{--//            "                                  maxlength=\"200\" required=\"required\"></textarea></div>";--}}
    {{--//    }--}}
    {{--//--}}
    {{--//    function feedback2() {--}}
    {{--//        document.getElementById("feedbackType").innerHTML = "<div id=\"tab1\" class=\"feedback-tabs tab-pane active\" style=\"padding:10px 0px 10px 0px;>\n" +--}}
    {{--//            "                           <input type=\" hidden\" id=\"cat1\" value=\"Question\">\n" +--}}
    {{--//            "                        <textarea style=\"width:100%\"\n" +--}}
    {{--//            "                                  class=\"form-control\" name=\"user_idea\" id=\"feedback1\" rows=\"3\" placeholder=\"Please Enter your Ideas Here!\"\n" +--}}
    {{--//            "                                  maxlength=\"200\" required=\"required\"></textarea></div>";--}}
    {{--//    }--}}
    {{--//--}}
    {{--//    function feedback3() {--}}
    {{--//--}}
    {{--//        document.getElementById("feedbackType").innerHTML = "<div id=\"tab1\" class=\"feedback-tabs tab-pane active\" style=\"padding:10px 0px 10px 0px;>\n" +--}}
    {{--//            "                       <input type=\" hidden\" id=\"cat1\" value=\"Question\">\n" +--}}
    {{--//            "                        <textarea style=\"width:100%\"\n" +--}}
    {{--//            "                                  class=\"form-control\" name=\"user_problem\" id=\"feedback1\" rows=\"3\" placeholder=\"Please Enter your Problem Here!\"\n" +--}}
    {{--//            "                                  maxlength=\"200\" required=\"required\"></textarea></div>";--}}
    {{--//    }--}}


    {{--//     Add active class to the current button (highlight it)--}}
    {{--function changeActiveNum() {--}}
        {{--var header = document.getElementById("list");--}}
        {{--var btns = header.getElementsByClassName("btn");--}}
        {{--for (var i = 0; i < btns.length; i++) {--}}
            {{--btns[i].addEventListener("click", function () {--}}
                {{--var current = document.getElementsByClassName("active");--}}
                {{--current[0].className = current[0].className.replace(" active", "");--}}
                {{--this.className += " active";--}}
            {{--});--}}
        {{--}--}}
    {{--}--}}

    {{--function changActive() {--}}
        {{--var ul = document.getElementById('feedback');--}}
        {{--var lists = ul.document.getElementsByClassName("li");--}}
        {{--for (var i = 0; i < lists.length; i++) {--}}
            {{--lists[i].addEventListener("click", function () {--}}
                {{--var current = document.getElementsByClassName("active");--}}
                {{--current[0].className = current[0].className.replace(" active", "");--}}
                {{--this.className += " active";--}}
            {{--})--}}
        {{--}--}}

    {{--}--}}

    {{--function replyBack() {--}}
        {{--var checkBox = document.getElementById("myCheck");--}}
        {{--var text = document.getElementById("text");--}}
        {{--if (checkBox.checked == true) {--}}
            {{--text.style.display = "block";--}}
        {{--} else {--}}
            {{--text.style.display = "none";--}}
        {{--}--}}
    {{--}--}}

    {{--function hide() {--}}
        {{--var x = document.getElementById("form");--}}
        {{--if (x.style.display === "none") {--}}
            {{--x.style.display = "block";--}}
        {{--} else {--}}
            {{--x.style.display = "none";--}}
        {{--}--}}

    {{--}--}}
{{--</script>--}}

@include('admin.partials.script')
</body>
