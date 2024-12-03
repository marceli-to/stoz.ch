document.addEventListener('DOMContentLoaded', () => {
  const selectors = {
    marqueeAnimateScroll: '[data-marquee-animate-scroll]',
    marqueePauseOnHover: '[data-marquee-pause-on-hover]'
  }
  const container = document.querySelector(selectors.marqueePauseOnHover);
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      const animated = entry.target.querySelectorAll(selectors.marqueeAnimateScroll);
      animated.forEach(element => {
        element.style.animationPlayState = entry.isIntersecting ? 'running' : 'paused';
      });
    });
  }, { threshold: 0.5 });
  observer.observe(container);
});