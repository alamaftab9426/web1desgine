
(function () {
  'use strict';

  /*---- CONFIG — edit here-------- */
  var GENERAL_SLIDER_DELAY = 10000;
  var HERO_SLIDER_DELAY = 5500;
  var COMPANY_WHATSAPP_NUMBER = '8853424605'; // Set the verified company number in international format, digits only.
  var COMPANY_ENQUIRY_EMAIL = 'info@pristineengineering.com';
  var VIDEO_URL = '';
  var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var sliderInstances = [];


  /* ------------STICKY HEADER SHADOW------------------- */
  var header = document.getElementById('siteHeader');
  function onScrollHeader() {
    if (!header) return;
    header.classList.toggle('is-stuck', window.scrollY > 40);
  }


  /* ------------SHARED SLIDERS------------ */
  function initializeSliders() {
    if (typeof Swiper === 'undefined') return;

    document.querySelectorAll('.swiper').forEach(function (element) {
      if (element.swiper) return;
      var hero = element.classList.contains('hero-swiper');
      var options = {
        loop: hero || element.classList.contains('featured-swiper'),
        speed: reducedMotion ? 0 : 650,
        grabCursor: true,
        autoplay: reducedMotion ? false : {
          delay: hero ? HERO_SLIDER_DELAY : GENERAL_SLIDER_DELAY,
          disableOnInteraction: false,
          pauseOnMouseEnter: true
        },
        a11y: { enabled: true },
        keyboard: { enabled: true, onlyInViewport: true }
      };

      if (hero) {
        var pagination = element.querySelector('.hero-pagination');
        options.effect = 'fade';
        options.fadeEffect = { crossFade: true };
        if (pagination) options.pagination = { el: pagination, clickable: true };
      } else if (element.classList.contains('industries-swiper')) {
        options.spaceBetween = 14;
        options.slidesPerView = 1.4;
        options.breakpoints = {
          480: { slidesPerView: 2.2 },
          768: { slidesPerView: 3.2 },
          1200: { slidesPerView: 3.6 },
          1400: { slidesPerView: 4.1 }
        };
      } else if (element.classList.contains('featured-swiper')) {
        options.spaceBetween = 14;
        options.slidesPerView = 1.6;
        options.breakpoints = {
          480: { slidesPerView: 2.4 },
          768: { slidesPerView: 3.4 },
          992: { slidesPerView: 4.4 },
          1200: { slidesPerView: 5.4 },
          1400: { slidesPerView: 6 }
        };
      } else if (element.classList.contains('testi-swiper')) {
        options.spaceBetween = 18;
        options.slidesPerView = 1;
        options.breakpoints = {
          768: { slidesPerView: 2 },
          1100: { slidesPerView: 3 }
        };
      } else {
        return;
      }

      var instance = new Swiper(element, options);
      sliderInstances.push(instance);

      var restartAutoplay = function () {
        if (!reducedMotion && instance.autoplay) {
          instance.autoplay.stop();
          instance.autoplay.start();
        }
      };
      instance.on('touchEnd', restartAutoplay);
      instance.on('sliderFirstMove', function () {
        if (instance.autoplay) instance.autoplay.stop();
      });
    });
  }

  function destroySliders() {
    sliderInstances.forEach(function (instance) {
      if (instance && !instance.destroyed) instance.destroy(true, true);
    });
    sliderInstances = [];
  }

  initializeSliders();
  window.addEventListener('pagehide', destroySliders);
  window.addEventListener('pageshow', function (event) {
    if (event.persisted) initializeSliders();
  });

  var mainNav = document.getElementById('mainNav');
  if (mainNav && window.bootstrap && window.bootstrap.Collapse) {
    mainNav.addEventListener('click', function (event) {
      var link = event.target.closest('a[href^="#"]');
      if (link && !link.classList.contains('dropdown-toggle') && window.innerWidth < 992) {
        var collapse = window.bootstrap.Collapse.getInstance(mainNav);
        if (collapse) collapse.hide();
      }
    });
  }


  /* ---------------SCROLL REVEAL--------------------- */
  var revealEls = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window) {
    var revealIO = new IntersectionObserver(function (entries, obs) {
      entries.forEach(function (e) {
        if (e.isIntersecting) { e.target.classList.add('is-visible'); obs.unobserve(e.target); }
      });
    }, { threshold: 0.14, rootMargin: '0px 0px -40px 0px' });
    revealEls.forEach(function (el) { revealIO.observe(el); });
  } else {
    revealEls.forEach(function (el) { el.classList.add('is-visible'); });
  }


  /* ----------------- NUMBER COUNTERS  (<span class="count" data-count="1000">)------------- */
  function runCounter(el) {
    var target = parseInt(el.getAttribute('data-count'), 10) || 0;
    var duration = 1800;
    var start = null;
    function step(ts) {
      if (!start) start = ts;
      var p = Math.min((ts - start) / duration, 1);
      var eased = 1 - Math.pow(1 - p, 3);              // easeOutCubic
      el.textContent = Math.floor(eased * target).toLocaleString('en-IN');
      if (p < 1) requestAnimationFrame(step); else el.textContent = target.toLocaleString('en-IN');
    }
    requestAnimationFrame(step);
  }
  var counters = document.querySelectorAll('.count');
  if ('IntersectionObserver' in window) {
    var countIO = new IntersectionObserver(function (entries, obs) {
      entries.forEach(function (e) {
        if (e.isIntersecting) { runCounter(e.target); obs.unobserve(e.target); }
      });
    }, { threshold: 0.6 });
    counters.forEach(function (c) { countIO.observe(c); });
  } else {
    counters.forEach(function (c) { c.textContent = c.getAttribute('data-count'); });
  }


  /* -------------BACK TO TOP-------------------- */
  var toTop = document.getElementById('toTop');
  function onScrollTop() { if (toTop) toTop.classList.toggle('show', window.scrollY > 600); }
  if (toTop) toTop.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: 'smooth' }); });

  window.addEventListener('scroll', function () { onScrollHeader(); onScrollTop(); }, { passive: true });
  onScrollHeader(); onScrollTop();

  var contactShortcuts = document.querySelector('.contact-shortcuts');
  var siteFooter = document.getElementById('siteFooter');
  if (contactShortcuts && siteFooter && 'IntersectionObserver' in window) {
    var footerObserver = new IntersectionObserver(function (entries) {
      contactShortcuts.classList.toggle('is-footer-visible', entries[0].isIntersecting);
    });
    footerObserver.observe(siteFooter);
  }


  /* --------------------ENQUIRY FORMS AND FIRST-VISIT MODAL---------------- */
  function validateEnquiry(form) {
    var name = form.elements.name;
    var phone = form.elements.phone;
    var requirement = form.elements.requirement;
    var valid = true;

    [name, requirement].forEach(function (field) {
      var invalid = !field.value.trim();
      field.classList.toggle('is-invalid', invalid);
      if (invalid) valid = false;
    });

    var phoneInvalid = !/^[6-9]\d{9}$/.test(phone.value.replace(/\D/g, ''));
    var phoneField = phone.closest('.phone-field') || phone;
    phoneField.classList.toggle('is-invalid', phoneInvalid);
    if (phoneInvalid) valid = false;
    return valid;
  }

  function enquiryDetails(form) {
    return {
      name: form.elements.name.value.trim(),
      phone: form.elements.phone.value.replace(/\D/g, ''),
      requirement: form.elements.requirement.value.trim()
    };
  }

  function mailtoEnquiry(details) {
    var subject = 'Website enquiry from ' + details.name;
    var body = 'Name: ' + details.name + '\nMobile: +91 ' + details.phone +
      '\nRequirement: ' + details.requirement;
    window.location.href = 'mailto:' + COMPANY_ENQUIRY_EMAIL +
      '?subject=' + encodeURIComponent(subject) + '&body=' + encodeURIComponent(body);
  }

  function openWhatsAppEnquiry(details, status) {
    if (!COMPANY_WHATSAPP_NUMBER) {
      status.className = 'form-msg err';
      status.textContent = 'WhatsApp is not configured yet. Please use email or call 07949313008.';
      return;
    }
    var message = 'Hello, my name is ' + details.name + '. My mobile number is +91 ' +
      details.phone + '. My requirement: ' + details.requirement;
    window.location.href = 'https://wa.me/' + COMPANY_WHATSAPP_NUMBER.replace(/\D/g, '') +
      '?text=' + encodeURIComponent(message);
  }

  var form = document.getElementById('enquiryForm');
  if (form) {
    var msg = document.getElementById('formMsg');
    var phoneInput = form.elements['phone'];
    var phoneWrap = phoneInput.closest('.phone-field') || phoneInput;

    phoneInput.addEventListener('input', function () {
      phoneInput.value = phoneInput.value.replace(/\D/g, '').slice(0, 10);
      phoneWrap.classList.remove('is-invalid');
    });

    ['requirement', 'name'].forEach(function (fieldName) {
      form.elements[fieldName].addEventListener('input', function () {
        form.elements[fieldName].classList.remove('is-invalid');
      });
    });

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      if (!validateEnquiry(form)) {
        msg.className = 'form-msg err';
        msg.textContent = 'Please enter your name, requirement and a valid 10-digit mobile number.';
        return;
      }
      msg.className = 'form-msg notice';
      msg.textContent = 'Opening your email app with the enquiry details.';
      mailtoEnquiry(enquiryDetails(form));
    });
  }

  var enquiryModal = document.getElementById('enquiryModal');
  var modalForm = document.getElementById('contactModalForm');
  var modalStatus = document.getElementById('contactModalStatus');
  if (enquiryModal && modalForm && modalStatus) {
    var modalSeenKey = 'pristineEnquiryModalSeen';
    var hasSeenModal = false;
    try {
      hasSeenModal = window.sessionStorage.getItem(modalSeenKey) === '1';
    } catch (error) {
      hasSeenModal = document.cookie.split('; ').indexOf(modalSeenKey + '=1') !== -1;
    }

    if (!hasSeenModal && window.bootstrap && window.bootstrap.Modal) {
      window.setTimeout(function () {
        window.bootstrap.Modal.getOrCreateInstance(enquiryModal).show();
      }, reducedMotion ? 0 : 700);
    }

    enquiryModal.addEventListener('shown.bs.modal', function () {
      try {
        window.sessionStorage.setItem(modalSeenKey, '1');
      } catch (error) {
        document.cookie = modalSeenKey + '=1; path=/; SameSite=Lax';
      }
    });

    modalForm.elements.phone.addEventListener('input', function () {
      this.value = this.value.replace(/\D/g, '').slice(0, 10);
      this.closest('.phone-field').classList.remove('is-invalid');
    });
    ['name', 'requirement'].forEach(function (fieldName) {
      modalForm.elements[fieldName].addEventListener('input', function () {
        this.classList.remove('is-invalid');
      });
    });

    modalForm.querySelectorAll('[data-enquiry-action]').forEach(function (button) {
      button.addEventListener('click', function () {
        if (!validateEnquiry(modalForm)) {
          modalStatus.className = 'form-msg err';
          modalStatus.textContent = 'Please enter your name, requirement and a valid 10-digit mobile number.';
          return;
        }
        var details = enquiryDetails(modalForm);
        if (button.dataset.enquiryAction === 'whatsapp') {
          openWhatsAppEnquiry(details, modalStatus);
        } else {
          modalStatus.className = 'form-msg notice';
          modalStatus.textContent = 'Opening your email app with the enquiry details.';
          mailtoEnquiry(details);
        }
      });
    });

    document.querySelectorAll('[data-open-enquiry]').forEach(function (trigger) {
      trigger.addEventListener('click', function (event) {
        event.preventDefault();
        window.bootstrap.Modal.getOrCreateInstance(enquiryModal).show();
      });
    });
  }

  document.querySelectorAll('[data-contact-email-form]').forEach(function (contactForm) {
    contactForm.addEventListener('submit', function (event) {
      event.preventDefault();
      if (!contactForm.reportValidity()) return;

      var formData = new FormData(contactForm);
      var body = Array.from(formData.entries()).map(function (entry) {
        return entry[0] + ': ' + String(entry[1]).trim();
      }).join('\n');
      var subject = 'Website enquiry from ' + String(formData.get('name')).trim();
      var status = contactForm.querySelector('[data-contact-form-status]');
      if (status) {
        status.className = 'form-msg notice';
        status.textContent = 'Opening your email app with the enquiry details. Review and send the message there.';
      }
      window.location.href = 'mailto:' + COMPANY_ENQUIRY_EMAIL +
        '?subject=' + encodeURIComponent(subject) + '&body=' + encodeURIComponent(body);
    });
  });


  /* -------------------COMPANY VIDEO MODALIframe is injected on open and removed on close so audio stops.------------------- */
  var videoModal = document.getElementById('videoModal');
  var holder = document.getElementById('videoHolder');
  if (videoModal && holder) {
    videoModal.addEventListener('shown.bs.modal', function () {
      if (VIDEO_URL) {
        holder.innerHTML = '<iframe src="' + VIDEO_URL + '?autoplay=1&rel=0" title="Company video" allow="autoplay; encrypted-media; fullscreen" allowfullscreen></iframe>';
      } else {
        holder.innerHTML = '<div class="video-empty"><div><i class="bi bi-camera-video"></i>Company video not available yet.<br><small>Contact our team for more information.</small></div></div>';
      }
    });
    videoModal.addEventListener('hidden.bs.modal', function () { holder.innerHTML = ''; });
  }


  /* -----------FOOTER YEAR---------------- */
  var yr = document.getElementById('year');
  if (yr) yr.textContent = new Date().getFullYear();

})();

