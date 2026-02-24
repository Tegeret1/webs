(function () {
  const searchOverlay = document.getElementById('searchOverlay');
  const drawer = document.getElementById('drawer');

  document.querySelectorAll('[data-open="search"]').forEach((btn) => {
    btn.addEventListener('click', () => searchOverlay && searchOverlay.classList.add('active'));
  });

  document.querySelectorAll('[data-close="search"]').forEach((btn) => {
    btn.addEventListener('click', () => searchOverlay && searchOverlay.classList.remove('active'));
  });

  document.querySelectorAll('[data-open="drawer"]').forEach((btn) => {
    btn.addEventListener('click', () => drawer && drawer.classList.add('active'));
  });

  document.querySelectorAll('[data-close="drawer"]').forEach((btn) => {
    btn.addEventListener('click', () => drawer && drawer.classList.remove('active'));
  });
})();
