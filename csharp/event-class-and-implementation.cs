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

    }
}