#Author: Jordan Bennett
#Class: Square Strip Manager { squareStrip, validPlay, getPlayerPick, gameOver, getMachinePick... }



import SquareAbstractDataType
import tkSimpleDialog


class drawStrip:
    #establish constructor(s)
    def __init__ ( self, userTurtle, applicationSize ):
        self.applicationSize = applicationSize
        
        self.userTurtle = userTurtle
        
        self.inputNumberOfSquares = tkSimpleDialog.askstring ( "Start 2", "Please specify the number of square units to be generated : '? : " )

        self.inputSideLength = tkSimpleDialog.askstring ( "Start 3", "Please specify your square unit's length : " )

        self.defaultStripUnitColour = 'white'


        #estbalish dictionary that shall contain strip units of contiguous blank ( white ) squares
        self.stripSquare = dict ( )
        
        #print process message
        self.userTurtle.goto ( ( - ( self.applicationSize [ 0 ] / 2 ), int ( self.inputSideLength ) * 5 ) ) 
        self.userTurtle.write ( "Stripper is now generating your " + str ( self.inputNumberOfSquares ) + " square units each of size " + str ( self.inputSideLength ) + "....", True, align = "left", font = ( "Arial", 11, "normal" ) )
        #print "Stripper is now generating your " + str ( self.inputNumberOfSquares ) + " square units each of size " + str ( self.inputSideLength ) + "...."
        
        #generate square strip by utilizing comprehensive list
        #####where stripSquare = dict ( comprehensive list )
        #####where comprehensive list returns a dictionary in squareCreationIndex as key, and makeSquare as value
        #####where makeSquare parameter 0, userTurtle REPRESENTS any user supplied turtle renderer
        #####where makeSquare parameter 1, - ( applicationSize [ 0 ] / 2 ) + ( ( int ( inputSideLength ) * int ( inputNumberOfSquares ) ) / 2 ) + ( int ( inputSideLength ) * squareCreationIndex + 1, 0 ) REPRESENTS the square strip's origin
        ###########NOTE 0: - ( applicationSize [ 0 ] / 2 ) from above is used to leftward localize ( place to extreme left of screen ) board strip below based on applicationSize [ 0 ] ( which is the application width; we take negative half of the screen size, as our starting point.
        ###########NOTE 1: We also take ( int ( inputSideLength ) * squareCreationIndex + 1 ) as another component of our starting point, which generates squares adjacently )
        #####where makeSquare parameter 2, inputSideLength REPRESENTS the square strip's unit length
        #####where makeSquare parameter 3, inputSideLength REPRESENTS the square strip's unit colour
        self.stripSquare = dict ( [ ( squareCreationIndex, SquareAbstractDataType.makeSquare ( self.userTurtle, ( - ( self.applicationSize [ 0 ] / 2 ) + ( int ( self.inputSideLength ) * squareCreationIndex + 1 ), 0 ), int ( self.inputSideLength ), self.defaultStripUnitColour ) ) for squareCreationIndex in range ( 0, int ( self.inputNumberOfSquares ) ) ] )

        #print all strip positions to python console
        #print "\n\nOkay, here are all selectable strip positions : \n"
        playablePositions = [ "position <" + str ( positionIndex ) + ">:(" + str ( self.stripSquare [ positionIndex ].getXCoord ( ) ) + "," + str ( self.stripSquare [ positionIndex ].getYCoord ( ) ) + ")" for positionIndex in range ( 0 , len ( self.stripSquare ) ) ]
        #print playablePositions
        #print "\nYou won't actually need to write in the coordinates. Pay attention to the indices via position <index>!\n\n"
        #print all strip positions to turtle console
        self.userTurtle.goto ( ( - ( self.applicationSize [ 0 ] / 2 ), int ( self.inputSideLength ) * 4 ) ) 
        self.userTurtle.write ( "Okay, here are all selectable strip positions :", True, align = "left", font = ( "Arial", 11, "normal" ) )
        self.userTurtle.goto ( ( - ( self.applicationSize [ 0 ] / 2 ), int ( self.inputSideLength ) * 3 ) ) 
        self.userTurtle.write ( str ( playablePositions ), True, align = "left", font = ( "Arial", 9, "normal" ) )
        self.userTurtle.goto ( ( - ( self.applicationSize [ 0 ] / 2 ), int ( self.inputSideLength ) * 2 ) ) 
        self.userTurtle.write ( "You won't actually need to write in the coordinates. Pay attention to the indices via position <index>!", True, align = "left", font = ( "Arial", 11, "normal" ) )

