function validateForm(e) {
    e.preventDefault();
    document.getElementById('status').innerHTML = "Enviando...";
    formData = {
        'name': $('input[name=name]').val(),
        'email': $('input[name=email]').val(),
        'subject': $('input[name=subject]').val(),
        'message': $('textarea[name=message]').val()
    };

    $.ajax({
        url: "mail.php",
        type: "POST",
        dataType: "JSON",
        data: formData,
        success: function (data, textStatus, jqXHR) {

            document.getElementById('status').innerHTML = data.message;
            if (data.code) {
                $('#contact-form').find("input[type=text], textarea").val("");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $('#status').text(jqXHR);
        }
    });
}