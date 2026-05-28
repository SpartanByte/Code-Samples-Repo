const express = require("express");
const app = express();
const PORT = process.env.PORT || 3000;

// Middleware
app.use(express.json()); // Parse JSON request bodies
app.use(express.urlencoded({ extended: true }));

// --- In-memory "database" ---
// TODO: Replace with real database MongoDB, PostgreSQL, etc.
let events = [
  { id: 1, name: "Event One" },
  { id: 2, name: "Event Two" },
];

// ───────────────────────────────
//  Routes
// ───────────────────────────────

// Health check
app.get("/", (req, res) => {
  res.json({ message: "Events API is in motion!" });
});

// GET all events
app.get("/api/events", (req, res) => {
  res.json(events);
});

// GET a single event by ID
app.get("/api/events/:id", (req, res) => {
  const event = events.find((e) => e.id === parseInt(req.params.id));
  if (!event) return res.status(404).json({ error: "Event not found" });
  res.json(event);
});

// POST — create a new event
app.post("/api/events", (req, res) => {
  const { name } = req.body;
  if (!name) return res.status(400).json({ error: "Name is required" });

  const newEvent = { id: events.length + 1, name };
  events.push(newEvent);
  res.status(201).json(newEvent);
});

// PUT — update an existing event
app.put("/api/events/:id", (req, res) => {
  const event = events.find((e) => e.id === parseInt(req.params.id));
  if (!event) return res.status(404).json({ error: "Event not found" });

  const { name } = req.body;
  if (!name) return res.status(400).json({ error: "Name is required" });

  event.name = name;
  res.json(event);
});

// DELETE — remove an event
app.delete("/api/events/:id", (req, res) => {
  const index = events.findIndex((e) => e.id === parseInt(req.params.id));
  if (index === -1) return res.status(404).json({ error: "Event not found" });

  events.splice(index, 1);
  res.json({ message: "Event deleted" });
});

// ───────────────────────────────
//  Start server
// ───────────────────────────────
app.listen(PORT, () => {
  console.log(`Server is running on http://localhost:${PORT}`);
});