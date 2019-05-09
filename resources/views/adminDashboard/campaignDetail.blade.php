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
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="border-3 border-top border-top-primary card text-center">
                            <div class="card-body">
                                <h5 class="text-muted">Campaign Name</h5>
                                <div class="metric-value d-inline-block">
                                    <h6 class="mb-1">{{$campaign->name}}</h6>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="border-3 border-top border-top-primary card text-center">
                            <div class="card-body">
                                <h5 class="text-muted">Campaign objectives</h5>
                                <div class="metric-value d-inline-block">
                                    <h6 class="mb-1">{{$campaign->objectives}}</h6>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="border-3 border-top border-top-primary card text-center">
                            <div class="card-body">
                                <h5 class="text-muted">Campaign total amount</h5>
                                <div class="metric-value d-inline-block">
                                    <h6 class="mb-1">{{$campaign->questionsTotalAmount}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="border-3 border-top border-top-primary card text-center">
                            <div class="card-body">
                                <h5 class="text-muted">Status</h5>
                                <div class="metric-value d-inline-block">
                                    @if ($campaign->activeCampaign==0)
                                        <h6 class="mb-1"><span class="badge-dot badge-primary mr-1"></span>Not confirmed yet</h6>
                                    @elseif ($campaign->activeCampaign==1)
                                        <h6 class="mb-1"><span class="badge-dot badge-brand mr-1"></span>In transit</h6>
                                    @elseif ($campaign->activeCampaign==2)
                                        <h6 class="mb-1"><span class="badge-dot badge-success mr-1"></span>Delivered</h6>
                                    @elseif ($campaign->activeCampaign==-1)
                                        <h6 class="mb-1"><span class="badge-dot badge-danger mr-1"></span>Stopped</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="border-3 border-top border-top-primary card text-center">
                            <div class="card-body">
                                <h5 class="text-muted">Campaign date</h5>
                                <div class="metric-value d-inline-block">
                                    <h6 class="mb-1">from {{$campaign->startDate}} to {{$campaign->finishDate}}</h6>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="border-3 border-top border-top-primary card text-center">
                            <div class="card-body">
                                <h5 class="text-muted">Target sex</h5>
                                <div class="metric-value d-inline-block">
                                    <h6 class="mb-1">{{$campaign->desiredSexe}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="border-3 border-top border-top-primary card text-center">
                            <div class="card-body">
                                <h5 class="text-muted">Minimum age</h5>
                                <div class="metric-value d-inline-block">
                                    <h6 class="mb-1">{{$campaign->desiredAgeMin}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="border-3 border-top border-top-primary card text-center">
                            <div class="card-body">
                                <h5 class="text-muted">Maximum age</h5>
                                <div class="metric-value d-inline-block">
                                    <h6 class="mb-1">{{$campaign->desiredAgeMax}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="border-3 border-top border-top-primary card text-center">
                            <div class="card-body">
                                <h5 class="text-muted"># of questions</h5>
                                <div class="metric-value d-inline-block">
                                    <h6 class="mb-1">{{$campaign->nbQuestions}}</h6>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    @for ($i = 0; $i < $nbOfQuestion; $i++)

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                            <div class="card">
                                <h5 class="card-header">Question ID: {{$questions[$i]->id}} with category: {{$questions[$i]->name}} </h5>
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <h5><span style="font-weight: bold;">Question content:</span> {{$questions[$i]->content}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-4">
                            <div class="card">
                                <h5 class="card-header">1st Answer</h5>
                                <div class="card-body">
                                    <h5>{{$questions[$i]->answer1}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-4">
                            <div class="card">
                                <h5 class="card-header">2nd Answer</h5>
                                <div class="card-body">
                                    <h5>{{$questions[$i]->answer2}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-4">
                            <div class="card">
                                <h5 class="card-header">3rd Answer</h5>
                                <div class="card-body">
                                    @if($questions[$i]->answer3=="")
                                        <h5>-</h5>
                                    @else
                                        <h5>{{$questions[$i]->answer3}}</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-4">
                            <div class="card">
                                <h5 class="card-header">4th Answer</h5>
                                <div class="card-body">
                                    @if($questions[$i]->answer4=="")
                                        <h5>-</h5>
                                    @else
                                        <h5>{{$questions[$i]->answer4}}</h5>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Answers vote</h5>
                                <div class="card-body">
                                    {!! $chartForAnswers[$i]->container() !!}
                                </div>
                            </div>
                        </div>

                    @endfor










                </div>



            </div>
        </div>


@endsection


@section('JSincluding')
    {!! $chartForAnswers[0]->script() !!}
    {!! $chartForAnswers[1]->script() !!}
    {!! $chartForAnswers[2]->script() !!}
    {!! $chartForAnswers[3]->script() !!}
    {!! $chartForAnswers[4]->script() !!}
    {!! $chartForAnswers[5]->script() !!}
    {!! $chartForAnswers[6]->script() !!}
    {!! $chartForAnswers[7]->script() !!}
    {!! $chartForAnswers[8]->script() !!}
    {!! $chartForAnswers[9]->script() !!}

@endsection

