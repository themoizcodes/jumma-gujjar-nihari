// Jumma Gujjar Nihari — global front-end behaviour

document.addEventListener('DOMContentLoaded', () => {
    initRevealOnScroll();
    initCounters();
    initHeaderScrollState();
    initBackToTop();
    initMobileMenu();
    initAdminMobileMenu();
    initMenuTabs();
});

/**
 * Scroll-reveal animations for any element with the .reveal class.
 * Children inside a .stagger container get a subtle cascade delay.
 */
function initRevealOnScroll() {
    const items = document.querySelectorAll('.reveal');

    items.forEach((el) => {
        const parent = el.closest('.stagger');
        if (parent) {
            const index = Array.prototype.indexOf.call(parent.children, el);
            el.style.transitionDelay = `${Math.min(index * 90, 540)}ms`;
        }
    });

    if (!('IntersectionObserver' in window)) {
        items.forEach((el) => el.classList.add('reveal-visible'));
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('reveal-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
    );

    items.forEach((el) => observer.observe(el));
}

/**
 * Animated stat counters: <span class="stat-counter" data-count="40">0</span>
 */
function initCounters() {
    const counters = document.querySelectorAll('.stat-counter');
    if (!counters.length) return;

    const format = (value, el) => {
        const suffix = el.dataset.suffix ?? '';
        const prefix = el.dataset.prefix ?? '';
        return `${prefix}${value}${suffix}`;
    };

    const animate = (el) => {
        const target = parseInt(el.dataset.count, 10) || 0;
        const duration = 1600;
        const start = performance.now();

        const tick = (now) => {
            const progress = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            el.textContent = format(Math.round(target * eased), el);
            if (progress < 1) requestAnimationFrame(tick);
        };

        requestAnimationFrame(tick);
    };

    if (!('IntersectionObserver' in window)) {
        counters.forEach((el) => (el.textContent = format(el.dataset.count, el)));
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    animate(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.4 }
    );

    counters.forEach((el) => observer.observe(el));
}

/**
 * Solid, shadowed header once the user scrolls past the hero.
 */
function initHeaderScrollState() {
    const header = document.getElementById('site-header');
    if (!header) return;

    const update = () => header.classList.toggle('scrolled', window.scrollY > 40);
    update();
    window.addEventListener('scroll', update, { passive: true });
}

/**
 * Back-to-top floating button (injected once).
 */
function initBackToTop() {
    if (document.getElementById('back-to-top')) return;

    const btn = document.createElement('button');
    btn.id = 'back-to-top';
    btn.setAttribute('aria-label', 'Back to top');
    btn.className =
        'fixed bottom-6 right-6 z-[60] h-11 w-11 items-center justify-center border border-gold/50 bg-bg-dark/90 text-gold backdrop-blur hover:bg-gold hover:text-bg-dark transition-all duration-300 shadow-lg';

    btn.innerHTML =
        '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"/></svg>';

    btn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
    document.body.appendChild(btn);

    const update = () => btn.classList.toggle('visible', window.scrollY > 500);
    update();
    window.addEventListener('scroll', update, { passive: true });
}

/**
 * Mobile navigation toggle + auto-close on link click / outside click.
 */
function initMobileMenu() {
    const toggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('mobile-menu');
    if (!toggle || !menu) return;

    const close = () => menu.classList.remove('open');
    const open = () => menu.classList.add('open');

    toggle.addEventListener('click', () => menu.classList.toggle('open'));

    menu.querySelectorAll('a, button').forEach((link) => link.addEventListener('click', close));

    document.addEventListener('click', (e) => {
        if (!menu.contains(e.target) && !toggle.contains(e.target)) close();
    });
}

/**
 * Admin panel mobile navigation drawer.
 */
function initAdminMobileMenu() {
    const toggle = document.getElementById('admin-menu-toggle');
    const menu = document.getElementById('admin-mobile-menu');
    if (!toggle || !menu) return;

    const close = () => menu.classList.add('hidden');
    toggle.addEventListener('click', () => menu.classList.toggle('hidden'));

    menu.querySelectorAll('a, button').forEach((link) => link.addEventListener('click', close));
}

/**
 * Menu category tabs (present on the public menu page).
 */
function initMenuTabs() {
    const tabs = document.querySelectorAll('.category-tab');
    if (!tabs.length) return;

    tabs.forEach((tab) => {
        tab.addEventListener('click', () => {
            tabs.forEach((t) => {
                t.classList.remove('bg-gold', 'text-bg-dark', 'border-gold', 'shadow-[0_10px_30px_-10px_rgba(201,162,75,0.6)]');
                t.classList.add('text-gold', 'border-gold/40', 'hover:bg-gold/10');
            });
            tab.classList.add('bg-gold', 'text-bg-dark', 'border-gold');
            tab.classList.remove('text-gold', 'border-gold/40', 'hover:bg-gold/10');
            tab.classList.add('shadow-[0_10px_30px_-10px_rgba(201,162,75,0.6)]');

            document.querySelectorAll('.category-panel').forEach((panel) => panel.classList.add('hidden'));
            const target = document.getElementById(tab.dataset.target);
            if (target) target.classList.remove('hidden');
        });
    });
}
