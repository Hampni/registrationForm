$("#phone_1").mask("+1 (999) 999-9999");
$( "#datepicker" ).datepicker();


const second_form = document.querySelector('.second-form')
second_form.style.display = 'none'

$('#first-form').submit(function () {

    $.post(
        'http://localhost:8002/App/post.php', // адрес обработчика
        $("#first-form").serialize(), // отправляемые данные

        function (msg) { // получен ответ сервера
            $('#first-form').hide('slow');
            $('#my_message').html(msg);
            second_form.style.display = '';
        }
    );
    return false;
});
