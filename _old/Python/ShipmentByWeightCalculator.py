# Brian Wardwell
# This program prompts the user to enter the weight of a package and then displays
# the shipping charges.

# main function
def main():

    # Local variable
    weight = 0.0

    # Print my name
    print ("Brian Wardwell")

    # Get package weight
    weight = float(input("Enter the weight of the package: "))

    # calculate and print shipping cost
    getCost(weight)

# The getCost function accepts a weight as an argument
# and calculates and displays the shipping cost
def getCost(weight):

    #local variable
    shippingCost = 0.0

    # Calculate the shipping charge
    if weight > 10:
        shippingCost = 3.80
    elif weight > 6:
        shippingCost = 3.70
    elif weight > 2:
        shippingCost = 2.20
    else:
        shippingCost = 1.10


    print ("Shipping charge: $", format(shippingCost, '.2f'))

# Call the main function.
main()
"""
Brian Wardwell
Enter the weight of the package: 1.9
Shipping charge: $ 1.10

Process finished with exit code 0

C:\Python33\python.exe C:/Brian/Code/Python/Practice/shippingbyweight.py
Brian Wardwell
Enter the weight of the package: 3.79
Shipping charge: $ 2.20

Process finished with exit code 0

C:\Python33\python.exe C:/Brian/Code/Python/Practice/shippingbyweight.py
Brian Wardwell
Enter the weight of the package: 6.22
Shipping charge: $ 3.70

Process finished with exit code 0

C:\Python33\python.exe C:/Brian/Code/Python/Practice/shippingbyweight.py
Brian Wardwell
Enter the weight of the package: 17.05
Shipping charge: $ 3.80

Process finished with exit code 0

"""
