<?php
while (true) {
    $wordSet = true;

    $words = ['leviathan', 'car', 'floor', 'wall', 'table'];

    $randomWord = rand(0, count($words) - 1);

// number of characters
    $wordLength = strlen($words[$randomWord]);
    $characters = [];

    $correctGuess = [];
    $wrongGuess = [];
    $showWord = [];

    while (true) {
        echo '-=-=-=-=-=-=-=-=-=-=-=-=-=-' . PHP_EOL;
        if ($wordSet) {
            for ($i = 0; $i < $wordLength; $i++) {
                array_push($characters, $words[$randomWord][$i]);
            }
            for ($j = 0; $j < count($characters); $j++) {
                $showWord[$j] = '_';
            }
            $wordSet = false;
        }

        echo "Word: ";

        if (Yeet($showWord)) {
            break;
        }

        for ($i = 0; $i < count($showWord); $i++) {
            echo $showWord[$i] . ' ';
        }

        echo PHP_EOL;
        echo 'Misses: ';
        for ($i = 0; $i < count($wrongGuess); $i++) {
            echo $wrongGuess[$i] . ' ';
        }

        echo " ";
        echo PHP_EOL;
        $guess = readline("Guess: ");

        foreach ($characters as $char) {
            if ($guess == $char) {
                if (!in_array($guess, $correctGuess)) {
                    array_push($correctGuess, $guess);

                }
            }
            if ($guess !== $char) {
                if (!in_array($guess, $characters)) {
                    if (!in_array($guess, $wrongGuess)) {
                        array_push($wrongGuess, $guess);
                    }
                }
            }
        }

        for ($i = 0; $i < count($characters); $i++) {
            for ($j = 0; $j < count($correctGuess); $j++) {
                if ($characters[$i] == $correctGuess[$j]) {
                    $showWord[$i] = $correctGuess[$j];
                }
            }
        }

    }

    $afterGame = readline("Play 'again' or 'quit'?");

    if ($afterGame !== 'again') {
        exit;
    }
}
function Yeet(array $words): bool
{
    if (!in_array('_', $words)) {
        return true;
    } else {
        return false;
    }

}