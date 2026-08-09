// Simple union type for keys in a map structure
// If your map simply associates either a string (name) or a number (quantity) with a shared inventory item structure
interface InventoryItem {
  name: string;
  quantity: number;
  location: string;
}

// Key can be a string OR a number
type InventoryKey = string | number;

// A map structure using the union key type
type InventoryMap = Map<InventoryKey, InventoryItem>;

const warehouse: InventoryMap = new Map();

// Valid: Look up by string name
warehouse.set("Laptop", { name: "Laptop", quantity: 45, location: "Aisle 3" });

// Valid: Look up by numeric quantity or ID
warehouse.set(45, { name: "Laptop", quantity: 45, location: "Aisle 3" });

/**
 * Differentiating Values Based on Key Type
 * If you want the map to return different data structures 
 * depending on whether you searched by name or by quantity, use a union of specific key-value record types.
*/
interface ItemDetails {
  sku: string;
  price: number;
}

interface CountMetrics {
  reorderLevel: number;
  lastStockCountDate: Date;
}

// Map definition where string keys point to ItemDetails, 
// and number keys point to CountMetrics
type StrictInventoryMap = 

  | { get(key: string): ItemDetails | undefined; set(key: string, value: ItemDetails): void }
  | { get(key: number): CountMetrics | undefined; set(key: number, value: CountMetrics): void };

/**
 * Discriminated Union for Safe Lookups
 * When retrieving data from a mixed-key map, 
 * TypeScript needs help narrowing down what type of data was returned. You can wrap your map values in a discriminated union:
 */
interface NameLookupResult {
  lookupType: "byName";
  item: { sku: string; quantity: number };
}

interface QuantityLookupResult {
  lookupType: "byQuantity";
  itemGroup: string[]; // List of items matching this quantity
}

type MapValueUnion = NameLookupResult | QuantityLookupResult;

// Create the map
const inventoryRegistry = new Map<string | number, MapValueUnion>();

// Function to safely extract data using runtime checks
function lookupInventory(key: string | number) {
  const result = inventoryRegistry.get(key);
  
  if (!result) return "Not found";

  // Narrowing the type using the discriminant field
  if (result.lookupType === "byName") {
    // TypeScript knows 'result' is NameLookupResult
    return `Quantity left: ${result.item.quantity}`;
  } else {
    // TypeScript knows 'result' is QuantityLookupResult
    return `Items with this stock level: ${result.itemGroup.join(", ")}`;
  }
}
