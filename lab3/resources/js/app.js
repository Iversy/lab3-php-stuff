// import './style.sass';
import '../sass/app.sass';
import 'jquery';
import '@popperjs/core';
// import 'bootstrap';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;
// var $ = require('jquery');

function loadAlbumDetails(albumId) {
    $.ajax({
        url: '/albums/' + albumId,
        method: 'GET',
        success: function (data) {
            $('#lidaModal .modal-body').html(data);
            $('#lidaModal').modal('show');
        }
    });
}




$(document).ready(function () {
    console.log("hello world");
    var toastEl = $('#liveToast');
    var toast = new bootstrap.Toast(toastEl[0], {
        delay: 10000
    });

    $('#liveToastBtn').on('click', function () {
        toast.show();
    });

    $('.btn-close').on('click', function () {
        toast.hide();
    });

    $('.btn-info').on('mouseenter', function () {
        new bootstrap.Popover(this, {
            trigger: 'hover',
            placement: 'top'
        });
    });

    // $('[data-toggle="modal"]').on('click', function () {
    //     var el = $(this).data('target');
    //     console.log(el);
    // });

    let isProcessing = false;
    const delay = 300;

    // document.addEventListener('keydown', function (e) {
    //     if (e.key == "Escape") {
    //         isProcessing = false;
    //     }
    // });
    $(document).keydown(function (e) {
        if (isProcessing) return;
        isProcessing = true;
        console.log(123)
        let modals = document.querySelectorAll('.modal');
        let currentModalIndex = Array.from(modals).findIndex(modal => modal.classList.contains('show'));
        if (e.key === "Escape") {
            isProcessing = false;
            return;
        }
        if (e.key === "ArrowRight") {
            if (currentModalIndex >= 0 && currentModalIndex < modals.length - 1) {
                const currentModal = modals[currentModalIndex];
                const nextModal = modals[currentModalIndex + 1];
                const bootstrapModal = bootstrap.Modal.getInstance(currentModal);
                bootstrapModal.hide();

                setTimeout(() => {
                    const nextBootstrapModal = new bootstrap.Modal(nextModal);
                    nextBootstrapModal.show();
                    isProcessing = false;
                }, delay);
            } else {
                isProcessing = false;
            }
        } else if (e.key === "ArrowLeft") {
            if (currentModalIndex > 0) {
                const currentModal = modals[currentModalIndex];
                const prevModal = modals[currentModalIndex - 1];
                const bootstrapModal = bootstrap.Modal.getInstance(currentModal);
                bootstrapModal.hide();

                setTimeout(() => {
                    const prevBootstrapModal = new bootstrap.Modal(prevModal);
                    prevBootstrapModal.show();
                    isProcessing = false;
                }, delay);
            } else {
                isProcessing = false;
            }
        }
    });



});
