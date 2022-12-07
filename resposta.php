<?php
include "conexao.php";
include "header.php";

?> <h3 class="text-center m-3">RESPOSTAS</h3><?php

foreach($_POST as $chave => $valor){
  $query = "select * from perguntas where id = ".$chave;
  $resultado = mysqli_query($conexao, $query);

  while($linha = mysqli_fetch_array($resultado))
  {
    ?>
    <div class="col-6  offset-3 mt-3 mb-3">
          <div class="card text-justfy">
              <div class="card-header">
                  <h5>
                  <?php
                  echo "<td>".$linha['id']."- </td>";
                  echo "<td>".$linha['pergunta']."</td><br>";
                  ?>
                  </h5>
              </div>
              <div class="card-body">
                <?php

                $queryAlternativas = "select * from alternativas where pergunta_id=".$linha['id']."";
                $resultadoAlternativa = mysqli_query($conexao, $queryAlternativas);
                $contagem = 1;

                while($resposta = mysqli_fetch_array($resultadoAlternativa))
                {
                  echo "<p>";
                    //echo $chave." - ".$valor."<br>";
                    if($resposta["correta"] == 1)
                    {
                      if($contagem == $valor){
                        echo "<span style = 'background-color: green;'> ACERTOU!</span>"; 
                      }else{
                        echo "<span style = 'background-color: green;'>RESPOSTA CORRETA!</span>";
                      }
                    }else{
                      if($valor == $contagem){
                        echo "<span style = 'background-color: red;'>SUA ESCOLHA</span>";
                      }
                    }
                    $contagem++;
                    echo $resposta['alternativa'];
                  echo "</p>";
                }

                ?>
                <br>
                </div>
            </div>
        </div>
        <?php
  }
}?>
              <div class="col-2 offset-5">
                <button type="button" class=" m-3 btn btn-warning"><a href="prova.php" style="text-decoration:none; color: black">RESPONDER DE NOVO</a></button>
              </div>


<?php include "footer.php";?>