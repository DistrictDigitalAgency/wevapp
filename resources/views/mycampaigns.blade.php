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
                            Menu
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('dashboard') }}"  aria-expanded="false"  ><i class="fa fa-fw fa-chart-pie"></i>General statistics<span class="badge badge-success">6</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('my_campaigns') }}"  aria-expanded="false" ><i class="fa fa-fw fa-rocket"></i>Launched Campaigns</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('launch_campaign') }}"  aria-expanded="false" ><i class="fa fa-fw fa-plus-circle"></i>Launch a new campaign</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('client.deposit') }}"  aria-expanded="false" ><i class="fas fa-fw fa-clipboard"></i>Deposit</a>
                        </li>

                        <li class="nav-divider">
                            wevo
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('client.aboutus') }}"  aria-expanded="false" ><i class="fas fa-fw fa-exclamation-circle"></i> About us </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('client.contact') }}"  aria-expanded="false" ><i class="fas fa-fw fa-envelope"></i>Contact us <span class="badge badge-secondary">New</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('client.terms') }}"  aria-expanded="false" ><i class="fab fa-fw fa-wpforms"></i>Terms & conditions <span class="badge badge-secondary">New</span></a>
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
                            <h2 class="pageheader-title">Launched Campaigns</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Launched Campaigns</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                        <div class="" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto navbar-right-top" style="display: -webkit-box;">

                                <li class="nav-item">
                                    <a id="navbarDropdown" class="nav-link" href="#" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Amount: <span style="font-weight: bold;">{{ Auth::user()->amount }}TND </span> <span class="caret"></span>
                                    </a>

                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class=" col-sm-12 col-md-12 col-lg-12 text-md-right">
                        <a href="{{ route('launch_campaign') }}" class="launchcampaign btn btn-rounded btn-primary">Launch a new campaign</a>
                    </div>
                </div>

                <div class="ecommerce-widget">


                    <div class="row">

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="text-center border-0">#</th>
                                                <th class="text-center border-0">Campaign Name</th>
                                                <th class="text-center border-0">Campaign ID</th>
                                                <th class="text-center border-0">Number of Questions</th>
                                                <th class="text-center border-0">Campaign Price</th>
                                                <th class="text-center border-0">Start Date</th>
                                                <th class="text-center border-0">Finish Date</th>
                                                <th class="text-center border-0">Status</th>
                                                <th class="text-center border-0">Details</th>

                                            </tr>
                                            </thead>
                                            <tbody>

                                         @foreach($campaigns as $campaign)
                                            <tr>
                                                <td></td>
                                                <td class="text-center">{{$campaign->name}}</td>
                                                <td class="text-center">{{$campaign->id}}</td>
                                                <td class="text-center">{{$campaign->nbQuestions}}</td>
                                                <td class="text-center">{{$campaign->questionsTotalAmount}}</td>
                                                <td class="text-center">{{$campaign->startDate}}</td>
                                                <td class="text-center">{{$campaign->finishDate}}</td>
                                                @if ($campaign->activeCampaign==0)
                                                <td class="text-center"><span class="badge-dot badge-primary mr-1"></span>Not confirmed yet</td>
                                                @elseif ($campaign->activeCampaign==1)
                                                    <td class="text-center"><span class="badge-dot badge-success mr-1"></span>Confirmed</td>
                                                @elseif ($campaign->activeCampaign==2)
                                                    <td class="text-center"><span class="badge-dot badge-brand mr-1"></span>In transit</td>
                                                @elseif ($campaign->activeCampaign==3)
                                                    <td class="text-center"><span class="badge-dot badge-success mr-1"></span>Delivered</td>
                                                @elseif ($campaign->activeCampaign==4)
                                                    <td class="text-center"><span class="badge-dot badge-danger mr-1"></span>Stopped</td>
                                                @endif

                                                <td class="text-center"><a href="{{route('campaign.detail',['id'=>$campaign->id ])}}" class="btn btn-outline-light btn-block">View Details</a></td>

                                            </tr>
                                         @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection
