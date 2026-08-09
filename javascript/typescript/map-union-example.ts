// Initialize a new Map to represent the store's inventory
// Changed key type to 'string | number' to support both names and IDs
let inventory = new Map<string | number, number>();

// Use set() to add a key-value pair with a gadget name as the key and its quantity as the value
let gadget1 = { name: 'Clippers', quantity: 100 };
inventory.set(gadget1.name, gadget1.quantity);

// Use set() again to add a numeric key representing a product ID and its corresponding quantity
// Created a numeric product ID and used it as the key
let productId = 404;
let productQuantity = 50;
inventory.set(productId, productQuantity);

console.log(inventory);

// Use get() to retrieve and log the quantity of a particular gadget from the inventory
console.log(inventory.get('Clippers')); // Outputs: 100

// Use has() to check if a product with a certain ID exists within the inventory
// Checking for the numeric product ID created above
console.log(inventory.has(404)); // Outputs: true

// Use delete() to remove an item from the inventory
inventory.delete("Clippers");
