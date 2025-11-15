import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    const notifBtn = document.getElementById('notif-button');
    const notifDrop = document.getElementById('notif-dropdown');

    if (!notifBtn || !notifDrop) return;

    notifBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        notifDrop.classList.toggle('hidden');
    });

    document.addEventListener('click', (e) => {
        if (!e.target.closest('#notif-dropdown')) {
            notifDrop.classList.add('hidden');
        }
    });
});

