<?php
$level = isset($_GET['level']) ? intval($_GET['level']) : 1;

echo "<h1>🔒 Hackamon Auth Bypass — Level $level</h1><hr>";

switch ($level) {
    case 1:
        // Pikachu ⚡ - Yellow background, lightning sparkles
        echo '<style>
            body {
                background: #fff700;
                background-image:
                    repeating-linear-gradient(135deg, #fff700 0 10px, #ffe066 10px 20px),
                    url("data:image/svg+xml;utf8,<svg width=\'100\' height=\'100\' xmlns=\'http://www.w3.org/2000/svg\'><polygon points=\'50,15 55,35 75,35 60,50 65,70 50,55 35,70 40,50 25,35 45,35\' fill=\'%23ffe066\' stroke=\'%23ffea00\' stroke-width=\'3\'/></svg>");
                background-size: auto, 120px 120px;
                background-repeat: repeat, repeat;
                background-position: 0 0, 30px 30px;
            }
        </style>';
        echo '<p>
            Deep in the Viridian Forest, Pikachu has been captured by Team Rocket.<br>
            The cookie jar sparkles with static energy, keeping him locked inside.<br>
            Only the cleverest of trainers can unleash the thunder within.<br>
            Will you find the spark to free Pikachu from his glassy prison?<br>
            The fate of this electric friend is in your hands!
        </p>';
        setcookie("isAdmin", "false");
        if (isset($_COOKIE["isAdmin"]) && $_COOKIE["isAdmin"] === "true") {
            echo '<p>✅ Level 1 Passed!<br><strong>Clue: key_part1 = Pikachu</strong></p>';
        }
        break;

    case 2:
        // Charmander 🔥 - Orange-red background, flickering flames
        echo '<style>
            body {
                background: linear-gradient(135deg, #ff6b00 0%, #ffb347 100%);
                background-image:
                    url("data:image/svg+xml;utf8,<svg width=\'80\' height=\'80\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M40,70 Q35,50 50,40 Q55,30 45,20 Q50,10 40,15 Q30,10 35,20 Q25,30 30,40 Q45,50 40,70 Z\' fill=\'%23ff7f50\' stroke=\'%23ff4500\' stroke-width=\'2\'/></svg>");
                background-repeat: repeat;
                background-size: 100px 100px;
            }
        </style>';
        echo '<p>
            In the heart of a glowing cave, Charmander guards a secret name.<br>
            Flames dance and flicker, casting mysterious shadows on the walls.<br>
            Only those who can read the fire’s code will learn the truth.<br>
            The warmth of friendship may reveal what lies beneath.<br>
            Can you uncover the ember that hides his real identity?
        </p>';
        setcookie("auth", base64_encode("guest"));
        if (isset($_COOKIE["auth"])) {
            $decoded = base64_decode($_COOKIE["auth"]);
            if ($decoded === "admin") {
                echo '<p>✅ Level 2 Passed!<br><strong>Clue: key_part2 = Charizard</strong></p>';
            } else {
                echo "<p>Decoded auth value: <code>$decoded</code></p>";
            }
        }
        break;

    case 3:
        // Bulbasaur 🍃 - Green background, leafy overlay
        echo '<style>
            body {
                background: linear-gradient(120deg, #a8ff98 0%, #38b000 100%);
                background-image:
                    url("data:image/svg+xml;utf8,<svg width=\'90\' height=\'90\' xmlns=\'http://www.w3.org/2000/svg\'><ellipse cx=\'45\' cy=\'45\' rx=\'35\' ry=\'20\' fill=\'%2376c893\'/><path d=\'M45,10 Q60,30 45,45 Q30,30 45,10 Z\' fill=\'%2346a758\'/></svg>");
                background-repeat: repeat;
                background-size: 110px 110px;
            }
        </style>';
        echo '<p>
            At the edge of a tranquil pond, Bulbasaur slumbers beneath a leafy dome.<br>
            The air is thick with the scent of fresh grass and hidden secrets.<br>
            Only a gentle nudge can awaken the guardian of the garden.<br>
            Legends say the right words can change the course of nature.<br>
            Will you be the one to stir Bulbasaur from his peaceful rest?
        </p>';
        $payload = ["role" => "guest"];
        setcookie("token", base64_encode(json_encode($payload)));

        if (isset($_COOKIE["token"])) {
            $decoded = base64_decode($_COOKIE["token"]);
            $data = json_decode($decoded, true);

            if ($data && isset($data["role"]) && $data["role"] === "admin") {
                echo '<p>✅ Level 3 Passed!<br><strong>Clue: key_part3 = Snorlax</strong></p>';
            } else {
                echo '<p>Your current role: <code>' . htmlspecialchars($data["role"] ?? "unknown") . '</code></p>';
            }
        }
        break;

    case 4:
        // Squirtle 💧 - Blue background, water droplets
        echo '<style>
            body {
                background: linear-gradient(120deg, #75e6ff 0%, #0077b6 100%);
                background-image:
                    url("data:image/svg+xml;utf8,<svg width=\'60\' height=\'60\' xmlns=\'http://www.w3.org/2000/svg\'><ellipse cx=\'30\' cy=\'40\' rx=\'15\' ry=\'20\' fill=\'%2390e0ef\'/><ellipse cx=\'30\' cy=\'20\' rx=\'10\' ry=\'12\' fill=\'%2348cae4\'/></svg>");
                background-repeat: repeat;
                background-size: 80px 80px;
            }
        </style>';
        echo '<p>
            Waves crash against the shore as Squirtle stands guard by the water’s edge.<br>
            Ripples shimmer with secrets, and only the bold may cross.<br>
            The tides whisper of hidden passages for those in the know.<br>
            Sometimes, a clever disguise is all it takes to slip by.<br>
            Will you find the courage to ride the current past Squirtle’s watchful gaze?
        </p>';
        setcookie("_xYz", "nope");
        $ua = $_SERVER["HTTP_USER_AGENT"] ?? "";
        if (
            isset($_COOKIE["_xYz"]) &&
            $_COOKIE["_xYz"] === "TrUe_buT_s3cr3t" &&
            strpos($ua, "ctf-agent") !== false
        ) {
            echo '<p>✅ Level 4 Passed!<br><strong>Clue: key_part4 = Mewtwo</strong></p>';
        } else {
            echo '<p>Your current User-Agent: <code>' . htmlspecialchars($ua) . '</code></p>';
        }
        break;

    case 5:
        // Mewtwo 🧠 - Purple background, psychic swirls
        echo '<style>
            body {
                background: radial-gradient(circle at 60% 40%, #e0aaff 0%, #7209b7 100%);
                background-image:
                    url("data:image/svg+xml;utf8,<svg width=\'120\' height=\'120\' xmlns=\'http://www.w3.org/2000/svg\'><ellipse cx=\'60\' cy=\'60\' rx=\'50\' ry=\'20\' fill=\'%23b5179e\' opacity=\'0.22\'/><ellipse cx=\'60\' cy=\'60\' rx=\'30\' ry=\'10\' fill=\'%23f72585\' opacity=\'0.15\'/></svg>");
                background-repeat: repeat;
                background-size: 140px 140px;
            }
        </style>';
        echo '<p>
            In the heart of Cerulean Cave, Mewtwo’s mind pulses with psychic power.<br>
            Swirls of energy twist and turn, concealing the final secret.<br>
            Only a true Poké Ball Master can unlock the vault of legends.<br>
            The echoes of four great Pokémon combine to form the ultimate key.<br>
            Will you rise to the challenge and claim your place in history?
        </p>';

        $secret = "PikachuCharizardSnorlaxMewtwo"; // Final key from Levels 1–4

        // Detect if token already exists
        if (!isset($_COOKIE["token_initialized"])) {
            // First-time visit: generate guest token, set cookies, and exit
            $payload = "role=guest";
            $signature = hash_hmac("sha256", $payload, $secret);
            $token = base64_encode($payload . "." . $signature);

            setcookie("token", $token);
            setcookie("token_initialized", "1");  // Marker cookie so we don’t reset again

            echo '<p>🍪 A guest token has been set in your bag. Please refresh the page to begin your final challenge!</p>';
            break;
        }

        // Now verify the cookie
        if (!isset($_COOKIE["token"])) {
            echo '<p>❌ Token not found. Try reloading or restarting the level.</p>';
            break;
        }

        $decoded = base64_decode($_COOKIE["token"], true);
        if (!$decoded || strpos($decoded, ".") === false) {
            echo '<p>❌ Malformed token. Format should be base64(role=admin.signature)</p>';
            break;
        }

        [$payload, $recvSig] = explode(".", $decoded, 2);
        $calcSig = hash_hmac("sha256", $payload, $secret);

        if ($payload === "role=admin" && hash_equals($recvSig, $calcSig)) {
            echo '<p>🎉 <strong>Congratulations, Poké Ball Master!</strong><br>🏁 Final Flag: <code>hackemon{pokeball_master_you_got_em_all}</code></p>';
        } else {
            echo '<p>❌ Invalid signature or role. Try forging a proper token using all four key parts to unlock Mewtwo’s vault!</p>';
        }

        break;

    default:
        echo '<p>Invalid level. Try using ?level=1 to ?level=5 in the URL.</p>';
        break;
}
?>
