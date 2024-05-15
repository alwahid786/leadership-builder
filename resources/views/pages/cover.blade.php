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
@include('includes.navbar')
<section class="contentSection position-relative">
    <div class="container-fluid contentRow">
        <div class="row">
            <div class="col-12">
                <div class="quotation-card day-card">
                    <h2>Quote of the Day!</h2>
                    <div class="d-flex align-items-center">
                        <q>Your time is limited, don't waste it living someone else's dream.</q>
                        <b class="px-2">-</b>
                        <em>Steve Jobs</em>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="question-card day-card">
                    <h2>Question of the Day!</h2>
                    <div class="d-flex align-items-center">
                        <q>What's your dream?</q>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="day-card answer-card">
                    <div class="d-flex justify-content-between align-content-center">
                        <div>
                            <div>
                                <h2 id="recordingHeader">Record Audio</h2>
                                <p class="recordingTagline">Record audio to convert to text in the editor below.</p>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex align-items-center" style="gap:8px">
                                <div class="recordingTabs audioRecording active d-flex justify-content-between align-items-center" id="audiobtn">
                                    <div>
                                        <i class="fas fa-microphone mr-2"></i> Audio Recording
                                    </div>
                                    <div><i class="fas fa-check-circle"></i></div>
                                </div>
                                <div class="recordingTabs videoRecording d-flex justify-content-between align-items-center" id="videobtn">
                                    <div>
                                        <i class="fas fa-video mr-2"></i> Video Recording
                                    </div>
                                    <div><i class="fas fa-check-circle d-none"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="audiodiv">
                        <form action="{{route('submitresponse')}}" id="desireForm" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 mt-3">
                                    <div id="controls" class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <button data-class="desire" type="button" id="startBtn1" data-sr_no="1" data-editor_name="editor" class="startBtn">Start Recording</button>
                                            <button data-class="desire" type="button" id="stopBtn1" data-sr_no="1" class="btn-danger stopBtn" style="display: none;">Stop
                                                Recording</button>
                                            <button data-class="desire" type="button" id="resetBtn1" data-sr_no="1" class="btn-danger resetBtn" style="display: none;">Reset Text</button>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="zmdi zmdi-circle mr-2"></i>
                                            <div id="timer1">00:00:00</div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <div id="preview"></div>
                                        <div id="editor">{{ $response_exists!==null ?
                                            strip_tags($response_exists['q_answer']):'' }} </div>
                                    </div>
                                </div>
                                <input type="hidden" name="desire" id="contentInput" data-class="desire">
                                <input type="hidden" name="responsetype" value="audio" data-class="desire">
                                <div class="text-right px-3 mt-3 w-100">
                                    <button type="submit" data-class="desire" id="save" class="btn btn-primary" {{
                                        $response_exists!==null ? 'disabled' :'' }}><i class="fas fa-save mr-2"></i>Save</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div id="videodiv" style="display: none;">
                        <div class="video-container">
                            <video id="videoElement" autoplay playsinline></video>
                            <div class="controls-container py-2 text-center">
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
                            <div class="full-hd">
                                <img src="{{asset('assets/images/hd.png')}}" alt="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="buttonSection d-flex justify-content-end align-items-center mt-5">
        @if(auth()->user()->unlocked_pages >= 2)
        <a href="{{url('/wow/con')}}" class="navBtns">Next<i class="fas fa-arrow-right ml-2"></i> </a>
        @else
        <a href="javascript:void(0)" class="navBtns" id="nextButton" data-toggle="modal" data-target="#exampleModalCenter">Next<i class="fas fa-arrow-right ml-2"></i> </a>
        @endif
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
    $(".recordingTabs").click(function() {
        $(".recordingTabs").removeClass('active');
        $(this).addClass('active');
        $(".fa-check-circle").removeClass('d-none');
        $(".fa-check-circle").addClass('d-none');
        $(this).find(".fa-check-circle").removeClass('d-none');
    });

    $("#audiobtn").click(function() {
        $("#audiodiv").show();
        $("#videodiv").hide();
        $('#recordingHeader').text('Record Audio');
        $('.recordingTagline').text('Record audio to convert to text in the editor below.');
    });
    $("#videobtn").click(function() {
        $("#videodiv").show();
        $("#audiodiv").hide();
        $('#recordingHeader').text('Record Video');
        $('.recordingTagline').text('Record video to save it as the response.');
    });
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
                $("#desireForm")[0].submit();
            } else {
                Swal.fire({
                    title: 'Missing Fields',
                    text: "Some fields are missing!",
                    icon: 'error',
                    confirmButtonColor: "#6dabe4"
                })
            }
        })

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
    // $(document).ready(function() {
    //     let mediaRecorder;
    //     let recordedBlobs;

    //     $(".startRecordingBtn").click(function() {
    //         if (!mediaRecorder) {
    //             startRecording();
    //         }
    //         $(this).toggleClass('d-none');
    //         $('.pauseRecordingBtn').toggleClass('d-none');
    //         $('.stopRecordingBtn').toggleClass('d-none');
    //     });

    //     $(".pauseRecordingBtn").click(function() {
    //         $(this).toggleClass('d-none');
    //         $('.playRecordingBtn').toggleClass('d-none');

    //         pauseRecording();
    //     });

    //     $(".playRecordingBtn").click(function() {
    //         $(this).toggleClass('d-none');
    //         $('.pauseRecordingBtn').toggleClass('d-none');

    //         resumeRecording();
    //     });

    //     $(".stopRecordingBtn").click(function() {
    //         $(this).toggleClass('d-none');
    //         $('.pauseRecordingBtn').addClass('d-none');
    //         $('.playRecordingBtn').addClass('d-none');
    //         $('.startRecordingBtn').removeClass('d-none');

    //         stopRecording();
    //     });

    //     function startRecording() {
    //         // Get user media
    //         navigator.mediaDevices.getUserMedia({
    //                 video: true,
    //                 audio: true
    //             })
    //             .then(function(stream) {
    //                 window.stream = stream;
    //                 let videoElement = document.getElementById('videoElement');
    //                 videoElement.srcObject = stream;
    //             })
    //             .catch(function(err) {
    //                 console.error('getUserMedia error:', err);
    //             });
    //         recordedBlobs = [];
    //         let options = {
    //             mimeType: 'video/webm;codecs=vp9'
    //         };
    //         try {
    //             mediaRecorder = new MediaRecorder(window.stream, options);
    //         } catch (e) {
    //             console.error('Exception while creating MediaRecorder:', e);
    //             return;
    //         }

    //         mediaRecorder.ondataavailable = handleDataAvailable;
    //         mediaRecorder.start();
    //     }

    //     function handleDataAvailable(event) {
    //         if (event.data && event.data.size > 0) {
    //             recordedBlobs.push(event.data);
    //         }
    //     }

    //     function pauseRecording() {
    //         if (mediaRecorder.state === 'recording') {
    //             mediaRecorder.pause();
    //         }
    //     }

    //     function resumeRecording() {
    //         if (mediaRecorder.state === 'paused') {
    //             mediaRecorder.resume();
    //         }
    //     }

    //     function stopRecording() {
    //         mediaRecorder.stop();
    //         mediaRecorder = null;
    //     }


    // });
    $(document).ready(function() {
        let mediaRecorder;
        let recordedBlobs = [];
        let downloadLink = document.createElement('a');

        $(".startRecordingBtn").click(function() {
            // if (!mediaRecorder) {
            //     startRecording();
            // }
            $(this).toggleClass('d-none');
            $('.pauseRecordingBtn').toggleClass('d-none');
            $('.stopRecordingBtn').toggleClass('d-none');
            $(".liveRecording").removeClass('d-none');
        });

        $(".pauseRecordingBtn").click(function() {
            $(this).toggleClass('d-none');
            $('.playRecordingBtn').toggleClass('d-none');
            $(".liveRecording").addClass('d-none');

            pauseRecording();
        });

        $(".playRecordingBtn").click(function() {
            $(this).toggleClass('d-none');
            $('.pauseRecordingBtn').toggleClass('d-none');
            $(".liveRecording").removeClass('d-none');

            resumeRecording();
        });

        $(".stopRecordingBtn").click(function() {
            $(this).toggleClass('d-none');
            $('.pauseRecordingBtn').addClass('d-none');
            $('.playRecordingBtn').addClass('d-none');
            $('.startRecordingBtn').removeClass('d-none');
            $(".liveRecording").addClass('d-none');

            stopRecording();
            downloadRecording();
        });

        function startRecording() {

            recordedBlobs = [];
            let options = {
                mimeType: 'video/webm;codecs=vp9'
            };
            try {
                mediaRecorder = new MediaRecorder(window.stream, options);
            } catch (e) {
                console.error('Exception while creating MediaRecorder:', e);
                return;
            }

            mediaRecorder.ondataavailable = handleDataAvailable;
            mediaRecorder.start();
        }

        function handleDataAvailable(event) {
            if (event.data && event.data.size > 0) {
                recordedBlobs.push(event.data);
            }
        }

        function pauseRecording() {
            if (mediaRecorder.state === 'recording') {
                mediaRecorder.pause();
            }
        }

        function resumeRecording() {
            if (mediaRecorder.state === 'paused') {
                mediaRecorder.resume();
            }
        }

        function stopRecording() {
            if (mediaRecorder && mediaRecorder.state !== 'inactive') {
                mediaRecorder.stop();
                mediaRecorder = null;
            }
        }

        function downloadRecording() {
            const blob = new Blob(recordedBlobs, {
                type: 'video/webm'
            });
            const url = window.URL.createObjectURL(blob);
            downloadLink.href = url;
            downloadLink.download = 'recording.webm';
            downloadLink.click();
            window.URL.revokeObjectURL(url);
        }
        // Get user media
        navigator.mediaDevices.getUserMedia({
                video: true,
                audio: true
            })
            .then(function(stream) {
                window.stream = stream;
                let videoElement = document.getElementById('videoElement');
                videoElement.srcObject = stream;
            })
            .catch(function(err) {
                console.error('getUserMedia error:', err);
            });

    });
</script>
@endsection
