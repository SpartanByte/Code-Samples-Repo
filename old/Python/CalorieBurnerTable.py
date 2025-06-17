# Brian Wardwell
# This program calculates the numbers of calories burned while
# running on a treadmill.

CALORIES_PER_MINUTE = 3.9

def main():

    # Print my name
    print ("Brian Wardwell")

    #Local variables
    caloriesBurned = 0.0
    minutes = 0

    print ("Minutes\t\tCalories Burned")
    print ("-------------------------------")

    #For loop to display calories burned
    for minutes in range(10, 31, 5):
        caloriesBurned = CALORIES_PER_MINUTE * minutes
        print (minutes, "\t\t", caloriesBurned) 

# Call the main function.
main()
"""
>>> 
Brian Wardwell
Minutes		Calories Burned
-------------------------------
10 		 39.0
15 		 58.5
20 		 78.0
25 		 97.5
30 		 117.0
>>> 
"""
