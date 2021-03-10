<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $this->title ?></title>

        <link rel="stylesheet" href="App/Css/Template.css"/>
    	<link rel="stylesheet" href="App/Css/Responsive.css"/>

    	<script defer src="App/Js/Upload.js"></script>
        <script defer src="App/Js/Actions.js"></script>
        <script defer src="App/Js/CustomElements/PrintComponent.js"></script>
        <script defer src="App/Js/CustomElements/ActionComponent.js"></script>

    	<script src="https://kit.fontawesome.com/646143606b.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header id="topHeader">
            <nav class="menu">
                <a href="index.php">Home</a>
                <a href="index.php?action=modify">Actions</a>
                <a href="index.php">Other</a>
            </nav>

            <h1><?php echo $this->title ?></h1>

            <a id="arrow" href="#topHeader"><i class="fas fa-chevron-up"></i></a>
        </header>

        <main>
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
                        <input type="file" name="files" id="fileInput" onchange="addFiles(event)">
                    </div>
                    <progress id="progressBar"></progress>
                    <input id="uploadButton" type="submit" value="Upload">
                </form>
            </section>

            <?php echo $this->content ?>
        </main>

        <footer>
            <p>Test application of Librairie Php metadata</p>
        </footer>
    </body>
</html>
