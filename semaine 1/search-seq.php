<?php 

// $content = 'le mot "mot" est en position moteur 3, 8 et 29';
// $seq = 'mot'; // mot recherche

function search_pos_word(array $content, array $seq) 
{
    $i = 0;

    foreach($content as $index => $letter) {
        if($letter === $seq[$i]) {
            $i++;

            if($i === count($seq)) return $index - count($seq) + 1;

            continue;
        }
        $i=0;
    }
}

class Search
{
    public function __construct(
        public string $seq,
        public array $pos = []
    ) {
    }
}

function search_pos_seq_all(string $seq, string $content) : Search
{
    $index = 0;
    $pos = true;
    $positions = [];
    list($arraySeq, $arrayContent) = [str_split($seq), str_split($content)];

    while($pos) {
        if(!$pos) break;

        $pos = search_pos_word(content : $arrayContent, seq : $arraySeq);

        if($pos) $positions[] = $pos + $index;

        $arrayContent = array_slice($arrayContent, $pos + strlen($seq));
        $index += $pos + strlen($seq);
    }

    return new Search($seq, $positions);
}

// var_dump(search_pos_seq_all($seq, $content));

function testSearch_pos_seq_all()
{
    $content = 'le mot "mot" est en position moteur 3, 8 et 29';
    $seq = 'mot'; // mot recherche

    $result = search_pos_seq_all($seq, $content);

    try {
        assert($result->seq === 'mot');
        assert($result->pos === [3, 8, 29]);
        assert($result instanceof Search);
        echo "✔️ les tests pour fonction search_pos_seq_all est valide.";
    } catch (AssertionError $e) {
        echo "❌ un test pour la fonction search_pos_seq_all a échoué.".PHP_EOL;
        echo "cause :" . $e->getMessage() . ' à la ligne ' . $e->getLine() . PHP_EOL;
    }
}

testSearch_pos_seq_all();