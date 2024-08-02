document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Gather form data
    var formData = new FormData(this);

    // Send form data to PHP script using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'send_email.php', true);
    xhr.onload = function() {
        var response = JSON.parse(xhr.responseText);
        if (response.success) {
            alert('Thank you for contacting us. We will get back to you soon!');
            document.getElementById('contact-form').reset();
        } else {
            alert('Failed to send message. Please try again later.');
        }
    };
    xhr.onerror = function() {
        alert('Failed to send message. Please try again later.');
    };
    xhr.send(formData);
});