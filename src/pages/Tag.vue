<template>

  <div class="tag-page">
    <div class="page-header" v-if="tag">
        <div class="container">
            <h1>Learn About {{ tag.name }}</h1>
        </div>
    </div>

    <div class="hero-section tight" v-if="tag">
        <div class="container">

            <div class="col-md-9">
                <div class="row group-container" ref="masonry">

                      <div v-for="format in resourcesGrouped" class="col-md-4 col-sm-6 col-xs-12">
                          <div class="panel panel-primary">
                              <div class="panel-heading">
                                  <i :class="`fa fa-${format.icon}`"></i>
                                  {{ format.plural }}
                              </div>
                              <div class="list-group">
                                  <a v-for="resource in format.resources" class="list-group-item" target="_blank" :href="resource.link">
                                      {{ resource.name }}
                                      <!-- TODO - Add tooltip -->
                                      <i v-if="resource.cost !== 'free'" class="fa fa-money pull-right"></i>
                                      <br/>
                                      <span class="small">
                                          {{ resource.shortLink }}
                                      </span>
                                  </a>
                              </div>
                          </div>
                      </div>

                </div>
            </div>

            <div class="col-md-3">
                <div v-if="tag.related.length > 0" class="panel panel-primary-light">
                    <div class="panel-heading">
                        <i class="fa fa-tags"></i> Related Topics
                    </div>
                    <div class="list-group">
                        
                      <router-link v-for="relatedTag in tag.related" class="list-group-item" :to="`/t/${relatedTag.slug}`">
                          {{ relatedTag.name }} <i class="fa fa-tag pull-right"></i>
                          <br/>
                          <span class="small">
                              {{ relatedTag.resourceCount }} Resources Available
                          </span>
                      </router-link>
                        
                    </div>
                </div>
                <social-panel :url="url" :text="`Learn About ${tag.name}`"></social-panel>
            </div>

        </div>
    </div>
  </div>

</template>

<script>
import axios from 'axios'
import Masonry from 'masonry-layout'

import SocialPanel from '../components/SocialPanel'

export default {
  name: 'format',
  components: {SocialPanel},

  created () {
    let tag = this.$route.params.tag;
    this.loadTag(tag)
  },

  updated() {
    if (this.$refs.masonry) {
      new Masonry(this.$refs.masonry, {
        itemSelector: '.col-md-4'
      });
    }
  },

  data () {
    return {
      tag: false
    }
  },

  computed: {
    url() {
      var url = window.location.href.split("/");
      return url[0] + "//" + url[2] + '/t/' + this.tag.slug;
    },
    resourcesGrouped() {
        if (!this.tag || !this.tag.resources) return [];
        let final = {};
        this.tag.resources.forEach((elem, i) => {
            let formats = elem.formats;
            formats.forEach(format => {
              if (typeof final[format.slug] === 'undefined') {
                final[format.slug] = format;
                final[format.slug].resources = [];
              } 
              final[format.slug].resources.push(elem);
            });
        });
        return final;
    }
  },

  methods: {
    loadTag(tag) {
      tag = tag.toLowerCase();
      axios.get(`/static/api/tags/${tag}.json`).then(resp => {
        this.tag = resp.data;
      })
    }
  },


  watch: {
    '$route' (to, from) {
      this.tag = false;
      this.loadTag(this.$route.params.tag);
    }
  }
}
</script>