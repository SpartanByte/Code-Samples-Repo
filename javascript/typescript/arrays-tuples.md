# Arrays and Tuples

**Arrays vs. Tuples**

- **Arrays**: Collections of the same type. Use **`type[]`** or **`Array<type>`**.
- **Tuples**: Fixed-length collections where each element can have a different type. Use **`[type1, type2]`**.

**Key Operations**

- **Accessing**: Use zero-based indexing, like **`planets[0]`**.
- **Length**: Use **`.length`** to see how many elements are inside.
- **Modifying**: Reassign values using their index, e.g., **`planets[1] = "Cybertron"`**.

**Adding & Removing**

- **`.push(item)`**: Adds an element to the end.
- **`.pop()`**: Removes and returns the last element.

# Multi-dimensional Arrays

- **Multi-dimensional Arrays**: These are arrays that contain other arrays as their elements, defined with types like **`any[][]`**.
- **Indexing**: Use two sets of brackets to access data; the first for the outer array and the second for the inner element (e.g., **`array[0][1]`**).
- **Key Methods**:
    - **`.splice()`**: Adds or removes elements at a specific index.
    - **`.indexOf()`**: Locates the position of a specific value.
    - **`.reverse()`**: Flips the order of elements in the array.