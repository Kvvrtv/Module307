<!DOCTYPE html>
<html>
<style>

</style>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bulma-0.8.0\css\bulma.min.css">
    <link rel="stylesheet" href="bulma-0.8.0\css\bulma.css">
</head>
<body>
<!-- START NAV -->
<nav class="navbar is-white">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item brand-text" href="privat.php">
                Tie International
            </a>
            <div class="navbar-burger burger" data-target="navMenu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div id="navMenu" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="infomatikerAppi.php">
                    Infomatiker Appi
                </a>
                <a class="navbar-item" href="mediamatiker.php" style="color:blue;">
                    Mediamatiker
                </a>
            </div>
        </div>
    </div>
</nav>
<!-- END NAV -->
<div class="container">
    <div class="column is-9">
        <section class="hero is-info welcome is-small">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Hallo, Tie Mitglied.
                    </h1>
                    <h2 class="subtitle">
                        I hope you are having a great day!
                    </h2>
                </div>
            </div>
        </section>
        <section class="info-tiles">
            <div class="tile is-ancestor has-text-centered">
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <p class="title">439k</p>
                        <p class="subtitle">Users</p>
                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <p class="title">59k</p>
                        <p class="subtitle">Products</p>
                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <p class="title">3.4k</p>
                        <p class="subtitle">Open Orders</p>
                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <p class="title">19</p>
                        <p class="subtitle">Exceptions</p>
                    </article>
                </div>
            </div>
        </section>
        <div class="columns">
            <div class="column is-6">
                <div class="card events-card">
                    <header class="card-header">
                        <p class="card-header-title">
                            Events
                        </p>
                        <a href="#" class="card-header-icon" aria-label="more options">
                                      <span class="icon">
                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                      </span>
                        </a>
                    </header>
                    <div class="card-table">
                        <div class="content">
                            <table class="table is-fullwidth is-striped">
                                <tbody>
                                <tr>
                                    <td width="5%"><i class="fa fa-bell-o"></i></td>
                                    <td>applikation</td>
                                    <td class="level-right"><a class="button is-small is-primary" href="#">Action</a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <footer class="card-footer">
                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>
<script async type="text/javascript" src="../js/bulma.js"></script>
</body>
</html>