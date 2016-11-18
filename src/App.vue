<template>
  <div id="app">

		<nav class="navbar navbar-default">
		    <div class="container">
		        <div class="navbar-header">
		            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		                <span class="sr-only">Toggle navigation</span>
		                <span id="nav-bar-1" class="icon-bar"></span>
		                <span id="nav-bar-2" class="icon-bar"></span>
		                <span id="nav-bar-3" class="icon-bar"></span>
		            </button>
		            <router-link to="/" class="navbar-brand">iwanttolearn.io</router-link>
		        </div>

		        <div class="collapse navbar-collapse" id="navbar">

		            <ul class="nav navbar-nav navbar-right">
		                <li><router-link to="/about">About</router-link></li>
		            </ul>

		        </div>
		    </div>
		</nav>
	  
		<router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'app',
}
</script>

