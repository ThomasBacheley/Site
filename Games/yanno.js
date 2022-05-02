var character = document.querySelector(".character");
var map = document.querySelector(".map");
var E_bubble = document.querySelector(".interraction_bubble")
var character_spritesheet = document.querySelector(".character_spritesheet")

var tchat = document.querySelector(".tchat")

var character_info = {
   speed: 0.5
}

// function RB_style(name_style){
//    console.log(name_style)
//    character_spritesheet.setAttribute("style","background: url(\"./assets/character/"+name_style.toLowerCase()+"Character.png\") no-repeat no-repeat !important")
// }
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

   // var colorPicker = new window.iro.ColorPicker("#picker", {
   //    // Set the size of the color picker
   //    width: 320,
   //    // Set the initial color to pure red
   //    color: timecolor
   // });

   // colorPicker.on('color:change', function (color) {
   //    camera.style.backgroundColor = color.hexString;
   // });

   camera.style.backgroundColor = timecolor
   spawn()
}

init()
var held_directions = []; //State of which arrow keys we are holding down

var mapLimit = null

function applyLimit(limit) {
   mapLimit = {
      leftLimit: limit.leftLimit,//x mur de gauche
      rightLimit: limit.rightLimit,// x mur de droite
      topLimit: limit.topLimit, //y mur en haut
      bottomLimit: limit.bottomLimit // y mur en bas
   }
}

var list_interraction = [];
var mapdoors = [];

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

   interraction_item = null;

   //Limits (gives the illusion of walls)
   //place du pixel sur la ligne noir , - ou + 34 ou 90
   if (mapLimit) {
      if (character_info.x < mapLimit.leftLimit) { character_info.x = mapLimit.leftLimit; }
      if (character_info.x > mapLimit.rightLimit) { character_info.x = mapLimit.rightLimit; }
      if (character_info.y < mapLimit.topLimit) { character_info.y = mapLimit.topLimit; }
      if (character_info.y > mapLimit.bottomLimit) { character_info.y = mapLimit.bottomLimit; }

      if (list_interraction != undefined) {
         signInterraction();
         npcInterraction();
         otherInterraction();
      }
      if (mapdoors != undefined) {
         doorInterraction();
      }

      if (interraction_item != null) {
         E_bubble.style.visibility = "visible"
      } else {
         E_bubble.style.visibility = "hidden"
      }
   }

   //(((66/42)/(160/144))*(200/144))*42 = 82.5

   var camera_left = pixelSize * 82.5;
   var camera_top = pixelSize * 42;


   var camera_left = pixelSize * 82.5;
   var camera_top = pixelSize * 42;

   map.style.transform = `translate3d( ${-character_info.x * pixelSize + camera_left}px, ${-character_info.y * pixelSize + camera_top}px, 0 )`;

   character.style.transform = `translate3d( ${character_info.x * pixelSize}px, ${character_info.y * pixelSize}px, 0 )`;
}

async function signInterraction() {
   list_interraction.texts.forEach(txt => {
      if ((character_info.x >= txt.rangeX.xmin && character_info.x <= txt.rangeX.xmax) && (character_info.y >= txt.rangeY.ymin && character_info.y <= txt.rangeY.ymax)) {
         locktxt = true;
         txt.type = "text"
         interraction_item = txt;
      } else {
         locktxt = false;
      }
   })
}

async function otherInterraction() {
   list_interraction.others.forEach(other_interraction => {
      if ((character_info.x >= other_interraction.rangeX.xmin && character_info.x <= other_interraction.rangeX.xmax) && (character_info.y >= other_interraction.rangeY.ymin && character_info.y <= other_interraction.rangeY.ymax)) {
         lockother = true;
         other_interraction.type = "other"
         interraction_item = other_interraction;
      } else {
         lockother = false;
      }
   })
}

async function npcInterraction() {
   list_interraction.npcs.forEach(npc => {
      if ((character_info.x >= npc.rangeX.xmin && character_info.x <= npc.rangeX.xmax) && (character_info.y >= npc.rangeY.ymin && character_info.y <= npc.rangeY.ymax)) {
         locknpc = true;
         npc.type = "npc"
         interraction_item = npc;
      }
      else {
         locknpc = false;
      }
   })
}

async function doorInterraction() {
   mapdoors.forEach(door => {
      if ((character_info.x >= door.rangeX.xmin && character_info.x <= door.rangeX.xmax) && (character_info.y >= door.rangeY.ymin && character_info.y <= door.rangeY.ymax)) {
         lockdoor = true;
         door.type = "door";
         interraction_item = door;
      } else {
         lockdoor = false;
      }
   })
}

let lockdoor = false;
let locktxt = false;
let locknpc = false;
let lockother = false;

