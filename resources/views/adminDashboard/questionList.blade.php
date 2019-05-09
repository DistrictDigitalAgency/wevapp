@extends('layouts.dashboard')

@section('content')
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    <div class="nav-left-sidebar sidebar-dark">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <img style="    margin: 15px 0px;width: 100%;" src="{{URL::to('/assets/images/wevo.png')}}"/>

                        <li class="nav-divider">
                            WEVO
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('admin.statistics') }}"  aria-expanded="false"  ><i class="fab fa-fw fa-wpforms"></i>Wevo statistics<span class="badge badge-success">6</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.addQuestion') }}"  aria-expanded="false" ><i class="fab fa-fw fa-wpforms"></i>Add question</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.questionList') }}"  aria-expanded="false" ><i class="fab fa-fw fa-wpforms"></i>Questions list</a>
                        </li>


                        <li class="nav-divider">
                            Clients
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.clientStats') }}"  aria-expanded="false" ><i class="fab fa-fw fa-wpforms"></i>Clients statistics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.clientList') }}"  aria-expanded="false" ><i class="fab fa-fw fa-wpforms"></i>Clients list<span class="badge badge-secondary">New</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.launchedCampaigns') }}"  aria-expanded="false" ><i class="fab fa-fw fa-wpforms"></i>Launched campaigns<span class="badge badge-secondary">New</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.questionSuggestions') }}"  aria-expanded="false" ><i class="fab fa-fw fa-wpforms"></i>Question suggestions<span class="badge badge-secondary">New</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.msgRequests') }}"  aria-expanded="false" ><i class="fab fa-fw fa-wpforms"></i>Messages requests<span class="badge badge-secondary">New</span></a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>


    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">



                <div class="row">
                    <div class="col-xl-89 col-lg-9 col-md-9 col-sm-6 col-8">
                        <div class="page-header">
                            <h2 class="pageheader-title">Question list</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.statistics') }}" class="breadcrumb-link">Admin Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Question list</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                        <div class="" id="navbarSupportedContent">
                            <a style="padding-top: 24px;float: right;font-size: 14px;font-weight: 700;text-transform: capitalize;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->

                    <!-- recent orders  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header text-center">Launched by admins</h5>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="text-center border-0">#</th>
                                            <th class="text-center border-0">Question</th>
                                            <th class="text-center border-0">WeCoin amount</th>
                                            <th class="text-center border-0">Answer 1</th>
                                            <th class="text-center border-0">Answer 2</th>
                                            <th class="text-center border-0">Answer 3</th>
                                            <th class="text-center border-0">Answer 4</th>
                                            <th class="text-center border-0">Start Date</th>
                                            <th class="text-center border-0">Finish Date</th>
                                            <th class="text-center border-0">Details</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($questions as $question)
                                            <tr>
                                                <td class="text-center">{{$question->id}}</td>
                                                <td class="text-center">{{$question->content}}</td>
                                                <td class="text-center">{{$question->pointAmount}}</td>
                                                <td class="text-center">{{$question->answer1}}</td>
                                                <td class="text-center">{{$question->answer2}}</td>
                                                <td class="text-center">{{$question->answer3}}</td>
                                                <td class="text-center">{{$question->answer4}}</td>
                                                <td class="text-center">{{$question->startDate}}</td>
                                                <td class="text-center">{{$question->finishDate}}</td>

                                                <td class="text-center"><a href="{{route('admin.question.detail',['id'=>$question->id ])}}" class="btn btn-outline-light btn-block">View Details</a></td>

                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>

                        <div class="card">
                            <h5 class="card-header text-center">Launched by clients</h5>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="text-center border-0">#</th>
                                            <th class="text-center border-0">Question</th>
                                            <th class="text-center border-0">WeCoin amount</th>
                                            <th class="text-center border-0">Answer 1</th>
                                            <th class="text-center border-0">Answer 2</th>
                                            <th class="text-center border-0">Answer 3</th>
                                            <th class="text-center border-0">Answer 4</th>
                                            <th class="text-center border-0">Start Date</th>
                                            <th class="text-center border-0">Finish Date</th>
                                            <th class="text-center border-0">Details</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($clientQuestions as $question)
                                            <tr>
                                                <td class="text-center">{{$question->id}}</td>
                                                <td class="text-center">{{$question->content}}</td>
                                                <td class="text-center">{{$question->pointAmount}}</td>
                                                <td class="text-center">{{$question->answer1}}</td>
                                                <td class="text-center">{{$question->answer2}}</td>
                                                <td class="text-center">{{$question->answer3}}</td>
                                                <td class="text-center">{{$question->answer4}}</td>
                                                <td class="text-center">{{$question->startDate}}</td>
                                                <td class="text-center">{{$question->finishDate}}</td>

                                                <td class="text-center"><a href="{{route('admin.question.detail',['id'=>$question->id ])}}" class="btn btn-outline-light btn-block">View Details</a></td>

                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- ============================================================== -->
                    <!-- end recent orders  -->
                </div>







            </div>
        </div>

@endsection
