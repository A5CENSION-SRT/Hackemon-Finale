# Magneton’s Byte Shock — CTF Challenge Writeup

## Challenge Description

Team Rocket’s Magneton unleashed a powerful electromagnetic pulse that scrambled the data inside a mysterious file named `corrupted_binary.txt`. This vital transmission from Silph Co. now lies fragmented and obscured by static. The file contains **binary digits representing an image**.

To restore the message, you must see beyond. Magneton’s static isn’t random—it’s a challenge to your logic and skill. Only by understanding the secret dance of these electric sparks can you clear the interference.

### Riddle

> Silent sparks on a shadowed road,  
> Veils of twilight fracture the code.  
> Discordant flashes reshape the form,  
> Reflections masked in spectral reprieve.  
> In dusk’s embrace, paired phantoms weave,  
> Concordant murmurs quell the storm.

This riddle hints at the key to unraveling Magneton’s interference. Your mission is to rebuild the original image from the binary data and reveal the secret message hidden by Team Rocket’s sabotage.

**Flag format:**  
`hackemon{...}`

---

## Provided

- `corrupted_binary.txt` — contains a long string of binary digits (0s and 1s) representing an image.

---

## Solution Steps

### 1. Convert Binary Digits to an Image

Use the following Python script to convert the binary digits from `corrupted_binary.txt` into an image file (for example, PNG).  
This script assumes the image is a grayscale (black and white) image and you know the width (e.g., 256 pixels). Adjust the width as needed.

### 2. Solve the Stereogram

The generated image is a **stereogram** (a hidden 3D image).  
To see the hidden message (the flag), use an online stereogram solver and set the **displacement pixels to around 72px**:

**Stereogram Solver:**  
[https://www.easystereogrambuilder.com/stereogram-solver](https://www.easystereogrambuilder.com/stereogram-solver)

- Upload your `output.png` and adjust the displacement setting to around 72 pixels to reveal the hidden message.

---

After solving the stereogram, you will see the flag: mdfn`hjk~Vq`w`jbwdhZlvZfjjix

By using xor brute forrce we get : hackemon{Stereogram_is_cool}
