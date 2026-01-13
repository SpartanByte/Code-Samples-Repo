
## Common Linux/UNIX Commands

#### MySQL Related
**Check if MySQL is running** (same for virtual machines)
`sudo service mysql status`
Output should be similar to `mysql start/running, process 14947`

#### Networking Related

-----

#### File Related

##### How to use tail
`tail` is used to show the last 10 lines of a file. This is very helpeful in monitoring log files in real time as well as debugging purposes to solve server errors.

`tail` lists 10 lines by default
`tail error.log`

**Tail options**
View a specific number of lines
`tail -n 20 error.log`
`# or`
`tail -20 error.log`

View everything from a specific line number to the end. The `+` signed is used for this.
`tail -n +50 error.log #Displays content starting from line 50`

**Real-time Monitoring**
Monitor a file for continuous updates
*Use the -F option if log files are rotated (renamed or removed and re-created with the same name). This option ensures tail keeps tracking the name of the file, not the original file descriptor.*
`tail -f /var/log/syslog`

Monitor and re-open file upon rotation
`tail -F /var/log/syslog`

--- 

More resources for tail cheatsheets and examples
[GeeksForGeeks: Tail command in Linux with examples](https://www.geeksforgeeks.org/linux-unix/tail-command-linux-examples/)

### VIM Commands

**Basic Navigation**
| Command  | Purpose |
|---|---|
| **h** / **j** / **k** / **l**  |  Move Left, Down, Up, and Right (the core navigation) |
| **Ctrl + f**  | Page Down (Forward one full screen)  |
| **w**  |  Jump forward to the start of the next word |
| **b**  |  Jump backward to the start of the previous word |
| **0** (zero)  | Jump to the beginning of the current line  |
| **$**  | Jump to the end of the current line  |
| **gg**  |  Go to the first line of the document |
| *G*  | Go to the last line of the document  |

**Searching and Replacing**
| Command  | Purpose |
|---|---|
| **/word**  |  Search forward for "word" |
| **?word**  | Search backward for "word"  |
| **n**  |  Repeat search in the same direction (Next) |
| **N**  |  Repeat search in the opposite direction |
| **:%s/old/new/g**  | Replace all occurrences of "old" with "new" in the file |
| **:%s/old/new/gc**  | Replace all occurrences but ask for confirmation |

**Editing and Deleting**
| Command  | Purpose |
|---|---|
| **i**  |  Enter Insert mode (start typing text) |
| **Esc**  | Return to Normal mode (stop typing, start commanding)  |
| **x**  |  Delete the character under the cursor |
| **dd**  |  Delete (cut) the entire current line |
| **dw**  |  Delete (cut) from the cursor to the end of the word |
| **yy**  |  Yank (copy) the current line |
| **p**  |  Paste the copied/deleted text after the cursor |
| **u**  |  Undo the last action |
| **Ctrl + r**  |  Redo the last undone action |

**Saving and Exiting**
| Command  | Purpose |
|---|---|
| **:w**  |  Write (Save) the file |
| **:q**  | Quit Vim (fails if there are unsaved changes)  |
| **:wq**  | Write and Quit (Save and exit) |
| **:q!**  | Quit without saving (discard all changes) |
| **:x**  | Save and exit (similar to :wq, but only writes if changes were made) |
--- 