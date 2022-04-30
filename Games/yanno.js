var character = document.querySelector(".character");
var map = document.querySelector(".map");
var E_bubble = document.querySelector(".interraction_bubble")

var character_info = {
   x:90,
   y:34,
   speed:0.5
}

function init() {
   var timecolor = "#6DB4EB";

   var camera = document.querySelector(".camera");

   let time = new Date();

   if (time.getHours() >= 20) { //entre 20h et minuit
      timecolor = "#2e4482";
   } else {
      if (time.getHours() >= 17) { //entre 17h et minuit
         timecolor = "#629fe3";
      } else {
         if (time.getHours() >= 14) { //entre 14h et 17h
            timecolor = "#6DB4EB";
         } else {
            if (time.getHours() >= 8) { //entre 8h et 14h
               timecolor = "#94CDFD";
            } else {
               if (time.getHours() >= 0) { //entre minuit et 8h
                  timecolor = "#131862";
               }
            }
         }
      }
   }

   var colorPicker = new window.iro.ColorPicker("#picker", {
      // Set the size of the color picker
      width: 320,
      // Set the initial color to pure red
      color: timecolor
   });

   colorPicker.on('color:change', function (color) {
      camera.style.backgroundColor = color.hexString;
   });

   camera.style.backgroundColor = timecolor

}

init()
var held_directions = []; //State of which arrow keys we are holding down

var mapLimit = {
   leftLimit: -8,//x mur de gauche
   rightLimit: 216,// x mur de droite
   topLimit: 24, //y mur en haut
   bottomLimit: 368 // y mur en bas
}

var list_interraction = [
   listSign = {
      wall_sign: {
         rangeX: {
            xmin: 132,
            xmax: 142
         },
         rangeY: {
            ymin: 24,
            ymax: 24
         },
         msg: "Wall sign event"
      },
      fountain_sign: {
         rangeX: {
            xmin: 141,
            xmax: 152
         },
         rangeY: {
            ymin: 313,
            ymax: 320
         },
         msg: "Fountain sign event"
      }
   },
   npc = {
      cat: {
         rangeX: {
            xmin: 56,
            xmax: 60
         },
         rangeY: {
            ymin: 33,
            ymax: 46
         },
         msg: "Miaaouuu"
      },
      mother: {
         rangeX: {
            xmin: 101,
            xmax: 106
         },
         rangeY: {
            ymin: 40,
            ymax: 44
         },
         msg: "Bienvenue dans les Test d'Ywee, c'est encore en construction. Soyez indulgents ! Merci"
      }
   },
   door = {
         rangeX: {
            xmin: 84,
            xmax: 94
         },
         rangeY: {
            ymin: 23,
            ymax: 25
         },
         msg: "Door event"
      }
];

var listDecor = [
   fountain = {
      leftLimit: 185,//x mur de gauche (fait)
      rightLimit: 100,// x mur de droite (fait)
      topLimit: 320, //y mur en haut (fait)
      bottomLimit: 248 // y mur en bas (fait)
   }
]

var interraction_item = null

const placeCharacter = () => {

   var pixelSize = parseInt(
      getComputedStyle(document.documentElement).getPropertyValue('--pixel-size')
   );

   const held_direction = held_directions[0];
   if (held_direction) {
      if (held_direction === directions.right) { character_info.x += character_info.speed; } //leftlimit
      if (held_direction === directions.left) { character_info.x -= character_info.speed; } //rightlimit
      if (held_direction === directions.down) { character_info.y += character_info.speed; } //toplimit
      if (held_direction === directions.up) { character_info.y -= character_info.speed; } //botlimit
      character.setAttribute("facing", held_direction);
   }
   character.setAttribute("walking", held_direction ? "true" : "false");

   //Limits (gives the illusion of walls)
   //place du pixel sur la ligne noir , - ou + 34 ou 90
   if (character_info.x < mapLimit.leftLimit) { character_info.x = mapLimit.leftLimit; }
   if (character_info.x > mapLimit.rightLimit) { character_info.x = mapLimit.rightLimit; }
   if (character_info.y < mapLimit.topLimit) { character_info.y = mapLimit.topLimit; }
   if (character_info.y > mapLimit.bottomLimit) { character_info.y = mapLimit.bottomLimit; }

   interraction_item = signInterraction() || npcInterraction()

   if (interraction_item != null) {
      displayBubble(true)
   } else {
      displayBubble()
   }



   var camera_left = pixelSize * 66;
   var camera_top = pixelSize * 42;

   map.style.transform = `translate3d( ${-character_info.x * pixelSize + camera_left}px, ${-character_info.y * pixelSize + camera_top}px, 0 )`;

   character.style.transform = `translate3d( ${character_info.x * pixelSize}px, ${character_info.y * pixelSize}px, 0 )`;
}

signInterraction = () => {
   if ((character_info.x >= list_interraction[0].wall_sign.rangeX.xmin && character_info.x <= list_interraction[0].wall_sign.rangeX.xmax) && (character_info.y >= list_interraction[0].wall_sign.rangeY.ymin && character_info.y <= list_interraction[0].wall_sign.rangeY.ymax)) {
      inFrontSign = true;
      return {
         name: "Wall Sign",
         msg: list_interraction[0].wall_sign.msg
      }
   } else {
      if ((character_info.x >= list_interraction[0].fountain_sign.rangeX.xmin && character_info.x <= list_interraction[0].fountain_sign.rangeX.xmax) && (character_info.y >= list_interraction[0].fountain_sign.rangeY.ymin && character_info.y <= list_interraction[0].fountain_sign.rangeY.ymax)) {
         inFrontSign = true;
         return {
            name: "Fountain Sign",
            msg: list_interraction[0].fountain_sign.msg
         }
      } else {
         inFrontSign = false;
         return null
      }
   }
}

