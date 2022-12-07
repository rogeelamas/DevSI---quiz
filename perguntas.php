<?php include ("header.php");?>

<div class="col-4 offset-4 mt-3">
    <div class="card text-center">
        <div class="card-header">
            <form action="./perguntas.php" method="post"><h3>CADASTRE UMA NOVA PERGUNTA</h3>
        </div>
        <div class="card-body">
            <input type="text" class="form-control" name="pergunta" /><br>
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="ms-3 btn btn-warning">Salvar</button>
            <button type="button" class="ms-3 btn btn-warning"><a href="index.php" style="text-decoration:none; color: black">Voltar</a></button>
        </div>
    </div>
</div>

<?php

    include "conexao.php";
    if(isset($_POST) && !empty($_POST)){
        $pergunta = $_POST["pergunta"];
        $query = "insert into perguntas (pergunta) values('$pergunta')";
        $resultado = mysqli_query($conexao,$query);
    }

    $query = "select * from perguntas";
    $resultado = mysqli_query($conexao,$query);
    ?>

<div class="col-8 offset-2 mt-3 mb-3">
    <div class="card text-center">
        <div class="card-header">
            <h3>PERGUNTAS JÁ CADASTRADAS</h3>
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>PERGUNTA</th>
                        <th> ALTERNATIVAS</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while($linha = mysqli_fetch_array($resultado)){
                        echo "<tr>";
                        echo "<td>".$linha['id']."</td>";
                        echo "<td>".$linha['pergunta']."</td>";
                        echo "<td><a class='btn btn-success' href='./alternativas.php?pergunta_id=".$linha['id']."'>Lista de Alternativas</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include ("footer.php");?> 

