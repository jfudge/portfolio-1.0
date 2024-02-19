// John Rice, Jamie Fudge, Andre McMorris
// www.humber.johnrice.ca/google/
// Assignment: Image 626 Google Doodle


/* set canvas dimensions */
var CANVAS_WIDTH = 500;
var CANVAS_HEIGHT = 193;
// apply the height and width variables to the canvas
 W = CANVAS_WIDTH;
 H =  CANVAS_HEIGHT;
var img1 = loadImage('images/Google.jpg');
var img2 = loadImage('images/blimp.png');

var img = new Image();
img.onload = onload;
img.src = src;

var LINE_WIDTH = 5;
var RADIUS = 30;
var startArc = 0;
var endArc = 2 * Math.PI;
// Array for Olympic ring colours 
var ringColours = [ '#0885C2','#FBB132','#000000','#1C8B3C','#ED334E' ];

// Arrays for X and Y Coordinates
var xCoordinate = [ '175', '210', '250', '285', '325' ];
var yCoordinate = [ '185', '210', '185', '210', '185' ];


window.onload = function(){
	//Test to see if JavaScript is working
	console.log('JavaScript is working');
	
		 canvas = document.getElementById( 'canvas' );
		 
		 // set canvas to 2D so you can draw within it
		 var context = canvas.getContext( '2d' );
		 
		 img1.onload = function(){
		 	drawStuff();
		 }
		 img1.src = 'images/Google.jpg';
		 
		 var drawStuff =  function(){
			 context.drawImage(img1, 0, 0);
					 //x Coordinate, Y Coordinate, radius, starting at 0 degrees, ending at 360 degrees, clockwise
			context.save();
			context.translate( 0, -50 );
			for(var i = 0;i <= 4;i++){		 
			 context.beginPath();
			 context.arc(xCoordinate[i], yCoordinate[i], RADIUS, startArc, endArc, false);
			 context.strokeStyle = ringColours[i];
			 context.lineWidth = LINE_WIDTH;
			 context.stroke();
		 };
		 	context.restore();
		 }
		 
		 //snowflake particles
	var mp = 25; //max particles
	var particles = [];
	for(var i = 0; i < mp; i++)
	{
		particles.push({
			x: Math.random()*W, //x-coordinate
			y: Math.random()*H, //y-coordinate
			r: Math.random()*4+1, //radius
			d: Math.random()*mp //density
		})
	}
	
	//Draw the flakes
	function draw()
	{
		context.clearRect(0, 0, W, H);
		
		context.fillStyle = "rgba(255, 255, 255, 0.8)";
		context.beginPath();
		for(var i = 0; i < mp; i++)
		{
			var p = particles[i];
			context.moveTo(p.x, p.y);
			context.arc(p.x, p.y, p.r, 0, Math.PI*2, true);
		}
		context.fill();
		update();
	}
	
	//Function to move the snowflakes
	//angle will be an ongoing incremental flag. Sin and Cos functions will be applied to it to create vertical and horizontal movements of the flakes
	var angle = 0;
	function update()
	{
		drawStuff();
		angle += 0.01;
		for(var i = 0; i < mp; i++)
		{
			var p = particles[i];
			//Updating X and Y coordinates
			//We will add 1 to the cos function to prevent negative values which will lead flakes to move upwards
			//Every particle has its own density which can be used to make the downward movement different for each flake
			//Lets make it more random by adding in the radius
			p.y += Math.cos(angle+p.d) + 1 + p.r/2;
			//p.x += Math.sin(angle) * 2;
			
			//Sending flakes back from the top when it exits
			//Lets make it a bit more organic and let flakes enter from the left and right also.
			if(p.x > W+5 || p.x < -5 || p.y > H)
			{
				if(i%3 > 0) //66.67% of the flakes
				{
					particles[i] = {x: Math.random()*W, y: -10, r: p.r, d: p.d};
				}
				else
				{
					//If the flake is exitting from the right
					if(Math.sin(angle) > 0)
					{
						//Enter from the left
						particles[i] = {x: -5, y: Math.random()*H, r: p.r, d: p.d};
					}
					else
					{
						//Enter from the right
						particles[i] = {x: W+5, y: Math.random()*H, r: p.r, d: p.d};
					}
				}
			}
		}
	}
	
	//animation loop
	setInterval(draw, 33);
	
};


     


