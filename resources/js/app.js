// AutoDijelovi Shop - JavaScript

import './bootstrap';

// Confirm delete dialog
document.addEventListener('DOMContentLoaded', function() {
    const deleteForms = document.querySelectorAll('form[method="POST"]');

    deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (form.querySelector('input[name="_method"][value="DELETE"]')) {
                if (!confirm('Da li ste sigurni da želite obrisati ovaj dio?')) {
                    e.preventDefault();
                }
            }
        });
    });
});

// Auto-hide alerts after 5 seconds
setTimeout(function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        if (alert.classList.contains('alert-dismissible')) {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }
    });
}, 5000);
