// Initialising the canvas
var canvas = document.querySelector('#matrix'),
    ctx = canvas.getContext('2d');

// Setting the width and height of the canvas
canvas.width = window.innerWidth/2;
canvas.height = window.innerHeight / 2;

// Setting up the letters
var letters = 'ABCDEFGHIJKLMNOPQQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
letters = letters.split('');

// Setting up the columns
var fontSize = 10,
    columns = canvas.width / fontSize,
    variation = 0.95; //proche de 1 → beaucoup de variation, proche de 0 → beaucoup moin de variation

// Setting up the drops
var drops = []; // nombre de columns
for (var i = 0; i < columns; i++) {
    drops[i] = 0;
}


// Setting up the draw function
function draw() {
    ctx.fillStyle = 'rgba(29, 30, 40, .5)';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    for (var i = 0; i < drops.length; i++) {
        var text = letters[Math.floor(Math.random() * letters.length)];
        ctx.fillStyle = '#ffa500';
        ctx.fillText(text, i * fontSize, drops[i] * fontSize);
        drops[i]++;
        if (drops[i] * fontSize > canvas.height && Math.random() > variation) {
            drops[i] = 0;
        }
    }
}

// Loop the animation
setInterval(draw, 65);