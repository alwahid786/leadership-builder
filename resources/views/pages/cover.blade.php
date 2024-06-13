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

@include('includes.navbar')
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
                            <div id="audioheading"
                                class="{{$response_exists['response_type']==null||$response_exists['response_type']=='audio' ? '':'d-none'}}">
                                <h2 id="recordingHeader">Record Audio</h2>
                                <p class="recordingTagline">Record audio to convert to text in the editor below.</p>
                            </div>
                            <div id="videoheading" class="{{$response_exists['response_type']=='video'?'':'d-none'}}">
                                <h2 id="recordingHeader">Record Video</h2>
                                <p class="recordingTagline">Record video to save it as the response.</p>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex align-items-center" style="gap:8px">
                                <div class="recordingTabs audioRecording {{ $response_exists['response_type']==null||$response_exists['response_type']=='audio' ? 'active' : ''}}  d-flex justify-content-between align-items-center"
                                    id="audiobtn" onclick="selectAudio()">
                                    <div>
                                        <i class="fas fa-microphone mr-2"></i> Audio Recording
                                    </div>
                                    <div><i
                                            class="fas fa-check-circle {{ $response_exists['response_type']==null||$response_exists['response_type']=='audio' ? '' : 'd-none'}}"></i>
                                    </div>
                                </div>
                                <div class="recordingTabs videoRecording {{ $response_exists['response_type']=='video' ? 'active' : ''}} d-flex justify-content-between align-items-center"
                                    id="videobtn" onclick="selectVideo()">
                                    <div>
                                        <i class="fas fa-video mr-2"></i> Video Recording
                                    </div>
                                    <div><i
                                            class="fas fa-check-circle {{$response_exists['response_type']=='video' ? '' : 'd-none'}}"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @if ($response_exists['response_type']===null) --}}
                    <div id="audiodiv">
                        <form action="{{route('submitresponse')}}" id="desireForm" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 mt-3">
                                    <div id="controls" class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <button data-class="desire" type="button" id="startBtn1" data-sr_no="1"
                                                data-editor_name="editor" class="startBtn">Start Recording</button>
                                            <button data-class="desire" type="button" id="stopBtn1" data-sr_no="1"
                                                class="btn-danger stopBtn" style="display: none;">Stop
                                                Recording</button>
                                            <button data-class="desire" type="button" id="resetBtn1" data-sr_no="1"
                                                class="btn-danger resetBtn" style="display: none;">Reset Text</button>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="zmdi zmdi-circle mr-2"></i>
                                            <div id="timer1">00:00:00</div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <div id="preview"></div>
                                        <div id="editor">
                                            {{$response_exists['response_type']===null?'':html_entity_decode(strip_tags($response_exists['q_answer']),
                                            ENT_QUOTES | ENT_HTML5, 'UTF-8');}}
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="desire" id="contentInput" data-class="desire">
                                <input type="hidden" name="responsetype" value="audio" data-class="desire">
                                <input type="hidden" name="question_id" value="{{$question['id']}}">
                                <input type="hidden" name="getid" value="{{$response_exists['id']}}">
                                <div class="text-right px-3 mt-3 w-100">
                                    <button type="submit" data-class="desire" id="save"
                                        class="btn btn-primary {{$response_exists['response_type']===null?'':'d-none'}}">
                                        <i class="fas fa-save mr-2"></i>Save</button>
                                    <button type="submit" data-class="desire" id="update"
                                        class="btn btn-success {{$response_exists['response_type']!==null?'':'d-none'}}">
                                        <i class="fas fa-save mr-2"></i>Update and Save</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div id="videodiv" class="d-none">
                        <div class="video-container">
                            <video id="videoElement" autoplay playsinline
                                class="{{$response_exists['response_type']=='video' ? 'd-none':''}}"></video>
                            <video id="videoElement1" controls height="100%"
                                style="width:100%; object-fit:cover; border-radius: 15px;">
                                <source src="{{ asset('storage/videos/'.$response_exists['video_url']) }}"
                                    type="video/mp4">
                            </video>
                            <div
                                class="controls-container py-2 text-center {{$response_exists['response_type']=='video' ? 'd-none':''}}">
                                <h5>To Start Recording, Click the <span class="text-danger">Red</span> circle below</h5>
                                <div class="d-flex align-items-center justify-content-center" style="gap: 15px;">
                                    <div class="startRecordingBtn recordingBtns">
                                        <img src="{{asset('assets/images/start.png')}}" alt="">
                                    </div>
                                    <div class="pauseRecordingBtn recordingBtns d-none">
                                        <img src="{{asset('assets/images/pause.png')}}" alt="">
                                    </div>
                                    <div class="playRecordingBtn recordingBtns d-none">
                                        <img src="{{asset('assets/images/play.png')}}" alt="">
                                    </div>
                                    <div class="stopRecordingBtn recordingBtns d-none">
                                        <img src="{{asset('assets/images/stop.png')}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="liveRecording d-none">
                                <div>
                                    <i class="fas fa-circle text-danger blink"></i>
                                </div>
                                <h4 class="m-0">REC</h4>
                            </div>
                            <div class="full-hd {{$response_exists['response_type']=='video' ? 'd-none':''}}">
                                <img src="{{asset('assets/images/hd.png')}}" alt="">
                            </div>
                            <div
                                class="videotimer text-light {{$response_exists['response_type']=='video' ? 'd-none':''}}">
                                <i class="zmdi zmdi-circle mr-2"></i>
                                <div id="timer2">00:00:00</div>
                            </div>
                            <input type="hidden" name="getid" id="getid" value="{{$response_exists['id']}}">
                            <input type="hidden" name="question_id" id="question_id" value="{{$question['id']}}">
                        </div>
                        <div class="text-right px-3 mt-3 w-100">
                            <button id="retakevideo"
                                class="btn btn-danger {{$response_exists['response_type']=='video' ? '':'d-none'}}">
                                <i class="fas fa-redo mr-2" aria-hidden="true"></i>Retake</button>
                            <button id="savevid"
                                class="btn btn-primary {{$response_exists['response_type']===null ? '':'d-none'}}">
                                <i class="fas fa-save mr-2"></i>Save</button>
                            <button id="updatevid"
                                class="btn btn-success {{$response_exists['response_type']=='video' ? '':'d-none'}}">
                                <i class="fas fa-save mr-2"></i>Update and Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="buttonSection d-flex justify-content-end align-items-center mt-5">
        @if(auth()->user()->unlocked_pages >= 2)
        <a href="{{url('/wow/con')}}" class="navBtns">Next<i class="fas fa-arrow-right ml-2"></i> </a>
        @else
        <a href="javascript:void(0)" class="navBtns" id="nextButton" data-toggle="modal"
            data-target="#exampleModalCenter">Next<i class="fas fa-arrow-right ml-2"></i> </a>
        @endif
    </div> --}}
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
    $(".recordingTabs").click(function() {
        $(".recordingTabs").removeClass('active');
        $(this).addClass('active');
        $(".fa-check-circle").removeClass('d-none');
        $(".fa-check-circle").addClass('d-none');
        $(this).find(".fa-check-circle").removeClass('d-none');
    });

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
        console.log('Audio recording selected');
    };

    function selectVideo() {
        $("#videodiv").removeClass('d-none');
        $("#audiodiv").addClass('d-none');
        $('#videoheading').removeClass('d-none');
        $('#audioheading').addClass('d-none');
        $('#savevid').addClass('d-none');
        console.log('Video recording selected');
    };
