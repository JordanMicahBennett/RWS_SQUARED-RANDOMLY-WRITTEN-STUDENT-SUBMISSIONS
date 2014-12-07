#Author: Jordan Bennett
#Class: Square Abstract Data Type { makeSquare... }


class makeSquare:
    #establish constructor(s)
    def __init__ ( self, userTurtle, startPoint, sideLength, colour ):
        self.startPoint = startPoint
        self.sideLength = sideLength
        self.colour = colour
        self.drawSquare ( userTurtle, startPoint, sideLength, colour )

    #establish accessor(s)
    def getXCoord ( self ):
        return self.startPoint [ 0 ]

    def getYCoord ( self ):
        return self.startPoint [ 1 ]

    def getStartPt ( self ):
        return self.startPoint

    def getSidelength ( self ):
        return self.sideLength

    def getColour ( self ):
        return self.colour

    #establish mutator(s)
    def setColour ( self, userTurtle, value ):
        self.colour = value
        self.drawSquare ( userTurtle, ( self.getXCoord ( ), self.getYCoord ( ) ), self.getSidelength ( ), self.getColour ( ) )

    def drawSquare ( self, userTurtle, startPoint, sideLength, colour ):  
        angle=90
        userTurtle.penup ( )  
        userTurtle.goto ( startPoint ) 
        userTurtle.pendown ( )  
        userTurtle.fillcolor ( colour )  
        userTurtle.begin_fill ( )  
        userTurtle.forward ( sideLength )  
        userTurtle.left ( angle ) 
        userTurtle.forward ( sideLength )  
        userTurtle.left ( angle )  
        userTurtle.forward ( sideLength )  
        userTurtle.left ( angle )  
        userTurtle.forward ( sideLength )  
        userTurtle.left ( angle )   
        userTurtle.end_fill ( )  
        userTurtle.penup ( )
        
