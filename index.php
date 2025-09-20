<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Phonebook</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <main class="container">
    <header class="header">
      <h1>Phonebook</h1>
    </header>

    <section class="card form-card" aria-labelledby="add-contact-title">
      <h2 id="add-contact-title">Add Contact</h2>
      <form class="contact-form" action="add.php" method="POST">
        <div class="form-row">
          <label for="name">Name</label>
          <input id="name" name="name" type="text" placeholder="Full name" required />
        </div>

        <div class="form-row">
          <label for="email">Email</label>
          <input id="email" name="email" type="email" placeholder="example@mail.com" />
        </div>

        <div class="form-row">
          <label for="phone">Phone</label>
          <input id="phone" name="phone" type="tel" placeholder="+55 (11) 99999-9999" required />
        </div>

        <div class="form-actions">
          <button type="submit" class="btn primary">Add Contact</button>
          <button type="reset" class="btn">Clear</button>
        </div>
      </form>
    </section>
    <section class="card list-card" aria-labelledby="contacts-title">
      <h2 id="contacts-title">Contacts</h2>

      <div class="table-wrap">
        <table class="contacts-table" aria-describedby="contacts-title">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php include 'read.php'; ?>
          </tbody>
        </table>
      </div>
    </section>
  </main>
</body>
</html>
