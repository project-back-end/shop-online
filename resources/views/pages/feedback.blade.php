@include('admin.partials.head')
<body class="si-body si-body-feedback">
<div class="container">
    <div class="row">
        <div id="form" class="col-md-6 offset-3 feedback">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h4 class="feedbackLine1">Hello! We'd love to hear your thoughts about our website</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/feedback" method="post">
                        @csrf
                        <div class="form-inline socialintents-rows">
                            <p class="si-smalltext feedbackRatings">1. How likely would you be to recommend us to your
                                friends?</p>
                            <div class='switcher'>
                                <div class='switcher-item'>
                                    <input id='one' name='switcher' type='radio' value="1">
                                    <label for='one'>1</label>
                                </div>
                                <div class='switcher-item'>
                                    <input id='two' name='switcher' type='radio' value="2">
                                    <label for='two'>2</label>
                                </div>
                                <div class='switcher-item'>
                                    <input id='three' name='switcher' type='radio' value="3">
                                    <label for='three'>3</label>
                                </div>
                                <div class='switcher-item'>
                                    <input id='four' name='switcher' type='radio' value="4">
                                    <label for='four'>4</label>
                                </div>
                                <div class='switcher-item'>
                                    <input id='five' name='switcher' type='radio' value="5">
                                    <label for='five'>5</label>
                                </div>
                                <div class='switcher-item'>
                                    <input id='six' name='switcher' type='radio' value="6">
                                    <label for='six'>6</label>
                                </div>
                                <div class='switcher-item'>
                                    <input id='seven' name='switcher' type='radio' value="7">
                                    <label for='seven'>7</label>
                                </div>
                                <div class='switcher-item'>
                                    <input id='eight' name='switcher' type='radio' value="8">
                                    <label for='eight'>8</label>
                                </div>
                                <div class='switcher-item'>
                                    <input id='nine' name='switcher' type='radio' value="9">
                                    <label for='nine'>9</label>
                                </div>
                                <div class='switcher-item'>
                                    <input id='ten' name='switcher' type='radio' value="10">
                                    <label for='ten'>10</label>
                                </div>
                            </div>
                            <div style="padding-top:10px;">
                                <p class="si-smalltext feedbackLine2">2. How can we improve our website? Do you have
                                    ideas, questions, or need help? Let us know.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <ul class="nav nav-tabs card-header-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="question"
                                                   onclick="getMyID(this.id)">Question</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="idea" onclick="getMyID(this.id)">Idea</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="problem" onclick="getMyID(this.id)">Problem</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div id="question_show">
                                            <div class="form-group">
                                                <textarea style="" name="question" id="quesion" cols="30" rows="5"
                                                          class="form-control" placeholder="Please enter your question" required></textarea>
                                            </div>
                                        </div>
                                        <div id="idea_show" style="display: none">
                                            <div class="form-group">
                                                <textarea name="idea" id="idea" cols="30" rows="5" class="form-control" placeholder="Please enter your idea" ></textarea>
                                            </div>
                                        </div>
                                        <div id="problem_show" style="display: none">
                                            <div class="form-group">
                                                <textarea name="problem" id="problem" cols="30" rows="5"
                                                          class="form-control" placeholder="Please enter your problem" ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="" style="padding-top:5px;padding-bottom:5px;">
                                    <button id="feedbackBtn" type="submit" class="btn btn-primary float-right">Send
                                        Feedback
                                    </button>
                                    <input type="checkbox" id="myCheck" onclick="replyBack()">Want us reply
                                    back?</input>
                                    <div id="text" style="display:none">
                                        <p>Please Kindly give me your email</p>
                                        <input style="outline: none; width: 100%" name="userEmail" type="text"
                                               placeholder="your email">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function getMyID(id) {
        console.log(id)
        if (id === 'question') {
            $("#question_show").show();
            $("#idea_show").hide();
            $("#problem_show").hide();
        } else if (id === 'idea') {
            $("#question_show").hide();
            $("#idea_show").show();
            $("#problem_show").hide();
        }
        else {
            $("#question_show").hide();
            $("#idea_show").hide();
            $("#problem_show").show();
        }
    }

</script>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>
    $(document).ready(function () {
        $('ul li a').click(function () {
            $('li a').removeClass("active");
            $(this).addClass("active");
        });
    });
</script>
<script>
    function replyBack() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("text");
    if (checkBox.checked == true) {
    text.style.display = "block";
    } else {
    text.style.display = "none";
    }
    }
</script>



</body>
