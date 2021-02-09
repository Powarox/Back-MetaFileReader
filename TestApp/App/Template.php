<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $this->title ?></title>

        <link rel="stylesheet" href="App/Css/Template.css"/>
    	<link rel="stylesheet" href="App/Css/Responsive.css"/>

    	<script defer src="App/Js/Upload.js"></script>
        <script defer src="App/Js/Actions.js"></script>
        <script defer src="App/Js/CustomElements/Component.js"></script>

    	<script src="https://kit.fontawesome.com/646143606b.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <h1><?php echo $this->title ?></h1>
        </header>

        <main>
<!-- Section upload permettant le drag & drop -->
            <section class="upload">
                <form id="dropFileForm" action="index.php?action=upload" method="post" onsubmit="uploadFiles(event)" enctype="multipart/form-data">
    	            <div id="dropFileDiv"
    	            ondragover="overrideDefault(event);fileHover();" ondragenter="overrideDefault(event);fileHover();" ondragleave="overrideDefault(event);fileHoverEnd();" ondrop="overrideDefault(event);fileHoverEnd();
    	                  addFiles(event);">
    	                <label for="fileInput" id="fileLabel">
    	                    <i class="fas fa-upload"></i>
    	                    <span id="fileLabelText">
    	                      Choose a file
    	                    </span>
    	                    <span id="uploadStatus"></span>
    	                    <i class="fas fa-upload"></i>
    	                </label>
    	                <input type="file" name="files[]" id="fileInput" multiple onchange="addFiles(event)">
    	            </div>

    				<progress id="progressBar"></progress>

    	            <input id="uploadButton" type="submit" value="Upload">
    	        </form>
            </section>

<!-- Affichage des métadata contenue dans le fichier upload -->
            <section class="previewInfo fantome">
                <h2>Metada of file</h2>
                <section class="container1">
                    <img src="App/File/Img/default_pdf_image.jpg" alt="Une image">

                    <section class="cont1">
                        <div class="box elem1">
                            <h2>Exif</h2>
                        </div>

                        <div class="box elem2">
                            <h2>Other</h2>
                        </div>

                        <div class="box elem3">
                            <h2>File</h2>
                        </div>
                    </section>
                </section>

                <section class="container2">
                    <div class="box">
                        <h2>XMP</h2>
                    </div>

                    <div class="box">
                        <h2>Location</h2>
                    </div>

                    <div class="box">
                        <h2>Author</h2>
                    </div>
                </section>
            </section>

<!-- Affichage des actions possible sur les métadata -->
            <section class="previewAction fantome">
                <h2>Action for users</h2>
                <ul>
                    <li>Save</li>
                    <li>Modify</li>
                    <li>Export</li>
                    <li>...</li>
                </ul>
            </section>


            <section class="modifyMeta">
                <form class="modifyForm" action="index.html" method="post">
                    <label for="modifyInput">Choisir la métadonnées à modifier :
                        <button id="addElem" type="button" name="button">Ajouter</button>
                    </label>
                    <!-- <article class="card">
                        <select-meta></select-meta>

                        <input id="modifyInput" type="text" name="" value="méta of type selected">

                        <button type="button" name="button">Supprimer</button>
                    </article> -->
                </form>
            </section>
        </main>

        <footer>
        </footer>
    </body>
</html>
