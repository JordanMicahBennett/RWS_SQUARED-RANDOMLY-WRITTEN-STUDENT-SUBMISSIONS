#Author: Jordan Bennett
#initiates the playing of the game



#establish imports
import turtle 
import PlayManager



#establish window
window = turtle.Screen ( )
window.title ( "Stripper by Jordan Micah Bennett...[starting game]" )      



#establish render turtle
userTurtle = turtle.Turtle ( )
userTurtle.hideturtle ( ) #hide pointer
userTurtleWindowWidth, userTurtleWindowHeight = 800, 600
applicationSize = userTurtleWindowWidth, userTurtleWindowHeight 
userTurtle.getscreen ( ).setup ( userTurtleWindowWidth, userTurtleWindowHeight )



#instantiate square strip player via play manager play method
PlayManager.play ( window, userTurtle, applicationSize )




#wait for user to close screen
userTurtle.getscreen ( )._root.mainloop ( )

