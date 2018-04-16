# Brian Wardwell
# Python Example (Automotive Calculation)
# This program asks the user to enter the for monthly incurred from
# operating their automobile.
# This program should run the calculations and display the information as well as the total

# main def
def main():
    # Local variables
    loanPayment = 0.0   # Variable to hold the cost of monthly loan payment
    insuranceExpense = 0.0 # Variable to hold the cost of insurance
    gasExpense = 0.0 # Variable to hold the cost of gas
    oilExpense = 0.0 # Variable to hold the cost of oil
    tiresExpense = 0.0 # Variable to hold the cost of tires
    maintenanceExpense = 0.0 # Variable to hold the cost of general maintenance

    # Print my name
    print ("Brian Wardwell")

    # Get cost of loan payment
    loanPayment = float(input("Enter the cost of loan payment: "))

    # Get cost of insurance
    insuranceExpense = float(input("Enter the cost of insurance: "))

    # Get cost of gas
    gasExpense = float(input("Enter the cost of gas: "))

    # Get cost of oil
    oilExpense = float(input("Enter the cost of oil: "))

    # Get cost of tires
    tiresExpense = float(input("Enter the cost of tires: "))

    # Get cost of general maintenance
    maintenanceExpense = float(input("Enter the cost of maintenance: "))

    # Calculate total
    total = float(loanPayment + insuranceExpense + gasExpense + oilExpense + tiresExpense + maintenanceExpense)

    # Print information by calling showTotal
    showTotal(loanPayment, insuranceExpense, gasExpense, oilExpense, tiresExpense, maintenanceExpense, total)


# Showing inputed information and calculated total
def showTotal(loanPayment, insuranceExpense, gasExpense, oilExpense, tiresExpense, maintenanceExpense, total):
    print ("Loan Payment: $", format(loanPayment, '.2f'))
    print ("Insurance Payment: $", format(insuranceExpense, '.2f'))
    print ("Cost of Gas: $", format(gasExpense, '.2f'))
    print ("Cost of Oil: $", format(oilExpense, '.2f'))
    print ("Cost of Tires: $", format(tiresExpense, '.2f'))
    print ("Cost of Maintenance: $", format(maintenanceExpense, '.2f'))
    print ("Total Monthly Expenses: $", format(total, '.2f'))

# Call the main function.
main()

"""
Brian Wardwell
Brian Wardwell
Enter the cost of loan payment: 465.00
Enter the cost of insurance: 150.00
Enter the cost of gas: 215.00
Enter the cost of oil: 25.00
Enter the cost of tires: 10.00
Enter the cost of maintenance: 12.00
Loan Payment: $ 465.00
Insurance Payment: $ 150.00
Cost of Gas: $ 215.00
Cost of Oil: $ 25.00
Cost of Tires: $ 10.00
Cost of Maintenance: $ 12.00
Total Monthly Expenses: $ 877.00

Process finished with exit code 0
"""
