# Brian Wardwell
# This program asks the user to enter the amount they have budgeted for a month
# then prompts them for their expenses and lastly prints if they are over or
# under budget.

# main function
def main():

    # Print my name
    print ("Brian Wardwell")

    # Local variables
    budget = 0.0
    spent = 1.0 #initialize for while loop
    total = 0.0
    
    # Get budgeted amount
    budget = float(input("Enter amount budgeted for the month: "))

    # Get amount spent
    while spent != 0:
        spent = float(input("Enter an amount spent(0 to quit): "))
        #add to total
        total += spent

    # display values
    showSpending(budget, total)

# The showSpending function accepts a budget and a spent amount 
# and determines whether user is over or under budget
def showSpending(budget, total):
    #local variables
    difference = 0.0
    print ("Budgeted: $", format(budget, '.2f'))
    print ("Spent: $", format(total, '.2f'))
    
    if budget > total:
        difference = budget - total
        print ("You are $", format(difference, '.2f'), \
               "under budget. WELL DONE!")
    elif budget < total:
        difference = total - budget
        print ("You are $", format(difference, '.2f'), \
               "over budget. PLAN BETTER NEXT TIME!")
    else:
        print ("Spending matches budget. GOOD PLANNING!")

# Call the main function.
main()
"""
>>> 
Brian Wardwell
Enter amount budgeted for the month: 3275
Enter an amount spent(0 to quit): 3240
Enter an amount spent(0 to quit): 5
Enter an amount spent(0 to quit): 0
Budgeted: $ 3275.00
Spent: $ 3245.00
You are $ 30.00 under budget. WELL DONE!

Deb Flaskerud
Enter amount budgeted for the month: 2970
Enter an amount spent(0 to quit): 1050
Enter an amount spent(0 to quit): 522
Enter an amount spent(0 to quit): 760
Enter an amount spent(0 to quit): 931
Enter an amount spent(0 to quit): 0
Budgeted: $ 2970.00
Spent: $ 3263.00
You are $ 293.00 over budget. PLAN BETTER NEXT TIME!
>>> 
"""
