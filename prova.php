
<?php
include "conexao.php";
include "header.php";

$query = "select * from perguntas";
$resultado = mysqli_query($conexao, $query);
?>  

<div class="col-6 offset-3 mt-3 mb-3">
    <div class="card text-justify">
        <div class="card-header text-center">
            <h3>TESTE SEUS CONHECIMENTOS</h3>
        </div>
        <div class="card-body">
          <form class=" mx-auto" action="resposta.php" method="post" >
            <?php while($linha = mysqli_fetch_array($resultado))
              {
                ?>
                  <div class="mt-3 mb-3">
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
                            echo"<input type='radio' class='form-check-input m-2' required name='".$linha['id']."' value=".$contagem."> ".$resposta['alternativa']."";
                            echo "<br>";
                            $contagem++;
                          }
                ?><br></div></div><?php
              }?>
          
          
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="ms-3 btn btn-success">ENVIAR</button>
            <button type="button" class="ms-3 btn btn-warning"><a href="index.php" style="text-decoration:none; color: black">VOLTAR</a></button>
            </form>
          </div>
    </div>
</div>  
    