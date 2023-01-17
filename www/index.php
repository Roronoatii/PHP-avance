<?php

require_once __DIR__ . '/../src/init.php';
// $db
// $_SESSION

$page_title = 'Home page';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

?>

<body>

    <div>
        <h1>Home page</h1>
    </div>

    <?php
    $sql = "INSERT INTO contact_forms (fullname, phone, email, message) VALUES (?, ?, ?, ?)";
    $data = [
        'John Doe',
        '0123456789',
        'fsef',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.'
    ];

    $db->insert($sql, $data);
    ?>

    <?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
</body>

</html>