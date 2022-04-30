// Wrap every letter in a span
var textWrapper1 = document.querySelector('.ml1 .letters');
if (textWrapper1 != undefined) {
  textWrapper1.innerHTML = textWrapper1.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

  anime.timeline({ loop: false })
    .add({
      targets: '.ml1 .letter',
      scale: [0.3, 1],
      opacity: [0, 1],
      translateZ: 0,
      easing: "easeOutExpo",
      duration: 800,
      delay: (el, i) => 70 * (i + 1)
    }).add({
      targets: '.ml1 .line',
      scaleX: [0, 1],
      opacity: [0.5, 1],
      easing: "easeOutExpo",
      duration: 900,
      offset: '-=875',
      delay: (el, i, l) => 80 * (l - i)
    });
}