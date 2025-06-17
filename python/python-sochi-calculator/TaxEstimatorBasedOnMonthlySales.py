# Brian Wardwell
# This program asks the user to enter the for monthly incurred from
# operating their automobile.
# This program should run the calculations and display the information as well as the total

# main def
def main():
    # Local variables
    totalSales = 0.0   # Variable to hold the cost of total sales for month

    # Print my name
    print ("Brian Wardwell")

    # Get monthly sales total
    totalSales = float(input("Enter total sales of current month: $ "))


    # Calculate total
    stateTax = (totalSales * 0.04)

    # Calculate county tax
    countyTax = (totalSales * 0.02)

    # Calculate total
    total = (totalSales + stateTax + countyTax)

    # Print information by calling showTotal
    showTotal(stateTax, countyTax, total)


# Showing inputed information and calculated total
def showTotal(stateTax, countyTax, total):
    print ("County Tax: $", format(countyTax, '.2f'))
    print ("State Tax: $", format(stateTax, '.2f'))
    print ("Total with Tax: $", format(total, '.2f'))

# Call the main function.
main()

"""
Brian Wardwell
Enter total sales of current month: $ 7288.21
County Tax: $ 145.76
State Tax: $ 291.53
Total with Tax: $ 7725.50

Process finished with exit code 0
"""
