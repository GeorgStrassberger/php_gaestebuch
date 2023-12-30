global$entries;
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

      <form class="form">
        <!-- NAME -->
        <label class="guestbook-entry-label" for="name">Dein Name:</label>
        <input class="guestbook-entry-input" type="text" id="name" name="name">

        <!-- TITLE -->
        <label class="guestbook-entry-label" for="title">Titel des Eintrags:</label>
        <input class="guestbook-entry-input" type="text" id="title" name="title">

        <!-- COMMENT -->
        <label class="guestbook-entry-label" for="comment">Inhalt des Eintrags:</label>
        <textarea class="guestbook-entry-input" id="comment" name="comment" rows="4"></textarea>

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
                    <p><?php echo e($entry['comment']); ?></p>
                </div>
            </div>
        <?php endforeach  ?>

      <!-- Pagination -->
      <ul class="guestbook-pagination">
        <li class="guestbook-pagination-li">
          <a class="guestbook-pagination-a guestbook-pagination-active" href="#">1</a>
        </li>
        <li class="guestbook-pagination-li">
          <a class="guestbook-pagination-a" href="#">2</a>
        </li>
        <li class="guestbook-pagination-li">
          <a class="guestbook-pagination-a" href="#">3</a>
        </li>
        <li class="guestbook-pagination-li">
          <a class="guestbook-pagination-a" href="#">4</a>
        </li>
      </ul>

      <hr class="guestbook-separator">

      <footer class="guestbook-footer">
        <p>Implementiert im PHP-Kurs</p>
      </footer>
    </div>
  </body>
</html>
