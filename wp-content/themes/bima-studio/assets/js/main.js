/**
 * Bima Studio Theme - Main JavaScript
 *
 * Copyright (c) 2024 Bima Kharisma Wicaksana
 * GitHub: https://github.com/bimakw
 */

(function() {
    'use strict';

    /**
     * DOM Ready
     */
    document.addEventListener('DOMContentLoaded', function() {
        initMobileMenu();
        initStickyHeader();
        initSmoothScroll();
        initPortfolioFilter();
        initFAQ();
        initAnimations();
    });

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        const menuToggle = document.getElementById('menu-toggle');
        const mobileNav = document.getElementById('mobile-nav');

        if (!menuToggle || !mobileNav) return;

        menuToggle.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';

            this.setAttribute('aria-expanded', !isExpanded);
            mobileNav.classList.toggle('active');

            // Toggle body scroll
            document.body.style.overflow = isExpanded ? '' : 'hidden';
        });

        // Close menu when clicking on a link
        const navLinks = mobileNav.querySelectorAll('a');
        navLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                mobileNav.classList.remove('active');
                menuToggle.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            });
        });

        // Close menu on resize to desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 768) {
                mobileNav.classList.remove('active');
                menuToggle.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            }
        });
    }

    /**
     * Sticky Header on Scroll
     */
    function initStickyHeader() {
        const header = document.getElementById('site-header');
        if (!header) return;

        let lastScroll = 0;
        const scrollThreshold = 100;

        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;

            if (currentScroll > scrollThreshold) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }

            lastScroll = currentScroll;
        }, { passive: true });
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    function initSmoothScroll() {
        const anchorLinks = document.querySelectorAll('a[href^="#"]');

        anchorLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');

                if (href === '#') return;

                const target = document.querySelector(href);
                if (!target) return;

                e.preventDefault();

                const headerHeight = document.getElementById('site-header')?.offsetHeight || 0;
                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });

                // Update URL hash
                history.pushState(null, null, href);
            });
        });
    }

    /**
     * Portfolio Filter
     */
    function initPortfolioFilter() {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const portfolioItems = document.querySelectorAll('.portfolio-card');

        if (filterButtons.length === 0 || portfolioItems.length === 0) return;

        filterButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const filter = this.getAttribute('data-filter');

                // Update active button
                filterButtons.forEach(function(btn) {
                    btn.classList.remove('active');
                });
                this.classList.add('active');

                // Filter items
                portfolioItems.forEach(function(item) {
                    const category = item.getAttribute('data-category') || '';

                    if (filter === 'all' || category.includes(filter)) {
                        item.classList.remove('hidden');
                        item.style.display = '';
                    } else {
                        item.classList.add('hidden');
                        item.style.display = 'none';
                    }
                });
            });
        });
    }

    /**
     * FAQ Accordion
     */
    function initFAQ() {
        const faqQuestions = document.querySelectorAll('.faq-question');

        faqQuestions.forEach(function(question) {
            question.addEventListener('click', function() {
                const isExpanded = this.getAttribute('aria-expanded') === 'true';
                const answer = this.nextElementSibling;

                // Close all other FAQs
                faqQuestions.forEach(function(q) {
                    if (q !== question) {
                        q.setAttribute('aria-expanded', 'false');
                        q.nextElementSibling.classList.remove('active');
                    }
                });

                // Toggle current FAQ
                this.setAttribute('aria-expanded', !isExpanded);
                answer.classList.toggle('active');
            });
        });
    }

    /**
     * Scroll Animations
     */
    function initAnimations() {
        const animatedElements = document.querySelectorAll('.animate-fade-in-up, .stagger-children');

        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animated');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            animatedElements.forEach(function(el) {
                observer.observe(el);
            });
        } else {
            // Fallback for browsers without IntersectionObserver
            animatedElements.forEach(function(el) {
                el.classList.add('animated');
            });
        }
    }

    /**
     * Contact Form Validation (for native form)
     */
    function initContactForm() {
        const form = document.getElementById('contact-form');
        if (!form) return;

        form.addEventListener('submit', function(e) {
            const name = form.querySelector('[name="name"]');
            const email = form.querySelector('[name="email"]');
            const message = form.querySelector('[name="message"]');
            let hasError = false;

            // Reset errors
            form.querySelectorAll('.form-error').forEach(function(el) {
                el.remove();
            });

            // Validate name
            if (name && name.value.trim() === '') {
                showError(name, 'Please enter your name');
                hasError = true;
            }

            // Validate email
            if (email && !isValidEmail(email.value)) {
                showError(email, 'Please enter a valid email address');
                hasError = true;
            }

            // Validate message
            if (message && message.value.trim() === '') {
                showError(message, 'Please enter your message');
                hasError = true;
            }

            if (hasError) {
                e.preventDefault();
            }
        });
    }

    /**
     * Show Form Error
     */
    function showError(field, message) {
        const error = document.createElement('span');
        error.className = 'form-error';
        error.style.color = '#ef4444';
        error.style.fontSize = '0.875rem';
        error.style.display = 'block';
        error.style.marginTop = '0.25rem';
        error.textContent = message;

        field.parentNode.appendChild(error);
        field.style.borderColor = '#ef4444';
    }

    /**
     * Validate Email
     */
    function isValidEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    /**
     * Lazy Load Images
     */
    function initLazyLoad() {
        if ('loading' in HTMLImageElement.prototype) {
            // Native lazy loading supported
            const images = document.querySelectorAll('img[loading="lazy"]');
            images.forEach(function(img) {
                if (img.dataset.src) {
                    img.src = img.dataset.src;
                }
            });
        } else if ('IntersectionObserver' in window) {
            // Fallback to IntersectionObserver
            const lazyImages = document.querySelectorAll('img[data-src]');
            const imageObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                        imageObserver.unobserve(img);
                    }
                });
            });

            lazyImages.forEach(function(img) {
                imageObserver.observe(img);
            });
        }
    }

    // Initialize lazy load
    initLazyLoad();
    initContactForm();

})();
