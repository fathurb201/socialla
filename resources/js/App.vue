<template>
    <!-- <div class="container"> 
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Products List</router-link>
                    <router-link to="/create" class="nav-item nav-link">Create Product</router-link>
                </div>
            </div>
        </nav>

        <router-view/>
    </div> -->
    <div id="app">
        <!-- <div id="nav">
            <router-link to="/">Home</router-link> |
            <router-link to="/about">About</router-link> |
            <router-link to="/product">Product</router-link> |
            <router-link to="/dashboard">Dashboard</router-link>
        </div> -->
        <router-view name="DashboardHeader"/>
        <router-view name="Header"/>
        <router-view name="Slider"/>
        <router-view name="StartSmallBanner"/>

        <router-view/>
        <router-view name="Footer"/>
  </div>
</template>
 
<script>
    export default {}
</script>

<style scoped>
#app {
  /* font-family: Avenir, Helvetica, Arial, sans-serif; */
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
}
#nav {
    text-align: center;
}

#nav {
  padding: 30px;
}

#nav a {
  font-weight: bold;
  color: #2c3e50;
}

#nav a.router-link-exact-active {
  color: #42b983;
}
</style>