</script>

<script>
    // $('.sidenav  li:nth-of-type(1)').addClass('active');
</script>
<script>
    $(document).ready(function() {
        var scrollableDiv = document.getElementById("navAccordion");
        scrollableDiv.scrollTop = scrollableDiv.scrollHeight;

        $("#desireForm").submit(function(e) {
            e.preventDefault();
            validation = validateForm();
            if (validation) {
                var content = CKEDITOR.instances['editor'].getData();
                if (content == '') {
                    Swal.fire({
                        title: 'Empty Data',
                        text: "Please write something in Text Editor to save!",
                        icon: 'error',
                        confirmButtonColor: "#6dabe4"
                    })
                    return;
                }
                $('#contentInput').val(content);

                if (checkType() == 'video') {
                    Swal.fire({
                        text: "Your Video response will be deleted... Are you sure to save this?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: "#6dabe4",
                        cancelButtonColor: "#ce2c2c",
                        confirmButtonText: 'Yes, Save it!',
                        cancelButtonText: 'No, Cancel it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $("#desireForm")[0].submit();
                        }
                    })
                } else {
                    $("#desireForm")[0].submit();
                }
            } else {
                Swal.fire({
                    title: 'Missing Fields',
                    text: "Some fields are missing!",
                    icon: 'error',
                    confirmButtonColor: "#6dabe4"
                })
            }
        });

        function validateForm() {
            let errorCount = 0;
            $("form#desireForm :input").each(function() {
                let val = $(this).val();
                if (val == '' && $(this).attr('data-class') !== 'desire') {
                    errorCount++
                    $(this).css('border', '1px solid red');
                } else {
                    $(this).css('border', 'none');
                }
            });
            if (errorCount > 0) {
                return false;
            }
            return true;
        }
        let pageErrors = 0;
        $("#submitCodeButton").click(function() {
            $(".validations").each(function() {
                if ($(this).val() == '') {
                    pageErrors++;
                    $(this).css('border', '1px solid red');
                } else {
                    $(this).css('border', '1px solid var(--blue)');
                }
            })
            if (pageErrors > 0) {
                Swal.fire({
                    title: 'Empty Fields',
                    text: 'You must Enter Code.',
                    icon: 'error',
                    confirmButtonColor: "#6dabe4"
                })
                pageErrors--;
                return;
            }
            var data = {
                code: $('#pageCode').val(),
                page_number: $('#pageNumber').val(),
            }

            // Ajax REQUEST START
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: `{{url('/validatePageCode')}}`,
                type: "POST",
                data: data,
                cache: false,
                success: function(dataResult) {
                    if (dataResult.success == false) {
                        Swal.fire({
                            title: 'Error',
                            text: dataResult.message,
                            icon: 'error',
                            confirmButtonColor: "#6dabe4"
                        })
                        return;
                    } else {
                        window.location.href = `{{url('/wow/con')}}`
                    }
                },
                error: function(jqXHR, exception) {
                    Swal.fire({
                        title: 'Validation Error',
                        text: jqXHR.responseJSON.message,
                        icon: 'error',
                        confirmButtonColor: "#6dabe4"
                    })
                }
            });
            // Ajax REQUEST END
        });
    });
