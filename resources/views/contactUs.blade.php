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
                            <a class="nav-link" href="{{ route('my_campaigns') }}"  aria-expanded="false" ><i class="fa fa-fw fa-rocket"></i>Launched Campaigns</a>
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
                            <a class="nav-link active" href="{{ route('client.contact') }}"  aria-expanded="false" ><i class="fas fa-fw fa-envelope"></i>Contact us <span class="badge badge-secondary">New</span></a>
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
                            <h2 class="pageheader-title">Contact us</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Contact us</li>
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

                    <div class="col-md-12" style="background-color: #fff;">
                            <form id="regForm" action="{{url('/dashboard/contact_us/send')}}" method="post">
                            {{ csrf_field() }}
                                    <input name="name" id="name" required type="text" placeholder="Your name" class="campaign_form form-control">
                                    <input name="email" id="email" required type="text" placeholder="Your email" class="campaign_form form-control">
                                    <textarea name="content" id="content" placeholder="Your message" class="campaign_form form-control"  rows="5" required></textarea>


                                <button class="btn btn-outline-light btn-block" type="submit"><i class="fas fa-plus-circle"></i> Send </button>
                            </form>
                    </div>




                </div>


            </div>
        </div>

@endsection
