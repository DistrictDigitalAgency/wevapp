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
                            <a class="nav-link active" href="{{ route('admin.addQuestion') }}"  aria-expanded="false" ><i class="fab fa-fw fa-wpforms"></i>Add question</a>
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
                            <a class="nav-link" href="{{ route('admin.launchedCampaigns') }}"  aria-expanded="false" ><i class="fab fa-fw fa-wpforms"></i>Launched campaigns<span class="badge badge-secondary">New</span></a>
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
                            <h2 class="pageheader-title">Add a question</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.statistics') }}" class="breadcrumb-link">Admin Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Add a question</li>
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

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div style="display:block;" class="card-header">
                                <h5 style="float:left;">Add / Import questions</h5>
                                <a style="float:right;color: #1abc9c;font-size: 14px;" href=""><i class="fas fa-file-code"></i> Import CSV</a>
                            </div>
                            <div class="card-body">
                                <form id="regForm" action="{{ route('admin.addQuestion') }}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-row question-div">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <input name="questionContent" required id="inputQuestion" type="text" placeholder="Enter your question.." class="campaign_form form-control">
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6">
                                    <select class="campaign_form form-control" id="categorySelect" name="categorySelect">
                                        <option value="" disabled selected>Select Category</option>
                                        <option value="1">Culture</option>
                                        <option value="2">High-Tech</option>
                                        <option value="3">Politics</option>
                                        <option value="4">Economics</option>
                                        <option value="5">Social</option>
                                        <option value="6">Sport</option>
                                        <option value="7">Art</option>
                                    </select>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                                    <input name="weCoinAmount" required id="weCoinInput" type="text" placeholder="WeCoin amount" class="campaign_form form-control">
                                </div>

                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                                    <input type="date" name="startDate" required="" class="campaign_form form-control date-inputmask" id="startCampaign" placeholder="Start date">
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 ">
                                    <input type="date" required="" name="finishDate" class="campaign_form form-control date-inputmask" id="endCampaign"  placeholder="Finish date">
                                </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                        <input name="answer1" id="answer1" required type="text" placeholder="Answer 1" class="campaign_form form-control">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                        <input name="answer2" id="answer2" required type="text" placeholder="Answer 2" class="campaign_form form-control">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                        <input name="answer3" id="answer3" type="text" placeholder="Answer 3" class="campaign_form form-control">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                        <input name="answer4" id="answer4" type="text" placeholder="Answer 4" class="campaign_form form-control">
                                    </div>


                                    <button class="btn btn-outline-light btn-block" type="submit"><i class="fas fa-plus-circle"></i> Add question </button>



                                </div>

                            </div>

                        </div>
                    </div>
                </div>







            </div>
        </div>

@endsection
