<!DOCTYPE html>
<html>
<head>
    <title>Upload de Imagem</title>
    <style>
        .img {
            width: 300px;
            height: 300px;
        }
    </style>
</head>
<body>
    <h1>Upload de Imagem</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Imagem" name="submit">
    </form>

    <div id="imagem">
        <!-- Aqui será exibida a imagem -->
        <?php
            // Verificar se a imagem existe e exibi-la
            if (file_exists('uploads/imagem.jpg')) {
                echo '<img src="uploads/imagem.jpg" alt="Imagem">';
            }
        ?>
    </div>
    <h1>Galeria de Imagens</h1>

    <!-- Exibição de todas as imagens carregadas -->
    <div class="gallery">
        <?php
        $diretorio = "uploads/";
        $imagens = scandir($diretorio);

        foreach ($imagens as $imagem) {
            if ($imagem != '.' && $imagem != '..') {
                $caminho_imagem = $diretorio . $imagem;

                if (is_file($caminho_imagem)) {
                    // Exibe a imagem com um botão de exclusão
                    echo '<div class="image-container">';
                    echo '<img src="' . $caminho_imagem . '" alt="Imagem" class="img">';
                    echo '<a href="delete.php?imagem=' . urlencode($imagem) . '">Excluir</a>'; // Link para exclusão
                    echo '</div>';
                }
            }
        }

        if (count($imagens) <= 2) {
            echo 'Nenhuma imagem foi carregada ainda.';
        }
        ?>
    </div>
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
}
?>
    </div>
</body>
</html>

