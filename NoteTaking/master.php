<!DOCTYPE html>
<html lang='en'>
    <head>
        <title>Note Taking Script</title>
        <link rel='stylesheet' href='style.css' type='text/css'>
    </head>
    <body>
        <?php
            if(strlen($status_message) > 0) {
                echo "<p class='message'>$status_message</p>";
                ?>
                <p><a href='index.php'>Go Back &larr;</a></p>
                <?php 
            }
            
            if(strlen($error_message) > 0) { 
                echo "<p style='color: red; font-weight: bold'>$error_message</p>";
            }
            
            if($display_form) { 
                include("form.php");
            }
            
            if(isset($notes)) {
                if(count($notes)) {
                    foreach($notes as $note) {
                    ?>
                        <p><strong><?php echo $note['username']; ?></strong>: <?php echo $note['note']; ?></p>
                    <?php 
                    }
                }
            }
        ?>

	</body>
</html>