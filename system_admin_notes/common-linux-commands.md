
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