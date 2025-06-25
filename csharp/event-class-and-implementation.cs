namespace EventManagement
{
    // Event class represents a single event with details using getters and setters
    public class Event
    {
        // Define properties for Event class
        public string EventName { get; set; }
        public DateTime EventDate { get; set; }
        public string Venue { get; set; }
        public string City { get; set; }
        public string State { get; set; }
        public string Description { get; set; }
        public decimal TicketPrice { get; set; }

        // Constructor of Event class
        // Initialize properties with default (or) provided values
        public Event(string eventName, DateTime eventDate, string venue, string city, string state)
        {
            EventName = eventName;
            EventDate = eventDate;
            Venue = venue;
            City = city;
            State = state;
            Description = "No description provided."; // Default description
        }

        // Provide a string representation of the Event object
        public override string ToString()
        {
            return $"Event Name: {EventName}\n" +
                   $"Date: {EventDate.ToShortDateString()} at {EventDate.ToShortTimeString()}\n" +
                   $"Location: {Venue}, {City}, {State}\n" +
                   $"Description: {Description}\n" +
                   $"Ticket Price: {TicketPrice:C}\n"; // Note: :C formats as currency
        }
    }
}

// Demonstrate implementation and usage of the Event class
public class Program
{
    public static void Main(string[] args)
    {
        /// First Event usage example: Concert

        // Create a DateTime object for the event date.
        // Using a specific date and time for demonstration.
        DateTime concertDate = new DateTime(2025, 10, 26, 19, 0, 0); // October 26, 2025, 7:00 PM

        // Instantiate the class for a concert (uses the constructor)
        Event minneapolisConcert = new Event(
            eventName: "Rock & Roll Band Example",
            eventDate: concertDate,
            venue: "First Avenue",
            city: "Minneapolis",
            state: "MN"
        );

        // --- Populating other properties using the instantiation ---
        minneapolisConcert.Description = "An epic night of classic rock hits!";
        minneapolisConcert.TicketPrice = 45.99m;

        /// Display output
        Console.WriteLine("--- Concert Details ---");
        Console.WriteLine(minneapolisConcert.ToString());
        Console.WriteLine("\n---------------------\n");

        /// Second Event usage example: Code Clinic

        // --- Creating another event with different properties ---
        DateTime codeClinicDate = new DateTime(2025, 11, 15, 9, 30, 0); // November 15, 2025, 9:30 AM

        Event codingClinic = new Event(
                eventName: "C# Fundamentals Clinic",
                eventDate: codeClinicDate,
                venue: "Community Center - Room 301",
                city: "St Paul",
                state: "MN"
        );

        codingClinic.Description = "A hands-on workshop to learn the basics of C# programming.";
        codingClinic.TicketPrice = 129.00m;

        /// Display output
        Console.WriteLine("--- Coding Clinic Details ---");
        Console.WriteLine(codingClinic.ToString());
        Console.WriteLine("\n---------------------\n");

        /// To modify an event property
        Console.WriteLine("Modifying 'Rock & Roll Revival' ticket price...");
        codingClinic.TicketPrice = 139.99m; // Late registration price
        /// use string interpolation for its direct and readable syntax
        Console.WriteLine($"New Ticket Price for {codingClinic.EventName}: {codingClinic.TicketPrice:C}");
    }
}