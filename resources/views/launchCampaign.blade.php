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
                            <a class="nav-link" href="{{ route('my_campaigns') }}"  aria-expanded="false" ><i class="fa fa-fw fa-rocket"></i>Launched campaigns</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('launch_campaign') }}"  aria-expanded="false" ><i class="fa fa-fw fa-plus-circle"></i>Launch a new campaign</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"  aria-expanded="false" ><i class="fas fa-fw fa-clipboard"></i>Invoices</a>
                        </li>

                        <li class="nav-divider">
                            WeVote
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"  aria-expanded="false" ><i class="fas fa-fw fa-exclamation-circle"></i> About us </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"  aria-expanded="false" ><i class="fas fa-fw fa-envelope"></i>Contact us <span class="badge badge-secondary">New</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"  aria-expanded="false" ><i class="fab fa-fw fa-wpforms"></i>Terms & conditions <span class="badge badge-secondary">New</span></a>
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
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-6 col-8">
                        <div class="page-header">
                            <h2 class="pageheader-title">Launch a new campaign</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Launch a new campaign</li>
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

                <div class="ecommerce-widget">


                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Campaign details</h5>
                            <div class="card-body">
                                <form id="regForm" action="{{route('campaign.store')}}" method="post">
                                    {{ csrf_field() }}
                                   <!--Step one-->
                                    <div class="tab">
                                        <div class="form-row">
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 mb-2">
                                                <div class="form-campaign-label">
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 mb-2">
                                                <div class="form-campaign-label">
                                                    <input required="" name="inputCampaignName" id="inputCampaignName" type="text" placeholder="what is your campaign name ?" class="campaign_form form-control" >
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 mb-2">
                                                <div class="form-campaign-label">
                                                    <input required="" name="inputCampaignObjective" id="inputCampaignObjective" type="text" placeholder="what are your campaign objectives ?" class="campaign_form form-control">
                                                </div>
                                            </div>
                                        </div>
                                            <div class="form-row">
                                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 mb-2">
                                                    <div class="form-campaign-label">
                                                        <h5>Select the age range</h5>
                                                    </div>
                                                </div>
                                                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 mb-2">
                                                    <input id="minAge" name="minAge" required="" type="number" min="6" max="100" placeholder="The minimum age you want to target"  class="campaign_form form-control">
                                                </div>
                                                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 mb-2">
                                                    <input id="maxAge" name="maxAge" required="" type="number" min="6" max="100" placeholder="The maximum age you want to target"  class="campaign_form form-control">
                                                </div>
                                            </div>
                                                <div class="form-row">
                                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 mb-2">
                                                        <div class="form-campaign-label">
                                                            <h5>Select the sex desired</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 mb-2">
                                                        <div class="form-campaign-label">
                                                            <label class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" value="both" checked="" name="sexeType" class="custom-control-input"><span class="custom-control-label">Both</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 mb-2">
                                                        <div class="form-campaign-label">
                                                            <label class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" value="male" name="sexeType"  class="custom-control-input"><span class="custom-control-label">Male</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 mb-2">
                                                        <div class="form-campaign-label">
                                                            <label class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" value="female" name="sexeType" class="custom-control-input"><span class="custom-control-label">Female</span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                        <div class="form-row">
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 mb-2">
                                                <div class="form-campaign-label">
                                                    <h5>campaign start and finish date</h5>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 mb-2">
                                                <input type="date" name="startDate" required="" class="campaign_form form-control date-inputmask" id="startCampaign" placeholder="">
                                            </div>
                                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 mb-2">
                                                <input type="date" required="" name="finishDate" class="campaign_form form-control date-inputmask" id="endCampaign"  placeholder="">
                                            </div>
                                        </div>
                                    </div>




                                    <!--Step two-->
                                    <div class="tab">
                                        <div class="text-center">
                                            <span>You can enter up to 10 questions per campaign, each question can contain up to 4 answers.<br> Leave answer input empty in case your question contain less then 4 answers.</span>
                                            <hr>
                                        </div>
                                        <h5>Question 1</h5>
                                        <div class="form-row question-div">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                    <input name="questionContent0" required id="inputQuestion" type="text" placeholder="Enter your question.." class="campaign_form form-control">
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

                                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4" >
                                                    <input  name="questionPrice0" id="questionPrice0" onkeyup="getTheReachNumber(this.value,this.id)" required="" type="number"  placeholder="Price per question (TND)"  class="campaign_form form-control">
                                                </div>
                                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2" style="margin: 6px 0px;text-align: center;">
                                                    <span name="questionReach0" id="questionReach0" style="font-size: 12px;"></span>
                                                </div>


                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                                <input name="answer10" id="answer10" onkeyup="answerPreventing(this.id)" required type="text" placeholder="Answer 1" class="campaign_form form-control">
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                                <input name="answer20" id="answer20" onkeyup="answerPreventing(this.id)" required type="text" placeholder="Answer 2" class="campaign_form form-control">
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                                <input name="answer30" id="answer30"  type="text" placeholder="Answer 3" class="campaign_form form-control">
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                                                <input name="answer40" id="answer40"  type="text" placeholder="Answer 4" class="campaign_form form-control">
                                            </div>



                                        </div>



                                        <div class="line-divider"><hr></div>


                                        <div id="addQuestionButton" class="add-question">
                                            <a href="add-new-form"><span class="mr-2">
                                                <i class="fas fa-plus-circle"></i></span><span class="social-sales-name">Add a new Question</span></a>
                                            <span id="campaignTotalReach" name="campaignTotalReach" class="float-right"></span>
                                        </div>

                                        <input class="hidden-div" type="hidden" name="nbQuestion" id="nbQuestion" value="0">


                                        <div class="form-row">

                                            </div>

                                        </div>


                                    <!--Step three-->
                                    <div class="tab">
                                        <div class="table-responsive ">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Campaign name</th>
                                                    <th scope="col">Number of questions</th>
                                                    <th scope="col">Campaign total price</th>
                                                    <th scope="col">Start date</th>
                                                    <th scope="col">End date</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td><span id="campaignName"></span></th>
                                                    <td><span id="nbQuestions"></span></td>
                                                    <td><span id="totalCampaignPrice"></span></td>
                                                    <td><span id="startDate"></span></td>
                                                    <td><span id="endDate"></span></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!--Step three-->
                                    <!--
                                        <div class="tab" style="text-align: center;">
                                        <h3>Campaign Created!</h3>
                                        <p>we will confirm it and get back to you shortly, keep tracking the updates <a style="color: #0000ff;" href="{{ route('my_campaigns') }} ">here</a> .</p>
                                    </div>
                                     -->


                                    <!-- Buttons prev/next -->
                                    <div style="    margin-top: 50px;overflow:auto;">
                                        <div style="float:right;">
                                            <button style="padding: 5px 50px;" class="btn btn-rounded btn-light" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                            <button style="padding: 5px 50px;" class="btn btn-rounded btn-light" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                        </div>
                                    </div>
                                    <!-- Circles which indicates the steps of the form: -->
                                    <div style="text-align:center;margin-top:40px;">
                                        <span class="step"></span>
                                        <span class="step"></span>
                                        <span class="step"></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                     </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
