#Sochi Olympic Calculator Pro
#Brian Wardwell
#The current version is for for Central Time Zone only.

def main():
    #Print program name
    print("Welcome to Sochi Olympic Pro: CST Version.")
    print("Author: Brian Wardwell")
    print("Go USA!!!")

    # Moved the start() function call up to here instead of at the very end after main()
    start()

def start():
    current_zone = float(input('Enter the time of event rounded to the nearest half hour, such as 2.5: '))

    # Accomodate for times over 12:59
    sochi_zone = (float(current_zone + 10 - 12))

    # Determine if the time exceeds 23:59 and therefore need
    # to have 24 subtracted from it.
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

    # Make sure to keep another comma field and put the am_or_pm value
    print('It is currently:', sochi_zone, am_or_pm, 'in Sochi, Russia')
    print('Thank you for using Sochi Olympic Calculator Pro: Version 1.1 (CST)')              

# Call the main function.
main()
