
document.querySelectorAll('.productos .card .imagen-card img').forEach(img => {
  img.addEventListener('click', function(e) {
    e.stopPropagation();
    document.getElementById('modal-img-producto-src').src = this.src;
    document.getElementById('modal-img-producto').classList.add('active');
  });
});
document.getElementById('close-modal-img').onclick = function() {
  document.getElementById('modal-img-producto').classList.remove('active');
};
document.getElementById('modal-img-producto').onclick = function(e) {
  if (e.target === this) this.classList.remove('active');
};
