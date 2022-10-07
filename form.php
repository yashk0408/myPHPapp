
<?php
if (!isset($_SESSION)) session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['submit']) {
        case 'add':
            // This is where our first POST will end up
            // We can perform actions such as checking the data here

            // After that we will add the POST data to a session
            $_SESSION['postdata'] = $_POST;
            // and unset the $_POST afterwards, to prevent refreshes from resubmitting.
            unset($_POST);

            // Now we will redirect...
            header("Location: ".$_SERVER['PHP_SELF']);
            break;
        case 'confirm':
            // We can now insert the data into the database or email it

            // Then we will unset the session and redirect back
            unset($_SESSION['postdata']);

            // This is to display our notification
            $_SESSION['success'] = true;

            // And there we go again...
            header("Location: ".$_SERVER['PHP_SELF']);
            break;
    }
    // We will exit here because we don't want the script to execute any further.
    exit;
}
?>

<?php if (isset($_SESSION['success']) && $_SESSION['success'] == true): ?>
    <p>Our data has been processed succesfully</p>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['postdata'])): ?>
    <p>
        You want to add the following data:<br />
        <pre><?php print_r($_SESSION['postdata']); ?></pre>
        Is this correct?<br />
        <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
            <button type="submit" name="submit" value="confirm">Yes</button>
        </form>
    </p>
<?php else: ?>
    <p>
        <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
            <input type="text" name="..."><br />
            <input type="text" name="..."><br />
            <input type="text" name="..."><br />
            <input type="text" name="..."><br />
            <button type="submit" name="submit" value="add">Add something</button>
        </form>
    </p>
<?php endif; ?>