#Sochi Olympic Calculator Pro
#Brian Wardwell
#The current version is for for Central Time Zone only.

def main():
    #Print program name
    print("Welcome to Sochi Olympic Pro: CST Version.")
    print("Author: Brian Wardwell")
    print("Created: February 12th, 2014")
    print("Go USA!!!")

    # Moved the start() function call up to here instead of at the very end after main()
    start()

def start():
    # To keep things as simple as possible for now and to show you only one new concept,
    # have the user enter in military time here (aka 24 hour time)
    current_zone = float(input('Enter the time of event rounded to the nearest half hour, such as 2.5: '))

    # Edit to existing code.  Removed the -12 at the end.
    # I assume this was here to accomodate for times over 12:59
    sochi_zone = (float(current_zone + 10 - 12))

    # New Code to determine if the time exceeds 23:59 and therefore need
    # to have 24 subtracted from it.
    # This code line says If sochi_zone value is equal to or greater
    # then 24, run the code that is indented below this line.
    # (You will get to If statements in Chapter 4 I believe)
    if sochi_zone >= 24:
        # Subtract 24 from sochi_zone
        sochi_zone = sochi_zone - 24

    # Created a new value called am_or_pm to be set to AM by Default
    am_or_pm = 'AM'
        
    # Now to determine if the time is AM or PM we use another If Statement
    # to determine if the sochi_zone value is greater than or equal to 12 (aka noon)
    if sochi_zone >= 12:
        # since the time is greater than 12 hours in sochi_zone
        # we need to set the am_or_pm value to pm.
        am_or_pm = 'PM'

        # Edited below line:
        # I added in another comma field and put the am_or_pm value
        # If you are using the newest version of python 3.3, you will
        # need to put the () around everything after the word print.
        # I installed 2.8 this time around and its like the following
        # line of code.
    print('It is currently:', sochi_zone, am_or_pm, 'in Sochi, Russia')
    print('Thank you for using Sochi Olympic Calculator Pro: Version 1.1 (CST)')              

# Call the main function.
main()
