# ============ PERSIAN'S CLAW-SLASH QR MAKER ============
# pip install qrcode[pil] pillow
import qrcode
from PIL import Image, ImageDraw

FLAG = "hackemon{INTEL_I7_4790K}"

# 1️⃣  Create the clean QR (version 3, error-level Q ≈25 %)
qr = qrcode.QRCode(
    version=3,
    error_correction=qrcode.constants.ERROR_CORRECT_Q,  # heals 25 % damage
    box_size=10,
    border=4,
)
qr.add_data(FLAG)
qr.make(fit=True)
qr_img = qr.make_image(fill_color="black", back_color="white").convert("RGBA")

# 2️⃣  Load a background photo (Persian’s “lab” scene)
bg = Image.open("clean.png").convert("RGBA").resize(qr_img.size)

# 3️⃣  Build a triangular mask = the damaged zone
mask = Image.new("L", qr_img.size, 255)           # 255 = keep QR
draw = ImageDraw.Draw(mask)
w, h = qr_img.size
slash = [(0, 0), (w, 0), (0, int(h * 0.55))]      # big right-angle triangle
draw.polygon(slash, fill=0)                       # 0 = cut it out

# 4️⃣  Apply the mask: QR pixels disappear where mask == 0
qr_damaged = Image.composite(qr_img, bg, mask)

# 5️⃣  Save result
qr_damaged.save("rotom_cinebench.png")
print("Rotom’s corrupted QR saved!")

