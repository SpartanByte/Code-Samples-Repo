<?php

declare(strict_types=1);

class Event {
    private string $name;
    private string $date;
    private string $location;
    private int $attendees;

    // Simplified constructor accepting direct properties
    public function __construct(
        string $name,
        string $date,
        string $location,
        int $attendees
    ) {
        $this->name = $name;
        $this->date = $date;
        $this->location = $location;
        $this->attendees = $attendees;
    }

    /**
     * Static factory method to parse the data string
     * static factory is a design pattern that provides a static method to create instances of a class, 
     * often used for more complex initialization or when the constructor is not sufficient.
     */
    public static function createFromString(string $dataString): self {
        $data = explode(',', $dataString);
        
        return new self(
            $data[0],
            $data[1],
            $data[2],
            (int) $data[3]
        );
    }

    public function __toString(): string {
        return "Event[name={$this->name}, date={$this->date}, location={$this->location}, attendees={$this->attendees}]";
    }
}

// clean code: main function to utilize the static method
function main() {
    $dataString = "Conference,2023-12-25,New York,500";
    $event = Event::createFromString($dataString);
    echo $event;
}

main();
?>