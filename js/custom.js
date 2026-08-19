(function () {
    'use strict';

    function initHeaderScroll() {
        var header = document.querySelector('.site-header');
        if (!header) return;

        function onScroll() {
            header.classList.toggle('is-scrolled', window.scrollY > 24);
        }

        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
    }

    function initHeaderSearch() {
        var panel = document.getElementById('headerSearch');
        var openBtn = document.getElementById('searchToggle');
        var closeBtn = document.getElementById('searchClose');
        var input = document.getElementById('site-search');
        if (!panel || !openBtn) return;

        function openSearch() {
            panel.classList.add('is-open');
            setTimeout(function () {
                if (input) input.focus();
            }, 50);
        }

        function closeSearch() {
            panel.classList.remove('is-open');
        }

        openBtn.addEventListener('click', openSearch);
        if (closeBtn) closeBtn.addEventListener('click', closeSearch);
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeSearch();
        });
    }

    function initProductSlider() {
        var items = Array.prototype.slice.call(document.querySelectorAll('.slider-item'));
        if (!items.length) return;

        var cats = Array.prototype.slice.call(document.querySelectorAll('#sliderCats a'));
        var catItems = Array.prototype.slice.call(document.querySelectorAll('#sliderCats li'));
        var title = document.getElementById('sliderTitle');
        var prevBtn = document.querySelector('.slider-arrow-prev');
        var nextBtn = document.querySelector('.slider-arrow-next');
        var viewport = document.getElementById('flangeSlider');
        var total = items.length;
        var active = document.querySelector('.slider-item.is-active');
        var current = active ? parseInt(active.getAttribute('data-index'), 10) || 0 : 0;
        var names = cats.map(function (link) {
            return link.textContent.trim();
        });

        function wrap(i) {
            return (i + total) % total;
        }

        function render(index) {
            current = wrap(index);
            items.forEach(function (item, i) {
                item.className = 'slider-item';
                var offset = i - current;
                if (offset > total / 2) offset -= total;
                if (offset < -total / 2) offset += total;
                if (offset === 0) item.classList.add('is-active');
                else if (offset === -1) item.classList.add('is-prev');
                else if (offset === 1) item.classList.add('is-next');
                else if (offset === -2) item.classList.add('is-prev-2');
                else if (offset === 2) item.classList.add('is-next-2');
                else item.classList.add('is-far');
            });
            catItems.forEach(function (li, i) {
                li.classList.toggle('is-active', i === current);
            });
            if (title && names[current]) title.textContent = names[current];
        }

        if (prevBtn) prevBtn.addEventListener('click', function () { render(current - 1); });
        if (nextBtn) nextBtn.addEventListener('click', function () { render(current + 1); });
        cats.forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                render(parseInt(link.getAttribute('data-index'), 10));
            });
        });

        var startX = 0;
        if (viewport) {
            viewport.addEventListener('touchstart', function (e) {
                startX = e.changedTouches[0].clientX;
            }, { passive: true });
            viewport.addEventListener('touchend', function (e) {
                var dx = e.changedTouches[0].clientX - startX;
                if (Math.abs(dx) > 40) render(current + (dx < 0 ? 1 : -1));
            }, { passive: true });
        }

        render(current);
    }

    function initTabSlider(rootId) {
        var root = document.getElementById(rootId);
        if (!root) return;

        var tabs = Array.prototype.slice.call(root.querySelectorAll('[role="tablist"] [role="tab"]'));
        var slides = Array.prototype.slice.call(root.querySelectorAll('[role="tabpanel"]'));
        var dots = Array.prototype.slice.call(root.querySelectorAll('.lpw-brands-dots button, .flange-types-dots button'));
        var track = root.querySelector('.lpw-brands-track, .flange-types-track');
        var viewport = root.querySelector('.lpw-brands-viewport, .flange-types-viewport');
        var index = 0;
        var timer = null;
        var delay = 5500;
        var startX = 0;
        var deltaX = 0;
        var dragging = false;

        function goTo(next, user) {
            if (!slides.length || !track) return;
            index = (next + slides.length) % slides.length;
            track.style.transform = 'translateX(-' + (index * 100) + '%)';

            tabs.forEach(function (tab, i) {
                var on = i === index;
                tab.classList.toggle('is-active', on);
                tab.setAttribute('aria-selected', on ? 'true' : 'false');
                tab.tabIndex = on ? 0 : -1;
            });
            slides.forEach(function (slide, i) {
                var on = i === index;
                slide.classList.toggle('is-active', on);
                slide.setAttribute('aria-hidden', on ? 'false' : 'true');
            });
            dots.forEach(function (dot, i) {
                var on = i === index;
                dot.classList.toggle('is-active', on);
                if (on) dot.setAttribute('aria-current', 'true');
                else dot.removeAttribute('aria-current');
            });

            if (user && tabs[index]) {
                var list = tabs[index].parentElement;
                var target = tabs[index].offsetLeft - 24;
                if (list.scrollTo) list.scrollTo({ left: Math.max(0, target), behavior: 'smooth' });
            }
            if (user) restart();
        }

        function next() {
            goTo(index + 1, false);
        }

        function start() {
            stop();
            timer = setInterval(next, delay);
        }

        function stop() {
            if (timer) {
                clearInterval(timer);
                timer = null;
            }
        }

        function restart() {
            stop();
            start();
        }

        tabs.forEach(function (tab, i) {
            tab.addEventListener('click', function () { goTo(i, true); });
        });
        dots.forEach(function (dot, i) {
            dot.addEventListener('click', function () { goTo(i, true); });
        });

        root.addEventListener('mouseenter', stop);
        root.addEventListener('mouseleave', start);

        if (viewport) {
            viewport.addEventListener('pointerdown', function (e) {
                if (e.target.closest('a, button')) return;
                dragging = true;
                startX = e.clientX;
                deltaX = 0;
                track.style.transition = 'none';
                stop();
            });
        }

        window.addEventListener('pointermove', function (e) {
            if (!dragging) return;
            deltaX = e.clientX - startX;
            track.style.transform = 'translateX(calc(' + (-index * 100) + '% + ' + deltaX + 'px))';
        });
        window.addEventListener('pointerup', function () {
            if (!dragging) return;
            dragging = false;
            track.style.transition = '';
            if (Math.abs(deltaX) > 60) {
                goTo(index + (deltaX < 0 ? 1 : -1), true);
            } else {
                goTo(index, true);
            }
        });

        goTo(0, false);
        start();
    }

    function initContentAccordion() {
        var items = Array.prototype.slice.call(document.querySelectorAll('.pd-acc-item'));
        if (!items.length) return;

        items.forEach(function (item) {
            var trigger = item.querySelector('.pd-acc-trigger');
            if (!trigger) return;

            trigger.addEventListener('click', function () {
                var isOpen = item.classList.contains('is-open');
                items.forEach(function (other) {
                    other.classList.remove('is-open');
                    var btn = other.querySelector('.pd-acc-trigger');
                    if (btn) btn.setAttribute('aria-expanded', 'false');
                });
                if (!isOpen) {
                    item.classList.add('is-open');
                    trigger.setAttribute('aria-expanded', 'true');
                }
            });
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        initHeaderSearch();
        initHeaderScroll();
        initProductSlider();
        initTabSlider('lpw-brands');
        initTabSlider('flange-types');
        initMobileNav();
        initContentAccordion();
        initCookieBanner();
    });

    function initCookieBanner() {
        var banner = document.getElementById('cookieBanner');
        var acceptBtn = document.getElementById('cookieAccept');
        var cancelBtn = document.getElementById('cookieCancel');
        if (!banner || !acceptBtn || !cancelBtn) return;

        var storageKey = 'filmag_cookie_ok';
        var dayMs = 24 * 60 * 60 * 1000;

        try {
            var saved = parseInt(window.localStorage.getItem(storageKey) || '0', 10);
            if (saved && Date.now() - saved < dayMs) {
                return;
            }
        } catch (err) {
            /* show the banner if storage is blocked */
        }

        banner.hidden = false;

        function dismissBanner() {
            try {
                window.localStorage.setItem(storageKey, String(Date.now()));
            } catch (err) {
                /* ignore */
            }
            banner.hidden = true;
        }

        acceptBtn.addEventListener('click', dismissBanner);
        cancelBtn.addEventListener('click', dismissBanner);
    }

    function initMobileNav() {
        var nav = document.getElementById('mainNav');
        var toggle = document.getElementById('navToggle');
        var closeBtn = document.getElementById('navClose');
        var backdrop = document.getElementById('navBackdrop');
        if (!nav || !toggle) return;

        var mq = window.matchMedia('(max-width: 991.98px)');

        function isMobile() {
            return mq.matches;
        }

        function closeAccordions() {
            nav.querySelectorAll('.dropdown.is-open').forEach(function (item) {
                item.classList.remove('is-open');
                var link = item.querySelector(':scope > .nav-link');
                if (link) link.setAttribute('aria-expanded', 'false');
            });
        }

        function closeNav() {
            document.body.classList.remove('nav-open');
            toggle.setAttribute('aria-expanded', 'false');
            if (backdrop) backdrop.hidden = true;
            closeAccordions();
        }

        function openNav() {
            document.body.classList.add('nav-open');
            toggle.setAttribute('aria-expanded', 'true');
            if (backdrop) backdrop.hidden = false;
            nav.scrollTop = 0;
        }

        toggle.addEventListener('click', function () {
            if (!isMobile()) return;
            if (document.body.classList.contains('nav-open')) closeNav();
            else openNav();
        });

        if (closeBtn) closeBtn.addEventListener('click', closeNav);
        if (backdrop) backdrop.addEventListener('click', closeNav);

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeNav();
        });

        nav.querySelectorAll('.dropdown > .nav-link').forEach(function (link) {
            link.addEventListener('click', function (e) {
                if (!isMobile()) return;
                e.preventDefault();
                var item = link.parentElement;
                var wasOpen = item.classList.contains('is-open');
                closeAccordions();
                if (!wasOpen) {
                    item.classList.add('is-open');
                    link.setAttribute('aria-expanded', 'true');
                }
            });
        });

        if (mq.addEventListener) {
            mq.addEventListener('change', function () {
                if (!isMobile()) closeNav();
            });
        }
    }
})();
