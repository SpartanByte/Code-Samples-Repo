using System;

class Program
{
    static void Main()
    {
        string[] instruments = { "Violin", "Drums", "Guitar", "Bass", "Keyboards", "Banjo" };
        string targetValue = "Guitar";

        // Sort the array alphabetically in-place
        Array.Sort(instruments);

        Console.WriteLine("Sorted Array:");
        foreach (string instrument in instruments)
        {
            Console.WriteLine($"- {instrument}");
        }

        Console.WriteLine($"\nSearching for '{targetValue}'...");

        // Find matching values and their indices
        bool found = false;
        for (int i = 0; i < instruments.Length; i++)
        {
            // Case-insensitive comparison (Note: this is recommended for string matching)
            if (string.Equals(instruments[i], targetValue, StringComparison.OrdinalIgnoreCase))
            {
                Console.WriteLine($"Found '{instruments[i]}' at sorted index {i}");
                found = true;
            }
        }

        if (!found)
        {
            Console.WriteLine($"'{targetValue}' was not found in the array.");
        }
    }
}