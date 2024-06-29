// Add event listeners to flip the cards on hover
const cards = document.querySelectorAll('.card, .card1, .card2, .card3, .card4');

cards.forEach(card => {
  card.addEventListener('mouseenter', () => {
    card.classList.add('is-flipped');
  });

  card.addEventListener('mouseleave', () => {
    card.classList.remove('is-flipped');
  });
});
