<html>

<body>

 <form align="center" action="consultas/consulta_procedimientos.php" method="post">
    Ciudad C:
    <input type="text" name="ciudad_elegida">
    <br/>
    Fecha:
    <input type="date" name="fecha_elegida">
    <br/>

<p>Eligen sus artistas:
 <div>
    <input type="checkbox" id="artista" name="artista[]" value="Andrea Mantegna
" checked>
    <label for="artista">Andrea Mantegna</label>
  </div>

 <div>
    <input type="checkbox" id="artista" name="artista[]" value="Andrea del Verrocchio" checked>
    <label for="artista">Andrea del Verrocchio</label>
  </div>

 <div>
    <input type="checkbox" id="artista" name="artista[]" value="Arnolfo di Cambio" checked>
    <label for="artista">Arnolfo di Cambio</label>
  </div>

</p>

<div>
    <button type="submit">Envoyer</button>
  </div>

</form>

</body>
</html>
 