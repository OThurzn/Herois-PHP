<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Anton&display=swap');

    #nome_heroi {
        font-family: "Anton", sans-serif;
        font-weight: 400;
        font-style: normal;
    }
</style>

<body>
    <script>
        function esconder() {
            var pesquisar = document.getElementById("pesquisar");
            if (pesquisar) {
                pesquisar.style.removeProperty('width');
                pesquisar.style.removeProperty('height');
            }
        }

        function subir() {
            var pesquisar = document.getElementById("pesquisar");
            if (pesquisar) {
                pesquisar.style.removeProperty('height');
            }
        }
    </script>
    <div id='pesquisar' class="d-flex justify-content-center align-items-center position-fixed rounded-3 p-1" style="width: 100%; height: 100%;">
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
                        <input type="text" name="campo_nome" class="form-control mb-3" placeholder="Ex.: Homem Aranha">

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

                        <label class="form-label">QUANTAS VEZES DESEJA VE-LO:</label>
                        <input type="number" name="campo_quantidade" class="form-control mb-3" placeholder="1..2..3">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["campo_nome"]) || empty($_POST["rdb_universo"]) || empty($_POST["campo_quantidade"])) {
            echo "<script>subir();</script>";
            echo "<h3 class='d-flex justify-content-center align-items-center position-absolute z-n1' style='width: 100%; height: 100%;'>Digite um nome, escolha um universo e informe a quantidade desejada.</h3>";
        } else {
            $nome = strtolower($_POST["campo_nome"]);
            $universo = $_POST["rdb_universo"];
            $quantidade = $_POST["campo_quantidade"];

            if ($universo == "Marvel") {
                if ($nome == "pantera negra") {
                    $src_imagem = "imgs/pantera-negra.png";
                } elseif ($nome == "demolidor") {
                    $src_imagem = "imgs/demolidor.png";
                } elseif ($nome == "coisa") {
                    $src_imagem = "imgs/coisa.png";
                } elseif ($nome == "homem aranha" || $nome == "spiderman") {
                    $src_imagem = "imgs/homem-aranha.png";
                } elseif ($nome == "homem de ferro" || $nome == "ironman") {
                    $src_imagem = "imgs/homem-de-ferro.png";
                }
            } elseif ($universo == "DC") {
                if ($nome == "batman") {
                    $src_imagem = "imgs/batman.png";
                } elseif ($nome == "flash") {
                    $src_imagem = "imgs/flash.png";
                } elseif ($nome == "besouro-azul") {
                    $src_imagem = "imgs/besouro-azul.png";
                } elseif ($nome == "super homem" || $nome == "superman") {
                    $src_imagem = "imgs/super-homem.png";
                } elseif ($nome == "caçador de marte") {
                    $src_imagem = "imgs/cacador-de-marte.png";
                }
            }
            if (!empty($src_imagem)) {
                echo "<script>esconder();</script>";
                echo "<h1 id='nome_heroi' class='d-flex justify-content-center align-items-center pt-5' style='width: 100%;'>" . strtoupper(substr($nome, 0, 1)) . substr($nome, 1) . "</h1>";
                for ($i = 0; $i < $quantidade; $i++) {
                    echo "<div class='p-3'><img class='img-fluid rounded mx-auto d-block border border-black border-3' src='$src_imagem'></div>";
                }
            } else {
                echo "<script>subir();</script>";
                echo "<h3 class='d-flex justify-content-center align-items-center position-absolute z-n1' style='width: 100%; height: 100%;'>Nenhum herói correspondente encontrado.</h3>";
            }
        }
    }
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
