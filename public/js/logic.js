document.addEventListener('DOMContentLoaded', function () {
    document.addEventListener('click', function (e) {
        if (tag = e.target.closest('.product')) {
            window.location.href = '/product/'+tag.getAttribute('data-id');
        }
    });
});