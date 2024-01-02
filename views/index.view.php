<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="./styles/lib/fonts/montserrat/Montserrat.css">
    <link rel="stylesheet" href="./styles/main.css">

    <title>Gästebuch</title>
  </head>
  <body>
    <div class="container">
      <h1 class="guestbook-heading">Gästebuch</h1>

        <?php if(!empty($_GET['success'])): ?>
            <h2>Eintrage erfolgreich hinzugefügt.</h2>
        <?php endif; ?>

        <form method="POST" action="submit.php">
          <?php if(isset($errorMessage)): ?>
            <p><?php echo e($errorMessage); ?></p>
          <?php endif; ?>
        <!-- NAME -->
        <label class="guestbook-entry-label" for="name">Dein Name:</label>
        <input class="guestbook-entry-input" type="text" id="name" name="name" required="required">

        <!-- TITLE -->
        <label class="guestbook-entry-label" for="title">Titel des Eintrags:</label>
        <input class="guestbook-entry-input" type="text" id="title" name="title" required="required">

        <!-- COMMENT -->
        <label class="guestbook-entry-label" for="comment">Inhalt des Eintrags:</label>
        <textarea class="guestbook-entry-input" id="comment" name="comment" rows="4" required="required"></textarea>

        <div class="guestbook-form-buttons">
          <input class="button" type="reset" value="&#10007; Zurücksetzen">
          <input class="button" type="submit" value="&#10004; Absenden">
        </div>
      </form>

      <hr class="guestbook-separator">

        <?php foreach ($entries AS $entry): ?>
            <div class="guestbook-entry">
                <div class="guestbook-entry-header">
                    <h3 class="guestbook-entry-title"><?php echo e($entry['title']); ?></h3>
                    <span class="guestbook-entry-author"><?php echo e($entry['name']); ?></span>
                </div>
                <div class="guestbook-entry-content">
                    <!-- Entfernen der unnötigen Zeilenumbrüche und Leerzeichen. -->
                    <?php
                        $paragraphs = explode("\n", $entry['comment']);
                        $filteredParagraphs = [];
                        foreach ($paragraphs AS $paragraph){
                            $paragraph = trim($paragraph);
                            if(strlen($paragraph) > 0){
                                $filteredParagraphs[] = $paragraph;
                            }
                        }
                    ?>
                    <!-- Bereinigtes Kommentar Ausgeben -->
                    <?php foreach ($filteredParagraphs as $p): ?>
                        <p><?php echo e($p); ?></p>
                    <?php endforeach;  ?>
                </div>
            </div>
        <?php endforeach;  ?>

      <!-- Pagination -->
        <?php $numPages = ceil($countTotal / $perPage); ?>
        <?php if($numPages > 1): ?>
      <ul class="guestbook-pagination">
          <?php for ($i = 1; $i <= $numPages; $i++): ?>
              <li class="guestbook-pagination-li">
                  <a
                          class="guestbook-pagination-a <?php if($i === $currentPage): ?>guestbook-pagination-active<?php endif; ?>"
                          href="index.php?<?php echo http_build_query(['page' => $i]); ?>">
                      <?php echo e($i); ?>
                  </a>
              </li>
          <?php endfor; ?>
      </ul>
        <?php endif; ?>

      <hr class="guestbook-separator">

      <footer class="guestbook-footer">
        <p>Implementiert im PHP-Kurs</p>
      </footer>
    </div>
  </body>
</html>
