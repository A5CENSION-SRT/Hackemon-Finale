from itertools import product

# 12-tone chromatic scale
chromatic_notes = ["C", "C#", "D", "D#", "E", "F", "F#", "G", "G#", "A", "A#", "B"]

# A-Z mapping: A=0, B=1, ..., Z=25 → note_index = i % 12
def generate_letter_to_note():
    mapping = {}
    for i in range(26):
        letter = chr(ord('A') + i)
        mapping[letter] = chromatic_notes[i % 12]
    return mapping

# Reverse mapping: notes → possible letters
def generate_note_to_letter():
    mapping = {}
    for i in range(26):
        note = chromatic_notes[i % 12]
        letter = chr(ord('A') + i)
        mapping.setdefault(note, []).append(letter)
    return mapping

# Convert flag to notes
def encode_flag_to_notes(flag: str):
    letter_to_note = generate_letter_to_note()
    notes = []
    for char in flag:
        if char == '{':
            notes.append('Start')
        elif char == '}':
            notes.append('End')
        elif char == '_':
            notes.append('Rest')  # optional: you can treat _ as special separator
        elif 'A' <= char.upper() <= 'Z':
            notes.append(letter_to_note[char.upper()])
        else:
            notes.append('?')  # unexpected
    return notes

# Print all possible decoded flags within { }
def decode_notes_to_flags(notes):
    note_to_letter = generate_note_to_letter()

    # Extract notes between Start and End
    try:
        start = notes.index('Start') + 1
        end = notes.index('End')
    except ValueError:
        print("❌ Missing Start or End markers")
        return

    inside_notes = notes[start:end]

    # Get all possible letters for each note
    letter_options = []
    for note in inside_notes:
        if note in note_to_letter:
            letter_options.append(note_to_letter[note])
        else:
            letter_options.append(['?'])  # unknown

    # Print all combinations
    print(f"🎯 All possible decoded flags inside '{{}}':\n")
    for combo in product(*letter_options):
        print("hackemon{" + ''.join(combo) + "}")

# -------------------------------
# Example usage:
# -------------------------------

if __name__ == "__main__":
    # STEP 1: Input your flag here
    input_flag = "hackemon{Typhlosion}"

    # STEP 2: Encode to notes
    encoded_notes = encode_flag_to_notes(input_flag)

    print("🎵 Encoded Notes:")
    print(encoded_notes)

    # STEP 3: Decode possible flags from notes
    decode_notes_to_flags(encoded_notes)
