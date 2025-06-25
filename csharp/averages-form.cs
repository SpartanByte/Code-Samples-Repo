using System;
using System.Collections;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace AveragesForm
{
    public partial class Form1 : Form
    {
        
        public Form1()
        {
            InitializeComponent();
        }

        string inputString;
        string checkArrayValue;
        int inputNumber;
        int index;
        int[] inputArray;

        public void getAveragesButton_Click(object sender, EventArgs e)
        {
            // will add Array values together and then divide by the counter variable to determine average
            // MessageBox.Show("This will be for displaying the average");
            for (int index = 0; index < 1; index++)
            {
                Console.WriteLine(inputArray[index]);
            }
        }
        public void moreNumbersButton_Click(object sender, EventArgs e)
        {
            // This method needs to take the user's input and append it to an array in order to store the values for calculations and counting.

            // Getting input from user
            int[] inputArray = new int[400];
            inputString = numberInputBox.Text;

            //Converting user input to integer
            inputNumber = Convert.ToInt32(inputString);
           // List<int> inputNumberList = new List<int>();
          
            // Getting input from user
            inputString = numberInputBox.Text;

            // Testing Value
            MessageBox.Show("You just entered " + inputString);

            //Converting user input
             inputNumber = Convert.ToInt32(inputString);
             
            //Testing Value
            MessageBox.Show("inputNumber equals " + inputNumber);
        
            inputArray[index] = inputNumber;
            index++;
            int checkLength = inputArray.Length;
           // checkArrayValue = Convert.ToString(checkLength[index]);

           // MessageBox.Show("checkLength = " + checkLengthString);
            for (int index = 0; index < 1; index++)
            {
                Console.WriteLine(inputArray[index]);
            }
        }
    }
}