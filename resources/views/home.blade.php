@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container mt-5">
      <h2 class="text-center">Riepilogo Traccia Progetto Laravel 9:</h2>
      <ul class="list-group my-3">
        <li class="list-group-item">
          una pagina per inserire nel database nuovi cantanti (ogni cantante sarà caratterizzato da nome (d’arte o nome-cognome), data di nascita e sesso;
        </li>
        <li class="list-group-item">
          una pagina per inserire nel database nuove canzoni (ogni canzone avrà un titolo e una data di pubblicazione e sarà collegata a uno o più cantanti);
        </li>
        <li class="list-group-item">
          una pagina con una tendina (select) di tutti i cantanti e un pulsante che consenta di cercare (e visualizzare in pagina) tutte le canzoni di quel cantante.
        </li>
        <li class="list-group-item">
          <strong>BONUS:</strong> aggiungere alla pagina di ricerca delle canzoni di un cantante, accanto ad ogni canzone, due pulsanti per modificare le informazioni della singola canzone o per eliminarla dal sistema.
        </li>
      </ul>
    </div>
</div>
@endsection