### uBlock Syntax Snippets
![uBlock Origin Logo](/images/ublock-logo.png "uBlock Origin")

**What is uBlock?**
uBlock syntax is a set of rules and patterns used by uBlock Origin (uBO) and similar content blockers to identify and neutralize unwanted web content.</br>
uBlock syntax originally started on Adblock Plus (ADP) and uBO is based on that. However, uBO significantly extends that syntax with advanced capabilities like scriptlet injection and HTML filtering.

**What is scriptlet injection?**
Scriptlet injection is a security vulnerability where attackers insert malicious code (scripts) into web applications, tricking them into executing it, often through weak input validation, leading to data theft (cookies, PII), website defacement, phishing, or unauthorized commands. 
- it is closely related to Cross-Site Scripting (XSS) but applicable to server-side contexts as well
- malicioius scripts run in the user's browser or on the server which compromises system and data integrity

**How it works**
- Exploitation of Input Fields

- **router/switch**
    - Router should support minimum of **Gigabit Ethernet (1GbE)**
    - For faster performance and handling large media files, consider a router and switch with *2.5GbE or 10GbE 


Filter Type,Syntax Example,What it does
Simple Block,`,
Cosmetic Hide,##.social-share,"Hides any element with the class ""social-share""."
Exception,`@@,
Domain Specific,example.com##.ad-box,"Hides "".ad-box"" only when visiting example.com."


| Filter Type    | Syntax Examples |  What It Does |
| -------- | ------- | ------- | 
| Simple Block | ` (tick) | Many simple functions enabled by a blocker's UI (see below) | 
| Cosmetic Hide | `##.social-share` | Hides any element with the class "social-share" |
| Exception | `@@ | Tells the blocker to **allow** specific requents/elements normally blocked by a filter list. Exception does not equal error in this case. |
| Domain Specific | example.com##.ad-box | Hides `ad-box` only when visiting example.com |

#### **Simple Blocks**
- default: when installed, it automatically applys filter lists to block common ads and trackers
- Element Picker (Eyedropper icon or "block element" buttons)
   - You can click this in the uBlock (or Adblock Plus) dashboard to activate this feature.
   - You can then hover over elements (ads, divs, videos, images) where they are highlighted. Clicking the highlighted element creates a simple filter that permanently hides that type of element and that site and potentially others.
   - in Adblock Plus, there is a "Block Element" button that does the same thing

In many cases, domain specific is preferred to prevent undesired behavior. You can also apply CSS-like selectors:
