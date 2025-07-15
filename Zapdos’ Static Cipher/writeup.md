# Team Rocket’s Enigma — Node 47-C

Team Rocket’s spies intercepted a mysterious encrypted transmission from an abandoned archive called **Node 47-C**. The message was encoded using a classic **Enigma machine**.

You have the file `config.png` containing all the reconstructed settings from Silph Co.’s analysts — but despite their efforts, the message remains uncracked. It’s up to you, a skilled Cyber Trainer, to decrypt the code and reveal the secret hidden inside!

**Flag format:**  
`hackemon{...}`

---

## Challenge Instructions

1. **Download and inspect `config.png`.**  
   - Check the file’s metadata for the Enigma configuration.

2. **Metadata reveals:**

Enigma Type: Commercial (Swiss-K)
Rotor Order: II - II -
II Ring Settings: 26 - 26 - 2
- 26 Starting Positions: C -
- S - W Plugboard: bq cr di ej kw mt
os px uz gh Reflector: Swiss-K stan
text



3. **Important Note:**  
   The ring settings and rotor starting positions might have been **swapped or interchanged** in the intercepted configuration. Double-check both carefully to successfully decrypt the message!

---

## Step-by-Step Solution

### 1. **Extract the Enigma Settings**

- **Type:** Commercial (Swiss-K)
- **Rotor Order:** II - II - II
- **Ring Settings:** 26 - 26 - 26 - 26
- **Starting Positions:** C - B - S - W
- **Plugboard:** bq cr di ej kw mt os px uz gh
- **Reflector:** Swiss-K standard (built-in)
- **Ciphertext:**  


3. Use the **"From Base64"** operation to decode it.  
- You will get a string of uppercase and lowercase letters and numbers.

### 2. Decrypt Using the Enigma Machine in CyberChef

1. In CyberChef, add the **"Enigma"** operation after "From Base64".  
- [CyberChef Enigma Guide](https://github.com/gchq/CyberChef/wiki/Enigma,-the-Bombe,-and-Typex)[1][2]
2. Set the Enigma parameters as found in the metadata:
- **Machine:** Commercial (Swiss-K)
- **Rotors:** II - II - II
- **Ring Settings:** 26 - 26 - 26 - 26
- **Starting Positions:** C - B - S - W
- **Plugboard:** bq cr di ej kw mt os px uz gh
- **Reflector:** Swiss-K standard (built-in)
3. If the output is not readable, **swap the ring settings and starting positions** as the challenge hints they may be interchanged.
4. Paste the Base64-decoded text as the input for the Enigma operation.

### 3. Read the Output

- The decrypted output will be your flag in the format:
hackemon{alanturingisgreat}
