document.addEventListener('submit', function (e) {
    var isFormValid = true; // Flag to track overall form validity

    // Validate input fields
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
    });

    // Validate reCAPTCHA
    var captchaResponse = grecaptcha.getResponse();
    if (!captchaResponse) {
        isFormValid = false;
        $('.error-captcha').show().css('color', 'red');
        // alert('Please complete the CAPTCHA');

    }

    // Prevent form submission if validation fails
    if (!isFormValid) {
        e.preventDefault(); // Stop the form from submitting
    }

});

$(document).ready(function () {

    setTimeout(function () {
        $('.popup').fadeOut();
    }, 5000);

    $('.fa-eye').on('click', function () {
        $passwordfield = $("#password");
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

});

$(document).ready(function () {
    $("#parent_page").select2();
});