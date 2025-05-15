
  const track = document.querySelector(".carousel-track");
  const prevBtn = document.querySelector(".prev");
  const nextBtn = document.querySelector(".next");

  let currentIndex = 0;

  nextBtn.addEventListener("click", () => {
    const cards = document.querySelectorAll(".card");
    if (currentIndex < cards.length - 1) {
      currentIndex++;
      track.style.transform = `translateX(-${currentIndex * (cards[0].offsetWidth + 20)}px)`;
    }
  });

  prevBtn.addEventListener("click", () => {
    if (currentIndex > 0) {
      currentIndex--;
      track.style.transform = `translateX(-${currentIndex * (track.children[0].offsetWidth + 20)}px)`;
    }
  });

