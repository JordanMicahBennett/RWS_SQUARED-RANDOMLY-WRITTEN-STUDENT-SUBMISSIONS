#Author: Jordan Bennett
#Class: Square Strip Manager { togglePlayer... }

import SquareStripManager
import tkSimpleDialog
import random

class play: #question 11
    #establish constructor(s)
    def __init__ ( self, window, userTurtle, applicationSize ):
        self.window = window;
        
        self.userTurtle = userTurtle;

        self.applicationSize = applicationSize

        self.humanPlayerColour = tkSimpleDialog.askstring ( "Start 0a ( human player setup )", "Select human player colour'? ( must be unique ) : " )

        self.machinePlayerColour = tkSimpleDialog.askstring ( "Start 0b ( machine player setup )", "Select machine player colour'? ( must be unique ) : " )
        
        self.players = dict ( [ ( "human", self.humanPlayerColour ), ( "machine", self.machinePlayerColour ) ] )
        
        self.playerScores = dict ( [ ( "human", 0 ), ( "machine", 0 ) ] )

        self.currentPlayer = self.players [ "human" ]
        
        self.strip = SquareStripManager.drawStrip ( self.userTurtle, self.applicationSize )

        self.playFirstFlag = tkSimpleDialog.askstring ( "Start 1", "Would you like to play first? ( y for yes, n for no ) )'? : " )

        self.window.title ( "Stripper by Jordan Bennett...[ human score = " + str ( self.playerScores [ "human" ] ) + ",  machine score = " + str ( self.playerScores [ "machine" ] ) + " ]" ) 

        self.startGame ( )
 
    def startGame ( self ):
        if ( not self.gameOver ( ) ):
            if ( self.playFirstFlag == 'y' ):
                self.makePlay ( self.getPlayerPick ( ) ) #make play based on player pick
                self.startGame ( )
                self.togglePlayer ( )
            elif ( self.playFirstFlag == 'n' ):
                self.togglePlayer ( ) #otherwise switch player to machine
                self.makePlay ( self.getMachinePick ( ) ) #then make play based on machine pick
                self.togglePlayer ( )
                self.startGame ( )
        if ( self.gameOver ( ) ):
            outcome = ""
            if ( self.playerScores [ "human" ] > self.playerScores [ "machine" ] ):
                outcome = "human has won!"
            if ( self.playerScores [ "human" ] < self.playerScores [ "machine" ] ):
                outcome = "machine has won!"
            if ( self.playerScores [ "human" ] == self.playerScores [ "machine" ] ):
                outcome = "there is a tie!"
            tkSimpleDialog.askstring ( "End", outcome )
            
                
        
    def getKeyByValue ( self, inputValue ):
        for name, value in self.players.iteritems ( ):
            if ( inputValue == value ):
                return name

    def updateScore ( self ):
        if ( self.currentPlayer == self.players [ "human" ] ):
            self.playerScores [ "human" ] = self.playerScores [ "human" ] + 1
        else:
            self.playerScores [ "machine" ] = self.playerScores [ "machine" ] + 1

        self.window.title ( "Stripper by Jordan Bennett...[ human score = " + str ( self.playerScores [ "human" ] ) + ",  machine score = " + str ( self.playerScores [ "machine" ] ) + " ]" ) 
            
        
    def togglePlayer ( self ): #question 9
        if ( not self.currentPlayer == self.players [ "human" ] ):
            self.currentPlayer = self.players [ "human" ]
            print "current player is '" + self.getKeyByValue ( self.players [ "human" ] ) + "' who is '" + self.players [ "human" ] + "'"
            self.window.title ( "Stripper by Jordan Bennett...[ human score = " + str ( self.playerScores [ "human" ] ) + ",  machine score = " + str ( self.playerScores [ "machine" ] ) + " ]...human is playing!" ) 
        else:
            self.currentPlayer = self.players [ "machine" ]
            print "current player is '" + self.getKeyByValue ( self.players [ "machine" ] ) + "' who is '" + self.players [ "machine" ] + "'"
            self.window.title ( "Stripper by Jordan Bennett...[ human score = " + str ( self.playerScores [ "human" ] ) + ",  machine score = " + str ( self.playerScores [ "machine" ] ) + " ]...machine is playing!" ) 

    
    def validPlay ( self, selection ): #question 5
        if ( selection + 1 < int ( self.strip.inputNumberOfSquares ) ):
            if ( ( self.strip.stripSquare [ selection ].getColour ( ) == self.strip.defaultStripUnitColour ) and ( self.strip.stripSquare [ selection + 1 ].getColour ( ) == self.strip.defaultStripUnitColour ) ):
                return True
            return False

    def getPlayerPick ( self ): #question 6
        # only the user enters a pick
        inRange = False 
        pick = int ( tkSimpleDialog.askstring ( 'Human Move Input', 'Your move : ' ) )
        if pick in range ( int ( self.strip.inputNumberOfSquares ) ):
            inRange = True
            return pick

    def gameOver ( self ): #question 7
        contiguousCoupleCount = 0
        for squareIndex in range ( 0, int ( self.strip.inputNumberOfSquares ) ):
            if ( squareIndex + 1 < self.strip.inputNumberOfSquares ): 
                if ( ( self.strip.stripSquare [ squareIndex ].getColour ( ) == self.strip.defaultStripUnitColour ) and ( self.strip.stripSquare [ squareIndex + 1 ].getColour ( ) == self.strip.defaultStripUnitColour ) ):
                    if ( contiguousCoupleCount + 1 < int ( self.strip.inputNumberOfSquares ) ):
                        contiguousCoupleCount += 1
                        break

        if ( contiguousCoupleCount >= 1 ): #if there exists two contiguously white blocks, then the game is not over, or False
            return False
        return True

    def getMachinePick ( self ): #question 8
        machineSelection = random.randint ( 0, int ( self.strip.inputNumberOfSquares ) )
        if ( self.validPlay ( machineSelection ) ):
            return machineSelection


    def makePlay ( self, selection ): #question 10
        if self.validPlay ( selection ):
            self.updateScore ( )
            if ( selection + 1 < int ( self.strip.inputNumberOfSquares ) ):
                self.strip.stripSquare [ selection ].setColour ( self.userTurtle, self.currentPlayer )
                self.strip.stripSquare [ selection + 1 ].setColour ( self.userTurtle, self.currentPlayer )
 
                


            
