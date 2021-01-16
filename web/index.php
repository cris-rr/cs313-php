<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/main.css">
  <title>CSE 341 Cristhians Ruiz</title>
</head>

<body onload="writeMotto()">
  <div class="wrapper">
    <header>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/common/header.php'; ?>
    </header>
    <main>
      <div class="favoriteQuote">
        <blockquote>
          <span id="motto"></span>
          <p>-Bruce Lee-</p>
        </blockquote>
      </div>



      <section class="extra">
        <h2 class="subtitle">Bachelor of Science, Applied Technology</h2>
        <p>The <strong>bachelor’s degree in applied technology</strong> helps students prepare for careers in software and web development,
          information technology, and other technology-related fields. Students customize their technology education and
          gain specific technical skills by selecting from a variety of options, including computer support, programming,
          web and database development, system administration, auto services technology, and computer-aided drafting. This
          degree is developed and granted by BYU-Idaho.</p>

        <a href="https://www.byupathway.org/degrees"><img class="img-zoom" src="./images/coding.jpg" alt="applied technology programming image"></a>
      </section>
    </main>
    <footer>
      <?php require $_SERVER['DOCUMENT_ROOT'] . '/common/footer.php'; ?>
    </footer>
  </div>
  <script src="./js/main.js"></script>
</body>

</html>