## Step 1: Inspect the image
- We're given only a single JPEG file: final_resonance.jpeg. It's suspiciously small, which suggests some form of steganography. The solution steps mentioned below use tools **steghide** and **binwalk** in Ubuntu environment.

```js
binwalk --dd='.*' final_resonance.jpeg
```
- Binwalk extracts three JPEGs, suggesting the original was formed by concatenating which may look like:
```js
0 17A03 193FE
```
- Navigate to the extracted files
```js
    cd _final_resonance.jpeg.extracted/
```
- Rename the 3 files as base.jpeg, symphony.jpeg and harmony.jpeg to make it easier for further digging/extraction.
  ```js
  mv 0 base.jpeg
  mv 17A03 symphony.jpeg
  mv 193FE harmony.jpeg
  ```
  depending on how the extracted files appear on local systems.

## Step 2: Try extracting hidden data
- We'll try Steghide on the first one:
```js
steghide extract -sf base.jpeg
```
- Going back to our question, there is an anagram present solving which we get 'reveal the scanner' which is the passphrase for the first file.
```js
steghide extract -sf base.jpeg -p "reveal the scanner"
```
- It extracts: song.txt
## Step 3: Read song.txt
```js
cat song.txt
```
- It leads us to a qr code (through github link), which basically just shows a youtube video featuring the dolphin meme from 'Symphony' by Clean Bandit feat. Lara Larson. It appears to be a red herring but it in fact is not.
## Step 4: Try the second image
- The most obvious step going forward would be to try to extract the 2nd file symphony.jpeg, with the password **'symphony'**. It works and we get **string.txt**.
- string.txt is not that useful with a bunch of dead ends like rickrolls, useless repositories and base64 encoded gibberish.
## Step 5
- The trick to open the 3rd file is hidden in the previous password itself, except we would need to base64 encode it and try. 
- The password for harmony.jpeg is **'c3ltcGhvbnk='** and we get **harmony.txt**
- On opening harmony.txt we get
  ```js
  A final note slightly offkey.
  Qeb nrfZhYr gl zlk qeb Xka fp alkbiv.
  PS: we won't say sike here don't worry
  ```
- The string is unconventional in comparison to the other flags, there is no direct indication if this is a flag or not plus it does not form any meaningful phrase.
- But here's the catch, it is the final flag! A little time might be spent in trying to decode it using various keys and methods, but it does not give any sensible output, therefore entering it directly as a final resort for the flag would have just done the deal!
## Final Flag: hackemon{Qeb nrfZhYr gl zlk qeb Xka fp alkbiv}






