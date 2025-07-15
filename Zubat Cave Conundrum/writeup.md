# 🕹️ Challenge Writeup — *"Zubat's Cave"*

## 🧩 Challenge Name: Zubat's Cave  
**Category:** Forensics / Misc  
**Difficulty:** Easy  
**Flag Format:** `hackemon{...}`  

---

## 📜 Description

> While wandering through the endless twists of Zubat's Cave, you hear echoes in the dark...  
> The path is repetitive and boring — but somewhere deep inside, a secret waits.  
>  
> Explore the pokedex path. Stay persistent. Don’t overthink it.  
>  
> **Hint:** The answer lies in simplicity.

---

## 🧭 Provided

- A folder named `pokedex1/`
- Inside it: `pokedex2/`
- Then: `pokedex3/`, `pokedex4/`, and `pokedex5/`
- At the end: a file named `flag.txt`


## 🪜 Walkthrough

Start by exploring the directory structure. You'll see a deep nesting like this:

pokedex1/
└── pokedex2/
└── pokedex3/
└── pokedex4/
└── pokedex5/
└── 1.txt
---

hackemon{answer_lies_in_simplicity}

---

## 💡 Takeaway

The trick to this challenge is not to be tricked.  
No stego, no hex, no encryption. Just a deeply nested path and a simple flag.  
Sometimes, the hardest thing in a CTF is realizing there’s **nothing hard at all**.
