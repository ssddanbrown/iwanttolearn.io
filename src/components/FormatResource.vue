<template>

<div class="resource-item">
  <a :href="resource.link" target="_blank">
	  <h4>{{ resource.name }}</h4>
	  <p>{{ resource.link }}</p>
  </a>
  <div class="tags">
	  <template v-for="tag in resource.tags">
		 <router-link class="resource-item-tag-link" :to="`/t/${tag.slug}`">
			 <i class="fa fa-tag"></i><span>{{ tag.name }}</span>
		 </router-link> &nbsp;
	  </template>
  </div>
</div>

</template>

<script>

export default {
  name: 'format-resource',
  props: ['resource']
}
</script>