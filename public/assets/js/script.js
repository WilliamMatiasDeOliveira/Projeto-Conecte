
document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
        const message = document.getElementById('login_error');
        if (message) {
            message.style.display = 'none';
        }
    }, 3000);
});

document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
        const message = document.getElementById('create_user_success');
        if (message) {
            message.style.display = 'none';
        }
    }, 3000);
});

document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
        const message = document.getElementById('update_cuidador_success');
        if (message) {
            message.style.display = 'none';
        }
    }, 3000);
});

document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
        const message = document.getElementById('update_cliente_success');
        if (message) {
            message.style.display = 'none';
        }
    }, 3000);
});
