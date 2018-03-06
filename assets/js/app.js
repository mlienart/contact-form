var $ = require('jquery');

$(document).ready(function () {
    $('.contact-done').click(function () {
        $('.treat-question').text('');
        var question = $(this);
        $.ajax({
            method: 'POST',
            url: $(this).attr('data-url'),
            data: {done: $(this).is(':checked'), id: $(this).attr('data-contact-id')},
            success: function (oResponse) {
                if (oResponse.success) {
                    $('.treat-question').css('background-color', '#42F86B');

                    question.parents('tr').find('.contact-updated').text(oResponse.updatedAt);
                } else {
                    $('.treat-question').css('background-color', 'red');
                }
                $('.treat-question').text(oResponse.messages.join("\n"));

            }
        });
    });
});
