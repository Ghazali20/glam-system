import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const revealElements = document.querySelectorAll('.reveal-on-scroll');

if ('IntersectionObserver' in window) {
    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) {
                return;
            }

            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
        });
    }, { threshold: 0.12 });

    revealElements.forEach((element) => revealObserver.observe(element));
} else {
    revealElements.forEach((element) => element.classList.add('is-visible'));
}
