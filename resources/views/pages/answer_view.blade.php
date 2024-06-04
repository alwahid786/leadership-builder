@extends('layouts.default-layout')
@section('content')
<style>
    body {
        background-color: #F0F0F0;
    }

    @media screen and (max-width: 991px) {
        .responsive-mobile-navbar {
            height: 100vh;
            overflow-y: scroll;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
        }
    }

    @media (min-width: 992px) {
        .navbar-collapse {
            padding-left: 15% !important;
        }

        .navbar-header-right-section {
            padding-right: 70px;
        }
    }

    .navbar-expand-lg .sidenav {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
    }

    .navbar-toggler i {
        color: #003f77;
    }

    .navBtns {
        border: 1px solid #6dabe4;
        padding: 5px 0px;
        border-radius: 5px;
        width: 150px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .buttonSection a:hover {
        background-color: #6dabe4;
        color: white;
    }

    .startBtn {
        background-color: #6dabe4;
        border-radius: 5px;
        padding: 5px 15px;
        border: none;
        color: white;
    }

    .stopBtn {
        background-color: #ce2c2c;
        border-radius: 5px;
        padding: 5px 15px;
        border: none;
        color: white;
    }

    .resetBtn {
        background-color: #2cb0ce;
        border-radius: 5px;
        padding: 5px 15px;
        border: none;
        color: white;
    }

    #pageCode::placeholder {
        /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: gray !important;
        opacity: 1 !important;
        /* Firefox */
    }
</style>
{{-- @dd($response_exists['today']); --}}

@include('includes.navbar-dash')
<section class="contentSection position-relative">
    <div class="container-fluid contentRow">
        <div class="row">
            <div class="col-12">
                <div class="quotation-card day-card">
                    <h2>Quote of the Day {{$response_exists['day']}}</h2>
                    <div class="d-flex align-items-center">
                        <q>{{$question['quotation']}},</q>
                        <b class="px-2">-</b>
                        <em>{{$question['author']}}</em>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="question-card day-card">
                    <h2>Question of the Day {{$response_exists['day']}}</h2>
                    <div class="d-flex align-items-center">
                        <q>{{$question['question']}}</q>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="day-card answer-card">
                    <div class="d-flex justify-content-between align-content-center">
                        <div>
                            <input type="hidden" id="responsetypesave" value="{{$response_exists['response_type']}}">
                            <div id="audioheading" class="{{$response_exists['response_type']==null||$response_exists['response_type']=='audio' ? '':'d-none'}}">
                                <h2 id="recordingHeader">Audio</h2>
                                <p class="recordingTagline">Text Response.</p>
                            </div>
                            <div id="videoheading" class="{{$response_exists['response_type']=='video'?'':'d-none'}}">
                                <h2 id="recordingHeader">Video</h2>
                                <p class="recordingTagline">Response.</p>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex align-items-center" style="gap:8px">
                                <div class="recordingTabs audioRecording {{ $response_exists['response_type']==null||$response_exists['response_type']=='audio' ? 'active' : ''}} d-flex justify-content-between align-items-center" id="audiobtn" onclick="selectAudio()">
                                    <div>
                                        <i class="fas fa-microphone mr-2"></i> Audio Response
                                    </div>
                                    <div><i id="audiocheck" class="fas fa-check-circle {{ $response_exists['response_type']==null||$response_exists['response_type']=='audio' ? '' : 'd-none'}}"></i></div>
                                </div>
                                <div class="recordingTabs videoRecording {{ $response_exists['response_type']=='video' ? 'active' : ''}} d-flex justify-content-between align-items-center" id="videobtn" onclick="selectVideo()">
                                    <div>
                                        <i class="fas fa-video mr-2"></i> Video Response
                                    </div>
                                    <div><i id="videocheck" class="fas fa-check-circle {{$response_exists['response_type']=='video' ? '' : 'd-none'}}"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @if ($response_exists['response_type']===null) --}}
                    <div id="audiodiv">
                        {{-- <form action="{{route('submitresponse')}}" id="desireForm" method="POST"> --}}
                            {{-- @csrf --}}
                            <div class="row">
                                <div class="col-12 mt-3">
                                    <div class="mt-3">
                                            <textarea cols="30" rows="22" class="form-control">{{$response_exists['response_type']===null?'':html_entity_decode(strip_tags($response_exists['q_answer']), ENT_QUOTES | ENT_HTML5, 'UTF-8');}}</textarea>
                                    </div>
                                </div>
                            </div>
                        {{-- </form> --}}
                    </div>

                    <div id="videodiv" class="d-none">
                        <div class="video-container">
                            <video id="videoElement" autoplay playsinline class="{{$response_exists['response_type']=='video' ? 'd-none':''}}"></video>
                            <video id="videoElement1" controls height="100%" style="width:100%; object-fit:cover; border-radius: 15px;">
                                <source src="{{ asset('storage/videos/' . $response_exists['video_url']) }}" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('insertjavascript')


@if(session()->has('responseSuccess'))
<script>
    Swal.fire({
        title: 'Success',
        text: `{{ session('responseSuccess') }}`,
        icon: 'success',
        confirmButtonColor: "#6dabe4"
    })
</script>
@endif
@if(session()->has('nextError'))
<script>
    Swal.fire({
        title: 'Error',
        text: `{{ session('nextError') }}`,
        icon: 'error',
        confirmButtonColor: "#6dabe4"
    })
</script>
@endif
<script src="{{asset('assets/js/voice-recognition.js')}}"></script>
<script>
    
    $(document).ready(function() {
        var activeTab = document.querySelector('.recordingTabs.active');
        if (activeTab) {
            console.log('Active tab:', activeTab.id); // or any other property you want to log
            activeTab.click();
        } else {
            console.log('No active tab found.');
        }
    });

    function selectAudio() {
        $("#audiodiv").removeClass('d-none');
        $("#videodiv").addClass('d-none');
        $('#audioheading').removeClass('d-none');
        $('#videoheading').addClass('d-none');
        $('.audioRecording').addClass('active');
        $('.videoRecording').removeClass('active');
        $('.audioRecording').find(".fa-check-circle").removeClass('d-none');
        $('.videoRecording').find(".fa-check-circle").addClass('d-none');
        $('.videoRecording').disable();
        console.log('Audio recording selected');
    };

    function selectVideo() {
        $("#videodiv").removeClass('d-none');
        $("#audiodiv").addClass('d-none');
        $('#videoheading').removeClass('d-none');
        $('#audioheading').addClass('d-none');
        $('.videoRecording').addClass('active');
        $('.audioRecording').removeClass('active');
        $('.videoRecording').find(".fa-check-circle").removeClass('d-none');
        $('.audioRecording').find(".fa-check-circle").addClass('d-none');
        console.log('Video recording selected');
    };
</script>

<script>
</script>
@endsection