## Phase 1: Kinetic Cipher Simulation

### Observation and Interaction
- The web page features a bouncing ball simulation.
- Among many decoy balls, one key ball:
  - Starts as dark grey (`#4a5568`).
  - Flashes **red (`#ef4444`)** for a **short** duration or **blue (`#3b82f6`)** for a **long** duration when it hits the ground.
- Clicking the simulation area reveals a hidden clue in the `<div id="hidden-clue">`:
  a2V5X2NsdWUuaHRtbA==---TG9vayBjbG9zZWx5IGF0IHRoZSBzb3VyY2Ugb2YgYWxsIG1vdGlvbi4=

### Decoding the Hidden Clue
The string is Base64-encoded and split into two parts:

- **Part 1**: `a2V5X2NsdWUuaHRtbA==` → `key_clue.html`
- **Part 2**: `TG9vayBjbG9zZWx5IGF0IHRoZSBzb3VyY2Ugb2YgYWxsIG1vdGlvbi4=` → `Look closely at the source of all motion.`

> 🔍 The second part hints at **gravity**, a clue for later.

---

### Extracting the Morse Code from JavaScript
1. Open Developer Tools (shortcut and right click to open devtools are disabled but can be accessed by opening devtools in a new tab before pasting the vercel link) → Sources tab (clearly shows source script file) → Locate the obfuscated JavaScript by navigating to https://kinetic-cipher-f.vercel.app/script.js.
2. Identify the decoding function:

```js
const reconstructedMorse = (function(_v1, _v2) {
    const _v3 = [];
    const _v4 = [
        146, 146, 146, 146,      // H
        132,                     // (space)
        146, 146, 145, 146,      // F
        132,
        146, 146, 145,           // U
        132,
        146, 146,                // I
        132,
        145, 146, 145,           // K
        132,
        145, 146, 146, 145       // X
    ];
    const _v5 = _v2;
    for (let _i = 0; _i < _v4.length; _i++) {
        _v3.push(String.fromCharCode(_v4[_i] - _v5));
    }
    return _v3;
})([], 100);

console.log(reconstructedMorse.join(''));
```
The array holds ASCII codes offset by 100. Subtracting 100 yields Morse characters.
### Translate Morse code to text
- Morse Sequence:
  .... ..-. ..- .. -.- -..-
**Extracted Ciphertext: HFUIKX**
## Phase 2: The Data Vignette (key_clue.html)
### Analysing the web page source
1. Open https://kinetic-cipher-f.vercel.app/key_clue.html.
2. The visible content says:
"Every detail, no matter how small, could be critical."
3. Inspect the page source and locate the following:
```html
<!-- Wordplay: Vigenere -> Vignette (a small, pleasing picture or view) -->
<meta name="fragment-data" content="R1JBVklUWVhYWA==">
```
### Decoding Vigenere key
Decode the Base64 meta tag:
R1JBVklUWVhYWA== → GRAVITYXXX
Extract final vigenere key: GRAVITY (XXX just padding)
## Phase 3: Final decryption and flag
### Vigenere decryption
Formula: P<sub>i</sub> = (C<sub>i</sub> − K<sub>i</sub> + 26) mod 26
**Decrypted message: BOUNCE**
## Final flag: hackemon{BOUNCE}