npcInterraction = () => {
   if ((character_info.x >= list_interraction[1].cat.rangeX.xmin && character_info.x <= list_interraction[1].cat.rangeX.xmax) && (character_info.y >= list_interraction[1].cat.rangeY.ymin && character_info.y <= list_interraction[1].cat.rangeY.ymax)) {
      inFrontSign = true;
      return {
         name: "Cat",
         msg: list_interraction[1].cat.msg
      }
   } else {
      if ((character_info.x >= list_interraction[1].mother.rangeX.xmin && character_info.x <= list_interraction[1].mother.rangeX.xmax) && (character_info.y >= list_interraction[1].mother.rangeY.ymin && character_info.y <= list_interraction[1].mother.rangeY.ymax)) {
         inFrontSign = true;
         return {
            name: "Mother",
            msg: list_interraction[1].mother.msg
         }
      } else {
         if ((character_info.x >= list_interraction[2].rangeX.xmin && character_info.x <= list_interraction[2].rangeX.xmax) && (character_info.y >= list_interraction[2].rangeY.ymin && character_info.y <= list_interraction[2].rangeY.ymax)) {
            inFrontSign = true;
            return {
               name: "Door",
               msg: list_interraction[2].msg
            }
         } else {
            inFrontSign = false;
            return null
         }
      }
   }
}

displayBubble = (lock = false) => {
   if (lock) {
      E_bubble.style.visibility = "visible"
   } else {
      E_bubble.style.visibility = "hidden"
   }
}

//Set up the game loop
const step = () => {
   placeCharacter();
   window.requestAnimationFrame(() => {
      step();
   })
}
step(); //kick off the first step!



/* Direction key state */
const directions = {
   up: "up",
   down: "down",
   left: "left",
   right: "right",
}
const keys = {
   38: directions.up,
   90: directions.up,
   37: directions.left,
   81: directions.left,
   39: directions.right,
   68: directions.right,
   40: directions.down,
   83: directions.down,
}

const interractionKeys = [
   69
]

document.addEventListener("keydown", (e) => {
   var dir = keys[e.which];
   if (dir && held_directions.indexOf(dir) === -1) {
      held_directions.unshift(dir)
   }
   if (inFrontSign && interractionKeys.indexOf(e.keyCode) !== -1) {
      console.log(interraction_item.name+": "+interraction_item.msg)
   }
   if(e.keyCode == "69"){
      console.log(character_info.x,character_info.y)
   }
   if (e.keyCode == "32") {
      character_info.speed = 1;
   }
})

document.addEventListener("keyup", (e) => {
   var dir = keys[e.which];
   var index = held_directions.indexOf(dir);
   if (index > -1) {
      held_directions.splice(index, 1)
   }
   if (e.keyCode == "32") {
      character_info.speed = 0.5
   }
});

var inFrontSign = false;

/* BONUS! Dpad functionality for mouse and touch */
var isPressed = false;
const removePressedAll = () => {
   document.querySelectorAll(".dpad-button").forEach(d => {
      d.classList.remove("pressed")
   })
}
document.body.addEventListener("mousedown", () => {
   isPressed = true;
})
document.body.addEventListener("mouseup", () => {
   isPressed = false;
   held_directions = [];
   removePressedAll();
})
const handleDpadPress = (direction, click) => {
   if (click) {
      isPressed = true;
   }
   held_directions = (isPressed) ? [direction] : []

   if (isPressed) {
      removePressedAll();
      document.querySelector(".dpad-" + direction).classList.add("pressed");
   }
}
//Bind a ton of events for the dpad
document.querySelector(".dpad-left").addEventListener("touchstart", (e) => handleDpadPress(directions.left, true));
document.querySelector(".dpad-up").addEventListener("touchstart", (e) => handleDpadPress(directions.up, true));
document.querySelector(".dpad-right").addEventListener("touchstart", (e) => handleDpadPress(directions.right, true));
document.querySelector(".dpad-down").addEventListener("touchstart", (e) => handleDpadPress(directions.down, true));

document.querySelector(".dpad-left").addEventListener("mousedown", (e) => handleDpadPress(directions.left, true));
document.querySelector(".dpad-up").addEventListener("mousedown", (e) => handleDpadPress(directions.up, true));
document.querySelector(".dpad-right").addEventListener("mousedown", (e) => handleDpadPress(directions.right, true));
document.querySelector(".dpad-down").addEventListener("mousedown", (e) => handleDpadPress(directions.down, true));

document.querySelector(".dpad-left").addEventListener("mouseover", (e) => handleDpadPress(directions.left));
document.querySelector(".dpad-up").addEventListener("mouseover", (e) => handleDpadPress(directions.up));
document.querySelector(".dpad-right").addEventListener("mouseover", (e) => handleDpadPress(directions.right));
document.querySelector(".dpad-down").addEventListener("mouseover", (e) => handleDpadPress(directions.down));