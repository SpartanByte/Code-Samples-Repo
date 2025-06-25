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
                   $"Ticket Price: {TicketPrice:C}\n" + // :C formats as currency
                   $"Capacity: {(MaxCapacity > 0 ? MaxCapacity.ToString() : "Unlimited")}\n" +
                   $"Public Event: {IsPublic}";
        }
    }
}