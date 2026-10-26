
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
      var industryMarquee = element.classList.contains('industry-card-swiper');
      var solutionMarquee = element.classList.contains('solution-needs-swiper');
      var marquee = industryMarquee || solutionMarquee;
      if (marquee && !element.dataset.marqueePrepared) {
        var wrapper = element.querySelector('.swiper-wrapper');
        if (wrapper) {
          Array.prototype.slice.call(wrapper.children).forEach(function (slide) {
            var duplicate = slide.cloneNode(true);
            duplicate.classList.add('marquee-copy');
            duplicate.setAttribute('aria-hidden', 'true');
            duplicate.querySelectorAll('[id]').forEach(function (node) {
              node.removeAttribute('id');
            });
            duplicate.querySelectorAll('a, button, input, select, textarea, [tabindex]').forEach(function (node) {
              node.setAttribute('tabindex', '-1');
            });
            wrapper.appendChild(duplicate);
          });
          element.dataset.marqueePrepared = 'true';
        }
      }
      var options = {
        loop: hero || element.classList.contains('featured-swiper') || marquee,
        speed: reducedMotion ? 0 : (marquee ? 9000 : 650),
        grabCursor: true,
        autoplay: reducedMotion ? false : {
          delay: marquee ? 0 : (hero ? HERO_SLIDER_DELAY : GENERAL_SLIDER_DELAY),
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
      } else if (industryMarquee) {
        options.spaceBetween = 14;
        options.slidesPerView = 1.4;
        options.breakpoints = {
          480: { slidesPerView: 2.2 },
          768: { slidesPerView: 3.2 },
          1200: { slidesPerView: 4.1 }
        };
      } else if (solutionMarquee) {
        options.spaceBetween = 14;
        options.slidesPerView = 1.35;
        options.breakpoints = {
          480: { slidesPerView: 2 },
          768: { slidesPerView: 3 },
          1200: { slidesPerView: 4 }
        };
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
      if (marquee) {
        element.addEventListener('focusin', function () {
          if (instance.autoplay) instance.autoplay.stop();
        });
        element.addEventListener('focusout', function (event) {
          if (!element.contains(event.relatedTarget) && !reducedMotion && instance.autoplay) {
            instance.autoplay.start();
          }
        });
      }
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
      var link = event.target.closest('a[href]');
      if (link && window.innerWidth < 992) {
        var collapse = window.bootstrap.Collapse.getInstance(mainNav);
        if (collapse) collapse.hide();
      }
    });
  }

  /* Accessible Products & Services dropdown behavior */
  function setDropdownState(item, open) {
    var toggle = item.querySelector('[data-nav-toggle]');
    item.classList.toggle('is-open', open);
    if (open) item.classList.remove('is-escape-closed');
    if (toggle) toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
  }

  document.querySelectorAll('.nav-dropdown').forEach(function (item) {
    var toggle = item.querySelector('[data-nav-toggle]');
    item.addEventListener('mouseenter', function () {
      if (window.innerWidth >= 992) setDropdownState(item, true);
    });
    item.addEventListener('mouseleave', function () {
      if (window.innerWidth >= 992 && !item.contains(document.activeElement)) {
        setDropdownState(item, false);
      }
    });
    item.addEventListener('focusin', function (event) {
      if (window.innerWidth >= 992 && !(item.classList.contains('is-escape-closed') && event.target === toggle)) {
        setDropdownState(item, true);
      }
    });
    item.addEventListener('focusout', function (event) {
      if (!item.contains(event.relatedTarget)) setDropdownState(item, false);
    });
    if (toggle) {
      toggle.addEventListener('click', function () {
        if (window.innerWidth >= 992) {
          setDropdownState(item, true);
        } else {
          setDropdownState(item, !item.classList.contains('is-open'));
        }
      });
    }
  });

  /* Search the published products, applications, solutions, and insights */
  var searchButton = document.querySelector('.search-btn');
  var searchIcon = searchButton ? searchButton.querySelector('i') : null;
  var searchPanel = document.getElementById('siteSearchPanel');
  var searchInput = document.getElementById('siteSearchInput');
  var searchResults = document.getElementById('siteSearchResults');
  var searchMessage = document.getElementById('siteSearchMessage');
  var searchForm = document.getElementById('siteSearchPanel');
  var searchIndex = [
    { title: 'Heat Shrinkable Sleeves', category: 'Products & Services', description: 'Electrical insulation sleeves and product enquiries.', url: 'product-details.php?slug=heat-shrinkable-sleeves', terms: 'heat shrink polyolefin insulation sleeves product' },
    { title: 'Right Angle Boots', category: 'Products & Services', description: 'Cable accessories and termination products.', url: 'product-details.php?slug=right-angle-boots', terms: 'right angle boot termination' },
    { title: 'Busbar Sleeves', category: 'Products & Services', description: 'Electrical insulation accessories for busbar applications.', url: 'product-details.php?slug=busbar-sleeves', terms: 'busbar sleeves' },
    { title: 'Separable Connectors', category: 'Products & Services', description: 'Browse cable connector products and related accessories.', url: 'product-details.php?slug=separable-connectors', terms: 'separable connector cable accessories' },
    { title: 'Cable Jointing Kits', category: 'Products & Services', description: 'Cable jointing products and application support.', url: 'product-details.php?slug=cable-jointing-kits', terms: 'cable jointing kit joints' },
    { title: 'Heat Shrinkable Joints', category: 'Products & Services', description: 'Heat shrinkable joint products for cable applications.', url: 'product-details.php?slug=heat-shrinkable-joints', terms: 'heat shrink joint cable' },
    { title: 'Outdoor Termination Kits', category: 'Products & Services', description: 'Explore termination products in the product range.', url: 'product-details.php?slug=outdoor-termination-kits', terms: 'outdoor termination kit' },
    { title: 'Repair Services', category: 'Services', description: 'Enquire about repair service requirements.', url: 'product-details.php?slug=repair-services', terms: 'repair service support' },
    { title: 'Other Accessories', category: 'Products & Services', description: 'Enquire about additional cable accessories.', url: 'product-details.php?slug=other-accessories', terms: 'other accessories cable' },
    { title: 'Power Distribution', category: 'Industries', description: 'Electrical insulation and cable accessory applications.', url: 'industries.php#power-distribution', terms: 'power distribution transmission networks substations' },
    { title: 'Industrial Infrastructure', category: 'Industries', description: 'Applications across industrial environments and infrastructure.', url: 'industries.php#industrial-infrastructure', terms: 'industrial infrastructure applications' },
    { title: 'Commercial Buildings', category: 'Industries', description: 'Building electrical systems and connections.', url: 'industries.php#commercial-buildings', terms: 'commercial building electrical systems' },
    { title: 'Railways & Metro', category: 'Industries', description: 'Electrical systems used in rail and urban transport networks.', url: 'industries.php#railways', terms: 'railway metro transport' },
    { title: 'Renewable Energy', category: 'Industries', description: 'Electrical connection products for solar and wind projects.', url: 'industries.php#renewable-energy', terms: 'renewable solar wind energy' },
    { title: 'Electrical Insulation Solutions', category: 'Solutions', description: 'Explore insulation products and application guidance.', url: 'solutions.php#featured-solution', terms: 'electrical insulation solutions' },
    { title: 'Cable Termination & Jointing', category: 'Solutions', description: 'Termination and jointing products for electrical networks.', url: 'solutions.php#solution-range', terms: 'cable termination jointing' },
    { title: 'Protection & Accessories', category: 'Solutions', description: 'Browse protection products and other accessories.', url: 'solutions.php#solution-range', terms: 'protection accessories identification' },
    { title: 'Why Dependable Insulation Matters', category: 'Insights', description: 'Electrical insulation and product selection for network applications.', url: 'blog-details.php?slug=reliable-electrical-insulation', terms: 'blog electrical infrastructure networks' },
    { title: 'Understanding Heat Shrinkable Sleeves', category: 'Insights', description: 'A starting point for sleeve applications and product selection.', url: 'blog-details.php?slug=understanding-heat-shrinkable-sleeves', terms: 'blog product guide' },
    { title: 'Key Considerations for Cable Jointing', category: 'Insights', description: 'Application, compatibility, and product selection for cable connections.', url: 'blog-details.php?slug=key-considerations-for-cable-jointing', terms: 'blog cable accessories' },
    { title: 'Electrical Insulation Across Industries', category: 'Insights', description: 'How requirements vary across distribution, infrastructure, and energy.', url: 'blog-details.php?slug=electrical-insulation-across-industries', terms: 'blog industry applications' },
    { title: 'Contact Pristine Engineering Services', category: 'Contact', description: 'Find the Mumbai office, phone number, email, and enquiry form.', url: 'contact.php', terms: 'contact phone email Mumbai address enquiry' }
  ];

  function closeSearch(restoreFocus) {
    if (!searchPanel || !searchButton) return;
    searchPanel.hidden = true;
    searchButton.setAttribute('aria-expanded', 'false');
    searchButton.setAttribute('aria-label', 'Open website search');
    if (searchIcon) {
      searchIcon.classList.remove('bi-x-lg');
      searchIcon.classList.add('bi-search');
    }
    if (restoreFocus && searchInput) searchButton.focus();
  }

  function renderSearchResults(query) {
    if (!searchResults || !searchMessage) return;
    searchResults.textContent = '';
    var normalized = query.trim().toLocaleLowerCase();
    if (normalized.length < 2) {
      searchMessage.textContent = 'Enter at least two letters to search.';
      return;
    }
    var matches = searchIndex.filter(function (item) {
      return (item.title + ' ' + item.category + ' ' + item.description + ' ' + item.terms)
        .toLocaleLowerCase().indexOf(normalized) !== -1;
    }).slice(0, 8);
    if (!matches.length) {
      searchMessage.textContent = 'No results found. Try a product, industry, or application.';
      return;
    }
    searchMessage.textContent = matches.length + (matches.length === 1 ? ' result found.' : ' results found.');
    matches.forEach(function (item) {
      var listItem = document.createElement('li');
      var link = document.createElement('a');
      var title = document.createElement('strong');
      var description = document.createElement('span');
      var category = document.createElement('small');
      link.href = item.url;
      title.textContent = item.title;
      description.textContent = item.description;
      category.textContent = item.category;
      link.appendChild(title);
      link.appendChild(description);
      link.appendChild(category);
      listItem.appendChild(link);
      searchResults.appendChild(listItem);
    });
  }

  if (searchButton && searchPanel && searchInput && searchForm) {
    searchButton.addEventListener('click', function () {
      var open = searchPanel.hidden;
      searchPanel.hidden = !open;
      searchButton.setAttribute('aria-expanded', open ? 'true' : 'false');
      searchButton.setAttribute('aria-label', open ? 'Close website search' : 'Open website search');
      if (searchIcon) {
        searchIcon.classList.toggle('bi-search', !open);
        searchIcon.classList.toggle('bi-x-lg', open);
      }
      if (open) searchInput.focus();
    });
    searchForm.addEventListener('submit', function (event) {
      event.preventDefault();
      renderSearchResults(searchInput.value);
    });
    searchInput.addEventListener('input', function () {
      renderSearchResults(searchInput.value);
    });
    searchResults.addEventListener('click', function (event) {
      if (event.target.closest('a')) closeSearch(false);
    });
    document.addEventListener('click', function (event) {
      if (!searchPanel.hidden && !searchPanel.contains(event.target) && !searchButton.contains(event.target)) {
        closeSearch(false);
      }
    });
  }

  document.addEventListener('keydown', function (event) {
    if (event.key !== 'Escape') return;
    if (searchPanel && !searchPanel.hidden) {
      closeSearch(true);
      return;
    }
    var openDropdown = document.querySelector('.nav-dropdown.is-open');
    if (openDropdown) {
      var toggle = openDropdown.querySelector('[data-nav-toggle]');
      openDropdown.classList.add('is-escape-closed');
      setDropdownState(openDropdown, false);
      if (toggle) toggle.focus();
    }
  });


  /* ---------------SCROLL REVEAL--------------------- */
  document.querySelectorAll('main > section').forEach(function (section) {
    var content = section.querySelector(':scope > .container, :scope > .container-xl, :scope > .page-hero-content');
    if (content && !content.querySelector('.reveal')) content.classList.add('reveal');
  });
  var revealEls = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window && !reducedMotion) {
    document.documentElement.classList.add('has-scroll-reveal');
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
    var valid = true;
    Array.prototype.slice.call(form.querySelectorAll('[required]')).forEach(function (field) {
      var invalid = !field.checkValidity();
      var visualField = field.closest('.phone-field') || field;
      field.classList.toggle('is-invalid', invalid);
      visualField.classList.toggle('is-invalid', invalid);
      if (invalid) valid = false;
    });
    return valid;
  }

  function formValue(form, name) {
    var field = form.elements[name];
    return field ? field.value.trim() : '';
  }

  function enquiryDetails(form) {
    return {
      name: formValue(form, 'name'),
      company: formValue(form, 'company'),
      phone: formValue(form, 'phone').replace(/\D/g, ''),
      email: formValue(form, 'email'),
      product: formValue(form, 'product'),
      requirement: formValue(form, 'requirement')
    };
  }

  function mailtoEnquiry(details) {
    var subject = 'Website enquiry from ' + details.name;
    var body = 'Name: ' + details.name +
      (details.company ? '\nCompany: ' + details.company : '') +
      '\nMobile: +91 ' + details.phone +
      (details.email ? '\nEmail: ' + details.email : '') +
      (details.product ? '\nProduct / service: ' + details.product : '') +
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
    var message = 'Hello, my name is ' + details.name + '.' +
      (details.company ? ' Company: ' + details.company + '.' : '') +
      ' My mobile number is +91 ' + details.phone + '.' +
      (details.email ? ' My email address is ' + details.email + '.' : '') +
      (details.product ? ' Product or service: ' + details.product + '.' : '') +
      ' My requirement: ' + details.requirement;
    var whatsappNumber = COMPANY_WHATSAPP_NUMBER.replace(/\D/g, '');
    if (/^[6-9]\d{9}$/.test(whatsappNumber)) whatsappNumber = '91' + whatsappNumber;
    window.location.href = 'https://wa.me/' + whatsappNumber +
      '?text=' + encodeURIComponent(message);
  }

  document.querySelectorAll('input[type="tel"][inputmode="numeric"]').forEach(function (input) {
    input.addEventListener('input', function () {
      var maximum = parseInt(input.getAttribute('maxlength'), 10) || 10;
      input.value = input.value.replace(/\D/g, '').slice(0, maximum);
      input.classList.remove('is-invalid');
      var wrapper = input.closest('.phone-field');
      if (wrapper) wrapper.classList.remove('is-invalid');
    });
  });

  var form = document.getElementById('enquiryForm');
  if (form) {
    var msg = document.getElementById('formMsg');
    var formBusy = false;

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      if (formBusy) return;
      if (!validateEnquiry(form)) {
        msg.className = 'form-msg err';
        msg.textContent = 'Please enter your name, requirement and a valid 10-digit mobile number.';
        form.reportValidity();
        return;
      }
      formBusy = true;
      var submitButton = form.querySelector('[type="submit"]');
      if (submitButton) submitButton.disabled = true;
      msg.className = 'form-msg notice';
      msg.textContent = 'Opening your email app. Review and send the prepared message there.';
      mailtoEnquiry(enquiryDetails(form));
      window.setTimeout(function () {
        formBusy = false;
        if (submitButton) submitButton.disabled = false;
      }, 1800);
    });
  }

  var enquiryModal = document.getElementById('enquiryModal');
  var modalForm = document.getElementById('contactModalForm');
  var modalStatus = document.getElementById('contactModalStatus');
  if (enquiryModal && modalForm && modalStatus) {
    var modalSeenKey = 'pristineEnquiryModalSeen';
    var hasSeenModal = false;
    var modalDismissedThisPage = false;
    try {
      hasSeenModal = window.sessionStorage.getItem(modalSeenKey) === '1';
    } catch (error) {
      hasSeenModal = document.cookie.split('; ').indexOf(modalSeenKey + '=1') !== -1;
    }

    if (!hasSeenModal && window.bootstrap && window.bootstrap.Modal) {
      window.setTimeout(function () {
        if (!hasSeenModal && !modalDismissedThisPage) {
          window.bootstrap.Modal.getOrCreateInstance(enquiryModal).show();
        }
      }, reducedMotion ? 0 : 700);
    }

    function markModalSeen() {
      hasSeenModal = true;
      try {
        window.sessionStorage.setItem(modalSeenKey, '1');
      } catch (error) {
        document.cookie = modalSeenKey + '=1; path=/; SameSite=Lax';
      }
    }

    enquiryModal.addEventListener('shown.bs.modal', markModalSeen);
    enquiryModal.addEventListener('hidden.bs.modal', function () {
      modalDismissedThisPage = true;
      markModalSeen();
    });

    var modalBusy = false;
    modalForm.addEventListener('submit', function (event) {
      event.preventDefault();
      if (modalBusy) return;
      if (!validateEnquiry(modalForm)) {
        modalStatus.className = 'form-msg err';
        modalStatus.textContent = 'Check the required fields. Use a valid email address and 10-digit Indian mobile number.';
        modalForm.reportValidity();
        return;
      }

      var action = event.submitter ? event.submitter.value : 'email';
      var details = enquiryDetails(modalForm);
      if (action === 'whatsapp' && !COMPANY_WHATSAPP_NUMBER) {
        modalStatus.className = 'form-msg err';
        modalStatus.textContent = 'WhatsApp is not configured. Please use email or call 07949313008.';
        return;
      }
      var submitButtons = modalForm.querySelectorAll('[type="submit"]');
      modalBusy = true;
      Array.prototype.forEach.call(submitButtons, function (button) {
        button.dataset.originalContent = button.innerHTML;
        button.disabled = true;
      });
      if (event.submitter) {
        event.submitter.innerHTML = '<i class="bi bi-arrow-repeat" aria-hidden="true"></i> Preparing message…';
      }

      if (action === 'whatsapp') {
        modalStatus.className = 'form-msg notice';
        modalStatus.textContent = 'Opening WhatsApp with a draft. Review and send the message there.';
        openWhatsAppEnquiry(details, modalStatus);
      } else {
        modalStatus.className = 'form-msg notice';
        modalStatus.textContent = 'Opening your email app with a draft. Review and send the message there.';
        mailtoEnquiry(details);
      }

      window.setTimeout(function () {
        modalBusy = false;
        Array.prototype.forEach.call(submitButtons, function (button) {
          button.disabled = false;
          if (button.dataset.originalContent) {
            button.innerHTML = button.dataset.originalContent;
            delete button.dataset.originalContent;
          }
        });
      }, 1800);
    });

    document.querySelectorAll('[data-open-enquiry]').forEach(function (trigger) {
      trigger.addEventListener('click', function (event) {
        event.preventDefault();
        var productField = document.getElementById('contactModalProduct');
        var productName = trigger.getAttribute('data-product-name');
        if (productField && productName) productField.value = productName;
        window.bootstrap.Modal.getOrCreateInstance(enquiryModal).show();
      });
    });
  }

  document.querySelectorAll('[data-contact-email-form]').forEach(function (contactForm) {
    var busy = false;
    contactForm.addEventListener('submit', function (event) {
      event.preventDefault();
      if (busy || !contactForm.reportValidity()) return;

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
      busy = true;
      var submitButton = contactForm.querySelector('[type="submit"]');
      if (submitButton) submitButton.disabled = true;
      window.location.href = 'mailto:' + COMPANY_ENQUIRY_EMAIL +
        '?subject=' + encodeURIComponent(subject) + '&body=' + encodeURIComponent(body);
      window.setTimeout(function () {
        busy = false;
        if (submitButton) submitButton.disabled = false;
      }, 1800);
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
