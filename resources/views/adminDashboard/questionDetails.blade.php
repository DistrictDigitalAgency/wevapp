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
                            <a class="nav-link" href="{{ route('admin.questionList') }}"  aria-expanded="false" ><i class="fab fa-fw fa-wpforms"></i>Questions list</a>
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
                            <a class="nav-link active" href="{{ route('admin.launchedCampaigns') }}"  aria-expanded="false" ><i class="fab fa-fw fa-wpforms"></i>Launched campaigns<span class="badge badge-secondary">New</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.questionSuggestions') }}"  aria-expanded="false" ><i class="fab fa-fw fa-wpforms"></i>Question suggestions<span class="badge badge-secondary">New</span></a>
                        </li>



                        <li class="nav-divider">
                            Partners
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.partners.show') }}"  aria-expanded="false" ><i class="fab fa-fw fa-wpforms"></i>Manage partners</a>
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
                            <h2 class="pageheader-title">Launched campaigns</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.statistics') }}" class="breadcrumb-link">Admin Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Launched campaigns</li>
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
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="border-3 border-top border-top-primary card text-center">
                            <div class="card-body">
                                <h5 class="text-muted">Question ID</h5>
                                <div class="metric-value d-inline-block">
                                    <h6 class="mb-1">{{$question->id}}</h6>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="border-3 border-top border-top-primary card text-center">
                            <div class="card-body">
                                <h5 class="text-muted">Question content</h5>
                                <div class="metric-value d-inline-block">
                                    <h6 class="mb-1">{{$question->content}}</h6>
                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="border-3 border-top border-top-primary card text-center">
                            <div class="card-body">
                                <h5 class="text-muted">Amount</h5>
                                <div class="metric-value d-inline-block">
                                    <h6 class="mb-1">{{$question->pointAmount}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="border-3 border-top border-top-primary card text-center">
                            <div class="card-body">
                                <h5 class="text-muted">Answer 1</h5>
                                <div class="metric-value d-inline-block">
                                    <h6 class="mb-1">{{$question->answer1}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="border-3 border-top border-top-primary card text-center">
                            <div class="card-body">
                                <h5 class="text-muted">Answer 2</h5>
                                <div class="metric-value d-inline-block">
                                    <h6 class="mb-1">{{$question->answer2}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="border-3 border-top border-top-primary card text-center">
                            <div class="card-body">
                                <h5 class="text-muted">Answer 3</h5>
                                <div class="metric-value d-inline-block">
                                    <h6 class="mb-1">{{$question->answer3}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="border-3 border-top border-top-primary card text-center">
                            <div class="card-body">
                                <h5 class="text-muted">Answer 4</h5>
                                <div class="metric-value d-inline-block">
                                    <h6 class="mb-1">{{$question->answer4}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="border-3 border-top border-top-primary card text-center">
                            <div class="card-body">
                                <h5 class="text-muted">Votes for answer 1</h5>
                                <div class="metric-value d-inline-block">
                                    <h6 class="mb-1">{{$question->nbAnswer1}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="border-3 border-top border-top-primary card text-center">
                            <div class="card-body">
                                <h5 class="text-muted">Votes for answer 2</h5>
                                <div class="metric-value d-inline-block">
                                    <h6 class="mb-1">{{$question->nbAnswer2}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="border-3 border-top border-top-primary card text-center">
                            <div class="card-body">
                                <h5 class="text-muted">Votes for answer 3</h5>
                                <div class="metric-value d-inline-block">
                                    <h6 class="mb-1">{{$question->nbAnswer3}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="border-3 border-top border-top-primary card text-center">
                            <div class="card-body">
                                <h5 class="text-muted">Votes for answer 4</h5>
                                <div class="metric-value d-inline-block">
                                    <h6 class="mb-1">{{$question->nbAnswer4}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>


@endsection