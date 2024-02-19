


/* set canvas dimensions */
var CANVAS_WIDTH = 500;
var CANVAS_HEIGHT = 250;

var LINE_WIDTH = 12;
var RADIUS = 60;
var startArc = 0;
var endArc = 2 * Math.PI;

// Array for Olympic ring colours 
var ringColours = [ '#0885C2','#FBB132','#000000','#1C8B3C','#ED334E' ];

var xCoordinate = [ '100', '175', '250', '325', '400' ];
var yCoordinate = [ '100', '150', '100', '150', '100' ];


window.onload = function(){
	//Test to see if JavaScript is working
	console.log('JavaScript is working');
	
		 canvas = document.getElementById( 'canvas' );
		 	 
		 // apply the height and width variables to the canvas
		 canvas.width = CANVAS_WIDTH;
		 canvas.height =  CANVAS_HEIGHT;
		 
		 
		 // set canvas to 2D so you can draw within it
		 var context = canvas.getContext( '2d' );
		 
		 var lineWidth = context.lineWidth;
		 
		 //red circle X at 100, Y at 100, radius 50, starting at 0 degrees, ending at 360 degrees, clockwise
		 
		 context.beginPath();
		 context.arc(xCoordinate[0], yCoordinate[0], RADIUS, startArc, endArc, false);
		 context.strokeStyle = ringColours[0];
		 context.lineWidth = LINE_WIDTH;
		 context.stroke();
		 
		context.beginPath();
		context.arc(xCoordinate[1], yCoordinate[1], RADIUS, startArc, endArc, false);
		context.strokeStyle = ringColours[1];
		context.lineWidth = LINE_WIDTH;
		context.stroke(); 
		
		context.beginPath();		
		context.arc(xCoordinate[2], yCoordinate[2], RADIUS, startArc, endArc, false);
		context.strokeStyle = ringColours[2];
		context.lineWidth = LINE_WIDTH;
		context.stroke(); 
		
		context.beginPath();
		context.arc(xCoordinate[3], yCoordinate[3], RADIUS, startArc, endArc, false);
		context.strokeStyle = ringColours[3];
		context.lineWidth = LINE_WIDTH;
		context.stroke(); 
		
		context.beginPath();
		context.arc(xCoordinate[4], yCoordinate[4], RADIUS, startArc, endArc, false);
		context.strokeStyle = ringColours[4];
		context.lineWidth = LINE_WIDTH;
		context.stroke(); 
	
};


     


