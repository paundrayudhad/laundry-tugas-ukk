
document.addEventListener("DOMContentLoaded", function() {
        Livewire.on('showModal', id => {
            var myModal = new bootstrap.Modal(document.getElementById(id));
            myModal.show();
        });

        Livewire.on('hideModal', id => {
            var myModal = bootstrap.Modal.getInstance(document.getElementById(id));
            myModal.hide();
        });
    });

