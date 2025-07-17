<?php
                        // Extract <li> items from HTML description
                        echo $solution['description'];
                        // preg_match_all('/<li[^>]*>(.*?)<\/li>/i', $solution['description'], $matches);
                        // $items = $matches[1] ?? [];
                        // $first = array_shift($items);
                        ?>





                        RewriteEngine On
RewriteBase /

# Skip if file or folder exists
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

# Rewrite clean slugs like /global-foods-major to case-study-inner.php?slug=global-foods-major
RewriteRule ^([a-zA-Z0-9\-]+)$ case-study-inner.php?slug=$1 [QSA,L]
# RewriteEngine On
# RewriteBase /

# # Only rewrite if the requested file/folder doesn't exist
# RewriteCond %{REQUEST_FILENAME} !-f
# RewriteCond %{REQUEST_FILENAME} !-d

# # Rewrite slugs to case-study-inner.php
# RewriteRule ^([a-zA-Z0-9\-]+)$ case-study-inner.php?slug=$1 [QSA,L]


RewriteEngine On
RewriteBase /

# If the file or folder exists, don't rewrite
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

# If request does NOT map to an existing .php file, rewrite to case-study-inner.php
RewriteCond %{REQUEST_FILENAME}.php !-f
RewriteRule ^([a-zA-Z0-9\-]+)$ case-study-inner.php?slug=$1 [QSA,L]
