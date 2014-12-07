#author: Jordan Micah Bennett
#aim: I used about 30 minutes of duration to fulfill, in a hobbyist manner, this student lab

def student(sid,fname,lname, cc1,mark1,cc2,mark2,cc3,mark3,cc4,mark4,cc5,mark5,cc6,mark6):
    """Constructor for student"""
    return [sid,[fname,lname],[(cc1,mark1),(cc2,mark2),(cc3,mark3),(cc4,mark4),(cc5,mark5),(cc6,mark6)]]

#this was added to test scenario where student only does 2 courses, CS11R and CS20S, as suggested by problem issued in lab3
def student2(sid,fname,lname, cc1,mark1,cc2,mark2):
    """Constructor for student"""
    return [sid,[fname,lname],[(cc1,mark1),(cc2,mark2)]]

def get_id(std):
    """Returns students ID"""
    return std[0]

def get_name(std):
    """Returns students Name"""
    return std[1]

def get_courses(std):
    """Returns a list of tuples of course codes and grade"""
    return std[2]

def get_fname(name):
    """Returns first name"""
    return name[0]

def get_lname(name):
    """Returns last name"""
    return name[1]

def get_ccode(course_det):
    """Returns course code part of the tuple"""
    return course_det[0]

def get_grade(course_det):
    """Returns grade part of the tuple"""
    return course_det[1]

       
st1=student('620000101',"John","Doe","CS11Q",80,"CS11R",60,"CS20R",50,"CS20S",60,"CS22Q",65,"CS23Q",80)
st2=student2('620000101',"John","Doe","CS11Q",87,"CS20S",49)

credit_list={'CS11Q':6,'CS11R':6,'CS20R':4,'CS23Q':4,'CS22Q':4,'CS20S':4}

qp_list = {"A+":4.3,"A":4.0,"A-":3.7,"B+":3.3,"B":3.0,"B-":2.7,"C+":2.3,"C":2.0,\
      "C-":1.7,"D+":1.3,"D": 1.0,"F": 0.0}

grade_list = [ ( "A+", ( 86, 100 ) ), ( "A", ( 70, 85 ) ), ( "A-", ( 67, 69 ) ), ( "B+", ( 63, 66 ) ), ( "B", ( 60, 62 ) ), ( "B-", ( 57, 59 ) ), 
               ( "C+", ( 53, 56 ) ), ( "C", ( 50, 52 ) ), ( "C-", ( 47, 49 ) ), ( "D+", ( 43, 46 ) ), ( "D", ( 35, 42 ) ), ( "F", ( 0, 35 ) ) ]


        

## For this fucntion to work you first need to write calc_gpa()
def print_students_gpa(std):
    """Prints the students details and GPA"""
    print "Student Id:", get_id(std)
    print "Student name:", get_fname(get_name(std)), get_lname(get_name(std))
    print "GPA: %.2f" %(calc_gpa(std))

#problem 1 - compute_letter_grade 
def compute_letter_grade ( inputNumberGrade ):
    for grade in grade_list:
        if inputNumberGrade in range ( grade [ 1 ] [ 0 ], grade [ 1 ] [ 1 ] + 1 ):
            return grade [ 0 ]

#problem 1 - compute_letter_grade tests
print "========== problem 1 compute_letter_grade tests =========="
print "compute_letter_grade ( 86 ) => ", compute_letter_grade ( 86 )
print "compute_letter_grade ( 71 ) => ", compute_letter_grade ( 71 )
print "compute_letter_grade ( 69 ) => ", compute_letter_grade ( 69 )
print "compute_letter_grade ( 66 ) => ", compute_letter_grade ( 66 )
print "compute_letter_grade ( 61 ) => ", compute_letter_grade ( 61 )
print "compute_letter_grade ( 58 ) => ", compute_letter_grade ( 58 )
print "compute_letter_grade ( 53 ) => ", compute_letter_grade ( 53 )
print "compute_letter_grade ( 50 ) => ", compute_letter_grade ( 50 )
print "compute_letter_grade ( 47 ) => ", compute_letter_grade ( 47 )
print "compute_letter_grade ( 44 ) => ", compute_letter_grade ( 44 )
print "compute_letter_grade ( 46 ) => ", compute_letter_grade ( 36 )
print "compute_letter_grade ( 5 ) => ", compute_letter_grade ( 5 )


