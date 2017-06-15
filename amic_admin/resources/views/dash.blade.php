@extends('app')

@section('content')
<br>
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
			</section>
            <section class="content">
						<div class="row">
                            <div class="col-lg-6 col-xs-6">
                                <p>hello World</p> 
                            </div>
                        </div>
            </section>

@endsection