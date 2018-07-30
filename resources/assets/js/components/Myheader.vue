
<template>


    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">

            <a class="navbar-item" href="/"> <h1>MAS</h1> </a>
            <div class="navbar-menu">
                <router-link to="/phonebook/home" class="navbar-item" >Anasayfa</router-link>
                <router-link to="/phonebook/about" class="navbar-item" >About</router-link>
            </div>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
                <span  ></span>
                <span  ></span>
                <span  ></span>
            </a>
        </div>
    </nav>


</template>
