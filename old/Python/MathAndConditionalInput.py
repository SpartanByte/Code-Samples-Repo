# Brian Wardwell
# This program asks the user to enter a series of positive numbers then a 
# negative number when done. It then displays the sum of the numbers entered.

# main function
def main():

    # Print my name
    print ("Brian Wardwell")
    
    # Local variables
    number = 1.0 #initialize for while loop
    total = 0.0


    #continue adding numbers while they are positive
    while number > 0:
        number = float(input("Enter a positive number (negative to quit): "))

	#check that number is positive so as not to change value
	#of the total
        if number > 0:
            total = total + number

    #Display total
    print ("The Total of the numbers you entered is = ", format(total, '.2f')) 


# Call the main function.
main()
"""
>>> 
Brian Wardwell
Enter a positive number (negative to quit): 45
Enter a positive number (negative to quit): 13
Enter a positive number (negative to quit): 29
Enter a positive number (negative to quit): 95
Enter a positive number (negative to quit): 67
Enter a positive number (negative to quit): 42
Enter a positive number (negative to quit): -1
The Total of the numbers you entered is =  291.00
>>> 
"""
