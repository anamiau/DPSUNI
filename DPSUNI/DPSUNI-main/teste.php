<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Shop UI</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    background:#f5f1ea;
    color:#222;
}

/* HEADER */

header{
    width:100%;
    height:70px;
    background:#f7d9dd;
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:0 40px;
}

.logo{
    font-size:28px;
    font-weight:bold;
}

nav{
    display:flex;
    gap:25px;
    align-items:center;
}

nav a{
    text-decoration:none;
    color:#222;
    font-size:14px;
}

.btn{
    padding:8px 16px;
    border:none;
    border-radius:8px;
    cursor:pointer;
}

.login{
    background:white;
}

.register{
    background:black;
    color:white;
}

/* MAIN */

.container{
    display:flex;
    gap:30px;
    padding:30px;
}

/* SIDEBAR */

.sidebar{
    width:220px;
    background:#f7d9dd;
    padding:20px;
    border-radius:12px;
}

.sidebar h3{
    margin-bottom:15px;
    font-size:14px;
}

.filter-group{
    margin-bottom:25px;
}

.filter-group label{
    display:block;
    margin-bottom:8px;
    font-size:13px;
}

/* CONTENT */

.content{
    flex:1;
}

/* TOP BAR */

.topbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.search{
    width:200px;
    padding:10px;
    border:none;
    border-radius:20px;
    background:#f7d9dd;
}

.sort{
    display:flex;
    gap:20px;
    font-size:13px;
}

/* CARDS */

.products{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
}

.card{
    background:#f7d9dd;
    padding:15px;
    border-radius:12px;
}

.image{
    height:160px;
    background:#e9e9e9;
    border-radius:8px;
    margin-bottom:10px;
}

.card h4{
    font-size:14px;
    margin-bottom:5px;
}

.price{
    color:#ff3f8e;
    font-weight:bold;
}

/* BANNER */

.banner{
    margin-top:20px;
    height:180px;
    background:#f7d9dd;
    border-radius:12px;
}

/* FOOTER */

footer{
    margin-top:50px;
    padding:40px;
    display:flex;
    justify-content:space-between;
}

footer h4{
    margin-bottom:10px;
}

footer p{
    font-size:13px;
    margin-bottom:5px;
}

</style>
</head>

<body>

<header>

<div class="logo">⌘</div>

<nav>
    <a href="#">Products</a>
    <a href="#">Solutions</a>
    <a href="#">Community</a>
    <a href="#">Resources</a>
    <a href="#">Pricing</a>

    <button class="btn login">Sign in</button>
    <button class="btn register">Register</button>
</nav>

</header>

<div class="container">

<!-- SIDEBAR -->

<aside class="sidebar">

<div class="filter-group">
<h3>Type</h3>

<label><input type="checkbox"> Small</label>
<label><input type="checkbox"> Medium</label>
<label><input type="checkbox"> Large</label>
</div>

<div class="filter-group">
<h3>Color</h3>

<label><input type="checkbox"> Pink</label>
<label><input type="checkbox"> Black</label>
<label><input type="checkbox"> White</label>
</div>

<div class="filter-group">
<h3>Size</h3>

<label><input type="checkbox"> P</label>
<label><input type="checkbox"> M</label>
<label><input type="checkbox"> G</label>
</div>

</aside>

<!-- CONTENT -->

<section class="content">

<div class="topbar">

<input class="search" placeholder="Search">

<div class="sort">
<span>Newest</span>
<span>Price</span>
<span>Rating</span>
</div>

</div>

<div class="products">

<div class="card">
<div class="image"></div>
<h4>Produto</h4>
<p class="price">$0</p>
</div>

<div class="card">
<div class="image"></div>
<h4>Produto</h4>
<p class="price">$0</p>
</div>

<div class="card">
<div class="image"></div>
<h4>Produto</h4>
<p class="price">$0</p>
</div>

<div class="card">
<div class="image"></div>
<h4>Produto</h4>
<p class="price">$0</p>
</div>

</div>

<div class="banner"></div>

</section>

</div>

<footer>

<div>
<h4>Use cases</h4>
<p>UI design</p>
<p>Wireframing</p>
<p>Team collaboration</p>
</div>

<div>
<h4>Explore</h4>
<p>Design</p>
<p>Prototyping</p>
<p>Figma</p>
</div>

<div>
<h4>Resources</h4>
<p>Blog</p>
<p>Support</p>
<p>Developers</p>
</div>

</footer>

</body>
</html>