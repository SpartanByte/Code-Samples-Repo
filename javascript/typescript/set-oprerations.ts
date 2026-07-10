// Set examples for media file types
let mediaSet = new Set(['mp3', 'mp4', 'avi', 'wav']);
mediaSet.add('mp3');
// To add multiple values in one line, you need to chain the methods
mediaSet.add('jpg').add('png').add('webp');
mediaSet.add('txt'); // incorrect filetype to remove in the next line
mediaSet.delete('txt'); // remove a value from the set
console.log(mediaSet); // What happens when we try to add another 'mp3'?

mediaSet.delete('wav'); // remove a value from the set
console.log(mediaSet.has('wav')); // false

// displaying or checking the size of the set, must use Set<string> Parameterized Type syntax to specify the type of elements in the set
let digitalLibrary: Set<string>  = new Set();
digitalLibrary.add('E-book');
digitalLibrary.add('Audiobook');
console.log(String(digitalLibrary.size));

// Set operations to convert to array
let mySet = new Set<number>([1, 2, 3]);
let myArray = [...mySet]; // Spread operator to convert a set to an array

console.log(myArray); 

let myArray2 = Array.from(mySet);
console.log(myArray2);