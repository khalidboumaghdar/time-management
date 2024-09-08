<!DOCTYPE html>
<html>
  <head>
    <title>Employee information</title>
    <style>





      /* Réinitialisation des styles */
      *,
      *::before,
      *::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      /* Styles pour la page d'informations d'employé */
      body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f4f4;
      }
      header {
        background-color: #172b4d;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80px;
        margin-bottom: 30px;
      }
      h1 {
        margin: 0;
        font-size: 28px;
        font-weight: 600;
      }
      main {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
      }
      section {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 40px;
        margin: 20px;
        max-width: 600px;
        width: 100%;
        box-sizing: border-box;
      }
      h2 {
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 30px;
        text-align: center;
      }
      .info {
        display: flex;
        margin-bottom: 20px;
        align-items: center;
      }
      .info label {
        font-weight: 600;
        flex-basis: 150px;
        margin-right: 30px;
        text-align: right;
      }
      .info span {
        font-weight: 400;
        flex-grow: 1;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>Informations employé</h1>
    </header>
    <main>
      <section>
        <h2>Employé</h2>
        <div class="info">
            <label>Name :</label>
            <span>{{ $data->employee->nom }}</span>
          </div>
        <div class="info">
          <label>First name :</label>
          <span> {{ $data->employee->prenom }}</span>
        </div>
        <div class="info">
          <label>Department :</label>
          <span>{{ $data->employee->poste }}</span>
        </div>

      </section>
      <section>
        <h2>Pointing</h2>
        <div class="info">
          <label>Date of pointing :</label>
<span>{{ $data->Date }}</span>
</div>
<div class="info">
<label>Time of pointing :</label>
<span>{{ $data->time }}</span>
</div>
<div class="info">
<label>Pointing type:</label>
<span>{{ $data->Type }}</span>
</div>
</section>
</main>



</body>
</html>
