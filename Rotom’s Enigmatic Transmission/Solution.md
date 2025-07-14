**Rotom’s Enigmatic Transmission – Full Walk-Through**
(Flag = `hackemon{woodentable}`)

🗂️ Files handed to Trainers

```
config.txt        # the Enigma settings below
cipher.txt        # MCWJAQO{S3ZC4L_J3NKP0_SYMZ34AOYX3?}
```


--------------------------------------------------------------------
🔍 1. Scout the battlefield – what is this gadget?

- The header **“Enigma M3 / UKW B”** tells us we are dealing with the *three-rotor* German Enigma used until 1943[^1].
- Enigma is *symmetric*: **encrypting and decrypting use the identical configuration**; you only need to reset the rotor windows to their starting letters before pressing the first key[^2].

--------------------------------------------------------------------
🛠️ 2. Recreate Rotom’s rig

Paste the following into any trustworthy Enigma simulator (e.g. the open-source “py-enigma”, the dcode.fr interface, or the “Enigma Simulator” browser app):

```
Machine      : Enigma M3
Reflector    : UKW B

Rotors (left→right)
  IV   Ring = Y (25)   Start = A
  VII  Ring = D (04)   Start = M
  VIII Ring = C (03)   Start = J

Plugboard    : BQ CR DI EJ KW MT OS PX UZ GH
```

Why these fields matter:

* Rotors act like **Gyarados using Dragon Dance**: every key-press advances positions, changing the substitution each time.
* The **ring setting** shifts the internal wiring, much like moving the notch on a Poké Gear.
* The **plugboard** performs ten fixed letter swaps, the extra layer that turns a simple Spearow into a fearsome Fearow.

--------------------------------------------------------------------
⚔️ 3. Launch the “Return” attack (decryption)

Steps in your simulator:

1. Clear any old settings.
2. Dial the windows to **A M J** (left→right).
3. Ensure the plugboard pairs are active.
4. Paste the ciphertext (no spaces needed; Enigma ignores everything outside A–Z).
5. Press “Decode” / “Type” / or hold the virtual keys.

The output rolls out as:

`hackemon{woodentable}`

PS. It was observed during the CTF that participnts were stuck using alternate websites which werent giving the right answer.that may be the reason some of you dint get this during CTF

--------------------------------------------------------------------
🎉 4. Claim the Badge

Submit
`hackemon{woodentable}`

--------------------------------------------------------------------
Professor’s extra notes (if Trainers get stuck)

* A letter **never encrypts to itself**; if you see one that does, the settings are wrong.
* Only uppercase A–Z pass through the rotors; punctuation is left unchanged.
* If you want to script the solve, `py-enigma` lets you reproduce the exact steps in ~10 lines of Python.

--------------------------------------------------------------------