</script>
<script>
    $(document).ready(function() {
        let mediaRecorder = null;
        let recordedBlobs = [];
        let downloadLink = document.createElement('a');

        let startTime;
        let elapsedTime = 0;
        let timerInterval;
        let running = false;

        function startTimer(id) {
            if (!running) {
                startTime = Date.now() - elapsedTime;
                timerInterval = setInterval(() => updateTimer(id), 1000);
                running = true;
            }
        }

        function pauseTimer() {
            if (running) {
                clearInterval(timerInterval);
                elapsedTime = Date.now() - startTime;
                running = false;
            }
        }

        function resumeTimer(id) {
            if (!running) {
                startTime = Date.now() - elapsedTime;
                timerInterval = setInterval(() => updateTimer(id), 1000);
                running = true;
            }
        }

        function stopTimer() {
            if (running) {
                clearInterval(timerInterval);
                elapsedTime = Date.now() - startTime;
                running = false;
            }
        }

        function resetTimer(id) {
            clearInterval(timerInterval);
            elapsedTime = 0;
            running = false;
            document.getElementById('timer' + id).innerHTML = '00:00:00';
        }

        function updateTimer(id) {
            let currentTime = Date.now();
            let elapsedTime = currentTime - startTime;

            let seconds = Math.floor(elapsedTime / 1000) % 60;
            let minutes = Math.floor(elapsedTime / (1000 * 60)) % 60;
            let hours = Math.floor(elapsedTime / (1000 * 60 * 60)) % 24;

            document.getElementById('timer' + id).innerHTML = formatTime(hours) + ':' + formatTime(minutes) + ':' + formatTime(seconds);
        }

        function formatTime(time) {
            return (time < 10 ? '0' : '') + time;
        }

        $(".startRecordingBtn").click(function() {
            $(this).toggleClass('d-none');
            $('.pauseRecordingBtn').toggleClass('d-none');
            $('.stopRecordingBtn').toggleClass('d-none');
            $(".liveRecording").removeClass('d-none');
            $('#videoElement').removeClass('d-none');
            camOn();

            setTimeout(function() {
                if (!mediaRecorder) {
                    startRecording();
                    let timer = document.getElementById('timer2');
                    timer.innerHTML = '00:00:00';
                    startTimer(2);
                }
            }, 2000);

            // startRecording();
        });

        $(".pauseRecordingBtn").click(function() {
            $(this).toggleClass('d-none');
            $('.playRecordingBtn').toggleClass('d-none');
            $(".liveRecording").addClass('d-none');

            pauseRecording();
            pauseTimer();
        });

        $(".playRecordingBtn").click(function() {
            $(this).toggleClass('d-none');
            $('.pauseRecordingBtn').toggleClass('d-none');
            $(".liveRecording").removeClass('d-none');

            resumeRecording();
            resumeTimer(2);
        });

        $(".stopRecordingBtn").click(function() {
            $(this).toggleClass('d-none');
            $('.pauseRecordingBtn').addClass('d-none');
            $('.playRecordingBtn').addClass('d-none');
            $('.startRecordingBtn').removeClass('d-none');
            $(".liveRecording").addClass('d-none');
            $('.full-hd').addClass('d-none');
            $('.controls-container').addClass('d-none');
            $('#videoElement').addClass('d-none');
            $('#videoElement1').removeClass('d-none');
            $('#retakevideo').removeClass('d-none');
            $('#timer2').addClass('d-none');
            
            if (($('#getid').val() == 0) || ($('#getid').val() == '')) {
                $('#savevid').removeClass('d-none');
            }
            stopTimer();


            stopRecording();
            setTimeout(function() {
                const blob = new Blob(recordedBlobs, {
                    type: 'video/webm'
                });
                console.log('Blob:', recordedBlobs);
                
                const videoURL = window.URL.createObjectURL(blob);
                document.getElementById('videoElement1').src = videoURL;
            }, 1000);
        });

        $("#retakevideo").click(function() {
            $('.startRecordingBtn').removeClass('d-none');
            $('.full-hd').removeClass('d-none');
            $('.controls-container').removeClass('d-none');
            $('#videoElement1').addClass('d-none');
            $('#retakevideo').addClass('d-none');
            $('#timer2').removeClass('d-none');
            $('.videotimer').removeClass('d-none');
            resetTimer(2);

            recordedBlobs = [];
            downloadLink = document.createElement('a');
        });

        $("#savevid").click(function() {
            downloadRecording();
        });

        $("#updatevid").click(function() {
            console.log('Update Recording');
            if (checkType() == 'audio') {
                Swal.fire({
                    text: "Your Audio/Text response will be deleted... Are you sure to save this?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: "#6dabe4",
                    cancelButtonColor: "#ce2c2c",
                    confirmButtonText: 'Yes, Save it!',
                    cancelButtonText: 'No, Cancel it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        UpdateRecording();
                    }
                })
            } else {
                UpdateRecording();
            }
        });

        function startRecording() {
            console.log('Starting recording...');

            let options = {
                mimeType: 'video/webm',
                videoBitsPerSecond: 2500000, // Increase video bitrate (adjust as needed)
                audioBitsPerSecond: 128000 // Increase audio bitrate (adjust as needed)
            };
            try {
                recordedBlobs = [];
                mediaRecorder = new MediaRecorder(window.stream, options);
                console.log('MediaRecorder initialized.');
            } catch (e) {
                console.error('Exception while creating MediaRecorder:', e);
                return;
            }

            mediaRecorder.ondataavailable = handleDataAvailable;
            mediaRecorder.start();
            console.log('Recording started.');
        }

        function handleDataAvailable(event) {
            console.log('Data available:', event.data);
            if (event.data && event.data.size > 0) {
                recordedBlobs.push(event.data);
                console.log('Recorded blobs:', recordedBlobs);
            }
        }

        function pauseRecording() {
            if (mediaRecorder.state === 'recording') {
                mediaRecorder.pause();
            }
            camPause();
        }

        function resumeRecording() {
            camResume();
            if (mediaRecorder.state === 'paused') {
                mediaRecorder.resume();
            }
        }

        function stopRecording() {
            if (mediaRecorder && mediaRecorder.state !== 'inactive') {
                mediaRecorder.stop();
                console.log('Stop to hogya');
                mediaRecorder = null;
                camOff();
            }
        }

        function downloadRecording() {
            // const blob = new Blob(recordedBlobs, { type: 'video/mp4' });
            // console.log('Blob:', blob);
            // const url = window.URL.createObjectURL(blob);
            // downloadLink.href = url;
            // downloadLink.download = 'recording.mp4';
            // downloadLink.click();
            // window.URL.revokeObjectURL(url);

            console.log('Rc', recordedBlobs);
            const blob = new Blob(recordedBlobs, {
                type: 'video/mp4'
            });
            const formData = new FormData();
            formData.append('video', blob, 'recording.mp4');
            formData.append('responsetype', 'video');
            formData.append('question_id', $('#question_id').val());

            console.log('Video saved successfully:', blob);
            fetch(`{{url('/DayResponse/submit')}}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Video saved successfully:', data);
                    Swal.fire({
                        title: 'Success',
                        text: 'Video saved successfully',
                        icon: 'success',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Reload the page
                            location.reload();
                        }
                    });
                })
                .catch(error => {
                    console.error('Error saving video:', error);
                });
        }

        function UpdateRecording() {
            let updateid = $('#getid').val();
            console.log(updateid);
            console.log(updateid);
            console.log(updateid);

            console.log('Rc', recordedBlobs);
            const blob = new Blob(recordedBlobs, {
                type: 'video/mp4'
            });
            const formData = new FormData();
            formData.append('video', blob, 'recording.mp4');
            formData.append('responsetype', 'video');
            formData.append('getid', updateid);

            console.log('Video saved successfully:', blob);
            fetch(`{{url('/DayResponse/submit')}}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Video saved successfully:', data);
                    Swal.fire({
                        title: 'Success',
                        text: 'Video saved successfully',
                        icon: 'success',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Reload the page
                            location.reload();
                        }
                    });
                })
                .catch(error => {
                    console.error('Error saving video:', error);
                });
        }

    });

    function camOn() {
        navigator.mediaDevices.getUserMedia({
            video: true,
            audio: true
        }).then(stream => {
            window.stream = stream;
            document.getElementById('videoElement').srcObject = new MediaStream([stream.getVideoTracks()[0]]);
        }).catch(error => {
            console.error('Error accessing media devices.', error);
        });
    }

    function camOff() {
        if (stream) {
            // Stop all video tracks
            stream.getVideoTracks().forEach(track => track.stop());
            // Stop all audio tracks
            stream.getAudioTracks().forEach(track => track.stop());
        }
    }

    function camPause() {
        if (stream) {
        // Disable all video tracks
        stream.getVideoTracks().forEach(track => track.enabled = false);
        console.log('Video tracks disabled.');
        }
    }

    function camResume() {
        if (stream) {
        // Enable all video tracks
            stream.getVideoTracks().forEach(track => track.enabled = true);
        console.log('Video tracks enabled.');
        }
    }

    function checkType() {
        let type = $('#responsetypesave').val();
        return type;
    }
</script>
@endsection