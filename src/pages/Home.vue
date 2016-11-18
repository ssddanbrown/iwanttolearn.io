<template>
  <div class="home">
    <div class="hero-home hero-section dark">
        <div class="container">
            <h1>I want to learn...</h1>
            <div>
                <router-link v-for="tag in tags" class="tag-link" :to="`/t/${tag.slug}`">
                    {{ tag.name }}
                </router-link>
            </div>
        </div>
    </div>

    <div class="hero-section white">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3><i class="fa fa-code"></i>&nbsp;&nbsp;Learn To Code</h3>
                    <p>This site lists resources for all types of coding and development topics covering various programming languages, frameworks and tools.</p>
                </div>
                <div class="col-md-4">
                    <h3><i class="fa fa-film"></i>&nbsp;&nbsp;Learn By Format</h3>
                    <p>The resources are listed by format so you can find places that teach in the format most suited to you. Formats include videos, books and interactive tutorials.</p>
                </div>
                <div class="col-md-4">
                    <h3><i class="fa fa-lightbulb-o"></i>&nbsp;&nbsp;Discover New Topics</h3>
                    <p>You can browse and discover new topics by listing all the resources that are in your favorite format, whether that's video, book, or article.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="hero-section hero-home grey">
        <div class="container">
            <h2>Browse Resources By Formats</h2>
            <div>
              <router-link v-for="format in formats" class="tag-link"  :to="`/f/${format.slug}`">
                <i :class="`fa fa-${format.icon}`"></i>{{ format.name }}
              </router-link>
            </div>
        </div>
    </div>

  </div>
</template>

<script>
import axios from 'axios'


export default {
  name: 'home',
  created () {
    axios.get('/static/api/tags.json').then(resp => {
      this.tags = resp.data;
    })
    axios.get('/static/api/formats.json').then(resp => {
      this.formats = resp.data;
    })
  },
  data () {
    return {
      tags: [],
      formats: [],
    }
  }
}
</script>
