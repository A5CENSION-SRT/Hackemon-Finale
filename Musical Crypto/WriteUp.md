Hackémon CTF
🎵 Hackemon CTF Challenge: The Cipher's Symphony 🎵
Category: Crypto
Date: 2025-07-14
Author: Raghottam Nadgoudar

Challenge Description:
Professor Oak once experimented with music and memory. In his archives, seven text files have been found—each filled with strange logs, web links, and digital debris.

🎯 Your objective:
Hidden somewhere within these files is a musical cipher containing a flag.
The format is: hackemon{flag}

The cipher uses musical notes and is encoded using a specific scheme.
Figure out how to decode it.

🧠 Rules:

- You are given 7 files.
- One of them hides the musical message.
- No brute force is required.
- Think like a musician, decode like a hacker.

When you're ready, visit the project page to learn more.
https://github.com/RaghottamNadgoudar/SaReGaMaPa

🎼 Solve the melody. Gotta hack 'em all!

Solution:

On visiting the GitHub repo, we find seven files named after musical syllables, but one file, slo.txt, is a typo (should have been so.txt).
The other files (do.txt, re.txt, etc.) contain junk data like:
LinkedIn URLs
Lorem ipsum text
Rickrolls or broken HTML
Spam comments

→ This suggests slo.txt is the only file containing real musical notes. 2. Step-by-Step Solution
Step 1: Open slo.txt and Read Notes

The contents are:
['G', 'C', 'D', 'A#', 'E', 'C', 'D', 'C#', 'Start', 'G', 'C', 'D#', 'G', 'B', 'D', 'F#', 'G#', 'D', 'C#', 'End']

This sequence looks like a musical encoding using the 12-tone chromatic scale.
Step 2: Understand the Cipher Mapping

The encoding rule (from the provided decoder or challenge context):

    A–Z are mapped to notes cyclically using:

chromatic_notes = ['C', 'C#', 'D', 'D#', 'E', 'F', 'F#', 'G', 'G#', 'A', 'A#', 'B']

so,

    A → C, B → C#, C → D, ..., M → C, ..., Z → B

    Multiple letters map to the same note (e.g., C → [A, M], F → [E, Q]).

    Start and End indicate the flag boundary { ... }

Step 3: Decode Using a Python Script

Using the provided decoder.py, or writing one with itertools.product, we decode all possible combinations between Start and End.

Decoded note segment:

['F', 'A', 'B', 'E', 'D#', 'B', 'G', 'E', 'A']

Each note maps to multiple letters:

    F → [E, Q]

    A → [I, U]

    B → [L, X]

    D# → [D, P]

    G → [F, R]

    etc.

When brute-forced using a script:

from itertools import product

# Reverse map logic...

We get flags like:

hackemon{EIPDLXFEI}
hackemon{TYPHLOSION}
hackemon{QUBDPXREF}
...

Step 4: Identify the Real Flag

    Among all possibilities, hackemon{TYPHLOSION} stands out — it’s a valid Pokémon name.

Flag: hackemon{TYPHLOSION}
