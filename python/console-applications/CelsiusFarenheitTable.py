# Brian Wardwell
# This program displays a table of the Celsius temperatures from 0 through
# 20 and their Fahrenheit equivalents.

# main function
def main():

    # Print my name
    print ("Brian Wardwell")
    
    # Local variables
    fahrenheit = 0.0

    # calculate and print value for each temperature
    print ("Celsius\t\tFahrenheit")
    print ("------------------------------------------")
    for celsiusDegree in range(21):
        fahrenheit = ((9 * celsiusDegree) / 5) + 32
        print (celsiusDegree, "\t\t", fahrenheit)

# Call the main function.
main()
"""
>>> 
Celsius		Fahrenheit
------------------------------------------
0 		 32.0
1 		 33.8
2 		 35.6
3 		 37.4
4 		 39.2
5 		 41.0
6 		 42.8
7 		 44.6
8 		 46.4
9 		 48.2
10 		 50.0
11 		 51.8
12 		 53.6
13 		 55.4
14 		 57.2
15 		 59.0
16 		 60.8
17 		 62.6
18 		 64.4
19 		 66.2
20 		 68.0
>>> 
"""
