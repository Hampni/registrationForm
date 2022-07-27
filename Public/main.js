const second_form = document.querySelector('.agileits-top-second');
const buttons = document.querySelector('.agileits-top-third');
const titlePart = document.querySelector('.titlePart');

$("#first_name")[0].placeholder = 'First name';
$("#last_name")[0].placeholder = 'Last name';
$("#report_subject")[0].placeholder = 'Report subject';
$("#email")[0].placeholder = 'Email';
$("#company")[0].placeholder = 'Company';
$("#position")[0].placeholder = 'Position';


$("#phone").mask(' (999) 999-999?9', {
    placeholder: ''
});

$("#birthday").datepicker({
    dateFormat: "dd-mm-yy",
    changeYear: true,
    changeMonth: true,
    yearRange: "1951:2021",
    currentText: "Now",
    maxDate: "-1y"

});

let array = [
    'first_name',
    'last_name',
    'birthday',
    'report_subject',
    'country',
    'phone',
    'email',
    'company',
    'position',
    'about_me'
];

let arrayLabels = [];
for (const item in array) {
    arrayLabels[array[item]] = document.getElementById(array[item] + '_label').innerHTML;
}
let input = document.querySelector("#phone");

window.intlTelInput(input, {
    autoPlaceholder: 'aggressive',
});
let iti = intlTelInput(input);
$('#phone').on('change', function () {
    $("#phone")[0].value = '+' + iti.getSelectedCountryData().dialCode + $("#phone")[0].value;
});


$('#first_name').on('click', function () {
    $("#first_name")[0].placeholder = ' ';
});

$(document).on('click', function (e) {
    if (!$(e.target).closest("#first_name").length) {
        $("#first_name")[0].placeholder = 'First name'
    }
});

$('#last_name').on('click', function () {
    $("#last_name")[0].placeholder = ' ';
});

$(document).on('click', function (e) {
    if (!$(e.target).closest("#last_name").length) {
        $("#last_name")[0].placeholder = 'Last name'
    }
});

$('#report_subject').on('click', function () {
    $("#report_subject")[0].placeholder = ' ';
});

$(document).on('click', function (e) {
    if (!$(e.target).closest("#report_subject").length) {
        $("#report_subject")[0].placeholder = 'Report subject'
    }
});

$('#email').on('click', function () {
    $("#email")[0].placeholder = ' ';
});

$(document).on('click', function (e) {
    if (!$(e.target).closest("#email").length) {
        $("#email")[0].placeholder = 'Email'
    }
});

$('#company').on('click', function () {
    $("#company")[0].placeholder = ' ';
});

$(document).on('click', function (e) {
    if (!$(e.target).closest("#company").length) {
        $("#company")[0].placeholder = 'Company'
    }
});

$('#position').on('click', function () {
    $("#position")[0].placeholder = ' ';
});

$(document).on('click', function (e) {
    if (!$(e.target).closest("#position").length) {
        $("#position")[0].placeholder = 'Position'
    }
});

let dateMask = IMask(
    document.getElementById('birthday'),
    {
        mask: Date,
        min: new Date(1951, 0, 1),
        max: new Date(2021, 12, 30),
        lazy: false
    });

let first_name = IMask(document.getElementById('first_name'), {
    mask: '********************',
});

let last_name = IMask(document.getElementById('last_name'), {
    mask: '********************',
});




$('.iti.iti--allow-dropdown')[0].style.width = '100%';
$('.iti.iti--allow-dropdown')[0].style.marginBottom = '13px';
$('.iti.iti--allow-dropdown')[1].style.width = '100%';


if ($.session.get('data') == 'second_part') {
    $('#agileits-top-first').hide();
    second_form.style.display = '';
} else {
    second_form.style.display = 'none';
}

$('#first-form').submit(function () {

    for (const item in array) {
        let label = document.getElementById(array[item] + '_label')
        let html = arrayLabels[array[item]]
        label.style.color = 'floralwhite';
        label.innerHTML = html;
        document.getElementById(array[item]).style.border = '';
    }

    $.post(
        '/save', // адрес обработчика
        $("#first-form").serialize(), // отправляемые данные

        function (msg) { // получен ответ сервера

            if (msg.length == 0) {
                $('#first-form').hide('slow');
                $('#agileits-top-first').hide('slow');
                second_form.style.display = '';
                $.session.set('data', 'second_part');
                console.log(msg)
            } else {
                let fields = JSON.parse(msg)
                for (const key in fields) {

                    if (document.getElementById(key).value == '') {
                        document.getElementById(key + '_label').innerHTML = 'These field cannot be empty!';
                        document.getElementById(key + '_label').style.color = 'red';
                    }
                    document.getElementById(key + '_label').style.color = 'red';
                    document.getElementById(key + '_label').innerHTML = fields[key];
                    document.getElementById(key).style.border = 'red solid 1px';
                }
            }
        }
    );
    return false;
});

let files; // переменная. будет содержать данные файлов

// заполняем переменную данными, при изменении значения поля file
$('input[type=file]').on('change', function () {
    files = this.files;
});

$('#second-form').submit(function (e) {
    e.preventDefault();

    for (const item in array) {
        let label = document.getElementById(array[item] + '_label')
        let html = arrayLabels[array[item]]
        label.style.color = 'floralwhite';
        label.innerHTML = html;
        document.getElementById(array[item]).style.border = '';
    }

    // создадим объект данных формы
    let data = new FormData(document.querySelector('.second-form'));
    $.each(files, function (key, value) {
        data.append(key, value);
    });
    data.append('my_file_upload', 1);
    data.append('id', 1);

    $.ajax({
        type: 'POST',
        url: '/image',
        data: data,
        cache: false,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function () {

            $.post(
                '/save', // адрес обработчика

                $("#second-form").serialize(),  // отправляемые данные

                function (msg) { // получен ответ сервера

                    if (msg.length == 0) {
                        $('#first-form').hide();
                        $('#agileits-top-first').hide();
                        $('#second-form').hide('slow');
                        $('#agileits-top-second').hide('slow');
                        $.session.clear();
                        buttons.style.display = 'block';
                        titlePart.style.display = 'none';
                    } else {
                        let fields = JSON.parse(msg)
                        for (const key in fields) {

                            if (document.getElementById(key).value == '') {
                                document.getElementById(key + '_label').innerHTML = 'These field cannot be empty!';
                                document.getElementById(key + '_label').style.color = 'red';
                            }
                            document.getElementById(key + '_label').style.color = 'red';
                            document.getElementById(key + '_label').innerHTML = fields[key];
                            document.getElementById(key).style.border = 'red solid 1px';
                        }
                    }
                }
            );
            return false;
        }
    })

});




