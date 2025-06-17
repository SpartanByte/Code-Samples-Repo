/**
 * @(#)TrafficLight.java
 *
 * @author Brian Wardwell
 * @program Traffic Light with Music
 * @version 1.00 2016/10/1
 * 
 */

import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
import java.util.*;
import java.applet.*;

public class TrafficLight extends JApplet
{
    JButton greenButton, yellowButton, redButton;
    JLabel topLabel, bottomLabel, imageLabel;
    JLabel greenLight, redLight, yellowLight, javaCar;
    JTextArea colorBox;
    JPanel buttonPanel, imagePanel;
    Image img, greenImage, redImage, yellowImage, javaImage;
    ImageIcon imgIcon, redIcon, greenIcon, yellowIcon, carIcon;
    private GridLayout gridLayoutMain;
    String colorButton;
    AudioClip ac;
    JTextArea imageBox;
    
    public void init()
    {
        doColor();
        doBottom();
        doCenter();
        doLeft();
        
        JPanel mainPanel = new JPanel();
        gridLayoutMain = new GridLayout(3,1);
        
        mainPanel.setLayout(gridLayoutMain);
        mainPanel.setSize(800, 800);
        mainPanel.add(imageBox);
        mainPanel.add(buttonPanel);
        mainPanel.add(javaCar);
        add(mainPanel);
        
        // The Manhattan Transfer - "Java Jive" http://www.mididb.com/the-manhattan-transfer/java-jive-midi/
        String audioFilename = "JavaJive_ManhattanTransfer.mid";
        ac = getAudioClip( getCodeBase(), audioFilename);
        ac.play();
    }
    
    public void doCenter()
    {
      colorBox = new JTextArea(); 
      colorBox.setSize(800,200);
      colorBox.setFont( new Font("Serif", Font.PLAIN, 22));
      colorBox.setBackground(Color.BLACK);
      colorBox.setForeground(Color.RED);
      colorBox.setText("Traffic Light");
    }
    
    public void doColor()
    {
        imageBox = new JTextArea();
        imageBox.setSize(800,200);
        imageBox.setBackground(Color.YELLOW);
        imageBox.setText("Traffic Light");
    }
    
    public void doBottom()
    {
      imagePanel = new JPanel();
      
      GridLayout gridLayoutImage = new GridLayout(1,3);
      yellowImage = getImage ( getCodeBase(), "yellow_light.png");
      yellowIcon = new ImageIcon (yellowImage);
      yellowLight = new JLabel(yellowIcon);
      
      redImage = getImage( getCodeBase(), "red_light.png");
      redIcon = new ImageIcon(redImage);
      redLight = new JLabel(redIcon);
        
      greenImage = getImage( getCodeBase(), "green_light.png");
      greenIcon = new ImageIcon(greenImage);
      greenLight = new JLabel(greenIcon);  
      
      javaImage = getImage( getCodeBase(), "electric-vehicle.png");
      carIcon = new ImageIcon(javaImage);
      javaCar = new JLabel(carIcon);
    }
    
    public void doLeft() 
    {
        // Creating the buttons
        greenButton = new JButton("GO");
        yellowButton = new JButton("WAIT");
        redButton = new JButton("STOP");
       
        // Setting up button background colors
        greenButton.setBackground(Color.GREEN);
        yellowButton.setBackground(Color.YELLOW);
        redButton.setBackground(Color.RED);
        
        // Attaching buttons to JPanel
        buttonPanel = new JPanel();
        setLayout (new GridLayout(1,3));
        buttonPanel.add(greenButton);
        buttonPanel.add(yellowButton);
        buttonPanel.add(redButton);
        
        // Registering event listener for all three Buttons
        redButton.addActionListener(new ButtonListener());
        greenButton.addActionListener(new ButtonListener());
        yellowButton.addActionListener(new ButtonListener());
    }
}
    
private class ButtonListener implements ActionListener
{
	public void actionPerformed(ActionEvent e)
   	{
    	if(e.getSource() == redButton)
    	{
    		imageBox.setBackground(Color.RED);
        	colorButton = "Red";
    	}else if (e.getSource() == greenButton){
    		imageBox.setBackground(Color.GREEN);
    		colorButton = "Green";
    	}else{
    		imageBox.setBackground(Color.YELLOW);
        	colorButton = "Yellow";
    	}
   }
}