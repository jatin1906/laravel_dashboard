document.addEventListener('submit', function (e) {
    var isFormValid = true; // Flag to track overall form validity

    // Validate input fields for login form
    $('#form input').each(function () {
        var $this = $(this);
        var value = $this.val().trim();

        // Reset validation state for this field
        $this.removeClass('is-invalid');
        $('.error-captcha').hide();
        $this.siblings('.error-message').hide(); // Hide error messages initially

        if (!value) { // Check if field is empty
            isFormValid = false;
            $this.addClass('is-invalid');
            $this.siblings('.error-message').show().css('color', 'red');
        } else if ($this.attr('type') === 'email') { // Validate email
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(value)) {
                isFormValid = false;
                $this.addClass('is-invalid');
                $this.siblings('.error-message').show().text('Invalid email format').css('color', 'red');
            }
        } else if ($this.attr('type') === 'password') { // Validate password (e.g., non-empty)
            if (value.length < 6) { // Example condition: password must be at least 6 characters
                isFormValid = false;
                $this.addClass('is-invalid');
                $this.siblings('.error-message').show().text('Password must be at least 6 characters').css('color', 'red');
            }
        }
        // Validate reCAPTCHA
        var captchaResponse = grecaptcha.getResponse();
        if (!captchaResponse) {
            isFormValid = false;
            $('.error-captcha').show().css('color', 'red');
        }
    });

    // Validation input field form for password change
    $('#changePass input').each(function () {
        var $this = $(this);
        var value = $this.val().trim();
        var pass = $('#newPassword').val();
        var renewPassword = $('#renewPassword').val();

        // Reset validation state for this field
        $this.removeClass('is-invalid');
        $('.error-captcha').hide();
        $this.siblings('.error-message').hide(); // Hide error messages initially

        if (!value) { // Check if field is empty
            isFormValid = false;
            $this.addClass('is-invalid');
            $this.siblings('.error-message').show().css('color', 'red');
        } else if ($this.attr('type') === 'password') { // Validate password (e.g., non-empty)
            if (value.length < 6) { // Example condition: password must be at least 6 characters
                isFormValid = false;
                $this.addClass('is-invalid');
                $this.siblings('.error-message').show().text('Password must be at least 6 characters').css('color', 'red');
            } else if (pass != renewPassword) {
                isFormValid = false;
                $('#renewPassword').addClass('is-invalid');
                $('#renewPassword').siblings('.error-message').show().text('Password Does\'nt match. ').css('color', 'red');
            }
        }
    });

    // Prevent form submission if validation fails
    if (!isFormValid) {
        e.preventDefault(); // Stop the form from submitting
    }

});

$(document).ready(function () {
    resetalert();
    // Hide popup message in sec
    function resetalert() {
        setTimeout(function () {
            $('.popup').fadeOut();
        }, 5000);
    }

    // Show and hide the passwodrd field
    $('.fa-eye').on('click', function () {
        $passwordfield = $('#' + $(this).prev().attr('id'));
        $eyeicon = $(this);

        if ($passwordfield.attr('type') == 'password') {
            $passwordfield.attr('type', 'text');
            $eyeicon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            $passwordfield.attr('type', 'password');
            $eyeicon.addClass('fa-eye').removeClass('fa-eye-slash');
        }
    });

    $('input').on('keypress', function () {
        $this = $(this);
        $this.removeClass('is-invalid');
        $this.siblings('.error-message').hide();
    });

    // multiselect dropdown
    $("#parent_page").select2();

    // on click ajax form submit
    $('#changePass').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/change-password',
            data: { data: $(this).serialize() },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token
            },
            success: function (response) {
                if (response != '') {
                    if (response.status) {
                        $('#changePass').prev('.popup').show().text(response.message).css('color', 'success');
                        $('#changePass')[0].reset();

                    } else {
                        $('#changePass').prev('.popup').show().text(response.message).css('color', 'danger');
                    }
                }

            }, error: function (xhr) {
                $('#changePass').prev('.popup').show().text(xhr.responseJSON.message).css('color', 'danger');
            }
        });
        resetalert();
    });

    $('#uploadButton').on('click', function () {
        document.getElementById('getImage').click();
    });
});
