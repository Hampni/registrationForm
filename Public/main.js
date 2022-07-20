$("#phone").mask("+1 (999) 999-9999");
$("#datepicker").datepicker();

const second_form = document.querySelector('.agileits-top-second')

if ($.session.get('data') == 'second_part') {
    $('#agileits-top-first').hide()
    second_form.style.display = ''
}  else {
    second_form.style.display = 'none'
}


$('#first-form').submit(function () {

    $.post(
        '/saveController', // адрес обработчика
        $("#first-form").serialize(), // отправляемые данные

        function (msg) { // получен ответ сервера
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


$('#second-form').submit(function () {

    $.post(
        '/saveController', // адрес обработчика
        $("#second-form").serialize(), // отправляемые данные

        function (response) { // получен ответ сервера

            $('#first-form').hide();
            $('#agileits-top-first').hide()
            $('#second-form').hide('slow');
            $('#agileits-top-second').hide('slow')

            if (response == 'true') {
                $(document).ready(function (e) {
                    let formData = new FormData($('#image-form'))

                    $.ajax({
                        type:'POST',
                        url: $(this).attr('action'),
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,

                    })
                })
            }


        }
    );
    return false;
});
//$.session.clear()

