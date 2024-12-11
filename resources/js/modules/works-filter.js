(function () {
  const selectors = {
    filterTerm: '[data-category]',
    filterItem: '[data-categories]',
  };

  const updateActiveState = (activeTerm) => {
    document.querySelectorAll(selectors.filterTerm).forEach(el => {
      if (el.dataset.category === activeTerm) {
        el.classList.add('!bg-black');
        el.classList.add('!text-white');
      } else {
        el.classList.remove('!bg-black');
        el.classList.remove('!text-white');
      }
    });
  };

  const init = () => {
    document.querySelectorAll(selectors.filterTerm).forEach((el) => {
      el.addEventListener('click', filter);
    });

    const initialCategory = window.location.hash.slice(1);
    if (initialCategory) {
      const matchingFilter = document.querySelector(`[data-category="${initialCategory}"]`);
      if (matchingFilter) {
        filterItems(initialCategory);
        updateActiveState(initialCategory);
      }
    }
  };

  const filterItems = (term) => {
    const items = document.querySelectorAll(selectors.filterItem);
    items.forEach((el) => {
      if (term === 'all') {
        el.classList.remove('hidden');
        return;
      }
      if (el.dataset.categories.includes(term)) {
        el.classList.remove('hidden');
      } else {
        el.classList.add('hidden');
      }
    });
  };

  const filter = (e) => {
    e.preventDefault();
    const term = e.currentTarget.dataset.category;
    
    window.location.hash = term;
    filterItems(term);
    updateActiveState(term);
  };

  if (document.querySelector(selectors.filterTerm) && document.querySelector(selectors.filterItem)) {
    init();
  }
})();