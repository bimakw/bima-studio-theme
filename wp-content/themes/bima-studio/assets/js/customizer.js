/**
 * Bima Studio Theme - Customizer Preview
 *
 * Copyright (c) 2024 Bima Kharisma Wicaksana
 * GitHub: https://github.com/bimakw
 */

(function($) {
    'use strict';

    // Primary Color
    wp.customize('bima_studio_primary_color', function(value) {
        value.bind(function(newval) {
            document.documentElement.style.setProperty('--color-primary', newval);
        });
    });

    // Secondary Color
    wp.customize('bima_studio_secondary_color', function(value) {
        value.bind(function(newval) {
            document.documentElement.style.setProperty('--color-secondary', newval);
        });
    });

    // Site Title
    wp.customize('blogname', function(value) {
        value.bind(function(newval) {
            var logos = document.querySelectorAll('.site-logo:not(:has(img))');
            logos.forEach(function(logo) {
                var span = logo.querySelector('span');
                var spanHtml = span ? span.outerHTML : '<span>.</span>';
                logo.innerHTML = newval + spanHtml;
            });
        });
    });

    // Site Description
    wp.customize('blogdescription', function(value) {
        value.bind(function(newval) {
            var desc = document.querySelector('.footer-brand p');
            if (desc) {
                desc.textContent = newval;
            }
        });
    });

})(jQuery);
