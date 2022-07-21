$("#phone").mask("+1 (999) 999-9999");
$("#datepicker").datepicker({
    changeYear: true,
    changeMonth: true
});



const second_form = document.querySelector('.agileits-top-second')
const buttons = document.querySelector('.agileits-top-third')

if ($.session.get('data') == 'second_part') {
    $('#agileits-top-first').hide()
    second_form.style.display = ''
} else {
    second_form.style.display = 'none'
}

$('#first-form').submit(function () {

    $.post(
        '/save', // адрес обработчика
        $("#first-form").serialize(), // отправляемые данные

        function (msg) { // получен ответ сервера
            console.log(msg)

            if (msg.length == 0) {
                $('#first-form').hide('slow');
                $('#agileits-top-first').hide('slow')
                second_form.style.display = '';
                $.session.set('data', 'second_part')
            } else {
                const fields = JSON.parse(msg)
                fields.forEach((field) => {
                    document.getElementById(field).style.border = 'red solid 1px'
                })
                alert('Вы заполнили не все поля!')
            }
        }
    );
    return false;
});

var files; // переменная. будет содержать данные файлов

// заполняем переменную данными, при изменении значения поля file
$('input[type=file]').on('change', function () {
    files = this.files;
});

$('#second-form').submit(function (e) {
    e.preventDefault();

    // создадим объект данных формы
    var data = new FormData(document.querySelector('.second-form'));
    $.each(files, function (key, value) {
        data.append(key, value);
    });

    data.append('my_file_upload', 1);

    $.ajax({
        type: 'POST',
        url: '/image',
        data: data,
        cache: false,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data)
        }
    })

});


$('#second-form').submit(function () {

    $.post(
        '/save', // адрес обработчика

        $("#second-form").serialize(),  // отправляемые данные

        function (response) { // получен ответ сервера
            console.log(response)
            $('#first-form').hide();
            $('#agileits-top-first').hide()
            $('#second-form').hide('slow');
            $('#agileits-top-second').hide('slow')
            $.session.clear()
            buttons.style.display = 'block'
        }
    );
    return false;
});
//$.session.clear()

