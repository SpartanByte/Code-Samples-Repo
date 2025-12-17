
## **General Networking Notes: In Progress**

### Setting up a private network and NAS

A typical home network config is already a private network using one of the reserved IP address ranges (like $192.168.x.x).

--- 

#### Key steps and best practices of setting home network to integrate NAS

###### **Hardware essentials for the private network**
- **router/switch**
    - Router should support minimum of **Gigabit Ethernet (1GbE)**
    - For faster performance and handling large media files, consider a router and switch with *2.5GbE or 10GbE ports*
    - **Cat6** or **Cat7** Ethernet cables
- **wired connection**
    - NAS should always be connected to the router or switch using Ethernet
    - Superior stability and speed

--- 

###### **Basic Setup**
- Private network being the Local Area Network using non-internet-routable IP addresses
- Remember the central device is the router

**Steps for setting up a connection to give the NAS a permanent address on the network**

- **Physical Network Setup**

| Component    | Role | Connection Method |
| -------- | ------- | ------- |
| Modem  | connects to the ISP   | Coaxial/Fiber/DSL line to ISP |
| Router | creates a private LAN, assigns IP addresses, routes data     | Connect the modem to the router's WAN/Internet port (usually a different color) | 
| NAS & Devices    | storage, computers, etc    | Connect your NAS to one of the router's LAN ports (via Ethernet cable) or a switch connected to the router |

**Key Rule for NAS**: Always use a wired Ethernet connection for your NAS to ensure maximum speed and reliability for large file transfers.

- **Router Configuration (LAN/DHCP Settings)**
    - DHCP: Dynamic Host Configuration Protocol - automatically assigns a unique IP address to every device that uses your LAN.
    - Access the router
        - open the browser and type the router's default IP address
    - Find DHCP Settings
        - navigate to the network, LAN, or DHCP setting
        - will show the **IP Address Pool** which is the range of addresses your router can handout
        - e.g., 9$192.168.1.100$ to 10$192.168.1.254$
- **Set a Fixed IP Address (DHCP Reservation)**

--- 

###### **Network config for NAS**
- **Static IP/DHCP reservation**
    - set a DHCP reservation in the router settings using the NAS device's **MAC address**.
    - allows the router to handle DNS records more easily
    - Term: DCHP reservation: assigns a permanent, specific IP address to a particular network device through the DHCP server. Ensures it always gets the same IP without manual static configuration on the device itself. It binds the IP to the device's unique MAC address.
- **IP Address Range**
    - The home network will typically use one of the private IP ranges: **192.168.1.x or 192.168.0.x**

###### **Initial NAS Setup and Storage**
- **Physical Installation**
    - install the NAS specific hard drives into the bays of the NAS device (some NAS come with hard drives installed)
- **Initial Software Configuration**
    - Access the NAS's setup interface in the browser using its default hostname and IP.
    - Configure based on language, time zone, strong admin username/password
- **RAID Configuration**
    - Setup storage pools and volumes to protect against drive failure
    - For basic NAS, configure a RAID level for data redundancy
    - Common choices: RAID 1 - (mirroring), RAID 5/6 - (parity)

###### **Best Practices**
- **use the "Backup (3-2-1) Rule"**`
    - RAID is not a backup
    - 3 copies of your data (primary copy and two backups)
    - 2 different types of media (NAS, external hard drive, etc)
    - 1 copy off-site (cloud storage, etc)
- Regularly update any firmware and software on the NAS and router for security
--- 