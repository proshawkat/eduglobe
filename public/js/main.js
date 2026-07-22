document.addEventListener('DOMContentLoaded', () => {
  // Navbar scroll effect
  const navbar = document.querySelector('.navbar');
  window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 50);
  });

  // Hamburger menu
  const hamburger = document.querySelector('.hamburger');
  const navLinks = document.querySelector('.nav-links');
  if (hamburger) {
    hamburger.addEventListener('click', () => {
      navLinks.classList.toggle('active');
      hamburger.classList.toggle('active');
    });
  }

  // Smooth scroll for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      e.preventDefault();
      const t = document.querySelector(a.getAttribute('href'));
      if (t) { t.scrollIntoView({ behavior: 'smooth', block: 'start' }); navLinks.classList.remove('active'); }
    });
  });

  // Hero Slider
  const slides = document.querySelectorAll('.hero-slide');
  const indicators = document.querySelectorAll('.hero-indicators span');
  let current = 0;
  function showSlide(n) {
    slides.forEach((s, i) => { s.classList.toggle('active', i === n); });
    indicators.forEach((d, i) => { d.classList.toggle('active', i === n); });
    current = n;
  }
  indicators.forEach((d, i) => d.addEventListener('click', () => showSlide(i)));
  if (slides.length > 1) setInterval(() => showSlide((current + 1) % slides.length), 5000);

  // Animated Counters
  const counters = document.querySelectorAll('.stat-number');
  const observed = new Set();
  const counterObs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting && !observed.has(e.target)) {
        observed.add(e.target);
        const el = e.target;
        const target = parseFloat(el.dataset.target);
        const suffix = el.dataset.suffix || '';
        const isFloat = String(target).includes('.');
        const dur = 2000, step = 30;
        let cur = 0;
        const inc = target / (dur / step);
        const timer = setInterval(() => {
          cur += inc;
          if (cur >= target) { cur = target; clearInterval(timer); }
          el.textContent = (isFloat ? cur.toFixed(1) : Math.floor(cur)) + suffix;
        }, step);
      }
    });
  }, { threshold: 0.5 });
  counters.forEach(c => counterObs.observe(c));

  // FAQ Accordion
  document.querySelectorAll('.faq-q').forEach(q => {
    q.addEventListener('click', () => {
      const item = q.parentElement;
      const ans = item.querySelector('.faq-a');
      const isActive = item.classList.contains('active');
      document.querySelectorAll('.faq-item').forEach(fi => {
        fi.classList.remove('active');
        fi.querySelector('.faq-a').style.maxHeight = '0';
      });
      if (!isActive) {
        item.classList.add('active');
        ans.style.maxHeight = ans.scrollHeight + 'px';
      }
    });
  });

  // Testimonial Slider
  const testTrack = document.querySelector('.test-track');
  const prevBtn = document.querySelector('.test-prev');
  const nextBtn = document.querySelector('.test-next');
  let testIdx = 0;
  const testPages = document.querySelectorAll('.test-card');
  function moveTest(n) {
    testIdx = Math.max(0, Math.min(n, testPages.length - 1));
    if (testTrack) testTrack.style.transform = `translateX(-${testIdx * 100}%)`;
  }
  if (prevBtn) prevBtn.addEventListener('click', () => moveTest(testIdx - 1));
  if (nextBtn) nextBtn.addEventListener('click', () => moveTest(testIdx + 1));

  // Scroll reveal animation
  const reveals = document.querySelectorAll('.service-card, .dest-card, .scholar-card, .event-card, .blog-card, .process-step, .about-grid, .faq-item');
  const revealObs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.style.opacity = '1';
        e.target.style.transform = 'translateY(0)';
        revealObs.unobserve(e.target);
      }
    });
  }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
  reveals.forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(24px)';
    el.style.transition = 'opacity .6s ease, transform .6s ease';
    revealObs.observe(el);
  });
});

// Destination Card Accordion (Mobile only)
function toggleDestCard(imageWrapper) {
  if (window.innerWidth > 768) return;
  const card = imageWrapper.closest('.dest-card');
  const isOpen = card.classList.contains('open');
  
  // Close all other open destination cards
  document.querySelectorAll('.dest-card.open').forEach(c => {
    if (c !== card) c.classList.remove('open');
  });
  
  // Toggle the clicked one
  card.classList.toggle('open', !isOpen);
}
