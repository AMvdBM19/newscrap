<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="news-container">
        
        <div class="news-title">
            
            <h3 class= 'h3_news'>Lastest Technology News </h3> 
            
        </div>
        
        <ul class="news">
            <?php
            // Include the Simple HTML DOM Parser library
            include('assets/simple_html_dom.php');

            // Target URL
            $url = 'https://www.gadgets360.com/news';

            // Create DOM from URL or file
            $html = file_get_html($url);

            // Check if the HTML was successfully loaded
            if ($html === false) {
                die('Unable to load the HTML from the specified URL.');
            }

            // Find the specific div and its children
            $targetDiv = $html->find('div[class="story_list row margin_b30"]', 0);

            // Check if the target div was found
            if ($targetDiv) {
                // Find and echo only the first three li elements and their children
                $liElements = $targetDiv->find('ul > li');

                // Limit to the first three elements
                $liElements = array_slice($liElements, 0, 3);

                foreach ($liElements as $li) {
                    $li->class = "articles";
                    echo $li->outertext;
                }
            } else {
                echo '<li>Target div not found</li>';
            }

            // Clean up the memory by clearing the Simple HTML DOM object
            $html->clear();
            unset($html);
            ?>
        </ul>
    </div>
</body>
</html>