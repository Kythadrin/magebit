<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="icon" type="image/svg+xml" href="images/logo.svg">
    <title><?php echo $pageData['title'] ?></title>
</head>
<body>
<div class="container">
    <form action="?page=1" method="post">
        <ul class="search">
            <li><input type="text" name="email" placeholder="Search email"></li>
            <li><label for="sort">Sort: </label>
            <select id="sort" name="sort">
                <option value="date DESC">By date DESC</option>
                <option value="date ASC">By date ASC</option>
                <option value="email DESC">By email DESC</option>
                <option value="email ASC">By email ASC</option>
            </select></li>
            <li><label for="filter">Filter: </label>
            <select id="filter" name="filter">
                <option value="%"> </option>
                <?php 
                foreach ($pageData['domains'] as $domain) {
                    echo '<option value="'.$domain['domain'].'">'.$domain['domain'].'</option>';
                }
                ?>
            </select></li>
            <li><a href="?page=1"><button name="search" type="submit">Search</button></a></li>
            </ul>
        
        <table>
            <tr>
                <th>Email</th>
                <th>Date</th>
            </tr>
            <?php 
            foreach ($pageData['emails'] as $email) {
                echo '
                <tr>
                    <td>'.$email["email"].'</td>
                    <td>'.$email["date"].'</td>
                </tr>';
            }
            ?>
        </table>
        <div class="bottom">
            <div class="bottom-tools">
                <input type="text" name="delete-email" placeholder="Email to delete">
                <button type="submit" name="delete">Delete</button>
                <button type="submit" name="export">Export</button>
            </div>
            <div class="pagination"><?php echo $pageData['pagination']; ?></div>
        </div>
    </form>
</div>
</body>
</html>