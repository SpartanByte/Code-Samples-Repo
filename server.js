const express = require("express");
const app = express();
const PORT = process.env.PORT || 3000;

// Middleware
app.use(express.json()); // Parse JSON request bodies
app.use(express.urlencoded({ extended: true }));

// --- In-memory "database" (replace with a real DB like MongoDB/PostgreSQL) ---
let items = [
  { id: 1, name: "Item One" },
  { id: 2, name: "Item Two" },
];

// ───────────────────────────────
//  Routes
// ───────────────────────────────

// Health check
app.get("/", (req, res) => {
  res.json({ message: "API is running!" });
});

// GET all items
app.get("/api/items", (req, res) => {
  res.json(items);
});

// GET a single item by ID
app.get("/api/items/:id", (req, res) => {
  const item = items.find((i) => i.id === parseInt(req.params.id));
  if (!item) return res.status(404).json({ error: "Item not found" });
  res.json(item);
});

// POST — create a new item
app.post("/api/items", (req, res) => {
  const { name } = req.body;
  if (!name) return res.status(400).json({ error: "Name is required" });

  const newItem = { id: items.length + 1, name };
  items.push(newItem);
  res.status(201).json(newItem);
});

// PUT — update an existing item
app.put("/api/items/:id", (req, res) => {
  const item = items.find((i) => i.id === parseInt(req.params.id));
  if (!item) return res.status(404).json({ error: "Item not found" });

  const { name } = req.body;
  if (!name) return res.status(400).json({ error: "Name is required" });

  item.name = name;
  res.json(item);
});

// DELETE — remove an item
app.delete("/api/items/:id", (req, res) => {
  const index = items.findIndex((i) => i.id === parseInt(req.params.id));
  if (index === -1) return res.status(404).json({ error: "Item not found" });

  items.splice(index, 1);
  res.json({ message: "Item deleted" });
});

// ───────────────────────────────
//  Start server
// ───────────────────────────────
app.listen(PORT, () => {
  console.log(`Server is running on http://localhost:${PORT}`);
});
