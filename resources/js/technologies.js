document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.tech-option input').forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            if (this.checked) {
                this.parentElement.classList.add('selected');
            } else {
                this.parentElement.classList.remove('selected');
            }
        });
    });
});
