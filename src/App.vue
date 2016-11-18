<template>
  <div id="app">

		<nav class="navbar navbar-default">
		    <div class="container">
				<div class="row">
					<div class="col-xs-6">
						<router-link to="/">iwanttolearn.io</router-link>
					</div>
					<div class="col-xs-6 nav">
						<router-link to="/about">About</router-link>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<a rel="noopener" target="_blank" href="https://github.com/ssddanbrown/iwanttolearn.io">Github</a>
					</div>
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

