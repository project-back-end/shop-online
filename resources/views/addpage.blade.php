@include('admin.partials.head')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-2">
            <h4>Add New Page</h4>
            <form>
                <div class=" row">
                    {{--right side--}}
                    <div class="col-sm-8">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="pagename" placeholder="Enter Title Here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <input type="button" class="form-control" value="Add Media">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Send User Notification</label>
                            <div class="col-sm-8">
                                <input type="checkbox"  id="notification" value="yes" >
                                <span >Send the new user the email about their account</span>
                            </div>
                        </div>
                    </div>
                    {{--left side--}}
                    <div class="col-md-4">
                        <div class="card ">
                            <div class="card-header">
                                <p>Publish</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>