// displayBubble = (lock = false) => {
//    console.log(lock)
//    if (lock) {
//       E_bubble.style.visibility = "visible"
//    } else {
//       E_bubble.style.visibility = "hidden"
//    }
// }

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


document.addEventListener("keydown", (e) => {
   var dir = keys[e.which];
   if (dir && held_directions.indexOf(dir) === -1) {
      held_directions.unshift(dir)
   }
   if (e.key == "e" && interraction_item) {
      tchat_display(interraction_item)
      switch (interraction_item.type) {
         case 'door':
            console.log(interraction_item)
            mapload(interraction_item.travel)
            break;
         case 'fishing':
            document.querySelector(".fishing").style.visibility = "visible"
            setTimeout(() => {
               document.querySelector(".fishing").style.visibility = "hidden"
            }, 8000)
         default:
            break;
      }
   }
   if (e.key == "i") {
      tchat_display({
         name: "info",
         msg: JSON.stringify(character_info)
      });
      console.log(character_info)
   }
   if (e.key == " ") { /* spacebar */
      character_info.speed = 1;
   }
   if (e.key == "t") {
      tchat_display()
   }

   if (e.key == "r") {
      init()
   }
})

function fondu(){
   anime.timeline({ loop: false })
      .add({
         targets: '.blackscreen',
         opacity: [1, 0],
         easing: "easeOutExpo",
         duration: 3000
      });
}

function spawn(){

   fondu()

   let spawnmap = undefined

   readTextFile("./components/Maps.json", function (text) {
      var data = JSON.parse(text);

      spawnmap = data.defaultspawn.mapname

      var mapdata = data[spawnmap]
      applyLimit(mapdata.limit);

      if (mapdata.doors) { mapdoors = mapdata.doors; }
      else { mapdoors = []; }

      var temp_img = new Image();
      temp_img.src = mapdata.background_path;
      map.setAttribute("style", "background-image: url(\"" + mapdata.background_path + "\") !important;");
      temp_img.onload = function () {
         var width = temp_img.width,
            height = temp_img.height;
         map.style.height = (height * 4) + "px";
         map.style.width = (width * 4) + "px";
      };
      character_info.x = data.defaultspawn.spawn.x;
      character_info.y = data.defaultspawn.spawn.y;
      character_info.location = spawnmap;
      character.setAttribute("facing", data.defaultspawn.spawn.direction);
   });

   readTextFile("./components/Interractions.json", function (text) {
      var data = JSON.parse(text);
      list_interraction = data[spawnmap]
   })
}

function mapload(travel_item) {

   fondu();

   readTextFile("./components/Maps.json", function (text) {
      var data = JSON.parse(text);
      var mapdata = data[travel_item.to]
      applyLimit(mapdata.limit);

      if (mapdata.doors) { mapdoors = mapdata.doors; }
      else { mapdoors = []; }

      var temp_img = new Image();
      temp_img.src = mapdata.background_path;
      map.setAttribute("style", "background-image: url(\"" + mapdata.background_path + "\") !important;");
      temp_img.onload = function () {
         var width = temp_img.width,
            height = temp_img.height;
         map.style.height = (height * 4) + "px";
         map.style.width = (width * 4) + "px";
      };
      character_info.x = travel_item.spawn.x;
      character_info.y = travel_item.spawn.y;
      character.setAttribute("facing", travel_item.spawn.direction);
      character_info.location = travel_item.to;
   });

   readTextFile("./components/Interractions.json", function (text) {
      var data = JSON.parse(text);
      list_interraction = data[travel_item.to]
   })
}

document.addEventListener("keyup", (e) => {
   var dir = keys[e.which];
   var index = held_directions.indexOf(dir);
   if (index > -1) {
      held_directions.splice(index, 1)
   }
   if (e.key == " ") { /* spacebar */
      character_info.speed = 0.5;
   }
});
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

let tchat_isDisplay = false;
let tchattimeout = 5000

function tchat_display(interraction_item = null) {
   if (interraction_item) {
      tchat.innerHTML = interraction_item.name + ": " + interraction_item.msg + "\n" + tchat.innerHTML;
   }
   tchat_isDisplay = true;

   tchat.style.opacity = 100;
   timeoutTchat = setTimeout(() => {
      anime.timeline({ loop: false })
         .add({
            targets: '.tchat',
            opacity: [100, 0],
            easing: "easeOutExpo",
            duration: 2000
         });
      tchat_isDisplay = false;
   }, tchattimeout)

}

function readTextFile(file, callback) {
   var rawFile = new XMLHttpRequest();
   rawFile.overrideMimeType("application/json");
   rawFile.open("GET", file, true);
   rawFile.onreadystatechange = function () {
      if (rawFile.readyState === 4 && rawFile.status == "200") {
         callback(rawFile.responseText);
      }
   }
   rawFile.send(null);
}

function tp(door_item){
   console.log(door_item)
}