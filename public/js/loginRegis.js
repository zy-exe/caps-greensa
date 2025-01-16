// LOGIN REGISTER
// For Demo Purpose [Changing input group text on focus]
$(function () {
    $('input, select').on('focus', function () {
        $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
    });
    $('input, select').on('blur', function () {
        $(this).parent().find('.input-group-text').css('border-color', '#ced4da');
    });
});

// toggle password login
$(document).ready(function() {
    $('#toggle-password').on('click', function() {
        let passwordInput = $('#password');
        let icon = $(this).find('i');

        if (passwordInput.attr('type') === 'password') {
            passwordInput.attr('type', 'text');
            icon.removeClass('bi-eye-slash').addClass('bi-eye');
        } else {
            passwordInput.attr('type', 'password');
            icon.removeClass('bi-eye').addClass('bi-eye-slash');
        }
    });
});

// toggle password regis
$(document).ready(function() {
    $('#toggle-password1').on('click', function() {
        let passwordInput = $('#password');
        let icon = $(this).find('i');

        if (passwordInput.attr('type') === 'password') {
            passwordInput.attr('type', 'text');
            icon.removeClass('bi-eye-slash').addClass('bi-eye');
        } else {
            passwordInput.attr('type', 'password');
            icon.removeClass('bi-eye').addClass('bi-eye-slash');
        }
    });

    $('#toggle-password2').on('click', function() {
        let passwordInput = $('#password_repeat');
        let icon = $(this).find('i');

        if (passwordInput.attr('type') === 'password') {
            passwordInput.attr('type', 'text');
            icon.removeClass('bi-eye-slash').addClass('bi-eye');
        } else {
            passwordInput.attr('type', 'password');
            icon.removeClass('bi-eye').addClass('bi-eye-slash');
        }
    });
});