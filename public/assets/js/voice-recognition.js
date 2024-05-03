CKEDITOR.replace('editor', {
    height: '400px',
    removePlugins: 'elementspath'
});

// Script For CK Editor Speech Recignition Work 
let recognition;
let transcription = '';
let startBtn = document.getElementById('startBtn');
let stopBtn = document.getElementById('stopBtn');
let resetBtn = document.getElementById('resetBtn');
let editorName = 'editor';

// create a new instance of SpeechRecognition
if (window.SpeechRecognition || window.webkitSpeechRecognition) {
    recognition = new(window.SpeechRecognition || window.webkitSpeechRecognition)();
} else {
    console.log('Speech recognition not supported');
}

// set recognition properties
recognition.continuous = true;
recognition.interimResults = true;
recognition.lang = 'en-US';

// handle result event
recognition.onresult = function(event) {
    transcriptionField = document.getElementById('preview');
    let interimTranscription = '';
    for (let i = event.resultIndex; i < event.results.length; i++) {

        let transcript = event.results[i][0].transcript;
        if (event.results[i].isFinal) {
            var editor = CKEDITOR.instances[editorName];

            // Get the current selection object
            var selection = editor.getSelection();

            // Get the current element where the cursor is blinking
            var element = selection.getStartElement();

            // Insert the text at the cursor position
            // editor.setData('', { selectionStart: element, selectionEnd: element });
            editor.insertText(transcript, element);
            // CKEDITOR.instances.transcription.insertHtml(transcript);
            transcription = '';
        } else {
            interimTranscription += transcript;
        }

        transcriptionField.innerHTML = transcription + interimTranscription;
    }

};

// handle error event
recognition.onerror = function(event) {
    console.log('Error occurred in recognition: ' + event.error);
};

// handle end event
recognition.onend = function() {
    console.log('Recognition ended');
    startBtn.style.display = 'inline-block';
    resetBtn.style.display = 'inline-block';
    stopBtn.style.display = 'none';
};

// add click event listener to start button
$('.startBtn').click(function() {
    let sr_id = $(this).attr('data-sr_no');
    console.log(sr_id);
    startBtn = document.getElementById('startBtn' + sr_id);
    stopBtn = document.getElementById('stopBtn' + sr_id);
    resetBtn = document.getElementById('resetBtn' + sr_id);
    // startBtn.addEventListener('click', function() {
    editorName = startBtn.getAttribute('data-editor_name');
    startTimer(sr_id);
    $(".zmdi-circle").addClass('red');
    recognition.start();
    console.log('Recognition started');
    startBtn.style.display = 'none';
    resetBtn.style.display = 'none';
    stopBtn.style.display = 'inline-block';
});

// add click event listener to stop button
$('.stopBtn').click(function() {
    let sr_id = $(this).attr('data-sr_no');
    startBtn = document.getElementById('startBtn' + sr_id);
    stopBtn = document.getElementById('stopBtn' + sr_id);
    resetBtn = document.getElementById('resetBtn' + sr_id);
    stopTimer();
    $(".zmdi-circle").removeClass('red');
    recognition.stop();
    console.log('Recognition stopped');
    startBtn.style.display = 'inline-block';
    resetBtn.style.display = 'inline-block';
    stopBtn.style.display = 'none';
});


// add click event listener to reset button
$('.resetBtn').click(function() {
    let sr_id = $(this).attr('data-sr_no');
    startBtn = document.getElementById('startBtn' + sr_id);
    stopBtn = document.getElementById('stopBtn' + sr_id);
    resetBtn = document.getElementById('resetBtn' + sr_id);
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#6dabe4',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, reset it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Perform the action here
            resetTimer(sr_id);
            transcription = '';
            CKEDITOR.instances[editorName].setData('');
            recognition.stop();
            console.log('Recognition stopped');
            resetBtn.style.display = 'none';
        }
    })
});
var startTime = 0;
var elapsedTime = 0;
var timerInterval;

function startTimer(id) {
    if (elapsedTime === 0) {
        startTime = new Date().getTime();
    } else {
        startTime = new Date().getTime() - elapsedTime;
    }
    // timerInterval = setInterval(updateTimer, 1000);
    timerInterval = setInterval(function() {
        updateTimer(id);
    }, 1000);
}

function stopTimer() {
    clearInterval(timerInterval);
    elapsedTime = new Date().getTime() - startTime;
}

function resetTimer(id) {
    clearInterval(timerInterval);
    elapsedTime = 0;
    document.getElementById('timer' + id).innerHTML = '00:00:00';
}

function updateTimer(id) {
    var elapsedTime = new Date().getTime() - startTime;
    var seconds = Math.floor(elapsedTime / 1000) % 60;
    var minutes = Math.floor(elapsedTime / (1000 * 60)) % 60;
    var hours = Math.floor(elapsedTime / (1000 * 60 * 60)) % 24;
    document.getElementById('timer' + id).innerHTML = formatTime(hours) + ':' + formatTime(minutes) + ':' + formatTime(seconds);
}

function formatTime(time) {
    return (time < 10 ? '0' : '') + time;
}