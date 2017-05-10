@extends('app')

@section('content')
<br>
            <section class="content-header">
                <h1>
                    Account Settings
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Account Settings</li>
                </ol>
			</section>
            <section class="content">
						<div class="row">
                            <form role="form" class="form-horizontal">
	                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="col-lg-6 col-xs-6" id="email-form">
                                    <Label for="email">EMAIL* <input type="email" class="form-control" name="email" id="email" required></Label> <span id="user-result"></span>   
                                </div>
                                <div class="col-lg-6 col-xs-6">
                                    <p>CURRENT PASSWORD* </p><input type="textbox" class="form-control" id="curpass" name="curpass">
                                </div>
                                <div class="col-lg-6 col-xs-6">
                                    <p>NEW PASSWORD* </p><input type="textbox" class="form-control" id="newpass" name="newpass">
                                </div>
                                <div class="col-lg-6 col-xs-6">
                                    <p>CONFIRM PASSWORD* </p><input type="textbox" class="form-control" id="confirmpass" name="confirmpass">
                                </div>
                                
                                <div class="col-lg-12 col-xs-5">
                                <br />
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">SUBMIT</button>
                                </div>
                            </form>
                        </div>
            </section>

@endsection