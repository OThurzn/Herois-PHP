<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-start position-sticky rounded-3 p-3">
        <!-- Botão para abrir a modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            PESQUISAR HERÓI
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Formulário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="index.php" method="post">
                        <label class="form-label">NOME DO HERÓI</label>
                        <input type="text" name="campo_nome" value="<?php echo isset($nome) ? $nome : ''; ?>"
                            class="form-control mb-3" placeholder="Ex.: Homem-Aranha">

                        <label class="form-label">UNIVERSO</label>

                        <div class="row mb-3">
                            <div class="col-sm text-center">
                                <input class="form-check-input" type="radio" name="rdb_universo" value="Marvel">
                                <label class="form-check-label">MARVEL</label>
                            </div>
                            <div class="col-sm text-center">
                                <input class="form-check-input" type="radio" name="rdb_universo" value="DC">
                                <label class="form-check-label">DC</label>
                            </div>
                        </div>

                        <label class="form-label">QUANTAS VEZES DESEJA</label>
                        <input type="number" name="campo_quantidade"
                            value="<?php echo isset($quantidade) ? $quantidade : ''; ?>" class="form-control mb-3"
                            placeholder="1..2..3">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["campo_nome"]) || empty($_POST["rdb_universo"]) || empty($_POST["campo_quantidade"])) {
            echo "<h3 class='text-center mt-3'>Digite um nome, escolha um universo e informe a quantidade desejada.</h3>";
        } else {
            $nome = strtolower($_POST["campo_nome"]);
            $universo = $_POST["rdb_universo"];
            $quantidade = $_POST["campo_quantidade"];

            if ($nome == "pantera negra") {
                echo "<img src='imgs/pantera-negra.png'>";
            } elseif ($nome == "demolidor") {
                echo "<img src='imgs/demolidor.png'>";
            } elseif ($nome == "coisa") {
                echo "<img src='imgs/coisa.png'>";
            } elseif ($nome == "homem aranha" || $nome == "spiderman") {
                echo "<img src='imgs/homem-aranha.png'>";
            } elseif ($nome == "homem de ferro" || $nome == "ironman") {
                echo "<img src='imgs/homem-de-ferro.png'>";
            } else {
                // Tratamento para o caso em que nenhum herói corresponde
                echo "Nenhum herói correspondente encontrado.";
            }
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>