document.addEventListener('DOMContentLoaded', () => {

  const selector = '[data-animation-observe]';
  const animationClass = 'is-visible';
  const rootMargin = '0px';
  const threshold = 0.4;

  const observerOptions = {
    root: null,
    rootMargin,
    threshold
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add(animationClass);
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  document.querySelectorAll(selector).forEach(element => {
    observer.observe(element);
  });
});
