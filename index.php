<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    </head>
        <body>
            <div id="page" style="background-image:url(https://i.pinimg.com/originals/00/8c/75/008c75173308d7ae83aadb3d011303f1.jpg)">
            <center><h3>Escutar Mais Tarde</h3></center>
                <br/>
                <div class="p-3 mb-2 bg-transparent text-white">
                <div class="row justify-content-center row-cols-1 row-cols-md-2 mb-3 text-center">
                <div class="col">
                <div class="card mb-4 bg-secondary text-white rounded-3 shadow-sm">
                <div class="card-header bg-dark py-3">
            <h4 class="my-0 fw-normal"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-music-note-beamed" viewBox="0 0 16 16">
            <path d="M6 13c0 1.105-1.12 2-2.5 2S1 14.105 1 13c0-1.104 1.12-2 2.5-2s2.5.896 2.5 2zm9-2c0 1.105-1.12 2-2.5 2s-2.5-.895-2.5-2 1.12-2 2.5-2 2.5.895 2.5 2z"/>
            <path fill-rule="evenodd" d="M14 11V2h1v9h-1zM6 3v10H5V3h1z"/>
            <path d="M5 2.905a1 1 0 0 1 .9-.995l8-.8a1 1 0 0 1 1.1.995V3L5 4V2.905z"/>
            </svg>&nbsp;<b> Registro de música</b></h4>
          </div>
          <div class="card-body text-start">
          <form action="index.php" method="POST">
                <label class="form-label">Música</label><br/>
                <input type="text" name="musica" class="form-control" placeholder="Digite o nome da música" required/><br/></br>
                <label class="form-label">Álbum</label><br/>
                <input type="text" name="album" class="form-control" placeholder="Digite o nome do álbum" required/><br/><br/>
                <label class="form-label">Artista/Banda</label><br/>
                <input type="text" name="artista" class="form-control" placeholder="Digite o nome do artista/álbum" required/><br/></br>
                <button type="submit" name="gravar" class="btn btn-info btn-lg">Registrar</button>
            </form>
            <?php
            if(isset($_POST['gravar'])){
                $musica = $_POST['musica'];
                $album = $_POST['album'];
                $artista = $_POST['artista'];
                $arquivo = 'registro.txt';
                $texto = $musica.";".$album.";".$artista.";";
                $file = fopen($arquivo, 'a');
                fwrite($file, $texto);
                fclose($file);
            }else {
                echo "";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
   <div class="row justify-content-center row-cols-1 row-cols-md-2 mb-3 text-center">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header bg-warning py-3">
          <h4 class="my-0 fw-normal"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
            </svg>&nbsp;<b> Ouvir Mais Tarde</b></h4>
          </div>
          <div class="card-body text-start">
          <table class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Música</th>
                        <th scope="col">Álbum</th>
                        <th scope="col">Artista</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $arquivo = fopen("registro.txt","r");
                while(!feof($arquivo)){
                    $linha = fgets($arquivo);
                }
                $dados = explode(";",$linha);
                fclose($arquivo);
                $conta = count($dados)-2;
                for($i=0;$i<=$conta;$i++){
                    $posicao = $i;
                    echo '<tr>';
                        echo '<td>'.$dados[$i].'</td>';
                        $i++;
                        echo '<td>'.$dados[$i].'</td>';
                        $i++;
                        echo '<td>'.$dados[$i].'</td>';
                        echo '<td><a href="escutei.php?pos='.$posicao.'">Já escutei!</a></td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
   </div>
    </body>
</html>