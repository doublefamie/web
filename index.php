<?php
// Set the path to the images directory
$imageDirectory = "images/";

// Get all images in the directory
//$images = array_diff(scandir($imageDirectory), array('.', '..'));

//// Shuffle the images array to give a random display order
//shuffle($images);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Image Scroll</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #000;
            overflow: hidden;
        }
        .scroll-container {
            width: 100vw;
            height: 100vh;
            overflow-y: scroll;
            scroll-behavior: smooth;
            position: relative;
        }
        .image {
            width: 100vw;
            height: 100vh;
            object-fit: cover;
        }
        .loading {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
            color: white;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <div class="scroll-container" id="scroll-container">
        <?php foreach ($images as $image): ?>
            <img src="<?php echo $imageDirectory . $image; ?>" alt="TikTok Image" class="image" />
        <?php endforeach; ?>
        <div class="loading" id="loading">Loading...</div>
    </div>

    <script>
        const scrollContainer = document.getElementById('scroll-container');
        const loadingText = document.getElementById('loading');

        // Infinite scroll function
        scrollContainer.addEventListener('scroll', () => {
            if (scrollContainer.scrollTop + scrollContainer.clientHeight >= scrollContainer.scrollHeight) {
                // Show loading text when reaching the bottom
                loadingText.style.display = 'block';

                // Simulate loading by waiting and then appending more images
                setTimeout(() => {
                    // Create new images dynamically (simulating load)
                    for (let i = 0; i < 5; i++) {
                        const img = document.createElement('img');
                        img.src = "images/random" + Math.floor(Math.random() * 10) + ".jpg"; // Example random image name
                        img.classList.add('image');
                        scrollContainer.appendChild(img);
                    }
                    loadingText.style.display = 'none'; // Hide loading text
                }, 1000);
            }
        });
    </script>
</body>
</html>
