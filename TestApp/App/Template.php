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
                <a href="#">Home</a>
                <a href="#">Actions</a>
                <a href="#">Other</a>
            </nav>

            <h1><?php echo $this->title ?></h1>

            <a id="arrow" href="#topHeader"><i class="fas fa-chevron-up"></i></a>
        </header>

        <main>
            <?php echo $this->content ?>
        </main>

        <footer>
            <p>Test application of Librairie Php metadata</p>
        </footer>
    </body>
</html>
