# Brian Wardwell
# This program simulates an enhanced BMI calculator.

# Global constant for body mass
BODY_MASS_MULTIPLIER = 703

# main function
def main():
    # Local variables
    weight = 0.0
    height = 0.0
    BMI = 0.0

    # Print my name
    print ("Brian Wardwell")

    # Get the weight
    weight = float(input("Enter your weight in pounds: "))

    # Get the height
    height = float(input("Enter your height in inches: "))

    # Calculate the body mass
    BMI = weight*(BODY_MASS_MULTIPLIER)/(height* height)

    # Determine weight category and display BMI
    showBMI(BMI)

# The showBMI function accepts BMI as an argument, determines whether
# the person is at a suitable weight, and displays the resultdef

def showBMI(BMI):
    # print the BMI
    print("Your Body Mass Indicator is ", format(BMI, '.2f'))

    #determine the person's weight category
    if BMI > 25:
        print("You are overweight")
    elif BMI < 18.5:
        print("You are underweight")
    else:
        print("Your weight is optimal")


# Call the main function.
main()
"""
Brian Wardwell
Enter your weight in pounds: 189.8
Enter your height in inches: 76
Your Body Mass Indicator is  23.10
Your weight is optimal

Process finished with exit code 0

C:\Python33\python.exe C:/Brian/Code/Python/Practice/BMICalculator.py
Brian Wardwell
Enter your weight in pounds: 299
Enter your height in inches: 71
Your Body Mass Indicator is  41.70
You are overweight

Process finished with exit code 0

C:\Python33\python.exe C:/Brian/Code/Python/Practice/BMICalculator.py
Brian Wardwell
Enter your weight in pounds: 102
Enter your height in inches: 66
Your Body Mass Indicator is  16.46
You are underweight

Process finished with exit code 0

"""
