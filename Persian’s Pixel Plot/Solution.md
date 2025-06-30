1. Spotting the Sneaky Persian (OSINT / Easter-Egg)
————————————————————————————————
2. Log in to the Hackamon CTF site.
3. Open the **Settings** page. A tiny line-up of Pokémon sprites appears at the bottom.
4. Hover over each sprite—only **Persian** changes the cursor to a little paw 🐾.
5. Click Persian.
    - URL suddenly jumps to `https://github.com/overclocked-2124/FIRST-YEARS-ARCHIVE`.
    -After finding hash and dehashing it 6 times we jump to `https://github.com/A5CENSION-SRT/eterna-forest-ultra-ctf/tree/main`
    - You’re greeted by a readme file  and the file `rotom_qr29X29.png`.

————————————————————————————————
2.  Downloading the Damaged QR
————————————————————————————————

- Right-click ➜ Save Image As `rotom_qr29X29.png`.
- Visually, the code is a standard black-and-white QR except the **upper-left triangle is missing**—Persian’s “Metal Claw” mark.

————————————————————————————————
3.  Quick Repair with QRazyBox (no pixel-by-pixel pain!)
————————————————————————————————

1. Browse to **qrazybox​◆** and click
Create ➜ “New Project” ➜ “Import Image”.
2. Upload `rotom_qr29X29.png`.
3. QRazyBox auto-detects the finder squares and grids the 29 × 29 modules (Version 3).
4. The missing corner shows as **grey cells** (unknown). That’s okay—error-level Q can heal 25% damage.
5. Press **Tools ➜ Extract QR Information**.
6. Reed–Solomon kicks in and decodes the payload instantly—no manual painting required.

————————————————————————————————
4.  Result Revealed
————————————————————————————————
QRazyBox spits out:

```
hackemon{INTEL_I7_4790K}
```

————————————————————————————————
5.  Alternative One-Liner (for the coders)
————————————————————————————————

```bash
pip install pillow pyzbar
python - <<'PY'
from PIL import Image; import pyzbar.pyzbar as z
img = Image.open('rotom_cinebench.png'); print(z.decode(img)[0].data.decode())
PY
# → hackemon{INTEL_I7_4790K}
```

The PyZBar library’s error correction is good enough to handle the missing triangle without any pre-cleaning.

————————————————————————————————
6.  Submit \& Celebrate
————————————————————————————————

- Paste `hackemon{INTEL_I7_4790K}` into the flag box.

Persian’s sabotage is exposed, Professor Oak’s reputation restored, and you—Trainer—earn extra EXP on QR forensics!

