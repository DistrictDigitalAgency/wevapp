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
                            <a class="nav-link active" href="{{ route('dashboard') }}"  aria-expanded="false"  ><i class="fa fa-fw fa-chart-pie"></i>General statistics<span class="badge badge-success">6</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('my_campaigns') }}"  aria-expanded="false" ><i class="fa fa-fw fa-rocket"></i>Launched campaigns</a>
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
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-6 col-8">
                        <div class="page-header">
                            <h2 class="pageheader-title">General statistics</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">General statistics</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12" style="padding-left: 0px;">
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
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                <div class="ecommerce-widget">

                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="border-3 border-top border-top-primary card text-center">
                                <div class="card-body">
                                    <h5 class="text-muted">Launched campaigns</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">{{$launchedCampaigns}}</h1>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="border-3 border-top border-top-primary card text-center">
                                <div class="card-body">
                                    <h5 class="text-muted">Pending campaigns</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">{{$pendingCampaigns}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="border-3 border-top border-top-primary card text-center">
                                <div class="card-body">
                                    <h5 class="text-muted">Running Campaigns</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">{{$runningCampaigns}}</h1>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="border-3 border-top border-top-primary card text-center">
                                <div class="card-body">
                                    <h5 class="text-muted">Finished campaigns</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">{{$finishedCampaigns}}</h1>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- product category  -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- end product category  -->
                        <!-- product sales  -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- end product sales  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- top perfomimg  -->
                            <!-- ============================================================== -->
                            <div class="card">
                                <h5 class="card-header text-center" style="font-size: 15px;">Top Performing Questions</h5>
                                <div class="card-body p-0">
                                    <div class="table-responsive text-center">
                                        <table class="table no-wrap p-table text-center">
                                            <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">Campaign name</th>
                                                <th class="border-0">Question content</th>
                                                <th class="border-0">number of Answers</th>
                                                <th class="border-0">Category</th>
                                                <th class="border-0">Creation date</th>
                                                <th class="border-0">Campaign details</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($questionDatas as $questionData)

                                                <tr>
                                                <td>{{$questionData->name}}</td>
                                                <td>{{$questionData->content}}</td>
                                                <td>{{$questionData->nbAnswers}}</td>
                                                <td>C{{$questionData->name}}</td>
                                                <td>{{$questionData->created_at}} </td>
                                                <td class="text-center"><a href="#" class="btn btn-outline-light btn-block">View Details</a></td>
                                            </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end top perfomimg  -->
                            <!-- ============================================================== -->
                        </div>
                    </div>

                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- sales  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Sales</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">$12099</h1>
                                    </div>
                                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                        <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5.86%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end sales  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- new customer  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">New Customer</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">1245</h1>
                                    </div>
                                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                        <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">10%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end new customer  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- visitor  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Visitor</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">13000</h1>
                                    </div>
                                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                        <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end visitor  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- total orders  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Total Orders</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">1340</h1>
                                    </div>
                                    <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                                        <span class="icon-circle-small icon-box-xs text-danger bg-danger-light bg-danger-light "><i class="fa fa-fw fa-arrow-down"></i></span><span class="ml-1">4%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end total orders  -->
                        <!-- ============================================================== -->
                    </div>
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- total revenue  -->
                        <!-- ============================================================== -->


                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- category revenue  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Revenue by Category</h5>
                                <div class="card-body">
                                    <div id="c3chart_category" style="height: 420px;"></div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end category revenue  -->
                        <!-- ============================================================== -->

                        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header"> Total Revenue</h5>
                                <div class="card-body">
                                    <div id="morris_totalrevenue"></div>
                                </div>
                                <div class="card-footer">
                                    <p class="display-7 font-weight-bold"><span class="text-primary d-inline-block">$26,000</span><span class="text-success float-right">+9.45%</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- social source  -->
                            <!-- ============================================================== -->
                            <div class="card">
                                <h5 class="card-header"> Sales By Social Source</h5>
                                <div class="card-body p-0">
                                    <ul class="social-sales list-group list-group-flush">
                                        <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle facebook-bgcolor mr-2"><i class="fab fa-facebook-f"></i></span><span class="social-sales-name">Facebook</span><span class="social-sales-count text-dark">120 Sales</span>
                                        </li>
                                        <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle twitter-bgcolor mr-2"><i class="fab fa-twitter"></i></span><span class="social-sales-name">Twitter</span><span class="social-sales-count text-dark">99 Sales</span>
                                        </li>
                                        <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle instagram-bgcolor mr-2"><i class="fab fa-instagram"></i></span><span class="social-sales-name">Instagram</span><span class="social-sales-count text-dark">76 Sales</span>
                                        </li>
                                        <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle pinterest-bgcolor mr-2"><i class="fab fa-pinterest-p"></i></span><span class="social-sales-name">Pinterest</span><span class="social-sales-count text-dark">56 Sales</span>
                                        </li>
                                        <li class="list-group-item social-sales-content"><span class="social-sales-icon-circle googleplus-bgcolor mr-2"><i class="fab fa-google-plus-g"></i></span><span class="social-sales-name">Google Plus</span><span class="social-sales-count text-dark">36 Sales</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="#" class="btn-primary-link">View Details</a>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end social source  -->
                            <!-- ============================================================== -->
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- sales traffice source  -->
                            <!-- ============================================================== -->
                            <div class="card">
                                <h5 class="card-header"> Sales By Traffic Source</h5>
                                <div class="card-body p-0">
                                    <ul class="traffic-sales list-group list-group-flush">
                                        <li class="traffic-sales-content list-group-item "><span class="traffic-sales-name">Direct</span><span class="traffic-sales-amount">$4000.00  <span class="icon-circle-small icon-box-xs text-success ml-4 bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1 text-success">5.86%</span></span>
                                        </li>
                                        <li class="traffic-sales-content list-group-item"><span class="traffic-sales-name">Search<span class="traffic-sales-amount">$3123.00  <span class="icon-circle-small icon-box-xs text-success ml-4 bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1 text-success">5.86%</span></span>
                                                </span>
                                        </li>
                                        <li class="traffic-sales-content list-group-item"><span class="traffic-sales-name">Social<span class="traffic-sales-amount ">$3099.00  <span class="icon-circle-small icon-box-xs text-success ml-4 bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1 text-success">5.86%</span></span>
                                                </span>
                                        </li>
                                        <li class="traffic-sales-content list-group-item"><span class="traffic-sales-name">Referrals<span class="traffic-sales-amount ">$2220.00   <span class="icon-circle-small icon-box-xs text-danger ml-4 bg-danger-light"><i class="fa fa-fw fa-arrow-down"></i></span><span class="ml-1 text-danger">4.02%</span></span>
                                                </span>
                                        </li>
                                        <li class="traffic-sales-content list-group-item "><span class="traffic-sales-name">Email<span class="traffic-sales-amount">$1567.00   <span class="icon-circle-small icon-box-xs text-danger ml-4 bg-danger-light"><i class="fa fa-fw fa-arrow-down"></i></span><span class="ml-1 text-danger">3.86%</span></span>
                                                </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="#" class="btn-primary-link">View Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end sales traffice source  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- sales traffic country source  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Sales By Country Traffic Source</h5>
                                <div class="card-body p-0">
                                    <ul class="country-sales list-group list-group-flush">
                                        <li class="country-sales-content list-group-item"><span class="mr-2"><i class="flag-icon flag-icon-us" title="us" id="us"></i> </span>
                                            <span class="">United States</span><span class="float-right text-dark">78%</span>
                                        </li>
                                        <li class="list-group-item country-sales-content"><span class="mr-2"><i class="flag-icon flag-icon-ca" title="ca" id="ca"></i></span><span class="">Canada</span><span class="float-right text-dark">7%</span>
                                        </li>
                                        <li class="list-group-item country-sales-content"><span class="mr-2"><i class="flag-icon flag-icon-ru" title="ru" id="ru"></i></span><span class="">Russia</span><span class="float-right text-dark">4%</span>
                                        </li>
                                        <li class="list-group-item country-sales-content"><span class=" mr-2"><i class="flag-icon flag-icon-in" title="in" id="in"></i></span><span class="">India</span><span class="float-right text-dark">12%</span>
                                        </li>
                                        <li class="list-group-item country-sales-content"><span class=" mr-2"><i class="flag-icon flag-icon-fr" title="fr" id="fr"></i></span><span class="">France</span><span class="float-right text-dark">16%</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="#" class="btn-primary-link">View Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end sales traffice country source  -->
                        <!-- ============================================================== -->
                    </div>
                </div>
            </div>
        </div>
@endsection
