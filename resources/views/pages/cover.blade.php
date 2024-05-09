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
                                <div class="recordingTabs audioRecording active d-flex justify-content-between align-items-center"
                                    id="audiobtn">
                                    <div>
                                        <i class="fas fa-microphone mr-2"></i> Audio Recording
                                    </div>
                                    <div><i class="fas fa-check-circle"></i></div>
                                </div>
                                <div class="recordingTabs videoRecording d-flex justify-content-between align-items-center"
                                    id="videobtn">
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
                                        <div id="editor">{{ $response_exists!==null ?
                                            strip_tags($response_exists['q_answer']):'' }} </div>
                                    </div>
                                </div>
                                <input type="hidden" name="desire" id="contentInput" data-class="desire">
                                <input type="hidden" name="responsetype" value="audio" data-class="desire">
                                <div class="text-right px-3 mt-3 w-100">
                                    <button type="submit" data-class="desire" id="save" class="btn btn-primary" {{
                                        $response_exists!==null ? 'disabled' :'' }}><i
                                            class="fas fa-save mr-2"></i>Save</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div id="videodiv" style="display: none;">
                        <div class="row">
                            <div class="col-md-6">
                                <h2>Preview</h2>
                                <video id="preview" width="160" height="120" autoplay muted></video><br/><br/>
                                <div class="btn-group">
                                    <div id="startButton" class="btn btn-success"> Start </div>
                                    <div id="stopButton" class="btn btn-danger"  style="display:none;"> Stop </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="recorded"  style="display:none">
                                <h2>Recording</h2>
                                <video id="recording" width="160" height="120" controls></video><br/><br/>
                                <a id="downloadButton" class="btn btn-primary" data-url="{{route('videos.store')}}">save</a>
                                <a id="downloadLocalButton" class="btn btn-primary">Download</a>
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
        <a href="javascript:void(0)" class="navBtns" id="nextButton" data-toggle="modal"
            data-target="#exampleModalCenter">Next<i class="fas fa-arrow-right ml-2"></i> </a>
        @endif
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Enter Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>You must enter Page Code to unlock next page.</p>
                <input name="code" type="text" id="pageCode" class="form-control validations"
                    placeholder="Write Code Here...">
                <input name="page_number" type="hidden" id="pageNumber" value="2" class="form-control validations">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitCodeButton">Proceed</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('insertjavascript')

<script>
    let preview = document.getElementById("preview");
    let recording = document.getElementById("recording");
    let startButton = document.getElementById("startButton");
    let stopButton = document.getElementById("stopButton");
    let downloadButton = document.getElementById("downloadButton");
    let logElement = document.getElementById("log");
    let recorded = document.getElementById("recorded");
    let downloadLocalButton = document.getElementById("downloadLocalButton");

    let recordingTimeMS = 5000; //video limit 5 sec
    var localstream;

    window.log = function (msg) {
    //logElement.innerHTML += msg + "\n";
    console.log(msg);
    }

    window.wait = function (delayInMS) {
    return new Promise(resolve => setTimeout(resolve, delayInMS));
    }

    window.startRecording = function (stream, lengthInMS) {
        let recorder = new MediaRecorder(stream);
        let data = [];

        recorder.ondataavailable = event => data.push(event.data);
        recorder.start();
        log(recorder.state + " for " + (lengthInMS / 1000) + " seconds...");

        let stopped = new Promise((resolve, reject) => {
            recorder.onstop = resolve;
            recorder.onerror = event => reject(event.name);
        });

        let recorded = wait(lengthInMS).then(
            () => recorder.state == "recording" && recorder.stop()
        );

        return Promise.all([
            stopped,
            recorded
            ])
        .then(() => data);
    }

    window.stop = function (stream) {
        stream.getTracks().forEach(track => track.stop());
    }
    var formData = new FormData();
    if (startButton) {
        startButton.addEventListener("click", function () {
            startButton.innerHTML = "recording...";
            recorded.style.display = "none";
            stopButton.style.display = "inline-block";
            downloadButton.innerHTML = "rendering..";
            navigator.mediaDevices.getUserMedia({
                video: true,
                audio: false
            }).then(stream => {
                preview.srcObject = stream;
                localstream = stream;
                //downloadButton.href = stream;
                preview.captureStream = preview.captureStream || preview.mozCaptureStream;
                return new Promise(resolve => preview.onplaying = resolve);
            }).then(() => startRecording(preview.captureStream(), recordingTimeMS))
            .then(recordedChunks => {
                let recordedBlob = new Blob(recordedChunks, {
                type: "video/webm"
                });
                recording.src = URL.createObjectURL(recordedBlob);

                formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                formData.append('video', recordedBlob);

                downloadLocalButton.href = recording.src;
                downloadLocalButton.download = "RecordedVideo.webm";
                log("Successfully recorded " + recordedBlob.size + " bytes of " +
                recordedBlob.type + " media.");
                startButton.innerHTML = "Start";
                stopButton.style.display = "none";
                recorded.style.display = "block";
                downloadButton.innerHTML = "Save";
                localstream.getTracks()[0].stop();
            })
            .catch(log);
        }, false);
    }
    if (downloadButton) {
        downloadButton.addEventListener("click", function () {
            $.ajax({
            url: this.getAttribute('data-url'),
            method: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (res) {
                if(res.success){
                    location.reload();
                }
            }
            });
        }, false);
    }
    if (stopButton) {
        stopButton.addEventListener("click", function () {
            stop(preview.srcObject);
            startButton.innerHTML = "Start";
            stopButton.style.display = "none";
            recorded.style.display = "block";
            downloadButton.innerHTML = "Save";
            localstream.getTracks()[0].stop();
        }, false);
    }
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
@endsection