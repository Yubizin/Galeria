<?php
if (isset($_GET['imagem'])) {
    $imagem_a_excluir = $_GET['imagem'];
    $caminho_imagem = 'uploads/' . $imagem_a_excluir;

    if (file_exists($caminho_imagem)) {
        // Excluir a imagem
        unlink($caminho_imagem);
        echo 'Imagem "' . $imagem_a_excluir . '" foi excluída com sucesso.';
    } else {
        echo 'A imagem não existe ou já foi excluída anteriormente.';
    }
} else {
    echo 'Nenhuma imagem selecionada para exclusão.';
}
?>
<br>
<a href="index.php">Voltar para a página inicial</a>