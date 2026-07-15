
/**
 * SET OPERATIONS
 */

// Set examples for media file types
let mediaSet = new Set(['mp3', 'mp4', 'avi', 'wav']);
mediaSet.add('mp3');
// To add multiple values in one line, you need to chain the methods
mediaSet.add('jpg').add('png').add('webp');
mediaSet.add('txt'); // incorrect filetype to remove in the next line
mediaSet.delete('txt'); // remove a value from the set
console.log(mediaSet); // Set(7) { 'mp3', 'mp4', 'avi', 'wav', 'jpg', 'png', 'webp' }

mediaSet.delete('wav'); // remove a value from the set
console.log(mediaSet.has('wav')); // false

// displaying or checking the size of the set, must use Set<string> Parameterized Type syntax to specify the type of elements in the set
let digitalLibrary: Set<string>  = new Set(); // Create a new Set to store digital library items
digitalLibrary.add('E-book');
digitalLibrary.add('Audiobook');
console.log(String(digitalLibrary.size)); // Display the size of the set, which is 2

// Set operations to convert to array
let mySet = new Set<number>([1, 2, 3]);
let myArray = [...mySet]; // Spread operator to convert a set to an array
console.log(myArray);  // Output: [1, 2, 3]

/**
 * MAP OPERATIONS
 */

const landmarkDictionary = new Map<object, string>();
const eiffelTowerCoords = { latitude: 48.8584, longitude: 2.2945 }; // Object key representing Eiffel Tower's location

landmarkDictionary.set(eiffelTowerCoords, 'Famous Parisian Landmark'); // Adding a key-value pair to the dictionary
console.log(landmarkDictionary.get(eiffelTowerCoords), eiffelTowerCoords); // log the stored landmark label and its coordinate object 

// Define a new Map to store movie genres with object keys
let movieGenres = new Map<object, string>();
let n1984 = { title: '1984', genre: 'Dystopian' };
let hobbit = { title: 'The Hobbit', genre: "Fantasy" };
let toKillAMockingBird = { title: "To Kill A Mockingbird", genre: "Classic" };

// Maps require both a Key and a Value when using .set()
movieGenres.set(n1984, n1984.genre);
movieGenres.set(hobbit, hobbit.genre);
movieGenres.set(toKillAMockingBird, toKillAMockingBird.genre);

// Updated the console.log to match the actual variables
movieGenres.forEach((value, key) => {
  console.log(`Movie: ${JSON.stringify(key)} has the genre: ${value}`);
});

// To .get() by object key, you must pass the exact same object reference
console.log(movieGenres.get(hobbit)); // Outputs: Fantasy

// Searching for matches in the map using object keys
const celestialBodies = new Map<string, string>();

// Adding a new entry to the celestialBodies map with the key 'AsteroidB-612'
let asteroidB = {title: 'AsteroidB-612', description: 'Small asteroid home to a solitary rose'};
celestialBodies.set(asteroidB.title, asteroidB.description);

console.log(celestialBodies.has('AsteroidB-612')); // Should log true
console.log(celestialBodies.get('AsteroidB-612')); // Should log the description of the asteroid