#problem 2 - calc_letter_grade 
def calc_letter_grade ( inputStudent ):
    #we zip list A and listB,
    #where list A is list ( map ( get_ccode, get_courses ( inputStudent ) ), WHICH IS AN EXTRACTION OF COURSE CODES FROM STUDENT OBJECT INDEX 1 OF COURSE CODE/NUMBER GRADE TUPLE SET
    #where list B is list ( map ( compute_letter_grade, list ( map ( get_grade, get_courses ( inputStudent ) ) ) ) ), WHICH IS AN EXTRACTION OF LETTER GRADES, FROM AN EXTRACTION OF NUMBER GRADES FROM STUDENT OBJECT INDEX 1 OF COURSE CODE/NUMBER GRADE TUPLE SET
    return zip ( list ( map ( get_ccode, get_courses ( inputStudent ) ) ), list ( map ( compute_letter_grade, list ( map ( get_grade, get_courses ( inputStudent ) ) ) ) ) ) 


#problem 2 - calc_letter_grade test
print "========== problem 2 calc_letter_grade test =========="
print "calc_letter_grade ( st1 ) => ", calc_letter_grade ( st1 )
print "calc_letter_grade ( st2 ) => ", calc_letter_grade ( st2 )

#problem 3a - convert_to_wtqp
def convert_to_wtqp ( courseCodeLetterGradeTuple ):
    return ( credit_list [ courseCodeLetterGradeTuple [ 0 ].upper ( ) ], qp_list [ courseCodeLetterGradeTuple [ 1 ].upper ( ) ] ) #upper function ensures that we compare viably to credit and qp list

#problem 3a - convert_to_wtqp test
print "========== problem 3a convert_to_wtqp test =========="
print "convert_to_wtqp ( ( 'cs11q', 'A+' ) ) => ", convert_to_wtqp ( ( 'cs11q', 'A+' ) )


#problem 3b - calc_gpa
def calc_gpa ( inputStudent ):
    #####################################################################################
    # sigma ( product ( ( quality weight, credit weight ) ) ) / sigma ( credit weights )
    #####################################################################################
    # where sum ( list ( map ( lambda ( a, b ) : a * b, list ( map ( convert_to_wtqp, calc_letter_grade ( inputStudent ) ) ) ) ) ) IS SIGMA ( product ( ( quality weight, credit weight ) ) ) OR A SUMMATION OF CREDIT WEIGHT QUALITY WEIGHT PRODUCTS
    # and sum ( list ( map ( lambda ( courseTuple ) : credit_list [ courseTuple [ 0 ].upper ( ) ], calc_letter_grade ( inputStudent ) ) ) ) IS SIGMA ( credit weights ) OR A SUMMATION OF CREDIT WEIGHTS
    ######## SIGMA ( product ( ( quality weight, credit weight ) ) )
    # SUM ( LIST ( LAMBDA, LIST-MAP ) )
    # where LIST is a list of the following lamda and list map
    # where LAMBDA IS lamda ( a, b ) : a * b WHICH IS A FUNCTION WHICH MULTIPLIES THE ELEMENTS OF TUPLE ( CREDIT WEIGHT, QUALITY POINT )
    # where LIST-MAP IS list ( map ( convert_to_wtqp, calc_letter_grade ( inputStudent ) ) WHICH IS A LIST OF TUPLES OF ( CREDIT WEIGHT, QUALITY POINT )
    ######## SIGMA ( credit weights )
    # SUM ( LIST-MAP ( LAMBDA, LIST-OF-COURSES ) )
    # where LIST-MAP is a list mapping of the following lamda and list map
    # where LAMBDA IS lamda ( courseTuple ) : credit_list [ courseTuple [ 0 ].upper ( ) ] WHICH IS A FUNCTION WHICH RETURNS THE CREDIT WEIGHT FROM ELEMENTS OF TUPLE calc_letter_grade ( inputStudent )
    # where LIST IS list ( map ( convert_to_wtqp, calc_letter_grade ( inputStudent ) ) WHICH IS A LIST OF COURSES
    ######## SIGMA ( credit weights )
    return sum ( list ( map ( lambda ( a, b ) : a * b, list ( map ( convert_to_wtqp, calc_letter_grade ( inputStudent ) ) ) ) ) ) / sum ( list ( map ( lambda ( courseTuple ) : credit_list [ courseTuple [ 0 ].upper ( ) ], calc_letter_grade ( inputStudent ) ) ) )
    
#problem 3b - calc_gpa test
print "========== problem 3b calc_gpa test =========="
print "calc_gpa ( st1 ) => " + str ( calc_gpa ( st1 ) )
print "calc_gpa ( st2 ) => " + str ( calc_gpa ( st2 ) ) + " which was suggested via problem " 
   
