/**
 *
 * @copyright  2017 Viktor Juša <viktor.jusa@gmail.com>
 */

function $(s) { return document.querySelector(s); }
function $$(s) { return document.querySelectorAll(s); }

// Globals
var logo, turtle;
var savehook;
var first_command = true;
var command_log = ""; // used commands log
var input = document.getElementById("komlang");
var span = document.getElementsByClassName("close")[0];
var modal = document.getElementById('submissionResult');
var message = document.getElementById('submissionMessage');
var level = 0;

var canvas_element = $("#box"), canvas_ctx = canvas_element.getContext('2d'),
    turtle_element = $("#vezlys"), turtle_ctx = turtle_element.getContext('2d');

var stream = {
    read: function(s) {
        return window.prompt(s ? s : "");
    },
    write: function() {
        var div = $('#overlay');
        for (var i = 0; i < arguments.length; i += 1) {
            div.innerHTML += arguments[i];
        }
        div.scrollTop = div.scrollHeight;
    },
    clear: function() {
        var div = $('#overlay');
        div.innerHTML = "";
    },
    readback: function() {
        var div = $('#overlay');
        return div.innerHTML;
    }
};

turtle = new CanvasTurtle(
    canvas_ctx,
    turtle_ctx,
    canvas_element.width, canvas_element.height);

logo = new LogoInterpreter(
    turtle, stream,
    function (name, def) {
        if (savehook) {
            savehook(name, def);
        }
    });

function run(){
    var error = $('#ekranas #error');
    error.classList.remove('shown');
    if (first_command) {
        level = check_compare();
        command_log = input.value;
        first_command = false;
    } else {
        command_log += "\n" + input.value;
    }
    try {
        logo.run(input.value)
    } catch(e) {
        error.innerHTML = '';
        error.appendChild(document.createTextNode(e.message));
        error.classList.add('shown');
    }
}

function check_compare() {
    var check_code = 'pr 100';
    var studentImageData, teacherImageData;
    var w = canvas_element.width, h = canvas_element.height, compare;
    logo.run(check_code);
    studentImageData = canvas_ctx.getImageData(0,0, w, h);
    logo.run('namo\nvalyk');
    logo.run(check_code);
    teacherImageData = canvas_ctx.getImageData(0,0, w, h);
    logo.run('namo\nvalyk');
    if (basic_compare(studentImageData.data, teacherImageData.data) == 100 && MSE(studentImageData.data, teacherImageData.data, w, h) == 0 ) {
        return 1;
     } else {
        return 0;
     }
}

var button = document.getElementById('save');
button.addEventListener('click', function (e) {
    var teacher_code = get_teacher_info();
    var compareResult = compare_with_teacher_code(teacher_code);
});

function send_submit_data(dataURL, command_log, compareResult) {
    var userid = getParameterByName('userid'), id = getParameterByName('id');
    jQuery.ajax({
        type: "POST",
        url: "../resources/php/submit_user_data.php?id=" + id + "&userid=" + userid,
        async: false,
        data: {
            imgBase64: dataURL,
            code: command_log,
            grade: compareResult
        },
        success : function (data) {
            command_log = ""; // clear command log
            first_command = true;
            message.innerHTML = data;
            modal.style.display = "block";
        }
    }).done(function(o) {
        console.log('img and code send to server');
    });
}

function get_teacher_info() {
    var teacher_code = "", id = getParameterByName('id');
    jQuery.ajax({
        url: "../resources/php/get_assignment_data.php?id="+id,
        async: false,
        success: function (data) {
            teacher_code = data;
        }
    }).done(function(o) {
    });
    return teacher_code;
}

function compare_with_teacher_code(code) {
    var stud64 = canvas_element.toDataURL();
    var teacherBase64;
    var compare_basic, compare_MSE;
    var studentImageData, teacherImageData;
    var w = canvas_element.width, h = canvas_element.height, compare;

    studentImageData = canvas_ctx.getImageData(0,0, w, h);
    logo.run('namo\nvalyk');
    logo.run(code);
    teacherImageData = canvas_ctx.getImageData(0,0, w, h);
    teacherBase64 = canvas_element.toDataURL();
    logo.run('namo\nvalyk');
    if (level == 1) {
        compare_basic = basic_compare(studentImageData.data, teacherImageData.data);
        compare_MSE = MSE(studentImageData.data, teacherImageData.data, w, h);
        if (compare_basic == 100 && compare_MSE == 0) {
            compare = 1;
        } else {
            compare = 0;
        }
        send_submit_data(stud64, command_log, compare);
    }
    else
    {
        resemble(teacherBase64).compareTo(stud64).ignoreLess().onComplete(function(data){
            if (data.misMatchPercentage == 0) {
                compare = 1;
            } else {
                compare = 0;
            }
            send_submit_data(stud64, command_log, compare);
        });
    }
}

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var clear = document.getElementById('clear');
clear.addEventListener('click', function (e) {
    input.value = "";
});
