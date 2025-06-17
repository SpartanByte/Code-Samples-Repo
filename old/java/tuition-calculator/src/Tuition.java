/**
 * Tuition
 * 
 * @author Brian Wardwell
 * @version V 1.0
 * @date September 21st, 2016
 * @course CSCI 1130-51 Introduction to Programming in Java
 */
import java.awt.*;
import javax.swing.*;
import java.text.*;

/**
 * Class Tuition - 
 * - This receives user input from the JOptionPane and calculates it for total tuition
 * 
 */
public class Tuition extends JApplet
{
    // instance variables - replace the example below with your own
    double costOfBooks;
    double parkingFee;
    double credits;
    double costPerCredit;
    
    // declaring Decimal Format
    DecimalFormat currencyFormat = new DecimalFormat("#,##0.00");
   
    


    /**
     * Called by the browser or applet viewer to inform this JApplet that it
     * has been loaded into the system. It is always called before the first 
     * time that the start method is called.
     */
    public void init()
    {
        String userInput;
    	String numberString = "";
    	parkingFee = 25;
   		costOfBooks = 125.50;
    	
        //Getting input from user
        userInput = JOptionPane.showInputDialog(null, numberString, "Enter the number of credits: ", JOptionPane.QUESTION_MESSAGE);
        // Parsing string input to double data type
        credits = Double.parseDouble(userInput);
        // provide any initialisation necessary for your JApplet
        
        //Getting input from user
        userInput = JOptionPane.showInputDialog(null, numberString, "Enter the cost per credit: ", JOptionPane.QUESTION_MESSAGE);
        // Parsing string input to double data type
        costPerCredit = Double.parseDouble(userInput);
        // provide any initialisation necessary for your JApplet 
        
    }

    /**
     * calculateTuition method receives cost per credit, credits, cost of books, and parking fee and totals it for Tuition
     */
    public double calculateTuition(double costPerCredit, double credits, double costOfBooks, double parkingFee)
    {
   			double totalTuition = (credits * costPerCredit) + costOfBooks + parkingFee;
   			return totalTuition;
    } 
    
    
        public void paint(Graphics g) {
        	//Setting Fonts
        	Font outputFont = new Font ("Arial", Font.PLAIN, 18);
        	Font headerFont = new Font ("Calibri", Font.BOLD, 26);
        	
        	//Creating white background
        	Graphics2D g2 = (Graphics2D) g;
        	super.paint(g2);
        	g2.setColor(Color.WHITE);
        	g2.fillRect(0, 0, 700, 400);  
        	
        	// Creating the left side NHCC display
        	Image imgNHCC = getImage(getCodeBase(), "nhcc_logo.png");
        	g2.drawImage (imgNHCC, 100, 20, this);
        	g2.setFont(outputFont);
        	g2.setColor(Color.BLUE);
        	g2.drawString("NORTH HENNEPIN COMMUNITY COLLEGE", 20, 200);
        	g2.setColor(Color.BLACK);
        	g2.drawString("Visit http://www.nhcc.edu for more information", 20, 220);
        	
       		
       		// Right side display
       		// calling calculateTuition method into returnValue double 
        	double returnValue = calculateTuition(costPerCredit, credits, costOfBooks, parkingFee);
        	
        	// Printing result data;
        	g2.setFont(headerFont);
        	g2.setColor(Color.RED);
        	//declaring variable for formatting results
        	String finalFormat;

			// Drawing Text and Underline for Heading
        	g2.drawString("TOTAL COST OF TUITION:", 400, 40);
        	g.setColor(Color.BLUE);
        	g.drawLine( 400, 45, 675, 45);
        	
        	// Displaying number of credits being taken
        	g2.setFont(outputFont);
        	g2.setColor(Color.BLACK);
        	finalFormat = currencyFormat.format(credits);
        	g2.drawString("Credits taking: " + finalFormat, 400, 80);
        	
        	// Displaying cost per credit (from user input)
        	finalFormat = currencyFormat.format(costPerCredit);
        	g2.drawString("Cost per credit: $" + finalFormat, 400, 110);

        	// Displaying cost of books (static value)
        	finalFormat = currencyFormat.format(costOfBooks);
        	g2.drawString("Cost of books: $" + finalFormat, 400, 140);
        	
        	// Displaying cost of parking (static value)
        	finalFormat = currencyFormat.format(parkingFee);
        	g2.drawString("Cost of parking: $" + finalFormat, 400, 170);
        	
        	// Displaying total cost of tuition calculated by calculateTuition method
        	finalFormat = currencyFormat.format(returnValue);
        	g2.drawString("Total tuition: $" + finalFormat, 400, 200);
        	
    }
    
}

    
