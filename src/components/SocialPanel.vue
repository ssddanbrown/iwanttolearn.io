<template>

<div class="panel panel-primary-light">
    <div class="panel-heading">
        <i class="fa fa-share"></i> Share This Topic
    </div>
    <div class="list-group social-icons">
        <a :href="`https://www.facebook.com/sharer/sharer.php?u=${encodedUrl}`" target="_blank" class="list-group-item">
            <i class="fa fa-facebook-square"></i> <span class="text">Share on Facebook</span>
        </a>
        <a :href="`https://twitter.com/intent/tweet?text=${encodedText}&url=${encodedUrl}`" target="_blank" class="list-group-item">
            <i class="fa fa-twitter-square"></i> <span class="text">Share on Twitter</span>
        </a>
        <a :href="`https://plus.google.com/share?url=${encodedUrl}`" target="_blank" class="list-group-item">
            <i class="fa fa-google-plus-square"></i> <span class="text">Share on Google+</span>
        </a>
        <a :href="`http://www.reddit.com/submit?url=${encodedUrl}&title=${encodedText}`" target="_blank" class="list-group-item">
            <i class="fa fa-reddit-square"></i> <span class="text">Share on Reddit</span>
        </a>
    </div>
</div>

</template>

<script>

export default {
  name: 'social-panel',
  props: ['url', 'text'],
  computed: {
  	encodedUrl() {
  		return encodeURIComponent(this.url);
  	},
	encodedText() {
  		return encodeURIComponent(this.text);
  	}
  }
}
</script>